(function($){
	$("form.contactform").validate({ 
		lang: 'ru', 
		rules: { 
				us_name: {
					required: true,
					minlength: 4
				},
				us_phone: {
					required: true,
					digits: true, 
					minlength: 10 
				},
				us_mail: {
					required: true,
					email: true		
				}			
			},
		messages: {
				us_name: {
					required: "Введите имя!",
					minlength: "Не менее 4 символов"
				},
				us_phone: { 
					required: "Введите номер телефона!", 
					digits: "Только цифры",  
					minlength: "Не менее 10 символов"
				},
				us_mail: {
					required: "Введите адрес электронной почты!",
					email: "Электронная почта должна быть в виде name@domain.com"
				}		 
			},
			focusInvalid: true,
			errorClass: "input_error",
			
			submitHandler: function(form){
				  				
				var dannie = $("form.contactform").serialize();
				 
				$.ajax({
					url: 'sender.php',
					type: 'POST',
					data: dannie,
					success: function(data){
						$("form.contactform").hide();   
						$(".messages").html(data);  
					},
					error: function(){
						$(".messages").html('<p class="error">Ошибка</p>'); 
					}
				});
				return false; // required to block normal submit since you used ajax 
			} 	
	});	
	
})(jQuery.noConflict());