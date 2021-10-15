<?php
ob_start();
?>

    <section class="row">
        <table class="table">
            <thead>
            <tr>
                <td>
                    Nom
                </td>
                <td>
                    Nombre de membre
                </td>
                <td>
                    Capitaine
                </td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($teams as $team) : ?>
                <tr>
                    <td>
                        <a href="?action=TeamInfo&id=<?= $team->id ?>"><?= $team->name ?></a>
                    </td>
                    <td>
                        <?= count($team->members()) ?>
                    </td>
                    <td>
                        <?php foreach ($team->members() as $member): ?>
                            <?= ($member->is_captain == 1) ? $member->name : "" ?>
                        <?php endforeach; ?>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>

        </table>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";