<?php
session_start();
$_SESSION["id_cli"]="";
	 
//verifier les saisie
$tab=array("nom"=>"","descr"=>"","cat"=>"","nomvide"=>"","descrvide"=>"","prixvide"=>"","imvide"=>"","valid"=>false);
$image="aub.jpg";
// les affectations
if (!empty($_POST))
{
       $tab["nom"]=verifsaisi($_POST['nom']);
       $tab["descr"]=verifsaisi($_POST['descr']);
	   $image=verifsaisi($_FILES["image"]["name"]);
	   $chemin="images/RECETTE/".basename($image);
	   $extension=pathinfo($chemin,PATHINFO_EXTENSION);
       $tab["valid"]=true;
	   $upload=false;
	   
	if ( empty($tab["nom"]))
	{
		$tab["nomvide"]="Quel est le nom de  cette Recette? ";
		$tab["valid"]=false;
	}
	if(empty($tab["descr"]))
	{
	   $tab["descrvide"]="Nous voulons plus de detail? ";
	   $tab["valid"]=false;
	}
	if(!empty($image))
	{
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
	if (($upload && $tab["valid"]))
	   {
		   // connection base donne
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
	

		   // insertion faire ine reque
		   $val=array($tab["nom"],$tab["descr"],$image,$_SESSION["id_cli"]);
		   
		   $insert='INSERT INTO `recette`(`Id_recet`, `titr_recet`, `detail`, `im`, `client`, `dat_inscr_cli`) VALUES(NULL,?,?,?,?,Now())';  
		  $req=$bd->prepare($insert);
		 
		  // gerer les erreurs
		  if(!$req->execute($val))
		  {
			  print_r($req->errorInfo());
			  
			  }
		  
		  
		  $req->closeCursor();
		  // 
		 // header("location:marche.php");
		  
	   }else if ( $tab["valid"])
	   {
		   // connection base donne
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
	

		   // insertion faire ine reque
		   $image="";
		   $val=array($tab["nom"],$tab["descr"],$image,$_SESSION["id_cli"]);
		   
		   $insert='INSERT INTO `recette`(`Id_recet`, `titr_recet`, `detail`, `im`, `client`, `dat_inscr_cli`) VALUES(NULL,?,?,?,?,Now())';  
		  $req=$bd->prepare($insert);
		 
		  // gerer les erreurs
		  if(!$req->execute($val))
		  {
			  print_r($req->errorInfo());
			  
			  }
		  
		  
		  $req->closeCursor();
		  // 
		 // header("location:marche.php");
		  
	   }
	
	
	
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
h3{
	 color:#F00;
	 font-weight:bold;
	 text-shadow:1px 1px #FFF 
	 }
p,.conseil {
	color:#fff;
	font-size:18px;
	font-weight:bold
	
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
      <li ><a href="acceuil.php" class="hom"><span class="glyphicon glyphicon-home"></span></a></li>
      <li ><a class="command"><span class="glyphicon glyphicon-shopping-cart"></span>  COMMANDE</a>
         <p class="deroul2">
            <a class="adult" href="repas.php"> REPAS</a>&nbsp;&nbsp;
            
            <a class="enf" href="command.php"> INGREDIENT</a>
         </p>   
      </li>
      <li  ><a class="recet " href="affichrecette.php"><span class="glyphicon glyphicon-cutlery"></span> RECETTE<span class="caret"></span></a>        
      </li>
      <li class="active"><a class="sant" href="sante.php"><span class="glyphicon glyphicon-heart"></span> SANT&Eacute;</a></li>
      <li><a class="bud" href="acceuil.php#budg"><span class="glyphicon glyphicon-piggy-bank"></span>BUDGET</a></li>
      <li><a class="recet1" data-toggle="modal" data-target="#maboit1">QUI SOMMES-NOUS <span class="glyphicon glyphicon-question-sign"></span> </a></li>
    </ul>
    
           
           <div class="modal fade" id="maboit1" style="">
                
                            <div class="modal-dialog" style="background-color: white; border-radius:5px; width:450px" >
                 
                               <div class="content">
                                 <div class="modal-header">
                                     <span class="btn btn-default close" data-dismiss="modal">X</span>
                                         <h3 style="color:#000">Qui sommes Nous <span class="glyphicon glyphicon-question-sign"></span><h3>
                                 </div>
                                 <div class="modal-body">
                                  <p style="color:#000">
                                   Nous sommes une jeune structure dynamique sp&eacute;cialis&eacute; dans la vente en ligne de met et les ingredient de cuise africaine   travers la C&ocirc;te d'Ivoire <br />
                                   Nous offrons un acceuil chalereux a nos client...<br />
                                   Depuis 2ans Nous Transportons des repas de qualit&eacute; et Recevons des produits de qualit&eacute; en toute Securit&eacute; 
                                  </p> 
                         
                                 </div>
                               </div>
                               
                              <div class="modal-footer">
                         <span class="btn btn-default close" data-dismiss="modal">Fermer</span>
                    </div>
                </div>
            </div>
    <ul class=" lien2 nav navbar-nav navbar-right">
        <li ><a class="conect" ><span></span>Connexion  |</a></li>
        <li><a class="abon" ><span></span>S'abonner</a></li>
    </ul>
   </div>
  </div>
</nav>        
             <div ><img src="images/logo.png" class="img-responsive" style="width:100%" /></div>
           </div>
          
       </div>   
      </header>
      
      
      <section>
         <div class="container-fluid admin">
           <div class="row">
             
              <div class="col-md-12" style=" background:url(images/fr.png) scroll no-repeat center ; background-size:cover; ">   <div style="background-color:rgba(0,0,0,0.5);margin:5px 70px 5px 70px; padding-bottom:-100%;border-radius:15px 15px 15px 15px ; padding:20px">
              <h1 style="text-align:center" class="titr-market"><strong> ASTUCES SANT&Eacute; <span class="conseil">"  10 conseils pour un bon équilibre alimentaire"<span> </strong> </h1>
                 <h3>Conseil n°1 : Ne pas dépasser ses besoins caloriques</h3>
                 <p>Notre alimentation est souvent trop riche par rapport à nos besoins, qui dépendent de l’activité physique fournie dans la journée, du sexe, et de l’âge. En règle générale, pour respecter l'équilibre alimentaire quantitatif un repas est suffisant en quantité lorsque le sentiment de satiété est atteint .</p>
                   <h3>Conseil n°2 : S’alimenter 3 à 4 fois par jour  </h3>
                   <p>Pour arriver à une équlibre alimentaire complémentaire entre les repas, le petit déjeuner doit idéalement compter pour 20 à 25% des apports énergétiques journaliers, le déjeuner 40 à 45%, et le dîner 25 à 30%. Si vous prenez un goûter, l’apport énergétique du dîner devra être réduit à 15-20%.<br />
                   Sauter un repas n’est jamais recommandé, en particulier le petit-déjeuner. Cela entraine la prise d’un repas plus copieux le midi.
                   </p>
                   <h3> Conseil n°3 : Équilibrer son assiette</h3>
                   <p>Elle doit être composée d’un tiers de légumes, un tiers de produits céréaliers et féculents (pommes de terre, pâtes, riz, blé́, semoule, maïs, légumes secs...) et un tiers de protéines végétales ou animales (viande, œuf, poisson, tofu…).<br />
                   Il faut bien veiller à ce que la quantité d’accompagnement soit supérieure à celle du produit animal
                   </p>
                   <h3>Conseil n°4 : Manger varié</h3>
                   <p>Tous les aliments sont nécessaires à notre santé. Manger un peu de tout en variant les plaisirs est la clef de l'équilibre alimentaire : alternez viande et poisson, produits frais et plats surgelés (maison si possible). </p>
                   <h3>Conseil n°5 : S’autoriser un en-cas  </h3>
                   <p>Une petite collation n’est pas interdite, à condition qu’elle ne se transforme pas en un repas ! Un fruit ou un laitage est suffisant pour apaiser la faim et ne perturbera pas votre équilibre alimentaire</p>
                   <h3>
Conseil n°6 : Cuisiner maison</h3>
                   <p>Évitez les produits transformés autant que possible dans votre alimentation. Ils sont pauvres en nutriments, riches en graisses, sel, sucres et additifs. </p>
                   <h3>Conseil n°7 : Préférer les cuissons saines </h3>
                   <p>Opter pour une cuisson vapeur, c’est préserver les vitamines des légumes. Il faut veiller aussi à ne pas ajouter trop de matières grasses pour cuire les viandes et poissons à la poêle. 

 </p>
                   <h3>Conseil n°8 : Limiter le sel </h3>
                   <p>La consommation de sel doit rester inférieure à 5 g par jour (soit l’équivalent d’une cuillère à café de sel par jour) ; 2 g pour les enfants.</p>
                   <h3>Conseil n°9 : Respecter le temps du repas </h3>
                   <p>Pour une meilleure digestion, posez-vous au minimum 20 minutes à chaque repas et prenez le temps de bien mastiquer.</p>
                   <h3>Conseil n°10 : Boire suffisamment  </h3>
                   <p>Il est essentiel de boire 1,5 litre d’eau par jour, voire plus en cas de fortes chaleurs, d’activité physique plus intense ou de maladie. Elle peut être consommée de maintes façons : boissons chaudes, jus, bouillon… Les sodas, trop riches en sucre, doivent être consommés avec modération.</p>
                  
              
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
               <li><a href="acceuil.php">ACCEUIL</a></li>
               <li><a href="affichrecette.php">FORUM RECETTE +</a></li>
          
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
