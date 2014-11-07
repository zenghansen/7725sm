<?php

class BM_RankProvider extends MainProvider
{

    /**
     * 构造函数
     */
    public function __construct()
    {

    }

    /**
     * 获取列表
     * @return array|void
     */
    public static function getList($start, $limit)
    {
        try {
            $table = 'BM_Rank t1
        LEFT JOIN (SELECT bm_DtptName,bm_DtptID FROM BM_Department) t2 ON t1.bm_DtptID = t2.bm_DtptID
        LEFT JOIN (SELECT bm_ModuleID, bm_ModuleName FROM BM_ModuleStructure) t3 ON t3.bm_ModuleID IN
        (SELECT bm_ModuleID FROM BM_RankRight WHERE bm_RankID = t1.bm_RankID)';

            $fields = 't1.bm_RankID AS id,t1.bm_RankName AS name,t1.bm_DtptID AS deptId,t1.bm_RankPRI AS pri,
            t2.bm_DtptName AS deptName,GROUP_CONCAT(t3.bm_ModuleName) AS modNames,GROUP_CONCAT(t3.bm_ModuleId) AS modIds';

            $where = 'bm_RankState = 0 GROUP BY t1.bm_RankID ORDER BY t1.bm_RankID,t1.bm_RankPRI LIMIT ?,?';

            $list = self::$db->select($table, $fields, $where, array($start, $limit));

            $query = self::$db->query('select count(*)  from BM_Rank where bm_RankState = 0');
            $num = $query->fetchColumn();
            $grid = array();
            $grid['rows'] = $list;
            $grid['total'] = $num;
            return $grid;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**修改，修改级别的同时，更新级别拥有的模块，事务处理
     * @param $row
     */
    public static function putRow($row)
    {
        try {
            self::$db->beginTransaction();

            $ret = self::$db->select('BM_Rank', 'bm_DtptID', 'bm_RankID=?', array($row['id']));
            if (empty($ret)) {
                return false;
            }

            /*如果级别所属部门有变更，更新用户表的bm_RankID*/
            if ($ret[0]['bm_DtptID'] != $row['deptId']) {
                $update = array('bm_RankID' => 0);
                self::$db->update('BM_Rank', $update, 'bm_RankID=?', array($row['id']));
            }

            //修改分配模块
            if (!empty($row['modIds'])) {

                self::$db->delete('BM_RankRight', 'bm_RankID=?', array($row['id'])); //删除之前的

                $mods = explode(',', $row['modIds']);
                $insert = array();
                foreach ($mods as $v) {
                    array_push($insert, array('bm_ModuleID' => $v, 'bm_RankID' => $row['id']));
                }
                self::$db->insert('BM_RankRight', $insert);

            }

            $update = array(
                'bm_RankName' => $row['name'],
                'bm_DtptID' => $row['deptId'],
                'bm_RankPRI' => intval($row['pri'])
            );
            $ret = self::$db->update('BM_Rank', $update, 'bm_RankID=?', array($row['id']));

            self::$db->commit();
            return $ret;
        } catch (Exception $e) {
            self::$db->rollBack();
            throw new Exception($e);
        }
    }

    /**添加,添加级别的同时，写入级别拥有的模块，事务处理
     * @param $row
     */
    public static function addRow($row)
    {
        try {
            self::$db->beginTransaction();

            $insert = array(
                'bm_RankName' => $row['name'],
                'bm_DtptID' => intval($row['deptId']),
                'bm_RankPRI' => intval($row['pri'])
            );
            $ret = self::$db->insert('BM_Rank', $insert);
            $intId = self::$db->lastInsertId();
            //修改分配模块
            if (!empty($row['modIds'])) {

                self::$db->delete('BM_RankRight', 'bm_RankID=?', array($row['id'])); //删除之前的

                $mods = explode(',', $row['modIds']);
                $insert = array();
                foreach ($mods as $v) {
                    array_push($insert, array('bm_ModuleID' => $v, $intId));
                }
                self::$db->insert('BM_RankRight', $insert);

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

            //删除部门里面的模块关系
            self::$db->exec('delete from BM_RankRight where  bm_RankID in (select bm_RankID from BM_Rank where bm_RankState = 99)');
            //删除级别
            $update = array(
                'bm_RankState' => 99
            );
            $ret = self::$db->update('BM_Rank', $update, 'bm_RankID=?', array($row['id']));
            self::$db->commit();
            return $ret;

        } catch (Exception $e) {
            self::$db->rollBack();
            throw new Exception($e);
        }
    }

}
