<?php 
session_start();
$_SESSION["id_cli"];
$_SESSION["pnom"];
$_SESSION["nom"];	 
	   
		   
		 
//verifier les saisie
$tab=array("nbre"=>"","nbrevide"=>"","valid"=>false);
$image="";
// les affectations
if (!empty($_POST))
{
       $tab["bre"]=$_POST['nbre']; 
       $tab["valid"]=true;
	   $upload=false;
	   
	if ( empty($tab["nbre"]))
	{
		$tab["nbrevide"]="Vous commander combien de Kilos ";
		$tab["valid"]=false;
	}
	
	
	
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
		   $val=array($_POST["lib"],$_POST["nbre"],$_SESSION["id_cli"],$_POST["pri"]);
	$insert='INSERT INTO `commande`(`Id_com`, `lb_com`, `num_com`, `client`, `prix`, `dat_com`) VALUES(NULL,?,?,?,?,NOW())';
	$req=$bd->prepare($insert);
		 
		  // gerer les erreurs
		  if(!$req->execute($val))
		  {
			  print_r($req->errorInfo());	  
		  }
}

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
.bt{
	background-color:#F60;
	width:100%;
	color:#fff;
	padding:15px;
	text-decoration:none;
	font-size:16px;
	text-shadow:2px 3px #009;

	}
