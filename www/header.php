<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . './scriptphp/validation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . './scriptphp/filesize.php';
include_once $_SERVER['DOCUMENT_ROOT'] . './scriptphp/watermark.php';
include_once $_SERVER['DOCUMENT_ROOT'] . './scriptphp/db.php';

if (empty($_SESSION['pages_store'])) {
    $pages = getPages();
    while ($row = mysqli_fetch_assoc($pages)) {
        $_SESSION['pages_store'][] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<title>
   <?= $title_page && strlen($title_page) !== 0 ? $title_page : $_SESSION['pages_store'][0]['pages_name']
        ?>
    </title>
	    <link rel="stylesheet" type="text/css" href="../css/travelstyle.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body >
<div class="preloader">
	<div class="preloader__row">
		<div class="preloader__item"></div>
		<div class="preloader__item"></div>
	</div>
</div>
<header class="header">
		<div class="contain">

			<div class="header_inner">

				<a class="logoref" href="../travelblog.php"><img src="../img/logo.jpg" class="logo"> </a>

				<div class="header_logo"> <a class="ref" href="../travelblog.php">TRAVEL NOTES</a></div>	
				
				<nav class="nav">
					<div class="dropdown">     					
							<a class="nav_link" href="#"> Поездки </a>
						<div class="dropdown-content">
							<a href="#">Тобольск</a>
							<a href="#">Омск</a>
							<a href="#">Москва</a>
						</div> <!--dropdown-content-->
					</div>	<!--dropdown-->	
					<a class="nav_link" href="https://travel-notes.club/" target="_blank">Гайды</a>
					<a class="nav_link" href="../travelblog.php">Повод</a>
					<a class="nav_link" href="../lifehack.php">Лайфхаки</a>
					<a class="nav_link" href="../aboutus.php">	О нас</a>
					<a class="nav_link" href="../contacts.php">Контакты</a>
					<div class="dropdown">     					
										
							<?php 
							if($_SESSION['user_store']['user_name'] != "")
							{
								echo "<a class='nav_link' href='../authorize.php'>".$_SESSION['user_store']['user_name']."</a>";
								if($_SESSION['user_store']['user_role'] === "admin")
								{
									echo 
										"<div class='dropdown-content'>
												<a href='../filesizeform.php'>Работа с контентом</a>
												<a href='../adminpanel/admin.php'>Администратор</a>
												<a href='../adminpanel/admin.php?users=ok'>Управление пользователями</a>
												<a href='../adminpanel/admin.php?content=ok'>Управление контентом</a>
												<a href='../adminpanel/admin.php?pages=ok'>Управление страницами</a>
												<a href='../scriptphp/logout.php'>Выход из профиля</a>
										</div> <!--dropdown-content-->";
								}
								else
								{
									echo 
										"<div class='dropdown-content'>
										<a href='../filesizeform.php'>Работа с контентом</a>
										<a href='../scriptphp/logout.php'>Выход из профиля</a>
										</div> <!--dropdown-content-->";
								}

							}
							else
							{
								echo "<a class='nav_link' href='../authorize.php'>Войти</a>	";
							}
						?>				
												
					</div>	<!--dropdown-->	
					
				</nav> <!--nav-->
			</div><!--header_inner-->
		</div><!--contain-->
</header><!--header-->