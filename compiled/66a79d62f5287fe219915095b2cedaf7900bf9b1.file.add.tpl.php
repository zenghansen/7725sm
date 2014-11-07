<?php /* Smarty version Smarty-3.1.11, created on 2014-11-06 15:30:39
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\pms\views\BM_Department\inc\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14251545b1fdcc267c9-85788582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66a79d62f5287fe219915095b2cedaf7900bf9b1' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\pms\\views\\BM_Department\\inc\\add.tpl',
      1 => 1415259034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14251545b1fdcc267c9-85788582',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_545b1fdcc749d9_93185372',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545b1fdcc749d9_93185372')) {function content_545b1fdcc749d9_93185372($_smarty_tpl) {?><div id="addWin" class="easyui-window" title="添加部门" style="padding: 20px"
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