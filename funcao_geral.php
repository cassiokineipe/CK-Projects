<?php



////////////  PEDIDOS_GERAR_XML
function busca_na_tabela($tabela, $resultado, $campo, $consulta, $con)
{

    $CAMPO = '';


    $result10  =  mysqli_query($con, "select $resultado from $tabela WHERE $campo = '$consulta'");
    while ($linha = mysqli_fetch_array($result10)) {

        $CAMPO   = $linha["$resultado"];


        return $CAMPO;
    }
}



function so_numero($string)
{

    return preg_replace('/[^a-zA-Z0-9_ -]/s', '', $string); // Removes special chars.
}





function inverteData($data)
{
    if (count(explode("/", $data)) > 1) {
        return implode("-", array_reverse(explode("/", $data)));
    } elseif (count(explode("-", $data)) > 1) {
        return implode("/", array_reverse(explode("-", $data)));
    }
}



function certificado_calculo_media($CERTIFICADO_REAL, $LOTE)
{


    $DIVIDIDO = 0;
    $media_SILICIO   = 0;
    $media_FERRO     = 0;
    $media_COBRE     = 0;
    $media_MANGANES  = 0;
    $media_MAGNESIO  = 0;
    $media_CROMO     = 0;
    $media_NIQUEL    = 0;
    $media_ZINCO     = 0;
    $media_ESTANHO   = 0;
    $media_TITANIO   = 0;
    $media_CHUMBO    = 0;
    $media_CALCIO    = 0;
    $media_ESTRONCIO = 0;
    $media_ALUMINIO  = 0;
    $media_FS        = 0;
    $media_FE_MN     = 0;
    $media_TOTAL     = 0;




    $result11  = conexao::executar("SELECT * FROM certificado_analises where CERTIFICADO = '$CERTIFICADO_REAL' AND LOTE='$LOTE' ");
    while ($linha = mysqli_fetch_array($result11)) {
        $CODIGO       = $linha["CODIGO"];
        $CERTIFICADO  = $linha["CERTIFICADO"];
        $LOTE1         = $linha["LOTE"];
        $SILICIO      = $linha["SILICIO"];
        $FERRO        = $linha["FERRO"];
        $COBRE        = $linha["COBRE"];
        $MANGANES     = $linha["MANGANES"];
        $MAGNESIO     = $linha["MAGNESIO"];
        $CROMO        = $linha["CROMO"];
        $NIQUEL       = $linha["NIQUEL"];
        $ZINCO        = $linha["ZINCO"];
        $ESTANHO      = $linha["ESTANHO"];
        $TITANIO      = $linha["TITANIO"];
        $CHUMBO       = $linha["CHUMBO"];
        $CALCIO       = $linha["CALCIO"];
        $ESTRONCIO    = $linha["ESTRONCIO"];
        $ALUMINIO     = $linha["ALUMINIO"];
        $FS           = $linha["FS"];
        $FE_MN        = $linha["FE_MN"];
        $TOTAL        = $linha["TOTAL"];
        $ARQUIVO      = $linha["ARQUIVO"];
        $EMAIL        = $linha["EMAIL"];
        $KG           = $linha["KG"];



        $media_SILICIO   = $media_SILICIO   + str_replace(",", ".", $SILICIO);
        $media_FERRO     = $media_FERRO     + str_replace(",", ".", $FERRO);
        $media_COBRE     = $media_COBRE     + str_replace(",", ".", $COBRE);
        $media_MANGANES  = $media_MANGANES  + str_replace(",", ".", $MANGANES);
        $media_MAGNESIO  = $media_MAGNESIO  + str_replace(",", ".", $MAGNESIO);
        $media_CROMO     = $media_CROMO     + str_replace(",", ".", $CROMO);
        $media_NIQUEL    = $media_NIQUEL    + str_replace(",", ".", $NIQUEL);
        $media_ZINCO     = $media_ZINCO     + str_replace(",", ".", $ZINCO);
        $media_ESTANHO   = $media_ESTANHO   + str_replace(",", ".", $ESTANHO);
        $media_TITANIO   = $media_TITANIO   + str_replace(",", ".", $TITANIO);
        $media_CHUMBO    = $media_CHUMBO    + str_replace(",", ".", $CHUMBO);
        $media_CALCIO    = $media_CALCIO    + str_replace(",", ".", $CALCIO);
        $media_ESTRONCIO = $media_ESTRONCIO + str_replace(",", ".", $ESTRONCIO);
        $media_ALUMINIO  = $media_ALUMINIO  + str_replace(",", ".", $ALUMINIO);
        $media_FS        = $media_FS        + str_replace(",", ".", $FS);
        $media_FE_MN     = $media_FE_MN     + str_replace(",", ".", $FE_MN);
        $media_TOTAL     = $media_TOTAL     + str_replace(",", ".", $TOTAL);


        $DIVIDIDO++;
    }

    $media_SILICIO   = $media_SILICIO   / $DIVIDIDO;
    $media_FERRO     = $media_FERRO     / $DIVIDIDO;
    $media_COBRE     = $media_COBRE     / $DIVIDIDO;
    $media_MANGANES  = $media_MANGANES  / $DIVIDIDO;
    $media_MAGNESIO  = $media_MAGNESIO  / $DIVIDIDO;
    $media_CROMO     = $media_CROMO     / $DIVIDIDO;
    $media_NIQUEL    = $media_NIQUEL    / $DIVIDIDO;
    $media_ZINCO     = $media_ZINCO     / $DIVIDIDO;
    $media_ESTANHO   = $media_ESTANHO   / $DIVIDIDO;
    $media_TITANIO   = $media_TITANIO   / $DIVIDIDO;
    $media_CHUMBO    = $media_CHUMBO    / $DIVIDIDO;
    $media_CALCIO    = $media_CALCIO    / $DIVIDIDO;
    $media_ESTRONCIO = $media_ESTRONCIO / $DIVIDIDO;
    $media_ALUMINIO  = $media_ALUMINIO  / $DIVIDIDO;
    $media_FS        = $media_FS        / $DIVIDIDO;
    $media_FE_MN     = $media_FE_MN     / $DIVIDIDO;
    $media_TOTAL     = $media_TOTAL     / $DIVIDIDO;


    $IS_CROMO    = (float) str_replace(",", ".", substr($CROMO, 0, 5))   * 3;
    $IS_MANGANES = (float) str_replace(",", ".", substr($MANGANES, 0, 5))   * 2;
    $IS          = str_replace(".", ",", (float) str_replace(",", ".", substr($FERRO, 0, 5)) + $IS_MANGANES + $IS_CROMO);

    $FE_MN =    str_replace(".", ",", (float) str_replace(",", ".", substr($MANGANES, 0, 5)) / (float) str_replace(",", ".", substr($FERRO, 0, 5)));

    $ARQUIVO = busca_campo_tabela('certificado_analises', 'ARQUIVO', 'LOTE', $LOTE);

    $media_SILICIO    = str_replace(".", ",", $media_SILICIO);
    $media_FERRO      = str_replace(".", ",", $media_FERRO);
    $media_COBRE      = str_replace(".", ",", $media_COBRE);
    $media_MANGANES   = str_replace(".", ",", $media_MANGANES);
    $media_MAGNESIO   = str_replace(".", ",", $media_MAGNESIO);
    $media_CROMO      = str_replace(".", ",", $media_CROMO);
    $media_NIQUEL     = str_replace(".", ",", $media_NIQUEL);
    $media_ZINCO      = str_replace(".", ",", $media_ZINCO);
    $media_TITANIO    = str_replace(".", ",", $media_TITANIO);
    $media_CALCIO     = str_replace(".", ",", $media_CALCIO);
    $media_CHUMBO     = str_replace(".", ",", $media_CHUMBO);
    $media_ESTANHO    = str_replace(".", ",", $media_ESTANHO);
    $media_ESTRONCIO  = str_replace(".", ",", $media_ESTRONCIO);
    $media_ALUMINIO   = str_replace(".", ",", $media_ALUMINIO);

    $media_FS      = str_replace(".", ",", $media_FS);
    $media_FE_MN   = str_replace(".", ",", $media_FE_MN);
    $media_TOTAL   = str_replace(".", ",", $media_TOTAL);

    //////////////  RECRIO TUDO
    conexao::executar("INSERT INTO `certificado_media` VALUES (NULL,'$CERTIFICADO','$LOTE','$media_SILICIO','$media_FERRO','$media_COBRE','$media_MANGANES','$media_MAGNESIO','$media_CROMO','$media_NIQUEL','$media_ZINCO','$media_TITANIO','$media_CHUMBO','$media_CALCIO','$media_ESTANHO','$media_ESTRONCIO','$media_ALUMINIO','$IS','$FE_MN' ,'$media_TOTAL','$TOTAL','$ARQUIVO','$EMAIL','$KG')");
}



function quantidade_total_certificado_analises($CERTIFICADO)
{
    $SOMA = 0;
    $rs4 = conexao::executar("select KG from certificado_lotes WHERE CERTIFICADO = '$CERTIFICADO'  ");
    while ($linha = mysqli_fetch_array($rs4)) {
        $KG = $linha["KG"];



        $SOMA = $SOMA + $KG;
    }

    ////////  BUSCA KG_REAL DE CADA LOTE E SOMA TUDO DO FORNO RB

    return  intval($SOMA);
}


function lotes_certificado($CERTIFICADO)
{
    $LOTES = '';
    // $rs4 = conexao::executar("SELECT * FROM certificado_lotes WHERE CERTIFICADO = '$CERTIFICADO'  GROUP BY LOTE ORDER BY CODIGO");

    $rs4 = conexao::executar("SELECT * FROM certificado_lotes WHERE CERTIFICADO = '$CERTIFICADO'  ORDER BY CODIGO");
    while ($linha = mysqli_fetch_array($rs4)) {
        $LOTE = $linha["LOTE"];



        $LOTES = $LOTES . ' | ' . $LOTE;
    }

    $LOTES =   $LOTES . ' | ';

    ////////  BUSCA KG_REAL DE CADA LOTE E SOMA TUDO DO FORNO RB

    return  $LOTES;
}


function certificado_analises($CERTIFICADO)
{
    $LOTES = '';

    $rs4 = conexao::executar("SELECT * FROM certificado_analises WHERE CERTIFICADO = '$CERTIFICADO'  ORDER BY CODIGO");


    while ($linha = mysqli_fetch_array($rs4)) {
        $LOTE = $linha["LOTE"];



        $LOTES = $LOTES . ' | ' . $LOTE;
    }

    $LOTES =   $LOTES . ' | ';

    ////////  BUSCA KG_REAL DE CADA LOTE E SOMA TUDO DO FORNO RB

    return  $LOTES;
}




function busca_quantidade_lancamentos($TABELA, $LOTE, $CAMPO, $MATERIAL_FUNCAO)
{
    $SOMA = 0;
    $rs4 = conexao::executar("select $CAMPO from $TABELA WHERE LOTE = '$LOTE' AND $CAMPO='$MATERIAL_FUNCAO'  ");
    while ($linha = mysqli_fetch_array($rs4)) {
        $KG_REAL = $linha["$CAMPO"];



        $SOMA = $SOMA + 1;
    }

    ////////  BUSCA KG_REAL DE CADA LOTE E SOMA TUDO DO FORNO RB

    return  intval($SOMA);
}


function soma_kg_lote_expedicao($LOTE, $CAMPO)
{
    $SOMA = 0;
    $rs4 = conexao::executar("select $CAMPO from expedicao WHERE LOTE = '$LOTE' ");
    while ($linha = mysqli_fetch_array($rs4)) {
        $KG_REAL = $linha["$CAMPO"];



        $SOMA = $SOMA + floatval(virgula_ponto($KG_REAL));
    }

    ////////  BUSCA KG_REAL DE CADA LOTE E SOMA TUDO DO FORNO RB

    return  intval($SOMA);
}


// LIGA CAMPO=Si_min $NOVO=filter_input(INPUT_POST,'Si_min')
function alteracao_liga($LIGA, $CAMPO, $NOVO)
{

    $ANTERIOR = busca_campo_tabela('ligas', $CAMPO, 'LIGA', $LIGA);

    if ($ANTERIOR <> $NOVO) {
        $VALOR = $NOVO;

        $DATA = date('Ymd');
        $HORA = date("H:i");

        $usuario_hex     = $_SESSION['usuario_hex'];

        $COMUNICADO = 'INFORMANDO LIGA: ' . $LIGA . ' FOI ALTERADO COMPOSIÇÃO ' . $CAMPO . ' PARA ' . $NOVO . '%';

        ///////  GRAVAR COMUNICADO REFERENTE A ALTERAÇÃO COMPOSIÇÃO DA LIGA
        conexao::executar("INSERT INTO comunicado (CODIGO,USUARIO,DATA,HORA,COMUNICADO,TIPO,CONFIRMADO) VALUES  (NULL,'$usuario_hex','$DATA','$HORA','$COMUNICADO','PÚBLICO','')");
    } else {
        $VALOR = $ANTERIOR;
    }

    return  $VALOR;
}




function mostra_liga_receita($LIGA, $LOTE, $RECEITA, $MATERIAL)
{  ?>

    <div class="table-responsive" style="margin:0.2em 0em 0em 0em; ">

        <table class="table table-sm table-hover table-bordered  table-striped" style="margin:0em;">
            <tr class="cabeca">
                <td style="margin:0.1em; padding:0.2em 0.5em 0.2em 0.5em; text-align:center; vertical-align:middle; font-size: 0.9em; font-weight: normal;">LIGA</td>
                <td style="margin:0.1em; padding:0.2em 0.5em 0.2em 0.5em; text-align:center; vertical-align:middle; font-size: 0.9em; font-weight: normal;">RECEITA</td>
                <td style="margin:0.1em; padding:0.2em 0.5em 0.2em 0.5em; text-align:center; vertical-align:middle; font-size: 0.9em; font-weight: normal;">MATERIAL DA RECEITA</td>
                <td style="margin:0.1em; padding:0.2em 0.5em 0.2em 0.5em; text-align:center; vertical-align:middle; font-size: 0.9em; font-weight: normal;">RENDIMENTO</td>
                <td style="margin:0.1em; padding:0.2em 0.5em 0.2em 0.5em; text-align:center; vertical-align:middle; font-size: 0.9em; font-weight: normal;">KG</td>
                <td style="margin:0.1em; padding:0.2em 0.5em 0.2em 0.5em; text-align:center; vertical-align:middle; font-size: 0.9em; font-weight: normal;">FLUXO TOTAL</td>
                <td style="margin:0.1em; padding:0.2em 0.5em 0.2em 0.5em; text-align:center; vertical-align:middle; font-size: 0.9em; font-weight: normal;" class="td_cen_print"><i class="icon ion-close-circled size-12"></i></td>
            </tr>
            <?php

            $SOMA1 = 0;



            if ($MATERIAL == '' and $RECEITA <> '') {
                $rs = conexao::executar("SELECT * FROM liga_receita WHERE LIGA = '$LIGA' AND RECEITA = '$RECEITA'  order by CODIGO ");


                while ($linha = mysqli_fetch_array($rs)) {

                    $CODIGO     = $linha["CODIGO"];
                    $LIGA       = $linha["LIGA"];
                    $RECEITA    = $linha["RECEITA"];
                    $DATA       = $linha["DATA"];
                    $OPERADOR   = $linha["OPERADOR"];
                    $MATERIAL   = $linha["MATERIAL"];
                    $RENDIMENTO = $linha["RENDIMENTO"];
                    $KG         = $linha["KG"];
                    $FLUXO_TOTAL = $linha["FLUXO_TOTAL"];


                    $SOMA1 = $SOMA1 + $KG;

                    /*
                * <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  ><?php echo $LOTE  ; ?></td>
                  <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  ><?php echo $LIGA  ; ?></td>
                * 
                */

            ?>
                    <tr>
                        <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"><?php echo $LIGA; ?></td>
                        <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"><?php echo $RECEITA; ?></td>
                        <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"><?php echo $MATERIAL; ?></td>
                        <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"><?php echo $RENDIMENTO . ' %'; ?></td>
                        <td style="text-align:right; margin:0.1em; padding:0.1em; vertical-align:middle;"><?php echo peso_for($KG); ?></td>
                        <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"><?php echo $FLUXO_TOTAL . ' %'; ?></td>
                        <td style="text-align:center;  margin:0.1em; padding:0.1em; vertical-align:middle;" class="td_cen_print"><a href="index.php?opc=pre_producao_cadastrar&codigo=<?php echo $CODIGO; ?>&tabela=pre_producao&lote=<?php echo $LOTE; ?>&liga=<?php echo $LIGA; ?>&receita=<?php echo $RECEITA; ?>&acao=excluir_receita" title="Excluir Registro"><i class="icon ion-close-circled size-12"></i></a></td>
                    </tr>

            <?php }
            } ?>

        </table>

        <table class="table table-sm table-hover table-bordered" style="margin:0.2em 0em 0em 0em; ">
            <tr>
                <td style="margin:0.1em;  text-align:center; vertical-align:middle; font-size: 1em; font-weight: normal;"><b>
                        <?php if ($RECEITA <> '') { ?> <a href="index.php?opc=pre_producao_cadastrar&codigo=<?php echo $CODIGO; ?>&tabela=pre_producao&lote=<?php echo $LOTE; ?>&liga=<?php echo $LIGA; ?>&receita=<?php echo $RECEITA; ?>&acao=gravar_receita_pre_producao" title="Gravar Receita na Produção">GRAVAR PRÉ PRODUÇÃO</a><?php } ?></b></td>
                <td style="margin:0.1em;  text-align:center; vertical-align:middle; font-size: 1em; font-weight: normal;">TOTAL MATÉRIA KG : <b> <?php echo peso_for($SOMA1); ?></b></td>
            </tr>
        </table>


    </div>

<?php }


function busca_rendimento_real_forno_rb($LOTE)
{
    $SOMA = 0;
    $rs4 = conexao::executar("select KG_REAL from forno_rb WHERE LOTE = '$LOTE' ");
    while ($linha = mysqli_fetch_array($rs4)) {
        $KG_REAL = $linha["KG_REAL"];

        $SOMA = $SOMA + $KG_REAL;
    }

    ////////  BUSCA KG_REAL DE CADA LOTE E SOMA TUDO DO FORNO RB

    return $SOMA;
}


