<?php
       $mc="";
        //Pagination nom_produitbre d'element par page    
      if(isset($_GET['motcle'])){
        $mc=htmlspecialchars($_GET['motcle']);
        $req="SELECT * FROM individuel WHERE nom LIKE '%$mc%' ORDER BY id DESC";
      }
      else
      {
        $req="SELECT * FROM individuel ORDER BY id DESC";
      }
      $ps=$pdo->prepare($req);
      $ps->execute();
      $data=$ps->fetchAll(PDO::FETCH_OBJ);
      $ps->closeCursor();
      $blog=$data;
 ?>
