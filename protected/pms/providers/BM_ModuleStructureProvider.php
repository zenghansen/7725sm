<?php

class BM_ModuleStructureProvider extends MainProvider
{

    /**
     * 构造函数
     */
    public function __construct()
    {

    }

    /**
     * 获取列表树
     * @return array|void
     */
    public static function getList()
    {
        try {
            $table = 'BM_ModuleStructure t1 LEFT JOIN
       (SELECT bm_ModuleID,bm_ModuleName FROM BM_ModuleStructure) t2 ON t1.bm_FModuleID = t2.bm_ModuleID ORDER BY t1.bm_ModulePRI,t1.bm_ModuleID';
            $fields = 't1.bm_ModuleID AS id,t1.bm_ModuleName AS name,t1.bm_FModuleID AS _parentId,t1.bm_ModuleLevel AS level,t1.bm_ModulePRI AS pri, t1.bm_ModuleState AS status,
                t2.bm_ModuleName AS pname';
            $mods = self::$db->select($table, $fields);

            //删除没有父级节点的_parentId
            foreach ($mods as $key => $v) {
                if ($mods[$key]['_parentId'] == 0) {
                    unset($mods[$key]['_parentId']);
                }
                $mods[$key]['iconCls'] = 'icon-null';
            }
            $listTree = array();
            $listTree['rows'] = $mods;
            return $listTree;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**修改
     * @param $row
     */
    public static function putRow($row)
    {
        try {
            $ret = self::$db->select('BM_ModuleStructure', 'bm_ModuleID', 'bm_ModuleID=?', array($row['id']));
            if (empty($ret)) {
                return false;
            }
            $update = array(
                'bm_ModuleState' => intval($row['status']),
                'bm_ModuleName' => $row['name'],
                'bm_ModulePRI' => intval($row['pri'])
            );
            $ret = self::$db->update('BM_ModuleStructure', $update, 'bm_ModuleID=?', array($row['id']));
            return $ret;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**添加
     * @param $row
     */
    public static function addRow($row)
    {
        try {
            $insert = array(
                'bm_ModuleName' => $row['name'],
                'bm_ModuleState' => intval($row['status']),
                'bm_ModulePRI' => intval($row['pri']),
            );
            $ret = self::$db->insert('BM_ModuleStructure', $insert);
            return $ret;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }


}
