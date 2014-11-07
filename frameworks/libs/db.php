<?php
//http://www.imavex.com/php-pdo-wrapper-class/
class db extends PDO
{
    private $error;
    private $sql;
    private $bind;


    public function __construct($dsn, $user = "", $passwd = "")
    {
        $options = array(
            PDO::ATTR_PERSISTENT => true, //长连接方式
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false //禁止php的prepare拼接sql，分两部分传递，彻底杜绝sql注入。
        );

        try {
            parent::__construct($dsn, $user, $passwd, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            throw new Exception($e);
        }
    }


    public function select($table, $fields = "", $where = "", $bind = array())
    {
        $sql = "SELECT " . $fields . " FROM " . $table;
        if (!empty($where))
            $sql .= " WHERE " . $where;
        $sql .= ";";
        return $this->run($sql, $bind);
    }

    public function update($table, Array $info, $where, $bind = array())
    {
        $fields = $this->filter($table, $info);

        $sql = "UPDATE " . $table . " SET ";
        for ($f = 0; $f < count($fields); ++$f) {
            if ($f > 0)
                $sql .= ", ";
            $sql .= $fields[$f] . ' = ?';
        }
        $sql .= " WHERE " . $where . ";";

        $bind = $this->cleanup($bind);
        for ($i = count($fields) - 1; $i >= 0; $i--)
            array_unshift($bind, $info[$fields[$i]]);

        return $this->run($sql, $bind);
    }

    public function insert($table, Array $info)
    {
        if (!is_array($info[0])) { //如果是插入单个记录，组装成多个的形式
            $info = array($info);
        }
        $fields = $this->filter($table, $info[0]);
        $count = count($fields) * count($info);

        $place_holders = implode(',', array_fill(0, $count, '?'));
        $sql = "INSERT INTO " . $table . " (" . implode($fields, ", ") . ") VALUES ($place_holders);";
        $bind = array();
        foreach ($info as $v) {
            foreach ($fields as $field) {
                array_push($bind, $v[$field]);
            }
        }
        return $this->run($sql, $bind);
    }

    public function delete($table, $where, $bind = array())
    {
        $sql = "DELETE FROM " . $table . " WHERE " . $where . ";";
        $this->run($sql, $bind);
    }

    private function filter($table, Array $info)
    {
        $driver = $this->getAttribute(PDO::ATTR_DRIVER_NAME);
        if ($driver == 'sqlite') {
            $sql = "PRAGMA table_info('" . $table . "');";
            $key = "name";
        } elseif ($driver == 'mysql') {
            $sql = "DESCRIBE " . $table . ";";
            $key = "Field";
        } else {
            $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '" . $table . "';";
            $key = "column_name";
        }

        if (false !== ($list = $this->run($sql))) {
            $fields = array();
            foreach ($list as $record)
                $fields[] = $record[$key];
            return array_values(array_intersect($fields, array_keys($info)));
        }
        return array();
    }

    private function cleanup(Array $bind)
    {
        if (!is_array($bind)) {
            if (!empty($bind))
                $bind = array($bind);
            else
                $bind = array();
        }
        return $bind;
    }

    public function run($sql, $bind = array())
    {
        $this->sql = trim($sql);
        $this->bind = $this->cleanup($bind);
        $this->error = "";

        //echo $realSql = $this->getRealSql() . "<BR>"; //获取真实sql，方便调试,如果是绑定模式，参数不一定是真实的（会被过滤），要去mysql日志下面看

        try {
            $pdostmt = $this->prepare($this->sql);
            if ($pdostmt->execute($this->bind) !== false) {
                if (preg_match("/^(" . implode("|", array("select", "describe", "pragma")) . ") /i", $this->sql))
                    return $pdostmt->fetchAll(PDO::FETCH_ASSOC);
                elseif (preg_match("/^(" . implode("|", array("delete", "insert", "update")) . ") /i", $this->sql))
                    return $pdostmt->rowCount();
            }
        } catch (PDOException $e) {
            //echo $this->error = $e->getMessage();
            throw new Exception($e); //异常外抛，便于外面捕捉
            return false;
        }
    }

    private function getRealSql()
    {
        $realSql = $this->sql;
        if (count($realSql) > 0) {
            foreach ($this->bind as $v) {
                if (!is_numeric($v)) $v = '\'' . $v . '\'';
                $realSql = preg_replace('/\?/', $v, $realSql, 1);
            }
        }
        return $realSql;
    }
}
