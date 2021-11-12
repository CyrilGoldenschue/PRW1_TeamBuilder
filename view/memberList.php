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
                        <a <?= ($_SESSION['user_connected']->role->slug == "MOD" ) ? " class='linkTable' href='?action=Profile&id=$member->id'" : "" ?>><?= $member->name ?></a>
                    </td>
                    <td>
                        <?php foreach ($member->teams() as $key => $team) : ?>
                            <?= $team->name ?>
                            <?=  ($key !== array_key_last($member->teams()) ? ", " : "" )  ?>
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