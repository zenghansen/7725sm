<?php
require_once(dirname(__FILE__) . "/config.php");
require_once(dirname(__FILE__) . "/Logger.php");


function sql_DBconnect($DB_Name)
{
    $linkinfo = $GLOBALS[$DB_Name];
    $GLOBALS[$linkinfo[0]] = new mysqli('p:' . $linkinfo[1], $linkinfo[2], $linkinfo[3], $linkinfo[4]);
    $link = $GLOBALS[$linkinfo[0]];

    if (!$link) {
        throw new Exception(mysqli_connect_errno());
    }
    $link->set_charset($GLOBALS['DB_CHATSET']);
}

function get_connect($DB_Name)
{

    $linkinfo = $GLOBALS[$DB_Name];

    if (!isset($GLOBALS[$linkinfo[0]])){
        sql_DBconnect($DB_Name);
    }
    $link = $GLOBALS[$linkinfo[0]];

    return $link;
}


/**
 * 执行一行代码（无结果集）
 * @param $sql
 */
function sql_query($DB_Name, $sql)
{
    $logger = @Logger::getLogger("default");
    $link = get_connect($DB_Name);
    $stime = my_microtime_float();
    $r = $link->query($sql);
    loginfo($stime, $sql);
    if ($r == false) {
        $errno = mysqli_connect_errno();
        if ($errno == 2006) { // mysql has gone away， 重新连接一下
            sql_connect();

            $r = $link->query($sql);
            if ($r == false) {
                $GLOBALS['connection'] = null;
                throw new Exception(mysqli_connect_errno . ": " . $errno);
            }
        } else {
            $GLOBALS['connection'] = null;
            throw new Exception(mysqli_connect_errno . ": " . $errno);
        }
    }

    return $r;
}

/**
 * 返回一条记录  无记录则返回空字符串""
 * @param $sql
 * @return unknown_type
 */
function sql_fetch_one($DB_Name, $sql)
{
    $link = get_connect($DB_Name);
    $stime = my_microtime_float();
    if ($link->real_query($sql)) {
        loginfo($stime, $sql);
        if ($r = $link->store_result()) {
            $row = $r->fetch_row();
            $r->close();
            while ($link->next_result()) {
            };
            return $row;
        }
    }
    return "";
}

/**
 * 返回一个数据
 * @param $sql
 * @return unknown_type
 */
function sql_fetch_one_cell($DB_Name, $sql)
{
    $link = get_connect($DB_Name);
    $stime = my_microtime_float();
    if ($link->real_query($sql)) {
        loginfo($stime, $sql);
        if ($r = $link->store_result()) {
            $row = $r->fetch_row();
            $r->close();
            while ($link->next_result()) {
            };
            return $row[0];
        }
    }
    return 0;
}

/**
 * 获取记录集
 * @param $sql
 * @return unknown_type
 */
function sql_fetch_rows($DB_Name, $sql)
{
    $link = get_connect($DB_Name);
    $ret = array();
    $stime = my_microtime_float();
    if ($link->real_query($sql)) {
        loginfo($stime, $sql);
        if ($r = $link->store_result()) {
            while ($row = $r->fetch_row()) {
                $ret[] = $row;
            }
            $r->close();
            while ($link->next_result()) {
            };
        }
    }
    return $ret;
}

/**
 * 获取记录集  以[字段=>值]的形式
 * @param $sql
 * @return unknown_type
 */
function sql_fetch_rows_assoc($DB_Name, $sql)
{
	$link = get_connect($DB_Name);
	$ret = array();
	$stime = my_microtime_float();
	if ($link->real_query($sql)) {
		loginfo($stime, $sql);
		if ($r = $link->store_result()) {
			while ($row = $r->fetch_array(MYSQLI_ASSOC)) {
				$ret[] = $row;
			}
			$r->close();
		}
	}
	return $ret;
}

/**
 * 获取多个结果集
 * @param $sql
 */
function sql_fetch_tables($DB_Name, $sql)
{
    $link = get_connect($DB_Name);
    $ret = array();
    $stime = my_microtime_float();
    if ($link->real_query($sql)) {
        loginfo($stime, $sql);
        do {
            if ($r = $link->store_result()) {
                $tb = array();
                while ($row = $r->fetch_row()) {
                    $tb[] = $row;
                }
                $ret[] = $tb;
                $r->close();
            }
        } while ($link->next_result());
    }
    return $ret;
}

/**
 * 插入数据
 * @param $sql
 * @return unknown_type
 */
function sql_insert($DB_Name, $sql)
{
    $stime = my_microtime_float();
    sql_query($DB_Name, $sql);
    loginfo($stime, $sql);
    return sql_fetch_one_cell($DB_Name, 'select last_insert_id()');
}

/**
 * 获取一个对象
 * @param $table 表名
 * @param $id 字段值
 * @param $idname 字段
 * @return unknown_type 一条记录
 */
function sql_fetch_object($DB_Name, $table, $id, $idname = "id")
{
    return sql_fetch_one($DB_Name, "SELECT * FROM `$table` WHERE `$idname`=$id");
}

/**
 * 插入一个对象
 * @param unknown_type $table
 * @param unknown_type $obj
 * @return sql字符串
 */
function sql_insert_object($DB_Name, $table, $obj)
{
    if (!$obj)
        return 0;

    $sql = "INSERT INTO `$table` ";
    $keys = "(";
    $values = "(";
    $r = "";
    foreach ($obj as $key => $value) {
        $keys .= ($r . "`" . $key . "`");
        $values .= ($r . "'" . $value . "'");
        $r = ",";
    }
    $keys .= ")";
    $values .= ")";
    $sql = $sql . $keys . " VALUES " . $values;
    return sql_insert($DB_Name, $sql);
}

/**
 * REPLACE 一个对象p
 * @param $table
 * @param $obj
 * @return sql字符串
 */
function sql_replace_object($DB_Name, $table, $obj)
{
    if (!$obj)
        return 0;

    $sql = "REPLACE INTO $table ";
    $keys = "(";
    $values = "(";
    $r = "";
    foreach ($obj as $key => $value) {
        $keys .= ($r . "`" . $key . "`");
        $values .= ($r . "'" . $value . "'");
        $r = ",";
    }
    $keys .= ")";
    $values .= ")";
    $sql = $sql . $keys . " VALUES " . $values;
    return sql_insert($DB_Name, $sql);
}

/**
 * REPLACE 多个对象
 * @param $table
 * @param $objs
 * @return unknown_type
 */
function sql_replace_objects($DB_Name, $table, $objs)
{
    if ($objs) foreach ($objs as $key => $value) {
        sql_replace_object($DB_Name, $table, $value);
    }
}

/**
 * 是否有记录
 * @param $sql
 * @return 是否有记录
 */
function sql_check($DB_Name, $sql)
{
    $r = sql_query($DB_Name, $sql);

    if (empty($r)) {
        return false;
    }

    if (mysql_num_rows($r) > 0) {
        return true;
    } else {
        return false;
    }
}

function loginfo($stime, $sql)
{
    $querytime = my_microtime_float() - $stime;
    if ($querytime > 3000)
        $GLOBALS['LOGGER']->info("exectime: " . $querytime . " " . $sql);
}

function my_microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec) * 1000;
}

function get_mysql_insert_id($DB_Name)
{
	$link = get_connect($DB_Name);
	return mysqli_insert_id($link);
}

?>