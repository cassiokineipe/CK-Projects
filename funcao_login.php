<?php

function busca_campo_tabela($tabela, $resultado, $campo, $consulta)
{

  $CAMPO = '';
  $rs9 = conexao::executar("select $resultado from $tabela WHERE $campo = '$consulta' ");
  while ($linha = mysqli_fetch_array($rs9)) {
    $CAMPO  = $linha["$resultado"];
  }

  if ($resultado == 'UNIDADE_TRIBUTADA' and $CAMPO == '') {
    $CAMPO = 'UN';
  }

  return $CAMPO;
}


////////////////////  CRIPTOGRAFA

function criptografia($RAZAO_SOCIAL_EMP, $MES, $ANO)
{

  if (strlen($MES) == 1) {
    $MES = "0" . $MES;
  }
  $data = "$MES.$ANO";

  $criptograf = "$data" . "$RAZAO_SOCIAL_EMP" . "$data";
  $criptograf = md5("$criptograf");

  return $criptograf;
}


/////////////////  VERIFICA CRIPTOGRAFIA , SE CHECK ON NÃO PASSADO RETORNA APENAS A MESMA SENHA 
////////////////  O MESMO EXISTE TAMBEM EM funcao_login.php
function senha($senha, $senha_check)
{
  if ($senha_check == -6) {
    $senha = $senha . '@$%#tesetsgydyç';
    $cod = md5($senha); // pega o valor passado pelo form e criptografa
    $senha = $cod . 'j2h3b4';
  }
  return $senha;
}


function gx($Z, $X, $W, $K)
{ //// codigo recursivo que precisa da entrada "tokyo" para retornar o valor certo e assim validar a funcao senha

  $X = $K - $X;
  $X = $X + $Z;

  if ($W >= 0) {
    return $X;
  }
  $Z = $W - 1;
  $W = $Z - 1;


  gx($K, $X, $W, $Z);
}



if (isset($_POST['acao']) && $_POST['acao'] == 'download_licenca') {

?>

  <div class="container-fluid">
    <div class="form-group col-md-4">


      <?php

      // Dados do servidor
      //$servidor = 'ftp.facilrapido.com.br'; // EndereÃ§o
      //$usuario = 'facilrapido'; // UsuÃ¡rio
      //$senha = 'asdf0987'; // Senha                                           

      // IP do Servidor FTP
      $servidor_ftp = 'ftp.facilrapido.com.br';
      $usuario_ftp = 'facilrap';
      $senha_ftp   = '0p9o8i7u¨Y';

      // define some variables 
      $local_file  = 'licenca.zip';
      $server_file = 'public_html/suporte/hexsoft/licenca/licenca.zip';

      // set up basic connection 
      $conn_id = ftp_connect($servidor_ftp);

      // login with username and password 
      $login_result = ftp_login($conn_id, $usuario_ftp, $senha_ftp);

      ftp_pasv($conn_id, true);

      $res = ftp_size($conn_id, $server_file);

      if ($res != -1) {
        echo "<br /><p style='color:#ffffff;'> <b>Tamanho do arquivo $res bytes.</b></p>";
      } else {
        echo "<br /><b>Não foi possivél obter o tamanho.</b>  " . '  ';
      }

      $velocidade_download_kb = 22;

      $tempo = $res / 1024;

      $tempo = $tempo / $velocidade_download_kb;

      //echo "<br /> $tempo " ;

      $tempo = intval("$tempo");

      echo  "<p style='color:#ffffff;'>.$tempo.s </p>  ";

      ?>

      <!-- HTML5 and Javascript Written By Adam Khoury @ DevelopPHP.com -->
      <progress id="progressBar" value="0" max="100" style="width:200px; height: 20px;"></progress>

      <span id="status"></span>
      <h1 id="finalMessage"></h1>

      <script type="text/javascript" language="javascript">
        function progressBarSim(al) {
          var bar = document.getElementById('progressBar');
          var status = document.getElementById('status');
          status.innerHTML = al + "%";
          bar.value = al;
          al++;
          var sim = setTimeout("progressBarSim(" + al + ")", <?php echo $tempo; ?>);
          if (al == 100) {
            status.innerHTML = "100%";
            bar.value = 100;
            clearTimeout(sim);
            var finalMessage = document.getElementById('finalMessage');
            finalMessage.innerHTML = "";
          }
        }
        var amountLoaded = 0;
        progressBarSim(amountLoaded);
      </script>

      <?php
      // try to download $server_file and save to $local_file  FTP_ASCII
      if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
        echo "<b><p style='color:#ffffff;'>Download da licença ok.</p></b> \n";
      } else {
        echo "<b>Problema do download da licença.</b> \n";
      }

      // close the connection 
      ftp_close($conn_id);

      if (file_exists('licenca.zip')) {
        $zip = new ZipArchive;
        if ($zip->open("licenca.zip") === TRUE) {
          $zip->extractTo("./");
          $zip->close();
          // echo "<br> Descompactação da Licença com Sucesso. <br>";
        }
        // echo " Feito Atualizações da Licença. ";
      }
      ?>

    </div>
  </div>


<?php }
