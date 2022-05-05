function suppIngredient(idIngredient){

	var dataToInsert = new Object();
	dataToInsert.idIngredient = idIngredient;
	
	var requestAjaxCombo = $.ajax({
	  url: "./scripts/ingredient.php",
	  type: "POST",
	  data: dataToInsert,
	  dataType: 'json',
	  cache: false,
	  async: true
	});
	
	requestAjaxCombo.done(function(data){

        window.location.replace("./?action=listeIngredients");

	});

    return false;
	
}