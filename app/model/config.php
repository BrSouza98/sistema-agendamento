<?php

$host="127.0.0.1";
$port=3316;
$socket="";
$user="root";
$password="";
$dbname="portal_agendamentos";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Erro ao conectar ao banco de dados...' . mysqli_connect_error());
