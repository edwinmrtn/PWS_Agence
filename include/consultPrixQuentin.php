<form method="post" action="consultPrix.php">
 
<p>
   
<?php include("connexion.php")?>
	</br>
	</br>
	</br>

	Quel budget avez-vous?
	</br>
	<input type="radio" name="Prix" value="< 200000" id="200k" checked="checked" /> <label for="oui"> < 200.000€</label>
	</br>
	<input type="radio" name="Prix" value=">= 200000 and prixBien <=300000" id="200-300k" /> <label for="non">de 200.000€ à 300.000€</label>
	</br>
	<input type="radio" name="Prix" value=" > 300000" id="300k" checked="checked" /> <label for="oui">> 300.000€</label>
	</br>
	<input type="submit" value="Valider" />
 </p>
 

 
</form>

 <?php
	if( isset( $_POST['Prix'] ))
	{
		$condition = 'where b.prixBien';
		

		$condition = $condition.$_POST['Prix'];
	
		
		echo "Je passe ici </br>";
		echo $condition."</br>";
		$reponse = $bdd->query('SELECT * FROM bien b, typebien t '.$condition.' and b.idType = t.idType');
		//echo 				   'SELECT * FROM bien b, typebien t '.$condition.' and b.idType = t.idType </br>';
		
		
		echo "<TABLE BORDER>" ;
		$ligne = $reponse->fetch();
		
		
		while($ligne = $reponse->fetch())//print("<img src=\"./image.jpg\" border=\"0\">");
		{
			echo '<TR>' . '<TD>' . $ligne['titreBien'] . '</TD>' . '<TD>' . $ligne['detailBien'] . '</TD>' . '<TD>' . $ligne['prixBien'] . '</TD>' . '<TD>' . $ligne['nomType'] . '</TD>' . '<TD>' . '<img src="../images/' . $ligne['photoBien'] . '"/>' . '</TD>' . '</TR>';

		}
		echo "</TABLE>";
	}
 
 
 
 ?>