<?php
session_start(); // iniciar prcesso de sessão
if (!isset($_SESSION["USUARIOX"])) {
  header("Location:logar.php");
  session_destroy();
  exit;
} else {

  //echo $_SESSION['USUARIOX'] ;


  $USUARIOX  = $_SESSION['USUARIOX'];
}

//////////////////////// CONECTA NO BANCO DE DADOS
$con = mysqli_connect('localhost', 'root', '', 'ck_projects');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//////////////////////// CONECTA NO BANCO DE DADOS 

include "./funcao_geral.php";

header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, cachehack=" . time());
header("Cache-Control: no-store, must-revalidate");
header("Cache-Control: post-check=-1, pre-check=-1", false);




?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta name="theme-color" content="#00688B">


  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="./css/ionicons.css" media="screen">


  <link rel="stylesheet" href="./css/bootstrap-4.5.3-dist/css/bootstrap2.min.css">
  <link rel="stylesheet" href="./css/bootstrap-4.5.3-dist/css/bootstrap.css">
  <link rel="stylesheet" href="./css/w3.css">
  <link rel="stylesheet" href="./css/icones/font-awesome/css/font-awesome.min.css" media="screen">
  <title>CK Projects</title>

  <link rel="shortcut icon" href="./css/check-logo.png">

  <style type="text/css">
    * {
      margin: 0;
      padding: 0;
    }

    /* para garantir que estes elementos ocuparão toda a tela */
    body,
    html {
      width: 100%;
      height: 100%;
      font-family: Arial, Tahoma, sans-serif;
      background-color: cornflowerblue;

    }

    .styled-link:hover,
    .styled-link:focus,
    .styled-link:active {
      color: #536dfe;
    }

    .shadow-1 {
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.15);
    }

    .blue-hover {
      transition: all 0.25s ease-in;
      border-bottom: 5px solid transparent;
    }

    .blue-hover:hover {
      transform: translateY(-5px);

      border: none;
      border-bottom: 5px solid red;
    }
  </style>

  <?php
  include "./principal.php";
  ?>



</head>

<body>







  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="./css/js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="./css/js/popper.min.js" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="./css/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="./css/js/jquery-1.12.4.js"></script>
  <script src="./css/js/jquery-ui.js"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->

</body>



</html>