<?php
ob_start();
?>

    <section class="row">
        <table>
            <thead>

            </thead>
            <tbody>

            </tbody>

        </table>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";