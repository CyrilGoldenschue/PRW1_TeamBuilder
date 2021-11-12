<?php
ob_start();
?>
    <div class="row"><h1>Profile</h1> <a href="?action=EditProfile&id=<?= $member->id ?>"><i class="fas fa-edit fa-2x"></i></a></div>
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