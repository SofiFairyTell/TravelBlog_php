<?php
session_start();
if (empty($_SESSION['user_store'])) 
{
    echo "<script type='text/javascript'>window.location.href = '../travelblog.php';</script>";
    exit();
}
$title_page = $_SESSION['pages_store'][8]['pages_name'];
require('../header.php');

    $upload = getUpload($_GET['id']);
    
    $upload = mysqli_fetch_assoc($upload);
    $_SESSION['upload_id'] = $upload['upload_id'];
    $_SESSION['upload_imgname'] = $upload['upload_imgname'];
    $_SESSION['upload_path'] = $upload['upload_path'];
    $_SESSION['upload_user'] = $upload['upload_user'];

?>

<section class="section_hack">
    <div class="contain">
<form action = "./change.php?action=upload"  class="form-contain" method = 'post'>
		<h1>Изменение данных загруженном изображении</h1>
        <label for="uploadname"><b>Название изображения</b></label>
        <input  type="text" name="uploadname" value="<?= !empty( $_SESSION['upload_imgname']) ?  $_SESSION['upload_imgname'] : '' ?>">    

		<label for="uploadpath"><b>Путь до изображения</b></label>
		<input type="text" placeholder="Путь" name="uploadpath" value="<?= !empty($_SESSION['upload_path']) ? $_SESSION['upload_path'] : '' ?>">

        <label for="uploaduser"><b>Загружено</b></label>
		<input type="text" placeholder="Загрузил" name="uploaduser" value="<?=!empty($_SESSION['upload_user']) ? $_SESSION['upload_user'] : '' ?>">

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
