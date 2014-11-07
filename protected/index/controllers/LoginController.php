<?php

class LoginController extends MainController
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct(true);
    }

    public function actionIndex()
    {
    }

    public function actionLogIn()
    {
        if (isset($_GET['do'])) {
            if (empty($_POST['username']) || empty($_POST['userpass'])) {
                echo '<script>alert(\'用户名或者密码不能为空！\'); history.back();</script>';
                die();

            }
            $user = LoginProvider::login($_POST['username'], md5($_POST['userpass']));
            if (empty($user)) {
                echo '<script>alert(\'用户名或者密码不正确！\'); history.back();</script>';
                die();
            }
            cookie::set('user', $_POST['username'], C('COOKIE_EXPIRE'), C('COOKIE_PATH'), C('COOKIE_DOMAIN'));
            cookie::set('userInfo', $user[0], C('COOKIE_EXPIRE'), C('COOKIE_PATH'), C('COOKIE_DOMAIN'));
            header('Location:/');
            die();
        }
    }

    public function actionLogOut()
    {
        if (isset($_GET['do'])) {
            cookie::delete('user');
            cookie::delete('userInfo');
            header('Location:?c=Login');
            die();
        }

    }
}