function busca_total_kg_forno_rb($LOTE)
{
    $SOMA = 0;
    $rs4 = conexao::executar("select KG from forno_rb WHERE LOTE = '$LOTE' AND TIPO = 'MATERIAL' ");
    while ($linha = mysqli_fetch_array($rs4)) {
        $KG = $linha["KG"];

        $SOMA = $SOMA + $KG;
    }

    ////////  BUSCA KG_REAL DE CADA LOTE E SOMA TUDO DO FORNO RB

    return $SOMA;
}


function busca_primeiro_lancamento_forno($LOTE, $CAMPO, $TABELA)
{
    $$CAMPO = '00:00';
    $rs4 = conexao::executar("select $CAMPO from $TABELA WHERE LOTE = '$LOTE' ORDER BY CODIGO ASC LIMIT 1 ");  //////// BUSCA PRIMEIRO LANÇAMENTO DO LOTE
    while ($linha = mysqli_fetch_array($rs4)) {
        $CAMPO = $linha["$CAMPO"];
    }

    ////////  BUSCA KG_REAL DE CADA LOTE E SOMA TUDO DO FORNO RB

    return $CAMPO;
}




function busca_media_dois_numeros($num_min, $num_max)
{

    $SOMA = 0;

    $num_min =  str_replace(",", ".", $num_min);
    $num_max =  str_replace(",", ".", $num_max);


    if ($num_min == '') {
        $num_min = 0;
    }
    if ($num_max == '') {
        $num_max = 0;
    }


    @$SOMA = ($num_min + $num_max);

    @$SOMA = bcdiv(@$SOMA, '2', 2); ///// DIVIDE POR DOIS E FAZ DUAS CASAS DECIMAIS

    // $valor = bcmul($valor, '100', 2); //Multiplicação

    $SOMA =  str_replace(".", ",", $SOMA);

    //  $SOMA =   number_format($SOMA, 2, '.', '');

    return $SOMA;
}









function busca_lote_expedicao($lote)
{   ?>

    <table class="table table-sm table-hover table-bordered " style="margin:0em;">

        <tr class="cabeca">
            <td style="text-align:center; font-size: 0.9em; font-weight: normal;">EXPEDIÇÃO</td>
            <td style="text-align:center; font-size: 0.9em; font-weight: normal;"></td>
        </tr>

        <?php

        $rs9 = conexao::executar("select *  from expedicao where LOTE = '$lote'  ");
        while ($linha = mysqli_fetch_array($rs9)) {
            $CODIGO   = $linha["CODIGO"];
            $DATA     = $linha["DATA"];
            $HORA     = $linha["HORA"];
            $OPERADOR = $linha["OPERADOR"];
            $LIGA     = $linha["LIGA"];
            $SUB_LIGA = $linha["SUB_LIGA"];
            $LOTE     = $linha["LOTE"];
            $LOTE_KG = $linha["LOTE_KG"];
            $RETALHO_KG = $linha["RETALHO_KG"];
            $STATUS = $linha["STATUS"];

        ?>

            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>DATA HORA: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo data_for($DATA) . '  Hrs:' . $HORA; ?></b></td>
            </tr>
            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>OPERADOR: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo $OPERADOR; ?></b></td>
            </tr>
            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>LOTE: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo $LOTE; ?></b></td>
            </tr>

            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>LIGA: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo $LIGA; ?></b></td>
            </tr>

            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>SUB.LIGA: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo $SUB_LIGA; ?></b></td>
            </tr>

            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>LOTE KG: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo peso_for($LOTE_KG); ?></b></td>
            </tr>

            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>RETALHO KG: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo peso_for($RETALHO_KG); ?></b></td>
            </tr>


        <?php } ?>
    </table>
<?php } ?>



<?php


function busca_media_rendimento($MATERIAL, $lote, $tipo)
{
    $SOMA = '';
    $RENDIMENTO = '';

    ///////////  BUSCA TODOS MATERIAIS IGUAI DO LOTE ESPECIFICO
    $rs5 = conexao::executar("select RENDIMENTO from forno_rb where MATERIAL_FUNCAO = '$MATERIAL' AND LOTE = '$lote' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $RENDIMENTO  = $linha["RENDIMENTO"];


        $SOMA  .= ':' . $RENDIMENTO;
    }

    // echo $SOMA ;

    // ESTE E O SOMA
    // :80:80:80 

    $SOMA = substr($SOMA, 1);


    if ($tipo == 'MATERIAL') {
        $RENDIMENTO = calcula_media_porcentagem($SOMA);
    } else {
        $RENDIMENTO = '';
    }
    return $RENDIMENTO;
}




function calcula_media_porcentagem($valores)
{
    /// pega as porcentagens adiciona ex: 80% =  1.80 SE TIVER OUTRO VALOR PORCENTAGEM  75%  1.75
    //                                    soma   1.80 + 1.75 = 3,55 / 2  = 1,775 - 1 = 0,775% = 77% resultado

    $quant    = 0;
    $porc     = 'PORC_';
    $calcular = 0;
    $valor    = 0;
    $result   = 0;
    $inteiro  = '1.';

    ////////  CONTA QUANTOS : TEM EXEMPLO   // :80:80:80 
    $quant = substr_count($valores, ':');

    $var = explode(':', $valores);

    // O LAÇO FOR E USADO PARA MOSTRAR TODOS OS VALORES 80 NO CASO 3
    for ($x = 0; $x <= $quant; $x++) {

        // CRIA UMA VARIAVEL $PORC_1 $PORC_2  $PORC_3     
        ${$porc . $x}    = $var[$x];

        //echo ${$porc.$x} ."<br>" ;

        $valor = $inteiro . ${$porc . $x};  // CRIA A PORCENTAR VALOR 1.80
        $calcular = $calcular +  $valor;
    }

    $quant = $quant + 1;

    $result =  $calcular / $quant;

    // echo $result ."<br>" ;

    $result = number_format($result, 2, '.', '');

    if (strlen(substr($result, 2)) == 1) {

        $result = substr($result, 2) . '0%';
    } else {
        $result = substr($result, 2) . '%';
    }

    return $result;
}






function buscar_fluxo_consumo_lote($lote)
{

    $KG = '';

    $rs5 = conexao::executar("select KG from forno_rb where MATERIAL_FUNCAO = 'FLUXO' AND LOTE = '$lote' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $KG  = $linha["KG"];
    }

    return $KG;
}



function buscar_rendimento_material_funcao($rendimento, $material)
{



    if ($rendimento == '') {

        $rs5 = conexao::executar("select RENDIMENTO from material_funcao where MATERIAL = '$material' ");
        while ($linha = mysqli_fetch_array($rs5)) {
            $rendimento  = $linha["RENDIMENTO"];
        }
    }

    return $rendimento;
}

function buscar_ordem_programacao($tabela)
{

    $ORDEM = '';

    $rs5 = conexao::executar("select ORDEM from $tabela ORDER BY CODIGO ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $ORDEM  = $linha["ORDEM"];

        $ORDEM = $ORDEM + 1;
    }


    if ($ORDEM == '') {
        $ORDEM = '1';
    }

    return $ORDEM;
}


function buscar_lote_programacao($tabela)
{
    $ANO = date('y');
    $LOTE = $ANO . '0000';

    $rs5 = conexao::executar("select LOTE from $tabela ORDER BY CODIGO ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $LOTE  = $linha["LOTE"];
    }

    $LOTE++;

    return $LOTE;
}





function buscar_lote_expedicao_avulsa($tabela)
{

    $lote_new = '';

    $rs5 = conexao::executar("select LOTE from $tabela ORDER BY CODIGO ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $LOTE  = $linha["LOTE"];
    }

    $lote_ant = explode('/', $LOTE);

    $ano       = $lote_ant[1];
    $lote_new  = $lote_ant[0];

    $lote_new = $lote_new + 1;

    $lote_new = str_pad($lote_new, 4, "0", STR_PAD_LEFT);

    //echo strlen($lote_new);




    if ($lote_new == '') {
        $lote_new = '0001';
    }

    $ano = '00';

    return $lote_new . '/' . $ano;
}


function minutohora($minutos)
{
    $hora = floor($minutos / 60);
    $resto = $minutos % 60;

    if (strlen($resto) == '1') {
        $resto = '0' . $resto;
    }

    // return $hora.':'.$resto. ' Hrs' ;

    return $hora . ':' . $resto;
}
?>

<?php function somaHora($hora1, $hora2)
{

    $h1 = explode(":", $hora1);
    $h2 = explode(":", $hora2);

    ///$segundo = $h1[2] + $h2[2];
    $minuto  = $h1[1] + $h2[1];
    $horas   = $h1[0] + $h2[0];
    $dia       = 0;

    //  if ($segundo > 59) {

    //     $segundodif = $segundo - 60;
    //   $segundo = $segundodif;
    //$minuto = $minuto + 1;
    // }

    if ($minuto > 59) {

        $minutodif = $minuto - 60;
        $minuto = $minutodif;
        $horas = $horas + 1;
    }

    /* 
 	if($horas > 24){
 		
 		$num = 0;
 		
 	 	(int)$num = $horas / 24;
 	  	$horaAtual = (int)$num * 24;
		$horasDif = $horas - $horaAtual;
 		
 		$horas = $horasDif;				
 		
 		for($i = 1; $i <= (int)$num; $i++){ 		 			
 			$dia +=  1 ;
 		}	 	 		
	}*/

    if (strlen($horas) == 1) {
        $horas = "0" . $horas;
    }
    if (strlen($minuto) == 1) {
        $minuto = "0" . $minuto;
    }
    //   if (strlen($segundo) == 1) {
    ///   $segundo = "0" . $segundo;
    //    }

    //	return  $dia.":".$horas.":".$minuto.":".$segundo;

    return  $horas . ":" . $minuto;
}

function soma_entre_horas($hora1, $hora2)
{

    $hora1 = explode(":", $hora1);
    $hora2 = explode(":", $hora2);
    $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60);
    $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60);
    $resultado = $acumulador2 - $acumulador1;
    $hora_ponto = floor($resultado / 3600);
    $resultado = $resultado - ($hora_ponto * 3600);
    $min_ponto = floor($resultado / 60);
    $resultado = $resultado - ($min_ponto * 60);
    $secs_ponto = $resultado;
    //Grava na variável resultado final


    if ($hora_ponto < 0) {
        $hora_ponto = 24 +  $hora_ponto;
    }

    if (strlen($hora_ponto) == 1) {
        $hora_ponto = '0' . $hora_ponto;
    }
    if (strlen($min_ponto) == 1) {
        $min_ponto = '0' . $min_ponto;
    }

    // echo $hora_ponto .':'. $min_ponto ;  

    return  "$hora_ponto" . ':' . "$min_ponto";
}


?>



