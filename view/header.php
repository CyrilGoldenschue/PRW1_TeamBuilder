<?php
ob_start();
?>
    <header class="home header">
        <section class="container">
            <h1>TeamBuilder</h1>
            <a>Connecté en tant que :</a> <?= $member->name ?>
        </section>
    </header>

<?php
$header = ob_get_clean();
