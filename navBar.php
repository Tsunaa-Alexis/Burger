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
   <?php if(!isset($_SESSION['idUser'])){ ?>
   <div class="container-header-auth">
     <a href="./?action=login" class="btn btn-outline-warning btn-sm  " aria-current="page">Connexion</a>
        <a  href="./?action=inscription" class="link-warning">Pas de compte, inscris toi!</a>
    </div>
    <?php } ?>
    <?php if(isset($_SESSION['idUser'])){ ?>
   <div class="container-header-auth">
     <a href="./scripts/logout.php" class="btn btn-outline-warning btn-sm  " aria-current="page">Deconnexion</a>
    </div>
    <?php } ?>
  </div>
        </form>
      </div>
    </div>
  </nav>
</header>