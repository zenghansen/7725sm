<?php /* Smarty version Smarty-3.1.11, created on 2014-11-06 11:44:58
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\passport\views\PT_Info\QueryAutoReg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18660545aeeba967815-91643064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b4a9133b11cd7778a4ae08f1418918fa68e07eb' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\passport\\views\\PT_Info\\QueryAutoReg.tpl',
      1 => 1415190243,
      2 => 'file',
    ),
    '25aaf0ccfe73661d98563812afa31181a98c2019' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\main\\views\\main.tpl',
      1 => 1414478192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18660545aeeba967815-91643064',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uid' => 0,
    'topMenus' => 0,
    'v' => 0,
    'secondMenus' => 0,
    'deptTree' => 0,
    'modUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_545aeebae12e36_37702005',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545aeebae12e36_37702005')) {function content_545aeebae12e36_37702005($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/css/style.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="js/libs/jquery-easyui-1.4/themes/metro/easyui.css">
    <link rel="stylesheet" type="text/css" href="js/libs/jquery-easyui-1.4/themes/icon.css">
    <script src="js/libs/jquery-1.7.2.min.js"></script>
    <script src="js/libs/jquery.cookie.js"></script>
    <script src="js/libs/jquery-easyui-1.4/jquery.easyui.min.js"></script>
    <script src="js/common.js"></script>
    <script src="js/main.js"></script>
    <title>7725綜合作業系統</title>
</head>
<body>
<!--頭部-->
<div id="header">
    <div class="wrapper">
        <p class="title">
            7725<span>&nbsp;綜合作業系統</span>
        </p>

        <p class="user">
            歡迎您，<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
！<a href="javascript:void(0)" id="modPsw" title="">修改密碼</a><span>
					| </span><a href="javascript:location.href = logOutUrl">退出系統</a>
        </p>
        <ul id="menu">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['topMenus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <li id="topMenu<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
                    <a href="<?php if (empty($_smarty_tpl->tpl_vars['v']->value['url'])){?> / <?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a></li>
            <?php } ?>
        </ul>
    </div>
</div>

<!--中間內容區域-->
<div class="wrapper body">
    <?php if (!empty($_smarty_tpl->tpl_vars['secondMenus']->value)){?>
        <div id="subMenu">
            <ul id="secondMenus" class="easyui-tree"></ul>
        </div>
    <?php }?>
    <div class="content">
    <div class="text">
        <p><span>快速登入賬號查詢 （玩家移除 app 后重置账号及密码）</span></p>
    </div>

    <div style="margin:20px 0;">
        <span>遊戲名</span>
        <select id="select_channel" class="easyui-combobox" name="state" style="width:150px;" data-options="panelHeight: 'auto'">
            <option selected value="请选择">请选择</option>
        </select>

        <span>角色名</span>
        <input id="pt_order_id" class="easyui-textbox" style="width:150px;height:30px">

        <span>伺服器</span>
        <select id="select_channel" class="easyui-combobox" name="state" style="width:150px;" data-options="panelHeight: 'auto'">
            <option selected value="请选择">请选择</option>
        </select>
    </div>

    <div style="margin:20px 0;">
        <span>登入時段</span>
        <select id="select_channel" class="easyui-combobox" name="state" style="width:150px;">
            <option selected value="请选择">请选择</option>
        </select>
    </div>

    <div style="margin:20px 0;">
        <table id="query_result_grid" class="easyui-datagrid" title="帳號查詢結果" style="width:700px;height:250px"
               data-options="collapsible:true,url:'datagrid_data1.json',method:'get'">
            <thead>
            <tr>
                <th data-options="field:'time',width:100,align:'center'">登入用戶名</th>
                <th data-options="field:'pt_order_id',width:100,align:'center'">密碼</th>
            </tr>
            </thead>
        </table>
    </div>

</div>
</div>
<!--腳部版權-->
<div class="footer middles">飛魚數位遊戲股份有限公司|7725.com 版權所有
    Copyright&copy;2013
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../../../index/views/index/inc/modpsw.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script>
    var deptTree = <?php echo $_smarty_tpl->tpl_vars['deptTree']->value;?>
;
    /**
     * 数据表单地址
     * baseUrl 当前地址
     */
    var modPswUrl = '?c=Index&a=ModPsw&do';
    var logOutUrl = '?c=Login&a=LogOut&do';

    <?php if (!empty($_smarty_tpl->tpl_vars['secondMenus']->value)){?>
    var baseUrl = '<?php echo $_smarty_tpl->tpl_vars['modUrl']->value;?>
';
    var getUrl = '<?php echo $_smarty_tpl->tpl_vars['modUrl']->value;?>
&a=GetList&do';
    var putUrl = '<?php echo $_smarty_tpl->tpl_vars['modUrl']->value;?>
&a=PutRow&do';
    var addUrl = '<?php echo $_smarty_tpl->tpl_vars['modUrl']->value;?>
&a=AddRow&do';
    var delUrl = '<?php echo $_smarty_tpl->tpl_vars['modUrl']->value;?>
&a=DelRow&do';
    <?php }?>
    $(function ($) {
        modPsw();
        topMenu();
        $.ajaxSetup({    //禁用ajax缓存
            cache:false
        });
        <?php if (!empty($_smarty_tpl->tpl_vars['secondMenus']->value)){?>
        loadSecondMenus(<?php echo $_smarty_tpl->tpl_vars['secondMenus']->value;?>
);
        <?php }?>
    })

</script>

<?php }} ?>