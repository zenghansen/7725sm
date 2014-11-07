<?php /* Smarty version Smarty-3.1.11, created on 2014-11-06 19:31:01
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\pms\views\BM_Department\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:224015448c2871ea3e2-02106152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cd7030a66cc574089c5f21807ca0a011ecfca95' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\pms\\views\\BM_Department\\index.tpl',
      1 => 1415273456,
      2 => 'file',
    ),
    '25aaf0ccfe73661d98563812afa31181a98c2019' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\main\\views\\main.tpl',
      1 => 1415273163,
      2 => 'file',
    ),
    '66a79d62f5287fe219915095b2cedaf7900bf9b1' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\pms\\views\\BM_Department\\inc\\add.tpl',
      1 => 1415273126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224015448c2871ea3e2-02106152',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5448c2878a4ff2_35985314',
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
<?php if ($_valid && !is_callable('content_5448c2878a4ff2_35985314')) {function content_5448c2878a4ff2_35985314($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="add()">添加</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="edit()">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="save()">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="cancel()">取消</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="del()">删除</a>
    </div>
    <table id="deptTreeGrid" style="width:755px;"></table>
    <script>
        /**
         *    deptStatus 部门状态数组
         *    editingId 选中的记录id
         */
        var deptStatus = <?php echo $_smarty_tpl->tpl_vars['deptStatus']->value;?>
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
            var row = $('#deptTreeGrid').treegrid('getSelected');
            if (row) {
                editingId = row.id
                $('#deptTreeGrid').treegrid('beginEdit', editingId);
            }
        }
        function save() {
            if (editingId != undefined) {
                if ($('#deptTreeGrid').treegrid('validateRow', editingId)) {
                    var ed = $('#deptTreeGrid').treegrid('getEditor', {index: editingId, field: '_parentId'});
                    var snode = $(ed.target).combotree('tree').tree('getSelected');
                    if (snode != null) {
                        $('#deptTreeGrid').treegrid('getSelected')['pname'] = snode.text;
                    }
                    $('#deptTreeGrid').treegrid('endEdit', editingId);
                    editingId = undefined;
                    var row = $('#deptTreeGrid').treegrid('getSelected');
                    delete row['children'];
                    $.post(putUrl, {row: row}, function (data) {
                        if (!data.ret) {
                            alert('操作失败！');
                            $('#deptTreeGrid').treegrid('reload');
                            return;
                        }
                        alert('操作成功');
                        $('#deptTreeGrid').treegrid('reload');
                    }, 'json')

                }
            }
        }
        function cancel() {
            if (editingId != undefined) {
                $('#deptTreeGrid').treegrid('cancelEdit', editingId);
                editingId = undefined;
            }
        }

        function del() {
            var row = $('#deptTreeGrid').treegrid('getSelected');
            if (row) {
                $.messager.confirm('删除部门', '你确定要删除该部门吗?', function (r) {
                    if (r) {
                        $.post(delUrl, {id: row.id}, function (data) {
                            if (!data.ret) {
                                alert('操作失败！');
                                $('#deptTreeGrid').treegrid('reload');
                                return;
                            }
                            alert('操作成功');
                            $('#deptTreeGrid').treegrid('reload');
                        }, 'json')
                    }
                });
            }
        }
        function initList() {
            $('#deptTreeGrid').treegrid({
                title: '部门列表',
                rownumbers: true,
                url: getUrl,
                idField: 'id',
                treeField: 'name',
                columns: [
                    [
                        {title: '部门名称', field: 'name', width: 300, align: 'left', editor: {
                            type: 'textbox',
                            options: {
                                required: true
                            }
                        }},
                        {title: '父级部门', field: '_parentId', width: 180, align: 'center',
                            formatter: function (value, row) {
                                return row.pname;
                            },
                            editor: {
                                type: 'combotree',
                                options: {
                                    panelHeight: 'auto',
                                    data: deptTree
                                }
                            }
                        },
                        {title: '排序', field: 'pri', width: 50, align: 'center', editor: 'numberbox'}
                    ]
                ]
            });
        }
        
        
        function add() {
            
            <?php /*  Call merged included template "./inc/add.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('./inc/add.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '224015448c2871ea3e2-02106152');
content_545b5bf59006c8_42484059($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "./inc/add.tpl" */?>
            
            $('#addWin').window('open');
        }
        
    </script>
</div>
</div>
<!--腳部版權-->
<div class="footer middles">飛魚數位遊戲股份有限公司|7725.com 版權所有
    Copyright&copy;2013
</div>

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

<?php }} ?><?php /* Smarty version Smarty-3.1.11, created on 2014-11-06 19:31:01
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\pms\views\BM_Department\inc\add.tpl" */ ?>
<?php if ($_valid && !is_callable('content_545b5bf59006c8_42484059')) {function content_545b5bf59006c8_42484059($_smarty_tpl) {?><div id="addWin" class="easyui-window" title="添加部门" style="padding: 20px;"
     data-options="modal:true,minimizable:false,maximizable:false,collapsible:false,closed:true">
    <form id="ff" class="easyui-form" method="post" data-options="novalidate:true">
        <table cellpadding="5">
            <tr>
                <td>部门名称:</td>
                <td><input class="easyui-textbox" type="text" name="name" data-options="required:true"/></td>
            </tr>
            <tr>
                <td>父级部门:</td>
                <td><input class="easyui-combotree" name="pid" data-options="data:deptTree,panelHeight:'auto'"></td>
            </tr>
            <tr>
                <td>排序:</td>
                <td><input class="easyui-numberbox" value="0" type="text" name="pri"/></td>
            </tr>

        </table>
    </form>
    <div style="text-align:center;padding:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">提交</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">重置</a>
    </div>
</div>
<script>
    function submitForm(){
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