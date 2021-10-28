<?php

//conexão ao banco de dados
require_once('config.php');

//informações recebidas do form
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];


//verifica se os campos foram preenchidos
if (empty($nome) || empty($cpf) || empty($nascimento) || empty($sexo)) {
    header('Location: ../view/pages/cadastro.php');
    return header('Location: ../view/pages/cadastro.php');
}


//executa a query no MySQL a partir dos dados recebidos
$query = "SELECT * FROM usuarios WHERE cpf = '" . $cpf . "' and nascimento = '" . $nascimento . "'";
$result = mysqli_query($con, $query);

//monta um array com os dados
$rows = mysqli_fetch_array($result);

//verifica se o usuário já existe e retorna para pagina de agendamentos
if (isset($rows) || $cpf == $rows['cpf'] || $cpf == $rows['nascimento'] || !empty($rows)) {
    header("Location: ../../index.php");
} else {
    //Monta a query para gravar as vars no BD
    $query = "INSERT INTO usuarios( nome, cpf, nascimento, sexo ) VALUES ( \"$nome\", \"$cpf\", \"$nascimento\", \"$sexo\")";

    //Executa a query e armazena infos no BD
    mysqli_query($con, $query);
    header("Location: ../../index.php");
}
