<?php
session_start();
if (empty($_SESSION['user_store'])) 
{
    echo "<script type='text/javascript'>window.location.href = '../travelblog.php';</script>";
    exit();
}
$title_page = $_SESSION['pages_store'][8]['pages_name'];
require('../header.php');

    $slide = getSlide($_GET['id']);
    
    $slide = mysqli_fetch_assoc($slide);
    $_SESSION['img_id'] = $slide['img_id'];
    $_SESSION['img_slide'] = $slide['img_slide'];
    $_SESSION['img_name'] = $slide['img_name'];
    $_SESSION['img_path'] = $slide['img_path'];
    $_SESSION['img_paragraph'] = $slide['img_paragraph'];

?>

<section class="section_hack">
    <div class="contain">
<form action = "./change.php?action=slidechange"  class="form-contain" method = 'post'>
		<h1>Изменение данных загруженном изображении</h1>
        <label for="imgname"><b>Название изображения</b></label>
        <input  type="text" name="uploadname" value="<?= !empty( $_SESSION['img_name']) ?  $_SESSION['img_name'] : '' ?>">    

		<label for="img_slide"><b>Расположение</b></label>
		<input type="text" placeholder="Путь" name="img_slide" value="<?= !empty($_SESSION['img_slide']) ? $_SESSION['img_slide'] : '' ?>">

        <label for="paragraph"><b>Содержимое</b></label>
		<input type="text" placeholder="Загрузил" name="paragraph" value="<?=!empty($_SESSION['img_paragraph']) ? $_SESSION['img_paragraph'] : '' ?>">

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
