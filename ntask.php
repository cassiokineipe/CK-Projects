<script type="text/javascript"> 
  document.addEventListener("DOMContentLoaded", function(event) {
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
  });

  window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
  };

  function gravar(ID) {



    var COR = document.getElementById(ID + 'C').value;

    var RESPONSAVEL = document.getElementById(ID + 'R').value;
    var NOME = document.getElementById(ID + 'N').value;

    var ORDEM_QUADRO = document.getElementById(ID + 'OQ').value;
    var ID_ACESSO = document.getElementById(ID + 'IA').value;

    window.location.href = "index.php?ACAO_MENU=ntask&ID=" + ID +"&ORDEM_QUADRO=" + ORDEM_QUADRO +"&ID_ACESSO=" + ID_ACESSO +  "&COR=" + COR + "&NOME=" + NOME + "&RESPONSAVEL=" + RESPONSAVEL + "&BOTAO=ALTERAR_DA_TABELA";

  }




  function gravar2(ID) {

    if (ID == 'CAMPO1' || ID == 'CAMPO2' || ID == 'CAMPO3') {
      var CAMPO1 = document.getElementById('CAMPO1').value;
      var CAMPO2 = document.getElementById('CAMPO2').value;
      var CAMPO3 = document.getElementById('CAMPO3').value;
      var CORY = document.getElementById('CORY').value;

      var ID_QUADROX = document.getElementById('ID_QUADROX').value;


      var NOME_QUADRO = document.getElementById('NOME_QUADRO').value;
      var PAG = document.getElementById('PAG').value;

      window.location.href = "index.php?ACAO_MENU=ntask&CAMPO1=" + CAMPO1 + "&CAMPO2=" + CAMPO2 + "&CAMPO3=" + CAMPO3 + "&ID_QUADROX=" + ID_QUADROX + "&NOME_QUADRO=" + NOME_QUADRO + "&CORY=" + CORY+ "&PAG=" + PAG;

    } else {

      var COR2 = document.getElementById(ID + 'C2').value;
      var CORY = document.getElementById('CORY').value;
      var NOME2 = document.getElementById(ID + 'N2').value;

      var DATAI = document.getElementById(ID + 'DI').value;
      var DATAF = document.getElementById(ID + 'DF').value;

      var DESCRICAO = document.getElementById(ID + 'D').value;
      var STATUS = document.getElementById(ID + 'S').value;
      var ID_QUADROX = document.getElementById(ID + 'ID').value;
      var NOME_QUADRO = document.getElementById(ID + 'NQ').value;
      var DATAR = document.getElementById(ID + 'DR').value;
      var ORDEM = document.getElementById(ID + 'O').value;
      var PAG = document.getElementById(ID + 'P').value;
     


      var page_y = $(document).scrollTop();
      window.location.href = window.location.href + '?page_y=' + page_y;
      window.location.href = "index.php?ACAO_MENU=ntask&ID_NOTAS=" + ID + "&COR2=" + COR2 + "&CORY=" + CORY + "&NOME2=" + NOME2 + "&ORDEM=" + ORDEM+ "&ID_QUADROX=" + ID_QUADROX + "&PAG=" + PAG +"&NOME_QUADRO=" + NOME_QUADRO + "&DATAI=" + DATAI + "&DATAR=" + DATAR + "&DATAF=" + DATAF + "&DESCRICAO=" + DESCRICAO + "&STATUS=" + STATUS + "&ID_QUADRO=" + ID + "&BOTAO=ALTERAR_DA_NOTA";



    }
  }
</script>
<?php 


$usuario  = $_SESSION['usuario'];

if (!isset($_GET["CORY"])) {
  $_GET["CORY"] = "";
}

$CORY = $_GET["CORY"];

if (!isset($_GET["ID_QUADRO"])) {
  $_GET["ID_QUADRO"] = "";
}

$ID_QUADRO = $_GET["ID_QUADRO"];


if (!isset($_GET["NOME_QUADRO"])) {
  $_GET["NOME_QUADRO"] = "";
}

$NOME_QUADRO = $_GET["NOME_QUADRO"];



if (!isset($_POST["BOTAO"])) {
  $_POST["BOTAO"] = "";
}

$BOTAO = $_POST["BOTAO"];

if ($BOTAO == "") {
  if (!isset($_GET["BOTAO"])) {
    $_GET["BOTAO"] = "";
  }

  $BOTAO = $_GET["BOTAO"];
}

if (!isset($_POST["ID"])) {
  $_POST["ID"] = "";
}

$ID = $_POST["ID"];

if ($ID == "") {
  if (!isset($_GET["ID"])) {
    $_GET["ID"] = "";
  }

  $ID = $_GET["ID"];
}

if (!isset($_GET["VISUALIZARY"])) {
  $_GET["VISUALIZARY"] = "";
}

$VISUALIZARY = $_GET["VISUALIZARY"];

if ($VISUALIZARY == "") {
  $VISUALIZARY = 1;
}

if (!isset($_GET["ID_ITEM"])) {
  $_GET["ID_ITEM"] = "";
}

$ID_ITEM = $_GET["ID_ITEM"];

if ($ID_ITEM == "") {
  if (!isset($_POST["ID_ITEM"])) {
    $_POST["ID_ITEM"] = "";
  }

  $ID_ITEM = $_POST["ID_ITEM"];
}

if (!isset($_POST["ORDEM"])) {
  $_POST["ORDEM"] = "";
}

$ORDEM = $_POST["ORDEM"];

if ($ORDEM == "") {
  if (!isset($_GET["ORDEM"])) {
    $_GET["ORDEM"] = "";
  }

  $ORDEM = $_GET["ORDEM"];
}



if (!isset($_POST["STATUS"])) {
  $_POST["STATUS"] = "";
}

$STATUS = $_POST["STATUS"];

if ($STATUS == "") {
  if (!isset($_GET["STATUS"])) {
    $_GET["STATUS"] = "";
  }

  $STATUS = $_GET["STATUS"];
}
if (!isset($_GET["NOME"])) {
  $_GET["NOME"] = "";
}

$NOME = $_GET["NOME"];

if (!isset($_GET["DATAR"])) {
  $_GET["DATAR"] = "";
}

$DATAR = $_GET["DATAR"];
$DATAR = data_ini_html5($DATAR);
if (!isset($_POST["DATAI"])) {
  $_POST["DATAI"] = "";
}

$DATAI = $_POST["DATAI"];
if ($DATAI == "") {
  if (!isset($_GET["DATAI"])) {
    $_GET["DATAI"] = "";
  }

  $DATAI = $_GET["DATAI"];
}

$DATAI = data_ini_html5($DATAI);

if (!isset($_POST["DATAF"])) {
  $_POST["DATAF"] = "";
}

$DATAF = $_POST["DATAF"];

if ($DATAF == "") {
  if (!isset($_GET["DATAF"])) {
    $_GET["DATAF"] = "";
  }

  $DATAF = $_GET["DATAF"];
}

$DATAF = data_ini_html5($DATAF);


if (!isset($_GET["RESPONSAVEL"])) {
  $_GET["RESPONSAVEL"] = "";
}

$RESPONSAVEL = $_GET["RESPONSAVEL"];

if (!isset($_GET["CAMPO1"])) {
  $_GET["CAMPO1"] = "";
}

$CAMPO1 = $_GET["CAMPO1"];


if (!isset($_GET["CAMPO2"])) {
  $_GET["CAMPO2"] = "";
}

