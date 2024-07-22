<?php
  session_start();
  $erreur=array();
  $id=$_GET['id'];

  require_once('../bdd/connexion.php');
  require_once '../model/functions.php';

  $nom=$_SESSION['nom_de_famille']."(".$_SESSION['email'].")";

  extract($_GET);

    // La fonction strip tags permet de supprimer le html lors de l'envoie    
    $id=strip_tags($id);

    if (!empty($_POST)){

      extract($_POST);
      $errors=array();

      $comment=strip_tags($comment);


        if (empty($comment)) 
          array_push($errors, 'Entrer un commentaire');


              if (count($errors)==0){

                    $comment=addComment_blog($id,$nom,$comment);
                    $success='Votre commentaire a bien été publié';
                    unset($auteur);
                    unset($comment);
                    
                  }             
     
         }
  $blogs=getblogs($id); 
  $comments=getComments_blog($id);

 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php
    require_once('entete.php');
  ?>
 <style type="text/css">
    .right p{
      background-color: #86BB71;
      padding: 15px;
      border-radius: 8px;
      color: white;
    }
  </style>
</head>
<body>
  <?php
    require_once('menu.php');
  ?>
 <!-- END nav -->
 
 <section class="hero-wrap hero-wrap-2" style="background-image: url('../includes/images/<?php echo $blogs->image; ?>');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <h1 class="mb-0 bread">Details de la Publication : <?= $blogs->id_evenement; ?></h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section bg-light">
 <div class="container">
  <div class="row">
   <div class="col-md-4 ftco-animate d-flex align-items-center align-items-stretch">
    <div class="staff-2 w-100">
     <div class="img-wrap d-flex align-items-stretch">
      <a href="zoom.php?id=">
      <div class="img align-self-stretch d-flex align-items-end" style="background-image: url('../includes/images/<?php echo $blogs->image; ?>');">
       <div class="text mb-4 text-md-center">
        <h3><?= $blogs->id_evenement; ?></h3>
        <a href="#" class="btn btn-success"></a>
        <div class="faded">
         <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
      </div>
    </div>
  </div>
  </a>
</div>
</div>
</div>
<div class="col-md-8 d-flex align-items-center">
  <div class="staff-detail w-100 pl-md-5">
   <h3><?= $blogs->id_evenement; ?></h3>
   <p style="color: black;"><?= $blogs->description; ?></p>
   <h3>Date de l'évenement</h3>
   <h3>Pour plus d'infos Contactez-Nous</h3>
   <p style="color: black;">+243 898190351</p>
 </div>
</div>
</div>
</div>
</section>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
   
        <div class="col-md-12">
                <?php
      if (isset($success))
        echo $success;
      if(!empty($errors)):?>
      <?php
        foreach($errors as $error):?>
          <div class="row">
            <div class="col-md-6">
              <div class="alert alert-danger"><?= $error?></div>
            </div>
          </div>
      <?php
        endforeach;?>
    <?php
      endif; ?>
          <div class="wrapper">
            <div class="row no-gutters">
              <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                <div class="contact-wrap w-100 p-md-5 p-4">
                  <h3 class="mb-4">Laissez un commentaire ici</h3>
                  <form method="POST" id="contactForm" action="" class="contactForm">
                        <?php
                    if (!empty($erreur)):
                  ?>
                  <div class="alert alert-danger">
                    <p></p>
                      <ul>
                        <?php foreach($erreur as $erreur):?>
                          <li><?= $erreur; ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>

                    <?php endif; ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="#">Message</label>
                          <textarea name="comment" class="form-control" id="message" cols="30" rows="4" id="comment" cols="30" rows="8" required="required"><?php if(isset($comment)) echo $comment; ?></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="submit" value="Envoyer Message" class="btn btn-primary">
                          <div class="submitting"></div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
      
        <h3>Commentaires postés</h3>
    <?php foreach ($comments as $com): ?>
      <div class="right">
        <h3 ><a href="#"><?=  $nom; ?></a></h3>
        <time><?= $com->date_commentaire ?></time>
        <p><?= $com->poster_commentaire ?>
      </div>
    <?php endforeach; ?>
        <div class="col-md-12 mt-5">
          <div id="map" class="bg-white"></div>
        </div>
      </div>
    </div>
  </section>
  </div>
 </div>
</div>
</div>
</div>
</section>
<?php
  require_once('footer.php');
  require_once('pied.php');
?>
</body>
</html>
