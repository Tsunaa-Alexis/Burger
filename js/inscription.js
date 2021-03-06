function verifForm(form){

    $('form').addClass("was-validated")
    $(".email.invalid-feedback").text("Vous devez fournir un email valide.")

    if(!form.nom.value){ return false; }
    if(!form.prenom.value){ return false; }
    if(!form.email.value.match(/[a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]+/i) || !form.email.value){ return false; }
    if(!form.motdepasse1.value){ return false; }

	var dataToInsert = new Object();
	dataToInsert.nom = form.nom.value;
	dataToInsert.prenom = form.prenom.value;
	dataToInsert.email = form.email.value;
	dataToInsert.password = form.motdepasse1.value;
	
	var requestAjaxCombo = $.ajax({
	  url: "./scripts/addUser.php",
	  type: "POST",
	  data: dataToInsert,
	  dataType: 'json',
	  cache: false,
	  async: true
	});
	
	requestAjaxCombo.done(function(data){

        if(data.emailPresent === true){
            $("input[name=email]").val("")
            $(".email.invalid-feedback").text("Cette email est déjà utilisé")
            return false;
        }

        window.location.replace("./?action=login");

	});

    return false;
	
}