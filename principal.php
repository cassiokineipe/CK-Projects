<div class="w3-bar w3-top w3-black w3-large" style="z-index:4;background: url(grid.png),  linear-gradient( #343a40, black);">
<span class="w3-bar-item w3-left ">
<a href="index.php">
<font style="font-size: 25px;" class="lua " >CK Projects</font>

</span></a>
<a href="index.php" style="background-color:transparent;color:#e62020;top:10px;position:relative" class="w3-bar-item w3-right w3-button fa fa-home  fa-fw"></a>

<a href="#" style="background-color:transparent;color:#e62020;top:10px;position:relative" class="w3-bar-item w3-button w3-right fa fa-cog fa-fw"></a>

<a href="deslogar.php" style="background-color:transparent;color:#e62020;top:10px;position:relative" class="w3-bar-item  w3-right w3-button fa fa-remove" title="Sair "></a>
     
   
  </div>
<br>
<br>
<br>
<?php



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


if ($ACAO_MENU != "" and $ACAO_MENU != "Portifolio") {
    include "./$ACAO_MENU.php";
} else if ($ACAO_MENU != "" and $ACAO_MENU == "Portifolio") {


?>
    <meta http-equiv="refresh" content="0.0001; URL='./Portifolio/home.html'" /> <?php
                                                                                } else {
                                                                                    ?>

    <br>
    <form action="index.php" method="POST">

        <div class="w3-row-padding w3-margin-bottom  " >


            <div class="w3-quarter " >
                <button name="ACAO_MENU" value="ntask" class="btn-block btn-dark  blue-hover">
                    <div class="w3-container w3-pink w3-padding-16   ">
                        <div><i class="fa fa-calendar-check-o w3-xxxlarge"></i></div>




                        <h5>N-Task</h5>

                    </div>

                </button>

            </div>









            <div class="w3-quarter ">
                <button name="ACAO_MENU" value="contador_fodinha" class="btn-block btn-dark  blue-hover">
                    <div class="w3-container w3-green w3-padding-16   ">
                        <div><i class="fa fa-list-ol w3-xxxlarge"></i></div>




                        <h5>Contador De Fodinha</h5>

                    </div>

                </button>

            </div>

            <div class="w3-quarter ">
                <button name="ACAO_MENU" value="Portifolio" class="btn-block btn-dark  blue-hover">
                    <div class="w3-container w3-purple w3-padding-16   ">
                        <div><i class="fa fa-address-card-o w3-xxxlarge"></i></div>




                        <h5>Meu Portifolio</h5>

                    </div>

                </button>

            </div>

            <div class="w3-quarter ">
                <button name="ACAO_MENU" value="" class="btn-block btn-dark  blue-hover">
                    <div class="w3-container w3-blue w3-padding-16   ">
                        <div><i class="fa fa-angellist w3-xxxlarge"></i></div>




                        <h5>Coming Soon</h5>

                    </div>

                </button>

            </div>


        </div>
    </form>

<?PHP } ?>