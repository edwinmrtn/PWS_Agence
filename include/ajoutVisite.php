<?php 
session_start();

foreach($_SESSION as $ligne => $element){
		if($_GET['id'] == $element){
		 echo '<script type="text/javascript">alert("Vous avez deja choisi ce Bien!");</script>';
		 echo "<script type='text/javascript'>document.location.replace('rechercheBiens.php');</script>";
	}
}
if(count($_SESSION)<5){
		$index = 'INDEX' . count($_SESSION);
		$_SESSION[$index] = $_GET['id'];
}
echo "ok";

//echo "<script type='text/javascript'>document.location.replace('rechercheBiens.php');</script>";
?>
