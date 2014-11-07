<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/css/style.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="js/libs/jquery-easyui-1.4/themes/metro/easyui.css">
    <link rel="stylesheet" type="text/css" href="js/libs/jquery-easyui-1.4/themes/icon.css">
    <script src="js/libs/jquery-1.7.2.min.js"></script>
    <script src="js/libs/jquery.cookie.js"></script>
    <script src="js/libs/jquery-easyui-1.4/jquery.easyui.min.js"></script>
    <script src="js/libs/jquery-easyui-1.4/locale/easyui-lang-zh_CN.js"></script>
    <script src="js/common.js"></script>
    <script src="js/main.js"></script>
    <title>7725綜合作業系統{block name=title}{/block}</title>
</head>
<body>
<!--頭部-->
<div id="header">
    <div class="wrapper">
        <p class="title">
            7725<span>&nbsp;綜合作業系統</span>
        </p>

        <p class="user">
            歡迎您，{$uid}！<a href="javascript:void(0)" id="modPsw" title="">修改密碼</a><span>
					| </span><a href="javascript:location.href = logOutUrl">退出系統</a>
        </p>
        <ul id="menu">
            {foreach from=$topMenus key=k item=v}
                <li id="topMenu{$v.id}">
                    <a href="{if empty($v.url)} / {else}{$v.url}{/if}">{$v.name}</a></li>
            {/foreach}
        </ul>
    </div>
</div>

<!--中間內容區域-->
<div class="wrapper body">
    {if !empty($secondMenus)}
        <div id="subMenu">
            <ul id="secondMenus" class="easyui-tree"></ul>
        </div>
    {/if}
    <div class="content">{block name='body'}{/block}</div>
</div>
<!--腳部版權-->
<div class="footer middles">飛魚數位遊戲股份有限公司|7725.com 版權所有
    Copyright&copy;2013
</div>
{include file='../../../index/views/index/inc/modpsw.tpl'}
</body>
</html>
<script>
    var deptTree = {$deptTree};
    /**
     * 数据表单地址
     * baseUrl 当前地址
     */
    var modPswUrl = '?c=Index&a=ModPsw&do';
    var logOutUrl = '?c=Login&a=LogOut&do';

    {if !empty($secondMenus)}
    var baseUrl = '{$modUrl}';
    var getUrl = '{$modUrl}&a=GetList&do';
    var putUrl = '{$modUrl}&a=PutRow&do';
    var addUrl = '{$modUrl}&a=AddRow&do';
    var delUrl = '{$modUrl}&a=DelRow&do';
    {/if}
    $(function ($) {
        modPsw();
        topMenu();
        $.ajaxSetup({    //禁用ajax缓存
            cache:false
        });
        {if !empty($secondMenus)}
        loadSecondMenus({$secondMenus});
        {/if}
    })

</script>

