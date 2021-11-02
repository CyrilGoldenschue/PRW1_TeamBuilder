<?php
ob_start();
?>

    <section class="row">
        <a class="button column" href="?action=ListMember">Liste membres</a>
        <a class="button column" href="?action=MyTeams">Mes équipes</a>
        <a class="button column" href="?action=ListModo">Liste des modérateurs</a>
        <a class="button column" href="?action=CreateTeam">Création d'équipe</a>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";