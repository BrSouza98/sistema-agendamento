<?php

session_start();

include("C:\laragon\www\app\model\config.php");

$cpf = $_SESSION['cpf'];

$query = "SELECT * FROM agendamentos WHERE cpf = \"$cpf\" ";

$result = mysqli_query($con, $query);
$agendamento = mysqli_fetch_array($result);
//a linha retorna um array com as chaves "nome", "cpf", "dia_agendado"

$nome_agendado = $agendamento['nome'];
$dia_agendado = date('d/m/y', strtotime($agendamento['dia_agendado']));
$cpf_agendado = $agendamento['cpf'];

