function verifForm(form){

    $('form').addClass("was-validated")

    if(!form.email.value){ return false; }
    if(!form.password.value){ return false; }

	var dataToInsert = new Object();
	dataToInsert.email = form.email.value;
	dataToInsert.password = form.password.value;
	
	var requestAjaxCombo = $.ajax({
	  url: "./scripts/login.php",
	  type: "POST",
	  data: dataToInsert,
	  dataType: 'json',
	  cache: false,
	  async:true
	});
	
	requestAjaxCombo.done(function(data){

        if(data === true){
            window.location.replace("./");
        }
        if(data === false){ 
            $(".popUp").removeClass('hide')
            return false;
        }

	});

    return false;
	
}