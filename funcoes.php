<?php
function data_ini_html5($dt)
{
  if ($dt == "0000-00-00") return '';
  $yr = strval(substr($dt, 0, 4));
  $mo = strval(substr($dt, 5, 2));
  $da = strval(substr($dt, 8, 2));

  $resul1 = "$yr" . "$mo" . "$da";
  return $resul1;
}


function inverteData($data)
{
    if (count(explode("/", $data)) > 1) {
        return implode("-", array_reverse(explode("/", $data)));
    } elseif (count(explode("-", $data)) > 1) {
        return implode("/", array_reverse(explode("-", $data)));
    }
}


function compara_data($data, $valor)
{

  $arrayx = str_split($data);

  while ($valor > 0) {
    $valor = $valor - 1;
    $arrayx[7] = $arrayx[7] + 1;


    if ($arrayx[7] >= 10) {
      $arrayx[7] = 0;
      $arrayx[6] = $arrayx[6] + 1;
    }




    if ($arrayx[6] >= 3) {
      $arrayx[5] = $arrayx[5] + 1;
      $arrayx[6] = $arrayx[6] - 3;



      if ($arrayx[5] >= 10) {
        $arrayx[4] = $arrayx[4] + 1;
        $arrayx[5] = 0;
      }

      if ($arrayx[4] == 1 and $arrayx[5] > 2) {
        $arrayx[3] = $arrayx[3] + 1;
        $arrayx[4] = 0;
        $arrayx[5] = 0;
      }
    }
  }

  $novadata = implode("", $arrayx);

  return $novadata;
}


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

?>