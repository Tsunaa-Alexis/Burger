function myFunctionViande() {
    var x = document.getElementById("ingredients-ajout");
    if (x.style.display === "none") {
        x.style.display = "flex";
    } else {
        x.style.display = "none";
    }
}

const ajouterIngredient = () => {
    console.log("je veux ajouter");
    var listAjoute = document.getElementById("list-ingredients-ajoutes");
    var newDiv = document.createElement("li");
    var newContent = document.createTextNode('tomate');
    newDiv.appendChild(newContent);
    newDiv.setAttribute("class", "list-group-item");
    const newDivButton = newDiv.appendChild(document.createElement("button"));
    listAjoute.appendChild(newDiv);
}

const supprimerIngrédient = () => {
    console.log("je veux supprimer");
}