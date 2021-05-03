<script>
    function gravar(ID) {

      if(ID == 'RODADA'){

        var RODADA = document.getElementById('RODADA').value;
        window.location.href = "index.php?ACAO_MENU=contador_fodinha&RODADA=" + RODADA;

      }else{
      
        var VIDAS = document.getElementById(ID + 'V').value;
        var NOME = document.getElementById(ID + 'N').value;



        window.location.href = "index.php?ACAO_MENU=contador_fodinha&ID=" + ID + "&VIDAS=" + VIDAS+"&RODADA=" + RODADA + "&NOME=" + NOME + "&BOTAO=ALTERAR_DA_TABELA";

        
      }

  






    }
</script>


<?php

if (!isset($_GET["ID"])) {
    $_GET["ID"] = "";
}

$ID = $_GET["ID"];

if (!isset($_GET["NOME"])) {
    $_GET["NOME"] = "";
}

$NOME = $_GET["NOME"];

if (!isset($_GET["VIDAS"])) {
    $_GET["VIDAS"] = "";
}

$VIDAS = $_GET["VIDAS"];


if (!isset($_GET["BOTAO"])) {
    $_GET["BOTAO"] = "";
}

$BOTAO = $_GET["BOTAO"];

if (!isset($_GET["RODADA"])) {
    $_GET["RODADA"] = "";
}

$RODADA = $_GET["RODADA"];

IF($BOTAO == ""){
    
if (!isset($_POST["BOTAO"])) {
    $_POST["BOTAO"] = "";
}

$BOTAO = $_POST["BOTAO"];

}

if (!isset($_POST["VENCEDOR"])) {
    $_POST["VENCEDOR"] = "";
}

$VENCEDOR = $_POST["VENCEDOR"];


if ($BOTAO == "Recomeçar") {
    $DATA = date("Ymd");
    mysqli_query($con, "INSERT INTO historico_fodinha (ID,RESPONSAVEL,DATA,VENCEDOR)  VALUES ('','$USUARIOX','$DATA','$VENCEDOR')");
    mysqli_query($con, "UPDATE fodinha SET  VIDAS = 3  , RODADA=1 WHERE RESPONSAVEL = '$USUARIOX' ");
}

if ($BOTAO == "ALTERAR_DA_TABELA") {

    mysqli_query($con, "UPDATE fodinha SET NOME='$NOME', VIDAS = '$VIDAS'  WHERE ID = '$ID' ");
}
if ($RODADA != "") {
    $RODADA = $RODADA+1;
    mysqli_query($con, "UPDATE fodinha SET  RODADA = '$RODADA'   WHERE RESPONSAVEL = '$USUARIOX' ");
}


if ($BOTAO == "TIRAR") {
    $VIDAS = $VIDAS - 1;
    IF($VIDAS >= 0){
        mysqli_query($con, "UPDATE fodinha SET  VIDAS = '$VIDAS'   WHERE ID = '$ID' ");
    }
   
}
if ($BOTAO == "CRIARNOVO") {
  



    mysqli_query($con, "INSERT INTO fodinha (ID,RESPONSAVEL,NOME,VIDAS,RODADA)  VALUES ('','$USUARIOX','',3,1)");
}

if ($BOTAO == "EXCLUIR") {
    mysqli_query($con, "DELETE FROM fodinha WHERE ID = '$ID'");
}


$result10DD  =  mysqli_query($con, "SELECT * FROM fodinha WHERE RESPONSAVEL = '$USUARIOX' GROUP BY RODADA");




while ($linha = mysqli_fetch_array($result10DD)) {

    $RODADA  = $linha["RODADA"];

}

