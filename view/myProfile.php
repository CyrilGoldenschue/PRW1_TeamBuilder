<?php
ob_start();
?>

    <section class="row">
        <div class="column">
            <a>nom : <?= $member->name ?> </a>
            <a>role : <?= $member->role->name ?> </a>
            <a>statu : <?= $member->statu->name ?> </a>
        </div>
        <div class="column">
            <?php foreach ($member->teams() as $team) : ?>
                <?php foreach ($team->members() as $memberTeam): ?>
                    <?= ($memberTeam->is_captain == 1 && $member->id == $memberTeam->id) ? "<a> Capitaine de : </a><br>" . $team->name : "" ?>
                    <?= ($memberTeam->is_captain == 0 && $member->id == $memberTeam->id) ? "<a> Membre de : </a><br>" . $team->name : "" ?>
                <?php endforeach; ?>
            <?= ($team == null ? "Inscrit dans aucune équipe" : "") ?>
            <?php endforeach; ?>
        </div>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";