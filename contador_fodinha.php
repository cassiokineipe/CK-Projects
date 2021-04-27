<script>
    function gravar(ID) {





        var VIDAS = document.getElementById(ID + 'V').value;
        var NOME = document.getElementById(ID + 'N').value;



        window.location.href = "index.php?ACAO_MENU=contador_fodinha&ID=" + ID + "&VIDAS=" + VIDAS + "&NOME=" + NOME + "&BOTAO=ALTERAR_DA_TABELA";

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


if ($BOTAO == "ALTERAR_DA_TABELA") {

    mysqli_query($con, "UPDATE fodinha SET NOME='$NOME', VIDAS = '$VIDAS'   WHERE ID = '$ID' ");
}


if ($BOTAO == "TIRAR") {
    $VIDAS = $VIDAS - 1;
    mysqli_query($con, "UPDATE fodinha SET  VIDAS = '$VIDAS'   WHERE ID = '$ID' ");
}
if ($BOTAO == "CRIARNOVO") {
    $DATA = date("Ymd");



    mysqli_query($con, "INSERT INTO fodinha (ID,DATA,RESPONSAVEL,NOME,VIDAS)  VALUES ('','$DATA','$USUARIOX','',3)");
}

if ($BOTAO == "EXCLUIR") {
    mysqli_query($con, "DELETE FROM fodinha WHERE ID = '$ID'");
}

?>


<form action="index.php" method="post" id="myForm">
    <div class="container-fluid">

        <div class="card-body">

            <center>
                <div class="p-2 mb-1 bg-dark text-white" style="background: url(grid.png),  linear-gradient( #343a40, black);text-align:center;border-radius:20px;font-size:16px;"><b>&nbsp&nbsp &nbsp&nbsp Contador Fodinha &nbsp&nbsp </b>


                    <td class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=contador_fodinha&BOTAO=CRIARNOVO" title="Adicionar player." class="btn btn-success"> <i style="font-size:15px;size:10px" class="fa"> &#xf067;</i></a> </td>



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

                $result10DD  =  mysqli_query($con, "SELECT * FROM fodinha WHERE RESPONSAVEL = '$USUARIOX' ORDER BY VIDAS DESC,NOME ");




                while ($linha = mysqli_fetch_array($result10DD)) {



                    $ID  = $linha["ID"];

                    $NOME  = $linha["NOME"];
                    $VIDAS  = $linha["VIDAS"];

                    $COR = "success";
                    if ($VIDAS <= 0) {
                        $COR = "danger";
                    }
                    if ($VIDAS == 1) {
                        $COR = "warning";
                    }




                ?>




                    <tbody style="background: linear-gradient( #f0f0f0, #f0f0f0);">
                        <tr>




                            <th class="bg-<?php echo $COR; ?>" scope="row" style="width:70%"> <input onchange="gravar('<?php echo $ID; ?>')" style="font-size:15px;color:black;" id="<?php echo $ID; ?>N" type="text" name="NOME" value="<?php echo $NOME; ?>" class="form-control" /></th>

                            <th class="bg-<?php echo $COR; ?>" scope="row"> <input onchange="gravar('<?php echo $ID; ?>')" style="font-size:15px;color:black;" id="<?php echo $ID; ?>V" type="number" name="VIDAS" value="<?php echo $VIDAS; ?>" class="form-control" /></th>




                            <td style="width:1%;text-align: center;" class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=contador_fodinha&VIDAS=<?php echo $VIDAS; ?>&ID=<?php echo $ID; ?>&BOTAO=TIRAR" title="ABRIR Registro." class="btn btn-primary"> <i style="font-size:15px;" class="fa">&#xf068</i></a> </td>


                            <td style="width:1%;text-align: center;" class="bg-<?php echo $COR; ?>"> <a href="index.php?ACAO_MENU=contador_fodinha&ID=<?php echo $ID; ?>&BOTAO=EXCLUIR" title="ABRIR Registro." class="btn btn-danger" style="background-color: red;"> <i style="font-size:15px;" class="fa">&#xf1f8</i></a> </td>


                        </tr>

                    <?PHP     }

                    ?>
                    </tbody>
            </table>

        </DIV>


</form>