<?php 
//demarre la session
echo session_name();
$nomsession = session_name("VISITES");

session_start();
echo $nomsession;

foreach($VISITES as $ligne => $element){
		if($_GET['id'] == $element){
		 echo '<script type="text/javascript">alert("Vous avez deja choisi ce Bien!");</script>';
		 echo "<script type='text/javascript'>document.location.replace('rechercheBiens.php');</script>";
	}
}
if(count($VISITES)<5){
		$index = 'INDEX' . count($VISITES);
		$VISITES[$index] = $_GET['id'];
}
echo "ok";

//echo "<script type='text/javascript'>document.location.replace('rechercheBiens.php');</script>";
?>
