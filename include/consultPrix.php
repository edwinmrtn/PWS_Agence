<!DOCTYPE html>
<html>

	<head>
      	<meta charset="utf-8" />
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
		<title>Mon site ! </title>
    </head>
    <body>
 	<div class="container">

 		<div class="row">
			 <?php include("connexion.php"); ?>
			  <div class="col-lg-12">
				 <?php include("entete.php"); ?>
			  </div>
		</div>
			<div class="row">
                <div class="col-lg-offset-3 col-lg-8">
                     <h1>Mon  site</h1>
                </div>
            </div>    
            <div class="row">
                   <div class="col-lg-6">
                    <?php include("menus.php"); ?>
                </div>
                <div class="col-lg-offset-3 col-lg-6"> 

					<form class="form-horizontal" action="consultPrix.php" method="post">
						<fieldset>

						<!-- Form Name -->
						<legend>Choisir une tranche de prix :</legend>
						<!-- Multiple Radios -->
						<div class="control-group">
						  <label class="control-label" for="prix">Multiple Radios</label>
						  <div class="controls">
						    <label class="radio" for="prix-0">
						      <input type="radio" name="prix" id="prix-0" value="0" <?php if(isset ($_POST['prix']) and $_POST['prix'] == 200) {echo 'checked="checked"';}?>>
						      moins de 200.000€
						    </label>
						    <label class="radio" for="prix-1">
						      <input type="radio" name="prix" id="prix-1" value="50" <?php if(isset ($_POST['prix']) and $_POST['prix'] == 250) {echo 'checked="checked"';}?> >
						      de 200.000€ € 300.000€
						    </label>
						    <label class="radio" for="prix-2">
						      <input type="radio" name="prix" id="prix-1" value="100"  <?php if(isset ($_POST['prix']) and $_POST['prix'] == 300) {echo 'checked="checked"';}?> >
						      supperieur a 300.000€
						    </label>
						  </div>
						</div>
						<input type="submit" value="Afficher" style="background-color:#3cb371" style="color:white; font-weight:bold"/>

						</fieldset>
					</form>
				</div>
			</div>
		

		
			<?php
				if (isset($_POST['prix'])) //si un bouton radio a été selectionné 
				{
					if( $_POST['prix'] == 0) {
					$reponse = $bdd->query('SELECT *  FROM  bien b,typeBien tb  WHERE  prixBien <200000 and b.idType = tb.idType');
					}
					if( $_POST['prix'] == 50) {
					$reponse = $bdd->query('SELECT *  FROM  bien b,typeBien tb  WHERE  prixBien BETWEEN 200000 AND 300000 and b.idType = tb.idType');
					}
					if( $_POST['prix'] == 100) {
					$reponse = $bdd->query('SELECT *  FROM  bien b,typeBien tb WHERE  prixBien >300000 and b.idType = tb.idType ');
					}
					
				echo '<TABLE BORDER>';
				echo  '<TR>' . '<TD>Titre de la villa</TD><TD>Detail de la villa</TD><TD>Prix</TD><TD>Type de villa</TD><TD>Image</TD></TR>';
					while ($donnees = $reponse->fetch()) // envoyer ligne par ligne dans données
					{
						echo  '<TR>' . '<TD>' . $donnees['titreBien'] .'</TD>'  . '<TD>' . $donnees['detailBien'] .'</TD>' . '<TD>' . $donnees['prixBien'] .'</TD>'. '<TD>' . $donnees['nomType'] .'</TD>'. ' <TD> ' . '<img src="../images/'. $donnees['photoBien'] .'"alt="Image Maisons">' . '</TD>' . '</TR>';
					}
					}
				else 
				{
					echo 'Il faut renseigner le prix !'; // message d'erreur
				}
			?>
		</div>
	</body>
</html>