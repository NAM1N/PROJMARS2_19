<?php 

//verifier les saisie
$tab=array("nom"=>"","pnom"=>"","mail"=>"","tel"=>"","pas1"=>"","pas1"=>"","nomvide"=>"","pnomvide"=>"","telvide"=>"","mailvide"=>"","pas1vide"=>"","pas2vide"=>"","valid"=>false);
$pas="";

// les affectations
if (!empty($_POST))
{
       $tab["nom"]=verifsaisi($_POST['nom']);
       $tab["pnom"]=verifsaisi($_POST['pnom']);
       $tab["mail"]=verifmail(verifsaisi($_POST['mail'])); 
       $tab["tel"]=verifsaisi($_POST['tel']);
	   $tab["pas1"]=verifsaisi($_POST['pas1']);
	   $tab["pas2"]=verifsaisi($_POST['pas2']);
	   
       $tab["valid"]=true;
	   
	if ( empty($tab["nom"]))
	{
		$tab["nomvide"]="Quel est votre nom ? ";
		$tab["valid"]=false;
	}
    if(empty($tab["pnom"]))
	{
	   $tab["pnomvide"]="Quel est votre pr&eacute;noms ? ";
	   $tab["valid"]=false;
	}
	
	if(empty($tab["mail"]))
	{
	   $tab["mailvide"]="Votre email SVP ? ";
	   $tab["valid"]=false;
	}
	if(empty($tab["tel"]))
	{
	   $tab["telvide"]="UN numeros valide SVP? ";
	   $tab["valid"]=false;
	}
	if(empty($tab["pas1"]) && empty($tab["pas2"]))
	{
	   $tab["pas1vide"]="Veillez saisir un mot de passe svp? ";
	   $tab["valid"]=false;
	   
	}else if($tab["pas1"]!=$tab["pas2"])
	        {
				$tab["pas2vide"]="Veillez confirmer votre mot de passe ";
	             $tab["valid"]=false;
			} else $pas=$tab["pas1"];
			
	
	 
	 
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
		   $val=array($tab["nom"],$tab["pnom"],$tab["mail"],md5($pas),$tab["tel"]);
		   
		   $insert='INSERT INTO `client`(`Id_cli`, `nom_cli`, `pnom_cli`, `mail_cli`, `pass`, `dat_cli`, `tel`) VALUES(NULL,?,?,?,?,Now(),?)';  
		  $req=$bd->prepare($insert);
		 
		  // gerer les erreurs
		  if(!$req->execute($val))
		  {
			  print_r($req->errorInfo());
			  
			  }
		  
		  
		  $req->closeCursor();

     if($tab["valid"])
	    {
			header("location:connexion.php");
	    }

}
	
	    
		   
				  // 
		 // header("location:marche.php");
  // verifiez le mail 
	
