<?php
ob_start();
?>
    <header class="home">
        <section class="container">
            <h1><a class="title_home" href="?action=home">TeamBuilder</a></h1>
            <a>Version: Début Examen - Cyril</a><br>
            <a>Connecté en tant que :</a> <?= $_SESSION['user_connected']->name ?>
        </section>
    </header>

<?php
$header = ob_get_clean();