<?php function busca_lote_consumo($lote)
{   ?>

    <table class="table table-sm table-hover table-bordered " style="margin:0em;">

        <tr class="cabeca">
            <td style="text-align:center; font-size: 0.9em; font-weight: normal;">CONSUMO LOTE</td>
            <td style="text-align:center; font-size: 0.9em; font-weight: normal;"></td>
        </tr>

        <?php

        $rs9 = conexao::executar("select *  from lote_consumo where LOTE = '$lote'  ");
        while ($linha = mysqli_fetch_array($rs9)) {
            $CODIGO = $linha["CODIGO"];
            $DATA = $linha["DATA"];
            $HORA = $linha["HORA"];
            $LOTE = $linha["LOTE"];
            $CONSUMO_GN = $linha["CONSUMO_GN"];
            $CONSUMO_O2 = $linha["CONSUMO_O2"];
            $TIPO_ESCORIA = $linha["TIPO_ESCORIA"];
            $OPERADOR = $linha["OPERADOR"];
            $STATUS = $linha["STATUS"];

        ?>

            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>DATA HORA: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo data_for($DATA) . '  Hrs:' . $HORA; ?></b></td>
            </tr>
            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>OPERADOR: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo $OPERADOR; ?></b></td>
            </tr>
            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>FLUXO: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo peso_for(buscar_fluxo_consumo_lote($LOTE)); ?></b></td>
            </tr>
            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>LOTE: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo $LOTE; ?></b></td>
            </tr>

            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>CONSUMO GN: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo $CONSUMO_GN; ?></b></td>
            </tr>

            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>CONSUMO O2: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo $CONSUMO_O2; ?></b></td>
            </tr>

            <tr>
                <td style="text-align:left;   font-size: 0.9em; font-weight: normal;"><b>TIPO ESCÓRIA: </b></td>
                <td style="text-align:center; font-size: 0.9em; font-weight: normal;"><b><?php echo $TIPO_ESCORIA; ?></b></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>


<?php


function total_lote($LOTE, $LIGA, $HOJE)
{

    $rs43 = conexao::executar("SELECT * FROM estoque WHERE LOTE = '$LOTE' AND LIGA = '$LIGA' AND DATA = '$HOJE'  ");

    $LOTE_KG_RS = 0;
    $RESULTADO = '';
    while ($linha = mysqli_fetch_array($rs43)) {


        $CODIGO        = $linha["CODIGO"];
        $CODIGO_BARRAS = $linha["CODIGO_BARRAS"];
        $DATA          = $linha["DATA"];
        $HORA          = $linha["HORA"];
        $OPERADOR      = $linha["OPERADOR"];
        $PROTHEUS      = $linha["PROTHEUS"];
        $LIGA          = $linha["LIGA"];
        $LOTE          = $linha["LOTE"];
        $LOTE_KG       = $linha["LOTE_KG"];


        $LOTE_KG_RS = $LOTE_KG_RS + $LOTE_KG;


        $RESULTADO .= '   
                  <tr>                              
                           <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  >' . $PROTHEUS . '</td> 
                           <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  >' . $LIGA . '</td>
                           <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  >' . $LOTE . '</td>
                           <td style="text-align:right; margin:0.1em; padding:0.1em; vertical-align:middle;"  >' . $LOTE_KG . '</td>                         
                           <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;" class="td_cen_print" ><a href="index.php?opc=expedicao_estoque&codigo=' . $CODIGO . '&acao=excluir&tabela=expedicao&lote=' . $LOTE . '&liga=' . $LIGA . '"  title="Excluir Registro" ><i class="icon ion-close-circled size-12" ></i></a></td>                           
                  </tr>   ';
    }

    $RESULTADO .= '          
                        <tr>                              
                             <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  ></td> 
                             <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  ></td> 
                             <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  ><b>' . $LOTE . '</b></td> 
                             <td style="text-align:right; margin:0.1em; padding:0.1em; vertical-align:middle;"  ><b>' . $LOTE_KG_RS . '</b></td>  
                             <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;" class="td_cen_print" ></td>     
                        </tr>';

    $RESULTADO .= '          
                        <tr>                              
                             <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  ><br></td> 
                             <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  ><br></td> 
                             <td style="text-align:center; margin:0.1em; padding:0.1em; vertical-align:middle;"  ><br></td> 
                             <td style="text-align:right; margin:0.1em; padding:0.1em; vertical-align:middle;"   ><br></td> 
                             <td style="text-align:right; margin:0.1em; padding:0.1em; vertical-align:middle;" class="td_cen_print"  ><br></td>  
                        </tr>';

    $LOTE_KG_RS = 0;

    return $RESULTADO;
}



function buscar_status_forno($lote, $tabela)
{

    $STATUS = '';

    $rs5 = conexao::executar("select STATUS from $tabela WHERE LOTE = '$lote' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $STATUS  = $linha["STATUS"];
    }

    return $STATUS;
}




function Corretor_Ortografico($valor)
{

    $valor = trim($valor); ///////// REMOVE ESPAÇOS EM BRANCO NO INICIO E FINAL DA STRING
    if ($valor == 'Producao') {
        $valor = 'Produção';
    }  // links nos select comeã com letra Maiuscula
    if ($valor == 'PRODUCAO') {
        $valor = 'PRODUÇÃO';
    }
    if ($valor == 'Funcionarios') {
        $valor = 'Funcionários';
    }
    if ($valor == 'Servicos') {
        $valor = 'Serviços';
    }
    if ($valor == 'Atualizacao') {
        $valor = 'Atualização';
    }
    if ($valor == 'producao') {
        $valor = 'PRODUÇÃO';
    } // Corretor em qualquer posição
    if ($valor == 'PRODUCAO') {
        $valor = 'PRODUÇÃO';
    } // Corretor em qualquer posição
    if ($valor == 'PREVISAO') {
        $valor = 'PREVISÃO';
    }
    if ($valor == 'CODIGO') {
        $valor = 'CÓDIGO';
    }
    if ($valor == 'CONCLUIDO') {
        $valor = 'CONCLUÍDO';
    }
    if ($valor == 'INFORMACOES') {
        $valor = 'INFORMAÇÕES';
    }
    if ($valor == 'Licenca') {
        $valor = 'Licença';
    }
    if ($valor == 'LICENCA') {
        $valor = 'LICENÇA';
    }
    if ($valor == 'Configuracoes') {
        $valor = 'Configurações';
    }
    if ($valor == 'CONFIGURACOES') {
        $valor = 'CONFIGURAÇÕES';
    }
    if ($valor == 'USUARIO') {
        $valor = 'USUÁRIO';
    }
    if ($valor == 'Usuario') {
        $valor = 'Usuário';
    }
    if ($valor == 'Usuarios') {
        $valor = 'Usuários';
    }
    if ($valor == 'Previsao') {
        $valor = 'Previsão';
    }
    if ($valor == 'Pais') {
        $valor = 'País';
    }
    if ($valor == 'PAIS') {
        $valor = 'PAÍS';
    }
    if ($valor == 'INSCRICAO') {
        $valor = 'INSCRIÇÃO';
    }
    if ($valor == 'ENDERECO') {
        $valor = 'ENDEREÇO';
    }
    if ($valor == 'DATA_EMISSAO') {
        $valor = 'DATA_EMISSÃO';
    }
    if ($valor == 'DATA_SAIDA') {
        $valor = 'DATA_SAÍDA';
    }
    if ($valor == 'SERIE') {
        $valor = 'SÉRIE';
    }
    if ($valor == 'EMPRESA_USUARIO_INICIO') {
        $valor = 'EMPRESA_USUÁRIO_INÍCIO';
    }
    if ($valor == 'PRODUCAO_NO_PEDIDO') {
        $valor = 'PRODUÇÃO NO PEDIDO';
    }
    if ($valor == 'CODIGO_NOTA_FISCAL') {
        $valor = 'CÓDIGO NOTA FISCAL';
    }
    if ($valor == 'DATA_EMISSÃO') {
        $valor = 'DATA EMISSÃO';
    }
    if ($valor == 'CPF_CNPJ') {
        $valor = 'CPF CNPJ';
    }
    if ($valor == 'VALOR_TOTAL_PRODUTO') {
        $valor = 'VALOR TOTAL PRODUTO';
    }
    if ($valor == 'VALOR_TOTAL_NOTA') {
        $valor = 'VALOR TOTAL NOTA';
    }

    if ($valor == 'Expedicao') {
        $valor = 'Expedição';
    }

    if ($valor == 'A_PAGAR') {
        $valor = 'A PAGAR';
    }
    if ($valor == 'CODIGO_PEDIDO') {
        $valor = 'CÓDIGO PEDIDO';
    }
    if ($valor == 'CODIGO_FORNECEDOR') {
        $valor = 'CÓDIGO FORNECEDOR';
    }
    if ($valor == 'CODIGO_CLIENTE') {
        $valor = 'CÓDIGO CLIENTE';
    }
    if ($valor == 'CODIGO_PRODUTO') {
        $valor = 'CÓDIGO PRODUTO';
    }
    if ($valor == 'CODIGO_PRODUCAO') {
        $valor = 'CÓDIGO PRODUÇÃO';
    }
    if ($valor == 'padrao') {
        $valor = 'Padrão';
    }
    if ($valor == 'Homologacao') {
        $valor = 'Homologação';
    }
    if ($valor == 'RELATORIO') {
        $valor = 'RELATÓRIO';
    }
    if ($valor == 'UNICO') {
        $valor = 'ÚNICO';
    }
    if ($valor == 'INICIO') {
        $valor = 'INÍCIO';
    }
    if ($valor == 'TRIBUTACAO') {
        $valor = 'TRIBUTAÇÃO';
    }
    if ($valor == 'DESCRICAO') {
        $valor = 'DESCRIÇÃO';
    }
    if ($valor == 'PLANO_CONTAS') {
        $valor = 'PLANO CONTAS';
    }
    if ($valor == 'OBS_ATUALIZACAO') {
        $valor = 'OBS.ATUALIZAÇÃO';
    }
    if ($valor == 'CODIGO_PAGAMENTO') {
        $valor = 'CODIGO PAGAMENTO';
    }
    if ($valor == 'A_RECEBER') {
        $valor = 'A RECEBER';
    }
    if ($valor == 'OPERACAO') {
        $valor = 'OPERAÇÃO';
    }
    if ($valor == 'NATUREZA_OPERACAO') {
        $valor = 'NATUREZA OPERAÇÃO';
    }
    if ($valor == 'RAZAO') {
        $valor = 'RAZÃO';
    }
    if ($valor == 'RAZAO_SOCIAL') {
        $valor = 'RAZÃO SOCIAL';
    }
    if ($valor == 'SERVICO') {
        $valor = 'SERVIÇO';
    }
    if ($valor == 'DISCRIMINACAO') {
        $valor = 'DISCRIMINAÇÃO';
    }
    if ($valor == 'DEDUCOES') {
        $valor = 'DEDUÇÕES';
    }
    if ($valor == 'INCIDENCIA') {
        $valor = 'INCIDÊNCIA';
    }
    if ($valor == 'NUMERO') {
        $valor = 'NÚMERO';
    }
    if ($valor == 'EMISSAO') {
        $valor = 'EMISSÃO';
    }
    if ($valor == 'MES') {
        $valor = 'MÊS';
    }
    if ($valor == 'SEQUENCIA') {
        $valor = 'SEQUÊNCIA';
    }
    if ($valor == 'FONE_1') {
        $valor = 'FONE 1';
    }
    if ($valor == 'FONE_2') {
        $valor = 'FONE 2';
    }
    if ($valor == 'FONE_3') {
        $valor = 'FONE 3';
    }
    if ($valor == 'FONE_4') {
        $valor = 'FONE 4';
    }
    if ($valor == 'FONE_5') {
        $valor = 'FONE 5';
    }
    if ($valor == 'CODIGO_SERVICO') {
        $valor = 'CODIGO SERVIÇO';
    }
    if ($valor == 'COBRAR_MES') {
        $valor = 'COBRAR MÊS';
    }
    if ($valor == 'INFORMAR_MES') {
        $valor = 'INFORMAR MÊS';
    }
    if ($valor == 'NOME_PRODUTO') {
        $valor = 'NOME PRODUTO';
    }
    if ($valor == 'VALOR_VENDA') {
        $valor = 'VALOR VENDA';
    }
    if ($valor == 'FATOR_LOTES') {
        $valor = 'FATOR LOTES';
    }
    if ($valor == 'SERVICOS') {
        $valor = 'SERVIÇOS';
    }
    if ($valor == 'USUARIOS') {
        $valor = 'USUÁRIOS';
    }
    if ($valor == 'UNITARIO') {
        $valor = 'UNITÁRIO';
    }
    if ($valor == 'ALTERACAO') {
        $valor = 'ALTERACÃO';
    }
    if ($valor == 'ULTIMA') {
        $valor = 'ÚLTIMA';
    }
    if ($valor == 'PROMOCAO') {
        $valor = 'PROMOÇÃO';
    }
    if ($valor == 'PONTUACAO') {
        $valor = 'PONTUAÇÃO';
    }
    if ($valor == 'CLASSIFICACAO') {
        $valor = 'CLASSIFICAÇÃO';
    }
    if ($valor == 'IMAGEM_1') {
        $valor = 'IMAGEM 1';
    }
    if ($valor == 'IMAGEM_2') {
        $valor = 'IMAGEM 2';
    }
    if ($valor == 'CLASS_VISUAL') {
        $valor = 'CLASS.VISUAL';
    }
    if ($valor == 'CLASS_METAL') {
        $valor = 'CLASS.METAL.';
    }
    if ($valor == 'PADRAO') {
        $valor = 'PADRÃO';
    }
    if ($valor == 'servicos') {
        $valor = 'Serviços';
    }
    if ($valor == 'receber') {
        $valor = 'Receber';
    }
    if ($valor == 'pagar') {
        $valor = 'Pagar';
    }
    if ($valor == 'entrada') {
        $valor = 'Entrada';
    }
    if ($valor == 'fiscal') {
        $valor = 'Fiscal';
    }
    if ($valor == 'VALOR_CUSTO') {
        $valor = 'VALOR CUSTO';
    }
    if ($valor == 'UNIDADE_COMPRA') {
        $valor = 'UNIDADE COMPRA';
    }
    if ($valor == 'direta') {
        $valor = 'Direta';
    }
    if ($valor == 'UNIDADE_VENDA') {
        $valor = 'UNIDADE VENDA';
    }

    if ($valor == 'DATA_LICENCA') {
        $valor = 'DATA LICENÇA';
    }
    if ($valor == 'NF_PRODUTO') {
        $valor = 'NF PRODUTO';
    }
    if ($valor == 'NF_SERVICO') {
        $valor = 'NF SERVIÇO';
    }
    if ($valor == 'DATA_EMISSAO_RPS') {
        $valor = 'DATA EMISSÃO RPS';
    }
    if ($valor == 'DETALHES_SERVICO') {
        $valor = 'DETALHES SERVIÇO';
    }
    if ($valor == 'DESCRICAO_SERVICO') {
        $valor = 'DESCRIÇÃO SERVIÇO';
    }
    if ($valor == 'PRESTADOR_SERVICO') {
        $valor = 'PRESTADOR SERVIÇO';
    }
    if ($valor == 'CARACTERISTICAS_1950') {
        $valor = 'CARACTERÍSTICAS 1950';
    }
    if ($valor == 'CARACTERISTICAS') {
        $valor = 'CARACTERÍSTICAS';
    }
    if ($valor == 'NUMERO_PARCELA') {
        $valor = 'NÚMERO PARCELA';
    }
    if ($valor == 'NUMERO') {
        $valor = 'NÚMERO';
    }
    if ($valor == 'NFE_TIPO') {
        $valor = 'NFE TIPO';
    }

    if ($valor == 'DATA_MOVIMENTO') {
        $valor = 'DATA MOVIMENTO';
    }
    if ($valor == 'DATA_PROCESSAMENTO') {
        $valor = 'DATA PROCESSAMENTO';
    }

    if ($valor == 'NOTA_FISCAL') {
        $valor = 'NOTA FISCAL';
    }
    if ($valor == 'VALOR_PAGO') {
        $valor = 'VALOR PAGO';
    }
    if ($valor == 'NOME_CONTA') {
        $valor = 'NOME CONTA';
    }
    if ($valor == 'NUMERO_BANCO') {
        $valor = 'NUMERO BANCO';
    }
    if ($valor == 'NOME_BANCO') {
        $valor = 'NOME BANCO';
    }
    if ($valor == 'AGENCIA') {
        $valor = 'AGÊNCIA';
    }
    if ($valor == 'AGENCIA_DIG') {
        $valor = 'AGÊNCIA DIG';
    }
    if ($valor == 'CONTA_DIG') {
        $valor = 'CONTA DIG';
    }
    if ($valor == 'PAI_FILHO') {
        $valor = 'PAI FILHO';
    }
    if ($valor == 'NOME_CATEGORIA') {
        $valor = 'NOME CATEGORIA';
    }

    if ($valor == 'DATA_HORA') {
        $valor = 'DATA HORA';
    }
    if ($valor == 'METRO_FAVORITO') {
        $valor = 'METRO FAVORITO';
    }
    if ($valor == 'MENU_PRINCIPAL') {
        $valor = 'MENU PRINCIPAL';
    }
    if ($valor == 'CODIGO_BARRA') {
        $valor = 'CODIGO BARRA';
    }

    if ($valor == 'TOTAL_SER_PRODUZIDO') {
        $valor = 'TOTAL SER PRODUZIDO';
    }
    if ($valor == 'MEDIA_PRODUCAO_DIARIA') {
        $valor = 'MÉDIA PRODUÇÃO DIÁRIA';
    }
    if ($valor == 'DIAS_UTEIS') {
        $valor = 'DIAS ÚTEIS';
    }
    if ($valor == 'DATA_CALCULADA') {
        $valor = 'DATA CALCULADA';
    }
    if ($valor == 'UTEIS') {
        $valor = 'ÚTEIS';
    }
    if ($valor == 'MEDIA') {
        $valor = 'MÉDIA';
    }
    if ($valor == 'DIARIA') {
        $valor = 'DIÁRIA';
    }

    if ($valor == 'SUB_LIGA') {
        $valor = 'SUB LIGA';
    }

    if ($valor == 'SUB_TOTAL') {
        $valor = 'SUB TOTAL';
    }

    if ($valor == 'CODIGO_VENDEDOR') {
        $valor = 'CODIGO VENDEDOR';
    }

    if ($valor == 'modelo') {
        $valor = 'Modelo';
    }

    if ($valor == 'MARCA_MODELO') {
        $valor = 'MARCA MODELO';
    }

    if ($valor == 'NUMERO_SERIE') {
        $valor = 'NÚMERO SÉRIE';
    }

    if ($valor == 'FUNCIONARIO') {
        $valor = 'FUNCIONÁRIO';
    }

    if ($valor == 'FUNCIONARIOS') {
        $valor = 'FUNCIONÁRIOS';
    }

    if ($valor == 'DEMISSAO') {
        $valor = 'DEMISSÃO';
    }

    if ($valor == 'SALARIO') {
        $valor = 'SALÁRIO';
    }

    if ($valor == 'MUNICIPIO') {
        $valor = 'MUNICÍPIO';
    }

    if ($valor == 'CODIGO_MUNICIPIO') {
        $valor = 'CÓDIGO MUNICÍPIO';
    }

    if ($valor == 'Programacao') {
        $valor = 'Programação';
    }

    if ($valor == 'Liga cliente') {
        $valor = 'Liga Cliente';
    }

    if ($valor == 'ENTREGA_1') {
        $valor = 'ENTREGA 1';
    }
    if ($valor == 'ENTREGA_2') {
        $valor = 'ENTREGA 2';
    }
    if ($valor == 'ENTREGA_3') {
        $valor = 'ENTREGA 3';
    }
    if ($valor == 'ENTREGA_4') {
        $valor = 'ENTREGA 4';
    }

    if ($valor == 'EXPEDICAO') {
        $valor = 'EXPEDIÇÃO';
    }

    if ($valor == 'Forno rb') {
        $valor = 'Forno RB';
    }

    if ($valor == 'Lote consumo') {
        $valor = 'Lote Consumo';
    }

    if ($valor == 'PROGRAMACAO') {
        $valor = 'PROGRAMAÇÃO DE PRODUÇÃO';
    }

    if ($valor == 'LABORATORIO') {
        $valor = 'LABORATÓRIO';
    }

    if ($valor == 'OBSERVACAO') {
        $valor = 'OBSERVAÇÃO';
    }

    if ($valor == 'TOTAL_GERAL') {
        $valor = 'TOTAL GERAL';
    }

    if ($valor == 'QUANTIDADE_GERAL') {
        $valor = 'QUANTIDADE GERAL';
    }

    if ($valor == 'material_funcao') {
        $valor = 'Material';
    }

    if ($valor == 'MATERIAL_FUNCAO') {
        $valor = 'MATERIAL FUNÇÃO';
    }
    if ($valor == 'MATERIAL FUNCAO') {
        $valor = 'MATERIAL FUNÇÃO';
    }


    if ($valor == 'programacao') {
        $valor = 'Programação';
    }
    if ($valor == 'forno_rb') {
        $valor = 'Forno RB';
    }
    if ($valor == 'estacionario_1') {
        $valor = 'Estacionário 1';
    }
    if ($valor == 'estacionario_2') {
        $valor = 'Estacionário 2';
    }
    if ($valor == 'material_funcao') {
        $valor = 'Material Função';
    }
    if ($valor == 'metalografia') {
        $valor = 'Metalografia';
    }

    if ($valor == 'Estacionario 1') {
        $valor = 'Estacionário 1';
    }
    if ($valor == 'Estacionario 2') {
        $valor = 'Estacionário 2';
    }

    if ($valor == 'pre_producao') {
        $valor = 'Pré Produção';
    }

    if ($valor == 'painel') {
        $valor = 'Painel';
    }

    if ($valor == 'Si_max') {
        $valor = 'Si max';
    }
    if ($valor == 'Fe_max') {
        $valor = 'Fe max';
    }
    if ($valor == 'Cu_max') {
        $valor = 'Cu max';
    }
    if ($valor == 'Mn_max') {
        $valor = 'Mn max';
    }

    if ($valor == 'Mg_max') {
        $valor = 'Mn max';
    }
    if ($valor == 'Cr_max') {
        $valor = 'Cr max';
    }
    if ($valor == 'Ni_max') {
        $valor = 'Ni max';
    }
    if ($valor == 'Zn_max') {
        $valor = 'Zn max';
    }
    if ($valor == 'Sn_max') {
        $valor = 'Sn max';
    }
    if ($valor == 'Ti_max') {
        $valor = 'Ti max';
    }
    if ($valor == 'Pb_max') {
        $valor = 'Pb max';
    }
    if ($valor == 'Ca_max') {
        $valor = 'Ca max';
    }
    if ($valor == 'Al_max') {
        $valor = 'Al max';
    }
    if ($valor == 'Sb_max') {
        $valor = 'Sb max';
    }
    if ($valor == 'Na_max') {
        $valor = 'Na max';
    }

    if ($valor == 'LOTE_KG') {
        $valor = 'LOTE KG';
    }
    if ($valor == 'RETALHO_KG') {
        $valor = 'RETALHO KG';
    }

    if ($valor == 'ligas') {
        $valor = 'Ligas';
    }

    if ($valor == 'expedicao') {
        $valor = 'Expedição';
    }

    if ($valor == 'usuarios') {
        $valor = 'Usuários';
    }

    if ($valor == 'ligas_correcao') {
        $valor = 'Corrigir Ligas';
    }


    if ($valor == 'clientes') {
        $valor = 'Clientes';
    }
    if ($valor == 'certificado') {
        $valor = 'Análises';
    }

    return ($valor);
}

// <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

///////////////////////  USADO NO NOTA_SERVIÇOS_ALTERAR E CADASTRAR APOS AS GRAVAÇÕES
function gravar_a_receber()
{

    /////////////////  PRIMEIRO EXCLUI TODO CONTAS A RECEBER

    $CODIGO = busca_ultimo_codigo_sem_somar('nota_servicos');

    $usuario_hex = '';  /// verificar


    $result10  = conexao::executar("SELECT * FROM nota_servicos WHERE CODIGO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($result10)) {
        $CODIGO = $linha["CODIGO"];
        $NF_SERVICO = $linha["NF_SERVICO"];
        $PRESTADOR_SERVICO = $linha["PRESTADOR_SERVICO"];
        $LOCAL_INCIDENCIA = $linha["LOCAL_INCIDENCIA"];
        $NATUREZA_OPERACAO = $linha["NATUREZA_OPERACAO"];
        $CODIGO_CLIENTE = $linha["CODIGO_CLIENTE"];
        $CODIGO_PAGAMENTO = $linha["CODIGO_PAGAMENTO"];
        $CODIGO_SERVICO = $linha["CODIGO_SERVICO"];
        $ALIQUOTA = $linha["ALIQUOTA"];
        $CARACTERISTICAS_1950 = $linha["CARACTERISTICAS_1950"];
        $VALOR_TOTAL_NOTA = $linha["VALOR_TOTAL_NOTA"];
        $VALOR_TOTAL_DEDUCOES = $linha["VALOR_TOTAL_DEDUCOES"];
        $ISS_RETIDO_TOMADOR = $linha["ISS_RETIDO_TOMADOR"];
        $NUMERO_RPS = $linha["NUMERO_RPS"];
        $SERIE_RPS = $linha["SERIE_RPS"];
        $DATA_EMISSAO_RPS = $linha["DATA_EMISSAO_RPS"];
        $STATUS = $linha["STATUS"];
    }

    ////////////////////////////////// LANÇA NO FINANCEIRO AS PARCELAS SEPARADAS.

    $rs5 = conexao::executar("select * from pagamento WHERE CODIGO = '$CODIGO_PAGAMENTO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $DESCRICAO       = $linha["DESCRICAO"];
        $DIAS            = $linha["DIAS"];
        $NUMERO_PARCELA  = $linha["NUMERO_PARCELA"];
        $PORCENTAGEM     = $linha["PORCENTAGEM"];
        $NFE_TIPO        = $linha["NFE_TIPO"];
        $STATUS          = $linha["STATUS"];
    }

    ////////////////   EFETUA O UPDATE NA TABELA EMPRESAS GRAVANDO O NOVO NF_SERVIÇO
    executar_update('empresas', 'NF_SERVICO', $NF_SERVICO, 'CODIGO', '1');

    /////////////  DIVISÃO PARA AS PARTCELAS DIVIDE O VALORES
    $VALOR_VENDA = divisao($VALOR_TOTAL_NOTA, $NUMERO_PARCELA);

    $soma = 0;

    $data = date('Ymd');


    for ($x = 1; $x <= $NUMERO_PARCELA; $x++) {

        $parte0 = explode('+', $DIAS);

        $VENCIMENTO1 = somardata($parte0[$soma], 0, 0);  // $parte0[0]   REPRESENTA O DIA
        $VENCIMENTO1 = data_ini($VENCIMENTO1);

        conexao::executar("INSERT INTO a_receber (CODIGO,DATA,PEDIDO,NF_PRODUTO,NF_SERVICO,VENCIMENTO,CODIGO_CLIENTE,DESCRICAO,CODIGO_PAGAMENTO,CODIGO_PLANO_CONTAS,PARCELA,VALOR,A_RECEBER,LIQUIDADO,DATA_PAGAMENTO,STATUS,USUARIO) VALUES  (NULL,'$data','','','$NF_SERVICO','$VENCIMENTO1','$CODIGO_CLIENTE','VENDA DE SERVIÇOS EXECUTADO','$CODIGO_PAGAMENTO','0','$x','$VALOR_VENDA','$VALOR_VENDA','NAO','','ABERTO','$usuario_hex')");

        $soma++;
    }
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




////////////////////  CRIA JSON DA NFE  NÃO ESTA SENDO USADO POR ENQUANTO POIS NÃO CONSEGUI CRIAR JSON      "VERIFICAR"
function gerar_config_nfe()
{

    $rs5 = conexao::executar("select * from empresas WHERE STATUS = 'ATIVO' ");
    while ($linha = mysqli_fetch_array($rs5)) {

        $RAZAO_SOCIAL_EMP       = $linha["RAZAO_SOCIAL"];
        $FANTASIA_EMP           = $linha["FANTASIA"];
        $ESTADO_EMP             = $linha["ESTADO"];
        $CPF_CNPJ_EMP           = $linha["CPF_CNPJ"];
        $INSCRICAO_ESTADUAL_EMP = $linha["INSCRICAO_ESTADUAL"];
        $CNAE_EMP               = $linha["CNAE"];
        $TIPO_EMPRESA           = $linha["TIPO_EMPRESA"];
        $CERTIFICADO_DIGITAL    = $linha["CERTIFICADO_DIGITAL"];
        $SENHA_CERTIFICADO      = $linha["SENHA_CERTIFICADO"];
        $TIPO_NOTA_FISCAL       = $linha["TIPO_NOTA_FISCAL"];
    }

    $json = '{"atualizacao":' . json_encode(date('Y-m-d') . ' ' . date('H:m:s')) . ',"tpAmb":' . json_encode($TIPO_NOTA_FISCAL) . ',"pathXmlUrlFileNFe":"nfe_ws3_mod55.xml","pathXmlUrlFileCTe":"cte_ws2.xml","pathXmlUrlFileMDFe":"mdf2_ws1.xml","pathXmlUrlFileCLe":"","pathXmlUrlFileNFSe":"","pathNFeFiles":"\/xampp\/htdocs\/projetos\/sistema\/NFe\/","pathCTeFiles":"\/xampp\/htdocs\/projetos\/sistema\/CTe\/","pathMDFeFiles":"\/xampp\/htdocs\/projetos\/sistema\/MDFe\/","pathCLeFiles":"\/xampp\/htdocs\/projetos\/sistema\/CLe\/","pathNFSeFiles":"\/xampp\/htdocs\/projetos\/sistema\/NFSe\/","pathCertsFiles":"C:\\xampp\\htdocs\\projetos\\sistema\\certificado_digital\\","siteUrl":"http:\/\/192.168.0.10\/projetos\/sistema\/","schemesNFe":"PL_008i2","schemesCTe":"PL_CTe_200","schemesMDFe":"PL_MDFe_100","schemesCLe":"","schemesNFSe":"","razaosocial":' . json_encode($RAZAO_SOCIAL_EMP) . ',"nomefantasia":' . json_encode($FANTASIA_EMP) . ',"siglaUF":' . json_encode($ESTADO_EMP) . ',"cnpj":' . json_encode($CPF_CNPJ_EMP) . ',"ie":' . json_encode($INSCRICAO_ESTADUAL_EMP) . ',"im":"","iest":"","cnae":' . json_encode($CNAE_EMP) . ',"regime":' . json_encode($TIPO_EMPRESA) . ',"tokenIBPT":"","tokenNFCe":"","tokenNFCeId":"","certPfxName":' . json_encode($CERTIFICADO_DIGITAL) . ',"certPassword":' . json_encode($SENHA_CERTIFICADO) . ',"certPhrase":"","aDocFormat":{"format":"L","paper":"A4","southpaw":"1","pathLogoFile":"","pathLogoNFe":"","pathLogoNFCe":"","logoPosition":"L","font":"Times","printer":""},"aMailConf":{"mailAuth":"1","mailFrom":"nfe@facilrapido.com.br","mailSmtp":"mail.facilrapido.com.br","mailUser":"nfe@facilrapido.com.br","mailPass":"1q2w3e$R","mailProtocol":"","mailPort":"587","mailFromMail":"nfe@facilrapido.com.br","mailFromName":"NFe SERVPC Informatica","mailReplayToMail":false,"mailReplayToName":"NFe SERVPC Informatica","mailImapHost":null,"mailImapPort":null,"mailImapSecurity":null,"mailImapNocerts":null,"mailImapBox":null},"aProxyConf":{"proxyIp":"","proxyPort":"","proxyUser":"","proxyPass":""}}';
    return $json;
}

function limpa_variaveis()
{
    global $foo;
    unset($foo);
}

function formatXmlString($xml)
{
    $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);
    $token      = strtok($xml, "\n");
    $result     = '';
    $pad        = 0;
    $matches    = array();
    while ($token !== false) :
        if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) :
            $indent = 0;
        elseif (preg_match('/^<\/\w/', $token, $matches)) :
            $pad--;
            $indent = 0;
        elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
            $indent = 1;
        else :
            $indent = 0;
        endif;
        $line    = str_pad($token, strlen($token) + $pad, ' ', STR_PAD_LEFT);
        $result .= $line . "\n";
        $token   = strtok("\n");
        $pad    += $indent;
    endwhile;
    return $result;
}

function imposto_aproximado_ibpt($NCM, $IMPOSTO)
{

    $IMPOSTO = 0;

    /////////////////  ABAIXO RESPONSAVEL IBPT IMPOSTO APROXIMADO
    $rs588 = conexao::executar("SELECT $IMPOSTO FROM ibpt WHERE CODIGO_NCM='$NCM' ");
    while ($linha = mysqli_fetch_array($rs588)) {
        /*$FEDERAL_NACIONAL    = $linha["FEDERAL_NACIONAL"];
          $FEDERAL_IMPORTADOS  = $linha["FEDERAL_IMPORTADOS"];
          $ESTADUAL            = $linha["ESTADUAL"];
          $MUNICIPAL           = $linha["MUNICIPAL"];*/
        $IMPOSTO = virgula_ponto($linha["$IMPOSTO"]);
    }

    return $IMPOSTO;
}



function insert_codigo_pais($valor)
{

    if ($valor == '') {
        $valor = '1058';
    }
    return $valor;
}

function insert_informacao($campo, $valor)
{

    if ($campo == 'CODIGO_PAIS' and $valor == '') {
        $valor = '1058';
    }

    if ($campo == 'PAIS' and $valor == '') {
        $valor = 'BRASIL';
    }


    return $valor;
}

function busca_material_fornos($resultado, $lote)
{
    $KG1  = 0;
    $KG2  = 0;
    $KG3  = 0;
    $CAMPO = 0;

    $rs9 = conexao::executar("select KG from forno_rb WHERE LOTE = '$lote' AND MATERIAL_FUNCAO = '$resultado' ");
    while ($linha = mysqli_fetch_array($rs9)) {
        $KG  = $linha["KG"];
        $KG1  = $KG1 + $KG;
    }

    $rs10 = conexao::executar("select KG from estacionario_1 WHERE LOTE = '$lote' AND MATERIAL_FUNCAO = '$resultado' ");
    while ($linha = mysqli_fetch_array($rs10)) {
        $KG  = $linha["KG"];
        $KG2  = $KG2 + $KG;
    }

    $rs10 = conexao::executar("select KG from estacionario_2 WHERE LOTE = '$lote' AND MATERIAL_FUNCAO = '$resultado' ");
    while ($linha = mysqli_fetch_array($rs10)) {
        $KG  = $linha["KG"];
        $KG3  = $KG3 + $KG;
    }

    $CAMPO = $KG1 + $KG2 + $KG3;

    if ($CAMPO == '0') {
        $CAMPO = '';
    }

    return $CAMPO;
}


//// calcula a data 


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


/////// CONEVERTE HORA FORMADA EM MINUTOS
function horas_em_mintutos($hora)
{

    if ($hora == '') {
        $hora = '00:00';
    }

    $h1 = explode(":", $hora);


    $minuto  = $h1[1];
    $horas   = $h1[0];


    if ($horas > 0) {

        if (substr($horas, 0, 1) == 0) {
            $horas =  substr($horas, 1, 1);
        }

        $horas = $horas * 60;

        $minuto = $minuto + $horas;
    }




    return $minuto;
}

function busca_atraso_fornos($lote)
{
    $TEMPO  = 0;
    $MATERIAL_FUNCAO = '';
    $TEMPO_TOTAL = 0;
    $TOTAL_HORAS_REAL = 0;


    $rs9 = conexao::executar("select TEMPO, MATERIAL_FUNCAO from forno_rb WHERE LOTE = '$lote' ");
    while ($linha = mysqli_fetch_array($rs9)) {

        $TEMPO  = $linha["TEMPO"];
        $MATERIAL_FUNCAO  = $linha["MATERIAL_FUNCAO"];


        //echo substr($MATERIAL_FUNCAO, 0, 6)."<br>";

        if (substr($MATERIAL_FUNCAO, 0, 6) == 'ATRASO') {
            @$TOTAL_HORAS_REAL = somaHora($TOTAL_HORAS_REAL, $TEMPO);
        }
    }

    $TOTAL_HORAS_REAL = horas_em_mintutos($TOTAL_HORAS_REAL);

    return $TOTAL_HORAS_REAL;
}


function busca_motivo_atraso_fornos($lote)
{

    $MATERIAL_FUNCAO = '';
    $MOTIVO = '';

    $rs9 = conexao::executar("select MATERIAL_FUNCAO from forno_rb WHERE LOTE = '$lote' ");
    while ($linha = mysqli_fetch_array($rs9)) {

        $MATERIAL_FUNCAO  = $linha["MATERIAL_FUNCAO"];


        //echo substr($MATERIAL_FUNCAO, 0, 6)."<br>";

        if (substr($MATERIAL_FUNCAO, 0, 6) == 'ATRASO') {
            $MOTIVO =  $MOTIVO . 'RB ' . substr($MATERIAL_FUNCAO, 7, 100) . "\n";
        }
    }

    $MATERIAL_FUNCAO = '';


    $rs19 = conexao::executar("select MATERIAL_FUNCAO from estacionario_1 WHERE LOTE = '$lote' ");
    while ($linha = mysqli_fetch_array($rs19)) {

        $MATERIAL_FUNCAO  = $linha["MATERIAL_FUNCAO"];


        //echo substr($MATERIAL_FUNCAO, 0, 6)."<br>";

        if (substr($MATERIAL_FUNCAO, 0, 6) == 'ATRASO') {
            $MOTIVO =  $MOTIVO . 'E1 ' . substr($MATERIAL_FUNCAO, 7, 100) . "\n";
        }
    }

    $MATERIAL_FUNCAO = '';

    $rs122 = conexao::executar("select MATERIAL_FUNCAO from estacionario_2 WHERE LOTE = '$lote' ");
    while ($linha = mysqli_fetch_array($rs122)) {

        $MATERIAL_FUNCAO  = $linha["MATERIAL_FUNCAO"];


        //echo substr($MATERIAL_FUNCAO, 0, 6)."<br>";

        if (substr($MATERIAL_FUNCAO, 0, 6) == 'ATRASO') {
            $MOTIVO =  $MOTIVO . 'E2 ' . substr($MATERIAL_FUNCAO, 7, 100) . "\n";
        }
    }

    $MATERIAL_FUNCAO = '';

    if ($MOTIVO == '') {
        $MOTIVO = 'SEM ATRASOS';
    }

    $MOTIVO =  substr($MOTIVO, 0, -1);  ///  remove ultimo caracter \n quebra de linha   

    return $MOTIVO;
}


function busca_rendimento_fornos($resultado, $lote)
{
    $RENDIMENTO1  = 0;
    $RENDIMENTO2  = 0;
    $RENDIMENTO3  = 0;
    $RENDIMENTO   = 0;

    $rs9 = conexao::executar("select RENDIMENTO from forno_rb WHERE LOTE = '$lote' AND MATERIAL_FUNCAO = '$resultado' ");
    while ($linha = mysqli_fetch_array($rs9)) {
        $RENDIMENTO1  = $linha["RENDIMENTO"];
    }

    $rs10 = conexao::executar("select RENDIMENTO from estacionario_1 WHERE LOTE = '$lote' AND MATERIAL_FUNCAO = '$resultado' ");
    while ($linha = mysqli_fetch_array($rs10)) {
        $RENDIMENTO2  = $linha["RENDIMENTO"];
    }

    $rs10 = conexao::executar("select RENDIMENTO from estacionario_2 WHERE LOTE = '$lote' AND MATERIAL_FUNCAO = '$resultado' ");
    while ($linha = mysqli_fetch_array($rs10)) {
        $RENDIMENTO3 = $linha["RENDIMENTO"];
    }

    if ($RENDIMENTO1 <> '' and $RENDIMENTO2 == '' and $RENDIMENTO3 == '') {
        $RENDIMENTO = $RENDIMENTO1;
    } elseif ($RENDIMENTO1 <> '' and $RENDIMENTO2 <> '') {
        $RENDIMENTO = $RENDIMENTO1;
    } elseif ($RENDIMENTO1 <> '' and $RENDIMENTO3 <> '') {
        $RENDIMENTO = $RENDIMENTO1;
    } elseif ($RENDIMENTO1 == '' and $RENDIMENTO2 <> '') {
        $RENDIMENTO = $RENDIMENTO2;
    } elseif ($RENDIMENTO1 == '' and $RENDIMENTO3 <> '') {
        $RENDIMENTO = $RENDIMENTO3;
    }


    if ($RENDIMENTO == '0') {
        $RENDIMENTO = '';
    }


    return $RENDIMENTO;
}

function busca_clientes_da_liga($LIGAS)
{

    $CAMPO = '';
    $rs9 = conexao::executar("select CODIGO_CLIENTE from clientes_ligas WHERE LIGAS = '$LIGAS' ");
    while ($linha = mysqli_fetch_array($rs9)) {
        $CODIGO_CLIENTE = $linha["CODIGO_CLIENTE"];


        $CAMPO .= busca_campo_tabela('clientes', 'FANTASIA', 'CODIGO', $CODIGO_CLIENTE) . "<br>";
    }


    return $CAMPO;
}


////////////  PEDIDOS_GERAR_XML
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



////////////  PEDIDOS_GERAR_XML
function busca_expedicao_avulso($tabela, $resultado, $consulta1)
{

    $CAMPO = '';
    $rs9 = conexao::executar("select $resultado from $tabela WHERE CODIGO = '$consulta1' ");
    while ($linha = mysqli_fetch_array($rs9)) {
        $CAMPO  = $linha["$resultado"];
    }

    return $CAMPO;
}



////////////  CONSULTA PADRÃO USADO NO INCLUDE_CONSULTA_PADRAO  / VERIFICA SE CONSULTA DO USUARIO FOI CADASTRADA SE NÃO VAI USAR PADRAO ADMIN
function busca_consulta_padrao($tabela, $resultado, $campo1, $consulta1, $campo2, $consulta2)
{
    $CAMPO = '';
    $rs9 = conexao::executar("select $resultado from $tabela WHERE $campo1 = '$consulta1' and $campo2 = '$consulta2' ");
    while ($linha = mysqli_fetch_array($rs9)) {
        $CAMPO  = $linha["$resultado"];
    }

    return $CAMPO;
}


////////////  PEDIDOS_GERAR_XML
function busca_campo_2tabela($tabela1, $resultado1, $campo1, $consulta1, $tabela2, $resultado2, $campo2)
{
    $CAMPO1 = '';
    $CAMPO2 = '';
    $rs9 = conexao::executar("select $resultado1 from $tabela1 WHERE $campo1 = '$consulta1' ");
    while ($linha = mysqli_fetch_array($rs9)) {
        $CAMPO1  = $linha["$resultado1"];
    }

    $rs11 = conexao::executar("select $resultado2 from $tabela2 WHERE $campo2 = '$CAMPO1' ");
    while ($linha = mysqli_fetch_array($rs11)) {
        $CAMPO2  = $linha["$resultado2"];
    }

    return $CAMPO2;
}

////////////  PEDIDOS_GERAR_XML   PRODUTOS QUANTIDADE TRIBUTADA
function busca_quant_tributada_fator_lotes($CODIGO_PRODUTO, $QUANTIDADE, $SUB_TOTAL, $TIPO)
{
    // 'xProd' => 'Chopp Pilsen - Barril 30 Lts',
    // 'uCom' => 'Un',
    // 'qCom' => '4',
    // 'vUnCom' => '210.00',
    // 'vProd' => '840.00',
    // 'cEANTrib' => '',
    // 'uTrib' => 'Lt',
    // 'qTrib' => '120',
    // 'vUnTrib' => '7.00',

    $CAMPO = '';
    $FATOR_LOTES = 1;

    if ($QUANTIDADE == '') {
        $QUANTIDADE = 1;
    }

    $rs9 = conexao::executar("select FATOR_LOTES from produtos WHERE CODIGO_BARRA = '$CODIGO_PRODUTO' ");
    while ($linha = mysqli_fetch_array($rs9)) {
        $FATOR_LOTES = $linha["FATOR_LOTES"];
    }

    if ($FATOR_LOTES == '') {
        $FATOR_LOTES = 1;
    }

    if ($TIPO == 'qTrib') {
        $CAMPO =  $QUANTIDADE * $FATOR_LOTES;
    } elseif ($TIPO == 'vUnTrib') {
        $CAMPO = $SUB_TOTAL / $QUANTIDADE;
        $CAMPO = valor_txt($CAMPO);
    }

    return $CAMPO;
}


////////////  //0=Normal; 1=Consumidor final;   PEDIDOS_GERAR_XML
function busca_se_consumidor_final($tabela, $consulta)
{
    $CAMPO = '';
    //// BUSCA CODIGO DO CLIENTE NA TABELA PEDIDO
    $rs9 = conexao::executar("select CODIGO_CLIENTE from pedidos WHERE CODIGO_PEDIDO = '$consulta' ");
    while ($linha = mysqli_fetch_array($rs9)) {
        $CODIGO_CLIENTE  = $linha["CODIGO_CLIENTE"];
    }

    //// BUSCA CPF_CNPJ CLIENTE
    $rs9 = conexao::executar("select CPF_CNPJ, INSCRICAO_ESTADUAL from $tabela WHERE CODIGO = '$CODIGO_CLIENTE' ");
    while ($linha = mysqli_fetch_array($rs9)) {
        $CPF_CNPJ           = $linha["CPF_CNPJ"];
        $INSCRICAO_ESTADUAL = $linha["INSCRICAO_ESTADUAL"];
    }

    if (strlen($CPF_CNPJ) == 11) {
        $CAMPO = 1;  //1=Consumidor final;
    } elseif (strlen($CPF_CNPJ) == 14 and $INSCRICAO_ESTADUAL <> '') {
        $CAMPO = 0;  //0=Normal;
    } elseif (strlen($CPF_CNPJ) == 14 and $INSCRICAO_ESTADUAL == ''  or  strlen($CPF_CNPJ) == 14 and $INSCRICAO_ESTADUAL == 'ISENTO') {
        $CAMPO = 1;  // NESTE CASO ELE TEM CNPJ MAIS O MESMO E NULO OU ISENTO POR ISSO SE TRATA COMO CONSUMIDOR FINAL
    }

    return $CAMPO;
}

/////////////////////  VERIFICA A DATA SE E DO DIA PARA PODER LIBERAR O ACESSO
function super_max($codigo_pedido, $usuario)
{

    $rs5 = conexao::executar("select DATA from pedidos WHERE CODIGO_PEDIDO = '$codigo_pedido' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $DATA_PEDIDO  = $linha["DATA"];
    }

    $hoje = date('Ymd');

    if ($DATA_PEDIDO == $hoje) {
        $liberar = 1;
    } else {
        $liberar = 0;
    }

    return $liberar;
}




function limpa_pre_tel($valor)
{
    $pre = substr($valor, 4);
    return ($pre);
}

function Vcaixa($caixa, $valor)
{
    if ($caixa === 'P') {
        $valor = ucfirst(strtolower(trim($valor)));
    }
    if ($caixa === 'B') {
        $valor = strtolower(trim($valor));
    }
    if ($caixa === 'A') {
        $valor = strtoupper(trim($valor));
    }
    return ($valor);
}

function limitar_descricao($val)
{
    //$val = utf8_encode($val);
    //$val = substr($val,0,15) ;
    return ($val);
}


function busca_ultimo_codigo($TABELA)
{
    ////////  buscar o ultimo registro
    $CODIGO = 1;

    $rs5 = conexao::executar("select max(CODIGO) AS CODIGO1 from $TABELA ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO = $linha["CODIGO1"];
        $CODIGO++;
    }

    return $CODIGO;
}

function busca_ultimo_codigo2($TABELA, $CAMPO, $CAMPO1)
{
    ////////  buscar o ultimo registro

    $CODIGO = 1;

    $rs5 = conexao::executar("select max($CAMPO) AS $CAMPO1 from $TABELA ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO = $linha["$CAMPO1"];
        $CODIGO++;
    }

    return $CODIGO;
}


function busca_ultimo_codigo_sem_somar($TABELA)
{
    ////////  buscar o ultimo registro

    $CODIGO = 1;

    $rs5 = conexao::executar("select max(CODIGO) AS CODIGO1 from $TABELA ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO = $linha["CODIGO1"];
    }

    return $CODIGO;
}


function busca_ultimo_codigo_sem_somar_lote($TABELA, $LOTE)
{
    ////////  buscar o ultimo registro

    $CODIGO = 1;

    $rs5 = conexao::executar("select max(CODIGO) AS CODIGO1 from $TABELA WHERE LOTE='$LOTE' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO = $linha["CODIGO1"];
    }

    return $CODIGO;
}



function busca_ultimo_pedido($TABELA)
{
    ////////  buscar o ultimo registro

    $CODIGO = 1;

    $rs723 = conexao::executar("select max(CODIGO_PEDIDO) AS CODIGO_PEDIDO1 from $TABELA ");
    while ($linha = mysqli_fetch_array($rs723)) {
        $CODIGO = $linha["CODIGO_PEDIDO1"];

        $CODIGO++;
    }

    echo $CODIGO;

    conexao::executar("UPDATE `pedidos_id` SET CODIGO_PEDIDO='$CODIGO' WHERE CODIGO='1' ");

    return $CODIGO;
}


function busca_ultimo_nota_fiscal($TABELA, $CAMPO)
{
    ////////  buscar o ultimo registro

    $NOTA_FISCAL1 = 1;

    $rs51 = conexao::executar("select max($CAMPO) AS NOTA_FISCAL1 from $TABELA ");
    while ($linha = mysqli_fetch_array($rs51)) {
        $NOTA_FISCAL1 = $linha["NOTA_FISCAL1"];
        $NOTA_FISCAL1++;
    }
    return $NOTA_FISCAL1;
}

function inutilizacao_nfe_grava($TABELA, $CAMPO, $FIM)
{
    ////////  buscar o ultimo registro


    conexao::executar("UPDATE $TABELA SET $CAMPO = '$FIM' WHERE CODIGO='1' ");
}



function executar_update($TABELA, $CAMPO_GRAVAR, $DADO, $CAMPO_CONSULTA, $DADO_CONSULTA)
{

    conexao::executar("UPDATE $TABELA SET $CAMPO_GRAVAR = '$DADO' WHERE $CAMPO_CONSULTA = '$DADO_CONSULTA' ");
}


function busca_ultimo_nota_fiscal_grava($TABELA, $CAMPO)
{
    ////////  buscar o ultimo registro
    $NOTA_FISCAL1 = 1;

    $rs51 = conexao::executar("select max($CAMPO) AS NOTA_FISCAL1 from $TABELA ");
    while ($linha = mysqli_fetch_array($rs51)) {
        $NOTA_FISCAL1 = $linha["NOTA_FISCAL1"];
        $NOTA_FISCAL1++;
    }

    conexao::executar("UPDATE nfe_config SET $CAMPO = '$NOTA_FISCAL1' WHERE CODIGO='1' ");

    return $NOTA_FISCAL1;
}




function verifica_nota_fiscal_no_pedido($VALOR)
{
    ////////  buscar o ultimo registro
    $CODIGO_NOTA_FISCAL = '';

    $rs4 = conexao::executar("select CODIGO_NOTA_FISCAL from pedidos WHERE CODIGO_PEDIDO = '$VALOR' ");
    while ($linha = mysqli_fetch_array($rs4)) {
        $CODIGO_NOTA_FISCAL = $linha["CODIGO_NOTA_FISCAL"];
    }

    return $CODIGO_NOTA_FISCAL;
}


/*
function update_ultima_nota_fiscal($nNF){
    conexao::executar("UPDATE nfe_config SET nNF='$nNF' WHERE CODIGO='1' ");
}*/



//////////  BUSCA OPERAÇÃO INTERNA INTER-ESTADUAL OUTRAS   UTILIZADO EM PEDIDOS_GERAR_XML.PHP
function busca_Op_Interna_InterEstadual_Outros($CODIGO_PEDIDO)
{

    //////////  BUSCA CODIGO DE CLIENTE NO PEDIDO
    $rs4 = conexao::executar("select CODIGO_CLIENTE from pedidos WHERE CODIGO_PEDIDO = '$CODIGO_PEDIDO' ");
    while ($linha = mysqli_fetch_array($rs4)) {
        $CODIGO_CLIENTE             = $linha["CODIGO_CLIENTE"];
    }


    /////// BUSCA UF EMPRESA
    $rs5 = conexao::executar("select ESTADO,PAIS from empresas WHERE STATUS = 'ATIVO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $ESTADO_EMP             = $linha["ESTADO"];
        $PAIS_EMP               = $linha["PAIS"];
    }

    $rs6 = conexao::executar("select ESTADO,PAIS from clientes WHERE CODIGO = '$CODIGO_CLIENTE' ");
    while ($linha = mysqli_fetch_array($rs6)) {
        $ESTADO_CLI             = $linha["ESTADO"];
        $PAIS_CLI               = $linha["PAIS"];
    }
    //1=Operação interna; 2=Operação interestadual; 3=Operação com exterior.
    if ($ESTADO_EMP == $ESTADO_CLI and $PAIS_EMP == $PAIS_CLI or $ESTADO_EMP == $ESTADO_CLI and $PAIS_CLI == '') {
        $idDest = 1;
    } elseif ($ESTADO_EMP <> $ESTADO_CLI and $PAIS_EMP == $PAIS_CLI or $ESTADO_EMP <> $ESTADO_CLI and $PAIS_CLI == '') {
        $idDest = 2;
    } else {
        $idDest = 3;
    }

    return $idDest;
}



//////////  RETIRA UNDERLINE GERAL
function retira_underline($val)
{
    $quantidade = 0;
    $quantidade = substr_count($val, '_');

    //$mostra = $quantidade.' ' ;

    if ($quantidade == 0) {
        $val = Corretor_Ortografico($val);
    } elseif ($quantidade == 1) {
        $parte = explode('_', "$val");
        $primeiro   = Corretor_Ortografico($parte[0]);
        $segundo    = Corretor_Ortografico($parte[1]);
        $val = $primeiro . ' ' . $segundo;

        //$mostra .= $val ;

    } elseif ($quantidade == 2) {
        $parte = explode('_', "$val");
        $primeiro    = Corretor_Ortografico($parte[0]);
        $segundo     = Corretor_Ortografico($parte[1]);
        $terceiro    = Corretor_Ortografico($parte[2]);
        $val = $primeiro . ' ' . $segundo . ' ' . $terceiro;

        //$mostra .= $val ;
    }
    //echo $mostra ."<br>" ;

    return ($val);
}


// ////////////  VERIFICA SE TABELA EXISTE
// function verificaTabela($tabela)
// {
//     $tabelas_consulta = mysql_query('SHOW TABLES');

//     while ($tabelas_linha = mysql_fetch_row($tabelas_consulta)) {
//         $tabelas[] = $tabelas_linha[0];
//     }

//     if (!in_array($tabela, $tabelas)) {
//         return false;
//     } else {
//         return true;
//     }
// }

///  $tabela_existe = verificaTabela('minha_tabela');


/////////////  VERIFICA SE A COLUNA EXISTE NA TABELA SE OK RETORNA 1
function verificaColuna($tabela, $coluna)
{

    $resultado = 0;
    $result10 = conexao::executar("SHOW COLUMNS FROM $tabela ");
    while ($row = mysqli_fetch_array($result10)) {
        $val = "{$row[0]}";
        if ($coluna == $val) {
            $resultado = 1;
        }
    }
    return $resultado;
}





/////////////  FUNÇÃO PARA LIMPAR SQL INJECTION LOGIN

function sql_injection($val)
{
    $array1 = array("'", "_", " ", "=");
    $array2 = array("#", "#", "#", "#");
    return str_replace($array1, $array2, $val);
}

/////////////////  VERIFICA CRIPTOGRAFIA , SE CHECK ON NÃO PASSADO RETORNA APENAS A MESMA SENHA
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
{ //// codigo recursivo que precisa da entrada "TOKYO" para retornar O VALOR CERTO e assim validar a funcao senha

    $X = $K - $X;
    $X = $X + $Z;

    if ($W >= 0) {
        return $X;
    }
    $Z = $W - 1;
    $W = $Z - 1;


    gx($K, $X, $W, $Z);
}


function busca_por_cep($TABELA, $CAMPO, $CODIGO_BUSCA = 0, $CEP)
{


    if ($CEP <> "") {

        if (substr($CEP, 0, 1) == '0') {
            $CEP = substr($CEP, 1); ////////  RETIRA O PRIMEIRO CARACTER SE O MESMO FOR ZERO
        }

        $xml = simplexml_load_file("https://www.magazinelive.com.br/suporte/web_cep/index.php?id=$CEP");

        $endereco = $xml->ENDERECO;
        $bairro   = $xml->BAIRRO;
        $cidade   = $xml->CIDADE;
        $uf       = $xml->ESTADO;

        ///////////////////  BUSCA TABELA IBGE LOCAL NA BASE DE DADOS
        $rs6 = conexao::executar("select CODIGO_MUNICIPIO, NOME_MUNICIPIO, UF from ibge WHERE NOME_MUNICIPIO = '$cidade' and ESTADO = '$uf' ");
        while ($linha = mysqli_fetch_array($rs6)) {
            $CODIGO_MUNICIPIO   = $linha["CODIGO_MUNICIPIO"];
            $NOME_MUNICIPIO     = $linha["NOME_MUNICIPIO"];
        }
    }


    if ($CODIGO_BUSCA > 0) {
        conexao::executar("UPDATE $TABELA SET CODIGO_MUNICIPIO='$CODIGO_MUNICIPIO', ENDERECO='$endereco', BAIRRO='$bairro', CIDADE='$cidade', ESTADO='$uf' WHERE $CAMPO = '$CODIGO_BUSCA' ");
    } elseif ($CODIGO_BUSCA == 0) {

        ////////  buscar o ultimo registro
        $rs5 = conexao::executar("select max(CODIGO) AS CODIGO1 from $TABELA ");
        while ($linha = mysqli_fetch_array($rs5)) {
            $CODIGO_BUSCA = $linha["CODIGO1"];
        }
        conexao::executar("UPDATE $TABELA SET CODIGO_MUNICIPIO='$CODIGO_MUNICIPIO', ENDERECO='$endereco', BAIRRO='$bairro', CIDADE='$cidade', ESTADO='$uf' WHERE $CAMPO = '$CODIGO_BUSCA' ");
    }
}


function espaco_disco()
{

    // disk_total_space("c:/");

    $size = disk_free_space("c:/");



    if ($size < 1024) {
        echo $size . ' bytes';
    } elseif ($size < (1024 * 1024)) {
        $size = round($size / 1024, 1);
        echo $size . ' KB';
    } elseif ($size < (1024 * 1024 * 1024)) {
        $size = round($size / (1024 * 1024), 1);
        echo $size . ' MB';
    } else {
        $size = round($size / (1024 * 1024 * 1024), 1);
        echo $size . ' GB';
    }
}

//////////////  Função para excluir diretorios
//////////////  $diretorio = "pedidos";
//////////////  ExcluiDir($diretorio);
function ExcluiDir($Dir)
{

    if ($dd = opendir($Dir)) {
        while (false !== ($Arq = readdir($dd))) {
            if ($Arq != "." && $Arq != "..") {
                $Path = "$Dir/$Arq";
                if (is_dir($Path)) {
                    ExcluiDir($Path);
                } elseif (is_file($Path)) {
                    unlink($Path);
                }
            }
        }
        closedir($dd);
    }
    rmdir($Dir);
}


/////////////////  RESPONSAVEL POR VERIFICAR A DISPONIBILIDADE DA QUANTIDADE NA PRODUÇÃO
function soma_subtrai_producao($CODIGO_PRODUCAO, $CODIGO_PRODUTO, $QUANTIDADE, $CONTA)
{

    $QUANTIDADE_PRODUCAO2 = 0;

    $rs5 = conexao::executar("select * from producao WHERE CODIGO = '$CODIGO_PRODUCAO' AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $QUANTIDADE_PRODUCAO2  = $linha["QUANTIDADE"];
    }

    if ($CONTA == 'soma') {
        $QUANTIDADE_PRODUCAO2 = $QUANTIDADE_PRODUCAO2 + $QUANTIDADE;
    } elseif ($CONTA == 'subtrai') {
        $QUANTIDADE_PRODUCAO2 = $QUANTIDADE_PRODUCAO2 - $QUANTIDADE;
    }


    conexao::executar("UPDATE producao SET QUANTIDADE='$QUANTIDADE_PRODUCAO2' WHERE CODIGO='$CODIGO_PRODUCAO' AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
}


function grava_xml_entrada($CODIGO_NOTA_FISCAL, $CHAVE, $PROTOCOLO, $SERIE, $DATA_EMISSAO, $DATA_SAIDA, $RAZAO_SOCIAL, $CPF_CNPJ, $INSCRICAO_ESTADUAL, $BC_ICMS, $VALOR_ICMS, $BC_ICMS_ST, $VALOR_ICMS_ST, $VALOR_TOTAL_PRODUTO, $VALOR_FRETE, $VALOR_SEGURO, $DESCONTO, $VALOR_TOTAL_IPI, $VALOR_TOTAL_NOTA, $ARQUIVO)
{


    $BC_ICMS             = retira($BC_ICMS);
    $VALOR_ICMS          = retira($VALOR_ICMS);
    $BC_ICMS_ST          = retira($BC_ICMS_ST);
    $VALOR_ICMS_ST       = retira($VALOR_ICMS_ST);
    $VALOR_TOTAL_PRODUTO = retira($VALOR_TOTAL_PRODUTO);
    $VALOR_FRETE         = retira($VALOR_FRETE);
    $VALOR_SEGURO        = retira($VALOR_SEGURO);
    $DESCONTO            = retira($DESCONTO);
    $VALOR_TOTAL_IPI     = retira($VALOR_TOTAL_IPI);
    $VALOR_TOTAL_NOTA    = retira($VALOR_TOTAL_NOTA);

    // $DATA_EMISSAO        = data_ini_html5($DATA_EMISSAO);

    /*
    echo $CODIGO_NOTA_FISCAL."<br>";
    echo $CHAVE."<br>";
    echo $PROTOCOLO."<br>";
    echo $SERIE."<br>";
    echo $DATA_EMISSAO."<br>";
    echo $DATA_SAIDA."<br>";
    echo $RAZAO_SOCIAL."<br>";
    echo $CPF_CNPJ."<br>";
    echo $INSCRICAO_ESTADUAL."<br>";
    echo $BC_ICMS."<br>";
    echo $VALOR_ICMS."<br>";
    echo $BC_ICMS_ST."<br>";
    echo $VALOR_ICMS_ST."<br>";
    echo $VALOR_TOTAL_PRODUTO."<br>";
    echo $VALOR_FRETE."<br>";
    echo $VALOR_SEGURO."<br>";
    echo $DESCONTO."<br>";
    echo $VALOR_TOTAL_IPI."<br>";
    echo $VALOR_TOTAL_NOTA."<br>" ;

    */

    $CHAVE2 = '';

    //  FAZER UMA VERIFICAÇÃO SE A CHAVE JA FOI CADASTRADA
    $rs5 = conexao::executar("select CHAVE from nota_entrada WHERE CHAVE = '$CHAVE' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CHAVE2  = $linha["CHAVE"];
    }

    ///////////////  CASO A CHAVE JA TENHA SIDO CADASTRADA O PROCESSO E ABORTADO
    if ($CHAVE2 <> '') {
        echo " Atenção XML ja adicionado ao sistema. Processo de inserção cancelado. ";
    } else {
        ///////////////   CASO A CHAVE NÃO EXISTA NA BASE DE DADOS O PROSSE CONTINUA
        //conexao::executar("INSERT INTO nota_entrada VALUES (NULL,'$CODIGO_NOTA_FISCAL','$CHAVE','$PROTOCOLO','$SERIE','$DATA_EMISSAO','$DATA_SAIDA,$RAZAO_SOCIAL,$CPF_CNPJ,$INSCRICAO_ESTADUAL,$BC_ICMS,$VALOR_ICMS,$BC_ICMS_ST,$VALOR_ICMS_ST,$VALOR_TOTAL_PRODUTO,$VALOR_FRETE,$VALOR_SEGURO,$DESCONTO,$VALOR_TOTAL_IPI,$VALOR_TOTAL_NOTA)") ;

        conexao::executar("INSERT INTO nota_entrada VALUES (NULL,'$CODIGO_NOTA_FISCAL','$CHAVE','$PROTOCOLO','$SERIE','$DATA_EMISSAO','$DATA_SAIDA','$RAZAO_SOCIAL','$CPF_CNPJ','$INSCRICAO_ESTADUAL','$BC_ICMS','$VALOR_ICMS','$BC_ICMS_ST','$VALOR_ICMS_ST','$VALOR_TOTAL_PRODUTO','$VALOR_FRETE','$VALOR_SEGURO','$DESCONTO','$VALOR_TOTAL_IPI','$VALOR_TOTAL_NOTA','$ARQUIVO')");
    }
}



function verificar_icone($TABELA, $ICONE2, $COR2, $LINK2, $METRO_FAVORITO2, $MENU_PRINCIPAL2, $CAMPO_LIMPA, $CAMPO_EXCLUIR, $STATUS2)
{


    //conexao::executar("INSERT INTO menu_metro VALUES ('30','1', '1', '1', '1', '1', '1', '1', '1')") ;
    $CODIGO    = '';

    //////////  VERIFICA SE JA CADASTRADO E MOSTRA O CODIGO
    $rs5 = conexao::executar("select * from menu_metro WHERE TABELA = '$TABELA' ");
    while ($linha  = mysqli_fetch_array($rs5)) {
        $CODIGO    = $linha["CODIGO"];
    }



    if ($CODIGO == '') {
        $DATA = date('d/m/Y - H:i');
        conexao::executar("INSERT INTO menu_metro VALUES (NULL,'$TABELA', '$ICONE2', '$DATA', '$COR2', '$LINK2', '$METRO_FAVORITO2', '$MENU_PRINCIPAL2','$CAMPO_LIMPA','$CAMPO_EXCLUIR', '$STATUS2')");

        ////////  BUSCAR ULTIMO CODIGO
        $rs6 = conexao::executar("SELECT MAX(CODIGO) as CODIGO1  FROM menu_metro ");
        while ($linha  = mysqli_fetch_array($rs6)) {
            $CODIGO  = $linha["CODIGO1"];
        }
        echo 'Icone Gravado da Tabela:' . $TABELA . ' Icone:' . $ICONE2 . '<br>';
    }


    if ($ICONE2 <> '') {
        conexao::executar("UPDATE menu_metro SET ICONE='$ICONE2', LINK='$LINK2' WHERE CODIGO='$CODIGO' ");
        echo 'Icone Atualizado da Tabela:' . $TABELA . ' Icone:' . $ICONE2 . '<br>';
    }

    if ($COR2 <> '') {
        conexao::executar("UPDATE menu_metro SET COR='$COR2', LINK='$LINK2' WHERE CODIGO='$CODIGO' ");
        echo 'Icone Atualizado da Tabela:' . $TABELA . ' Cor:' . $COR2 . '<br>';
    }

    if ($METRO_FAVORITO2 <> '') {
        conexao::executar("UPDATE menu_metro SET LINK='$LINK2', METRO_FAVORITO='$METRO_FAVORITO2' WHERE CODIGO='$CODIGO' ");
        echo 'Icone Atualizado da Tabela:' . $TABELA . ' Favoritos Metro:' . $METRO_FAVORITO2 . '<br>';
    }

    if ($MENU_PRINCIPAL2 <> '') {
        conexao::executar("UPDATE menu_metro SET LINK='$LINK2', MENU_PRINCIPAL='$MENU_PRINCIPAL2' WHERE CODIGO='$CODIGO' ");
        echo 'Icone Atualizado da Tabela:' . $TABELA . ' Menu Principal:' . $MENU_PRINCIPAL2 . '<br>';
    }

    if ($CAMPO_LIMPA <> '') {
        conexao::executar("UPDATE menu_metro SET LINK='$LINK2', CAMPO_LIMPA='$CAMPO_LIMPA' WHERE CODIGO='$CODIGO' ");
        echo 'Icone Atualizado da Tabela:' . $TABELA . ' Campo Limpar:' . $CAMPO_LIMPA . '<br>';
    }

    if ($CAMPO_EXCLUIR <> '') {
        conexao::executar("UPDATE menu_metro SET LINK='$LINK2', CAMPO_EXCLUIR='$CAMPO_EXCLUIR' WHERE CODIGO='$CODIGO' ");
        echo 'Icone Atualizado da Tabela:' . $TABELA . ' Campo Excluir:' . $CAMPO_EXCLUIR . '<br>';
    }

    if ($STATUS2 <> '') {
        conexao::executar("UPDATE menu_metro SET STATUS='$STATUS2' WHERE CODIGO='$CODIGO' ");
        echo 'Icone Atualizado da Tabela:' . $TABELA . ' Status:' . $STATUS2 . '<br>';
    }


    $LINK2 = 'index.php?opc=' . $TABELA . '_alt_exc&tabela=' . $TABELA;
    conexao::executar("UPDATE menu_metro SET LINK='$LINK2' WHERE CODIGO='$CODIGO' ");
    echo 'Icone Atualizado da Tabela:' . $TABELA . ' Link :' . $LINK2 . '<br>';
}

function busca_icone($TABELA)
{
    $ICONE = '';
    $rs5 = conexao::executar("select ICONE from menu_metro WHERE TABELA = '$TABELA' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $ICONE   = $linha["ICONE"];
    }
    return $ICONE;
}

function buscar_endereco_maps($CODIGO_CLIENTE, $tabela)
{
    $VAL = '';
    $rs5 = conexao::executar("select ENDERECO, NUMERO, CIDADE from $tabela WHERE CODIGO = '$CODIGO_CLIENTE' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $ENDERECO  = $linha["ENDERECO"];
        $NUMERO    = $linha["NUMERO"];
        $CIDADE    = $linha["CIDADE"];
    }
    $VAL = $ENDERECO . ',' . $NUMERO . ',' . $CIDADE;
    return $VAL;
}

/// TABELA PEDIDOS SUBTOTAL
function subtotal($quantidate, $valor)
{
    $subtotal = 0;
    $subtotal = $quantidate * retira($valor);
    return $subtotal;
}


/////////////////  MENU METRO   BUSCA CODIGO DO PEDIDO INSERINDO CODIGO
function busca_cor_tabela($tabela)
{
    $rs91 = conexao::executar("SELECT COR FROM menu_metro WHERE TABELA='$tabela'  ");
    while ($linha = mysqli_fetch_array($rs91)) {
        $COR            = $linha["COR"];
    }
    return $COR;
}

/////////////////  PEDIDOS  BUSCA CODIGO DO PEDIDO INSERINDO CODIGO
function busca_codigo_pedido_por_codigo($CODIGO)
{

    $rs5 = conexao::executar("select CODIGO_PEDIDO from pedidos WHERE CODIGO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO_PEDIDO  = $linha["CODIGO_PEDIDO"];

        return $CODIGO_PEDIDO;
    }
}

/// TABELA PEDIDOS MOSTRA O TOTAL GERAL JA SOMANDO O ULTIMO PASSADO SUBTOTAL
function totalgeral($codigo_pedido)
{
    $quantidadegeral = 0;
    $subtotal   = 0;
    $totalgeral = 0;

    // $subtotal = $quantidade * retira($valor); // calcula um subtotal para lançar junto

    $rs5 = conexao::executar("select QUANTIDADE, VALOR from pedidos WHERE CODIGO_PEDIDO = '$codigo_pedido' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $QUANTIDADE  = $linha["QUANTIDADE"];
        $VALOR       = $linha["VALOR"];
        $subtotal = $QUANTIDADE * $VALOR;

        $quantidadegeral = $quantidadegeral + $QUANTIDADE;

        $totalgeral = $totalgeral + $subtotal;
    }

    conexao::executar("UPDATE pedidos SET TOTAL_GERAL='$totalgeral',QUANTIDADE_GERAL='$quantidadegeral' WHERE CODIGO_PEDIDO = '$codigo_pedido' ");
}


function buscar_ja_cadastrado($TABELA, $CAMPO, $CPF_CNPJ)
{
    $rs6 = conexao::executar("select $CAMPO from $TABELA WHERE $CAMPO = '$CPF_CNPJ' ");
    while ($linha = mysqli_fetch_array($rs6)) {
        $CAMPO  = $linha["$CAMPO"];
        if ($CAMPO <> '') {
            $CAMPO = 1;
        } else {
            $CAMPO = 0;
        }
    }
    return $CAMPO;
}

function buscar_email($CODIGO_CLIENTE, $tabela)
{
    $rs5 = conexao::executar("select EMAIL from $tabela WHERE CODIGO = '$CODIGO_CLIENTE' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $EMAIL  = $linha["EMAIL"];
    }
    return $EMAIL;
}


function busca_forma_pagto($CODIGO)
{
    $DESCRICAO = '';
    $rs5 = conexao::executar("select DESCRICAO from pagamento WHERE CODIGO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $DESCRICAO  = $linha["DESCRICAO"];
    }
    return $DESCRICAO;
}


function busca_pagamento_cliente($CODIGO)
{
    $CODIGO_PAGAMENTO = '';

    $rs5 = conexao::executar("select CODIGO_PAGAMENTO from clientes WHERE CODIGO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO_PAGAMENTO  = $linha["CODIGO_PAGAMENTO"];
    }

    return $CODIGO_PAGAMENTO;
}

function busca_transporte_cliente($CODIGO)
{
    $CODIGO_TRANSPORTE = '';

    $rs5 = conexao::executar("select CODIGO_TRANSPORTE from clientes WHERE CODIGO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO_TRANSPORTE  = $linha["CODIGO_TRANSPORTE"];
    }

    return $CODIGO_TRANSPORTE;
}


function busca_codigo_cliente($CODIGO)
{
    $DESCRICAO = '';
    $RAZAO_SOCIAL = '';
    $rs5 = conexao::executar("select CODIGO, RAZAO_SOCIAL from clientes WHERE CODIGO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO  = $linha["CODIGO"];
        $RAZAO_SOCIAL  = $linha["RAZAO_SOCIAL"];
    }
    $DESCRICAO = ' ' . $CODIGO . ' - ' . $RAZAO_SOCIAL;
    return $DESCRICAO;
}

////////////// alt exc transporte
function busca_descricao_frete($MODO_FRETE)
{

    if ($MODO_FRETE == 0) {
        $MODO_FRETE = " 0 - POR CONTA DO EMITENTE";
    }
    if ($MODO_FRETE == 1) {
        $MODO_FRETE = " 1 - POR CONTA DO DESTINATÁRIO REMETENTE";
    }
    if ($MODO_FRETE == 2) {
        $MODO_FRETE = " 2 - POR CONTA DO TERCEIROS";
    }
    if ($MODO_FRETE == 9) {
        $MODO_FRETE = " 9 - SEM FRETE";
    }


    return $MODO_FRETE;
}



function busca_codigo_cliente_codigo_pedido($CODIGO)
{
    $CODIGO_CLIENTE = '';

    $rs5 = conexao::executar("select CODIGO_CLIENTE from pedidos WHERE CODIGO_PEDIDO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO_CLIENTE  = $linha["CODIGO_CLIENTE"];
    }

    return $CODIGO_CLIENTE;
}

function busca_funcionario_codigo($CODIGO)
{
    $DESCRICAO = '';
    $RAZAO_SOCIAL = '';
    $FONE_1 = '';
    $FONE_2 = '';
    $rs5 = conexao::executar("select CODIGO, FUNCIONARIO, FONE_1, FONE_2 from funcionarios WHERE CODIGO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO        = $linha["CODIGO"];
        $RAZAO_SOCIAL  = $linha["FUNCIONARIO"];
        $FONE_1        = $linha["FONE_1"];
        $FONE_2        = $linha["FONE_2"];
    }
    $DESCRICAO = ' ' . $CODIGO . ' - ' . $RAZAO_SOCIAL . ' - ' . $FONE_1 . ' - ' . $FONE_2;
    return $DESCRICAO;
}


function busca_setor_sequencia_rota_cliente($CODIGO)
{
    $DESCRICAO = '';
    $SETOR = '';
    $SEQUENCIA = '';
    $ROTA = '';
    $rs5 = conexao::executar("select SETOR, SEQUENCIA, ROTA from clientes WHERE CODIGO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {

        $SETOR       = $linha["SETOR"];
        $SEQUENCIA   = $linha["SEQUENCIA"];
        $ROTA        = $linha["ROTA"];
    }
    $DESCRICAO = 'SETOR: ' . $SETOR . ' - SEQUENCIA: ' . $SEQUENCIA . ' - ROTA ' . $ROTA;
    return $DESCRICAO;
}


function busca_codigo_produto($CODIGO)
{
    $DESCRICAO = '';
    $rs5 = conexao::executar("select CODIGO, CODIGO_BARRA, NOME_PRODUTO from produtos WHERE CODIGO_BARRA = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO  = $linha["CODIGO"];
        $CODIGO_BARRA  = $linha["CODIGO_BARRA"];
        $NOME_PRODUTO  = $linha["NOME_PRODUTO"];

        $DESCRICAO = ' ' . $CODIGO_BARRA . ' - ' . $NOME_PRODUTO;
    }

    return $DESCRICAO;
}

function busca_ncm_produto($CODIGO, $NCM)
{
    $INFO = '';

    $rs5 = conexao::executar("select $NCM from produtos WHERE CODIGO_BARRA = '$CODIGO' ");
    while ($linha   = mysqli_fetch_array($rs5)) {
        $INFO    = $linha["$NCM"];
    }


    if ($NCM == 'NCM') {
        $rs6 = conexao::executar("select CODIGO_NCM from ncm WHERE CODIGO = '$INFO' ");
        while ($linha = mysqli_fetch_array($rs6)) {
            $INFO  = $linha["CODIGO_NCM"];
        }
    }

    return $INFO;
}

function busca_cst_produto($CODIGO, $CST)
{
    $INFO = '';
    $rs5 = conexao::executar("select $CST from produtos WHERE CODIGO_BARRA = '$CODIGO' ");
    while ($linha   = mysqli_fetch_array($rs5)) {
        $INFO    = $linha["$CST"];
    }

    if ($CST == 'CST') {
        $rs6 = conexao::executar("select CODIGO_CST from cst WHERE CODIGO = '$INFO' ");
        while ($linha = mysqli_fetch_array($rs6)) {
            $INFO  = $linha["CODIGO_CST"];
        }
    }

    return $INFO;
}

function busca_cfop_produto($CODIGO, $CFOP)
{
    $INFO = '';
    $rs5 = conexao::executar("select $CFOP from produtos WHERE CODIGO_BARRA = '$CODIGO' ");
    while ($linha   = mysqli_fetch_array($rs5)) {
        $INFO    = $linha["$CFOP"];
    }

    if ($CFOP == 'CFOP') {
        $rs6 = conexao::executar("select CODIGO_CFOP from cfop WHERE CODIGO = '$INFO' ");
        while ($linha = mysqli_fetch_array($rs6)) {
            $INFO  = $linha["CODIGO_CFOP"];
        }
    }

    return $INFO;
}

function busca_un_produto($CODIGO, $UNIDADE_VENDA)
{
    $INFO = '';
    $rs5 = conexao::executar("select $UNIDADE_VENDA from produtos WHERE CODIGO = '$CODIGO' ");
    while ($linha   = mysqli_fetch_array($rs5)) {
        $INFO    = $linha["$UNIDADE_VENDA"];
    }

    return $INFO;
}

function busca_codigo_produto_nome($CODIGO)
{
    $DESCRICAO = '';
    $rs5 = conexao::executar("select CODIGO_BARRA, NOME_PRODUTO from produtos WHERE CODIGO_BARRA = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO_BARRA  = $linha["CODIGO_BARRA"];
        $NOME_PRODUTO  = $linha["NOME_PRODUTO"];

        $DESCRICAO = ' ' . $NOME_PRODUTO;
    }

    return $DESCRICAO;
}

function busca_codigo_fornecedor($CODIGO)
{
    $DESCRICAO = '';
    $RAZAO_SOCIAL = '';
    $rs5 = conexao::executar("select CODIGO, RAZAO_SOCIAL from fornecedores WHERE CODIGO = '$CODIGO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $CODIGO  = $linha["CODIGO"];
        $RAZAO_SOCIAL  = $linha["RAZAO_SOCIAL"];
    }
    $DESCRICAO = ' ' . $CODIGO . ' - ' . $RAZAO_SOCIAL;
    return $DESCRICAO;
}




function producao_busca_valor($ID_PRODUCAO, $CODIGO_PRODUTO)
{
    $VALOR = '';

    $rs5 = conexao::executar("select * from producao WHERE ID = '$ID_PRODUCAO' AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $VALOR  = $linha["VALOR"];
    }
    return $VALOR;
}


function producao_delete($ID_PRODUCAO, $CODIGO_PRODUTO, $QUANTIDADE)
{

    $QUANTIDADE_PRODUCAO1  = 0;
    $QUANTIDADE_PRODUCAO2  = 0;

    $rs5 = conexao::executar("select * from producao_concluido WHERE ID = '$ID_PRODUCAO' AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $QUANTIDADE_PRODUCAO1  = $linha["QUANTIDADE"];
    }
    $QUANTIDADE_PRODUCAO1 = $QUANTIDADE_PRODUCAO1 - $QUANTIDADE;

    $rs5 = conexao::executar("select * from producao WHERE ID = '$ID_PRODUCAO' AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $QUANTIDADE_PRODUCAO2  = $linha["QUANTIDADE"];
    }

    $QUANTIDADE_PRODUCAO2 = $QUANTIDADE_PRODUCAO2 + $QUANTIDADE;


    conexao::executar("UPDATE producao_concluido SET QUANTIDADE='$QUANTIDADE_PRODUCAO1' WHERE ID = '$ID_PRODUCAO'  AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
    conexao::executar("UPDATE producao SET QUANTIDADE='$QUANTIDADE_PRODUCAO2' WHERE ID = '$ID_PRODUCAO' AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
}


function producao_update($ID_PRODUCAO, $CODIGO_PRODUTO, $QUANTIDADE)
{

    $QUANTIDADE_PRODUCAO1  = 0;
    $QUANTIDADE_PRODUCAO2  = 0;

    $rs5 = conexao::executar("select * from producao_concluido WHERE ID = '$ID_PRODUCAO' AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $QUANTIDADE_PRODUCAO1  = $linha["QUANTIDADE"];
    }
    $QUANTIDADE_PRODUCAO1 = $QUANTIDADE_PRODUCAO1 + $QUANTIDADE;

    $rs5 = conexao::executar("select * from producao WHERE ID = '$ID_PRODUCAO' AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $QUANTIDADE_PRODUCAO2  = $linha["QUANTIDADE"];
    }

    $QUANTIDADE_PRODUCAO2 = $QUANTIDADE_PRODUCAO2 - $QUANTIDADE;






    conexao::executar("UPDATE producao_concluido SET QUANTIDADE='$QUANTIDADE_PRODUCAO1' WHERE ID = '$ID_PRODUCAO'  AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
    conexao::executar("UPDATE producao SET QUANTIDADE='$QUANTIDADE_PRODUCAO2' WHERE ID = '$ID_PRODUCAO' AND CODIGO_PRODUTO='$CODIGO_PRODUTO' ");
}


function calcular_st_ajustado($iva_original, $icms_origem, $icms_destino)
{
    $newData = (1 + ($iva_original / 100)) * (1 - ($icms_origem / 100)) / (1 - ($icms_destino / 100)) - 1;
    $newData = $newData * 100;
    $newData = round($newData, 2);
    return $newData;
}


function calcular_st($VALOR_VENDA, $ICMS, $MVA)
{

    $VALOR_VENDA  = retira($VALOR_VENDA);

    $PRIMEIRO  = porcentagem($VALOR_VENDA, $ICMS);
    $TERCEIRO  = porcentagem($VALOR_VENDA, $MVA);
    $QUARTO    = $VALOR_VENDA + $TERCEIRO;
    $QUINTO    =  porcentagem($QUARTO, $ICMS);
    $resultado =  $QUINTO - $PRIMEIRO;
    return $resultado;
}

/*
function remove($val)
{
  $array1 = array( "_" );
  $array2 = array( " " );
  return str_replace( $array1, $array2, $val );
}*/

/*
function remove1($val)
{
  $array1 = array( "_" );
  $array2 = array( "" );
  return str_replace( $array1, $array2, $val );
}*/

///////////// CONTAS A RECEBER  talves não esteja sendo utilizado 2018
function total_parcelas($NUMERO_PEDIDO, $CAMPO)
{
    $rs3 = conexao::executar("SELECT PARCELA FROM a_receber WHERE $CAMPO = $NUMERO_PEDIDO order by $CAMPO ");
    while ($linha    = mysqli_fetch_array($rs3)) {
        $TOTAL_PARCELA  = $linha["PARCELA"];
    }

    //////// VAI LISTAR TODO E MOSTRAR O ULTIMA PARCELA

    return $TOTAL_PARCELA;
}

///////////// CONTAS A RECEBER  talves não esteja sendo utilizado 2018
function total_parcelas_receber($NUMERO_PEDIDO)
{


    $rs3 = conexao::executar("SELECT PARCELA FROM a_receber WHERE PEDIDO = '$NUMERO_PEDIDO' order by CODIGO ");
    while ($linha    = mysqli_fetch_array($rs3)) {
        $TOTAL_PARCELA  = $linha["PARCELA"];


        return $TOTAL_PARCELA;
    }

    //////// VAI LISTAR TODO E MOSTRAR O ULTIMA PARCELA


}

/////////////////  TROCA VIRGULA POR PONTO
function virgula_ponto($val)
{
    $array1 = array(",");
    $array2 = array(".");
    return str_replace($array1, $array2, $val);
}


////////////////////////////////////  RETIRA ACENTOS E JA PASSA PARA MAIUSCULO
function retirar_acento($texto)
{
    $trocarIsso = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', 'Ÿ', '-', '\'', '_', '/');
    $porIsso    = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'Y', '', '', '', '');
    $titletext = str_replace($trocarIsso, $porIsso, $texto);
    $titletext = strtoupper($titletext);
    return $titletext;
}

//////////////   conversão  maiusculo  minusculo
////////////////////
function caixa($term, $tp)
{
    if ($tp == "1") $palavra = strtr(strtoupper($term), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
    elseif ($tp == "0") $palavra = strtr(strtolower($term), "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß", "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
    return $palavra;
}
/*
// Exemplo de Utilização - Maiúscula
 $exemplo1 = "notícias";
 echo convertem($exemplo1, 1);

// Exemplo de Utilização - Minúscula
$exemplo2 = "NOTÍCIAS";
 echo convertem($exemplo2, 0);
*/

////////////// FUNÇÃO PARA SOMAR DATA  EX: $PREVISAO1 = somardata("$DIA5/$MES5/$ANO5", 46, 0, 0);
function somardata($dias, $meses, $ano)
{

    $data = date('d/m/Y');
    /*www.brunogross.com*/
    //passe a data no formato dd/mm/yyyy
    $data = explode("/", $data);
    $newData = date("d/m/Y", mktime(
        0,
        0,
        0,
        $data[1] + $meses,
        $data[0] + $dias,
        $data[2] + $ano
    ));
    return $newData;
}


function retira_boleto($val)
{
    $array1 = array(".", ",");
    $array2 = array("", "");
    return str_replace($array1, $array2, $val);
}

function converte_valor_boleto($valor)
{

    $valor = str_replace(".", "", $valor);
    $tvalor = substr("$valor", 0, -2);
    $vfinal = substr("$valor", -2);
    $nvalor = "";

    while (strlen($tvalor > -1000000000000000000)) {
        if (strlen($nvalor) > 0) {
            $nvalor = substr($tvalor, -3) . "." . $nvalor;
        } else {
            $nvalor = substr($tvalor, -3);
        }
        $tvalor = substr($tvalor, 0, -3);


        if (strlen($tvalor) == 1)
            return $tvalor . "" . $nvalor . "," . $vfinal;

        if ((strlen($tvalor) == 0))
            return $nvalor . "," . $vfinal;
    }

    if ((strlen($tvalor) == 1) and (strlen($tvalor) != 0))
        return $tvalor . "." . $vfinal;
}




function retira($val)
{
    $array1 = array("R$", ".", ",");
    $array2 = array("", "", "");
    return str_replace($array1, $array2, $val);
}

function retira2($val)
{
    $array1 = array(":");
    $array2 = array("");
    return str_replace($array1, $array2, $val);
}


function soma($valor1, $valor2)
{
    $valor1 = retira($valor1);
    $valor2 = retira($valor2);
    $resultado = $valor1 + $valor2;
    return $resultado;
}

function subtracao($valor1, $valor2)
{
    $valor1 = retira($valor1);
    $valor2 = retira($valor2);
    $resultado = $valor1 - $valor2;
    return $resultado;
}

function divisao($valor1, $valor2)
{
    $valor1 = retira($valor1);
    $valor2 = retira($valor2);
    $resultado = $valor1 / $valor2;
    $resultado = round($resultado);
    return $resultado;
}

function multiplicacao($valor1, $valor2)
{
    $valor1 = retira($valor1);
    $valor2 = retira($valor2);
    $resultado = $valor1 * $valor2;
    return $resultado;
}


function calcular_horas($HORA_INICIO, $HORA_FIM)
{

    $resultado = 0;
    $HORA = 0;
    $MINUTO = 0;

    $parte1 = explode(':', "$HORA_INICIO");
    $HORA_INI1   = $parte1[0];
    $MINUTO_INI1 = $parte1[1];

    $parte2 = explode(':', "$HORA_FIM");
    $HORA_FIM1    =  $parte2[0];
    $MINUTO_FIM1  =  $parte2[1];

    if ($HORA_INI1 >= $HORA_FIM1) {
        $HORA =  $HORA_INI1 - $HORA_FIM1;
        $HORA =  24 - $HORA;
    }
    if ($HORA_INI1 <= $HORA_FIM1) {
        $HORA =  $HORA_FIM1 - $HORA_INI1;
    }

    if ($MINUTO_INI1 == $MINUTO_FIM1) {
        $MINUTO =  $MINUTO_FIM1 - $MINUTO_INI1;
    }

    if ($MINUTO_INI1 > $MINUTO_FIM1) {
        $MINUTO_NEG =  $MINUTO_FIM1 - $MINUTO_INI1;
        $MINUTO = 60 + $MINUTO_NEG;
        $HORA = $HORA - 1;
    }

    if ($MINUTO_INI1 <= $MINUTO_FIM1) {
        $MINUTO =  $MINUTO_FIM1 - $MINUTO_INI1;
    }

    $HORA   = str_pad($HORA, 02, "0", STR_PAD_LEFT);
    $MINUTO = str_pad($MINUTO, 02, "0", STR_PAD_LEFT);

    $resultado = $HORA . ":" . $MINUTO;

    return $resultado;
}


function porcentagem_padrao($valor1, $percentual)
{
    $resultado = $valor1 * $percentual  / 100;
    return $resultado;
}

function porcentagem($valor1, $percentual)
{
    $tq1 = $percentual * $valor1 / 100;
    $resultado = intval($tq1);
    return $resultado;
}

function porcentagem_forno_rb($valor1, $percentual)
{
    if ($percentual <> '' and  $valor1 <> 0) {
        $tq1 = $percentual * $valor1 / 100;
        $resultado = intval(round($tq1));
    } else {
        $resultado = 0;
    }
    return $resultado;
}

function porcentagem_f($valor1, $percentual)
{
    $tq1 = $percentual * $valor1 / 100;
    $resultado = $tq1 / 100;
    $resultado = round($resultado, 2);
    return $resultado;
}


function porcentagem_menos($valor1, $percentual)
{
    $tq1 = $percentual * $valor1 / 100;
    $resultado = $valor1 - $tq1;
    $resultado = intval($resultado);
    return $resultado;
}


function porcentagem_mais($valor2, $percentual)
{
    $tq2 = $percentual * $valor2 / 100;
    $resultado = $valor2 + $tq2;
    $resultado = intval($resultado);
    return $resultado;
}

function porcentagem_mais_f($valor2, $percentual)
{
    $tq2 = $percentual * $valor2 / 100;
    $resultado = $valor2 + $tq2;
    $resultado = $resultado / 100;
    $resultado = round($resultado, 2);
    return $resultado;
}

function multiplicacao_subtracao($valor1, $valor2, $valor3)
{
    $valor1 = retira($valor1);
    $valor2 = retira($valor2);
    $valor3 = retira($valor3);
    $resultado = $valor1 * $valor2;
    $resultado = $resultado - $valor3;
    return $resultado;
}


function converte_valor($valor)
{

    $contador = strlen($valor);

    $mil1 = $mil = $cem = $dec = $contador;

    if ($contador == 1) {
        $valor = "0,0$valor";
    }
    if ($contador == 2) {
        $valor = "0,$valor";
    }

    if ($contador == 3) {
        $cem = $cem - 3;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 1);
        $valor = "$cem" . ',' . "$dec";
    }

    if ($contador == 4) {
        $cem = $cem - 4;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 2);
        $valor = "$cem" . ',' . "$dec";
    }
    if ($contador == 5) {
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $valor = "$cem" . ',' . "$dec";
    }

    if ($contador == 6) {
        $mil = $mil - 6;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 1);
        $valor = "$mil" . '.' . "$cem" . ',' . "$dec";
    }
    if ($contador == 7) {
        $mil = $mil - 7;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 2);
        $valor = "$mil" . '.' . "$cem" . ',' . "$dec";
    }
    if ($contador == 8) {
        $mil = $mil - 8;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 3);
        $valor = "$mil" . '.' . "$cem" . ',' . "$dec";
    }
    if ($contador == 9) {
        $mil1 = $mil1 - 9;
        $mil = $mil - 8;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 3);
        $mil1 = substr("$valor", $mil1, 1);
        $valor = "$mil1" . '.' . "$mil" . '.' . "$cem" . ',' . "$dec";
    }
    if ($contador == 10) {
        $mil1 = $mil1 - 10;
        $mil = $mil - 8;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 3);
        $mil1 = substr("$valor", $mil1, 2);
        $valor = "$mil1" . '.' . "$mil" . '.' . "$cem" . ',' . "$dec";
    }

    if ($contador == 11) {
        $mil1  = $mil1 - 11;
        $mil   = $mil - 8;
        $cem   = $cem - 5;
        $dec   = $dec - 2;
        $dec   = substr("$valor", $dec, 2);
        $cem   = substr("$valor", $cem, 3);
        $mil   = substr("$valor", $mil, 3);
        $mil1  = substr("$valor", $mil1, 3);
        $valor = "$mil1" . '.' . "$mil" . '.' . "$cem" . ',' . "$dec";
    }

    if ($contador >= 12) {
        echo "VALOR INVALIDO !!!";
    }

    return $valor;
}

