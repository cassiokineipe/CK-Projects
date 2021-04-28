
<?php



$array = array(2, 9, 9, 1);

$GX = gx($array[3], $array[1], $array[2], $array[0]);


if (!isset($_POST["NOME"])) {
    $_POST["NOME"] = "";
}

$NOME = $_POST["NOME"];

if (!isset($_POST["SENHA"])) {
    $_POST["SENHA"] = "";
}

$SENHA = $_POST["SENHA"];


if (!isset($_POST["BOTAO"])) {
    $_POST["BOTAO"] = "";
}

echo $BOTAO = $_POST["BOTAO"];

if ($BOTAO == "Delete") {
    mysqli_query($con, "DELETE FROM acesso WHERE NOME = '$USUARIOX'");


    session_destroy();


?>
    <meta http-equiv="refresh" content="0.0001; URL='logar.php '" /> <?php


                                                                    }


                                                                    if ($NOME != "" and $SENHA != "") {

                                                                        $SENHA = senha($SENHA, $GX);

                                                                        mysqli_query($con, "UPDATE acesso SET NOME='$NOME', SENHA = '$SENHA'   WHERE NOME = '$USUARIOX' ");
                                                                    }



                                                                        ?>




<center>
    <div class="my-2 mx-auto p-relative bg-dark shadow-1 blue-hover lua" style=" border-radius: 10px;background: url(./css/grid.png),  linear-gradient( #343a40,#343a40);">
        <div id="form-wrapper">
            <center>
                <div class="container-fluid">

                    <div class="card-body">


                        <hr style="background-color: red;">



                        <H2 style="color: red;">ALTERAR LOGIN</H2>

                        <hr style="background-color: red;">








                        <form action="index.php" method="post">

                            <input type="hidden" name="acao" value="logar" />
                            <div class="container-fluid">






                                <div class="card-body">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">



                                            <input type="text" name="NOME" VALUE="<?PHP echo $USUARIOX; ?>" class="form-control" placeholder="Name">




                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">


                                            <input type="password" name="SENHA" class="form-control" placeholder="Password">


                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">

                                        <div class="form-group col-md-6">


                                            <input style="text-align:center" type="submit" class="btn btn-danger mb-2" value="Change">

                                        </div>
                                        <div class="form-group col-md-6">


                                            <input style="text-align:center;color:red" type="submit" class="btn btn-light  mb-2" name="BOTAO" value="Delete">
                                            <input type="hidden" class="btn btn-light  mb-2" name="ACAO_MENU" value="usuario">

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