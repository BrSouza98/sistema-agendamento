<?php
session_start();

require_once('config.php');

if (empty($_GET) || empty($_SESSION)) {
    echo 'Dados não inseridos.';
    die;
}

$nome = $_SESSION['nome'];
$cpf = $_SESSION['cpf'];
$dia = $_GET['dia'];
$mes = $_GET['mes'];
$ano = $_GET['ano'];


$queryVerificar = "SELECT cpf = \"$cpf\" FROM agendamentos";
$consult = mysqli_query($con, $queryVerificar);
$result = mysqli_fetch_array($consult);


var_dump($consult);
echo "<br>";
var_dump($result);

if ( count($result) > 0 ) {
    echo 'Já existe um agendamento pendente';
} else {
    $queryAgendar = "INSERT INTO agendamentos( nome, cpf, dia_agendado ) VALUES (\"$nome\", \"$cpf\", \"$ano-$mes-$dia\")";
    mysqli_query($con, $queryAgendar);
    echo 'Agendamento realizado com sucesso';
}
