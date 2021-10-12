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
                <tr>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
            </tbody>

        </table>
    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";