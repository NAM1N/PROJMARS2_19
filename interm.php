<?php
session_start();
   try
	  {
		 $bd=New PDO('mysql:host=localhost;dbname=alimentation','root','');
	//   $bd=new PDO('mysql:host=sql.nsipaie.com;dbname=c3074_nsidb','C3074dbuRW','QUp_Ari8d');
	 // $bd=new PDO('mysql:host=sql.nsipaie.com;dbname=c3074_nsidb','c3074_cmoussa','NsiData2018');
	  }
	  catch(exception $e)
	  {
		  die('Erreur:'.$e->getMessage());
	  }
	

      // inserre un commentaire
	 $req2=$bd->prepare('INSERT INTO `coment`(`Id_comt`, `commentaire`, `recette`, `client`, `dat_comt`) VALUES(NULL,?,?,?,Now())');
	$rep=$req2->execute(array($_POST["com"],$_SESSION["recet"],$_SESSION["id_cli"]));

       if(!$req2->execute(array($com,$id,$_SESSION["id_cli"])))
		     {
			  print_r($req2->errorInfo());
			  
			  }
			  
		$req2->closeCursor();	  
	 header('location:commentaire.php?recet='.$_SESSION["recet"].'');


 


	      //se connecter à la base D
		
	 
	  


  
         ?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>

</body>
</html>