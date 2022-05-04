<?php include("header.php");?>

<main>
<div id="inscription-container ">
        <div class="main">
            <div class="container container-login">

                <div class="jumbotron">
                    <h1 class="display-4">Connexion</h1>
                    <p class="lead">Merci de vous identifier</p>
                </div>
                <div class="popUp hide">
                    <div class="messageAlerte">Identifiants incorrect</div>
                </div>
                <form method="post" id="formId"  onsubmit="return verifForm(this)" novalidate>
                    <div class="form-group row">
                        <div class="col-md-4 mb-3">
                            <label for="email">Adresse électronique : </label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
                            <div class="invalid-feedback">
                                Le champ email est obligatoire
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 mb-3">
                            <label for="motDePasse1">Mot de passe :</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="invalid-feedback">
                            Vous devez fournir un mot de passe.
                        </div>
                    </div>
                    <input type="submit" value="Je me connecte" class="btn btn-warning mb-5 mt-4" />               
                </form>
            </div>
        </div>
        </div>


      <?php include("footer.php");?>
