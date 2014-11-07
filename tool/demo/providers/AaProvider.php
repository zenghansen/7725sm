<?php

class AsProvider extends MainProvider
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
        $getSql = null;
        $list = self::getBySql($getSql, array($start, $limit));
        if ($list === false) {
            return false;
        }
        $sql = 'select count(1) as num from BM_Account';
        $num = self::getBySql($sql);
        $grid = array();
        $grid['rows'] = $list;
        $grid['total'] = $num[0]['num'];
        return $grid;
    }

    /**修改
     * @param $row
     */
    public static function putRow($row)
    {
        $ckSql = null;
        $ckRet = self::getBySql($ckSql, array($row['id']));
        if ($ckRet) {
            $putSql = null;
            $ret = self::getBySql($putSql, $putArr = null);
            if ($ret !== false) {
                return true;
            }
        }
        return false;
    }

    /**添加
     * @param $row
     */
    public static function addRow($row)
    {
        $addSql = null;
        $addArr = null;
        return $ret = self::getBySql($addSql, $addArr);
    }


}
