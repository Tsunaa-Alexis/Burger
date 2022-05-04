
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


<ul class="list-group" id="list-ingredients-ajout">
  <li class="list-group-item">An item</li>
  <li class="list-group-item">A second item</li>
  <li class="list-group-item">A third item</li>
  <li class="list-group-item">A fourth item</li>
  <li class="list-group-item">And a fifth one</li>
</ul>

<!-- faire loop sur carte des ingredients -->
 <div class="card" style="width: 18rem;">
  <img src="https://static9.depositphotos.com/1628352/1107/i/600/depositphotos_11071361-stock-photo-tomato.jpg" class="card-img-top" alt="tomate">
  <div class="card-body">
    <h5 class="card-title">Tomate</h5>
    <a href="#" class="btn btn-primary">Ajouter</a>
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
                       <a href="#" onclick="myFunction()">Choisir</a>
                    </div>
</div>
<script>
function myFunction() {
  var x = document.getElementById("list-ingredients-ajout");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
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
