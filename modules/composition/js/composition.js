function myFunctionViande() {
    var x = document.getElementById("ingredients-ajout");
    if (x.style.display === "none") {
        x.style.display = "flex";
    } else {
        x.style.display = "none";
    }
}

function initElement() {
    var ajouter = document.querySelectorAll(".bout");
    // console.log("ajouter", ajouter);
    for (i = 0; i < ajouter.length; i++) {
        ajouter[i].addEventListener('click', ajouterIngredient(i));
    }
    // ajouter.forEach(ajouter.onclick = ajouterIngredient)
}

const ajouterIngredient = (i) => {
    console.log("je veux ajouter", i);
//recuperation du npn de l'ingrédient:

    

    // var nomIngredient = document.getElementById("nom-ingredient");
    // var nomIngredientValue = nomIngredient.textContent;
    // console.log("nomIngredientValue", nomIngredientValue);
    // var listAjoute = document.getElementById("list-ingredients-ajoutes");
    // var newDiv = document.createElement("li");
    // var newContent = document.createTextNode('tomate');
    // newDiv.appendChild(newContent);
    // newDiv.setAttribute("class", "list-group-item");
    // const newDivButton = newDiv.appendChild(document.createElement("button"));
    // listAjoute.appendChild(newDiv);
}

const supprimerIngrédient = () => {
    console.log("je veux supprimer");
}