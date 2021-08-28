<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '../scriptphp/db.php';

if (empty($_SESSION['user_store'])|| $_SESSION['user_store']['user_role']!=="admin" ) 
{
    echo "<script type='text/javascript'>window.location.href = '../travelblog.php';</script>";
    exit();
}
if(!empty($_GET)) 
{
    switch ($_GET)
    {
        case($_GET['action']==="delete_user"):
            {
                deleteUser($_GET['id']);
                $_SESSION['message'] = "Пользователь удален. Наверное. ";
            }
            break;
        case($_GET['action']==="delete_info"):
            {
                deleteUpload($_GET['id']);
                $_SESSION['message'] = "Информация о загрузке удалена. Наверное. ";
            }
            break;
        case($_GET['action']==="delete_img"):
            {
                deleteIMG($_GET['id']);
                $_SESSION['message'] = "Изображение удалено.";
            }
            break;
        case($_GET['action']==="delete_page"):
            {
                deletePAGE($_GET['id']);
                $_SESSION['message'] = "Изображение удалено.";
            }
            break;
        default:  
            $_SESSION['message'] = "Не было выполнено никаких действий";
    }
  
}
echo "<script type='text/javascript'>window.location.href = '../adminpanel/admin.php';</script>";
exit();