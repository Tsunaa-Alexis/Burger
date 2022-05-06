
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
    <?php if(!isset($_SESSION['idUser'])){ header('Location: ./'); } ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./modules/composition/css/composition.css">
    <script language="javascript" type="text/javascript" src="./modules/composition/js/composition.js"></script>
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


       <?php
        $ingredientManager = new IngredientManager($db);
        $arrayIngredients = $ingredientManager->recupIngredients();
        $arrayIngredients = $arrayIngredients['result'];
       ?>


<!-- <div id="ingredients"> -->
  <div class="container-card">
    <!-- faire loop sur carte des ingredients -->
    <div class="card" style="width: 8rem;" id="ingredients-ajout">
            <!-- <?php echo "<pre>"; print_r($arrayIngredients)?>  -->

    <?php foreach($arrayIngredients as $ingredient){?>

      <div class="oneCard">
        <img src="<?=$ingredient->getImg()?>" class="card-img-top" alt="tomate">
          <span><?=$ingredient->getPrix()?> €</span>

        <div class="card-body">
          <h5 class="card-title" id="nom-ingredient"><?=$ingredient->getNom()?> </h5>
          <a href="#" id="ajout-ingredient-bouton" class="bout" onclick="initElement()">Ajouter</a>
        </div>
      </div>
    <?php } ?>



</div>
<!-- </div> -->

<!-- fin container ajout -->


  




  <?php include("footer.php");?>
</body>
</html>