IF($BOTAO == "HISTORICO"){ ?>

<div class="container-fluid">

<div class="card-body">


<center>
                <div class="p-2 mb-1 bg-dark text-white" style="background: url(grid.png),  linear-gradient( #343a40, black);text-align:center;border-radius:20px;font-size:16px;"><b> Historico &nbsp&nbsp </b>

                    <td class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=contador_fodinha" title="voltar." class="btn btn-primary"> <i style="font-size:15px;size:10px" class="fa"> &#xf122;</i></a> </td>



                    </button>
                </div>
            </center>

    <table class="table table-striped table-dark table-sm table-hover" style="background: url(grid.png),  linear-gradient( #343a40, black);">
    <thead style="background: url(grid.png),  linear-gradient( #343a40, black);">

        <tr>

            <th style="text-align: center;font-size:14px;" scope="col">VENCEDOR</th>
            <th scope="col" style="text-align: CENTER;font-size:14px;">DATA</th>


        </tr>
    </thead>

    <?PHP

    $result10DD  =  mysqli_query($con, "SELECT * FROM historico_fodinha WHERE RESPONSAVEL = '$USUARIOX' ");




while ($linha = mysqli_fetch_array($result10DD)) {

    $VENCEDOR  = $linha["VENCEDOR"];
    $DATA  = $linha["DATA"];

    $d = $DATA;
       $DATA = substr($d, 0, 4) . '-' . substr($d, 4, 2) . '-' . substr($d, 6, 2);

    ?>


<tbody >
                        <tr>




                        <th scope="row"style="text-align:center"><?php echo $VENCEDOR; ?></th>
                        <td scope="row"style="text-align:center"><?php echo inverteData($DATA); ?></td>



                   

                        </tr>
<?PHP

}
}else{

?>


<form action="index.php" method="post" id="myForm">
    <div class="container-fluid">

        <div class="card-body">

            <center>
                <div class="p-2 mb-1 bg-dark text-white" style="background: url(grid.png),  linear-gradient( #343a40, black);text-align:center;border-radius:20px;font-size:16px;"><b> Rodada: &nbsp&nbsp </b>
               <input onclick="gravar('RODADA')" style="font-size:15px;color:black;width:45px;display:inline-block;text-align:center" id="RODADA" type="text" name="RODADA" value="<?PHP ECHO $RODADA;?>" class="form-control" />

                    <td class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=contador_fodinha&BOTAO=CRIARNOVO" title="Adicionar player." class="btn btn-success"> <i style="font-size:15px;size:10px" class="fa"> &#xf067;</i></a> </td>
                    <td class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=contador_fodinha&BOTAO=HISTORICO" title="Ver Historico." class="btn btn-primary"> <i style="font-size:15px;size:10px" class="fa"> &#xf02d;</i></a> </td>



                    </button>
                </div>
            </center>


            





            <table class="table table-striped table-dark table-sm table-hover" style="background: url(grid.png),  linear-gradient( #343a40, black);">
                <thead style="background: url(grid.png),  linear-gradient( #343a40, black);">

                    <tr>

                        <th style="text-align: center;font-size:14px;" scope="col">NOME</th>
                        <th scope="col" style="text-align: CENTER;font-size:14px;">VIDAS</th>



                        <th style="text-align: center;font-size:14px;" scope="col">-</th>



                        <th style="text-align: center;font-size:14px;" scope="col">EXCLUIR</th>



                    </tr>
                </thead>

                <?php

$CONT0 = 0;
$CONT = 0;
$VENCEDOR = "";
                $result10DD  =  mysqli_query($con, "SELECT * FROM fodinha WHERE RESPONSAVEL = '$USUARIOX' ORDER BY VIDAS DESC,NOME ");




                while ($linha = mysqli_fetch_array($result10DD)) {

                    $CONT = $CONT +1;



                    $ID  = $linha["ID"];

                    $NOME  = $linha["NOME"];
                    $VIDAS  = $linha["VIDAS"];

                    $COR = "success";
                    if ($VIDAS <= 0) {
                        $COR = "danger";
                        $CONT0 = $CONT0+1;
                        
                    }
                    if ($VIDAS == 1) {
                        $COR = "warning";
                    }
                    IF($VIDAS >= 1){
                        $VENCEDOR = $NOME;
                    }





                ?>




                    <tbody style="background: linear-gradient( #f0f0f0, #f0f0f0);">
                        <tr>




                            <th class="bg-<?php echo $COR; ?>" scope="row" style="width:70%"> <input onchange="gravar('<?php echo $ID; ?>')" style="font-size:15px;color:black;" id="<?php echo $ID; ?>N" type="text" name="NOME" value="<?php echo $NOME; ?>" class="form-control" autofocus autocomplete="off" /></th>

                            <th class="bg-<?php echo $COR; ?>" scope="row"> <input onchange="gravar('<?php echo $ID; ?>')" style="font-size:15px;color:black;" id="<?php echo $ID; ?>V" type="number" name="VIDAS" value="<?php echo $VIDAS; ?>" class="form-control "  autocomplete="off"/></th>




                            <td style="width:1%;text-align: center;" class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=contador_fodinha&VIDAS=<?php echo $VIDAS; ?>&ID=<?php echo $ID; ?>&BOTAO=TIRAR" title="ABRIR Registro." class="btn btn-primary"> <i style="font-size:15px;" class="fa">&#xf068</i></a> </td>


                            <td style="width:1%;text-align: center;" class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=contador_fodinha&ID=<?php echo $ID; ?>&BOTAO=EXCLUIR" title="ABRIR Registro." class="btn btn-danger" style="background-color: red;"> <i style="font-size:15px;" class="fa">&#xf1f8</i></a> </td>


                        </tr>

                    <?PHP     }

                    IF($CONT0+1 == $CONT and $CONT > 1){ ?>



<center>
    <div class="my-2 mx-auto  bg-dark shadow-1 blue-hover lua" style=" border-radius: 10px;background: url(./css/diagmonds-light.png),linear-gradient( #DAA520,#DAA520);position:static;">
        <div id="form-wrapper">
      
                <div class="container-fluid">

                    <div class="card-body">


                        <hr style="background-color: red;height:4px">



                        <H2 style="color: black;">VENCEDOR: <b><?PHP ECHO $VENCEDOR;?></b> </H2>

                        <hr style="background-color: red;height:4px">

                        <form action="index.php" method="post">

                       
                            <div class="container-fluid">

                                <div class="card-body">

                          
                                    <br>
                                    <div class="form-row">

                                        <div class="form-group col-md-12">


                                            <input style="text-align:center" type="submit" name="BOTAO" value="Recomeçar" class="btn btn-danger mb-2" >
                                            <input style="text-align:center" type="hidden" name="VENCEDOR" value="<?PHP ECHO $VENCEDOR;?>" class="btn btn-danger mb-2" >
                                            <input style="text-align:center" type="hidden" name="ACAO_MENU" value="contador_fodinha" class="btn btn-danger mb-2" >
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

    </div>  </center>


<script>
   var audio = new Audio('./css/wining.mp3');
         audio.play();

</script>

               <?PHP     }

                    ?>
                    </tbody>
            </table>

        </DIV>


</form>

<?php } ?>