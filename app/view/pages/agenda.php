<?php
require_once('../../controller/agendaController.php'); //já possui um session_start() executado, nao sendo necessário uma segunda chamada

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/perfilStyle.min.css">
</head>

<body class="body-background">

    <?php include("../components/navbar.php") ?>

    <main class="main-100-vh d-flex flex-column justify-content-center align-items-center">
        <div class="container-fluid col-md-4 col-sm-12 pull-right-lg p-5" style="border:0px solid">
            <div class="container col-md-12 rounded-start rounded-end" style="padding:0px;">
                <?php
                if (isset($_SESSION['mes']) || isset($_SESSION['anoSelecionado'])) {
                    MostreCalendario($_SESSION['mes'], $_SESSION['anoSelecionado']);
                }
                ?>
            </div>
        </div>

        <div class="container-fluid col-md-4 col-sm-12 pull-right-lg bg-light p-5" style="border:0px solid">
            <div class="container col-md-12 rounded-start rounded-end" style="padding:0px;">
                <form action="../../controller/agendaController.php" method="post">
                    <div class="row mb-5">
                        <div class="col-6">
                            <label for="seleciona-mes">Selecione o mês:</label>
                            <select name="mes" class="form-select" aria-label="Default select example">
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    echo "<option value=" . str_pad($i, 2, "0", STR_PAD_LEFT) . ">" . getNomeMes(str_pad($i, 2, "0", STR_PAD_LEFT)) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="anoSelecionado">Selecione o ano:</label>
                            <select name="anoSelecionado" class="form-select">
                                <?php
                                for ($i = date("Y"); $i < 2050; $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary p-2">Buscar dia</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>