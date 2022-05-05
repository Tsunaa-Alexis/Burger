
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
    <?php if(!isset($_SESSION['idUser'])){ header('Location: ./'); } ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript" type="text/javascript" src="js/inscription.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php include("navBar.php");?>
<main>

  <h1 class="display-4" id="title">Fabrique ton burger</h1>


<div class="container-ajout">

<!-- liste -->
<ul class="list-group" id="list-ingredients-ajoutes">
  <li class="list-group-item">Mes ingrédients choisis: </li>
  <li class="list-group-item">Tomate <button type="button" class="btn btn-sm" onclick="supprimerIngrédient()">Supprimer</button></li>
</ul>
<!-- fin liste -->

</div>


<div id="ingredients">
  <div class="container-card">
    <!-- faire loop sur carte des ingredients -->
    <div class="card" style="width: 8rem;" id="ingredients-ajout">
    
      <img src="https://static9.depositphotos.com/1628352/1107/i/600/depositphotos_11071361-stock-photo-tomato.jpg" class="card-img-top" alt="tomate">
      <div class="card-body">
        <h5 class="card-title">Tomate</h5>
        <a href="#" class="bout" onclick="ajouterIngredient()">Ajouter</a>
      </div>



          <img src="https://static9.depositphotos.com/1628352/1107/i/600/depositphotos_11071361-stock-photo-tomato.jpg" class="card-img-top" alt="tomate">
          <div class="card-body">
            <h5 class="card-title">Concombre</h5>
            <a href="#" class="bout" onclick="ajouterIngredient()">Ajouter</a>
          </div>


          <img src="https://static9.depositphotos.com/1628352/1107/i/600/depositphotos_11071361-stock-photo-tomato.jpg" class="card-img-top" alt="tomate">
          <div class="card-body">
            <h5 class="card-title">Patate</h5>
            <div class="bout">
            <a href="#"  onclick="ajouterIngredient()">Ajouter</a>
</div>
          </div>
    </div>
  </div>
</div>

<!-- fin container ajout -->


  <div id="price">
        <div class="table">
            <article>
                <div class="titreTable">
                    <h2>Viandes rouge</h2>
                </div>
                <div class="content">
                <div class="bout">
                       <a href="#" onclick="myFunctionViande()">Choisir</a>
                    </div>
    </div>
<script>
function myFunctionViande() {
  var x = document.getElementById("ingredients-ajout");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

const ajouterIngredient= ()=>{
  console.log("je veux ajouter");
  var listAjoute = document.getElementById("list-ingredients-ajoutes");
  var newDiv = document.createElement("li");
  var newContent = document.createTextNode('tomate');
  newDiv.appendChild(newContent);
  newDiv.setAttribute("class", "list-group-item");
  const newDivButton = newDiv.appendChild(document.createElement("button"));
  listAjoute.appendChild(newDiv);
}

const supprimerIngrédient=()=>{
  console.log("je veux supprimer");
}
</script>

            </article>

            <article>
                <div class="titreTable">
                    <h2>Légumes</h2>
                </div>
                <div class="content">
                <div class="bout">
                        <a href="#">Choisir</a>
                    </div>
          </div>
            </article>

            <article>
                <div class="titreTable">
                    <h2>Sauces</h2>
                </div>
                <div class="content">
                <div class="bout">
                        <a href="#">Choisir</a>
                    </div>
            </div>
            </article>
            
        </div>
  </div>





  <?php include("footer.php");?>
</body>
</html>

