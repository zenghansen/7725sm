{extends file='../../../main/views/main.tpl'} {block name=body}
    <div style="margin:0 0 10px 0;">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="add()">添加</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="edit()">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="save()">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="cancel()">取消</a>
    </div>
    <table id="grid" style="width:755px;"></table>
    {include file='./inc/add.tpl'}
    <script>
        /**
         *    AaStatus 状态数组
         *    editingId 选中的记录id
         */
        var AaStatus = {$AaStatus};
        var editingId;

        {literal}  //不需要smarty解析,防止冲突

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
                title: '某某列表',
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
                        /*columns*/
                    ]
                ]
            });
        }
        {/literal}
    </script>
{/block}