<!DOCTYPE html>
<html>
    <head>
        <title>Catégories</title>
        <?php include ("header.php"); ?>
        <link rel="stylesheet" href="./modules/ingredients/css/listingIngredients.min.css">
        <link rel="stylesheet" href="./css/listing.min.css">
        <!-- <script language="javascript" type="text/javascript" src="./modules/categories/js/categories.min.js"></script> -->
        <script type="text/javascript">
            function changeResultatsParPage(){
                var url = '<?php echo recupGetVars(array('nbResultats','page')); ?>'
                url+= '&nbResultats='+document.forms.formChangeResultsParPage['nbResultats'].value
                window.location = url
            }
        </script>
    </head>
    <body>  
        <?php

        $ingredientManager = new IngredientManager($db) ;

        //init vars pagination
        if(!isset($_GET['nbResultats'])){ $_GET['nbResultats'] = $config_resultsParPageDefaut; }
        if(!isset($_GET['page'])){ $_GET['page'] = 1; }
        
        // TRI
        if(!isset($_GET['tri'])){ 
            $_GET['tri'] = 'nom'; 
            $_GET['sensTri'] = 'ASC';
        }

        if($_GET['tri'] == 'nom'){ $order = "ORDER BY nom"; }
        $order.= " ".$_GET['sensTri']." ";

        $nbrResultatsParPage = $_GET['nbResultats'];
        $debut = ($_GET['page'] - 1) * $nbrResultatsParPage;
        $limite = $nbrResultatsParPage;   
        
        $arrayIngredients = $ingredientManager->recupIngredients($debut, $limite, $order);

        //définition des pages pour l'affichage
        $nbrTotaleDePages = $arrayIngredients['numRows'];
        $infosPagination = generationPagination($nbrTotaleDePages,$nbrResultatsParPage,$_GET['page'],10);
        $nbrTotaleDePages = $infosPagination['nbrTotaleDePages'];
        $pagePrecedente = $infosPagination['pagePrecedente'];
        $pageSuivante = $infosPagination['pageSuivante'];
        $pageMinAffichee = $infosPagination['pageMinAffichee'];
        $pageMaxAffichee = $infosPagination['pageMaxAffichee'];
        
        ?>
        <div class="main">
            <?php include ("navBar.php"); ?>
            <div class="container">
                <div class="header">
                    <div class="sectionHeader" style="width:100%; height:40px;">
                        <div style="width:100%; height:40px;">
                            <div class="sectionTitle" style="float:left; padding-top:5px; font-size:25px;"><strong>Liste des Ingrédients</strong></div>
                                <div class="sectionAddAction" style="float:left; padding-left:20px;"><button type="button" onclick="msgBoxAddCategorie();" class="btn btn-info btn-sm" title="Ajouter une catégorie"><i class="fas fa-plus"></i> Catégorie</button></div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div style="height:39px;">
                        <div style="float:left; line-height:29px;"><i class="fas fa-list-ul"></i>&nbsp;<?=$arrayIngredients['numRows']?> Résultat(s)</div>
                        <div style="float:right;">
                            <form name="formChangeResultsParPage">
                                <label class="control-label" for="nbResultats" style="float:left; padding-top:5px; text-align:right; padding-right:10px;">Résultats / page</label>
                                <select name="nbResultats" style="width:65px; float:right;" onchange="changeResultatsParPage();">
                                <?php
                                    foreach($config_resultsParPage as $resultsParPage){
                                        $selected = "";
                                        if(isset($_GET['nbResultats']) && $resultsParPage == $_GET['nbResultats']){ $selected = "selected"; }
                                        if(!isset($_GET['nbResultats']) && $resultsParPage == $config_resultsParPageDefaut){ $selected = "selected"; }
                                        echo '<option value="'.$resultsParPage.'" '.$selected.'>'.$resultsParPage.'</option> ';	 
                                    }
                                ?> 				
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="results">
                    <div class="entetes">
                        <div class="nom hoverAction" onclick="document.location.href='<?=genLienTri('nom'); ?>'">Intitule<i class="<?=genIconeTri('nom'); ?>"></i></div>
                        <div class="idCategorie">IdCategorie</div>
                        <div class="prix">prix</div>
                        <div class="isVegetarien">Vegétarien</div>
                        <div class="action"></div>
                    </div>
                    <?php 
                    if(!empty($arrayIngredients['result'])){
                        foreach($arrayIngredients['result'] as $ingredient){ ?>

                            <div id="ligne-<?=$ingredient->getIdIngredient()?>" class="ligne">
                                <div class="nom"><?=$ingredient->getNom()?></div>
                                <div class="idCategorie"><?=$ingredient->getCategorie()?></div>
                                <div class="prix"><?=$ingredient->getPrix()?></div>
                                <div class="isVegetarien"><?=$ingredient->getIsVegetarien()?></div>
                                <div class="action">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-secondary" title="modifier" onclick="msgBoxEditCategorie(<?=$ingredient->getIdIngredient()?>)"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" title="Supprimer" onclick="suppCategorie(<?=$ingredient->getIdIngredient()?>)"><i class="fas fa-times-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                        <?php }
                    }
                    ?>
                </div>
                <?php if($nbrTotaleDePages > 1){ ?>
                    <nav style="align-self: self-end;">
                        <ul class="pagination">
                            <!-- page précédente et première page -->
                            <li class="page-item  <?=($_GET['page'] > 1)?:'hide'; ?>"><a class="page-link" href="<?=recupGetVars(array('page')); ?>&page=1"><i class="fas fa-angle-double-left"></i></a></li>
                            <li class="page-item <?=($_GET['page'] > 1)?:'hide'; ?>"><a class="page-link" href="<?=recupGetVars(array('page')); ?>&page=<?=$pagePrecedente; ?>"><i class="fas fa-angle-left"></i></a></li>
                            <!-- pages centrales -->
                            <?php
                            $i = $pageMinAffichee;
                            while ($i <= $pageMaxAffichee){
                            ?>
                                <li <?=($_GET['page'] == $i)?'class="active page-item"':''; ?>><a class="page-link" <?=($_GET['page'] != $i)?'href="'.recupGetVars(array('page')).'&page='.$i.'"':''; ?>><?=$i; ?></a></li>
                            <?php
                                $i++;
                            } ?>
                            <!-- page suivante et dernière page -->
                            <li class="page-item <?=($_GET['page'] < $nbrTotaleDePages)?:'hide'; ?>"><a class="page-link" href="<?=recupGetVars(array('page')); ?>&page=<?=$pageSuivante; ?>"><i class="fas fa-angle-right"></i></a></li>
                            <li class="page-item <?=($_GET['page'] < $nbrTotaleDePages)?:'hide'; ?>"><a class="page-link" href="<?=recupGetVars(array('page')); ?>&page=<?=$nbrTotaleDePages; ?>"><i class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                        </nav>
                <?php } ?>
            </div>
        </div>
        <?php include("footer.php");?>
    </body>
</html>