{extends file='../../../main/views/main.tpl'} {block name=body}
    <div class="text">
        <p><span>快速登入賬號查詢 （玩家移除 app 后重置账号及密码）</span></p>
    </div>

    <div style="margin:20px 0;">
        <span>遊戲名</span>
        <select id="select_channel" class="easyui-combobox" name="state" style="width:150px;" data-options="panelHeight: 'auto'">
            <option selected value="请选择">请选择</option>
        </select>

        <span>角色名</span>
        <input id="pt_order_id" class="easyui-textbox" style="width:150px;height:30px">

        <span>伺服器</span>
        <select id="select_channel" class="easyui-combobox" name="state" style="width:150px;" data-options="panelHeight: 'auto'">
            <option selected value="请选择">请选择</option>
        </select>
    </div>

    <div style="margin:20px 0;">
        <span>登入時段</span>
        <select id="select_channel" class="easyui-combobox" name="state" style="width:150px;">
            <option selected value="请选择">请选择</option>
        </select>
    </div>

    <div style="margin:20px 0;">
        <table id="query_result_grid" class="easyui-datagrid" title="帳號查詢結果" style="width:700px;height:250px"
               data-options="collapsible:true,url:'datagrid_data1.json',method:'get'">
            <thead>
            <tr>
                <th data-options="field:'time',width:100,align:'center'">登入用戶名</th>
                <th data-options="field:'pt_order_id',width:100,align:'center'">密碼</th>
            </tr>
            </thead>
        </table>
    </div>

{/block}