<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = 'root';
const DB_NAME = 'travelblog';
// Функция для подключения к базе данных
function connect()
{
    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysql->connect_errno) exit('Ошибка подключения к бд!');
    $mysql->set_charset('utf-8');
    return $mysql;
}

function clearSession()
{
    foreach ($_SESSION as $key => $value) {
        if ($key != 'user') {
            unset($_SESSION[$key]);
        }
    }
}

//Функция для поиска изображений и информации к ним для публикации на сайте
function getSliderIMG($slide)
{
    $mysql = connect();
    $result = $mysql->query("select * from img_store where img_slide like '$slide'");
    $mysql->close();
    return $result;
}

function getSlide($img_id)
{
    $mysql = connect();
    $result = $mysql->query("select * from img_store where img_id='$img_id'");
    $mysql->close();
    return $result;
}

function getAllIMG()
{
    $mysql = connect();
    $result = $mysql->query("select * from img_store ");
    $mysql->close();
    return $result;
}
function getAllUpload()
{
    $mysql = connect();
    $result = $mysql->query("select * from upload_store ");
    $mysql->close();
    return $result;
}

function getAllUsers()
{
    $mysql = connect();
    $result = $mysql->query("
        select *
        from user_store");
    $mysql->close();
    return $result;
}

function getUser($user_id = null)
{
    $mysql = connect();
    $result = $mysql->query("
        select *
        from user_store
        where user_id='$user_id'");
    $mysql->close();
    return $result;
}

function getContactINFO()
{
    $mysql = connect();
    $result = $mysql->query("select * from contact_store");
    $mysql->close();
    return $result;
}

function checkUser($login, $password)
{
    $mysql = connect();
    $result = $mysql->query(
        "select * from `user_store`
        where `user_name` = '$login' and `user_password` = '$password'"
    );
    $mysql->close();
    return $result;
}

function editUser($id = null, $name = null, $email = null,$role = null, $password = null)
{
    $mysql = connect();
    $result = $mysql->query("
    REPLACE INTO `user_store` (`user_id`,`user_name`, `user_email`, `user_password`, `user_role`)
    VALUES ('$id','$name', '$email', '$password','$role')");
    $mysql->close();
    return $result;
}

function addUser($login = null, $password =null, $email=null,$role=null)
{
    $mysql = connect();

    $result = $mysql->query(
        "INSERT INTO `user_store` (`user_name`,`user_email`,
        `user_password`,`user_role`) values ('$login', '$email', '$password', '$role')");
    $mysql->close();
    return $result;
}

function uploadIMG($upload_name,$upload_path,$upload_user)
{
    $mysql = connect();
    $result = $mysql->query(
        "INSERT INTO `upload_store` (`upload_imgname`,`upload_path`,
        `upload_user`) values ('$upload_name', '$upload_path', '$upload_user')");
    $mysql->close();
    return $result;
}

function editUpload($id = null, $upload_imgname = null, $upload_path = null,$upload_user = null)
{
    $mysql = connect();
    $result = $mysql->query("
    REPLACE INTO `upload_store` (`upload_id`,`upload_imgname`, `upload_path`, `upload_user`)
    VALUES ('$id','$upload_imgname', '$upload_path', '$upload_user')");
    $mysql->close();
    return $result;
}

function editSlide($id = null, $img_slide = null, $paragraph = null)
{
    $mysql = connect();
    $result = $mysql->query("
    REPLACE INTO `img_store` (`img_id`,`img_slide`, `img_paragraph`)
    VALUES ('$id','$img_slide', '$paragraph')");
    $mysql->close();
    return $result;
}


function getUpload($upload_id = null)
{
    $mysql = connect();
    $result = $mysql->query("
        select *
        from upload_store
        where upload_id='$upload_id'");
    $mysql->close();
    return $result;
}

function deleteUser($user_id)
{
    $mysql = connect();
    $result = $mysql->query("
        delete from user_store
        where user_id = '$user_id'");
    $mysql->close();
    return $result;
}
function deleteIMG($img_id)
{
    $mysql = connect();
    $result = $mysql->query("
        delete from img_store
        where img_id = '$img_id'");
    $mysql->close();
    return $result;
}
function deleteUpload($upload_id)
{
    $mysql = connect();
    $result = $mysql->query("
        delete from upload_store
        where upload_id = '$upload_id'");
    $mysql->close();
    return $result;
}

function getPages()
{
    $mysql = connect();
    $result = $mysql->query("select * from pages_store");
    $mysql->close();
    return $result;
}
function getPage($pages_id = null)
{
    $mysql = connect();
    $result = $mysql->query("
        select *
        from pages_store
        where pages_id='$pages_id'");
    $mysql->close();
    return $result;
}

function editPages($id = null, $pagename = null)
{
	$mysql = connect();
    $result = $mysql->query("
    REPLACE INTO `pages_store` (`pages_id`,`pages_name`)
    VALUES ('$id','$pagename')");
    $mysql->close();
    return $result;
}