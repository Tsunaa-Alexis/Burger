<!DOCTYPE html>
<html>
    <head>
        <title>Ingédients</title>
        <?php include("header.php");?>
        <link rel="stylesheet" href="./modules/ingredients/css/addIngredient.css">
        <link rel="stylesheet" href="./css/listing.min.css">
        <!-- <script language="javascript" type="text/javascript" src="./modules/categories/js/categories.min.js"></script> -->
    <script language="javascript" type="text/javascript" src="./modules/ingredients/js/ajoutIngredient.js"></script>       
    </head>
    <body> 
    <div class="main">

        <?php include ("navBar.php"); ?> 
        
        <?php
        $ingredientManager = new IngredientManager($db);
        $categorieManager = new CategorieManager($db);
        $arrayCategorie = $categorieManager->getAllCategorie();
       ?>
         <h1 class="m-4">Ajouter un ingédient</h1>
        <form class="row g-3 m-5 flex-column form" onsubmit="return verifIngredientForm(this)">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Nom Ingédient</label>
                <input type="text" name="nom" class="form-control" id="inputPassword2" placeholder="Nom Ingédient">
            </div>
            <!-- <?php echo "<pre>"; print_r($categorieManager->getAllCategorie())?>  -->
            <select class="form-select col-auto" name="categorie" aria-label="Default select example">
                <option selected>categories</option>
                <?php foreach($arrayCategorie as $categorie){?>
                <option value="<?=$categorie->getIdCategorie()?>"><?=$categorie->getNom()?></option>
                <?php } ?>
            </select>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Prix</label>
                <input type="number" name="prix" class="form-control" id="inputPassword2" placeholder="Prix">
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">IsVegetarien</label>
                <input type="number" name="isVegetarien" class="form-control" id="inputPassword2" placeholder="IsVegetarien">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-lg btn-warning">Ajouter</button>
            </div>
        </form> 
    </div>
        <?php include("footer.php");?>
    </body>
</html>