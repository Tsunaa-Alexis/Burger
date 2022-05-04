<?php

  session_start();
  
  function chargerClasse($classname){ require 'classes/class.'.$classname.'.php'; }
  spl_autoload_register('chargerClasse');

  include_once("./scripts/connectBDD.php");

  $userManager = new UserManager($db);
  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Burger</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/general.css">
<link rel="stylesheet" href="./modules/composition/css/composition.css">
<!-- Flexslider -->
<link rel="stylesheet" href="./css/flexslider.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

        <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-warning" href="" >MyBurger</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="./" >Home</a>
          </li>
        </ul>
        <form class="d-flex">
         
        <div class="input-group">
   <div class="input-group-addon">
	<span class="glyphicon glyphicon-person-fill"></span> 
   </div>
   <div class="container-header-auth">
     <a href="./?action=login" class="btn btn-outline-warning btn-sm  " aria-current="page">Connexion</a>
        <a  href="./?action=inscription" class="link-warning">Pas de compte, inscris toi!</a>
    </div>
  </div>
        </form>
      </div>
    </div>
  </nav>
</header>
