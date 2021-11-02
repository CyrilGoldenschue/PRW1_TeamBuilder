<?php
ob_start();
?>

    <section class="row">
        <table class="table">
            <thead>
            <tr>
                <td>
                    Member
                </td>
                <td>
                    Teams
                </td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($members as $member) : ?>
                <tr>
                    <td>
                        <?= $member->name ?>
                    </td>
                    <td>
                        <?php foreach ($member->teams() as $key => $team) : ?>
                            <?= $team->name ?>
                            <?= ($key !== array_key_last($member->teams()) ? ", " : "") ?>
                        <?php endforeach; ?>
                    </td>
                    <?php if ($_SESSION['user_connected']->role_id == 2): ?>
                        <td>
                            <a href="?action=AddModo&id=<?= $member->id ?>" <?= $member->role_id == 2 ? "hidden" : "" ?>>Nommer modérateur</a>
                        </td>
                    <?php endif; ?>
                </tr>

            <?php endforeach; ?>
            </tbody>

        </table>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";