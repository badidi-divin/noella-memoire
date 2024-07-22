<?php
    session_start();
        // code pour aller inserer les données à la base des donées au niveau du dossier model
        require_once("../bdd/connexion.php");
        require_once("../model/insection-parent.php");
        require_once("../model/selectionCommunique.php");
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
        require_once("entete.php");
   ?>
</head>
<body>
  <?php
        require_once("menu.php");
   ?>
<!-- END nav -->

<div class="hero-wrap js-fullheight" style="background-image: url('../includes/images/21.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
      <div class="col-md-7 ftco-animate">
        <h1 class="mb-4">Bienvenue <a href="logout.php" title="voulez-vous déconnecter?"> <?= $_SESSION['nom_de_famille']  ?></a> la reussite amène le progrès</h1> 
        <form method="get" action="" class="searchform order-sm-start order-lg-last">
        <div class="form-group d-flex">
          <input type="text" name="motcle" value="<?php echo ($mc) ?>" class="form-control pl-3" placeholder="Rechercher un Communiqué...">
        <button type="submit" placeholder="rechercher un artile" class="form-control search" > <span class="glyphicon-search">Rechercher</span></button>
      </div>
     </form>
    </div>
</div>
</div>
</div>

<!-- <section class="ftco-section ftco-no-pb ftco-no-pt">
   <div class="container">
      <div class="row">
         <div class="col-md-7"></div>
         <div class="col-md-5 order-md-last">
          <div class="login-wrap p-4 p-md-5">
              <h3 class="mb-4">Enregistrez vous chers Parents</h3>
                <form action="" method="post" class="signup-form">
                   <div class="form-group">
                      <label class="label" for="nom_de_famille">Nom</label>
                      <input type="text" class="form-control" placeholder="NKANGA" name="nom_de_famille" required="required">
                  </div>
                  <div class="form-group">
                      <label class="label" for="email_parent">Email</label>
                      <input type="email" class="form-control" placeholder="Noellankanga@gmail.com" name="email_parent" required="required">
                  </div>
                  <div class="form-group">
                   <label class="label" for="telephone_parent">Téléphone</label>
                   <input type="number" class="form-control" placeholder="+243 816901800" name="telephone_parent" required="required">
               </div>
               
               <div class="form-group d-flex justify-content-end mt-4">
                   <button type="submit" class="btn btn-primary submit" name="envoie"><span class="fa fa-paper-plane">S'incrire</span></button>
               </div>
           </form>
     </div> -->
     
 </div>
</div>
</div>
</section>
<section class="ftco-section bg-light">
   <div class="container">
      <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading"></span>
            <h2 class="mb-4">ACTUALITES</h2>
        </div>
    </div>
    <div class="row">
    <?php
        foreach ($blog as $blog):
    ?>
    <div class="col-md-4 ftco-animate">
      <div class="project-wrap">
           <a href="#" class="img" style="background-image: url('../includes/images/<?= $blog->image; ?>')">
              <span class="price"><?= $blog->id_evenement; ?></span>
          </a>
          <div class="text p-4">
              <p><?= substr($blog->description, 0,50);?>...</p>
              <p><?= $blog->dates;?></p>
              <a href="suite.php?id=<?= $blog->id_publication; ?>" class="btn btn-primary">lire la suite</a>    
          </div>
      </div>
  </div>
   <?php
    endforeach; 
  ?> 
</div>
</div>
</section>

 <?php
        require_once("footer.php");
   ?>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

   <?php
        require_once("pied.php");
   ?>

</body>
</html>