<?php /* Smarty version Smarty-3.1.11, created on 2014-11-06 15:36:17
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\passport\views\PT_Info\Query.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17186545aeeb223b3e0-71799065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e00e219240b1113fc0897699fa4476e662b5100' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\passport\\views\\PT_Info\\Query.tpl',
      1 => 1415245371,
      2 => 'file',
    ),
    '25aaf0ccfe73661d98563812afa31181a98c2019' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\main\\views\\main.tpl',
      1 => 1415259255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17186545aeeb223b3e0-71799065',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_545aeeb26b3d66_79010448',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545aeeb26b3d66_79010448')) {function content_545aeeb26b3d66_79010448($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
    <script src="js/libs/jquery-easyui-1.4/locale/easyui-lang-zh_CN.js"></script>
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

    <div style="margin:20px 0;">
        <span>日</span><span>期：</span>
        <input id="date_from" class="easyui-datetimebox" required style="width:200px">
        <span>至</span>
        <input id="date_to" class="easyui-datetimebox" required style="width:200px" value="">
    </div>

    <div style="margin:20px 0;">
        <span>賬號：</span>
        <input id="input_pt_accountID" class="easyui-textbox" style="width:150px;height:30px">

        <span>帳號來源：</span>
        <select id="select_account_source" class="easyui-combobox" name="state" style="width:150px;" data-options="panelHeight: 'auto'">
            <option selected value="">请选择帳號來源</option>
            <option value="autoregs">autoReg</option>
            <option value="facebook">facebook</option>
            <option value="others">others</option>
        </select>
    </div>

    <div style="margin:20px 0;">
        <span>郵箱：</span>
        <input id="input_pt_email" class="easyui-textbox" style="width:150px;height:30px">

        <span>是否儲值過：</span>
        <select id="select_charge" class="easyui-combobox" name="state" style="width:150px;" data-options="panelHeight: 'auto'">
            <option selected value="none">请选择</option>
            <option value="yes">是</option>
            <option value="no">否</option>
        </select>
    </div>

    <div style="margin:20px 0;">
        <a href="javascript:void(0)" class="easyui-linkbutton" style="width:100px;height:30px" onclick="sure()">确定</a>
    </div>

    <table id="query_result_grid" style="width:755px;"></table>

    <script>

          //不需要smarty解析,防止冲突

        $(function ($) {
            initList();
        })

        function sure(){

            var queryParams = $('#query_result_grid').datagrid('options').queryParams;

            queryParams.dateFrom = $("#date_from").datetimebox('getValue');
            queryParams.dateTo = $("#date_to").datetimebox('getValue');

            queryParams.accountID = input_pt_accountID.value;
            queryParams.email =input_pt_email.value;

            queryParams.registeSource = $('#select_account_source').combobox('getValue');
            queryParams.hasCharge =  $('#select_charge').combobox('getValue');

            $('#query_result_grid').datagrid('reload');
        }

        function see(){

        }

        function edit(){

        }

        function initList() {
            $('#query_result_grid').datagrid({
                title:'查詢結果',
                method: 'get',
                pagination: true,
                fitColumns: true,
                rownumbers:true,
                loadMsg:'數據加載中請稍後……',
                url: getUrl,
                onBeforeLoad: function (param) {//优化分页参数
                    param.start = ((param.page - 1) * param.rows) < 0 ? 0 : ((param.page - 1) * param.rows);
                    param.limit = param.rows;
                },
                columns: [
                    [
                        {title: '帳號', field: 'pt_accountID', width: 150, align: 'center'},
                        {title: '註冊時間', field: 'pt_registeTime', width: 300, align: 'center',sortable:true},
                        {title: '來源渠道', field: 'pt_accountSource', width: 150, align: 'center'},
                        {title: '註冊郵箱', field: 'pt_email', width: 300, align: 'center'},
                        {title: '儲值總次數', field: 'cd_chargeTime', width: 150, align: 'center',sortable:true},
                        {title: '儲值總額 臺幣', field: 'cd_totalCharge', width: 150, align: 'center',sortable:true},
                        {title: '操作', field: 'operation', width: 220, align: 'center',
                            formatter:function(value,rec){
                            var btn1 = '<a class="seecls" onclick="see()" href="javascript:void(0)">查看</a>';
                            var btn2 = '<a class="editcls" onclick="edit()" href="javascript:void(0)">编辑</a>';
                            return btn1 + btn2;
                        }  }
                    ]
                ],
                onLoadSuccess:function(data){
                    $('.seecls').linkbutton({text:'查看',plain:true,iconCls:'icon-search'});
                    $('.editcls').linkbutton({text:'编辑',plain:true,iconCls:'icon-edit'});
                }
            });

            var p = $('#query_result_grid').datagrid('getPager');
            $(p).pagination({
//                pageSize: 10,//每页显示的记录条数，默认为10
//                pageList: [5,10,15],//可以设置每页记录条数的列表
                beforePageText: '第',//页数文本框前显示的汉字
                afterPageText: '頁    共 {pages} 頁',
                displayMsg: '當前顯示 {from} - {to} 條記錄   共 {total} 條記錄',
            });
        }

        
    </script>
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