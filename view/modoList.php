<?php
ob_start();
?>

    <section class="row">
        <table class="table">
            <thead>
            <tr>
                <td>
                    Modérateur
                </td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($members as $member) : ?>
                <?php if ($member->role_id == 2) : ?>
                    <tr>
                        <td>
                            <?= $member->name ?>
                        </td>
                    </tr>

                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>

        </table>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";