<?php
session_start();
$title_page = $_SESSION['pages_store'][2]['pages_name'];
 require('./header.php');
?>

<section class="section"> 

<div class="wrapper">
	<input type="radio" name="point" id="slide1" checked>
	<input type="radio" name="point" id="slide2">
	<input type="radio" name="point" id="slide3">
	<input type="radio" name="point" id="slide4">
	<input type="radio" name="point" id="slide5">
	<div class="slider">
	<?php			
	$result = getSliderIMG("sld");
	while($row = mysqli_fetch_assoc($result))
	{
		$imgn = $row['img_name'];
	?>	
		<div class="slides <?= $imgn?>">
			<div class="photo_txt">
				<?= $row['img_paragraph']?>
			</div>
		</div>
		<?
			$path2 = $row['img_path'];
			echo "<script>	$('.$imgn').css('background-image','url($path2)');	</script>";
		?>
	<?php } ?>

</div>	<!--slider-->
	<div class="controls">
		<label for="slide1"></label>
		<label for="slide2"></label>
		<label for="slide3"></label>
	</div> <!--controls-->
</div> <!--wrapper-->
</section>

<?php
 require('./script.php');
 require('./footer.php');
 ?>