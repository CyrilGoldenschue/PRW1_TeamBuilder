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
            <?php foreach ($members as $member) { ?>
                <tr>
                    <td>
                        <?= $member->name ?>
                    </td>
                    <td>
                        <?php $teams = $member->teams();
                        $lastElement = end($teams);;
                        foreach ($teams as $team) { ?>
                            <?= $team->name ?>
                            <?php if ($team->name != $lastElement->name) { ?>

                                <?= ", " ?>

                            <?php } ?>
                        <?php } ?>
                    </td>
                </tr>

            <?php } ?>
            </tbody>

        </table>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";