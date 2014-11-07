<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 14-10-17
 * Time: 上午10:40
 * To change this template use File | Settings | File Templates.
 */
new main();
class main
{
    /*生成目录*/
    private static $dir = 'F:/project2014/php/Platform/code/7725sm/protected/';
    /*大模块名称*/
    private static $moudleName = 'pms';
    /*小模块名称*/
    private static $name = 'BD_Abvsd';
    /*小模块名*/
    private static $niName = '级别';
    /*数据表名*/
    private static $tbName = 'BM_Rank';
    /*数据库字段数组(别名，原名，类型,描述，必须,),自增id必须第一位*/
    private static $dbArr = array(
        array('id', 'bm_RankID', 'int', '主键', true),
        array('name', 'bm_RankName', 'string', '级别名称', true),
        array('deptId', 'bm_DtptID', 'int', '所属部门', true),
        array('status', 'bm_RankState', 'int', '级别状态', false),
        array('pri', 'bm_RankPRI', 'int', '排序', false)
    );


    public function  __construct($d = null, $m = null, $n = null, $ni = null, $db = null, $arr = null)
    {
        if ($d != null && $m != null && $n != null && $db != null && $arr != null) {
            self::$dir = $d;
            self::$moudleName = $m;
            self::$name = $n;
            self::$niName = $ni;
            self::$tbName = $db;
            self::$dbArr = $arr;
        }
        if (!is_dir(self::$dir . self::$moudleName)) {
            mkdir(self::$dir . self::$moudleName);
        }
        $this->makeControllers();
        $this->makeProviders();
        $this->makeIndexView();
        $this->makeAddView();
    }

    private function makeControllers()
    {
        if (!is_dir(self::$dir . self::$moudleName . '/controllers')) {
            mkdir(self::$dir . self::$moudleName . '/controllers');
        }
        $cname = self::$dir . self::$moudleName . '/controllers/' . ucfirst(self::$name) . 'Controller.php';
        $fc = file_get_contents('./demo/controllers/AaController.php');
        $fc = str_replace("某某模块", self::$niName . '模块', $fc);
        $fc = str_replace('class AaController', 'class ' . ucfirst(self::$name) . 'Controller', $fc);
        $fc = str_replace('AaStatus', self::$name . 'Status', $fc);
        $fc = str_replace('AaProvider',ucfirst(self::$name).'Provider', $fc);
        /*put*/
        $pstr = '';
        foreach (self::$dbArr as $v) {
            if ($v[4]) {
                $pstr .= '!empty($post[\'' . $v[0] . '\']) && ';
            }
        }
        $pstr = substr($pstr, 0, -4);

        $fc = str_replace("!empty(\$post['put'])", $pstr, $fc);
        /*add*/
        $astr = '';
        foreach (self::$dbArr as $v) {
            if ($v[0] != 'id' && $v[4]) {
                $astr .= '!empty($post[\'' . $v[0] . '\']) && ';
            }
        }
        $astr = substr($astr, 0, -4);

        $fc = str_replace("!empty(\$post['add'])", $astr, $fc);
        file_put_contents($cname, $fc);
    }

