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


$("form").submit(function(event){
    event.preventDefault();
    
    var name = $("#name").val().trim();
    var email = $("#email").val().trim();
    var message = $("#msg").val().trim();

    if(name == '' && email == '' && message == ''){
        // showValidate(name);
        check=false;     
    }
    else
    {
        if(email.match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) 
        {
            // showValidate(email);
            check=false;
            alert('Неправильная почта');
        }
        else
        {
            if(name.match(/^([a-zA-Z-]{1,50})$/)==null)
            {
                alert('Ошибка в имени. Не должно быть цифр.');
                check=false;
            }
            else
            {
                check = true;
                console.log('Проверка пройдена!')  
            }

        }

    }

    if(check == true) {
        $("form").unbind('submit').submit();
    }



});