function peso_for($valor)
{
    $contador = strlen($valor);
    //  999.999.999
    $mil1 = $mil = $cem = $dec = $contador;

    if ($contador == 1) {
        $valor = "0.00$valor";
    }

    if ($contador == 2) {
        $valor = "0.0$valor";
    }

    if ($contador == 3) {
        $valor = "0.$valor";
    }

    if ($contador == 4) {
        $cem = substr("$valor", 0, 1);
        $dec = substr("$valor", 1, 3);
        $valor = "$cem" . '.' . "$dec";
    }

    if ($contador == 5) {
        $cem = substr("$valor", 0, 2);
        $dec = substr("$valor", 2, 4);

        $valor = "$cem" . '.' . "$dec";
    }

    if ($contador == 6) {
        $cem = substr("$valor", 0, 3);
        $dec = substr("$valor", 3, 5);

        $valor = "$cem" . '.' . "$dec";
    }

    if ($contador == 7) {
        $mil = substr("$valor", 0, 1);
        $cem = substr("$valor", 1, 3);
        $dec = substr("$valor", 4, 6);

        $valor = "$mil" . "$cem" . '.' . "$dec";
    }

    if ($contador == 8) {
        $mil = substr("$valor", 0, 2);
        $cem = substr("$valor", 2, 3);
        $dec = substr("$valor", 5, 7);

        $valor = "$mil" . "$cem" . '.' . "$dec";
    }

    if ($contador == 9) {
        $mil = substr("$valor", 0, 3);
        $cem = substr("$valor", 3, 3);
        $dec = substr("$valor", 6, 8);

        $valor = "$mil" . "$cem" . '.' . "$dec";
    }

    if ($contador >= 12) {
        echo "VALOR INVALIDO !!!";
    }

    return $valor;
}


