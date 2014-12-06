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
 <?php
 $typebiendonnees = $bdd->query('SELECT *  FROM  typeBien'); 
 
 
 echo '<FORM method="post" action="consultCat.php">';
 echo '<SELECT NAME="Rubrique" onChange="Choix(this.form)">';
 	while ($typebien = $typebiendonnees->fetch())
{
	echo '<OPTION name="villa" >' . $typebien[nomType] .'</OPTION>' ;
}
 echo '</SELECT>';
  echo '<input type="submit" value="Afficher" style="background-color:#3cb371" style="color:white; font-weight:bold"/>';
 echo '</FORM>';
 
if (isset($_POST['Rubrique']))
{ 
$req = $bdd->prepare('SELECT *  FROM  bien b,typeBien tb  WHERE  b.idType = tb.idType and  ?  = tb.nomType');
$req->execute(array($_POST['Rubrique']));

echo '<TABLE BORDER>';
echo  '<TR>' . '<TD>Titre de la villa</TD><TD>Image</TD></TR>';
	while ($donnees = $req->fetch())
{
	echo  '<TR>' . '<TD>' . $donnees['titreBien'] .'</TD>'  . ' <TD> ' . '<a href="detailBien.php?id='. $donnees['idBien']. '"> <img " src="../images/'. $donnees['photoBien'] .'"alt="Image Maisons"></a>' . '</TD>' . '</TR>';
}
echo '</TABLE>';

}
else{
echo 'la villa existe pas';
}
 
 ?>
 
</html>