$CAMPO2 = $_GET["CAMPO2"];

if (!isset($_GET["CAMPO3"])) {
  $_GET["CAMPO3"] = "";
}

$CAMPO3 = $_GET["CAMPO3"];

if (!isset($_GET["ID_QUADROX"])) {
  $_GET["ID_QUADROX"] = "";
}

$ID_QUADROX = $_GET["ID_QUADROX"];

if (!isset($_GET["PAG"])) {
  $_GET["PAG"] = "";
}

 $PAG = $_GET["PAG"];


 if (!isset($_GET["ORDEM_QUADRO"])) {
  $_GET["ORDEM_QUADRO"] = "";
}

$ORDEM_QUADRO = $_GET["ORDEM_QUADRO"];

if (!isset($_GET["ID_ACESSO"])) {
  $_GET["ID_ACESSO"] = "";
}

$ID_ACESSO = $_GET["ID_ACESSO"];


 IF($PAG == ""){
   $PAG = 1;
 }

if ($DATAR != "") {


  mysqli_query($con, "UPDATE notas_monday SET DATA_REALIZADO='$DATAR' WHERE ID = '$ID_ITEM' "); 
}



if ($CAMPO3 != "" || $CAMPO2 != ""|| $CAMPO1 != "") {


  mysqli_query($con, "UPDATE quadro_monday SET CAMPO1 = '$CAMPO1', CAMPO2 = '$CAMPO2' , CAMPO3 = '$CAMPO3'  WHERE ID = '$ID_QUADROX' ");
}

IF($ORDEM_QUADRO != ""){
 
  mysqli_query($con, "UPDATE acesso_monday SET  ORDEM='$ORDEM_QUADRO' WHERE ID = '$ID_ACESSO' ");
}


if (!isset($_GET["COR"])) {
  $_GET["COR"] = "";
}

$COR = $_GET["COR"];



if ($BOTAO == "Sim") {


  mysqli_query($con, "DELETE FROM notas_monday WHERE ID = '$ID_ITEM'");
}

if ($BOTAO == "SIM") {

  mysqli_query($con, "DELETE FROM quadro_monday WHERE ID = '$ID_ITEM'");

  mysqli_query($con, "DELETE FROM acesso_monday WHERE QUADRO = '$ID_ITEM'");

  mysqli_query($con, "DELETE FROM notas_monday WHERE QUADRO = '$ID_ITEM'");
}




if ($BOTAO == "ARQUIVAR") {


  $result10DDYY  =  mysqli_query($con, "SELECT * FROM notas_monday WHERE ID = '$ID_ITEM' ");

  while ($linha = mysqli_fetch_array($result10DDYY)) {


    $VISUALIZAR  = $linha["VISUALIZAR"];
  }

  if ($VISUALIZAR == 1) {
    $VISUALIZAR = 0;
  } else {
    $VISUALIZAR = 1;
  }


  mysqli_query($con, "UPDATE notas_monday SET VISUALIZAR='$VISUALIZAR'WHERE ID = '$ID_ITEM' ");
}


if ($BOTAO == "ALTERAR_DA_TABELA") {


  mysqli_query($con, "UPDATE quadro_monday SET NOME='$NOME', COR = '$COR'   WHERE ID = '$ID' ");





  if ($RESPONSAVEL != $usuario) {


    $PASS = 0;
    $result10DDYY  =  mysqli_query($con, "SELECT * FROM acesso_monday WHERE RESPONSAVEL = '$RESPONSAVEL' AND QUADRO = '$ID' ");

    while ($linha = mysqli_fetch_array($result10DDYY)) {


      $PASS = 1;
    }
    if ($PASS == 1) {
      mysqli_query($con, "DELETE FROM acesso_monday WHERE QUADRO = '$ID'  AND  RESPONSAVEL = '$RESPONSAVEL'");
    } else {

      mysqli_query($con, "INSERT INTO acesso_monday (ID,QUADRO,RESPONSAVEL,ORDEM)  VALUES ('','$ID','$RESPONSAVEL',0)");
    }
  }
}




if ($BOTAO == "CRIARNOVOITEM") {



  mysqli_query($con, "INSERT INTO notas_monday (ID,QUADRO,NOME,DESCRICAO,DATAI,DATAF,STATUS,COR,DATA_REALIZADO,VISUALIZAR,ORDEM,PAG)  VALUES ('','$ID_QUADRO','','','','','PENDENTE','27AE60','',1,0,'$PAG')");
}



if ($BOTAO == "CRIARNOVO") {

  mysqli_query($con, "INSERT INTO quadro_monday (ID,NOME,COR,CAMPO2,CAMPO3,CAMPO1)  VALUES ('','NOVO','27AE60 ','NOME','DESCRIÇÃO','ORDEM')");


  $result10vv  =  mysqli_query($con, "SELECT * FROM quadro_monday");




  while ($linha = mysqli_fetch_array($result10vv)) {

    $IDff  = $linha["ID"];
  }
  mysqli_query($con, "INSERT INTO notas_monday (ID,QUADRO,NOME,DESCRICAO,DATAI,DATAF,STATUS,COR,DATA_REALIZADO,VISUALIZAR,ORDEM,PAG)  VALUES ('','$IDff','','','','','PENDENTE','27AE60','',1,0,1)");

  mysqli_query($con, "INSERT INTO acesso_monday (ID,QUADRO,RESPONSAVEL,ORDEM)  VALUES ('','$IDff','$usuario',0)");
}


