<?php
$title_page = $_SESSION['pages_store'][1]['pages_name'];
 require('header.php');
?>
	
<section class="section_hack">
<div class="contain">
	<div class="photo">
		<div class="carusel_item">
			<div class ="make-3D-space">
				<div class ="product-card" id = "prd_1">
					<div  class ="product-front" >
						<div class="shadow"></div> <!--shadow-->
				<?php			
				$result = getSliderIMG("prd1");
				$row = mysqli_fetch_assoc($result);		
				?>	
						<img src="<?=$row['img_path']?>" alt="<?=$row['img_name']?>"/>
						<div class="image_overlay"></div> <!--image_overlay-->
						<div class="view_details">Узнать больше</div>
						<div class="stats">        	
							<div class="stats-container">
								<span class="product_price">1</span>
								<span class="product_name">Собираем вещи</span>    
								<p>Что взять с собой?</p>   		
								<div class="product-options">
								<?= $row['img_paragraph']?>
								</div> <!--product-options-->
							</div><!--stats-container-->
						</div> <!--stats-->
					</div> <!--product-front-->
					<div  class ="product-back" >
						<div class="shadow"></div>
						<div class ="carousel">
							<ul>
							<?php
							while($row = mysqli_fetch_assoc($result))
							{?>
								<li><img src="<?=$row['img_path']?>" alt=<?=$row['img_name']?> />
									<p><?= $row['img_paragraph']?></p>
								</li>
							<?php } ?>
							</ul>					
							<div class="arrows-perspective">
								<div class="carouselPrev">
									<div class="y"></div>
									<div class="x"></div>
								</div>
								<div class="carouselNext">
									<div class="y"></div>
									<div class="x"></div>
								</div>
							</div> <!--arrows-perspective-->
						</div> <!--carousel-->
						<div class ="flip-back">
							<div class="cy"></div>
							<div class ="cx"></div>
						</div> <!--flip-back-->
					</div>	 <!--product-back-->
				</div>	<!--product-card-->	
			</div><!--make-3D-space-->
		</div> <!--carusel_item-->
		<div class="carusel_item">
			<div class ="make-3D-space">
				<div class ="product-card" id = "prd_2">
					<div  class ="product-front">
						<div class="shadow"></div> <!--shadow-->
				<?php			
				$result = getSliderIMG("prd2");
				$row = mysqli_fetch_assoc($result);	
				?>							
						<img src="<?=$row['img_path']?>" alt="<?=$row['img_name']?>"/>					
						<div class="image_overlay"></div> <!--image_overlay-->
						<div class="view_details">Узнать больше</div> <!--view_details-->
						<div class="stats">        	
							<div class="stats-container">
								<span class="product_price">2</span>
								<span class="product_name">Строим маршрут</span>    
								<p>А куда мы едем?</p>   		
								<div class="product-options">	
								<?= $row['img_paragraph']?>						
								</div> <!--product-options-->
							</div><!--stats-container-->
						</div> <!--stats-->
					</div> <!--product-front-->
					<div  class ="product-back">
						<div class="shadow"></div>
						<div class ="carousel">
							<ul>
								<?php
								while($row = mysqli_fetch_assoc($result))
								{?>
									<li><img src="<?=$row['img_path']?>" alt="<?=$row['img_name']?>"/>
										<p><?= $row['img_paragraph']?></p>
									</li>
								<?php } ?>
							</ul>
							<div class="arrows-perspective">
								<div class="carouselPrev">
									<div class="y"></div>
									<div class="x"></div>
								</div>
								<div class="carouselNext">
									<div class="y"></div>
									<div class="x"></div>
								</div>
							</div> <!--arrows-perspective-->
						</div> <!--carousel-->
						<div class ="flip-back">
							<div class="cy"></div>
							<div class ="cx"></div>
						</div> <!--flip-back-->
					</div>	 <!--product-back-->
				</div>	<!--product-card-->	
			</div><!--make-3D-space-->
		</div> <!--carusel_item-->
	</div><!--photo-->
</div> <!--contain-->
</section> <!--section-hack-->

<?php
 require('script.php');
 require('footer.php');
?>