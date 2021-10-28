<?php

include('../../controller/perfilController.php')

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/perfilStyle.min.css">
</head>

<body class="body-background">

    <?php include("../components/navbar.php") ?>

    <main class="main-100-vh d-flex flex-column justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <div class="card">
                    <?php if (count($agendamento) !== 0) {
                        echo "<div class='card-text p-5'> <h4> Voce possui um agendamento pendente para o dia: " . $dia_agendado ."</h4> </div>";
                    } else {
                        echo "<div class='card-text'> Você ainda não possui nenhum agendamento pendente, acesse a agenda. </div>";
                    } ?>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>