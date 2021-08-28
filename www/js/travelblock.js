// lifehack. htmll
$(document).ready(function()
{
	// Дополнительная информация о первой карточке
	$('.product-card').hover(function(){
			$(this).addClass('animate');
			$('div.carouselNext, div.carouselPrev').addClass('visible');			
		 }, function(){
			$(this).removeClass('animate');			
			$('div.carouselNext, div.carouselPrev').removeClass('visible');
	});	

    let $card = $('.product-card');
	let switching = false;
	//Показать оборотную сторону карты
	$('.view_details').click(function()
	{
		
		// var $clickId = $('.product-card').attr('id');
        _this = this;
		$(_this).closest('.product-card').addClass('flip-10');
		setTimeout(function()
		{
		$(_this).closest('.product-card').removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo( 80 , 1, 
			function()
			{
				$(_this).closest('.product-front, .product-front div.shadow').hide();			
			});
		}, 50);

		$('div.carouselNext, div.carouselPrev').removeClass('visible');
		$(_this).closest('.product-card').addClass('flip-10');
		setTimeout(function(){
			$(_this).closest('.product-card').removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo( 80 , 1, function(){
				$(_this).closest('.product-front, .product-front div.shadow').hide();			
			});
		}, 50);
		
		setTimeout(function()
		{
			$(_this).closest('.product-card').removeClass('flip90').addClass('flip190');
			$('.product-back').show().find('div.shadow').show().fadeTo( 90 , 0);
			setTimeout(function(){				
				$(_this).closest('.product-card').removeClass('flip190').addClass('flip180').find('div.shadow').hide();						
				setTimeout(function(){
					$(_this).closest('.product-card').css('transition', '100ms ease-out');			
					$('.cx, .cy').addClass('s1');
					setTimeout(function(){$('.cx, .cy').addClass('s2');}, 100);
					setTimeout(function(){$('.cx, .cy').addClass('s3');}, 200);				
					$('div.carouselNext, div.carouselPrev').addClass('visible');				
				}, 100);
			}, 100);			
		}, 150);		
				
	});			
    

	// Перевернуть карту рубашкой вверх
	$('.flip-back').click(function(){		
		_this = this;
		$(_this).closest('.product-card').removeClass('flip180').addClass('flip190');
		setTimeout(function()
		{
			$(_this).closest('.product-card').removeClass('flip190').addClass('flip90');
	
			$('.product-back div.shadow').css('opacity', 0).fadeTo( 100 , 1, function(){
				$('.product-back, .product-back div.shadow').hide();
				$('.product-front, .product-front div.shadow').show();
			});
		}, 50);
		
		setTimeout(function()
		{
			$(_this).closest('.product-card').removeClass('flip90').addClass('flip-10');
			$('.product-front div.shadow').show().fadeTo( 100 , 0);
			setTimeout(function(){						
				$('.product-front div.shadow').hide();
				$(_this).closest('.product-card').removeClass('flip-10').css('transition', '100ms ease-out');		
				$('.cx, .cy').removeClass('s1 s2 s3');			
			}, 100);			
		}, 150);			
		
	});	

	
	/* ----  Image Gallery Carousel   ---- */
	
	var carousel = $('.carousel ul');
	var carouselSlideWidth = 335;
	var carouselWidth = 0;	
	var isAnimating = false;
	
	// building the width of the casousel
	$('.carousel li').each(function(){
		carouselWidth += carouselSlideWidth;
	});
	$(carousel).css('width', carouselWidth);
	
	// Load Next Image
	$('div.carouselNext').on('click', function(){
		var currentLeft = Math.abs(parseInt($(carousel).css("left")));
		var newLeft = currentLeft + carouselSlideWidth;
		if(newLeft == carouselWidth || isAnimating === true){return;}
		$('.carousel ul').css({'left': "-" + newLeft + "px",
							   "transition": "300ms ease-out"
							 });
		isAnimating = true;
		setTimeout(function(){isAnimating = false;}, 300);			
	});
	
	// Load Previous Image
	$('div.carouselPrev').on('click', function(){
		var currentLeft = Math.abs(parseInt($(carousel).css("left")));
		var newLeft = currentLeft - carouselSlideWidth;
		if(newLeft < 0  || isAnimating === true){return;}
		$('.carousel ul').css({'left': "-" + newLeft + "px",
							   "transition": "300ms ease-out"
							 });
	    isAnimating = true;
		setTimeout(function()
		{
			isAnimating = false;
		}, 300);			
	});
  
    function tick() 
	{
        let head = document.querySelector('.header');
		head.classList.toggle('hot_color');
		head.classList.toggle('cold_color');
    }
// цвет: background-color: #46B973

    var interval = 5000;
    let timerId = () => {

		setInterval(()=> {
			tick();
		}, interval);
	}
	

});

// form
function openForm() 
{
  document.getElementById("myForm").style.display = "block";
}

function closeForm() 
{
  document.getElementById("myForm").style.display = "none";
}

var startCount = 0;
var maxCount = 10;
var submitBtn = $("#submit");
$("#count").text(startCount);

function getCount() {
    var count = startCount + $("#msg").val().length;
    $("#count").text(count);
    if (count >= maxCount) {
        $(".counter").addClass("red");
    } else if (count < 10 && $(".counter").hasClass("red")) {
        $(".counter").removeClass("red");
        submitBtn.prop('disabled', false);
    }
    if (count >= 10) {
        submitBtn.prop('disabled', true);
    }
}

 debugger;
// $("form").submit(function(event){
//     event.preventDefault();  
//     var name = $("#name").val().trim();
//     var email = $("#email").val().trim();
//     var message = $("#msg").val().trim();

//     if(name == '' && email == '' && message == ''){
//         check=false;     
//     }
//     else
//     {     
//         //if(email.match(/^([a-zA-Z0-9_\-\.]+)@(^(\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) 
//         if(email.match(/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/)==null)
// 		{
//             // showValidate(email);
//             check=false;
//             alert('Неправильная почта');
//         }
//         else
//         {
//             if(name.match(/^([a-zA-Z-]{1,50})$/)==null)
//             {
//                 alert('Ошибка в имени. Не должно быть цифр.');
//                 check=false;
//             }
//             else
//             {
//                 check = true;
//                 console.log('Проверка пройдена!')  
//             }
//         }
//     }
//     if(check == true) {
//         $("form").unbind('submit').submit();
//     }
// });

$('.header_logo').mouseover(function()
{
	$('.nav').hide();


});

$('.header_logo').mouseout(function()
{
	$('.nav').show();
});

$('.contain').dblclick(function()
{
	alert('Приз ваш!');
})
