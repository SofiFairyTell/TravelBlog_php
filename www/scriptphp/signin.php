<?php
    session_start();
    require_once('./db.php');
    $connect = connect();
    $login_post = $_POST['login'];
    $email_post = $_POST['email'];
    $password_post = md5($_POST['password']);


    
    $check_user = checkUser($login_post, $password_post);

    if(mysqli_num_rows($check_user) > 0)
    {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user_store'] = [
            "user_id" => $user['user_id'],
            "user_name" => $user['user_name'],
            "user_role" => $user['user_role']
        ];
        $_SESSION['message'] = 'Добро пожаловать,'. $_SESSION['user_store']['user_name'];
        if($_SESSION['user_store']['user_role']==="admin")
        {
            echo "<script type='text/javascript'>window.location.href = '../adminpanel/admin.php';</script>";
        }
        else
        {
            echo "<script type='text/javascript'>window.location.href = '../filesizeform.php';</script>";
        }
       
    }
    else
    {
        $_SESSION['message'] = 'Пользователь не найден';
        echo "<script type='text/javascript'>window.location.href = '../authorize.php';</script>";
    }
