{extends file='../../../main/views/main.tpl'} {block name=body}
    <div style="margin:0 0 10px 0;">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="add()">添加</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="edit()">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="save()">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="cancel()">取消</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="del()">删除</a>
    </div>
    <table id="grid" style="width:755px;"></table>
    {include file='./inc/add.tpl'}
    <script>
        /**
         *    AaStatus 状态数组
         *    editingId 选中的记录id
         */
        var rankStatus = {$rankStatus};
        var modTree = {$modTree};
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
                    /*设置所属机构的text*/
                    var ed = $('#grid').datagrid('getEditor', {index: editingId, field: 'deptId'});
                    var snode = $(ed.target).combotree('tree').tree('getSelected');
                    if (snode != null) {
                        $('#grid').datagrid('getSelected')['deptName'] = snode.text;
                    }
                    /*设置分配模块的text*/
                    var ed = $('#grid').datagrid('getEditor', {index: editingId, field: 'modIds'});
                    var snode = $(ed.target).combotree('tree').tree('getChecked');
                    var nameArr = new Array();
                    if (snode != null) {
                        snode.forEach(function (val) {
                            nameArr.push(val.text)
                        })
                        nameArr = nameArr.join();
                    }
                    $('#grid').datagrid('getSelected')['modNames'] = nameArr;
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
        function del(){
            var row = $('#grid').datagrid('getSelected');
            if (row) {
                $.messager.confirm('删除用户', '你确定要删除该级别吗?', function(r){
                    if (r){
                        $.post(delUrl,{id:row.id},function(data){
                            if(!data.ret){
                                alert('操作失败！');
                                $('#grid').datagrid('reload');
                                return;
                            }
                            alert('操作成功');
                            $('#grid').datagrid('reload');
                        },'json')
                    }
                });
            }
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
                        {title: '级别名称', field: 'name', width: 150, align: 'center', editor: {
                            type: 'textbox',
                            options: {
                                required: true
                            }
                        }},
                        {title: '所属部门', field: 'deptId', width: 180, align: 'center',
                            formatter: function (value, row) {
                                return row.deptName;
                            },
                            editor: {
                                type: 'combotree',
                                options: {
                                    panelHeight: 'auto',
                                    data: deptTree
                                }
                            }
                        },
                        {title: '分配模块', field: 'modIds', width: 180, align: 'center',
                            formatter: function (value, row) {
                                return row.modNames;
                            },
                            editor: {
                                type: 'combotree',
                                options: {
                                    multiple: true,
                                    panelHeight: 'auto',
                                    data: modTree
                                }
                            }
                        },
                        {title: '排序', field: 'pri', width: 50, align: 'center', editor: {
                            type: 'textbox'
                        }}
                    ]
                ]
            });
        }
        {/literal}
    </script>
{/block}