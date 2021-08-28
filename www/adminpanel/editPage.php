<?php
session_start();
if (empty($_SESSION['pages_store'])) 
{
    echo "<script type='text/javascript'>window.location.href = '../travelblog.php';</script>";
    exit();
}
$title_page = $_SESSION['pages_store'][8]['pages_name'];
require('../header.php');

    $page = getPage($_GET['id']);
    
    $page = mysqli_fetch_assoc($page);
    $_SESSION['pages_id'] = $page['pages_id'];
    $_SESSION['pages_name'] = $page['pages_name'];

?>

<section class="section_hack">
    <div class="contain">
<form action = "./change.php?case=pages"  class="form-contain" method = 'post'>
		<h1>Изменение названия страницы</h1>
        <label for="pagename"><b>Название страницы</b></label>
        <input  type="text" name="pagename" value="<?= !empty( $_SESSION['pages_name']) ?  $_SESSION['pages_name'] : '' ?>">    

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