function data_for($dt)
{
    if ($dt == "00000000") return '';
    $yr = strval(substr($dt, 0, 4));
    $mo = strval(substr($dt, 4, 2));
    $da = strval(substr($dt, 6, 2));
    $resul = "$da" . "/" . "$mo" . "/" . "$yr";
    return $resul;
}


function data_for2($dt)
{
    if ($dt == "00000000") return '';
    $yr = strval(substr($dt, 4, 4));
    $mo = strval(substr($dt, 2, 2));
    $da = strval(substr($dt, 0, 2));
    $resul = "$da" . "/" . "$mo" . "/" . "$yr";
    return $resul;
}

/////////////// 20150612  PARA 12062015
function data_for3($dt)
{
    if ($dt == "00000000") return '';
    $yr = strval(substr($dt, 0, 4));
    $mo = strval(substr($dt, 4, 2));
    $da = strval(substr($dt, 6, 2));
    $resul = $da . $mo . $yr;
    return $resul;
}

function data_for_nfe($dt)
{
    if ($dt == "00000000") return '';
    $yr = strval(substr($dt, 0, 4));
    $mo = strval(substr($dt, 4, 2));
    $da = strval(substr($dt, 6, 2));
    $resul = "$yr" . "-" . "$mo" . "-" . "$da";
    return $resul;
}

