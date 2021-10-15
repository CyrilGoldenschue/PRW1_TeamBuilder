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
                    Membres
                </td>
                <td>
                    Capitaine
                </td>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?= $team->name ?>
                    </td>
                    <td>
                        <?php foreach ($team->members() as $key => $member): ?>
                            <?= $member->name ?>

                            <?=  ($key !== array_key_last($team->members()) ? "/" : "" )  ?>
                        <?php endforeach; ?>

                    </td>
                    <td>
                        <?php foreach ($team->members() as $member): ?>
                            <?= ($member->is_captain == 1) ? $member->name : "" ?>
                        <?php endforeach; ?>
                    </td>
                </tr>
            </tbody>

        </table>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";