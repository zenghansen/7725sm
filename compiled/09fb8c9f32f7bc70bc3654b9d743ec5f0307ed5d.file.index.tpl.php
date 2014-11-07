<?php /* Smarty version Smarty-3.1.11, created on 2014-10-23 17:20:51
         compiled from "F:\project2014\php\Platform\code\7725sm\protected\index\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:825448c8737ec437-02061453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09fb8c9f32f7bc70bc3654b9d743ec5f0307ed5d' => 
    array (
      0 => 'F:\\project2014\\php\\Platform\\code\\7725sm\\protected\\index\\views\\login\\index.tpl',
      1 => 1414053987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '825448c8737ec437-02061453',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5448c873890552_87684514',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5448c873890552_87684514')) {function content_5448c873890552_87684514($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="js/libs/jquery-1.7.2.min.js"></script>
    <script src="js/libs/jquery.cookie.js"></script>
    <title>登錄頁面DEMO</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            color: #35588a;
            text-align: center;
        }

        body {
            color: #35588a;
            background: #fdfdfd;
            font-family: "微软雅黑";
        }

        form {
            width: 350px;
            margin: 100px auto 0;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            line-height: 50px;
        }

        div {
            font-size: 18px;
            margin-top: 8px;
            text-align: center;
        }

        label {
            line-height: 32px;
        }

        input {
            text-align: left;
            width: 250px;
            height: 36px;
            border: 1px solid #ededed;
            line-height: 36px;
            padding-left: 6px;
        }

        button {
            height: 36px;
        }

        .b {
            text-align: left;
            margin: 10px 0 0 75px;
        }
    </style>

</head>
<body>
<form action="?c=Login&a=LogIn&do" method="post">
    <h1>登錄頁面DEMO</h1>
    <div>
        <label for="username">帳號：</label>&nbsp;<input type="text"
                                                      name="username" id="username" value="admin" />
    </div>
    <div>
        <label for="userpass">密碼：</label>&nbsp;<input type="password"
                                                      name="userpass" id="userpass" value="123456" />
    </div>
    <div class="b">
        <button type="submit">立即登錄</button>
        <button type="reset">重置表單</button>
    </div>
</form>
</body>
</html>
<script>
    $.cookie('topMenu', null);//清空菜单cookie
    $.cookie('secondMenu', null);//清空二级菜单cookie
</script><?php }} ?>