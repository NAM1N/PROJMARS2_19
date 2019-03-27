<?php 
// connection
  if(!empty($_GET['id']))
  {
	$id=verifsaisi($_GET['id']); 
  }
  
  // les erreur
  //verifier les saisie
$tab=array("nom"=>"","descr"=>"","cat"=>"","prix"=>"","nomvide"=>"","descrvide"=>"","prixvide"=>"","imvide"=>"","valid"=>false);
$image="";
// les affectations
if (!empty($_POST))
{
       $tab["nom"]=verifsaisi($_POST['nom']);
       $tab["cat"]=verifsaisi($_POST['cat']);
       $tab["prix"]=verifsaisi($_POST['prix']);
       $tab["descr"]=verifsaisi($_POST['descr']);
	   $image=verifsaisi($_FILES["image"]["name"]);
	   $chemin="images/REPAS/".basename($image);
	   $extension=pathinfo($chemin,PATHINFO_EXTENSION);
       $tab["valid"]=true;
	  // $upload=false;
	   
	if ( empty($tab["nom"]))
	{
		$tab["nomvide"]="Quel est le nom de  cet ingredient? ";
		$tab["valid"]=false;
	}
    if(empty($tab["prix"]))
	{
	   $tab["prixvide"]="Quel est le prix de  cet ingredient? ";
	   $tab["valid"]=false;
	}
	
	if(empty($tab["descr"]))
	{
	   $tab["descrvide"]="je veux plus de detail? ";
	   $tab["valid"]=false;
	}
	if(empty($image))
	{
	   $imageReste=false;
	}else
	     {
			 $imageReste=true;
			 $upload=true;
			 if($extension !='png' && $extension !='gif' && $extension !='jpeg' && $extension !='jpg')
			 	{
					$tab["imvide"]="les formats autorisé sont png, gif,jpeg ou jpg";
					$upload=false;
					
				}
			  if(file_exists($chemin))
			    {
					$tab["imvide"]="l'image existe d&eacute;ja";
					$upload=false;
				}
			 if ($_FILES["image"]["size"]>500000)
			    {
					$tab["imvide"]="l'image ne doit pas depasser 500KB";
					$upload=false;
				}
			 if($upload)
			   {
				   if(! move_uploaded_file($_FILES["image"]["tmp_name"],$chemin))
				     {
						 $tab["imvide"]="une erreur lors du upload ,Veillez ressayer SVP !";
					     $upload=false;
					 }
			   }
	     }
if (( $imageReste && $upload && $tab["valid"])||(!$imageReste && $tab["valid"]))
  {
		   // connection
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
	 if ($imageReste )
		{
			// coonexion
			 // connection
		    try
	     {
		 $bd=New PDO('mysql:host=localhost;dbname=alimentation','root','');
	
	     }
	     catch(exception $e)
	      {
		  die('Erreur:'.$e->getMessage());
	      }
		  //
		  $req2='UPDATE `ingredient` SET `nom`=?,`titr`=?,`im`=?,`prix`=?,`categorie`=?,`dat_inscr_cli`= WHERE `Id`=?';

	     $req=$bd->prepare($req2);
			   // afficher
		  $req->execute(array($tab["nom"],$tab["descr"],$tab["prix"],$image,$tab["cat"],$id));
		  $req->closeCursor();
			   
		}
		else
		   {
			   
			   // connexion
			    // connection
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
		  // fin
		     $req1='UPDATE `ingredient` SET `nom`=?,`titr`=?,`prix`=?,`categorie`=?,`dat_inscr_cli`= NOW() WHERE `Id`=?';
				   $req=$bd->prepare($req1);
			   // afficher
		  $req->execute(array($tab["nom"],$tab["descr"],$tab["prix"],$tab["cat"],$id));
		  $req->closeCursor();
			}
		  
		      header("location:admin.php");
   }
    else if($imageReste && !$upload)
	    {
			 try
	  {
		 $bd=New PDO('mysql:host=localhost;dbname=alimentation','root','');
	
	  }
	  catch(exception $e)
	  {
		  die('Erreur:'.$e->getMessage());
	  }
	// recuperer les valeurs
	
     $req=$bd->prepare('SELECT * FROM `ingredient` WHERE `Id`=?');
			   // afficher
		  $req->execute(array($id));
		  $valeur=$req->fetch();
		  $image=$valeur["im"];
		  $req->closeCursor();
			
	    }
			
}
else
    {
		//connexion
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
	// recuperer les valeurs
	
     $req=$bd->prepare('SELECT `Id`, `nom`, `titr`, `im`, `prix`, `categorie`, `dat_inscr_cli` FROM `ingredient` WHERE `Id`=?');
			   // afficher
		  $req->execute(array($id));
		  $valeur=$req->fetch();
		  $req->closeCursor();
	}
   function verifsaisi($var)
 {
	 $var=trim($var);
	 $var=stripslashes($var);
	 $var=htmlspecialchars($var);
	 return $var;
 }
 //++++++++
 
         ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- mes fichiers-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" name="viewport" content="width=device-width,initial-scale=1"  />
