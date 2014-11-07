<?php
/**
 * @todo xl 2014-08-29
 *为了公共配置集中定义，因此将原来各个app下共同的数据定义提出来
 *需要做到程序的兼容，所以对部分相同数据的不同变量名不做统一
 */
return array(
    //部门状态
    'deptStatus' => array(
        array('id' => 0, 'name' => '正常'),
        /*array('id' => 2, 'name' => '隐藏'),*/
        array('id' => 99, 'name' => '删除'),
    ),
    'userStatus' => array(
        array('id' => 0, 'name' => '正常'),
        array('id' => 99, 'name' => '删除'),
    ),
    'modStatus' => array(
        array('id' => 0, 'name' => '普通显示'),
        array('id' => 1, 'name' => '权限显示')/*,
        array('id' => 2, 'name' => '隐藏'),
        array('id' => 99, 'name' => '删除')*/
    ),
    'rankStatus' => array(
        array('id' => 0, 'name' => '正常'),
       /* array('id' => 2, 'name' => '隐藏'),*/
        array('id' => 99, 'name' => '删除')
    )
);
