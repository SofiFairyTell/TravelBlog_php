<?php
    session_start();
    require_once('./db.php');
    $connect = connect();
    $login_post = $_POST['login'];
    $email_post = $_POST['email'];
    $password_post = $_POST['password'];
    $password_confirm_post = $_POST['password_confirm'];

    $validName = false;
    $validEmail = false;

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if (isset($_POST['btn_ok'])) 
        {
            if (isset($_POST['login']))
            {
                $validName = preg_match('|^[А-Я][а-я]{2,}$|u', $_POST['login'], $matches,PREG_OFFSET_CAPTURE);
            }		
            if (isset($_POST['email'])) 
                {
                    $re = '|^[A-Z0-9][A-Z0-9._%+-]+@[A-Z0-9-]+\.[A-Z]{2,4}$|i';
                    $validEmail = preg_match($re , $_POST['email'], $matches,PREG_OFFSET_CAPTURE);
                }
        }
    if($validName && $validEmail)
	{
        if(($password_post === $password_confirm_post) && ($password_post !== "") )
            {
                $password_post = md5($password_post);
                $role = 'ordinary';
                addUser($login_post, $password_post, $email_post, $role);
                $_SESSION['message'] = 'Регистрация прошла успешно!';
                if( $_SESSION['user_store']['user_role']==="admin")
                {
                        echo "<script type='text/javascript'>window.location.href = '../adminpanel/admin.php';</script>";
                }
                else
                {
                        echo "<script type='text/javascript'>window.location.href = '../authorize.php';</script>"; 
                }
            }
        else
            {
                $_SESSION['message'] = 'Пароли не совпадают или пустой пароль';
                echo "<script type='text/javascript'>window.location.href = '../registrate.php';</script>";
            }
    }
    else
        {
            $_SESSION['message'] = "Почта неправильная и имя пользователя";
			echo "<script type='text/javascript'>window.location.href = '../registrate.php';</script>";
        }
	}
