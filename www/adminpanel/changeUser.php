<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '../scriptphp/db.php';

function comparisonOfPasswords($password, $password2): bool
{
    if ($password !== $password2) {
        return true;
    }
    return false;
}



$name_check = $_POST['login'];
$email_check = $_POST['email'];
$role_check = $_POST['user_role'];


$password2_check = comparisonOfPasswords($_POST['password'], $_POST['password_confirm']);
$role_check = comparisonOfPasswords($_POST['user_role'],$_SESSION['user_role']);



if ($password2_check && $role_check){
    $_SESSION['user_name'] = $_POST['login'];
    $_SESSION['user_email'] = $_POST['email'];
    $_SESSION['user_role'] = $_POST['role'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['message'] = "Никаких изменений не произошло";

    echo "<script type='text/javascript'>window.location.href = '../adminpanel/admin.php';</script>";
    exit();
} else {
    editUser(
        $_SESSION['user_id'],
        $_POST['login'],
        $_POST['email'],
        $_POST['role'],
        empty($_POST['password']) ? $_SESSION['oldPassword'] : md5($_POST['password']));
    $_SESSION['message'] = 'Пользователь с ID: '.$_SESSION['user_id'].' был изменен профилем: '. $_SESSION['user_store']['user_name'];
    echo "<script type='text/javascript'>window.location.href = '../adminpanel/admin.php';</script>";
    exit();
}
