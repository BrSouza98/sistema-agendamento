<nav class="navbar navbar-dark bg-dark">
    <div class="p-2">
        <?php echo "<h2 class='text-white'>Olá, " . strstr($_SESSION['nome'], ' ', true) . "</h2>" ?>
    </div>
    <div class="p-2">
        <a href="perfil.php" class="btn btn-dark">Perfil</a>
        <a href="agenda.php" class="btn btn-dark">agenda</a>
        <a href="../../model/logout.php" class="btn btn-danger">Sair</a>
    </div>
</nav>