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
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center text-white">Formulário de Cadastro</h3>
                </div>
            </div>
        </div>
        <!--Formulário para cadastro-->
        <div class="container bg-light p-5 rounded">
            <div class="row">
                <form action="../../model/cadastrarUsuario.php" method="post">
                    <div class="mb-3">
                        <label for="nomeInput" class="form-label">Nome completo</label>
                        <input name="nome" type="text" class="form-control" id="nomeInput" maxlength="40" placeholder="Maria Joana" oninput="formataNome()">
                    </div>

                    <div class="mb-3">
                        <label for="cpfInput" class="form-label">CPF</label>
                        <input name="cpf" type="text" class="form-control" id="cpfInput" maxlength="14" aria-describedby="cpfHelp" oninput="formataCPF()">
                    </div>

                    <div class="mb-3 row justify-content-around align-items-center">
                        <div class="col-6">
                            <label for="formGroupExampleInput" class="form-label" max="">Data de Nascimento: </label><br>
                            <input name="nascimento" type="date" class="form-control" id="nascimento" max="<?php echo date("Y-m-d"); ?>" min="1910-12-31">
                        </div>

                        <div class="col-6">
                            <label class="form-label">Sexo:</label>
                            <select name="sexo" class="form-select" aria-label="Default select example" id="sexo">
                                <option selected> </option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-light" href="http://localhost/index.php">Já possui uma conta?</a>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/forms.js"></script>
</body>

</html>