if ($BOTAO == "EXCLUIR_QUADRO") { ?>



  <BR><BR>

  <div class="container-fluid"> 

    <div class="card" style="background: url(grid.png),  linear-gradient( #343a40, #343a40);text-align:center;border-radius:20px;">


      <div class="card-body">

        <form action="index.php" method="post">
          <div class="alert alert-danger" role="alert" style="text-align:center;COLOR:BALCK;font-size:20px;">
            TEM CERTEZA QUE DESEJA EXCLUIR ?
          </div>
          <center>
            <div class="form-row">
              <div class="form-group  col-md-2"> </DIV>
              <div class="form-group  col-md-4">


                <input type="submit" name="BOTAO" value="SIM" class="btn btn-success" style="text-align:center" />
                <input type="hidden" name="ID_ITEM" value="<?PHP echo $ID_ITEM; ?>" />
                <input type="hidden" name="ACAO_MENU" value="ntask" />

              </DIV>
              <div class="form-group  col-md-3">

                <input type="submit" name="BOTAO" value="NÃO" class="btn btn-danger" style="text-align:center" />



              </DIV>
            </DIV>



        </form>
      </DIV>
    </DIV>
  </DIV>
  </center>



<?PHP
} else if ($BOTAO == "EXCLUIR_ITEM") { ?>



  <BR><BR>

  <div class="container-fluid">

    <div class="card" style="background: url(grid.png),  linear-gradient( #343a40, #343a40);text-align:center;border-radius:20px;">


      <div class="card-body">

        <form action="index.php" method="post">
          <div class="alert alert-danger" role="alert" style="text-align:center;COLOR:BALCK;font-size:20px;">
            TEM CERTEZA QUE DESEJA EXCLUIR ?
          </div>
          <center>
            <div class="form-row">
              <div class="form-group  col-md-2"> </DIV>
              <div class="form-group  col-md-4">


                <input type="submit" name="BOTAO" value="Sim" class="btn btn-success" style="text-align:center" />
                <input type="hidden" name="ID_ITEM" value="<?PHP echo $ID_ITEM; ?>" />
                <input type="hidden" name="ID_QUADRO" value="<?PHP echo $ID_QUADRO; ?>" />
                <input type="hidden" name="NOME_QUADRO" value="<?PHP echo $NOME_QUADRO; ?>" />
                <input type="hidden" name="ACAO_MENU" value="ntask" />

              </DIV>
              <div class="form-group  col-md-3">

                <input type="submit" name="BOTAO" value="Não" class="btn btn-danger" style="text-align:center" />



              </DIV>
            </DIV>



        </form>
      </DIV>
    </DIV>
  </DIV>
  </center>



  <?PHP
} else {









  if (!isset($_GET["ID_QUADROX"])) {
    $_GET["ID_QUADROX"] = "";
  }

  $ID_QUADRO = $_GET["ID_QUADROX"];

  if ($ID_QUADRO == "") {

    if (!isset($_GET["ID_QUADRO"])) {
      $_GET["ID_QUADRO"] = "";
    }

    $ID_QUADRO = $_GET["ID_QUADRO"];
  }

  if ($ID_QUADRO == "") {
    if (!isset($_POST["ID_QUADRO"])) {
      $_POST["ID_QUADRO"] = "";
    }

    $ID_QUADRO = $_POST["ID_QUADRO"];
  }

  if ($NOME_QUADRO == "") {
    if (!isset($_POST["NOME_QUADRO"])) {
      $_POST["NOME_QUADRO"] = "";
    }

    $NOME_QUADRO = $_POST["NOME_QUADRO"];
  }


  if ($ID_QUADRO  != "") { /////////////////////////////////////////////////////////////////////////////////////////////////////////////



    if (!isset($_GET["DATAI"])) {
      $_GET["DATAI"] = "";
    }

    $DATAI = $_GET["DATAI"];

    if (!isset($_GET["DATAF"])) {
      $_GET["DATAF"] = "";
    }

    $DATAF = $_GET["DATAF"];

    if (!isset($_GET["NOTAS"])) {
      $_GET["NOTAS"] = "";
    }

    $NOTAS = $_GET["NOTAS"];


    if (!isset($_GET["DESCRICAO"])) {
      $_GET["DESCRICAO"] = "";
    }

    $DESCRICAO = $_GET["DESCRICAO"];


    if (!isset($_GET["COR2"])) {
      $_GET["COR2"] = "";
    }

    $COR2 = $_GET["COR2"];



    if (!isset($_GET["NOME2"])) {
      $_GET["NOME2"] = "";
    }

    $NOME2 = $_GET["NOME2"];


    if (!isset($_GET["ID_NOTAS"])) {
      $_GET["ID_NOTAS"] = "";
    }

    $ID_NOTAS = $_GET["ID_NOTAS"];

    $DATAI = data_ini_html5($DATAI);
    $DATAF = data_ini_html5($DATAF);

    if ($BOTAO == "ALTERAR_DA_NOTA") {



      if ($DATAR == "undeind") {
        if ($STATUS == "APROVADO" or $STATUS == "PAGO" or $STATUS == "REALIZADO") {

          $DATAR = date("Ymd");
        }
      }





      mysqli_query($con, "UPDATE notas_monday SET NOME='$NOME2', COR = '$COR2', DESCRICAO= '$DESCRICAO', DATAI= '$DATAI', DATAF= '$DATAF', STATUS= '$STATUS', DATA_REALIZADO= '$DATAR', ORDEM= '$ORDEM' WHERE ID = '$ID_NOTAS' ");
    }


$result10  =  mysqli_query($con, "SELECT * FROM quadro_monday WHERE ID = '$ID_QUADRO' ");



while ($linha = mysqli_fetch_array($result10)) {
  $CAMPO1  = $linha["CAMPO1"];
  $CAMPO2  = $linha["CAMPO2"];
  $CAMPO3  = $linha["CAMPO3"];
}

?>


  <div class="container-fluid">

    <div class="card-body">



        <div onclick="window.location.href = 'index.php?ACAO_MENU=ntask' " class="p-0.5 mb-1  text-white" style="background: #<?PHP echo $CORY; ?> ;text-align:center;border-radius:20px;font-size:16px;">
          <center>
            <div style="background: url(grid.png),  linear-gradient( #343a40, black);width:95%;">

              <?PHP echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; ?>
              <b><?PHP echo $NOME_QUADRO; ?></b>
              <?PHP echo "&nbsp&nbsp&nbsp&nbsp&nbsp"; ?>
              
              <button class="btn btn-white "><a href="index.php?ACAO_MENU=ntask&BOTAO=CRIARNOVOITEM&ID_QUADRO=<?php echo $ID_QUADRO; ?>&PAG=<?php echo $PAG; ?>&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&CORY=<?php echo $CORY; ?>" title="Criar Registro." class="btn btn-success"> <i style="font-size:15px" class="fa">&#xf067;</i></a>


              </button>
              <button class="btn btn-white "><a href="index.php?ACAO_MENU=ntask&VISUALIZARY=0&ITEM&ID_QUADRO=<?php echo $ID_QUADRO; ?>&PAG=<?php echo $PAG; ?>&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&CORY=<?php echo $CORY; ?>" title="Mostrar Registros Ocultos." class="btn btn-primary"> <i style="font-size:15px" class="fa">&#xf07c;</i></a>

              </button>

            </div>
          </center>
        </div>




        <form action="index.php" method="post" id="myForm2">



              <table style="background: url(grid.png),  linear-gradient( #343a40, black);" class="table table-striped table-dark table-sm table-hover">
                <thead>

                  <tr>
                    <th scope="col" style="text-align: CENTER;font-size:14px; position: -webkit-sticky; position: sticky;top: 63px;background: url(grid.png),  linear-gradient( #343a40, black);">COR </th>
                    <th style="text-align: center;font-size:14px;position: -webkit-sticky; position: sticky;top: 63px;background: url(grid.png),  linear-gradient( #343a40, black);" scope="col"><input onchange="gravar2('CAMPO2')" style="font-size:15px;text-align: center;background-color:transparent;color:white;" id="CAMPO1" type="text" name="CAMPO1" value="<?php echo $CAMPO1; ?>" class="form-control" /></th>
                    <th style="text-align: center;font-size:14px;position: -webkit-sticky; position: sticky;top: 63px;background: url(grid.png),  linear-gradient( #343a40, black);" scope="col"><input onchange="gravar2('CAMPO2')" style="font-size:15px;text-align: center;background-color:transparent;color:white;" id="CAMPO2" type="text" name="CAMPO2" value="<?php echo $CAMPO2; ?>" class="form-control" /></th>
                    <th style="text-align: center;font-size:14px;position: -webkit-sticky; position: sticky;top: 63px;background: url(grid.png),  linear-gradient( #343a40, black);" scope="col"><input onchange="gravar2('CAMPO3')" style="font-size:15px;text-align: center;background-color:transparent;color:white;" id="CAMPO3" type="text" name="CAMPO3" value="<?php echo $CAMPO3; ?>" class="form-control" /></th>
                    <th style="text-align: center;font-size:14px;position: -webkit-sticky; position: sticky;top: 63px;background: url(grid.png),  linear-gradient( #343a40, black);" scope="col">STATUS</th>

                    <th style="text-align: right;font-size:14px;position: -webkit-sticky; position: sticky;top: 63px;background: url(grid.png),  linear-gradient( #343a40, black);" scope="col">DATA</th>

                    <th style="text-align: center;font-size:3px;position: -webkit-sticky; position: sticky;top: 63px;background: url(grid.png),  linear-gradient( #343a40, black);" scope="col"></th>
                    <th style="text-align: center;font-size:14px;position: -webkit-sticky; position: sticky;top: 63px;background: url(grid.png),  linear-gradient( #343a40, black);" scope="col">PRAZO</th>




                    <th scope="col" style="text-align: CENTER;font-size:14px;position: -webkit-sticky; position: sticky;top: 63px;background: url(grid.png),  linear-gradient( #343a40, black);">EXCLUIR </th>





                  </tr>
                </thead>



                <?php




                $result10  =  mysqli_query($con, "SELECT * FROM notas_monday WHERE QUADRO = '$ID_QUADRO' AND VISUALIZAR = '$VISUALIZARY'AND PAG = '$PAG' ORDER BY ORDEM");




                while ($linha = mysqli_fetch_array($result10)) {

                  $ID  = $linha["ID"];


                  $COR   = $linha["COR"];
                  $NOME   = $linha["NOME"];
                  $DESCRICAO   = $linha["DESCRICAO"];
                  $DATAI   = $linha["DATAI"];
                  $DATAF   = $linha["DATAF"];
                  $STATUS   = $linha["STATUS"];
                  $DATA_REALIZADO   = $linha["DATA_REALIZADO"];
                  $ORDEM   = $linha["ORDEM"];
                 

                  $DATAH = date("Ymd");

                  if ($DATAI == 0) {
                    $DATAI = date("Ymd");
                  }
                  $CONTD1 = 1;
                  $CONTD2 = 1;
                  $PORCENTAGEM = 1;

                  for ($i = 1; compara_data($DATAI, $i) < $DATAF; $i++) {

                    $CONTD1 = $CONTD1 + 1;
                  }

                  for ($i = 2; compara_data($DATAH, $i) < $DATAF; $i++) {

                    $CONTD2 = $CONTD2 + 1;
                  }
                  $CONTD2 = $CONTD1 - $CONTD2;

                  $PORCENTAGEM = ($CONTD2 * 100) / $CONTD1;

                  $PORCENTAGEM = (int)($PORCENTAGEM);



                  if ($PORCENTAGEM <= 40) {

                    $BT = "success";
                  }
                  if ($PORCENTAGEM >= 40 and $PORCENTAGEM <= 60) {
                    $BT = "warning";
                  }
                  if ($PORCENTAGEM > 60) {
                    $BT = "danger";
                  }


                  $C = $DATAI;
                  $DATAI = substr($C, 0, 4) . '-' . substr($C, 4, 2) . '-' . substr($C, 6, 2);


                  $C = $DATAF;
                  $DATAF = substr($C, 0, 4) . '-' . substr($C, 4, 2) . '-' . substr($C, 6, 2);

                  $C = $DATA_REALIZADO;
                  $DATA_REALIZADOX = substr($C, 0, 4) . '-' . substr($C, 4, 2) . '-' . substr($C, 6, 2);



                  $COR_STATUS = "white";

                  if ($STATUS == "REALIZADO") {
                    $COR_STATUS = "#5cb85c";
                  }

                  if ($STATUS == "APROVADO") {
                    $COR_STATUS = "#5cb85c";
                  }


                  if ($STATUS == "PAGO") {
                    $COR_STATUS = "#5cb85c";
                  }
                  if ($STATUS == "CONFIRMADO") {
                    $COR_STATUS = "#5cb85c";
                  }

                  if ($STATUS == "CANCELADO") {
                    $COR_STATUS = "#d9534f";
                  }
                  
                  if ($STATUS == "PENDENTE") {
                    $COR_STATUS = "#d9534f";
                  }
                  if ($STATUS == "PARADO") {
                    $COR_STATUS = "#d9534f";
                  }
                  if ($STATUS == "NEGADO") {
                    $COR_STATUS = "#d9534f";
                  }
                  if ($STATUS == "EM ANDAMENTO") {
                    $COR_STATUS = "#f0ad4e";
                  }
                  if ($STATUS == "ATRASADO") {
                    $COR_STATUS = "#d9534f";
                  }

                 

                  if ($STATUS == "AGUARDANDO") {
                    $COR_STATUS = "#0275d8";
                  }
                  
                  if ($STATUS == "REAGENDAR") {
                    $COR_STATUS = "#0275d8";
                  }
                
                  if ($STATUS == "PAG PARCIAL") {
                    $COR_STATUS = "#f0ad4e";
                  }
                  if ($STATUS == "EM ANÁLISE") {
                    $COR_STATUS = "#f0ad4e";
                  }
                  $AUTO = "";
                  if ($DESCRICAO == "") {
                    $AUTO = "autofocus";
                  }

                ?>
                  <input style="display:none;" id="NOME_QUADRO" type="text" name="NOME_QUADRO" value="<?php echo $NOME_QUADRO; ?>" class="form-control" />

                  <input style="display:none;" id="PAG" type="text" name="PAG" value="<?php echo $PAG; ?>" class="form-control" />


                  <input style="display:none;" id="<?php echo $ID; ?>NQ" type="text" name="NOME_QUADRO" value="<?php echo $NOME_QUADRO; ?>" class="form-control" />

                  <input style="display:none;" id="<?php echo $ID; ?>P" type="text" name="PAG" value="<?php echo $PAG; ?>" class="form-control" />

                  <tbody style="background:   linear-gradient( #f0f0f0, #f0f0f0);">
                    <tr>



                      <td style="background-color:#<?php echo $COR; ?>;width:3%"> <select style="background-color:transparent;color:white;font-size:15px;" onchange="gravar2('<?php echo $ID; ?>')" name="COR" id="<?php echo $ID; ?>C2" class="form-control">
                          <option value="<?php echo $COR; ?>"></option>

                          <option style="color:black;background-color:#FF3399;" value="FF3399"><?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></option>
                          <option style="color:black;background-color:#8d52eb;" value="8d52eb"></option>
                          <option style="color:black;background-color:#00ff00;" value="00ff00"></option>
                          <option style="color:black;background-color:#072a42;" value="072a42"></option>
                          <option style="color:black;background-color:#343a40;" value="343a40"></option>
                          <option style="color:black;background-color:#2acaea;" value="2acaea"></option>
                          <option style="color:black;background-color:#ffa500;" value="ffa500"></option>
                          <option style="color:black;background-color:#ffff00;" value="ffff00"></option>
                          <option style="color:black;background-color:#008000;" value="008000"></option>
                          <option style="color:black;background-color:#034f84;" value="034f84"></option>
                          <option style="color:black;background-color:#f7786b;" value="f7786b"></option>
                          <option style="color:black;background-color:#50394c;" value="50394c"></option>
                          <option style="color:black;background-color:#c0ded9;" value="c0ded9"></option>
                          <option style="color:black;background-color:#d4ac6e;" value="d4ac6e"></option>
                          <option style="color:black;background-color:#bd5734;" value="bd5734"></option>
                          <option style="color:black;background-color:#87bdd8;" value="87bdd8"></option>
                          <option style="color:black;background-color:#b7d7e8;" value="b7d7e8"></option>
                          <option style="color:black;background-color:#c83349;" value="c83349"></option>
                          <option style="color:black;background-color:#e06377;" value="e06377"></option>
                          <option style="color:black;background-color:#ffcc5c;" value="ffcc5c"></option>
                          <option style="color:black;background-color:#588c7e;" value="588c7e"></option>
                          <option style="color:black;background-color:#00688B;" value="00688B"></option>
                          <option style="color:black;background-color:#B2DFEE;" value="B2DFEE"></option>
                          <option style="color:black;background-color:#0099CC;" value="0099CC"></option>
                          <option style="color:black;background-color:#507786;" value="507786"></option>
                          <option style="color:black;background-color:#0198E1;" value="0198E1"></option>
                          <option style="color:black;background-color:#0D4F8B;" value="0D4F8B"></option>
                          <option style="color:black;background-color:#007FFF;" value="007FFF"></option>
                          <option style="color:black;background-color:#3B6AA0;" value="3B6AA0"></option>
                          <option style="color:black;background-color:#283A90;" value="283A90"></option>
                          <option style="color:black;background-color:#0000CD;" value="0000CD"></option>
                          <option style="color:black;background-color:#6600FF;" value="6600FF"></option>
                          <option style="color:black;background-color:#cc0000;" value="cc0000"></option>
                          <option style="color:black;background-color:#b20000;" value="b20000"></option>
                          <option style="color:black;background-color:#ff0000;" value="ff0000"></option>
                          <option style="color:black;background-color:#DB7093;" value="DB7093"></option>
                          <option style="color:black;background-color:#DC143C;" value="DC143C"></option>
                          <option style="color:black;background-color:#851e3e;" value="851e3e"></option>
                          <option style="color:black;background-color:#ffffff;" value="ffffff"></option>
                          <option style="color:black;background-color:#fe8a71;" value="fe8a71"></option>
                          <option style="color:black;background-color:#f6cd61;" value="f6cd61"></option>
                          <option style="color:black;background-color:#4a4e4d ;" value="4a4e4d "></option>
                          <option style="color:black;background-color:#83d0c9;" value="83d0c9"></option>
                          <option style="color:black;background-color:#7bc043;" value="7bc043"></option>
                          <option style="color:black;background-color:#1e1f26;" value="1e1f26"></option>
                          <option style="color:black;background-color:#283655;" value="283655"></option>
                          <option style="color:black;background-color:#aaaaaa;" value="aaaaaa"></option>
                          <option style="color:black;background-color:#88d8b0;" value="88d8b0"></option>
                          <option style="color:black;background-color:#3c2f2f;" value="3c2f2f"></option>
                          <option style="color:black;background-color:#be9b7b;" value="be9b7b"></option>
                          <option style="color:black;background-color:#FF1493;" value="FF1493"></option>
                          <option style="color:black;background-color:#CD1076;" value="CD1076"></option>
                          <option style="color:black;background-color:#FF83FA ;" value="FF83FA "></option>
                          <option style="color:black;background-color:#8A2BE2;" value="8A2BE2"></option>
                          <option style="color:black;background-color:#551A8B;" value="551A8B"></option>
                          <option style="color:black;background-color:#CAE1FF;" value="CAE1FF"></option>
                          <option style="color:black;background-color:#00FF7F;" value="00FF7F"></option>
                          <option style="color:black;background-color:#00FF7F;" value="00FF7F"></option>
                          <option style="color:black;background-color:#00FF00;" value="00FF00"></option>
                          <option style="color:black;background-color:#C0FF3E;" value="C0FF3E"></option>
                          <option style="color:black;background-color:#FFD700;" value="FFD700"></option>
                          <option style="color:black;background-color:#FFA500;" value="FFA500"></option>
                          <option style="color:black;background-color:#EE4000;" value="EE4000"></option>
                          <option style="color:black;background-color:#FF6347;" value="FF6347 "></option>
                          <option style="color:black;background-color:#8E388E;" value="8E388E"></option>
                          <option style="color:black;background-color:#71C671;" value="71C671"></option>
                          <option style="color:black;background-color:#F4A460;" value="F4A460"></option>
                          <option style="color:black;background-color:#308014;" value="308014"></option>
                          <option style="color:black;background-color:#00CED1;" value="00CED1"></option>
                          <option style="color:black;background-color:#00B2EE;" value="00B2EE"></option>
                          <option style="color:black;background-color:#9A32CD;" value="9A32CD"></option>
                          <option style="color:black;background-color:#E066FF;" value="E066FF"></option>





                        </select></td>

                        <th class="bg-<?php echo $COR; ?>" scope="row" style="width:7%"> <input onchange="gravar2('<?php echo $ID; ?>')" style="font-size:15px;color:black;" id="<?php echo $ID; ?>O" type="text" name="ORDEM" value="<?php echo $ORDEM; ?>" class="form-control" /></th>


                      <th class="bg-<?php echo $COR; ?>" scope="row" style="width:20%"> <input onchange="gravar2('<?php echo $ID; ?>')" style="font-size:15px;color:black;" id="<?php echo $ID; ?>N2" type="text" name="NOME" value="<?php echo $NOME; ?>" class="form-control" /></th>


                      <th class="bg-<?php echo $COR; ?>" scope="row" style="width:62%"> <input onchange="gravar2('<?php echo $ID; ?>')" style="font-size:15px;color:black;" id="<?php echo $ID; ?>D" type="text" name="DESCRICAO" value="<?php echo $DESCRICAO; ?>" class="form-control" <?PHP echo $AUTO; ?> /></th>


                      <td style="width:10%"> <select style="font-size:15px;background-color:<?php echo $COR_STATUS; ?>;color:white;font-size:12px;" onchange="gravar2('<?php echo $ID; ?>')" name="STATUS" id="<?php echo $ID; ?>S" class="form-control">
                          <option value="<?php echo $STATUS; ?>"><?php echo $STATUS; ?></option>

                          <option style="background-color:#5cb85c;color:white;" value="REALIZADO"><b>REALIZADO</b></option>  
                          <option style="background-color:#5cb85c;color:white;" value="CONFIRMADO"><b>CONFIRMADO</b></option>  
                          <option style="background-color:#5cb85c;color:white;" value="APROVADO"><b>APROVADO</b></option>
                          <option style="background-color:#5cb85c;color:white;" value="PAGO"><b>PAGO</b></option>
                          <option style="background-color:#0275d8;color:white;" value="AGUARDANDO"><b>AGUARDANDO</b></option>
                          <option style="background-color:#0275d8;color:white;" value="REAGENDAR"><b>REAGENDAR</b></option>

                          <option style="background-color:#f0ad4e;color:white;" value="EM ANÁLISE"><b>EM ANÁLISE</b></option>
                          <option style="background-color:#f0ad4e;color:white;" value="PAG PARCIAL"><b>PAG PARCIAL</b></option>
                          <option style="background-color:#f0ad4e;color:white;" value="EM ANDAMENTO"><b>EM ANDAMENTO</b></option>

                          <option style="background-color:#d9534f;color:white;" value="ATRASADO"><b>ATRASADO</b></option>
                          <option style="background-color:#d9534f;color:white;" value="PENDENTE"><b>PENDENTE</b></option>
                          <option style="background-color:#d9534f;color:white;" value="CANCELADO"><b>CANCELADO</b></option>
                          <option style="background-color:#d9534f;color:white;" value="NEGADO"><b>NEGADO</b></option>
                          <option style="background-color:#d9534f;color:white;" value="PARADO"><b>PARADO</b></option>




                        </select></td>

                      <?PHP if ($STATUS == "REALIZADO" or  $STATUS == "APROVADO"   or $STATUS == "PAGO" or $STATUS == "CONFIRMADO") { ?>

                        <th class="bg-<?php echo $COR; ?>" scope="row"> <input onchange="gravar2('<?php echo $ID; ?>')" style="width:87%;font-size:13px;background-color:#5cb85c;color:white;" id="<?php echo $ID; ?>DR" name="DATAR" type="DATE" value="<?php echo $DATA_REALIZADOX; ?>" class="form-control" /></th>


                        <th class="bg-<?php echo $COR; ?>" scope="row" id="<?php echo $ID; ?>DF" name="DATAF" type="DATE" value="<?php echo $DATAF; ?>" class="form-control"></th>

                        <th class="bg-<?php echo $COR; ?>" style="visibility: hidden;display:none;" scope="row" id="<?php echo $ID; ?>DI" type="DATE" name="DATAI" value="<?php echo $DATAI; ?>" class="form-control"> </th>


                        <?PHP $result10FF  =  mysqli_query($con, "SELECT * FROM notas_monday WHERE ID = '$ID'   ");

                        while ($linha = mysqli_fetch_array($result10FF)) {

                          $VISUALIZARX  = $linha["VISUALIZAR"];
                        }
                        if ($VISUALIZARX == 1) { ?>

                          <td style="width:3%;text-align: center;" class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=ntask&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&ID_QUADRO=<?php echo $ID_QUADRO; ?>&ID_ITEM=<?php echo $ID; ?>&CORY=<?php echo $CORY; ?>&BOTAO=ARQUIVAR" title="OCULTAR Registro." class="btn btn-primary"> <i style="font-size:15px;" class="fa">&#xf07b</i></a> </td>
                        <?PHP } else { ?>
                          <td style="width:3%;text-align: center;" class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=ntask&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&ID_QUADRO=<?php echo $ID_QUADRO; ?>&ID_ITEM=<?php echo $ID; ?>&CORY=<?php echo $CORY; ?>&BOTAO=ARQUIVAR" title="MOSTRAR Registro." class="btn btn-primary"> <i style="font-size:15px;" class="fa">&#xf07c</i></a> </td>

                        <?PHP } ?>
                      <?PHP  } else { ?>
                        <th class="bg-<?php echo $COR; ?>" scope="row" style="display:none;" id="<?php echo $ID; ?>DR" name="DATAR" type="DATE" value="<?php echo $DATA_REALIZADOX; ?>" class="form-control"></th>

                        <th class="bg-<?php echo $COR; ?>"> <input onchange="gravar2('<?php echo $ID; ?>')" style="width:87%;font-size:13px;" id="<?php echo $ID; ?>DI" type="DATE" name="DATAI" value="<?php echo $DATAI; ?>" class="form-control form-control-sm" /></th>

                        <th class="bg-<?php echo $COR; ?>"> <input onchange="gravar2('<?php echo $ID; ?>')" style="width:87%;font-size:13px;" id="<?php echo $ID; ?>DF" type="DATE" name="DATAF" value="<?php echo $DATAF; ?>" class="form-control form-control-sm" /></th>

                        <th style="width: 8%;">
                          <div class="progress" style="height:15px">
                            <div class="progress-bar bg-<?PHP echo $BT; ?>" role="progressbar" style="width: <?PHP echo $PORCENTAGEM; ?>%;" aria-valuenow="<?PHP echo $PORCENTAGEM; ?>" aria-valuemin="0" aria-valuemax="100"><?PHP echo $PORCENTAGEM; ?>%</div>
                          </div>
                        </th>

                      <?PHP } ?>

                      <input style="display:none;" id="<?php echo $ID; ?>ID" type="text" name="ID_QUADRO" value="<?php echo $ID_QUADRO; ?>" class="form-control" />

                      <input style="display:none;" id="ID_QUADROX" type="text" name="ID_QUADRO" value="<?php echo $ID_QUADRO; ?>" class="form-control" />

                      <input style="display:none;" id="CORY" type="text" name="CORY" value="<?php echo $CORY; ?>" class="form-control" />






                      <td style="width:3%;text-align: center;" class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=ntask&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&CORY=<?php echo $CORY; ?>&ID_QUADRO=<?php echo $ID_QUADRO; ?>&ID_ITEM=<?php echo $ID; ?>&PAG=<?php echo $PAG; ?>&BOTAO=EXCLUIR_ITEM" title="EXCLUIR Registro." class="btn btn-danger"> <i style="font-size:15px;" class="fa">&#xf1f8</i></a> </td>


                    </tr>

                  <?PHP     }
                  ?>
                  </tbody>
              </table>
              <ul class="pagination  justify-content-center">

              <?PHP 
               $ACTIVE1 = "";
               $ACTIVE2 = "";
               $ACTIVE3 = "";
               $ACTIVE4 = "";
               $ACTIVE5 = "";
          
              IF($PAG == 1){
               $ACTIVE1 = "active";
              }ELSE IF($PAG == 2){
                $ACTIVE2 = "active";
              } ELSE IF($PAG == 7){
                $ACTIVE7 = "active";
              } ELSE IF($PAG == 3){
                $ACTIVE3 = "active";
              } ELSE IF($PAG == 4){
                $ACTIVE4 = "active";
              } ELSE IF($PAG == 5){
                $ACTIVE5 = "active";
              } 
   ?>
    <li class="page-item <?PHP ECHO $ACTIVE1;?>"><a class="page-link" href="index.php?ACAO_MENU=ntask&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&CORY=<?php echo $CORY; ?>&ID_QUADRO=<?php echo $ID_QUADRO; ?>&PAG=1">1</a></li>
    <li class="page-item <?PHP ECHO $ACTIVE2;?>"><a class="page-link" href="index.php?ACAO_MENU=ntask&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&CORY=<?php echo $CORY; ?>&ID_QUADRO=<?php echo $ID_QUADRO; ?>&PAG=2">2</a></li>
    <li class="page-item <?PHP ECHO $ACTIVE3;?>"><a class="page-link" href="index.php?ACAO_MENU=ntask&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&CORY=<?php echo $CORY; ?>&ID_QUADRO=<?php echo $ID_QUADRO; ?>&PAG=3">3</a></li>
    <li class="page-item <?PHP ECHO $ACTIVE4;?>"><a class="page-link" href="index.php?ACAO_MENU=ntask&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&CORY=<?php echo $CORY; ?>&ID_QUADRO=<?php echo $ID_QUADRO; ?>&PAG=4">4</a></li>
    <li class="page-item <?PHP ECHO $ACTIVE5;?>"><a class="page-link" href="index.php?ACAO_MENU=ntask&NOME_QUADRO=<?php echo $NOME_QUADRO; ?>&CORY=<?php echo $CORY; ?>&ID_QUADRO=<?php echo $ID_QUADRO; ?>&PAG=5">5</a></li>
 

  </ul>

            </DIV>
          </DIV>
     

        </form>





  
  <?php
  }
  ?>





<form action="index.php" method="post" id="myForm">
        <div class="container-fluid">

          <div class="card-body">

      <center>
        <div onclick="window.location.href = 'index.php?ACAO_MENU=ntask' " class="p-2 mb-1 bg-dark text-white" style="background: url(grid.png),  linear-gradient( #343a40, black);text-align:center;border-radius:20px;font-size:16px;"><b>&nbsp&nbsp &nbsp&nbsp MENU DE PROJETOS &nbsp&nbsp </b>


          <td class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=ntask&BOTAO=CRIARNOVO" title="CRIAR Registro." class="btn btn-success"> <i style="font-size:15px;size:10px" class="fa"> &#xf067;</i></a> </td>



          </button>
        </div>
      </center>
      
 






            <table class="table table-striped table-dark table-sm table-hover" style="background: url(grid.png),  linear-gradient( #343a40, black);">
              <thead style="background: url(grid.png),  linear-gradient( #343a40, black);">

                <tr>
                  <th scope="col" style="text-align: CENTER;font-size:14px;">COR</th>
                  <th scope="col" style="text-align: CENTER;font-size:14px;">ORDEM</th>

                  <th style="text-align: center;font-size:14px;" scope="col">PROJETO</th>
                  <th style="text-align: center;font-size:14px;" scope="col">VISIBILIDADE</th>

                  <th style="text-align: center;font-size:14px;" scope="col">STATUS</th>

                  <th style="text-align: center;font-size:14px;" scope="col">ABRIR</th>

                  <th style="text-align: center;font-size:14px;" scope="col">EXCLUIR</th>



                </tr>
              </thead>

              <?php

$array = array();

$result10DD  =  mysqli_query($con, "SELECT * FROM acesso_monday WHERE RESPONSAVEL = '$usuario' ORDER BY ORDEM ");




while ($linha = mysqli_fetch_array($result10DD)) {



  $array = array();
  $ID_ACESSO  = $linha["ID"];
  $IDXX  = $linha["QUADRO"];
  $RESPONSAVEL1  = $linha["RESPONSAVEL"];
  $ORDEM_QUADRO  = $linha["ORDEM"];


  $result10DDX  =  mysqli_query($con, "SELECT * FROM acesso_monday WHERE QUADRO = '$IDXX' ");




  while ($linha = mysqli_fetch_array($result10DDX)) {


    $RESPONSAVEL  = $linha["RESPONSAVEL"];

    $array[] = $RESPONSAVEL;
  }

  $comma_separated = implode(" | ", $array);

  $result10  =  mysqli_query($con, "SELECT * FROM quadro_monday WHERE ID = '$IDXX' ");



  while ($linha = mysqli_fetch_array($result10)) {

    $ID  = $linha["ID"];


    $COR   = $linha["COR"];
    $NOME   = $linha["NOME"];



    $VERDE = 0;
    $VERMELHO = 0;
    $AMARELO = 0;
    $AZUL = 0;

    $CONT = 0;

                  $result10ccx  =  mysqli_query($con, "SELECT * FROM notas_monday WHERE QUADRO = '$ID' AND VISUALIZAR =1 ");


                  while ($linha = mysqli_fetch_array($result10ccx)) {


                    $STATUSX  = $linha["STATUS"];

                    $CONT = $CONT + 1;


                    if ($STATUSX == "REALIZADO") {
                      $VERDE = $VERDE + 1;
                    }

                    if ($STATUSX == "APROVADO") {
                      $VERDE = $VERDE + 1;
                    }
                    if ($STATUSX == "CONFIRMADO") {
                      $VERDE = $VERDE + 1;
                    }


                    if ($STATUSX == "PAGO") {
                      $VERDE = $VERDE + 1;
                    }


                    if ($STATUSX == "NEGADO") {
                      $VERMELHO = $VERMELHO + 1;
                    }
                    if ($STATUSX == "CANCELADO") {
                      $VERMELHO = $VERMELHO + 1;
                    }
                    if ($STATUSX == "EM ANDAMENTO") {
                      $AMARELO = $AMARELO + 1;
                    }
                      if ($STATUSX == "EM ANÁLISE") {
                      $AMARELO = $AMARELO + 1;
                    }
                    if ($STATUSX == "PARADO") {
                      $VERMELHO = $VERMELHO + 1;
                    }

                    if ($STATUSX == "ATRASADO") {
                      $VERMELHO = $VERMELHO + 1;
                    }

                    if ($STATUSX == "PENDENTE") {
                      $VERMELHO = $VERMELHO + 1;
                    }

                    if ($STATUSX == "AGUARDANDO") {
                      $AZUL = $AZUL + 1;
                    }
                    if ($STATUSX == "REAGENDAR") {
                      $AZUL = $AZUL + 1;
                    }
                    if ($STATUSX == "PAG PARCIAL") {
                      $AMARELO = $AMARELO + 1;
                    }
                  }





              ?>




                  <tbody style="background: linear-gradient( #f0f0f0, #f0f0f0);">
                    <tr>


                      <td draggable="true" style="background-color:#<?php echo $COR; ?>;width:1%"> <select style="background-color:transparent;color:white;font-size:15px;" onchange="gravar('<?php echo $ID; ?>')" name="COR" id="<?php echo $ID; ?>C" class="form-control">
                          <option value="<?php echo $COR; ?>"></option> 

                          <option style="color:black;background-color:#FF3399;width:40%;" value="FF3399"><?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></option>
                          <option style="color:black;background-color:#8d52eb;" value="8d52eb"></option>
                          <option style="color:black;background-color:#00ff00;" value="00ff00"></option>
                          <option style="color:black;background-color:#072a42;" value="072a42"></option>
                          <option style="color:black;background-color:#343a40;" value="343a40"></option>
                          <option style="color:black;background-color:#2acaea;" value="2acaea"></option>
                          <option style="color:black;background-color:#ffa500;" value="ffa500"></option>
                          <option style="color:black;background-color:#ffff00;" value="ffff00"></option>
                          <option style="color:black;background-color:#008000;" value="008000"></option>
                          <option style="color:black;background-color:#034f84;" value="034f84"></option>
                          <option style="color:black;background-color:#f7786b;" value="f7786b"></option>
                          <option style="color:black;background-color:#50394c;" value="50394c"></option>
                          <option style="color:black;background-color:#c0ded9;" value="c0ded9"></option>
                          <option style="color:black;background-color:#d4ac6e;" value="d4ac6e"></option>
                          <option style="color:black;background-color:#bd5734;" value="bd5734"></option>
                          <option style="color:black;background-color:#87bdd8;" value="87bdd8"></option>
                          <option style="color:black;background-color:#b7d7e8;" value="b7d7e8"></option>
                          <option style="color:black;background-color:#c83349;" value="c83349"></option>
                          <option style="color:black;background-color:#e06377;" value="e06377"></option>
                          <option style="color:black;background-color:#ffcc5c;" value="ffcc5c"></option>
                          <option style="color:black;background-color:#588c7e;" value="588c7e"></option>
                          <option style="color:black;background-color:#00688B;" value="00688B"></option>
                          <option style="color:black;background-color:#B2DFEE;" value="B2DFEE"></option>
                          <option style="color:black;background-color:#0099CC;" value="0099CC"></option>
                          <option style="color:black;background-color:#507786;" value="507786"></option>
                          <option style="color:black;background-color:#0198E1;" value="0198E1"></option>
                          <option style="color:black;background-color:#0D4F8B;" value="0D4F8B"></option>
                          <option style="color:black;background-color:#007FFF;" value="007FFF"></option>
                          <option style="color:black;background-color:#3B6AA0;" value="3B6AA0"></option>
                          <option style="color:black;background-color:#283A90;" value="283A90"></option>
                          <option style="color:black;background-color:#0000CD;" value="0000CD"></option>
                          <option style="color:black;background-color:#6600FF;" value="6600FF"></option>
                          <option style="color:black;background-color:#cc0000;" value="cc0000"></option>
                          <option style="color:black;background-color:#b20000;" value="b20000"></option>
                          <option style="color:black;background-color:#ff0000;" value="ff0000"></option>
                          <option style="color:black;background-color:#DB7093;" value="DB7093"></option>
                          <option style="color:black;background-color:#DC143C;" value="DC143C"></option>
                          <option style="color:black;background-color:#851e3e;" value="851e3e"></option>
                          <option style="color:black;background-color:#ffffff;" value="ffffff"></option>
                          <option style="color:black;background-color:#fe8a71;" value="fe8a71"></option>
                          <option style="color:black;background-color:#f6cd61;" value="f6cd61"></option>
                          <option style="color:black;background-color:#4a4e4d ;" value="4a4e4d "></option>
                          <option style="color:black;background-color:#83d0c9;" value="83d0c9"></option>
                          <option style="color:black;background-color:#7bc043;" value="7bc043"></option>
                          <option style="color:black;background-color:#1e1f26;" value="1e1f26"></option>
                          <option style="color:black;background-color:#283655;" value="283655"></option>
                          <option style="color:black;background-color:#aaaaaa;" value="aaaaaa"></option>
                          <option style="color:black;background-color:#88d8b0;" value="88d8b0"></option>
                          <option style="color:black;background-color:#3c2f2f;" value="3c2f2f"></option>
                          <option style="color:black;background-color:#be9b7b;" value="be9b7b"></option>
                          <option style="color:black;background-color:#FF1493;" value="FF1493"></option>
                          <option style="color:black;background-color:#CD1076;" value="CD1076"></option>
                          <option style="color:black;background-color:#FF83FA ;" value="FF83FA "></option>
                          <option style="color:black;background-color:#8A2BE2;" value="8A2BE2"></option>
                          <option style="color:black;background-color:#551A8B;" value="551A8B"></option>
                          <option style="color:black;background-color:#CAE1FF;" value="CAE1FF"></option>
                          <option style="color:black;background-color:#00FF7F;" value="00FF7F"></option>
                          <option style="color:black;background-color:#00FF7F;" value="00FF7F"></option>
                          <option style="color:black;background-color:#00FF00;" value="00FF00"></option>
                          <option style="color:black;background-color:#C0FF3E;" value="C0FF3E"></option>
                          <option style="color:black;background-color:#FFD700;" value="FFD700"></option>
                          <option style="color:black;background-color:#FFA500;" value="FFA500"></option>
                          <option style="color:black;background-color:#EE4000;" value="EE4000"></option>
                          <option style="color:black;background-color:#FF6347;" value="FF6347 "></option>
                          <option style="color:black;background-color:#8E388E;" value="8E388E"></option>
                          <option style="color:black;background-color:#71C671;" value="71C671"></option>
                          <option style="color:black;background-color:#F4A460;" value="F4A460"></option>
                          <option style="color:black;background-color:#308014;" value="308014"></option>
                          <option style="color:black;background-color:#00CED1;" value="00CED1"></option>
                          <option style="color:black;background-color:#00B2EE;" value="00B2EE"></option>
                          <option style="color:black;background-color:#9A32CD;" value="9A32CD"></option>
                          <option style="color:black;background-color:#E066FF;" value="E066FF"></option>



                        </select></td>

                        <input style="display:none;" id="<?php echo $ID; ?>IA" type="text" name="ID_ACESSO" value="<?php echo $ID_ACESSO; ?>" class="form-control" />

                        <th class="bg-<?php echo $COR; ?>" scope="row" style="width:2%"> <input onchange="gravar('<?php echo $ID; ?>')" style="font-size:15px;color:black;" id="<?php echo $ID; ?>OQ" type="text" name="ORDEM_QUADRO" value="<?php echo $ORDEM_QUADRO; ?>" class="form-control" /></th>


                      <th class="bg-<?php echo $COR; ?>" scope="row" style="width:15%"> <input onchange="gravar('<?php echo $ID; ?>')" style="font-size:15px;color:black;" id="<?php echo $ID; ?>N" type="text" name="NOME" value="<?php echo $NOME; ?>" class="form-control" /></th>

                      <td style="width:20%">

                        <select onchange="gravar('<?php echo $ID; ?>')" name="RESPONSAVEL" style="font-size:15px;" id="<?php echo $ID; ?>R" class="form-control">
                          <option value="<?php echo $RESPONSAVEL1; ?>"><?php echo $comma_separated; ?> </option>

                          <?PHP
                          $result10cc  =  mysqli_query($con, "SELECT * FROM acesso ORDER BY NOME ");


                          while ($linha = mysqli_fetch_array($result10cc)) {


                            $NOME  = $linha["NOME"];
                            $SINAL = "xf234";
                            $LETRA  = "GREEN";
                            $result10DDYY  =  mysqli_query($con, "SELECT * FROM acesso_monday WHERE RESPONSAVEL = '$NOME' AND QUADRO = '$ID'  ");

                            while ($linha = mysqli_fetch_array($result10DDYY)) {


                              $SINAL = "xf235";
                              $LETRA  = "RED";
                            }


                            $CORx = "white";

                            $cont = $cont + 1;

                            if ($cont % 2 == 0) {
                              $CORx = "#f0f0f0";
                            }

                          ?>
                            <option style="background-color:<?php echo $CORx ?>;color:<?php echo $LETRA ?>;font-size:20px;" value="<?PHP echo $USUARIO; ?>" class="fa">&#<?php echo $SINAL;
                                                                                                                                                                          echo "&nbsp";
                                                                                                                                                                          echo $USUARIO; ?></option>
                          <?PHP  } ?>
                        </select>


                      </td>


                      <td style="width:5%">
                        <div class="progress" style="height:20px">
                          <div class="progress-bar bg-success" role="progressbar" style="width: <?PHP echo $VERDE * 100; ?>%" aria-valuenow="<?PHP echo $VERDE; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          <div class="progress-bar bg-primary" role="progressbar" style="width: <?PHP echo $AZUL * 100; ?>%" aria-valuenow="<?PHP echo $VERDE; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          <div class="progress-bar bg-warning" role="progressbar" style="width: <?PHP echo $AMARELO * 100; ?>%" aria-valuenow="<?PHP echo $AMARELO; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          <div class="progress-bar bg-danger" role="progressbar" style="width: <?PHP echo $VERMELHO * 100; ?>%" aria-valuenow="<?PHP echo $VERMELHO; ?>" aria-valuemin="0" aria-valuemax="100"></div>





                        </div>
                      </td>



                      <td style="width:1%;text-align: center;" class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=ntask&ID_QUADRO=<?php echo $ID; ?>&CORY=<?php echo $COR; ?>&NOME_QUADRO=<?php echo $NOME; ?>" title="ABRIR Registro." class="btn btn-primary"> <i style="font-size:15px;" class="fa">&#xf0c9</i></a> </td>


                      <td style="width:1%;text-align: center;" class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=ntask&ID_ITEM=<?php echo $ID; ?>&BOTAO=EXCLUIR_QUADRO" title="ABRIR Registro." class="btn btn-danger"> <i style="font-size:15px;" class="fa">&#xf1f8</i></a> </td>


                    </tr>

                <?PHP     }
              }
                ?>
                  </tbody>
            </table>

          </DIV>


      </form>



    </div>
  </div>
  </div>





<?php
}  ?>