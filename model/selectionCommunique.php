<?php
       $mc="";
        //Pagination nom_produitbre d'element par page    
      if(isset($_GET['motcle'])){
        $mc=htmlspecialchars($_GET['motcle']);
        $req="SELECT * FROM publication WHERE id_evenement LIKE '%$mc%' ORDER BY id_publication DESC";
      }
      else
      {
        $req="SELECT * FROM publication ORDER BY id_publication DESC";
      }
      $ps=$pdo->prepare($req);
      $ps->execute();
      $data=$ps->fetchAll(PDO::FETCH_OBJ);
      $ps->closeCursor();
      $blog=$data;
 ?>
