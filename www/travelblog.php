<?
$title_page = $_SESSION['pages_store'][0]['pages_name'];
//$title_page = 'TravelBlog';
 require('header.php');
?>

<div class="intro_main">
			<div class="intro_inner">
				<h1 class="intro_title">
					ЗАМЕТКИ ПУТНИКА
				</h1>
			
			<a class="button" href="#block">
				<p> До нового путешествия: </p>
				<p class = "countdown" id="demo"> </p>
				
			</a>
	  		</div><!--intro_inner-->
</div> <!--intro_main-->

<section class="section">
		<a name="block"></a>
		<div class="contain">
			<div class="section_header">
				<h2 class="section_suptitle">Загляни за горизонт...</h2>
				<h3 class="section_title">Заметки & Фотографии & Маршруты</h3>
				<div class="section_text">
					<p>Этот блог посвящен путевым заметкам и наблюдениям</p>
					<p> Можно повторить маршрут, но нельзя повторить впечатления. Поэтому мы делаем фотографии.</p>
				</div><!--section_text-->
				<div class="photo">
					<div class="photo_item">
						<div class="photo_img">
							<img src="img/photo_omsk.jpg"  alt="street">
						</div> <!--photo_img-->
						<div class="photo_txt">Омск</div>
					</div>	<!--photo_item-->			
					<div class="photo_item">
						<div class="photo_img">
							<img src="img/photo_moscow.jpg" alt="tower">
						</div><!--photo_img-->
						<div class="photo_txt">Москва</div>
					</div>	<!--photo_item-->			
					<div class="photo_item">
						<div class="photo_img">
							<img src="img/photo_tobolsk.jpg" alt="castle">
						</div><!--photo_img-->
						<div class="photo_txt">Тобольск	</div>
					</div><!--photo_item-->
				</div><!--photo-->	
			</div> <!--section_header-->
		</div><!--contain-->
</section><!--section-->

<div class="staistics">
	<div class="contain">
		<div class="stat_all">
			<div class="stat_item">
					<div class="stat_number">42</div>
					<div class="stat_txt">Уникальных маршрута</div>
			</div> <!--stat_item--->
			<div class="stat_item">
					<div class="stat_number">15k</div>
					<div class="stat_txt">Чашек кофе</div>
			</div> <!--stat_item--->
			<div class="stat_item">
					<div class="stat_number">30k+</div>
					<div class="stat_txt">Прослушаной музыки</div>
			</div> <!--stat_item--->
			<div class="stat_item">
					<div class="stat_number">100k+</div>
					<div class="stat_txt">Фотографий и видео</div>
			</div> <!--stat_item--->
		</div> <!--stat_all--->
	</div><!--contain-->
</div><!--staistics-->
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="./js/travelblock.js"></script>
	<script>
	document.addEventListener('DOMContentLoaded', function () {
	document.body.classList.add('loaded_hiding');
	window.setTimeout(function () {
		document.body.classList.add('loaded');
		document.body.classList.remove('loaded_hiding');
	}, 2000);
	});

	// Set the date we're counting down to
	var countDownDate = new Date("Jul 5, 2021 15:37:25").getTime();
	
	// Update the count down every 1 second
	var x = setInterval(function() {
	
	  // Get today's date and time
	  var now = new Date().getTime();
		
	  // Find the distance between now and the count down date
	  var distance = countDownDate - now;
		
	  // Time calculations for days, hours, minutes and seconds
	  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
	  // Output the result in an element with id="demo"
	  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
	  + minutes + "m " + seconds + "s ";
		
	  // If the count down is over, write some text 
	  if (distance < 0) {
		clearInterval(x);
		document.getElementById("demo").innerHTML = "EXPIRED";
	  }
	}, 1000);
	</script>

<?php
require("footer.php");
?>