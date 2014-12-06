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
<form method="post" action="rechercheBien.php">
   <p>
       <label for="arecherche">Rechercher</label> : 
	   <input type="search" name="arecherche" id="arecherche"/>
   </p>
</form>

<?php
if (isset($_POST['arecherche']))
{
	//$resultdetail[0]="";
	//$resultid[0]="";
	//$resultphoto[0]="";
	
	$result[0] = ""; 
	$iterator = 0;
	$cpt2= 0;
	$arecherche = explode(" ", $_POST['arecherche']); //separe tout les mots recherché
 
	$reponse = $bdd->query('SELECT * FROM  Bien '); 
	while ($donneestableau = $reponse->fetch())
	{
    $cpt = 0;
    $description = ""; 
	$donneesdetail = str_replace(","," ", $donneestableau['detailBien']);
	
	$motrechercher = explode(" ", $donneesdetail);
    
    foreach($motrechercher as $element)
		  {
		  	//echo $element; 
        
        	if (isset ($arecherche[0]) and !isset($arecherche[1]) and !isset($arecherche[2]))
	       	{
							//	 echo strcasecmp($element, $arecherche[0] ) . '<br />';
		        	           if (strcasecmp($element, $arecherche[0] )==0)
								{
								  $description = $description ." <b style='color:red'> ". $element . "</b>";
								  $cpt++;
								}	
								else {
								$description = $description ." ". $element ;
								//echo "TOUT LE TEMPS";
								}
								
            }             
			if (isset ($arecherche[0]) and isset ($arecherche[1]) and $arecherche[1] <> $arecherche[0] and !isset($arecherche[2]))  
			{
									// echo strcasecmp($element, $arecherche[0] ) . '<br />';
										
										if (strcasecmp($element, $arecherche[0] )==0)
										{
										  $description = $description ." <b style='color:red'> ". $element . "</b>";
										  $cpt++;
										}
										elseif (strcasecmp($element, $arecherche[1] )==0)
										{
											$description = $description ." <b style='color:red'> ". $element . "</b>";
											$cpt++;
										}										
										else	{
										$description = $description ." ". $element ;
										}
            }  
			if (isset ($arecherche[0]) and isset ($arecherche[1]) and isset ($arecherche[2])and $arecherche[2] <> $arecherche[0] and $arecherche[1] <> $arecherche[2])
			{   
												//echo strcasecmp($element, $arecherche[2]) . '<br />';
												if (strcasecmp($element, $arecherche[0] )==0)
												{
												  $description = $description ." <b style='color:red'> ". $element . "</b>";
												  $cpt++;
												}
												elseif (strcasecmp($element, $arecherche[1] )==0)
												{
													$description = $description ." <b style='color:red'> ". $element . "</b>";
													$cpt++;
												}		
												elseif (strcasecmp($element, $arecherche[2] )==0)
												{
													 $description = $description ." <b style='color:red'> ". $element . "</b>"  ;
													 $cpt++;
												}
												else	{
												$description = $description ." ". $element ;
												}
			}		
	       	}
if($cpt> 0){
		 
		 $resultphoto[$iterator] =$donneestableau['photoBien'];
		 $resultid[$iterator] = $donneestableau['idBien'];//pour l'id
		 $resultdetail[$iterator] =  $description; // pour les details
		 $iterator++;
  }
        
}
	echo '<TABLE BORDER>';
if(isset($resultphoto[0]) and  isset($resultid[0]) and isset($resultdetail[0])){	
	 foreach($resultdetail as $lignedetail){
	 
	 echo  '<TR>' . '<TD>' . $lignedetail .'</TD>' .' <TD> ' . '<img src="../images/'. $resultphoto[$cpt2] .'"alt="Image Maisons">' . '</TD>' . '<TD>' . '<a href="saisirUneVisite.php?id='. $resultid[$cpt2] . '">Lien</a> </TD>' . '</TR> ';
	 $cpt2++;
	 }
 }
 else{
 echo "pas de resultat";
 }
 echo '</TABLE>';
}

?>
</html>