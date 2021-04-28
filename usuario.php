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

    p,
    h1 {
        margin: 0;
        padding: 0;
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








    /**Margin and padding utilities*/
    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .lua {
        width: 25%;
    }

    @media screen and (max-width: 450px) {
        .lua {
            width: 100%;
        }

    }
</style>
<?php
include "./funcao_login.php";


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