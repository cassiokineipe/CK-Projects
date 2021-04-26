<?php

session_start();  // iniciar prcesso de sessão



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
    
 body {
   margin: 0;
   padding: 0;
   font-size: 16px;
   line-height: 1.5;
   text-rendering: optimizeLegibility;
   font-variant-ligatures: none;
   box-sizing: border-box;
   font-family: 'Roboto', sans-serif;
   background-color: #fafafa;
}
body::before,
body::after {
  content: "";
  display: table;
  clear: both;
}
body * {
  box-sizing: inherit;
}
p, h1 {
  margin: 0; padding: 0;
}

 body, .text-light-black {
   color: rgba(0,0,0,0.6);
}
.text-black {
  color: rgba(0,0,0,0.9);
}
.text-muted {
  color: rgba(0, 0, 0, 0.3);
}



.text-uppercase {
  text-transform: uppercase;
}
.ff-serif {
  font-family: 'Lora', serif;
}

.font-weight-normal {
  font-weight: normal;
}
.font-weight-medium {
  font-weight: 500;
}

 .lts-1px {
   letter-spacing: 1px;
}
.lts-2px {
  letter-spacing: 2px;
}


.text-center {
  text-align: center;
}
.text-left {
  text-align: left;
}
.text-right {
  text-align: right;
}

.d-block {
  display: block;
}
.d-inline-block {
  display: inline-block;
}

.p-relative {
  position: relative;
}
.p-absolute {
  position: absolute
}



.bg-white {
  background-color: #fff;
}






.small {
  font-size: 0.75rem;
}
.card-heading {
  font-size: 2.25rem;
}
.styled-link {
  text-decoration: none;
  outline: none;
  color: #2196fe;
  transition: all 0.25s ease-in; 
}
.styled-link:hover,
.styled-link:focus,
.styled-link:active {
  color: #536dfe;
}
.shadow-1 {
  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.15);
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




.clearfix::before,
.clearfix::after {
  content: "";
  display: table;
  clear: both;
}
.float-left {
  float: left;
}
.float-right{
  float: right;
}






/**Margin and padding utilities*/
.mx-auto {
  margin-left: auto;
  margin-right: auto;
}
.ml-auto {
  margin-left: auto;
}
.mr-auto {
  margin-right: auto;
}
.mx-0 {
  margin-left: 0;
  margin-right: 0;
}
.mx-1 {
  margin-left: 1rem;
  margin-right: 1rem;
}
.mx-2 {
  margin-left: 2rem;
  margin-right: 2rem;
}
.mx-3 {
  margin-left: 3rem;
  margin-right: 3rem;
}


.my-0 {
  margin-top: 0;
  margin-bottom: 0;
}
.my-1 {
  margin-top: 1rem;
  margin-bottom: 1rem;
}
.my-2 {
  margin-top: 2rem;
  margin-bottom: 2rem;
}
.my-3 {
  margin-top: 3rem;
  margin-bottom: 3rem;
}

.mt-0 {
  margin-top: 0;
}
.mt-1 {
  margin-top: 1rem;
}
.mt-2 {
  margin-top: 2rem;
}
.mt-3 {
  margin-top: 3rem;
}

.mb-0 {
  margin-bottom: 0;
}
.mb-1 {
  margin-bottom: 1rem;
}
.mb-2 {
  margin-bottom: 2rem;
}
.mb-3 {
  margin-bottom: 3rem;
}

.ml-0 {
  margin-left: 0;
}
.ml-1 {
  margin-left: 1rem;
}
.ml-2 {
  margin-left: 2rem;
}
.ml-3 {
  margin-left: 3rem;
}




.px-0 {
  padding-left: 0;
  padding-right: 0;
}
.px-1 {
  padding-left: 1rem;
  padding-right: 1rem;
}
.px-2 {
  padding-left: 2rem;
  padding-right: 2rem;
}
.px-3 {
  padding-left: 3rem;
  padding-right: 3rem;
}


.py-0 {
  padding-top: 0;
  padding-bottom: 0;
}
.py-1 {
  padding-top: 1rem;
  padding-bottom: 1rem;
}
.py-2 {
  padding-top: 2rem;
  padding-bottom: 2rem;
}
.py-3 {
  padding-top: 3rem;
  padding-bottom: 3rem;
}

.pt-0 {
  padding-top: 0;
}
.pt-1 {
  padding-top: 1rem;
}
.pt-2 {
  padding-top: 2rem;
}
.pt-3 {
  padding-top: 3rem;
}

.pb-0 {
  padding-bottom: 0;
}
.pb-1 {
  padding-bottom: 1rem;
}
.pb-2 {
  padding-bottom: 2rem;
}
.pb-3 {
  padding-bottom: 3rem;
}

.lua{
  width: 25%;
}