<link rel="stylesheet" href="CSS/style.css" type="text/css" />
<link rel="shortcut icon" href="images/NSI.ico" /> 
<meta name="description" content="Niw&eacute;tian Services Informatiques, société spécialisée dans le développement de solutions logicielles spécifiques, construit VOTRE logiciel sur mesure selon VOS besoins." />
	  <meta name="keywords" content="logiciel sur mesure, developpement, informatique, vienne, conception logiciel informatique" />
		<meta name="author" content="Niw&eacute;tian Services Informatiques" />
<!-- fiohier exporté-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<script>

$(document).ready(function() {
	
	 $('.deroul1').hide();
	 // afficher le menu 
	$('.recet').hover(function(){
		$('.deroul1').show();
		
		});
	// cache le	
	$('.hom').hover(function(){
		$('.deroul1').hide();
		
		});	
	$('.sant').hover(function(){
		$('.deroul1').hide();
		
		});	
		
	$('.bud').hover(function(){
		$('.deroul1').hide();
		
		});	
   $('.recet1').hover(function(){
		$('.deroul1').hide();
		
		});	
 $('.conect').hover(function(){
		$('.deroul1').hide();
		
		});	
 $('.abon').hover(function(){
		$('.deroul1').hide();
		
		});	
		$('.command').hover(function(){
		$('.deroul1').hide();
		
		});
		///
		 $('.deroul2').hide();
	 // afficher le menu 
	
	$('.command').hover(function(){
		$('.deroul2').show();
		
		});
	// cache le	
	$('.recet').hover(function(){
		$('.deroul2').hide();
		
		});
	$('.sant').hover(function(){
		$('.deroul2').hide();
		
		});	
	$('.bud').hover(function(){
		$('.deroul2').hide();
		
		});	
   $('.recet1').hover(function(){
		$('.deroul2').hide();
		
		});	
 $('.conect').hover(function(){
		$('.deroul2').hide();
		
		});	
 $('.abon').hover(function(){
		$('.deroul2').hide();
		
		});	
  $('.hom').hover(function(){
		$('.deroul2').hide();
		
		});	
		
    
});
</script>

<!-- script jquery-->
<!-- fiohier CSS-->
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<style>
 /* ecran normal */
/* les plices */
#bloc1
{
	font-family: 'Open Sans Condensed', sans-serif;
	font-size:18px;color:#515457;
}
/*les liens debut*/
#lien a,.enf ,.adult
{
	color:#FFF;
	font-weight:bold;
	text-decoration:none;
	font-family:'Open Sans Condensed', sans-serif;
	font-size:18px;

}
.enf:hover{
	border-left:4px solid #0F6;
	padding-left:5px;
	color:#F90;
	text-decoration:none;
	 }
 .adult:hover{
	border-left:4px solid #999;
	padding-left:5px;
	
	color:#F90;
	text-decoration:none;
	 }
.lien .recet:hover,.recet1:hover
{
	border-bottom:#F60 solid 4px;
	

}
.lien .command:hover{
	border-bottom:4px solid #999;
	
	}
.lien .sant:hover
{
	border-bottom:#FFF solid 4px;

}
.lien .bud:hover
{
	border-bottom:#999 solid 4px;

}
.lien2 .conect:hover
{
	border-top:#F60 solid 4px;
	
}
.lien2 .abon:hover
{
	border-top:#999 solid 4px;
	
}

.lien li {
	}

ul li
{
	font-size:22px
	
}

