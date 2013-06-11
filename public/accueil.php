<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DEV-FLY - Accueil</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
  </head>
    
  <body>
      <div id="container">
          <div id="carousel">
                  <div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
    <div class="active item"><img src="images/img1.jpg"/></div>
    <div class="item"><img src="images/img2.jpg"/></div>
    <div class="item"><img src="images/img3.jpg"/></div>
    <div class="item"><img src="images/img4.jpg"/></div>
    <div class="item"><img src="images/img5.jpg"/></div>
    <div class="item"><img src="images/img6.jpg"/></div>
    <div class="item"><img src="images/img7.jpg"/></div>
    <div class="item"><img src="images/img8.jpg"/></div>
    <div class="item"><img src="images/img9.jpg"/></div>
    <div class="item"><img src="images/img10.jpg"/></div>
    <div class="item"><img src="images/img11.jpg"/></div>
    <div class="item"><img src="images/img12.jpg"/></div>
    <div class="item"><img src="images/img13.jpg"/></div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
              
          </div>
          <div id="bienvenue">
              <p><a href="/recherche"><marquee>Bienvenue &nbsp; Cliquez ici</marquee></a></p>
          </div>
      </div>
	   	   
   </body>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.js"></script>
</html>
