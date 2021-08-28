<?php
session_start();
if (empty($_SESSION['user_store'])|| $_SESSION['user_store']['user_role']!=="admin" ) 
{
    echo "<script type='text/javascript'>window.location.href = '../travelblog.php';</script>";
    exit();
}
$title_page = $_SESSION['pages_store'][6]['pages_name'];
require('../header.php');
?>

<section class="section_hack">
    <div class="contain">  
    <span> <h1> 
    <?php
            if($_SESSION['message'])
            {
                echo '<p class = "msg_registration">'.$_SESSION['message'] . '</p>';
            }
            unset ($_SESSION['message']);
            ?>
    </h1></span>
    <a class="nav_link" href="./admin.php?upload=ok">Управление загрузками</a>
    <a class="nav_link" href="./admin.php?content=ok">Управление контентом</a>
	<a class="nav_link" href="./admin.php?users=ok">Управление пользователями</a>
    <a class="nav_link" href="./admin.php?pages=ok">Управление страницами</a>
    </div><!--contain -->
<?php
    switch ($_GET) {
        case ($_GET['upload'] === 'ok'):
            ?>
            <div class="inner-content">
                <h3>Загружено пользователями</h3>
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Название</th>
                                <th>Путь</th>
                                <th>Пользователь</th>
                                <th colspan="2"> Действия</th>
                            </tr>
                        </thead> <!--thead-->
                        <tbody>
                        <?php			
                            $result = getAllUpload();
                            while($row = mysqli_fetch_assoc($result))
                            {?>
                                <tr>
                                <td> <?=$row['upload_id']?></td>
                                    <td> <?=$row['upload_imgname']?></td>
                                    <td> <a href="../scriptphp/dowland.php?path=<?=$row['upload_path']?>">Скачать</a></td>
                                    <td> <?=$row['upload_user']?></td>
                                    <td> <a href="./editUpload.php?id=<?= $row['upload_id']?>">Редактировать</a></td>
                                    <td> <a href="./delete.php?id=<?= $row['upload_id']?>&action=delete_info">Удалить</a></td>
                                <tr>
                                <?php } ?>
                        </tbody> <!--tbody-->
                    </table><!--fl-table-->
                </div> <!--table-wrapper-->
            </div><!--inner-content-->
            <?php
            break;
        case ($_GET['content'] === 'ok'):
            ?>
            <div class="inner-content">
                <h3>Изображения на сайте</h3>
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                            <tr>
                                <th>Положение</th>
                                <th>Название</th>
                                <th>Путь</th>
                                <th>Подпись</th>
                                <th colspan="2"> Действия</th>
                            </tr>
                        </thead> <!--thead-->
                        <tbody>
                        <?php			
                            $result = getAllIMG();
                            while($row = mysqli_fetch_assoc($result))
                            {?>
                                <tr>
                                    <td> <?=$row['img_slide']?></td>
                                    <td> <?=$row['img_name']?></td>
                                    <td> <?=$row['img_path']?></td>
                                    <td> <?=$row['img_paragraph']?></td>
                                    <td> <a href="./editSlide.php?id=<?= $row['img_id'] ?>">Редактировать</a></td>
                                    <td> <a href="./delete.php?id=<?= $row['img_id'] ?>&action=delete_img">Удалить</a></td>
                                <tr>
                                <?php } ?>
                        </tbody> <!--tbody-->
                    </table><!--fl-table-->
                </div> <!--table-wrapper-->
            </div><!--inner-content-->
            <?php
            break;
        case ($_GET['users'] === 'ok'):
            ?>               
                <div class="inner-content">
                    <h3>Пользователи сайта</h3>
                    
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Имя пользователя</th>
                                    <th>E-mail</th>
                                    <th>Пароль</th>
                                    <th>Роль</th>                                     
                                    <th colspan="2"> Действия</th>
                                    <th><a class="nav_link" href="../registrate.php">Добавить нового пользователя</a></th>
                                </tr>
                            </thead> <!--thead-->
                            <tbody>
                            <?php			
                                $result = getAllUsers();

                                while($row = mysqli_fetch_assoc($result))
                                {?>
                                    <tr>
                                        <td> <?=$row['user_name']?></td>
                                        <td> <?=$row['user_email']?></td>
                                        <td> <?=$row['user_password']?></td>
                                        <td> <?=$row['user_role']?></td>
                                        <td> <a href="./edit.php?id=<?= $row['user_id'] ?>">Редактировать</a></td>
                                        <td> <a href="./delete.php?id=<?= $row['user_id']?>&action=delete_user">Удалить</a></td>
                                    <tr>
                                    <?php } ?>
                            </tbody> <!--tbody-->
                        </table><!--fl-table-->
                    </div> <!--table-wrapper-->
                </div><!--inner-content-->
                <?php
                break;          
        case ($_GET['pages'] === 'ok'):
            ?>               
                <div class="inner-content">
                    <h3>Страницы сайта</h3>
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>Номер страницы</th>
                                    <th>Название страницы</th>
                                    <th colspan="2"> Действия</th>
                                </tr>
                            </thead> <!--thead-->
                            <tbody>
                            <?php			
                                $result = getPages();
                                while($row = mysqli_fetch_assoc($result))
                                {?>
                                    <tr>
                                        <td> <?=$row['pages_id']?></td>
                                        <td> <?=$row['pages_name']?></td>
                                        <td> <a href="./editPage.php?id=<?= $row['pages_id'] ?>">Редактировать</a></td>
                                        <td> <a href="./delete.php?id=<?= $row['pages_id']?>&action=delete_page">Удалить</a></td>
                                    <tr>
                                    <?php } ?>
                            </tbody> <!--tbody-->
                        </table><!--fl-table-->
                    </div> <!--table-wrapper-->
                </div><!--inner-content-->
                <?php
                break;
        default:
            ?>     <div class="inner-content"></div>
        <?php
    }
    ?>
</section> <!-- section_hack -->
<?php
require('../script.php');  
require('../footer.php');
?>