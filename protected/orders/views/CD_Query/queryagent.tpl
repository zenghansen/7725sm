{extends file='../../../main/views/main.tpl'} {block name=body}
	<table id="grid" style="width:755px;"></table>
	<div class="text">
         <p><span>聯運訂單查詢</span></p>
    </div>
    <div style="margin:20px 0;">
    	<span>日</span><span>期：</span>
    	<input id="date_from" class="easyui-datetimebox" required style="width:200px">
    	<span>至</span>    	
    	<input id="date_to" class="easyui-datetimebox" required style="width:200px">
    </div>
     <div style="margin:20px 0;">
     	<span>聯運商選擇：</span>
    	<select id="select_channel" class="easyui-combobox" name="state" style="width:150px;">
    		<option selected value="请选择聯運商">请选择聯運商</option>
    	</select>
    	
    	<span>&nbsp;&nbsp;遊戲選擇：</span>
    	<select id="select_game" class="easyui-combobox" name="state" style="width:150px;">
    		<option selected value="请选择遊戲">请选择遊戲</option>
    	</select>
    	
    	<span>&nbsp;&nbsp;金流選擇：</span>
    	<select id="select_money_source" class="easyui-combobox" name="state" style="width:150px;">
    		<option selected value="请选择金流">请选择金流</option>
    	</select>
     </div>
     
     <div style="margin:20px 0;">
     	<span>聯運商單號：</span>
     	<input id="pt_order_id" class="easyui-textbox" style="width:150px;height:30px">
     	<span>&nbsp;&nbsp;研發商單號：</span>
     	<input id="source_order_id" class="easyui-textbox" style="width:150px;height:30px">
     	<span>&nbsp;&nbsp;金流單號：</span>
     	<input id="source_order_id" class="easyui-textbox" style="width:150px;height:30px">
     </div>
     <div style="margin:20px 0;">     	
     	<span>&nbsp;&nbsp;儲值金額：</span>
     	<input id="order_amount_from" class="easyui-textbox" style="width:150px;height:30px">
     	<span>&nbsp;&nbsp;至&nbsp;&nbsp;</span>
     	<input id="order_amount_to" class="easyui-textbox" style="width:150px;height:30px">
     </div>
     
     <div style="margin:20px 0;">
	    <a href="javascript:void(0)" class="easyui-linkbutton" style="width:100px;height:30px" onclick="">查詢</a>
	    <a href="javascript:void(0)" class="easyui-linkbutton" style="width:100px;height:30px" onclick="">導出excel</a>	    
	</div>
	
	<div style="margin:20px 0;">    
	    <table id="query_result_grid" class="easyui-datagrid" title="訂單查詢結果" style="width:700px;height:250px"
	            data-options="singleSelect:true,collapsible:true,url:'datagrid_data1.json',method:'get'">
	        <thead>
	            <tr>
	                <th data-options="field:'time',width:40">時間</th>
	                <th data-options="field:'pt_order_id',width:40">平臺單號</th>
	                <th data-options="field:'jinliu',width:40,align:'right'">金流</th>
	                <th data-options="field:'jinliutongdao',width:40,align:'right'">金流通道</th>
	                <th data-options="field:'source_order_id',width:40">金流單號</th>
	                <th data-options="field:'pay_time',width:40,align:'center'">支付時間</th>
	                <th data-options="field:'account',width:40,align:'center'">賬號</th>
	                <th data-options="field:'channel',width:40,align:'center'">渠道</th>
	                <th data-options="field:'role_name',width:40,align:'center'">角色名</th>
	                <th data-options="field:'game',width:40,align:'center'">遊戲</th>
	                <th data-options="field:'server_id',width:40,align:'center'">伺服器號</th>
	                <th data-options="field:'order_amount',width:40,align:'center'">金額</th>
	                <th data-options="field:'currency',width:40,align:'center'">幣種</th>
	                <th data-options="field:'twd',width:40,align:'center'">金額臺幣</th>
	                <th data-options="field:'gold',width:40,align:'center'">元寶</th>
	                <th data-options="field:'order_type',width:40,align:'center'">訂單類型</th>
	                <th data-options="field:'order_state',width:40,align:'center'">訂單狀態</th>
	                <th data-options="field:'pay_state',width:40,align:'center'">收款狀態</th>
	                <th data-options="field:'option',width:40,align:'center'">操作</th>
	            </tr>
	        </thead>
	       </table>
     </div>
{/block}