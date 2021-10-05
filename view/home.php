<?php
ob_start();
?>

    <section class="row">
        <a class="button column" href="?action=ListMember">List membre</a>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";