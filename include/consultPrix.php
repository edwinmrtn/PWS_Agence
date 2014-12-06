<!DOCTYPE html>
<html>

	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" type="text/css" href="./styles.css" />
		<title>Mon site ! </title>
    </head>
 
 <?php include("connexion.php"); ?>
 <?php include("entete.php"); ?>
<?php include("menus.php"); ?>
<t1>>Choisir une tranche de prix :</t1>

<FORM method="post" action="consultPrix.php">

<INPUT type= "radio" name="prix" value="200" <?php if(isset ($_POST['prix']) and $_POST['prix'] == 200) {echo 'checked="checked"';}?> > moins de 200.000€ <br/>
<INPUT type= "radio" name="prix" value="250" <?php if(isset ($_POST['prix']) and $_POST['prix'] == 250) {echo 'checked="checked"';}?>> de 200.000€ € 300.000€ <br/>
<INPUT type= "radio" name="prix" value="300" <?php if(isset ($_POST['prix']) and $_POST['prix'] == 300) {echo 'checked="checked"';}?>> supperieur a 300.000€ <br/>

<input type="submit" value="Afficher" style="background-color:#3cb371" style="color:white; font-weight:bold"/>
</FORM>

<?php
if (isset($_POST['prix'])) //si un bouton radio a été selectionné 
{
	if( $_POST['prix'] == 200) {
	$reponse = $bdd->query('SELECT *  FROM  bien b,typeBien tb  WHERE  prixBien <200000 and b.idType = tb.idType');
	}
	if( $_POST['prix'] == 250) {
	$reponse = $bdd->query('SELECT *  FROM  bien b,typeBien tb  WHERE  prixBien BETWEEN 200000 AND 300000 and b.idType = tb.idType');
	}
	if( $_POST['prix'] == 300) {
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
</html>