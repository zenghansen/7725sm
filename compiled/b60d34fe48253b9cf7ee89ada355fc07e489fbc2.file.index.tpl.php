<?php /* Smarty version Smarty-3.1.11, created on 2014-10-23 19:11:33
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\pms\views\BD_Abvsd\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:253145448e166707039-70424128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b60d34fe48253b9cf7ee89ada355fc07e489fbc2' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\pms\\views\\BD_Abvsd\\index.tpl',
      1 => 1414062690,
      2 => 'file',
    ),
    '25aaf0ccfe73661d98563812afa31181a98c2019' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\main\\views\\main.tpl',
      1 => 1414053987,
      2 => 'file',
    ),
    '52456bdc333fb9e5ff8e5fdb8efba098b347e763' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\pms\\views\\BD_Abvsd\\inc\\add.tpl',
      1 => 1414062690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253145448e166707039-70424128',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5448e166db2240_01265126',
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
<?php if ($_valid && !is_callable('content_5448e166db2240_01265126')) {function content_5448e166db2240_01265126($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
    <div style="margin:0 0 10px 0;">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="add()">添加</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="edit()">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="save()">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="cancel()">取消</a>
    </div>
    <table id="grid" style="width:755px;"></table>
    <?php /*  Call merged included template "./inc/add.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('./inc/add.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '253145448e166707039-70424128');
content_5448e2662b4157_06770323($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "./inc/add.tpl" */?>
    <script>
        /**
         *    BD_AbvsdStatus 状态数组
         *    editingId 选中的记录id
         */
        var BD_AbvsdStatus = <?php echo $_smarty_tpl->tpl_vars['BD_AbvsdStatus']->value;?>
;
        var editingId;

          //不需要smarty解析,防止冲突

        $(function ($) {
            initList();
        })

        function edit() {
            if (editingId != undefined) {
                $('#grid').datagrid('selectRow', editingId);
                return;
            }
            var row = $('#grid').datagrid('getSelected');
            if (row) {
                editingId = $('#grid').datagrid('getRowIndex', row);
                $('#grid').datagrid('beginEdit', editingId);
            }
        }
        function save() {
            if (editingId != undefined) {
                if ($('#grid').datagrid('validateRow', editingId)) {
                    $('#grid').datagrid('endEdit', editingId);
                    editingId = undefined;
                    var row = $('#grid').datagrid('getSelected');
                    $.post(putUrl, {row: row}, function (data) {
                        if (!data.ret) {
                            alert('操作失败！');
                            $('#grid').datagrid('reload');
                            return;
                        }
                        alert('操作成功');
                        $('#grid').datagrid('reload');
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
            $('#grid').datagrid({
                title: '级别列表',
                method: 'get',
                singleSelect: true,
                rownumbers: true,
                pagination: true,
                url: getUrl,
                onBeforeLoad: function (param) {//优化分页参数
                    param.start = ((param.page - 1) * param.rows) < 0 ? 0 : ((param.page - 1) * param.rows);
                    param.limit = param.rows;
                },
                columns: [
                    [
                        {title: '级别名称', field:'name', width:150, align:'center', editor: {
                         type: 'textbox',
                         options: {
                            required: true
                         }
                    }},
                    {title: '所属部门', field:'deptId', width:150, align:'center', editor: {
                         type: 'textbox',
                         options: {
                            required: true
                         }
                    }},
                    {title: '级别状态', field:'status', width:150, align:'center', editor: {
                         type: 'textbox'
                    }},
                    {title: '排序', field:'pri', width:150, align:'center', editor: {
                         type: 'textbox'
                    }}
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
    <?php }?>
    $(function ($) {
        modPsw();
        topMenu();
        <?php if (!empty($_smarty_tpl->tpl_vars['secondMenus']->value)){?>
        loadSecondMenus(<?php echo $_smarty_tpl->tpl_vars['secondMenus']->value;?>
);
        <?php }?>
    })

</script>

<?php }} ?><?php /* Smarty version Smarty-3.1.11, created on 2014-10-23 19:11:34
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\pms\views\BD_Abvsd\inc\add.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5448e2662b4157_06770323')) {function content_5448e2662b4157_06770323($_smarty_tpl) {?><div id="addWin" class="easyui-window" title="添加级别" style="padding: 20px"
     data-options="modal:true,minimizable:false,maximizable:false,collapsible:false,closed:true">
    <form id="ff" class="easyui-form" method="post" data-options="novalidate:true">
        <table cellpadding="5">
            <tr>
                <td>级别名称:</td>
                <td><input class="easyui-textbox" type="text" name="name" data-options="required:true"/></td>
            </tr>
            <tr>
                <td>所属部门:</td>
                <td><input class="easyui-textbox" type="text" name="deptId" data-options="required:true"/></td>
            </tr>
            <tr>
                <td>级别状态:</td>
                <td><input class="easyui-textbox" type="text" name="status"/></td>
            </tr>
            <tr>
                <td>排序:</td>
                <td><input class="easyui-textbox" type="text" name="pri"/></td>
            </tr>
            
        </table>
    </form>
    <div style="text-align:center;padding:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">提交</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">重置</a>
    </div>
</div>
<script>
    function submitForm() {
        $('#ff').form('submit', {
            url: addUrl,
            onSubmit: function (param) {
                return $(this).form('enableValidation').form('validate');
            },
            success: function (data) {
                var data = eval('(' + data + ')');
                if (!data.ret) {
                    alert('操作失败！');
                    return;
                }
                alert('操作成功');
                location.href = baseUrl;
            }
        });
    }
    function clearForm() {
        $('#ff').form('clear');
    }
</script>

<?php }} ?>