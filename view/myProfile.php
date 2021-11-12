<?php
ob_start();
?>

    <section class="row">
        <a>nom : <?= $member->name ?> </a>
        <a>role : <?= $member->role->name ?> </a>
        <a>statu : <?= $member->statu->name ?> </a>



    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";