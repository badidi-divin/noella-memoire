<?php 
 
 ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
   <div class="container">
     <a class="navbar-brand" href="index.html"><span>COLLEGE DES GENIES</span> RUTA</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="oi oi-menu"></span> Menu
   </button>

   <div class="collapse navbar-collapse" id="ftco-nav">
       <ul class="navbar-nav ml-auto">
         <li><a href="accueil.php" class="nav-link">Accueil</a></li>
         <li><a href="notification.php" class="nav-link"><span><span class="badge badge-danger" id="count"><?php
                                    $nblmd=$pdo->prepare('SELECT * FROM individuel WHERE email=?');
                                    $nblmd->execute(array($_SESSION['email']));
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?></span>Notification</a></li>

     </ul>
 </div>
</div>
</nav>