@media screen and (max-width: 450px) {
    .lua {
      width: 100%;
    }

  }
  
  </style>

  <?php


  $GX = gx($array[3], $array[1], $array[2], $array[0]);

  //////////////////////// CONECTA NO BANCO DE DADOS
  $con = mysqli_connect("localhost", "root", "", "ck_projects");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //////////////////////// CONECTA NO BANCO DE DADOS 





  if (!isset($_POST["NOME"])) {
    $_POST["NOME"] = "";
  }

  $NOME = $_POST["NOME"];

  if (!isset($_POST["SENHA"])) {
    $_POST["SENHA"] = "";
  }

  $SENHA = $_POST["SENHA"];

  $PASS = 0; //MUDAR A COR DO BACKGROUND QUANDO DIGITAR A SENHA
  $NEGADO = "";

 $SENHA = senha($SENHA, $GX);



  $result10  =  mysqli_query($con, "SELECT * FROM acesso WHERE NOME = '$NOME' AND SENHA = '$SENHA' ");


  while ($linha = mysqli_fetch_array($result10)) {


    $NOME   = $linha["NOME"];
    $SENHA     = $linha["SENHA"];
    $PASS = 1;




    $_SESSION['usuario']  = $NOME;
    
  
?> <meta http-equiv="refresh" content="0.1; URL='index.php '"/> <?php
   
  }

  $RED = 100;


IF($PASS == 0 AND $NOME != "" ){
  $RED = 255;
  $NEGADO = "Senha invalida, tente novamente...";
}

  ?>




<canvas id="canvas"></canvas>

<?php if($NEGADO != ""){ ?>
  <div class="alert alert-danger" role="alert" style="text-align: center;color:black">
  <?php echo $NEGADO;?>
</div>
<?PHP } ?>

  
<br>


  <br>
  <br>



  

<center>
<div class="my-2 mx-auto p-relative bg-dark shadow-1 blue-hover lua" style=" border-radius: 10px;">
  <div id="form-wrapper" >
    <center>
      <div class="container-fluid" >

        <div class="card-body">

          <center>
            <img src="./css/image.png" style="position: relative;width:90%;border-radius:15px">
          </center>
          
        <hr style="background-color: white;">
     









          <form action="" method="post">

            <input type="hidden" name="acao" value="logar" />
            <div class="container-fluid">






              <div class="card-body">
              
                <div class="form-row">
                  <div class="form-group col-md-12">

                    <select name="NOME" class="form-control">
                      <option value="">NOME</option>
                      <?PHP
                      $result10  =  mysqli_query($con, "SELECT * FROM acesso ORDER BY NOME ");
                      $cont = 0;
                      $COR = "white";
                      while ($linha = mysqli_fetch_array($result10)) {

                        $NOME = $linha["NOME"];

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

  </div>

  </center>

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


 

<script>
var livePatern = {
  canvas: null,
  context: null,
  cols: 0,
  rows: 0,
  colors: [230, 244, 200],
  triangleColors: [],
  destColors: [],
  
  init: function(){
    this.canvas = document.getElementById('canvas');
    this.context = this.canvas.getContext('2d');
    this.cols = Math.floor(document.body.clientWidth / 24)+3;
    this.rows = Math.floor(document.body.clientHeight / 24) + 1;
    
    this.canvas.width = document.body.clientWidth;
    this.canvas.height = document.body.clientHeight;
    
    this.drawBackground();
    this.animate();
  },
  
  drawTriangle: function(x, y, color, inverted){
    inverted = inverted == undefined ? false : inverted;

    this.context.beginPath();
    this.context.moveTo(x, y);
    this.context.lineTo(inverted ? x - 22 : x + 22, y + 11);
    this.context.lineTo(x, y + 22);
    this.context.fillStyle = "rgb("+<?PHP ECHO $RED;?>+","+color+","+color+")";
    this.context.fill();
    this.context.closePath();
  },
  
  getColor: function(){    
    return this.colors[(Math.floor(Math.random() * 3))];
  },
  
  drawBackground: function(){
    var eq = null;
    var x = this.cols;
    var destY = 0;
    var color, y;
    
    while(x--){
      eq = x % 2;
      y = this.rows;

      while(y--){
        destY = Math.round((y-0.5) * 24);

        this.drawTriangle(x * 24 + 2, eq == 1 ? destY : y * 24, this.getColor());
        this.drawTriangle(x * 24, eq == 1 ? destY  : y * 24, this.getColor(), true);
      }
    }
  },
  
  animate: function(){
    var me = this;

    var x = Math.floor(Math.random() * this.cols);
    var y = Math.floor(Math.random() * this.rows);
    var eq = x % 2;

    if (eq == 1) {
      me.drawTriangle(x * 24, Math.round((y-0.5) * 24) , this.getColor(), true);
    } else {
      me.drawTriangle(x * 24 + 2, y * 24, this.getColor());
    }

    setTimeout(function(){    
      me.animate.call(me);
    }, 10);
  },
};

!function(){livePatern.init();}()
$(window).resize(function() {
  livePatern.init();
});
</script>

</html>
