<?php
session_start();
$_SESSION["id_cli"];
$_SESSION["pnom"];
$_SESSION["nom"];	 

  
         ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- mes fichiers-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" name="viewport" content="width=device-width,initial-scale=1"  />
<link rel="stylesheet" href="CSS/style.css" type="text/css" />
<link rel="shortcut icon" href="images/logo1~1.ico" /> 
<meta name="description" content="sp&eacute;cialis&eacute; dans la vente en ligne de met et les ingredient de cuisine africaine" />
	  <meta name="keywords" content="restaurant du peuple" />
		<meta name="author" content="NF | Nam1N FOOD" />
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

 /* ecran mobil */
 @media all and (max-width:1024px) 
 {
	
 }
   
</style>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- les police -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantarell">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple">
<!--nom du site  -->
<title>NF | NamiN FOOD</title>
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
      <li class="active"><a href="acceuil.php" class="hom"><span class="glyphicon glyphicon-home"></span></a></li>
      <li ><a class="command"><span class="glyphicon glyphicon-shopping-cart"></span>  COMMANDE</a>
         <p class="deroul2">
            <a class="adult" href="repas.php"> REPAS</a>&nbsp;&nbsp;
            
            <a class="enf" href="command.php"> INGREDIENT</a>
         </p>   
      </li>
      <li  ><a class="recet " href="affichrecette.php"><span class="glyphicon glyphicon-cutlery"></span> RECETTE<span class="caret"></span></a>        
      </li>
      <li ><a class="sant" href="sante.php"><span class="glyphicon glyphicon-heart"></span> SANT&Eacute;</a></li>
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
             <div><img src="images/logo.png" class="img-responsive" style="width:100%" /></div>
           </div>
          
       </div>   
      </header>
      
      
      <section class="home-head-banner" >
        	<img  src="images/big.png" alt="" class="img-responsive " style="width:100%"  />

        <div class="container" style=" position:relative; top:-280px; " class="hautpage" >
                <h1 style="color:#FFF; text-align:center;color:#000" id="slog1">
                    <span style=" font-weight:bold">Le Ventre est Sacr&eacute;.</span> <span style="color:#FFF; font-weight:bold">NF | NamiN FOOD</span><span style="color:#FFF; font-weight:bold">.</span>
                </h1>
        </div>
        <div >
            <div class="container-fluid" style="">
                <div class='row' style="position:relative; top:-130px;background-color:rgba(0,0,0,0.5); background-size:cover"><h3 class="titre" style="font-weight:bold; position:relative; bottom:-5px; width:8%"></h3>
                    <div class="col-md-12">
                        
                      <div ></div><marquee style="font-size:18px; font-weight:bold; color:#FFF
                      ">Livraison Express de repas et ingr&eacute;dients de cuisine partout  O&ugrave; vous &ecirc;tes en C&ocirc;te d'Ivoire...  </marquee>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
     <div class="container" style=" position:relative; top:-130px;" > 
          <div class="row" id="bloc2"> 
          <div class="col-md-6">
             <div>
                <h1 class="titre"><span class="glyphicon glyphicon-shopping-cart"></span> Comment passez une commandes </h1>
            	

              </div>
<p>NF| NamiN FOOD propose des moyens rapides et fiables de recevoir de la nouriture  tout en restant chez vous .</p><a href="repas.php">
                En savoir plus<i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>

          </div>

          <div class="col-md-6">
              <div >
                <h1 class="titre" id="budg"><span class="glyphicon glyphicon-piggy-bank"></span> Budget Alimentaire </h1>
            	
              </div>
