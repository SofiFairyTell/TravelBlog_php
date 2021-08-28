<?php
session_start();
if (empty($_SESSION['user_store'])) 
{
    echo "<script type='text/javascript'>window.location.href = '../travelblog.php';</script>";
    exit();
}
$title_page = $_SESSION['pages_store'][8]['pages_name'];
require('../header.php');

    $user = getUser($_GET['id']);
    $user = mysqli_fetch_assoc($user);
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['user_email'] = $user['user_email'];
    $_SESSION['user_OLDpassword'] = $user['user_password'];
    $_SESSION['user_role'] = $user['user_role'];

$validName = false;
$validEmail = false;
$formvalid = true;

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
		
		//Из-за того, что в contacts.php на первой строке идет подключение неизвестного заголовка 
		//применяется изменение ссылки через javascript. Тот же редирект, но без header
		echo "	<script type='text/javascript'>window.location.href = './changeUser.php';</script>";
	}
	else
	{
		$message = " Не возможно отредактировать пользователя!";
		echo "<script type='text/javascript'></script>";
	}
}
?>



<section class="section_hack">
    <div class="contain">
<form action = "./changeUser.php"  class="form-contain" method = 'post'>
		<h1>Изменение данных о пользователей</h1>
        <label for="login"><b>Имя</b></label>
        <input  type="text" name="login" value="<?= !empty($_SESSION['user_name']) ? $_SESSION['user_name'] : '' ?>">

                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
                <?php if (!$validName): ?>
                    <p >
                        Имя должно состоять минимум из 3 букв, содержать буквы русского алфавита и не содержать пробелов.<br>
                        Первая буква должна быть прописной.
                    </p>
                    <?php else: ?> <p >&#10003;</p><?php endif; ?>
                <?php }?>

				
		<label for="email"><b>Почта</b></label>
		<input type="text" placeholder="Ваша почта" name="email" value="<?= !empty($_SESSION['user_email']) ? $_SESSION['user_email'] : '' ?>">
				<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') 
                { ?>
                <?php if (!$validEmail): ?>
                        <label for="email" >"Неверная почта. Образец: primer@primer.ru"</label>
                    <?php else: ?>
                        <label for="email"> <p >&#10003;</p> </label> 
                    <?php endif; ?>
                <?php }?>

        <label for="Role"><b>Роль</b></label>
		<input type="text" placeholder="Ваша роль" name="role" value="<?=!empty($_SESSION['user_role']) ? $_SESSION['user_role'] : '' ?>">

		<label for="Password"><b>Пароль</b></label>
		<input type="text" placeholder="Ваша пароль" name="password" value="<?=!empty($_SESSION['password']) ? $_SESSION['password'] : '' ?>">

        <label for="Password_confirm"><b>Повторите пароль</b></label>
		<input type="text" placeholder="Пароль" name="password_confirm" value="<?= !empty($_SESSION['password_confirm']) ? $_SESSION['password_confirm'] : '' ?>">
				

      		<input  type="submit" name = "btn_ok" class="btn" value = "Подтвердить изменения">
		
        <p>
            <?php
            if($_SESSION['message'])
            {
                echo '<p class = "msg_registration">'.$_SESSION['message'] . '</p>';
            }
            unset ($_SESSION['message']);
            ?>
        </p>
    </form>    
                    </div>
</section> <!--section-hack-->



<?php
require('../script.php');
require('../footer.php');
?>
