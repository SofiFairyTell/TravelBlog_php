<?php

function checkRegularName(): bool
{
    if (!empty($_POST)) {
        if (!preg_match('/^[а-я]{2,}+$/iu', trim($_POST['name']))) {
            return true;
        }
    }
    return false;

}


function checkRegularEmail(): bool
{
    if (!empty($_POST)) {
        if (!preg_match('/^[a-z]([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i', $_POST['email'])) {
            return true;
        }
    }
    return false;

}

function checkTextBox(): bool
{
    if(!empty($_POST)) {
        if(strlen($_POST['message']) < 30) {
            return true;
        }
    }
    return false;

}

function success(): bool
{
    foreach ($_POST as &$value) {
        $value = '';
    }
    return true;
}