<?php /* Smarty version Smarty-3.1.11, created on 2014-11-06 15:38:09
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\pms\views\BM_ModuleStructure\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162205448c580c35433-02119912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40d0e29845237aa8a6dc25c5d5e1dbd7ab2e47ef' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\pms\\views\\BM_ModuleStructure\\index.tpl',
      1 => 1414377477,
      2 => 'file',
    ),
    '25aaf0ccfe73661d98563812afa31181a98c2019' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\main\\views\\main.tpl',
      1 => 1415259255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162205448c580c35433-02119912',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5448c5813b1ad3_56979043',
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
<?php if ($_valid && !is_callable('content_5448c5813b1ad3_56979043')) {function content_5448c5813b1ad3_56979043($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
    <div style="margin:0 0 10px 0;">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" onclick="add()">添加</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="edit()">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="save()">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="cancel()">取消</a>
    </div>
    <table id="grid" style="width:755px;"></table>
    <script>
        /**
         *    AaStatus 状态数组
         *    editingId 选中的记录id
         */
        var modStatus = <?php echo $_smarty_tpl->tpl_vars['modStatus']->value;?>
;
        var editingId;

          //不需要smarty解析,防止冲突

        $(function ($) {
            initList();
        })

        function edit() {
            if (editingId != undefined) {
                $('#deptTreeGrid').treegrid('select', editingId);
                return;
            }
            var row = $('#grid').treegrid('getSelected');
            if (row) {
                editingId = row.id
                $('#grid').treegrid('beginEdit', editingId);
            }
        }
        function save() {
            if (editingId != undefined) {
                if ($('#grid').treegrid('validateRow', editingId)) {

                    $('#grid').treegrid('endEdit', editingId);
                    editingId = undefined;
                    var row = $('#grid').treegrid('getSelected');
                    delete row['children'];
                    $.post(putUrl, {row: row}, function (data) {
                        if (!data.ret) {
                            alert('操作失败！');
                            $('#grid').treegrid('reload');
                            return;
                        }
                        alert('操作成功');
                        $('#grid').treegrid('reload');
                    }, 'json')

                }
            }
        }
        function cancel() {
            if (editingId != undefined) {
                $('#grid').datagrid('cancelEdit', editingId);
                editingId = undefined;
            }
        }
        function add() {
            $('#addWin').window('open');
        }

        function initList() {
            $('#grid').treegrid({
                title: '模块列表',
                rownumbers: true,
                url: getUrl,
                idField: 'id',
                treeField: 'name',
                columns: [
                    [
                        {title: '模块名称', field: 'name', width: 300, align: 'left', editor: {
                            type: 'textbox',
                            options: {
                                required: true
                            }
                        }},
                        {title: '父级模块', field: '_parentId', width: 180, align: 'center',
                            formatter: function (value, row) {
                                return row.pname;
                            }
                        },
                        {title: '模块状态', field: 'status', width: 80, align: 'center',
                            formatter: function (value, row) {
                                for (var i = 0; i < modStatus.length; i++) {
                                    if (modStatus[i].id == value) {
                                        return  modStatus[i].name;
                                    }
                                }
                            },
                            editor: {
                                type: 'combobox',
                                options: {
                                    panelHeight: 'auto',
                                    valueField: 'id',
                                    textField: 'name',
                                    data: modStatus,
                                    required: true
                                }}},
                        {title: '排序', field: 'pri', width: 50, align: 'center', editor: 'numberbox'}
                    ]
                ]
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