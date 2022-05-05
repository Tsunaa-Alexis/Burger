<?php

  session_start();
  
  function chargerClasse($classname){ require 'classes/class.'.$classname.'.php'; }
  spl_autoload_register('chargerClasse');

  include_once("./scripts/connectBDD.php");

  $userManager = new UserManager($db);
  
?>

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
<script src="https://kit.fontawesome.com/768b55194c.js" crossorigin="anonymous"></script>
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

