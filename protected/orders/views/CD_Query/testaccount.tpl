{extends file='../../../main/views/main.tpl'} {block name=body}
	<div class="text">         
         <a href="javascript:void(0)" onclick="add()" title="">新增測試賬號</a>
    </div>
	<div style="margin:20px 0;">
		<table class="easyui-datagrid" title="測試名單" style="width:652px;height:250px"
	            data-options="singleSelect:true,collapsible:true,url:'{$get_data_url}',method:'get'">
	        <thead>
	            <tr>
	                <th data-options="field:'pt_AccountID',width:100">賬號</th>
	                <th data-options="field:'pt_RegisteTime',width:150">註冊時間</th>
	                <th data-options="field:'pt_RegisteIP',width:100">註冊IP</th>
	                <th data-options="field:'order_amount',width:100">儲值金額</th>
	                <th data-options="field:'order_times',width:100">儲值次數</th>
	                <th data-options="field:'bm_AccountID',width:100">添加人</th>
	            </tr>
	        </thead>
		</table>
	</div>
{include file='./inc/addTestAccount.tpl'}
<script>
	function add(){
        $('#addWin').window('open');
    }
</script>
{/block}