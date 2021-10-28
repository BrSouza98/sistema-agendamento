<?php 
    session_start();
    if(!empty($_SESSION)){
        header ('Location: app/view/pages/perfil.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="bg-dark">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center text-white">Consultar Agendamento</h3>
                </div>
            </div>
        </div>

        <!--Formulário para login-->
        <div class="container bg-light p-5 rounded">
            <div class="row">
                <form action="app/model/autenticarUsuario.php" method="post">
                    <div class="mb-3">
                        <label for="cpfInput" class="form-label">CPF</label>
                        <input name="cpf" type="text" class="form-control" id="cpfInput" maxlength="14" aria-describedby="cpfHelp" oninput="formataCPF()">
                        <div id="cpfHelp" class="form-text">Seus dados são sigilosos.</div>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Data de nascimento: </label>
                        <input name="nascimento" type="date" class="form-control" id="nascimento">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-light" href="app/view/pages/cadastro.php">Primeiro agendamento?</a>
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="app/view/js/forms.js"></script>
</body>

</html>