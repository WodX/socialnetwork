 $(document).ready(function () {
	 
			$(document).keyup(function(event) {
				if (event.keyCode === 13) {
					$("#btn_login").click();
				}
			});

	 
	 
	 	
	 
	 		$("#btn_login").on('click', function () {
                   var user = $("#username").val();
                   var password = $("#password").val();
				
                 if (user == "" && password == ""){
					 
					$('#fail').fadeIn().addClass('animated swing').delay(2000).fadeOut();
					$('#username').css('border', '2px solid red');
					$('#fail2').fadeIn().addClass('animated swing').delay(2000).fadeOut();
					$('#password').css('border', '2px solid red');
					$(".mainlogin").addClass("animated headShake").delay(500).queue(function(){
										$(this).removeClass("animated headShake").dequeue();
										});
										
				 }
				else if (user == ""){
					
					$('#fail').hide();
					$('#fail2').hide();
					$('#fail').fadeIn().addClass('animated swing').delay(2000).fadeOut();
					$('#username').css('border', '2px solid red');
					$(".mainlogin").addClass("animated headShake").delay(500).queue(function(){
										$(this).removeClass("animated headShake").dequeue();
										});
				}
				else if (password == ""){
					$('#fail').hide();
					$('#fail2').hide();
					$('#fail2').fadeIn().addClass('animated swing').delay(2000).fadeOut();
					$('#password').css('border', '2px solid red');
					$(".mainlogin").addClass("animated headShake").delay(500).queue(function(){
										$(this).removeClass("animated headShake").dequeue();
										});
				}
									 
                   else {
                       $.ajax(
                           {
                               url: 'index.php',
                               method: 'POST',
                               data: {
                                   login: 1,
                                   userPHP: user,
                                   passwordPHP: password
                               },
                               success: function (response) {
								   if (response == 'success'){
									   window.location = 'feed.php';
									   
								   }else{
									   $('#username').css('border', '2px solid red');
									   $('#password').css('border', '2px solid red');
									   $(".mainlogin").addClass("animated headShake").delay(500).queue(function(){
										$(this).removeClass("animated headShake").dequeue();
										});
									   
								   }
                               },
							   dataType: 'text'
                               
                           }
                       );
                   }
                });
	 
	 	$("#novaAcc").on('click', function () {
			
			$('.novaAcc').show('slow');
			
		});
	 	
	 
	 	
	 
            });