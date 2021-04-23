<!DOCTYPE html>
<html>
<title>Capixaba Quality</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">



<style>
  html,
  body,
  h1,
  h2,
  h3,
  h4,
  h5 {
    font-family: "Raleway", sans-serif
  }

  @media print {

    .no-print,
    .no-print,
    .btn-warning,
    .btn-danger,
    .btn-primary,
    .btn * {
      display: none !important;
    }
  }

  .lua {
    font-size: 35px;
  }

  @media screen and (max-width: 450px) {
    .lua {
      font-size: 17px;
    }

  }

  html {
    scroll-behavior: smooth;
  }



  body {



    background-image: linear-gradient(to right, #33ccff, #003399);
  }
</style>

<script>
  function down() {
    var x = screen.width;


    if (x < 600) {
      window.scrollTo({
        top: 4000,
        behavior: 'smooth'
      });
    }

  }
</script>

<body class="w3-light-grey">


  <?PHP





  if (!isset($_POST["CONT"])) {
    $_POST["CONT"] = "";
  }

  $CONT = $_POST["CONT"];  ////// PASSA 0 NUMERO DE LINHAS DO CHACKLIST PARA INSERT





  $NOME = "Capixaba Quality";

  if (!isset($_POST["ACAO_MENU"])) {
    $_POST["ACAO_MENU"] = "";
  }

  $ACAO_MENU = $_POST["ACAO_MENU"];




  if ($ACAO_MENU == "") {

    if (!isset($_GET["ACAO_MENU"])) {
      $_GET["ACAO_MENU"] = "";
    }

    $ACAO_MENU = $_GET["ACAO_MENU"];
  }


  $result10  =  mysqli_query($con, "SELECT * FROM home WHERE ACAO = '$ACAO_MENU' ");


  while ($linha = mysqli_fetch_array($result10)) {


    $NOME  = $linha["NOME"];
  }


  $result10  =  mysqli_query($con, "SELECT * FROM menu WHERE ACAO = '$ACAO_MENU' ");


  while ($linha = mysqli_fetch_array($result10)) {


    $NOME  = $linha["NOME"];
  }
  ?>

  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:4;background: url(grid.png),  linear-gradient( #343a40, black);">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey no-print" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>

    <span class="w3-bar-item w3-right ">

      <font class="lua " color="white"><?php echo $NOME; ?></font>
      <a href="index.php"><img src="./css/image2.png" width="80" style="text-align: center;" height="50" class="d-inline-block align-top" alt="">
    </span></a>
  </div>






  <?php




  if ($ACAO_MENU != "") {
    include "./$ACAO_MENU.php";
  } else {
  ?>



    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;  background: url(grid.png),  linear-gradient( #33ccff, #003399);" id="mySidebar"><br>
      <br>
      <div class="w3-container w3-row">


        <div class="w3-col s8 w3-bar">

          <span>Bem vindo, <strong>
              <font color="white"><?php echo $usuario; ?></font>
            </strong></span><br>

          <!--   <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>-->
          <a href="#" style="color: #ff6f00;" class="w3-bar-item w3-button fa fa-cog fa-fw"><i></i></a>

          <a href="deslogar.php" style="color: #ff6f00;" class="w3-bar-item w3-button fa fa-remove" title="Sair "><i></i></a>
          <a href="index.php" title="Atualizar a pagina " style="color: #ff6f00;" class="w3-bar-item w3-button fa">&#xf0e2; </a>

        </div>
      </div>

      <hr>
      <form action="" method="post">
        <div class="w3-container" style="background: url(grid.png),  linear-gradient( #343a40, black);text-align:center;">
          <h5>
            <font color="white">CADASTROS</font>
          </h5>
        </div>
        <div class="w3-bar-block">
          <br>



          <div id="menu">
            <?php


            $result10X  =  mysqli_query($con, "SELECT * FROM credencial WHERE USUARIO = '$usuario' ");

            while ($linha = mysqli_fetch_array($result10X)) {

              $ID_USUARIO  = $linha["ID"];
            }






            $result101Cxaa  =  mysqli_query($con, "SELECT * FROM menu GROUP BY GRUPO ORDER BY ID ");

            while ($linha = mysqli_fetch_array($result101Cxaa)) {

              $GRUPOV  = $linha["GRUPO"];

              $result101Cx  =  mysqli_query($con, "SELECT * FROM acesso  WHERE USUARIO = '$ID_USUARIO'AND TABELA = '1' AND GRUPO ='$GRUPOV' GROUP BY GRUPO  ");


              while ($linha = mysqli_fetch_array($result101Cx)) {
                $BOTAO  = $linha["BOTAO"];

                $result101  =  mysqli_query($con, "SELECT * FROM menu WHERE NOME = '$BOTAO'  ");


                while ($linha = mysqli_fetch_array($result101)) {


                  $GRUPO  = $linha["GRUPO"];
                  $CORX  = $linha["COR"];
                  $ICONX  = $linha["ICON"];


            ?>

                  <button class="btn btn-transparent btn-block  " type="button" data-toggle="collapse" data-target="#<?PHP echo $GRUPO; ?>" style="text-align:left; padding-left:16px; color:white;" aria-expanded="true" aria-controls="multiCollapseExample2"><i style="color:<?php echo $CORX; ?>;" class="<?PHP echo $ICONX; ?>"></i> <?PHP echo $GRUPO; ?> </button>
                  </p>
                  <div class="row">

                    <div class="col">
                      <div class="collapse multi-collapse" data-parent="#menu" style="text-align:left; padding-left:6px" id="<?PHP echo $GRUPO; ?>">
                        <div class="card card-body" style="background: url(grid.png),  linear-gradient( #343a40, black);">
                          <?PHP






                          $result101C  =  mysqli_query($con, "SELECT * FROM acesso  WHERE USUARIO = '$ID_USUARIO'AND GRUPO = '$GRUPO' AND TABELA = '1' ");


                          while ($linha = mysqli_fetch_array($result101C)) {
                            $BOTAO  = $linha["BOTAO"];


                            $result10  =  mysqli_query($con, "SELECT * FROM menu WHERE NOME = '$BOTAO'  ");



                            while ($linha = mysqli_fetch_array($result10)) {


                              $NOME  = $linha["NOME"];
                              $ICON     = $linha["ICON"];
                              $ACAO   = $linha["ACAO"];
                              $COR   = $linha["COR"];



                          ?>




                              <button name="ACAO_MENU" value="<?php echo $ACAO; ?>" class="w3-bar-item w3-button w3-padding"><i style="color:<?php echo $COR; ?>;" class="<?PHP echo $ICON; ?>"></i>
                                <font color="white"><?php echo $NOME; ?></font>  </a>
                              </button>

                        <?php }
                          }
                        }  ?>

                        <p>

                        </div>
                      </div>
                    </div>
                  </div>


              <?php }
            } ?>

          </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">




      <br>

      <?PHP
      if (!isset($_POST["BOTAO"])) {   /// COMUNICADO PARA OS FUNCINARIOS
        $_POST["BOTAO"] = "";
      }

      $BOTAO = $_POST["BOTAO"];

      if (!isset($_POST["RESPOSTA"])) {
        $_POST["RESPOSTA"] = "";
      }

      $RESPOSTA = $_POST["RESPOSTA"];


      if (!isset($_POST["ID_COMUNICADO"])) {
        $_POST["ID_COMUNICADO"] = "";
      }

      $ID_COMUNICADO = $_POST["ID_COMUNICADO"];

      if ($BOTAO == "ENVIAR") {

        mysqli_query($con, "UPDATE comunicados SET RESPOSTA ='$RESPOSTA' , STATUS = 'RESPONDIDO'   WHERE ID= '$ID_COMUNICADO' ");
      }


      $result10  =  mysqli_query($con, "SELECT * FROM comunicados WHERE FUNCIONARIO = '$ID_USUARIO' ");


      while ($linha = mysqli_fetch_array($result10)) {

        $MENSSAGEM  = $linha["MENSSAGEM"];
        $STATUS  = $linha["STATUS"];
        $ID_COMUNICADO  = $linha["ID"];
        $BOSS  = $linha["BOSS"];





        if ($STATUS != "RESPONDIDO") {
      ?>
          <br>

          <div class="container-fluid">


            <div class="card" style="background-color: black;  ">



              <div class="card-body">
                <div class="alert alert-danger" role="alert" ">
                  <h3 class=" alert-heading" style="text-align:center"><b style="color:#fc0303"><?PHP echo $BOSS; ?> :</b></h3>
                  <br>

                  <p style="color:black"><?PHP echo  $MENSSAGEM; ?> </p>
                  <hr class="new1">
                  <p class="mb-0"> <label>
                      <font style="color:#fc0303">RESPOSTA:</font>
                    </label>
                    <input type="text" name="RESPOSTA" class="form-control" />
                  </p>
                  <BR>
                  <div class="form-row">
                    <div class="form-group  col-md-12">
                      <center>

                        <input type="submit" name="BOTAO" value="ENVIAR" class="btn btn-dark" style="text-align:center" />
                        <input type="hidden" name="ID_COMUNICADO" value="<?PHP echo $ID_COMUNICADO; ?>" />

                      </center>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>


      <?PHP }
      }  ?>

      <br>

      <div id="home">
        <div class="w3-row-padding w3-margin-bottom">

          <?php
          $BOTAO  = "";
          $CONTX = 0;

          $result101Cxaa  =  mysqli_query($con, "SELECT * FROM home GROUP BY GRUPO ORDER BY ID ");

          while ($linha = mysqli_fetch_array($result101Cxaa)) {

            $GRUPOV  = $linha["GRUPO"];

            $result101Cx  =  mysqli_query($con, "SELECT * FROM acesso  WHERE USUARIO = '$ID_USUARIO'AND TABELA = '2' AND GRUPO  = '$GRUPOV'GROUP BY GRUPO  ");


            while ($linha = mysqli_fetch_array($result101Cx)) {
              $BOTAO  = $linha["BOTAO"];
              $result101  =  mysqli_query($con, "SELECT * FROM home  WHERE  NOME= '$BOTAO' ");

              while ($linha = mysqli_fetch_array($result101)) {


                $GRUPO  = $linha["GRUPO"];
                $CORX  = $linha["COR"];
                $ICONX  = $linha["ICON"];

                $CONTX = $CONTX + 1;


                if ($CONTX == 5) {

          ?>
        </div>
        <div class="w3-row-padding w3-margin-bottom">


        <?PHP
                }


        ?>



        <div class="w3-quarter   ">

          <button onclick="down();" class="btn-block btn-dark " type="button" data-toggle="collapse" data-target="#<?PHP echo $GRUPO; ?>X" aria-expanded="false" aria-controls="collapseExample">
            <div class="w3-container w3-<?php echo $CORX; ?> w3-padding-16   ">

              <div><i class="<?php echo $ICONX; ?>"></i></div>






              <h5><?php echo $GRUPO; ?></h5>

            </div>

          </button>

        </div>

  <?PHP }
            }
          }

  ?>

        </div>
        <hr>

        <?php
        $result101C  =  mysqli_query($con, "SELECT * FROM acesso  WHERE USUARIO = '$ID_USUARIO' AND TABELA = '2'GROUP BY GRUPO ");


        while ($linha = mysqli_fetch_array($result101C)) {
          $BOTAO  = $linha["BOTAO"];
          $result101  =  mysqli_query($con, "SELECT * FROM home WHERE NOME = '$BOTAO' GROUP BY GRUPO ");


          while ($linha = mysqli_fetch_array($result101)) {


            $GRUPO  = $linha["GRUPO"];
            $CORX  = $linha["COR"];
            $ICONX  = $linha["ICON"];



        ?>
            </p>
            <div class="collapse" data-parent="#home" id="<?PHP echo $GRUPO; ?>X">
              <div class="card card-body" style="background: url(grid.png),  linear-gradient( #343a40, black);">
                <div class="w3-row-padding w3-margin-bottom">
                  <?PHP
                  $cont = -1;


                  $result101CGG  =  mysqli_query($con, "SELECT * FROM acesso  WHERE USUARIO = '$ID_USUARIO' AND GRUPO = '$GRUPO'AND TABELA = '2' ");


                  while ($linha = mysqli_fetch_array($result101CGG)) {
                    $BOTAO  = $linha["BOTAO"];

                    $result10X  =  mysqli_query($con, "SELECT * FROM home WHERE NOME = '$BOTAO' AND GRUPO = '$GRUPO'");


                    while ($linha = mysqli_fetch_array($result10X)) {


                      $NOME  = $linha["NOME"];
                      $ICON     = $linha["ICON"];
                      $ACAO   = $linha["ACAO"];
                      $COR   = $linha["COR"];







                      $cont = $cont + 1;


                      if ($cont == 4) { /// controla o numero de botoes por linha

                  ?>
                </div>
                <div class="w3-row-padding w3-margin-bottom ">

                <?php
                        $cont = 0;
                      }
                ?>
                <div class="w3-quarter   ">
                  <button name="ACAO_MENU" value="<?php echo $ACAO; ?>" class="btn-block btn-dark ">
                    <div class="w3-container w3-<?php echo $COR; ?> w3-padding-16   ">
                      <div><i class="<?php echo $ICON; ?>"></i></div>




                      <h5><?php echo $NOME; ?></h5>

                    </div>

                  </button>

                </div>




            <?PHP }
                  } ?>


                </div>
              </div>
            </div>

        <?PHP }
        } ?>



      </div>



      </form>



      <div class="w3-row-padding w3-margin-bottom">
        <?php

        $cont = -1;

        $DAY = DATE('w');
        $DATA = date("Ymd");




        $result10  =  mysqli_query($con, "SELECT * FROM cadastro_checklist WHERE RESPONSAVEL = '$ID_USUARIO' ");


        while ($linha = mysqli_fetch_array($result10)) {

          $DESCRICAO  = "";

          $CHECKLIST  = $linha["CHECKLIST"];
          $FREQUENCIA     = $linha["FREQUENCIA"];
          $ULTIMO    = $linha["ULTIMO"];
          $ID    = $linha["ID"];

          $TAG    = $linha["TAG"];
          $DIA    = $linha["DIA"];


          $PASS = 0;




          $result100  =  mysqli_query($con, "SELECT * FROM equipamentos WHERE TAG = '$TAG' ");


          while ($linha = mysqli_fetch_array($result100)) {

            $DESCRICAO  = $linha["DESCRICAO"];
          }



          if ($DIA == "SEGUNDA-FEIRA" and $DAY == 1 and $ULTIMO < $DATA) {
            $PASS = 1;
          } else if ($DIA == "TERÇA-FEIRA" and $DAY == 2 and $ULTIMO  < $DATA) {
            $PASS = 1;
          } else if ($DIA == "QUARTA-FEIRA" and $DAY == 3 and $ULTIMO  < $DATA) {
            $PASS = 1;
          } else  if ($DIA == "QUINTA-FEIRA" and $DAY == 4 and $ULTIMO  < $DATA) {
            $PASS = 1;
          } else if ($DIA == "SEXTA-FEIRA" and $DAY == 5 and $ULTIMO  < $DATA) {
            $PASS = 1;
          } else   if ($DIA == "SABADO" and $DAY == 6 and $ULTIMO  < $DATA) {
            $PASS = 1;
          }





          if ($FREQUENCIA == "1") {
            if ($ULTIMO != date("Ymd")) {
              $PASS = 1;
            }
          } else if ($FREQUENCIA == "2") {
            if (compara_data($ULTIMO, 7) <= date("Ymd")) {
              $PASS = 1;
            }
          } else if ($FREQUENCIA == "3") {
            if (compara_data($ULTIMO, 15)  <= date("Ymd")) {
              $PASS = 1;
            }
          } else if ($FREQUENCIA == "4") {
            if (compara_data($ULTIMO, 30)  <= date("Ymd")) {
              $PASS = 1;
            }
          } else if ($FREQUENCIA == "5") {
            if (compara_data($ULTIMO, 178)  <= date("Ymd")) {
              $PASS = 1;
            }
          } else if ($FREQUENCIA == "6") {
            if (compara_data($ULTIMO, 365) <= date("Ymd")) {
              $PASS = 1;
            }
          } else if ($FREQUENCIA == "7") {
            if (compara_data($ULTIMO, 60) <= date("Ymd")) {
              $PASS = 1;
            }
          }




          if ($PASS == 1) {



            if ($DESCRICAO == "") {

              $result100  =  mysqli_query($con, "SELECT * FROM checklist WHERE TAG = '$CHECKLIST' ");


              while ($linha = mysqli_fetch_array($result100)) {

                $DESCRICAO  = $linha["EQUIPAMENTO"];
              }
            }



            $cont = $cont + 1;


            if ($cont == 4) { /// controla o numero de botoes por linha

        ?>
      </div>
      <div class="w3-row-padding w3-margin-bottom ">

      <?php
              $cont = 0;
            }


      ?>




      <div class="w3-quarter ">

        <button class="btn-block btn-dark "><a href="index.php?ACAO_MENU=checklist&TAG=<?php echo $TAG; ?>&MODELO=<?php echo $CHECKLIST; ?>&FREQUENCIA=<?php echo $FREQUENCIA; ?>&DIA=<?php echo $DIA; ?>&ID_CHECKLIST=<?php echo $ID; ?>">
            <div class="w3-container w3-red w3-padding-16 ">
              <?PHP if ($DIA == "") { ?>
                <i class="fa fa-bell  w3-xxxlarge"></i>

              <?PHP } else { ?>

                <h4><?php echo $DIA; ?> </h4>



              <?PHP   } ?>


              <div class="w3-clear"></div>


              <h5><?php echo $DESCRICAO;  ?></h5>





            </div>
          </a>

        </button>


      </div>
  <?php

          }
        }

  ?>

      </div>




    </div>

    <script>
      // Get the Sidebar
      var mySidebar = document.getElementById("mySidebar");

      // Get the DIV with overlay effect
      var overlayBg = document.getElementById("myOverlay");

      // Toggle between showing and hiding the sidebar, and add overlay effect
      function w3_open() {
        if (mySidebar.style.display === 'block') {
          mySidebar.style.display = 'none';
          overlayBg.style.display = "none";
        } else {
          mySidebar.style.display = 'block';
          overlayBg.style.display = "block";
        }
      }

      // Close the sidebar with the close button
      function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
      }
    </script>

</body>

</html>
<?php } ?>