
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="./css/check-logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        CK Projects
    </a>
    <a href="deslogar.php" style="color: #ff6f00;" class="w3-bar-item w3-button fa fa-remove" title="Sair "><i></i></a>
</nav>

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

  if ($ACAO_MENU != "") {
    include "./$ACAO_MENU.php";
  } else {
?>

<br>
<form action="index.php" method="POST">

    <div class="w3-row-padding w3-margin-bottom ">


        <div class="w3-quarter" >
            <button name="ACAO_MENU" value="ntask" class="btn-block btn-dark  blue-hover" >
                <div class="w3-container w3-pink w3-padding-16   ">
                    <div><i class="fa fa-calendar-check-o w3-xxxlarge"></i></div>




                    <h5   >N-Task</h5>

                </div>

            </button>

        </div>






    


<div class="w3-quarter" >
    <button name="ACAO_MENU" value="contador_fodinha" class="btn-block btn-dark  blue-hover" >
        <div class="w3-container w3-green w3-padding-16   ">
            <div><i class="fa fa-list-ol w3-xxxlarge"></i></div>




            <h5>Contador De Fodinha</h5>

        </div>

    </button>

</div>






</div>
</form>

<?PHP } ?>