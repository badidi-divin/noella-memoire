<?php
		 

				$req="SELECT * FROM individuel";
			$ps=$pdo->prepare($req);
			$ps->execute();
			