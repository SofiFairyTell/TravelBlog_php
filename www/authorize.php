<?php
session_start();
$title_page = $_SESSION['pages_store'][4]['pages_name'];
require('./header.php');

?>

<section class="section_hack">
    <div class="contain">
<form action = "./scriptphp/signin.php"  class="form-contain" method = 'post'>
		<h1>Войти</h1>
        <label for="login"><b>Ваше имя</b></label>
        <input  type="text" name="login" value="<?= isset($_POST['login']) ? $_POST['login']: ""; ?>">
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
                <?php if (!$validName): ?>
                    <p >
                        Имя должно состоять минимум из 3 букв, содержать буквы русского алфавита и не содержать пробелов.<br>
                        Первая буква должна быть прописной.
                    </p>
                    <?php else: ?>
                    <p >&#10003;</p>
                    <?php endif; ?>
                <?php }?>

				
		<label for="email"><b>Почта</b></label>
		<input type="text" placeholder="Ваша почта" name="email" value="<?= isset($_POST['email']) ? $_POST['email']: ""; ?>">
				<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') 
                { ?>
                <?php if (!$validEmail): ?>
                        <label for="email" >"Err"</label>
                    <?php else: ?>
                        <label for="email"> </label> 
                    <?php endif; ?>
                <?php }?>

		<label for="Password"><b>Пароль</b></label>
		<input type="text" placeholder="Ваша пароль" name="password" value="<?= isset($_POST['password']) ? $_POST['password']: ""; ?>">
				<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') 
                { ?>
                <?php if (!$validEmail): ?>
                        <label for="password" >"Wrong password"</label>
                    <?php else: ?>
                        <label for="password"> </label> 
                    <?php endif; ?>
                <?php }?>
        <button type="submit" name = "btn_regist" class="btn registration"><a href="./registrate.php">Регистрация</a></button>
		<input  type="submit" name = "btn_ok" class="btn" value = "Войти">

            <?php
            if($_SESSION['message'])
            {
                echo '<p class = "msg_registration">'.$_SESSION['message'] . '</p>';
            }
            unset ($_SESSION['message']);
            ?>

    </form>    
                    </div>
</section> <!--section-hack-->

<?php
require('script.php');  
require('footer.php');
?>
