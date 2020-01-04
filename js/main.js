 $(document).ready(function () {	 	

	 	$('.inserepost').bind('input propertychange', function() {
			
     		var post = $(".inserepost").val();
			
			if (post == ""){
				$('.postbuttons').hide(100);
			}
			else{
				$('.postbuttons').show(100);

			}
});			
	 		
	 	
		
	 	
	 
	 	$('.inserepost').keyup(function () {
		  var max = 120;
		  var min = 0;
		  var len = $(this).val().length;
		  if (len >= max) {
			$('#charNum').text('120/120');
		  } else {
			var char = min + len;
			$('#charNum').text(char + '/120');
		  }
		});

	 
	 
		$(".editimage").on('click', function () {
			
			$('#editimagemodal').show('slow');
			
		});
	 
	 	$(".editimage2").on('click', function () {
			
			$('#editimagemodal2').show('slow');
			
		});
	 
	 
	 
	 
	 
	 	$(".menuToggle").on('click', function (x) {
			
			$('.menu').toggle("slow");
			$(this).toggleClass("change");
			
		});
                   
	 
	 
 });