 $(document).ready(function () {
	 
	 
  function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validate() {
  $("#result").text("");
  var email = $("#CAemail").val();
  if (validateEmail(email)) {
	return true;
  } else {
    $("#result").show().text("Email inválido!");
    $("#result").css("color", "red");
	return false;
  }
  
}

/*$("#registar").bind("click", validate);
	 
	 
	 
 });