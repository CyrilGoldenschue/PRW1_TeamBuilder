<?php
ob_start();
?>

    <section class="row">
        <form method="get">
            <input type="hidden" value="ValidTeam" name="action">
            <div>
                <label for="nameTeam">Nom d'équipe</label>
                <input id="nameTeam" name="nameTeam"  type="text">
            </div>
            <div>
                <input type="reset" value="Annuler">
                <input type="submit" value="Créer">
            </div>
        </form>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";