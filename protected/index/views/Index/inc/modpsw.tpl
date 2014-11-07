<div id="mofPswWin" class="easyui-window" title="修改密码" style="padding: 20px"
     data-options="modal:true,minimizable:false,maximizable:false,collapsible:false,closed:true">
    <form id="modPswForm" class="easyui-form" method="post" data-options="novalidate:true">
        <table cellpadding="5">
            <tr>
                <td>账号:</td>
                <td>{$uid}</td>
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

