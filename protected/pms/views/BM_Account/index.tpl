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
         *    userStatus 用户状态数组
         *    editingId 选中的记录id
         *    randUrl 获取部门拥有级别下拉表url
         */
        var userStatus = {$userStatus};
        var modTree = {$modTree};
        var randUrl;
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
                        $('#grid').datagrid('getSelected')['dept'] = snode.text;
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

                    /*设置分配级别的text*/
                    var ed = $('#grid').datagrid('getEditor', {index: editingId, field: 'randId'});
                    var snode = $(ed.target).combobox('getText');
                    if (snode != null) {
                        $('#grid').datagrid('getSelected')['randName'] = snode;
                    }
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
                $.messager.confirm('删除用户', '你确定要删除该用户吗?', function(r){
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
                title: '用户列表',
                method: 'get',
                singleSelect: true,
                rownumbers: true,
                pagination: true,
                fitColumns: true,
                url: getUrl,
                onBeforeLoad: function (param) {//优化分页参数
                    param.start = ((param.page - 1) * param.rows) < 0 ? 0 : ((param.page - 1) * param.rows);
                    param.limit = param.rows;
                },
                columns: [
                    [
                        {title: '账号', field: 'id', width: 100, align: 'center'},
                        {title: '姓名', field: 'name', width: 100, align: 'center', editor: {
                            type: 'textbox',
                            options: {
                                required: true
                            }
                        }},
                        {title: '所属部门', field: 'deptId', width: 180, align: 'center',
                            formatter: function (value, row) {
                                return row.dept;
                            },
                            editor: {
                                type: 'combotree',
                                options: {
                                    panelHeight: 'auto',
                                    data: deptTree,
                                    onChange: function (newValue, oldValue) {
                                        /*部门变更，级别相对变更*/
                                        var ed = $('#grid').datagrid('getEditor', {index: editingId, field: 'randId'});
                                        randUrl = baseUrl + '&a=GetDeptRand&deptId=' + newValue + '&do';
                                        $(ed.target).combobox('setValue', null);
                                        $(ed.target).combobox('reload', randUrl);
                                    }
                                }
                            }
                        },
                        {title: '分配级别', field: 'randId', width: 180, align: 'center',
                            formatter: function (value, row) {
                                return row.randName;
                            },
                            editor: {
                                type: 'combobox',
                                options: {
                                    panelHeight: 'auto',
                                    valueField: 'id',
                                    textField: 'name',
                                    method: 'get',
                                    url: randUrl,
                                    loadFilter:function(data){
                                        return data.rows;
                                    }
                                }}
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
                        }
                    ]
                ]
            });
        }
        {/literal}
    </script>
{/block}