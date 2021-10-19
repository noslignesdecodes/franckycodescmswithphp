<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.3.5, # -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/madautologo-1-207x70.png" type="image/x-icon">
  <meta name="description" content="Page d'accueil du site">
  
  
  <title>Contactez MadAuto</title>
<!--   <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/web/assets/mobirise-icons2/mobirise2.css"> -->
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/tether/tether.min.css">
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/dropdown/css/style.css">
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/datepicker/jquery.datetimepicker.min.css">
  <!-- <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/theme/css/style.css"> -->
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/socicon/css/styles.css">
  <link rel="preload" as="style" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/mobirise/css/mbr-additional.css">
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/mobirise/css/font-awesome.min.css" type="text/css">
  <script src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/web/assets/jquery/jquery.min.js"></script>
</head>
<body>

<!-- section du navbar -->
 <section class="menu cid-s48OLK6784" once="menu" id="menu1-k">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg logo" style="background-color: white;" id="navbar_principale">
        <div class="container-fluid">
            <div class="navbar-brand logo">
                <span class="navbar-logo">
                        <a href="#">
                        <img src="<?php echo WEBROOT.TEMPLATEROOT.'assets';?>/images/madautologo-1-207x70.png" alt="" style="height: 3.5rem;">
                        </a>
                </span>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true" id="nav_item_top">
                <li class="nav-item"><a class="nav-link link display-4" href="<?php echo WEBROOT.''; ?>" style="color: black;">Accueil</a></li>
                <li class="nav-item"><a class="nav-link link display-4" href="#" style="color: black;">Energie</a></li>
                <li class="nav-item"><a class="nav-link link display-4" href="<?php echo WEBROOT.'accessoires'; ?>" style="color: black;">Accessoires</a></li>
                <li class="nav-item"><a class="nav-link link display-4" href="<?php echo WEBROOT.'apropos'; ?>" style="color: black;">A propos</a></li>
                <li class="nav-item"><a class="nav-link link display-4" onclick="slideGauche()" href=""><img src="<?php echo WEBROOT.TEMPLATEROOT."assets"; ?>/images/hamburger.svg" alt="" style="width: 50%;"></a></li>
               </ul>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true" id="mobile_navigation">
                <li class="nav-item"><a class="nav-link link text-primary display-4" href="#">Accueil</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-4" href="#">Voitures</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-4" href="#">Motos</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-4" href="#">Energie</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-4" href="#">Accessoires</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-4" href="#">SAV</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-4" href="#">Promotions</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-4" href="<?php echo WEBROOT.'contact'; ?>">Contact</a></li>
                <li class="nav-item"><a class="nav-link link text-primary display-4" href="<?php echo WEBROOT.'apropos'; ?>">A propos</a></li>
               </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar-fixed-top  menu_navigation" id="navigation_menu">
        <ul id="list_nav">
            <li>
              <div id="produit">
                <a href="#">Nos produits</a>
                <?php 
                    include "div_produit.php";
                ?>
              </div>
               <!--  <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">Nos Produits</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item">
                    <a href="#">Voitures</a>
                  </li>
                   <li class="dropdown-item">
                    <a href="#">Motos</a>
                  </li>
                   <li class="dropdown-item">
                    <a href="#">Enérgie</a>
                  </li>
                </ul> -->

               

            </li>
            <li><a href="<?php echo WEBROOT.'motos'; ?>">Motos</a></li>

            <li>
              <a href="#" id="sav1">SAV</a>
                <div id="p_sav1">
                  <ul  class="hide" style="display: none;">
                    <li class="text-center">
                      <a href="<?php echo WEBROOT.'service'; ?>">Service</a>
                    </li>
                    <li class="text-left">
                      <a href="<?php echo WEBROOT.'forfait'; ?>">
                        forfait
                      </a>
                    </li>
                  </ul>
                </div>
                  
                  <!-- <a href="#" id="p_sav1" class="hide">Service</a>
                  <a href="#" id="p_sav1" class="hide">Service</a> -->
            </li>

            <li><a href="<?php echo WEBROOT.'promotions'; ?>">Promotions</a></li>
            <li><a href="<?php echo WEBROOT.'contact'; ?>">Contact</a></li>
        </ul>
    </nav>
     
     <!-- Second nav sur le coté -->
    <div id="menu_right">
          <li>
              <span>
                  <a href="<?php echo WEBROOT.'service'; ?>" class="hiden">&nbsp; Services</a>&nbsp;
                  <i class="fa fa-wrench fa-lg teste_teste" aria-hidden="true"></i>
              </span>
          </li>
          <li>
            <span>
              <a href="<?php echo WEBROOT.'promotions'; ?>" class="hiden">&nbsp; Offres</a>&nbsp;
              <i class="fa fa-camera-retro fa-lg teste_teste" aria-hidden="true"></i> 
            </span>
          </li>
          <li>
            <span>
              <a href="<?php echo WEBROOT.'locations'; ?>" class="hiden">&nbsp; Emplacement</a>&nbsp;
              <i class="fa fa-map-marker fa-lg teste_teste" aria-hidden="true">
              </i> 
            </span>
          </li>
          <li>
            <span>
              <a href="<?php echo WEBROOT.'contact'; ?>" class="hiden">&nbsp; Contact</a>&nbsp;
              <i class="fa fa-phone fa-lg teste_teste" aria-hidden="true"></i>
            </span>
          </li>
    </div>
    <div>
      
    </div>

    <script type="text/javascript">
     try{
        let sav1 = document.getElementById("sav1");
      let p_sav1 = document.getElementById("p_sav1");
      let menu = document.getElementById("menu_right");
      let hiden = document.querySelectorAll("#menu_right .teste_teste");
      let teste_teste = document.querySelectorAll(".hiden");
      var texte = document.querySelectorAll("#menu_right a");
        menu.addEventListener("mouseover",function() {
           for (var i = texte.length - 1; i >= 0; i--) {
             texte[i].style.display="inline";
             texte[i].style.color="white";
           }
           this.style.display = "inline";
           menu.style.width="10em";
           // this.style.color="#fff";
        // hiden[i].addEventListener("mouseleave",function() { teste_teste[i].style.display = "none";menu.style.width="3em"; })

      });

       menu.addEventListener("mouseleave",function() {
        
        for (var i = texte.length - 1; i >= 0; i--) {
       
          menu.style.width="3em";
          texte[i].style.display="none";
          // hiden[i].style.display="none";
        }
        });
      
      sav1.addEventListener("mouseover",() => {p_sav1.style.display = "inline";});
      sav1.addEventListener("mouseout",() => {p_sav1.style.display = "none";});
      }
      catch(e){
        console.log(e);
      }
      
    </script>
</section>