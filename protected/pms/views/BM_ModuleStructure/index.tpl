{extends file='../../../main/views/main.tpl'} {block name=body}
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
        var modStatus = {$modStatus};
        var editingId;

        {literal}  //不需要smarty解析,防止冲突

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
        {/literal}
    </script>
{/block}