.btn:hover,.btn:focus{
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
      <li  class="active" ><a class="command"><span class="glyphicon glyphicon-shopping-cart"></span>  COMMANDE</a>
         <p class="deroul2">
            <a class="adult" href="repas.php"> REPAS</a>&nbsp;&nbsp;
            
            <a class="enf" href="command.php"> INGREDIENT</a>
         </p>   
      </li>
      <li  ><a class="recet " href="affichrecette.php"><span class="glyphicon glyphicon-cutlery"></span> RECETTE<span class="caret"></span></a>        
      </li>
      <li><a class="sant" href="sante.php"><span class="glyphicon glyphicon-heart"></span> SANT&Eacute;</a></li>
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
         <div class="col-md-12" >
             <div ><img src="images/logo.png" class="img-responsive" style="width:100%" /></div>
           </div>
          
       </div>   
      </header>
      
      
      <section class="market" >
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
           <h1 class="titr-market">AFRICAN MARKET </h1>
           
           <?php 
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
	  $req=$bd->query('SELECT `id_cat`, `nom_cat` FROM `categorie`');
	  $cat=$req->fetchAll();
	  
     echo '<nav class="menu-market">
               <ul class="nav nav-tabs">';
		foreach($cat as $result)
	   {
		   if($result["id_cat"]=='1')
		   {
			   echo '<li role="presentation" class="active"><a href="#'.$result["id_cat"].'" data-toggle="tab"><span></span>'. $result["nom_cat"].'</a></li>';
		   }else { 
		   echo '<li role="presentation"><a href="#'.$result["id_cat"].'" data-toggle="tab"><span></span>'. $result["nom_cat"].'</a></li>';
		   }
	   }
		 echo '    
             </ul>
			 <a data-toggle="modal" data-target="#maboit2" style="margin-left:80%" class="btn btn-success"><span  class="glyphicon glyphicon-shopping-cart"></span> MES COMMANDES</a>
          </nav>';
		  echo '<div class="tab-content">';
		  
		    foreach($cat as $result)
	   {
		  if($result["id_cat"]=='1')
		   {
			   echo '<div class="tab-pane active " id="'.$result["id_cat"].'" >';
		   }else echo '<div class="tab-pane  " id="'.$result["id_cat"].'" >';
		   //echo '<div class="prix">'.$result["id_cat"].'</div>';
		   echo '<div class="row">';
	
			$req=$bd->prepare('SELECT `Id`, `nom`, `titr`, `im`, `prix`, `categorie`, `dat_inscr_cli` FROM `ingredient` WHERE `categorie`=?');
			$req->execute(array($result["id_cat"]));
			//$cat1=$req->fetchAll();
			//var_dump($cat1);
			
			while( $list=$req->fetch())
			   {
				 echo '<div class=" col-md-4" ';
				  
				 echo '<div class="thumbnail" style="margin-top:5px">
				
                          <img src="images/INGREDIENT/'.$list["im"].'" style="width:100%" />
                          <div class="prix">'.$list["prix"].'  FRS CFA/Kg</div>
                          <div class="caption">
                          <h4>'.$list["nom"].'</h4>
                          <p>'.$list["titr"].'</p>
						  <form method="post" action="command.php" enctype="">
                          <div class="form-group">
                              <input type="number" step="1" placeholder="lE NOMBRE DE KILOS"  class="form-control" required="required" name="nbre" value="1"/>
							  <input type="hidden" class="form-control"  name="lib" value="'.$list["nom"].'"/>
							  <input type="hidden" class="form-control"  name="pri" value="'.$list["prix"].'"/>
							  
							 
							  
							  </div>
                              <button type="submit" class="  bt btn btn-order"><span class="glyphicon glyphicon-shopping-cart"></span> COMMANDER</button>';
						?>	
                          
							  <p style="display:<?php  if( $tab["valid"]) echo 'block'; else echo 'none';  ?>; font-weight:bold; " class=" glyphicon glyphicon-ok alert alert-success">Votre inscription a &eacute;t&eacute; prise en compte</p>      
                  <?php 
                     echo '     </form>
						  </div>
                          
						
                      </div>'; 
				  
				}
				echo ' </div>
                      </div>';
	   }
		   ?>     			
		   

           <div class="col-md-12" style="margin-top:15px;">
           
              <div  style=" border-top:0.5px solid #666;font-family:'Open Sans Condensed', sans-serif;">
                <p style="text-align:center">Avec NF| Nam1N FOOD, Vous nourrir est  un privil&egrave;ge.</p>
              </div>
            
           </div>
           <div class="" style=" padding-bottom:20px;font-family:'Open Sans Condensed', sans-serif;">
            <h3 style="text-align:center; margin-top:40px;">Mot du Directeur:<strong> Crouwati&eacute; Alain COULIBALY</strong>  </h3>
        <div class=" container-fluid">
             <div class="row">     
			   <div class="col-md-6" style="margin-left:0px">
                  <img src="images/lino.png" class="img-responsive img-circle img-thumbnail" style="width:30%; margin-left:60%"  alt="Crouwati&eacute;" />
			   </div>
			   <div class=" col-md-6 " style="padding-top:35px;font-family:'Open Sans Condensed', sans-serif;"  >
				  
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
       <div class="modal fade" id="maboit2" style="">
                
                            <div class="modal-dialog" style="background-color: white; border-radius:5px; width:450px" >
                 
                               <div class="content">
                                 <div class="modal-header">
                                     <span class="btn btn-default close" data-dismiss="modal">X</span>
                                         <h3 style="color:#000">MES COMMANDES <span class="glyphicon glyphicon-question-sign"></span><h3>
                                 </div>
                                 <div class="modal-body">
                                  <p style="color:#000">
      
	 
								 
                                  
                                  
          <table class="table table-striped table-bordered" style="box-shadow:2px 4px #FF6600" >
               <thead>
                  <tr>
                    <th>LIBELE</th>
                    <th>QUANTIT&Eacute;</th>
                    <th>Prix</th>
                    <th>DATE</th>
                 </tr>
               </thead>
               <tbody>
                <?php 
								  
	   try
	  {
		 $bd=New PDO('mysql:host=localhost;dbname=alimentation','root','');
		 
		 
		  $req2='SELECT `Id_com`, `lb_com`, `num_com`, `client`, `prix`, `dat_com` FROM `commande` WHERE `client`=?';
		  $req=$bd->prepare($req2);
		  // afficher
		  $req->execute(array($_SESSION["id_cli"]));
		  $result=$req->fetch();
	
	  }
	  catch(exception $e)
	  {
		  die('Erreur:'.$e->getMessage());
	  }
	  
			 
		       echo '<tr>';
               echo '<td>'.$result['lb_com'].'</td>'; 
               echo '<td>'.$result['num_com'].'</td>'; 
               echo '<td>'.$result['prix'].'</td>';
			   echo '<td>'.$result['dat_com'].'</td></tr>'; 
              
		  
?>
 </tbody>
               <tfoot>
                
               </tfoot>
             </table>
                                  </p> 
                         
                                 </div>
                               </div>
                               
                              <div class="modal-footer">
                         <span class="btn btn-default close" data-dismiss="modal">Fermer</span>
                    </div>
                </div>
            </div> 
  </footer>
</body>
</html>
