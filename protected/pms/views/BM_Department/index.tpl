{extends file='../../../main/views/main.tpl'} {block name=body}
<div style="margin:0 0 10px 0;">
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="add()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="edit()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="save()">保存</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="cancel()">取消</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="del()">删除</a>
</div>
<table id="deptTreeGrid" style="width:755px;"></table>
{include file='./inc/add.tpl'}

<script>
    /**
     *    deptStatus 部门状态数组
     *    editingId 选中的记录id
     */
    var deptStatus = {$deptStatus};
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
        var row = $('#deptTreeGrid').treegrid('getSelected');
        if (row) {
            editingId = row.id
            $('#deptTreeGrid').treegrid('beginEdit', editingId);
        }
    }
    function save() {
        if (editingId != undefined) {
            if ($('#deptTreeGrid').treegrid('validateRow', editingId)){
                var ed = $('#deptTreeGrid').treegrid('getEditor', {index:editingId,field:'_parentId'});
                var snode = $(ed.target).combotree('tree').tree('getSelected');
                if(snode != null){
                    $('#deptTreeGrid').treegrid('getSelected')['pname'] = snode.text;
                }
                $('#deptTreeGrid').treegrid('endEdit', editingId);
                editingId = undefined;
                var row = $('#deptTreeGrid').treegrid('getSelected');
                delete row['children'];
                $.post(putUrl,{row:row},function(data){
                    if(!data.ret){
                        alert('操作失败！');
                        $('#deptTreeGrid').treegrid('reload');
                        return;
                    }
                    alert('操作成功');
                    $('#deptTreeGrid').treegrid('reload');
                },'json')

            }
        }
    }
    function cancel() {
        if (editingId != undefined) {
            $('#deptTreeGrid').treegrid('cancelEdit', editingId);
            editingId = undefined;
        }
    }
    function add(){
        $('#addWin').window('open');
    }
    function del(){
        var row = $('#deptTreeGrid').treegrid('getSelected');
        if (row) {
            $.messager.confirm('删除部门', '你确定要删除该部门吗?', function(r){
                if (r){
                    $.post(delUrl,{id:row.id},function(data){
                        if(!data.ret){
                            alert('操作失败！');
                            $('#deptTreeGrid').treegrid('reload');
                            return;
                        }
                        alert('操作成功');
                        $('#deptTreeGrid').treegrid('reload');
                    },'json')
                }
            });
        }
    }
    function initList(){
        $('#deptTreeGrid').treegrid({
            title:'部门列表',
            rownumbers: true,
            url:getUrl,
            idField:'id',
            treeField:'name',
            columns: [
                [
                    {title: '部门名称', field: 'name', width: 300, align: 'left', editor: {
                        type: 'textbox',
                        options: {
                            required: true
                        }
                    }},
                    {title: '父级部门', field: '_parentId', width: 180, align: 'center',
                        formatter:function(value,row){
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
    {/literal}
</script>

{/block}