function verifmail($var)
 {
	 $var=filter_var($var,FILTER_VALIDATE_EMAIL);
	 return $var;
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
    <ul class=" lien nav navbar-nav" style="margin-left:auto" >
      <li ><a href="index.php" class="hom"><span class="glyphicon glyphicon-home"></span></a></li>
      <li><a class="command"><span class="glyphicon glyphicon-shopping-cart"></span>  COMMANDE</a>
         
      </li>
      <li><a class="recet"><span class="glyphicon glyphicon-cutlery"></span> RECETTE<span class="caret"></span></a>
      </li>
      <li><a class="sant"><span class="glyphicon glyphicon-heart"></span> SANT&Eacute;</a></li>
      <li><a class="bud"><span class="glyphicon glyphicon-piggy-bank"></span>BUDGET</a></li>
      <li><a class="recet1">QUI SOMMES-NOUS <span class="glyphicon glyphicon-question-sign"></span> </a></li>
    </ul>
    <ul class=" lien2 nav navbar-nav navbar-right">
        <li><a class="conect" href="connexion.php" ><span></span>Connexion  |</a></li>
        <li class="active" ><a class="abon" href="abonne.php"><span></span>S'abonner</a></li>
    </ul>
   </div>
  </div>
</nav>
         <div class="col-md-12" >
             <div ><img src="images/logo.png" class="img-responsive" style="width:100%" /></div>
           </div>
          
       </div>   
      </header>
      
      
      <section class="home-head-banner" >
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
             
            
                <div  style=" background:url(images/ord.png) scroll no-repeat center ; background-size:cover; " id="form1">
                <div style="background-color:rgba(0,0,0,0.4);margin:5px 70px 5px 70px; padding-bottom:-100%"  >
                 <h1 style=" font-family:'Rancho', 'Times New Roman', Times, serif; color:#D39024; margin-left:10%; font-size:40px" id="titr2" class="font-effect-shadow-multiple">INSCRIPTION </h1>
                    <hr style="width:50%; margin-left:10%" />
                    <div id="obliga"><h5 style="margin-left:50%; font-weight:bold; color:#03F;" id="obliga">*CHAMPS OBLIGATOIRES</h5></div>
                    <div  style="width:40%; margin-left:30%;">
                   
                        <form role="form" method="post" action="abonne.php" >
                           
                           
                              <div class="form-group">
                              <label for="nom">Nom<span style="color:#03F">*</span></label><br />
                               <input type="text" placeholder="Votre Nom" class="form-control transparent-input" name="nom" id="nom" value="<?php echo $tab["nom"]; ?>" />
                               <p style="color:red; font-weight:bold; font-style:italic"><?php echo $tab["nomvide"]; ?>  </p>
                               </div>
                               <div class="form-group">
                               <label for="pnom">Pr&eacute;noms<span style="color:#03F">*</span></label><br />
                               <input type="text" placeholder="Votre P&eacute;noms"  class="form-control transparent-input" name="pnom" id="pnom" value="<?php echo $tab["pnom"]; ?>"/>
                               <p style="color:red; font-weight:bold; font-style:italic"><?php echo $tab["pnomvide"]; ?>  </p>
                               </div>
                               <div class="form-group ">
                               <label for="mail">Email<span style="color:#03F">*</span></label><br />
                               <input type="email" placeholder="xxx@example.com"  class="form-control transparent-input" name="mail" value="<?php echo $tab["mail"]; ?>"/>
                               <p style="color:red; font-weight:bold; font-style:italic"><?php echo $tab["mailvide"]; ?>  </p>
                               </div>
                                <div class="form-group">
                               <label for="tel">T&eacute;l&eacute;phone<span style="color:#03F">*</span></label><br />
                               <input type="tel" placeholder="55 06 68 08"  class="form-control transparent-input" id="tel" name="tel" value="<?php echo $tab["tel"]; ?>"/>
                               <p style="color:red;font-weight:bold; font-style:italic"><?php echo $tab["telvide"]; ?>  </p>
                                </div>
                                <div class="form-group">
                               <label for="pas1">Mot de pass<span style="color:#03F">*</span></label><br />
                               <input type="password"  class="form-control transparent-input" name="pas1" id="pas1" />
                               <p style="color:red; font-weight:bold; font-style:italic"><?php echo $tab["pas1vide"]; ?>  </p>
                               </div>
                               <div class="form-group">
                               <label for="pas2">Confirmez Mot de pass<span style="color:#03F">*</span></label><br />
                               <input type="password"  class="form-control transparent-input" name="pas2" id="pas2"/>
                               <p style="color:red; font-weight:bold; font-style:italic"><?php echo $tab["pas2vide"]; ?>  </p>
                              </div>
                           <input type="submit" value="VALIDER" class="btn btn-lg btn-success" style="width:100%"  />
                           <p style="display:<?php  if( $tab["valid"]) echo 'block'; else echo 'none';  ?>; font-weight:bold; " class=" glyphicon glyphicon-ok alert alert-success">Votre inscription a &eacute;t&eacute; prise en compte</p>
              
                           <p>&nbsp;&nbsp;&nbsp;</p>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
        
           </div>
           <div class="col-md-12" style="margin-top:15px;">
           
              <div  style=" border-top:0.5px solid #666">
                <p style="text-align:center">Avec NF| Nam1N FOOD, Vous nourrir est  un privil&egrave;ge.</p>
              </div>
            
           </div>
           <div class="" style=" padding-bottom:20px;">
            <h3 style="text-align:center; margin-top:40px;">Mot du Directeur:<strong> Crouwati&eacute; Alain COULIBALY</strong>  </h3>
        <div class=" container-fluid">
             <div class="row">     
			   <div class="col-md-6" style="margin-left:0px">
                  <img src="images/lino.png" class="img-responsive img-circle img-thumbnail" style="width:30%; margin-left:60%"  alt="Crouwati&eacute;" />
			   </div>
			   <div class=" col-md-6 " style="padding-top:35px;"  >
				  
                 <p >Merci de nous faire confaiance!
                    En cette nouvelle ann&eacute;e 2019,<br /> Nous nous donnons comme objectif renforcer la  complicit&eacute; qu'existe d&eacute;ja entre Nous...<br />
                    Bonne et Heureuse Ann&eacute;e 2019.
                  </p>
                 
			   </div>
              </div>
			</div>
         </div>
         </div>
       </div>
      </section>
<footer style="padding-bottom:-100%;"  ><!-- pied de page  -->
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
