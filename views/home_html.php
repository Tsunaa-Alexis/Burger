
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript" type="text/javascript" src="js/inscription.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php include("navBar.php");?>
<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-interval="100000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://fr.peugeot-saveurs.com/fstrz/r/s/c/fr.peugeot-saveurs.com/wp/wp-content/uploads/2021/02/IMG_0063-1024x0.jpg.avif?frz-v=32" class="d-block w-100" alt="burger">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Choisis un Burger parmis nos meilleur recette</h1>
            <p><a class="btn btn-lg btn-warning" href="">Go, j'ai faim!</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://www.sandraseasycooking.com/wp-content/uploads/2022/02/Build-Your-Own-Burger-Board-2.jpg" class="d-block w-100" alt="burger">

        <div class="container">
          <div class="carousel-caption">
            <h1>Fabrique ton burger sur mesure</h1>
            <p><a class="btn btn-lg btn-warning" href="./?action=composition">Go, j'ai faim!</a></p>
          </div>
        </div>
      </div>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <div class="container marketing">
   


  </div><!-- /.container -->
	<script src="js/jquery.flexslider-min.js"></script>
	<script>
		$(function () {
	       $('#date').datetimepicker();
	   });
	</script>
	<!-- Main JS -->
	<script src="js/main.js"></script>


  <?php include("footer.php");?>
    </body>
    </html>