function data_ini($dt)
{
    if ($dt == "00/00/0000") return '';
    $da = strval(substr($dt, 0, 2));
    $mo = strval(substr($dt, 3, 2));
    $yr = strval(substr($dt, 6, 4));

    $resul1 = "$yr" . "$mo" . "$da";
    return $resul1;
}

function data_ini2($dt)
{
    if ($dt == "00000000") return '';
    $da = strval(substr($dt, 0, 2));
    $mo = strval(substr($dt, 2, 2));
    $yr = strval(substr($dt, 4, 4));

    $resul1 = "$yr" . "$mo" . "$da";
    return $resul1;
}

function data_ini_html5($dt)
{
    if ($dt == "0000-00-00") return '';
    $yr = strval(substr($dt, 0, 4));
    $mo = strval(substr($dt, 5, 2));
    $da = strval(substr($dt, 8, 2));

    $resul1 = "$yr" . "$mo" . "$da";
    return $resul1;
}


function data_for_html5($dt)
{
    if ($dt == "00000000") return '';
    $yr = strval(substr($dt, 0, 4));
    $mo = strval(substr($dt, 4, 2));
    $da = strval(substr($dt, 6, 2));
    $resul = "$yr" . "-" . "$mo" . "-" . "$da";
    return $resul;
}

