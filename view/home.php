<?php
ob_start();
?>

    <section class="row">
        <a class="button column" href="?action=ListMember">Liste membres</a>
        <a class="button column" href="?action=MyTeams">Mes équipes</a>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";