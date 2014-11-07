{extends file='../../../main/views/main.tpl'} {block name=body}

    <div style="margin:20px 0;">
        <span>日</span><span>期：</span>
        <input id="date_from" class="easyui-datetimebox" required style="width:200px">
        <span>至</span>
        <input id="date_to" class="easyui-datetimebox" required style="width:200px" value="">
    </div>

    <div style="margin:20px 0;">
        <span>賬號：</span>
        <input id="input_pt_accountID" class="easyui-textbox" style="width:150px;height:30px">

        <span>帳號來源：</span>
        <select id="select_account_source" class="easyui-combobox" name="state" style="width:150px;" data-options="panelHeight: 'auto'">
            <option selected value="">请选择帳號來源</option>
            <option value="autoregs">autoReg</option>
            <option value="facebook">facebook</option>
            <option value="others">others</option>
        </select>
    </div>

    <div style="margin:20px 0;">
        <span>郵箱：</span>
        <input id="input_pt_email" class="easyui-textbox" style="width:150px;height:30px">

        <span>是否儲值過：</span>
        <select id="select_charge" class="easyui-combobox" name="state" style="width:150px;" data-options="panelHeight: 'auto'">
            <option selected value="none">请选择</option>
            <option value="yes">是</option>
            <option value="no">否</option>
        </select>
    </div>

    <div style="margin:20px 0;">
        <a href="javascript:void(0)" class="easyui-linkbutton" style="width:100px;height:30px" onclick="sure()">确定</a>
    </div>

    <table id="query_result_grid" style="width:755px;"></table>

    <script>

        {literal}  //不需要smarty解析,防止冲突

        $(function ($) {
            initList();
        })

        function sure(){

            var queryParams = $('#query_result_grid').datagrid('options').queryParams;

            queryParams.dateFrom = $("#date_from").datetimebox('getValue');
            queryParams.dateTo = $("#date_to").datetimebox('getValue');

            queryParams.accountID = input_pt_accountID.value;
            queryParams.email =input_pt_email.value;

            queryParams.registeSource = $('#select_account_source').combobox('getValue');
            queryParams.hasCharge =  $('#select_charge').combobox('getValue');

            $('#query_result_grid').datagrid('reload');
        }

        function see(){

        }

        function edit(){

        }

        function initList() {
            $('#query_result_grid').datagrid({
                title:'查詢結果',
                method: 'get',
                pagination: true,
                fitColumns: true,
                rownumbers:true,
                loadMsg:'數據加載中請稍後……',
                url: getUrl,
                onBeforeLoad: function (param) {//优化分页参数
                    param.start = ((param.page - 1) * param.rows) < 0 ? 0 : ((param.page - 1) * param.rows);
                    param.limit = param.rows;
                },
                columns: [
                    [
                        {title: '帳號', field: 'pt_accountID', width: 150, align: 'center'},
                        {title: '註冊時間', field: 'pt_registeTime', width: 300, align: 'center',sortable:true},
                        {title: '來源渠道', field: 'pt_accountSource', width: 150, align: 'center'},
                        {title: '註冊郵箱', field: 'pt_email', width: 300, align: 'center'},
                        {title: '儲值總次數', field: 'cd_chargeTime', width: 150, align: 'center',sortable:true},
                        {title: '儲值總額 臺幣', field: 'cd_totalCharge', width: 150, align: 'center',sortable:true},
                        {title: '操作', field: 'operation', width: 220, align: 'center',
                            formatter:function(value,rec){
                            var btn1 = '<a class="seecls" onclick="see()" href="javascript:void(0)">查看</a>';
                            var btn2 = '<a class="editcls" onclick="edit()" href="javascript:void(0)">编辑</a>';
                            return btn1 + btn2;
                        }  }
                    ]
                ],
                onLoadSuccess:function(data){
                    $('.seecls').linkbutton({text:'查看',plain:true,iconCls:'icon-search'});
                    $('.editcls').linkbutton({text:'编辑',plain:true,iconCls:'icon-edit'});
                }
            });

            var p = $('#query_result_grid').datagrid('getPager');
            $(p).pagination({
//                pageSize: 10,//每页显示的记录条数，默认为10
//                pageList: [5,10,15],//可以设置每页记录条数的列表
                beforePageText: '第',//页数文本框前显示的汉字
                afterPageText: '頁    共 {pages} 頁',
                displayMsg: '當前顯示 {from} - {to} 條記錄   共 {total} 條記錄',
            });
        }

        {/literal}
    </script>
{/block}