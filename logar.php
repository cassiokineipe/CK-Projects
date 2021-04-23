

<?php
  ini_set('session.gc_maxlifetime', 57600);
session_start();  //////////// iniciar prcesso de sessão



include "./funcao_login.php";


$array = array(2, 9, 9, 1);




/// Configuracao padrao para evitar bugs

date_default_timezone_set('America/Sao_Paulo');
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
  
  <link rel="stylesheet" href="./css/bootstrap-4.5.3-dist/css/bootstrap2.min.css" >
<link rel="stylesheet" href="./css/bootstrap-4.5.3-dist/css/bootstrap.css" >

  <title>CK Projects</title>

  <link rel="shortcut icon" href="./css/check-logo.png">
</head>

<body>





  <link href="./css/1.css" rel="stylesheet">
  <link href="./css/2.css" rel="stylesheet">


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
    }


    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #212529;
      color: white;
      text-align: center;
    }


    .div {
      box-shadow: 10px 10px 5px grey;
    }
  </style>

  <?php


  $GX = gx($array[3], $array[1], $array[2], $array[0]);

  //////////////////////// CONECTA NO BANCO DE DADOS
  $con = mysqli_connect("localhost", "root", "", "quality");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //////////////////////// CONECTA NO BANCO DE DADOS 





  if (!isset($_POST["USUARIO"])) {
    $_POST["USUARIO"] = "";
  }

  $USUARIO = $_POST["USUARIO"];

  if (!isset($_POST["SENHA"])) {
    $_POST["SENHA"] = "";
  }

  $SENHA = $_POST["SENHA"];



  $SENHA = senha($SENHA, $GX);



  $result10  =  mysqli_query($con, "SELECT * FROM credencial WHERE USUARIO = '$USUARIO' AND SENHA = '$SENHA' ");


  while ($linha = mysqli_fetch_array($result10)) {


    $USUARIO   = $linha["USUARIO"];
    $SENHA     = $linha["SENHA"];
    $ACESSO    = $linha["ACESSO"];




    $_SESSION['usuario']  = $USUARIO;
    $_SESSION['acesso']  = $ACESSO;

    header('Location:index.php');
  }



  ?>




  <br>



  <br>
  <br>


  <canvas id="canvas"></canvas>


  <div id="form-wrapper" style="max-width:500px;margin:auto;">
    <center>
      <div class="container-fluid">

        <div class="card-body">

          <center>
            <img src="./css/image.png" style="position: relative;width:90%;border-radius:15px">
          </center>
          <br>
          <br>
     









          <form action="" method="post">

            <input type="hidden" name="acao" value="logar" />
            <div class="container-fluid">






              <div class="card-body">
                <br>
                <div class="form-row">
                  <div class="form-group col-md-12">

                    <select name="USUARIO" class="form-control">
                      <option value="">Usuario</option>
                      <?PHP
                      $result10  =  mysqli_query($con, "SELECT * FROM credencial ORDER BY USUARIO ");
                      $cont = 0;
                      $COR = "white";
                      while ($linha = mysqli_fetch_array($result10)) {

                        $NOME = $linha["USUARIO"];

                        $COR = "white";
               
                        $cont = $cont+1;
                
                        if($cont % 2 ==0){
                          $COR = "#f0f0f0";
                         
                        }

                      ?>

                        <option value="<?php echo $NOME; ?>"style="background-color:<?php echo $COR?>;color:black;font-size:20px;"><?php echo $NOME ?></option>

                      <?php  } ?>


                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">

                    <label class="sr-only">SENHA</label>
                    <input type="password" name="SENHA" class="form-control" placeholder="Senha">


                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="form-group col-md-12">


                    <input style="text-align:center" type="submit" class="btn btn-danger mb-2" value=" Login ">

                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
      </form>
  </div>


  </div>
  </div>
  </div>





  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="footer">
    <center>
      <font style="color: white; text-shadow: black 0.1em 0.1em 0.2em;  font-size:0.7em;"><b> <i> </i></b></font>
      <font style="color: white; text-shadow: black 0.1em 0.1em 0.2em;  font-size:0.7em;"><b> <i> Copyright © Cássio Kineipe 2021</i></b></font>
    </center>

  </div>

  <script src="./css/3.js"></script>


</html>