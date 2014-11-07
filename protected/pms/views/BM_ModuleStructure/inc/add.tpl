<div id="addWin" class="easyui-window" title="添加模块管理" style="padding: 20px"
     data-options="modal:true,minimizable:false,maximizable:false,collapsible:false,closed:true">
    <form id="ff" class="easyui-form" method="post" data-options="novalidate:true">
        <table cellpadding="5">
            <tr>
                <td>模块名称:</td>
                <td><input class="easyui-textbox" type="text" name="name" data-options="required:true"/></td>
            </tr>
            <tr>
                <td>模块状态:</td>
                <td><input class="easyui-textbox" type="text" name="status" data-options="required:true"/></td>
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

