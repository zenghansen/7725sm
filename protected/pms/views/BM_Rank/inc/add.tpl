<div id="addWin" class="easyui-window" title="添加级别" style="padding: 20px"
     data-options="modal:true,minimizable:false,maximizable:false,collapsible:false,closed:true">
    <form id="ff" class="easyui-form" method="post" data-options="novalidate:true">
        <table cellpadding="5">
            <tr>
                <td>级别名称:</td>
                <td><input class="easyui-textbox" type="text" name="name" data-options="required:true"/></td>
            </tr>
            <tr>
                <td>所属部门:</td>
                <td><input class="easyui-combotree" name="deptId" data-options="data:deptTree,panelHeight:'auto',required:true"></td>
            </tr>
            <tr>
                <td>分配模块:</td>
                <td><input class="easyui-combotree" id="modIds" name="mods" multiple data-options="data:modTree,panelHeight:'auto'"></td>
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
                param.modIds = $('#modIds').combotree('getValues');
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

