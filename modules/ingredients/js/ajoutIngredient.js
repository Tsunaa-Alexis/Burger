function verifIngredientForm(form) {

  
    var dataToInsert = new Object();
    dataToInsert.nom = form.nom.value;
    dataToInsert.prix = form.prix.value;
    dataToInsert.isVegetarien = form.isVegetarien.value;
     dataToInsert.categorie = form.categorie.value;
    console.log("dataToInsert: " + JSON.stringify(dataToInsert))

    var requestAjaxCombo = $.ajax({
        url: "./modules/ingredients/scripts/addIngredient.php",
        type: "POST",
        data: dataToInsert,
        dataType: 'json',
        cache: false,
        async: true
    });

    requestAjaxCombo.done(function (data) {

        //creation message ingédient crée
        console.log("data", data);
        // if (data.emailPresent === true) {
        //     $("input[name=email]").val("")
        //     $(".email.invalid-feedback").text("Cette email est déjà utilisé")
        //     return false;
        // }

        window.location.replace("./?action=ajoutIngredient");

    });

    return false;

}