<p>Avec NF| NamiN FOOD vous avez la possibilit&eacute; de bien manger a budget reduis</p><a>
                En savoir plus<i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>

          </div>

         </div> 
         
         <div id="bloc3" style="  padding:25px">
         
           <div class='row'>
           <h1 class="titre" style="text-align:center">Nos Services </h1> 
            <div class="col-md-4">
                <div >
                    <h2 style="text-align:center"><strong>Recette +</strong></h2>
                    	<img src="images/rec.png" class="img-responsive img-circle" style="width:55%; position:relative; left:20%;border:3px solid #666"/>

                </div>
                <p class="">Une communaut&eacute; dynamique pour partager vos recttes et secret  de cuisine</p>
                                    <a href="comment-envoyer-de-largent" class='read-more' name="En savoir plus" data-category="CI" data-label="En savoir plus">
                        En savoir plus<i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
            </div>
            <div class="col-md-4 ">
                <div>
                    <h2 class="" style=" text-align:center"><strong>Allo Docteur</strong></h2>
                    	<img src="images/sante.png" class="img-responsive img-circle" style="width:55%; position:relative; left:20%;border:3px solid #666"  />

                </div>
                <p class="">NF| NamiN FOOD vous propose  les meilleures conseils nutritionnel pour votre bien &ecirc;tre.car le premier medicament est la bonne alimentation. </p>
                                    <a href="sante.php">
                        En savoir plus<i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
            </div>
            <div class="col-md-4 ">
                <div >
                    <h2 class="" style=" text-align:center"><strong>March&eacute; Afraicain</strong></h2>
                    	<img  src="images/march.png" class="img-responsive img-circle" style="width:50%; position:relative; left:20%;border:3px solid #666" />

                </div>
                <p class="">NF| NamiN FOOD offre l’option d’envoi sur les comptes partout en C&ocirc;te d'Ivoire.</p>
                      <a href="command.php"> 
                        En savoir plus<i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
            </div>

        </div>
        
            <div class='row' style="margin-top:35px; border-top:0.5px solid #666">
                <p style="text-align:center">Avec NF| NamiN FOOD, Vous nourrir est  un privil&egrave;ge.</p>
            </div>
    </div>





	</div>	

         </div> 
      </div>
      <div class="piedpage1" style="padding-left:700px; padding-bottom:20px; margin-top:-150px; position:relative; left:-400px;">
      <h3 style="text-align:center">Directeur:<strong>Crouwati&eacute; Alain COULIBALY</strong>  </h3>
      <div class="TexteActu" style="display:flex;">
                   
			   <div>
                  <img src="images/lino.png" class="img-responsive img-circle img-thumbnail" style="width:90%"  alt="Crouwati&eacute;"  style="width:100px;"/>
			   </div>
			   <div class="TitreActu" style="padding-top:10px; margin-left:20px; margin-top:10px" >
				  
                 <p>Merci de nous faire confaiance!
                    En cette nouvelle ann&eacute;e 2019,<br /> Nous nous donnons comme objectif renforcer la  complicit&eacute; qu'existe d&eacute;ja entre Nous...<br />
                    Bonne et Heureuse Ann&eacute;e 2019.
                  </p>
                 
			   </div>
			</div>
       </div>
      <footer  ><!-- pied de page  -->
   <div class="piedpage" style="display:flex;justify-content:space-around; background-color:rgb(13,28,66); color:#FFF " >
      <p> 
           <ul style="list-style-type:none">
                    <h4 style="font-weight:bold;color:#FFF"> Contact</h4>
                <li><span class="glyphicon glyphicon-tower"></span> NF| NamiN FOOD</li><br />
                <li><span class="glyphicon glyphicon-map-marker"></span>  Cocody Cit&eacute; des Arts,C&ocirc;te d'Ivoire</li><br />
                <li><span class="glyphicon glyphicon-earphone"></span>  (+225) 88 21 83 95 / 55 06 68 08</li><br />
                <li><span class="glyphicon glyphicon-envelope"></span>  <a href="mailto:coulibalycrouwatiealain@gmail.com" data-toggle="tooltip" data-placement="right" title="Ecrivez Nous" >coulibalycrouwatiealain@gmail.com</a></li>
           </ul>
      </p>
      <p>
           <ul style="list-style-type:none;">
                  <h4 style="font-weight:bold;color:#FFF"> liens rapide</h4>
               <li><a href="#">ACCEUIL</a></li>
               <li><a href="affichrecette.php">FORUM RECETTE +</a></li>
          
           </ul>
      </p>
      <p>
           <ul style="list-style-type:none">
                  <h4 style="font-weight:bold; color:#FFF"> Suivez-Nous</h3>
               <li><a href="https://web.facebook.com/EmergenceServiceInformatique" target="_blank" data-toggle="tooltip" data-placement="right" title="suivez nous" ><img src="images/facebook.png" alt=""  class="img-responsive" /></a></li><br/>
               <li><a href="#"><img src="images/in.png" alt="" title="suivez nous" class="img-responsive" /></a></li>
              
          </ul>
      </p>
     </div>
        
  </footer>
   </div>
</body>
</html>
