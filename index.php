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


//$con = mysqli_connect('localhost', 'ckprojects_kineipe', 'P$?v5H$B4EBq', 'ckprojects_geral');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//////////////////////// CONECTA NO BANCO DE DADOS 



header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, cachehack=" . time());
header("Cache-Control: no-store, must-revalidate");
header("Cache-Control: post-check=-1, pre-check=-1", false);


include "./funcoes.php";

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
  <link href="./css/estilos.css" rel="stylesheet">
  <style type="text/css">
    html,
    body {
      width: 100%;
      height: 100%;
      font-family: Arial, Tahoma, sans-serif;
      background: url(./css/skulls.png), linear-gradient(to right, #1B1212, #1B1212);
    }
  </style>






</head>

<body>


  <?php
  include "./principal.php";
  ?>



  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="./css/js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="./css/js/popper.min.js" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="./css/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="./css/js/jquery-1.12.4.js"></script>
  <script src="./css/js/jquery-ui.js"></script>


</body>





</html>