/*les liens fin*/
/*les polices */
.titre{
	color:#F30}
label{
	font-size:18px;
	color:#FFF
}
/*les polices market */
.market{
	font-family: "Holtwood One SC",sans-serif;
	}
label{
	color:#333
	}
 .titr-market{
	 color:#F30;
	 text-align:center;
	 text-shadow:2px 2px #000 ;
	 
	 }
.menu-market{
	margin-bottom:30px;
	
	}
.thumbnail{

	box-shadow: 3px 2px #666666;
	
	}
.prix{
	background:#009;
	color:#FFF;
	box-shadow: 0 1px rbga(0,0,0,0,2);
	-moz-box-shadow: 0 1px rbga(0,0,0,0,2);
	-webkit-box-shadow: 0 1px rbga(0,0,0,0,2);
	position:absolute;
	right:6px;
	top:20px;
	padding:5px 10px;
	border-radius:3px;
	
	
	}
.prix:before{
	border:4px solid transparent;
	border-bottom:4px solid #F60;
	border-left:4px solid #F60;
	content:"";
	position:absolute;
	right:1px;
	top:-8px;

	}
.caption >h4{
	color:#F60;}
.ajou{
	background-color:#F60;
	color:#fff;
	padding:15px;
	text-decoration:none;
	font-size:16px;
	text-shadow:2px 3px #009;

	}
.ajou:hover,.ajou:focus{
	color:#009;
	text-shadow:2px 3px #FFF ;
	}
.admin{
	width:80%;
	margin:auto;
 
	}
.bcomd{
	background-color:#F60;
	width:100%;
	color:#fff;
	padding:15px;
	text-decoration:none;
	font-size:16px;
	text-shadow:2px 3px #009;

	}
.bcomd:hover,.bcomd:focus{
	color:#009;
	text-shadow:2px 3px #FFF ;
	}
/*formuliares */
input.transparent-input{
       background-color:rgba(0,0,0,0) !important;
       border: 2px solid #FFF;
	   color:#FFF;
	   font-size:18px;
	   font-weight:bold
	    !important;}
 /* ecran mobil */
 @media all and (max-width:1024px) 
 {
	#form1{
		
		}
 }
   
</style>

<!-- les police -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantarell">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Holtwood+One+SC">
<!--nom du site  -->
<title>NF | Nam1N FOOD</title>
</head>

<body id="bloc1" ><!-- bloc2 a fond image -->
<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand " href="#">
        <img alt="NamiN-FOOD" src="images/logo1.png" style="width:33%">
      </a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar" >
    <ul class=" lien nav navbar-nav" style="margin-left:-10%"  >
      <li ><a href="index.php" class="hom"><span class="glyphicon glyphicon-home"></span></a></li>
      <li class="active"><a class="command"><span class="glyphicon glyphicon-shopping-cart"></span>  COMMANDE</a>
         <p class="deroul2">
            <a class="adult"> REPAS</a>&nbsp;&nbsp;
            
            <a class="enf"> INGREDIENT</a>
      </li>
      <li><a class="recet"><span class="glyphicon glyphicon-cutlery"></span> RECETTE<span class="caret"></span></a>
         <p class="deroul1">
            <a class="enf"> ENFANTS & NOURISSONS </a>&nbsp;&nbsp;
            
            <a class="adult"> ADULTES</a>
           
         </p>
      </li>
      <li><a class="sant"><span class="glyphicon glyphicon-heart"></span> SANT&Eacute;</a></li>
      <li><a class="bud"><span class="glyphicon glyphicon-piggy-bank"></span>BUDGET</a></li>
      <li><a class="recet1">QUI SOMMES-NOUS <span class="glyphicon glyphicon-question-sign"></span> </a></li>
    </ul>
    <ul class=" lien2 nav navbar-nav navbar-right">
        <li ><a class="conect" ><span></span>Connexion  |</a></li>
        <li><a class="abon" href="abonne.php"><span></span>S'abonner</a></li>
    </ul>
   </div>
  </div>
</nav>
         <div class="col-md-12" >
             <div ><img src="images/logo.png" class="img-responsive" style="width:100%" /></div>
           </div>
          
       </div>   
      </header>
      
      
      <section>
         <div class="container-fluid admin">
           <div class="row">
             <h1 class="titr-market"><strong>MISE A JOUR DES INGREDIENTS</strong> </h1>
              <div class="col-md-6">
  
                   
                   <form method="post" action="<?php echo 'modif.php?id='.$id; ?>" enctype="multipart/form-data">
                   
                     <div class="form-group" >
                    <label for="nom">NOM</label><input type="text" placeholder="NOM" class="form-control" name="nom" id="nom"  value="<?php  echo $valeur["nom"];  ?>"/>
                     <p style="color:red; font-style:italic"><?php echo $tab["nomvide"]; ?>  </p>
                     </div>
                     <div class="form-group" >
                     <label>DESCRIPTION</label><input type="text" placeholder="Detail" class="form-control" name="descr"  value="<?php  echo $valeur["titr"];  ?>"/>
                     <p style="color:red; font-style:italic"><?php echo $tab["descrvide"]; ?>  </p>
                     </div>
                     <div class="form-group" >
                     <label for="prix">PRIX (en CFA)</label><input type="number"  placeholder="prix par Kilos" class="form-control" name="prix" id="prix"  value="<?php  echo $valeur["prix"];  ?>"/>
                     <p style="color:red; font-style:italic"><?php echo $tab["prixvide"]; ?>  </p>
                     </div>
                     <div class="form-group" >
                     <label>IMAGE:</label><p><?php echo $valeur["im"]; ?>  </p>
                     <label>SELECTIONNNER UNE IMAGE</label><input type="file" name="image"  value="<?php  echo $image;  ?>" />
                     <p style="color:red; font-style:italic"><?php echo $tab["imvide"]; ?>  </p>
                   </div>
                           <div class="form-group" > 
                    <label>CATEGORIE</label>
                       <select name="cat" class="form-control">
                        <?php 
						
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
						
						foreach($req2=$bd->query('SELECT * FROM `categorie`') as $result)
						
					{	
                          if($result['id_cat']==$valeur["categorie"])
						  {
						  echo '<option value="'.$result['id_cat'].'"> 			
				'.$result['nom_cat'].'</option>';
						  }else 
						       {
						echo '<option value="'.$result['id_cat'].'"> 
				'.$result['nom_cat'].'</option>';
								}
			
				    } 
                          
                          
                          ?>
                       </select>
                    </div>
                    
                   <div class="form-actions" style="margin-bottom:20px"  >
                   <button type="submit" class="btn btn-success">VALIDER</button>
                   
                   <a href="admin.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> RETOUR</a>
                   </div>
                   
                   
                </form>
              </div>
              <div class="col-md-6"> 
                <div class="thumbnail">
                   <img src="images/REPAS/<?php echo $valeur["im"];?>" />
                       <div class="prix"><?php echo $valeur['prix'];?>Frs/Kg</div>
                          
                          <div class="caption">
                          <h4><?php echo $valeur['nom'];?></h4>
                           <p><?php echo $valeur['titr'];?></p>
                          <form>
                             
                              <button type="submit" class="btn  btn-order bcomd"><span class="glyphicon glyphicon-shopping-cart"></span> COMMANDER</button>
                          </form>
                          </div>
                          
                      </div>
                   </div>
                      
                
                
              </div>
           </div>
         </div>

      </section>
      
<footer><!-- pied de page  -->
   <div class=" row " style=" background-color:#000; color:#FFF " >
      <div class="col-md-4"> 
     <ul style="list-style-type:none">
                    <h4 style="font-weight:bold;color:#FFF"> Contact</h4>
                <li><span class="glyphicon glyphicon-tower"></span> NF| Nam1N FOOD</li><br />
                <li><span class="glyphicon glyphicon-map-marker"></span>  Cocody Cit&eacute; des Arts,C&ocirc;te d'Ivoire</li><br />
                <li><span class="glyphicon glyphicon-earphone"></span>  (+225) 88 21 83 95 / 55 06 68 08</li><br />
                <li><span class="glyphicon glyphicon-envelope"></span>  <a href="mailto:coulibalycrouwatiealain@gmail.com" data-toggle="tooltip" data-placement="right" title="Ecrivez Nous" >coulibalycrouwatiealain@gmail.com</a></li>
     </ul>
      </div>
      <div class="col-md-4">
     <ul style="list-style-type:none;">
                  <h4 style="font-weight:bold;color:#FFF"> liens rapide</h4>
               <li><a href="#">ACCEUIL</a></li>
          
     </ul>
      </div>
      <div class="col-md-4">
     <ul style="list-style-type:none">
                  <h4 style="font-weight:bold; color:#FFF"> Suivez-Nous</h3>
               <li><a href="https://web.facebook.com/EmergenceServiceInformatique" target="_blank" data-toggle="tooltip" data-placement="right" title="suivez nous" ><img src="images/facebook.png" alt=""  class="img-responsive" /></a></li><br/>
               <li><a href="#"><img src="images/in.png" alt="" title="suivez nous" class="img-responsive" /></a></li>
              
     </ul>
      </div>
  </div>
        
  </footer>
</body>
</html>
