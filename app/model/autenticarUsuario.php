<?php

session_start();

//conecta ao banco de dados
require_once('config.php');

//recebe os dados pelo metodo POST
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];


if (empty($cpf) || empty($nascimento)) { //verifica se os campos foram preenchidos
    header("Location: ../../index.php");
    die;
} else {
    //executa a query a partir dos dados recebidos e monta um array
    $query = "SELECT * FROM usuarios WHERE cpf = '" . $cpf . "' and nascimento = '" . $nascimento . "'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_fetch_array($result);

    
    if ($rows == NULL) { //verifica se o usuário existe ou não

        header("Location: ../view/pages/cadastro.php");

    } else { //inicia a sessão com o usuário existente e autoriza o acesso a agenda

        
        $_SESSION['nome'] = $rows['nome'];
        $_SESSION['cpf'] = $rows['cpf'];
        $_SESSION['nascimento'] = $rows['nascimento'];
        $_SESSION['sexo'] = $rows['sexo'];

        header("Location: ../view/pages/perfil.php");
    }
}