function data_for_html5_2($dt)
{
    if ($dt == "0000-00-00") return '';
    $yr = strval(substr($dt, 0, 4));
    $mo = strval(substr($dt, 5, 2));
    $da = strval(substr($dt, 8, 2));
    $resul = "$da" . "/" . "$mo" . "/" . "$yr";
    return $resul;
}


function hora_ini($dt)
{
    if ($dt == "00:00:00") return '';
    $da = strval(substr($dt, 0, 2));
    $mo = strval(substr($dt, 3, 2));
    $yr = strval(substr($dt, 6, 2));

    $resul1 = "$da" . "$mo" . "$yr";
    return $resul1;
}

function hora_for($dt)
{
    if ($dt == "000000") return '';
    $da = strval(substr($dt, 0, 2));
    $mo = strval(substr($dt, 2, 2));
    $yr = strval(substr($dt, 4, 2));

    $resul = "$da" . ":" . "$mo" . ":" . "$yr";
    return $resul;
}

function cpf_ini($dt1)
{
    if ($dt1 == "000.000.000-00") return '';
    $da = strval(substr($dt1, 0, 3));
    $mo = strval(substr($dt1, 4, 3));
    $yr = strval(substr($dt1, 8, 3));
    $yr1 = strval(substr($dt1, 12, 2));

    $resul2 = "$da" . "$mo" . "$yr" . "$yr1";
    return $resul2;
}

