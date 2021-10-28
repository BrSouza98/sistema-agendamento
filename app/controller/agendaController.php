<?php

session_start();

function MostreSemanas()
{
    $semanas = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"];

    for ($i = 0; $i < 7; $i++)
        echo "<td class='bg-secondary text-white fw-bold'>" . $semanas[$i] . "</td>";
}

function GetNumeroDias($mes)
{
    $numero_dias = array(
        '01' => 31, '02' => 28, '03' => 31, '04' => 30, '05' => 31, '06' => 30,
        '07' => 31, '08' => 31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
    );

    if (((date('Y') % 4) == 0 and (date('Y') % 100) != 0) or (date('Y') % 400) == 0) {
        $numero_dias['02'] = 29;    // altera o numero de dias de fevereiro se o ano for bissexto
    }

    return $numero_dias[$mes];
}

function GetNomeMes($mes)
{
    $meses = array(
        '01' => "Janeiro", '02' => "Fevereiro", '03' => "Março",
        '04' => "Abril",   '05' => "Maio",      '06' => "Junho",
        '07' => "Julho",   '08' => "Agosto",    '09' => "Setembro",
        '10' => "Outubro", '11' => "Novembro",  '12' => "Dezembro"
    );

    if ($mes >= 01 && $mes <= 12)
        return $meses[$mes];

    return;
}

function MostreCalendario($mes, $anoSelecionado)
{
    $numero_dias = GetNumeroDias($mes);    // retorna o número de dias que tem o mês desejado
    $nome_mes = GetNomeMes($mes);
    $diacorrente = 0;

    $diasemana = jddayofweek(cal_to_jd(CAL_GREGORIAN, $mes, "01", $anoSelecionado), 0);    // função que descobre o dia da semana
    $jdDia = gregoriantojd($mes, 1, $anoSelecionado);
    $PrimeiroDia = jddayofweek($jdDia, 1);

    //verifica o usuario que esta acessando o calendario
    $nome = $_SESSION['nome'];


    // Evita que a tabela quebre, ajustando de acordo com a quantidade de semanas em um mês 
    if ($PrimeiroDia === 'Friday' || $PrimeiroDia === 'Saturday') {
        $qntdLinhas = 6;
    } else {
        $qntdLinhas = 5;
    }





    echo '<table class="table table-bordered table-style table-responsive">';
    echo "<tr>";
    echo "<td colspan = 7 class='text-center bg-dark text-white'><h3>" . $nome_mes .  " - " . $anoSelecionado . " </h3></td>";
    echo "</tr>";
    echo "<tr>";
    MostreSemanas();    // função que mostra as semanas aqui
    echo "</tr>";


    for ($linha = 0; $linha < $qntdLinhas; $linha++) {

        echo "<tr>";

        for ($coluna = 0; $coluna < 7; $coluna++) {

            $estiloCelula = "variavel";
            $conteudoCelula = "";
            $queryString =  "?mes=$mes&dia=" . ($diacorrente + 1) . "&ano=" . $anoSelecionado . "&nome=" . $nome;


            /* TRECHO IMPORTANTE: A PARTIR DESTE TRECHO É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */

            if ($diacorrente + 1 <= $numero_dias) {
                if ($coluna < $diasemana && $linha == 0) {
                    $conteudoCelula = " ";
                    $estiloCelula = " bg-light ";
                } else {
                    $estiloCelula = " dia bg-white ";
                    $conteudoCelula = "<a class='text-decoration-none text-dark stretched-link' target='_blank' href = ../../model/agendar.php" . $queryString . ">" . ++$diacorrente . "</a>";
                }
            } else {
                $conteudoCelula = " ";
                $estiloCelula = " bg-light ";
            }

            /* FIM DO TRECHO MUITO IMPORTANTE */






            echo "<td class='" . $estiloCelula . " position-relative'>";

            echo $conteudoCelula;


            echo "</td>";
        }



        echo "</tr>";
    }




    echo "</table>";
}

function MostreCalendarioCompleto($anoSelecionado)
{
    echo "<table>";
    $cont = 1;
    for ($j = 0; $j < 4; $j++) {
        echo "<tr>";
        for ($i = 0; $i < 3; $i++) {

            echo "<td>";
            MostreCalendario(($cont < 10) ? "0" . $cont : $cont, $anoSelecionado);

            $cont++;
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

//recebe o mes + ano e retorna valores como variaveis de sessão.
if (isset($_POST['mes']) && $_POST['anoSelecionado'] > 2020) {
    $_SESSION['mes'] = $_POST['mes'];
    $_SESSION['anoSelecionado'] = $_POST['anoSelecionado'];
    header("Location: ../view/pages/agenda.php");
}

//verifica se já foi iniciada uma sessão com nome
if (!isset($_SESSION['nome'])){
    header("Location: ../../../index.php");
}