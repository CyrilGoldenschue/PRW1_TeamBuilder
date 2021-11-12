<?php
ob_start();
?>
    <header class="home">
        <section class="container">
            <h1><a class="title_home" href="?action=home">TeamBuilder</a></h1>
            <a>Version: Fin Examen - Cyril</a><br>
            <a>Connecté en tant que :</a> <a class="link" href="?action=MyProfile"><?= $_SESSION['user_connected']->name ?></a>
        </section>
    </header>

<?php
$header = ob_get_clean();