function cpf_for($dt1)
{
    if ($dt1 == "000.000.000-00") return '';
    $da = strval(substr($dt1, 0, 3));
    $mo = strval(substr($dt1, 3, 3));
    $yr = strval(substr($dt1, 6, 3));
    $yr1 = strval(substr($dt1, 9, 2));

    $resul2 = "$da." . "$mo." . "$yr" . "-$yr1";
    return $resul2;
}

function cnpj_ini($dt1)
{
    if ($dt1 == "00.000.000/0000-00") return '';
    $da = strval(substr($dt1, 0, 2));
    $mo = strval(substr($dt1, 3, 3));
    $yr = strval(substr($dt1, 7, 3));
    $yr1 = strval(substr($dt1, 11, 4));
    $yr2 = strval(substr($dt1, 16, 2));

    $resul3 = "$da" . "$mo" . "$yr" . "$yr1" . "$yr2";
    return $resul3;
}

function cnpj_for($dt1)
{
    if ($dt1 == "00.000.000/0000-00") return '';
    $da = strval(substr($dt1, 0, 2));
    $mo = strval(substr($dt1, 2, 3));
    $yr = strval(substr($dt1, 5, 3));
    $yr1 = strval(substr($dt1, 8, 4));
    $yr2 = strval(substr($dt1, 12, 2));

    $resul3 = "$da." . "$mo." . "$yr/" . "$yr1" . "-$yr2";
    return $resul3;
}





//  VERIFICAR DIREITO FUNÇÃO TELEFONE  COLOCADO SPAÇO
function limpa_tel($val)
{
    $array1 = array("(", ")", "-");
    $array2 = array("", "", "");
    return str_replace($array1, $array2, $val);
}

function limpa_cpf($val)
{
    $array1 = array(".", ".", "-");
    $array2 = array("", "", "");
    return str_replace($array1, $array2, $val);
}

function limpa_cnpj($val)
{
    $array1 = array(".", ".", "/", "-");
    $array2 = array("", "", "", "");
    return str_replace($array1, $array2, $val);
}


function limpa_cpf_cnpj($val)
{
    if (strlen($val) == 14) {
        $array1 = array(".", ".", "-");
        $array2 = array("", "", "");
        return str_replace($array1, $array2, $val);
    } elseif (strlen($val) == 18) {
        $array1 = array(".", ".", "/", "-");
        $array2 = array("", "", "", "");
        return str_replace($array1, $array2, $val);
    } else {
        return $val; ////  VAI LIMPAR SE JA ESTIVER FORMATADO AI GRAVA SE NÃO ESTIVER APENAS RETORNA
    }
}


function cpf_cnpj_for($val)
{
    if (strlen($val) == 11) {
        $val = limpa_cpf($val);
        $da = strval(substr($val, 0, 3));
        $mo = strval(substr($val, 3, 3));
        $yr = strval(substr($val, 6, 3));
        $yr1 = strval(substr($val, 9, 2));
        $resul2 = "$da." . "$mo." . "$yr" . "-$yr1";
        return $resul2;
    } elseif (strlen($val) == 14) {
        $val = limpa_cnpj($val);
        $da = strval(substr($val, 0, 2));
        $mo = strval(substr($val, 2, 3));
        $yr = strval(substr($val, 5, 3));
        $yr1 = strval(substr($val, 8, 4));
        $yr2 = strval(substr($val, 12, 2));
        $resul3 = "$da." . "$mo." . "$yr/" . "$yr1" . "-$yr2";
        return $resul3;
    } elseif (strlen($val) >= 1 and strlen($val) <= 13) {
        return ' CPF OU CNPJ INCOMPLETO';
    }
}


function limpa_cep($val)
{
    $array1 = array("-");
    $array2 = array("");
    return str_replace($array1, $array2, $val);
}

function cep_for($dt1)
{
    $dt1 = limpa_cep($dt1);
    $parte1 = strval(substr($dt1, 0, 5));
    $parte2 = strval(substr($dt1, 5, 3));

    $resul2 = "$parte1" . '-' . "$parte2";
    return $resul2;
}

function fone_for($dt1)
{
    $dt1 = limpa_cep($dt1);
    $parte1 = strval(substr($dt1, 0, 2));
    $parte2 = strval(substr($dt1, 2, 9));

    $resul2 = '(' . "$parte1" . ')' . "$parte2";
    return $resul2;
}

function limpa_ie($val)
{
    $array1 = array(".", ".", ".");
    $array2 = array("", "", "");
    $val = str_replace($array1, $array2, $val);
    if ($val == '0') {
        $val = '';
    }
    return $val;
}

function ie_for($dt1)
{
    $dt1 = limpa_ie($dt1);
    if (strlen($dt1) == 12) {
        $da = strval(substr($dt1, 0, 3));
        $mo = strval(substr($dt1, 3, 3));
        $yr = strval(substr($dt1, 6, 3));
        $yr1 = strval(substr($dt1, 9, 3));

        $resul2 = "$da." . "$mo." . "$yr" . ".$yr1";
        return $resul2;
    } elseif (strlen($dt1) >= 1 and strlen($dt1) <= 11) {
        return ' IE INCOMPLETO, COMPLETE OU DEIXE EM BRANCO';
    }
}




function valor_txt($valor)
{

    $contador = strlen($valor);

    $mil1 = $mil = $cem = $dec = $contador;

    if ($contador == 1) {
        $valor = "0.0$valor";
    }

    if ($contador == 2) {
        $valor = "0.$valor";
    }

    if ($contador == 3) {
        $cem = $cem - 3;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 1);
        $valor = "$cem" . '.' . "$dec";
    }

    if ($contador == 4) {
        $cem = $cem - 4;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 2);
        $valor = "$cem" . '.' . "$dec";
    }
    if ($contador == 5) {
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $valor = "$cem" . '.' . "$dec";
    }

    if ($contador == 6) {
        $mil = $mil - 6;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 1);
        $valor = "$mil" . "$cem" . '.' . "$dec";
    }
    if ($contador == 7) {
        $mil = $mil - 7;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 2);
        $valor = "$mil" . "$cem" . '.' . "$dec";
    }
    if ($contador == 8) {
        $mil = $mil - 8;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 3);
        $valor = "$mil" . "$cem" . '.' . "$dec";
    }
    if ($contador == 9) {
        $mil1 = $mil1 - 9;
        $mil = $mil - 8;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 3);
        $mil1 = substr("$valor", $mil1, 1);
        $valor = "$mil1" . "$mil" . "$cem" . '.' . "$dec";
    }
    if ($contador == 10) {
        $mil1 = $mil1 - 10;
        $mil = $mil - 8;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 3);
        $mil1 = substr("$valor", $mil1, 2);
        $valor = "$mil1" . "$mil" . "$cem" . '.' . "$dec";
    }

    if ($contador == 11) {
        $mil1 = $mil1 - 11;
        $mil = $mil - 8;
        $cem = $cem - 5;
        $dec = $dec - 2;
        $dec = substr("$valor", $dec, 2);
        $cem = substr("$valor", $cem, 3);
        $mil = substr("$valor", $mil, 3);
        $mil1 = substr("$valor", $mil1, 3);
        $valor = "$mil1" . "$mil" . "$cem" . '.' . "$dec";
    }
    if ($contador >= 12) {
        echo "VALOR INVALIDO !!!";
    }

    return $valor;
}










//////////////////    DIAS UTEIS BOLETOS



///////////////////////////////////////////////  FUNÇÃO SIMPLES APENAS SOMA A QUANTIDADE DO TOTAL A SER PRODUZIDO
function producao_somar($QUANTIDADE_EXC)
{
    $rs878 = conexao::executar("SELECT * FROM producao_geral WHERE CODIGO='1' ");
    while ($linha = mysqli_fetch_array($rs878)) {
        $TOTAL_SER_PRODUZIDO  = $linha["TOTAL_SER_PRODUZIDO"];
    }
    $TOTAL_SER_PRODUZIDO = $TOTAL_SER_PRODUZIDO    + $QUANTIDADE_EXC;
    conexao::executar("UPDATE producao_geral SET TOTAL_SER_PRODUZIDO='$TOTAL_SER_PRODUZIDO' WHERE CODIGO='1' ");
}

///////////////////////////////////////////////  FUNÇÃO SIMPLES APENAS SUBTRAI A QUANTIDADE DO TOTAL A SER PRODUZIDO
function producao_subtrair($QUANTIDADE_EXC)
{
    $rs878 = conexao::executar("SELECT * FROM producao_geral WHERE CODIGO='1' ");
    while ($linha = mysqli_fetch_array($rs878)) {
        $TOTAL_SER_PRODUZIDO  = $linha["TOTAL_SER_PRODUZIDO"];
    }
    $TOTAL_SER_PRODUZIDO = $TOTAL_SER_PRODUZIDO    - $QUANTIDADE_EXC;
    conexao::executar("UPDATE producao_geral SET TOTAL_SER_PRODUZIDO='$TOTAL_SER_PRODUZIDO' WHERE CODIGO='1' ");
}



function dias_entre_datas_for($data1, $data2)
{

    // $data1 = "22/02/2013";
    // $data2 = "25/02/2013";

    $data1 = explode('/', $data1);
    $data2 = explode('/', $data2);

    $d1 = strtotime("$data1[2]-$data1[1]-$data1[0]");  //  formação esta   ANO  MES  DIA ALOCADOS
    $d2 = strtotime("$data2[2]-$data2[1]-$data2[0]");  //  formação esta   ANO  MES  DIA ALOCADOS

    $dataFinal = ($d2 - $d1) / 86400;

    if ($dataFinal < 0)
        $dataFinal = $dataFinal * -1;

    return    $dataFinal;
}

function dias_entre_datas_ini($data1, $data2)
{

    // $data1 = "20130220";
    // $data2 = "20130225";

    $d1 = strtotime("$data1");  //  formação esta   ANO  MES  DIA ALOCADOS
    $d2 = strtotime("$data2");  //  formação esta   ANO  MES  DIA ALOCADOS

    $dataFinal = ($d2 - $d1) / 86400;  /////////  MOSTRA A QUANTIDADE EM SEGUNDOS DIVIDIDO POR 1 DIA QUE IGUAL A 86400 SEGUNDOS

    if ($dataFinal < 0)
        $dataFinal = $dataFinal * -1;

    return    $dataFinal;
}


///////////////////////////////////////  MOSTRA O DIA DA SEMANA PARA CONSULTAS
function diasemana($data)
{
    $dia =  substr("$data", 0, 2);
    $mes =  substr("$data", 3, 2);
    $ano =  substr("$data", 6, 4);

    $diasemana = date("w", mktime(0, 0, 0, $mes, $dia, $ano));

    switch ($diasemana) {
        case "0":
            $diasemana = "DOMINGO";
            break;
        case "1":
            $diasemana = "SEGUNDA";
            break;
        case "2":
            $diasemana = "TERCA";
            break;
        case "3":
            $diasemana = "QUARTA";
            break;
        case "4":
            $diasemana = "QUINTA";
            break;
        case "5":
            $diasemana = "SEXTA";
            break;
        case "6":
            $diasemana = "SABADO";
            break;
    }

    return    $diasemana;
}


////////////  FUNÇÃO QUE SOMA APENAS DIAS UTEIS SE FOR SABADO DOMINGO OU FERIADO ACRESCENTA DIAS


//FORMATA COMO TIMESTAMP
function dataToTimestamp($data)
{
    $ano = substr($data, 6, 4);
    $mes = substr($data, 3, 2);
    $dia = substr($data, 0, 2);
    return mktime(0, 0, 0, $mes, $dia, $ano);
}

//SOMA 01 DIA
function Soma1dia($data)
{
    $ano = substr($data, 6, 4);
    $mes = substr($data, 3, 2);
    $dia = substr($data, 0, 2);
    return date("d/m/Y", mktime(0, 0, 0, $mes, $dia + 1, $ano));
}


function SomaDiasUteis($xDataInicial, $xSomarDias)
{
    for ($ii = 1; $ii <= $xSomarDias; $ii++) {

        $xDataInicial = Soma1dia($xDataInicial); //SOMA DIA NORMAL

        //VERIFICANDO SE EH DIA DE TRABALHO
        if (date("w", dataToTimestamp($xDataInicial)) == "0") {
            //SE DIA FOR DOMINGO OU FERIADO, SOMA +1
            $xDataInicial = Soma1dia($xDataInicial);
        } elseif (date("w", dataToTimestamp($xDataInicial)) == "6") {
            //SE DIA FOR SABADO, SOMA +2
            $xDataInicial = Soma1dia($xDataInicial);
            $xDataInicial = Soma1dia($xDataInicial);
        } elseif ($xDataInicial == '01/01/2014') {
            $xDataInicial = Soma1dia($xDataInicial);
        } elseif ($xDataInicial == '04/03/2014') {
            $xDataInicial = Soma1dia($xDataInicial); // CARNAVAL
        } elseif ($xDataInicial == '18/04/2014') {
            $xDataInicial = Soma1dia($xDataInicial);
            $xDataInicial = Soma1dia($xDataInicial);
            $xDataInicial = Soma1dia($xDataInicial); // PAIXÃO DE CRISTO
        } elseif ($xDataInicial == '21/04/2014') {
            $xDataInicial = Soma1dia($xDataInicial); // TIRADENTES
        } elseif ($xDataInicial == '01/05/2014') {
            $xDataInicial = Soma1dia($xDataInicial); // DIA DO TRABALHO
        } elseif ($xDataInicial == '19/06/2014') {
            $xDataInicial = Soma1dia($xDataInicial); // Corpus Christi
        } elseif ($xDataInicial == '07/09/2014') { //DOMINGO  INDEPENDENCIA DO BRASIL
        } elseif ($xDataInicial == '12/10/2014') { //DOMINGO NS SENHORA APARECIDA
        } elseif ($xDataInicial == '02/11/2014') { //DOMINGO FINADOS
        } elseif ($xDataInicial == '15/11/2014') { //SABADO PROCLAMAÇÃO DA REPUBLICA
        } elseif ($xDataInicial == '25/12/2014') {
            $xDataInicial = Soma1dia($xDataInicial); // QUINTA NATAL



        }
        //    echo $xDataInicial .' <br />';
    }
    return $xDataInicial;
}



////////////// FUNÇÃO PARA SOMAR DATA  EX: $PREVISAO1 = somarhoradata("$DIA5/$MES5/$ANO5", 46, 0, 0);
//////// somarhoradata('18-04-2018', '19:00:00', '5');


function somarhoradata($data, $hora, $soma)
{

    $DATAHORA = $data . " " . $hora; // DATA HORA PASSADO NESTE FORMATO 15-10-2018 19:00:00

    if ($soma == '') {
        $soma = '+4 hour';
    } else {
        $soma = '+' . $soma . ' hour';
    }

    $DATAHORA = date('Y-m-d H:i:s', strtotime("$DATAHORA $soma"));

    $DATAHORA = substr($DATAHORA, 0, -3);

    return $DATAHORA; // 2017-10-19 23:00:00   

}


function busca_ultimo_ordem($TABELA)
{
    ////////  buscar o ultimo registro

    $ORDEM = 1;

    $rs5 = conexao::executar("select max(ORDEM) AS ORDEM1 from $TABELA ");
    while ($linha = mysqli_fetch_array($rs5)) {
        $ORDEM = $linha["ORDEM1"];
    }

    return $ORDEM;
}



?>