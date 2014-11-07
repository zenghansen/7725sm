<?php

class BM_AccountProvider extends MainProvider
{

    /**
     * 构造函数
     */
    public function __construct()
    {

    }

    /**
     * 获取用户列表
     * @return array|void
     */
    public static function getList($start, $limit)
    {
        try {
            $table = 'BM_Account t1
            LEFT JOIN BM_Department t2 ON t1.bm_DtptID = t2.bm_DtptID
            LEFT JOIN (SELECT bm_ModuleID, bm_ModuleName from BM_ModuleStructure) t3  ON t3.bm_ModuleID IN
            (SELECT bm_ModuleID FROM BM_AccountModule WHERE bm_AccountID = t1.bm_AccountID)
            LEFT JOIN BM_Rank t3 ON t1.bm_RankID = t3.bm_RankID';
            $fields = 't1.bm_AccountID AS id,t1.bm_AccountName AS name,t1.bm_AccountType AS type,t1.bm_AccountRight AS rig,t1.bm_DtptID AS deptId,
               t1.bm_AccountState AS status,t1.bm_RankID as randId,
               t2.bm_DtptName AS dept,GROUP_CONCAT(t3.bm_ModuleName) AS modNames,GROUP_CONCAT(t3.bm_ModuleId) AS modIds,
               t3.bm_RankName AS randName';
            $where = 't1.bm_AccountState = 0
              GROUP BY t1.bm_AccountID
              ORDER BY t1.bm_AccountID
              LIMIT ?,?';
            $users = self::$db->select($table, $fields, $where, array($start, $limit));
            $query = self::$db->query('SELECT count(*) FROM BM_Account where bm_AccountState=0');
            $num = $query->fetchColumn();
            $usersGrid = array();
            $usersGrid['rows'] = $users;
            $usersGrid['total'] = $num;
            return $usersGrid;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**修改用户信息
     * @param $row
     */
    public static function putRow($row)
    {
        try {
            self::$db->beginTransaction();

            $ret = self::$db->select('BM_Account', 'bm_AccountID', 'bm_AccountID=?', array(cookie::get('user')));
            if (empty($ret)) {
                return false;
            }
            $update = array(
                "bm_AccountName" => $row['name'],
                "bm_DtptID" => intval($row['deptId']),
                "bm_RankID" => intval($row['randId']),
                "bm_AccountState" => intval($row['status'])
            );

            $ret = self::$db->update('BM_Account', $update, 'bm_AccountID=?', array($row['id']));

            if (!empty($row['modIds'])) { //修改用户拥有模块信息

                self::$db->delete('BM_AccountModule', 'bm_AccountID=?', array($row['id'])); //删除之前的

                $mods = explode(',', $row['modIds']);
                $insert = array();
                foreach ($mods as $v) {
                    array_push($insert, array('bm_ModuleID' => $v, 'bm_AccountID' => $row['id']));
                }
                self::$db->insert('BM_AccountModule', $insert);

            }
            self::$db->commit();
            return $ret;
        } catch (Exception $e) {
            self::$db->rollBack();
            throw new Exception($e);
        }
    }

    /**添加用户
     * @param $row
     */
    public static function addRow($row)
    {
        try {
            self::$db->beginTransaction();

            $insert = array(
                'bm_AccountID' => $row['id'],
                'bm_Password' => md5(123456),
                'bm_AccountName' => $row['name'],
                'bm_DtptID' => intval($row['dept']),
                'bm_RankID' => intval($row['randId'])
            );
            $ret = self::$db->insert('BM_Account', $insert);

            if (!empty($row['modIds'])) {

                self::$db->delete('BM_AccountModule', 'bm_AccountID=?', array($row['id'])); //删除之前的

                $mods = explode(',', $row['modIds']);
                $insert = array();
                foreach ($mods as $v) {
                    array_push($insert, array('bm_ModuleID' => $v, 'bm_AccountID' => $row['id']));
                }
                self::$db->insert('BM_AccountModule', $insert);
            }
            self::$db->commit();
            return $ret;

        } catch (Exception $e) {
            self::$db->rollBack();
            throw new Exception($e);
        }
    }

    /**删除
     * @param $id
     */
    public static function delRow($row)
    {
        try {
            self::$db->beginTransaction();
            //删除人
            $update = array(
                'bm_AccountState' => 99
            );
            self::$db->update('BM_Account', $update, 'bm_AccountID=?', array($row['id']));

            //删除人里面的模块关系
            $ret = self::$db->exec('delete from BM_AccountModule where  bm_AccountID in (select bm_AccountID from BM_Account where bm_AccountState = 99)');
            self::$db->commit();
            return $ret;
        } catch (Exception $e) {
            self::$db->rollBack();
            throw new Exception($e);
        }
    }

    /**
     * 获取部门的级别
     * @param $deptId
     * @return array|bool
     */
    public static function getDeptRand($deptId)
    {

        try {
            $ret = self::$db->select('BM_Rank', 'bm_RankID as id,bm_RankName as name', 'bm_DtptID=?', array($deptId));
            $arr = array();
            array_unshift($ret, array('id' => 0, 'name' => '无'));
            $arr['rows'] = $ret;
            return $arr;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }


}
