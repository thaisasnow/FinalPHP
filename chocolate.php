<?php 
require_once('repository/chocolateRepository.php');
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
include('config.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<head>
    <title>Chocolate S2</title>
    
    <link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />   
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

    
    <link rel="stylesheet" href="css/cabecalho.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/doces.css" type="text/css" media="screen" />
    
    
   
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    
      <meta name="viewport" content="width=device-width, initial-scale=1.0">  
      
</head>
<body>

<section class="container">
 
 <header class="topo">

      
      <nav class="menu">

        <ul>
            <li> <a href="home.php">Home</a></li>
            <li> <a href="chocolate.php">Chocolates</a></li>
            <li> <a href="login.php">Login</a></li>
            <li> <a href="logout.php">Logout</a></li>
        </ul>

    
      </nav> <!-- Fim Menu-->

    

 </header> <!-- Fim Topo-->
    
  <div id="banner">
   
  <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="images/banner" data-thumb="images/banner" alt="" title="chocolatesdelicia" />
                <img src="images/banner21.jpg" data-thumb="images/banner21.jpg" alt="" title="chocolatedelicia" />
                <img src="images/banner3.jpg" data-thumb="images/banner3.jpg" alt="" title="chocolatesdelicia" data-transition="slideInLeft" />
                
            </div>            
        </div>
    </div><!-- Fim banner-->
    
  
</section><!-- Fim Container-->

<?php  require('listagem-de-chocolate.php'); ?>

<footer class="rodape">

 &copy;Chocolate S2
    
</footer> <!-- Fim Rodapé-->
      
	
</body>
</html>