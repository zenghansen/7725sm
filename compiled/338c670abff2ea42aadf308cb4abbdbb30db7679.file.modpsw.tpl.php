<?php /* Smarty version Smarty-3.1.11, created on 2014-11-06 14:00:26
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\index\views\index\inc\modpsw.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182405448c280738219-43536230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '338c670abff2ea42aadf308cb4abbdbb30db7679' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\index\\views\\index\\inc\\modpsw.tpl',
      1 => 1415253530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182405448c280738219-43536230',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5448c2807ff5c4_96951407',
  'variables' => 
  array (
    'uid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5448c2807ff5c4_96951407')) {function content_5448c2807ff5c4_96951407($_smarty_tpl) {?><div id="mofPswWin" class="easyui-window" title="修改密码" style="padding: 20px"
     data-options="modal:true,minimizable:false,maximizable:false,collapsible:false,closed:true">
    <form id="modPswForm" class="easyui-form" method="post" data-options="novalidate:true">
        <table cellpadding="5">
            <tr>
                <td>账号:</td>
                <td><?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
</td>
            </tr>
            <tr>
                <td>原密码:</td>
                <td><input class="easyui-textbox" name="oldPsw" type ="password" data-options="required:true" ></td>
            </tr>
            <tr>
                <td>新密码:</td>
                <td><input class="easyui-textbox" id="newPsw1"  data-options="required:true" type ="password" name="newPsw" validType="equals['#newPsw2']"/></td>
            </tr>
            <tr>
                <td>新密码确认:</td>
                <td><input class="easyui-textbox" id="newPsw2"  data-options="required:true" name="oldPsw1" type ="password" validType="equals['#newPsw1']"/></td>
            </tr>
        </table>
    </form>
    <div style="text-align:center;padding:5px">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitModPswForm()">提交</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearModPswForm()">重置</a>
    </div>
</div>
<script>
    $.extend($.fn.validatebox.defaults.rules, {
        equals: {
            validator: function(value,param){
                return value == $(param[0]).val();
            },
            message: '两次密码输入不一致！'
        }
    });
    function submitModPswForm(){
        $('#modPswForm').form('submit', {
            url: modPswUrl,
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
                clearModPswForm();
                $('#mofPswWin').window('close');
            }
        });
    }
    function clearModPswForm() {
        $('#modPswForm').form('clear');
    }
</script>

<?php }} ?>