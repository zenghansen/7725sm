<?php

class BM_DepartmentProvider extends MainProvider
{

    /**
     * 构造函数
     */
    public function __construct()
    {

    }

    /**
     * 获取部门列表
     * @return array|void
     */
    public static function getList()
    {
        try {
            $table = 'BM_Department t1 LEFT JOIN (SELECT bm_DtptID,bm_DtptName FROM BM_Department) t2 ON t1.bm_FDtptID = t2.bm_DtptID';
            $fields = 't1.bm_DtptID AS id,t1.bm_DtptName AS name,t1.bm_FDtptID AS _parentId,t1.bm_DtptPRI AS pri, t1.bm_DtptState AS status,
                t2.bm_DtptName AS pname';
            $where = 't1.bm_DtptState = ? ORDER BY t1.bm_DtptPRI,t1.bm_DtptID';
            $list = self::$db->select($table, $fields, $where, array(0)
            );
            //删除没有父级节点的_parentId
            foreach ($list as $key => $v) {
                if ($list[$key]['_parentId'] == 0) {
                    unset($list[$key]['_parentId']);
                }
                $list[$key]['iconCls'] = 'icon-null';
            }
            $gridList = array();
            $gridList['rows'] = $list;
            return $gridList;

        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**修改部门信息
     * @param $row
     */
    public static function putRow($row)
    {
        try {
            $ret = self::$db->select('BM_Department','bm_DtptID', 'bm_DtptID=?', array($row['id']));
            if (empty($ret)) {
                return false;
            }

            $update = array(
                "bm_DtptName" => $row['name'],
                "bm_FDtptID" => intval($row['_parentId'])
            );
            $ret = self::$db->update('BM_Department', $update, 'bm_DtptID=?', array($row['id']));
            return $ret;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**添加部门
     * @param $row
     */
    public static function addRow($row)
    {
        try {
            $insert = array(
                "bm_DtptName" => $row['name'],
                "bm_FDtptID" => intval($row['pid']),
                "bm_DtptPRI" => $row['pri']);

            $ret = self::$db->insert('BM_Department', $insert);
            return $ret;

        } catch (Exception $e) {
            throw new Exception($e);
        }

    }

    /**删除部门
     * @param $id
     */
    public static function delRow($row)
    {
        try {
            self::$db->beginTransaction();

            //删除人，级别，部门
            $arr = array();
            MainProvider::getSpecialDeptTree($row['id'], $arr);
            $place_holders = implode(',', array_fill(0, count($arr), '?'));

            $update = array(
                'bm_AccountState' => 99
            );
            self::$db->update('BM_Account', $update, 'bm_DtptID IN(' . $place_holders . ')', $arr);
            $update = array(
                'bm_RankState' => 99
            );
            self::$db->update('BM_Rank', $update, 'bm_DtptID IN(' . $place_holders . ')', $arr);
            $update = array(
                'bm_DtptState' => 99
            );
            $ret = self::$db->update('BM_Department', $update, 'bm_DtptID IN(' . $place_holders . ')', $arr);

            //删除级别里面的模块关系
            self::$db->delete('BM_RankRight', 'bm_RankID IN (select bm_RankID FROM BM_Rank WHERE bm_RankState = 99)');
            //删除人里面的模块关系
            self::$db->delete('BM_AccountModule', 'bm_AccountID in (select bm_AccountID from BM_Account where bm_AccountState = 99)');
            self::$db->commit();
            return $ret;
        } catch (Exception $e) {
            self::$db->rollBack();
            throw new Exception($e);
        }
    }


}