    private function makeProviders()
    {
        if (!is_dir(self::$dir . self::$moudleName . '/providers')) {
            mkdir(self::$dir . self::$moudleName . '/providers');
        }
        $cname = self::$dir . self::$moudleName . '/providers/' . ucfirst(self::$name) . 'Provider.php';
        $fc = file_get_contents('./demo/providers/AaProvider.php');
        $fc = str_replace('class AsProvider', 'class ' . ucfirst(self::$name) . 'Provider', $fc);
        /*get*/
        $gSql = '$getSql = \'select ';
        foreach (self::$dbArr as $v) {
            $gSql .= $v[1] . ' as ' . $v[0] . ',';
        }
        $gSql = substr($gSql, 0, -1);
        $gSql .= ' from ' . self::$tbName . ' limit %d,%d\';';
        $fc = str_replace('$getSql = null;', $gSql, $fc);
        $fc = str_replace('BM_Account', self::$tbName, $fc);
        /*put*/
        $ckSql = '$ckSql = \'select 1 from ' . self::$tbName . ' where '.self::$dbArr[0][1].' = %d\';';
        $pSql = '$putSql = \'update ' . self::$tbName . ' set ';
        $pArr = 'array(';
        foreach (self::$dbArr as $v) {
            if ($v[0] != 'id') {
                if ($v[2] == 'int') $df = '%d';
                if ($v[2] == 'string') $df = '%s';
                $pSql .= $v[1] . '=' . $df . ',';
                $pArr .= '$row[\'' . $v[0] . '\'], ';
            }
        }
        $pSql = substr($pSql, 0, -1);
        $pArr .= '$row[\'' . self::$dbArr[0][0] . '\'])';
        $pSql .= ' where ' . self::$dbArr[0][1] . ' = %d\';';
        $fc = str_replace('$ckSql = null;', $ckSql, $fc);
        $fc = str_replace('$putSql = null;', $pSql, $fc);
        $fc = str_replace('$putArr = null', $pArr, $fc);
        /*add*/
        $aSql = '$addSql = \'insert into ' . self::$tbName . ' (';
        $aArr = '$addArr = array(';
        foreach (self::$dbArr as $v) {
            if ($v[0] != 'id') {
                $aSql .= $v[1] . ',';
                $aArr .= '$row[\'' . $v[0] . '\'], ';
            }
        }
        $aSql = substr($aSql, 0, -1);
        $aSql .= ') value (';

        foreach (self::$dbArr as $v) {
            if ($v[0] != 'id') {
                if ($v[2] == 'int') $df = '%d';
                if ($v[2] == 'string') $df = '%s';
                $aSql .= $df . ',';
            }
        }
        $aSql = substr($aSql, 0, -1);
        $aSql .= ')\';';
        $aArr = substr($aArr, 0, -2);
        $aArr .= ');';
        $fc = str_replace('$addSql = null;', $aSql, $fc);
        $fc = str_replace('$addArr = null;', $aArr, $fc);

        file_put_contents($cname, $fc);
    }
    private function makeModel(){
        if (!is_dir(self::$dir . self::$moudleName . '/models')) {
            mkdir(self::$dir . self::$moudleName . '/models');
        }
        $cname = self::$dir . self::$moudleName . '/models/' . ucfirst(self::$name) . 'Model.php';
        $fc = file_get_contents('./demo/models/AaModel.php');
        $fc = str_replace('class AsModel', 'class ' . ucfirst(self::$name) . 'Model', $fc);

    }

    private function makeIndexView()
    {
        if (!is_dir(self::$dir . self::$moudleName . '/views')) {
            mkdir(self::$dir . self::$moudleName . '/views');
        }
        if (!is_dir(self::$dir . self::$moudleName . '/views/' . self::$name)) {
            mkdir(self::$dir . self::$moudleName . '/views/' . self::$name);
        }
        $cname = self::$dir . self::$moudleName . '/views/' . self::$name;
        $fc = file_get_contents('./demo/views/Aa/index.tpl');

        $fc = str_replace('AaStatus', self::$name . 'Status', $fc);
        $fc = str_replace('某某列表', self::$niName . '列表', $fc);
        /*columns*/
        $cStr = '';
        foreach (self::$dbArr as $key => $v) {
            if ($v[0] != 'id') {
                $cStr .= '{title: \'';
                $cStr .= $v[3] . '\', field:\'' . $v[0] . '\', width:150, align:\'center\', editor: {' . "\r\n";
                $cStr .= '                         type: \'textbox\'';
                if ($v[4]) {
                    $cStr .= ',';
                    $cStr .= "\r\n";
                    $cStr .= '                         options: {' . "\r\n";
                    $cStr .= '                            required: true' . "\r\n";
                    $cStr .= '                         }' . "\r\n";
                } else
                    $cStr .= "\r\n";
                if ($key + 1 == count(self::$dbArr))
                    $cStr .= '                    }}';
                else
                    $cStr .= '                    }},' . "\r\n" . '                    ';
            }
        }
        $fc = str_replace('/*columns*/', $cStr, $fc);
        file_put_contents($cname . '/index.tpl', $fc);
    }

    private function makeAddView()
    {
        if (!is_dir(self::$dir . self::$moudleName . '/views/' . self::$name . '/inc')) {
            mkdir(self::$dir . self::$moudleName . '/views/' . self::$name . '/inc');
        }
        $cname = self::$dir . self::$moudleName . '/views/' . self::$name . '/inc';

        $fc = file_get_contents('./demo/views/Aa/inc/add.tpl');

        $fc = str_replace('添加某某', '添加' . self::$niName, $fc);
        $fc = str_replace('demo&c=Aa', self::$moudleName . '&c=' . ucfirst(self::$name), $fc);
        /*columns*/
        $cStr = '';
        foreach (self::$dbArr as $key => $v) {
            if ($v[0] != 'id') {
                $cStr .= '<tr>' . "\r\n";
                $cStr .= '                <td>' . $v[3] . ':</td>' . "\r\n";
                $cStr .= '                <td><input class="easyui-textbox" type="text" name="' . $v[0] . '"';
                if ($v[4]) {
                    $cStr .= ' data-options="required:true"';
                }
                $cStr .= '/></td>' . "\r\n";
                $cStr .= '            </tr>' . "\r\n" . '            ';
            }
        }
        $fc = str_replace('<!--columns-->', $cStr, $fc);
        file_put_contents($cname . '/add.tpl', $fc);
    }

}