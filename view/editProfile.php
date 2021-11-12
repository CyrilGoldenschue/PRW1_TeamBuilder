<?php
ob_start();
?>
    <div class="row"><h1>edition Profile</h1></div>
    <section class="row">

        <div class="column">
            <form class="column">
                <input type="hidden" name="action" value="UpdateProfile">
                <input type="hidden" name="id" value="<?= $member->id ?>">
                <label for="name">nom :</label>
                <input id="name"  name="name" <?= ($_SESSION['user_connected']->role->slug == "MOD" ) ? "disabled" : "" ?> value="<?= $member->name ?>" type="text">
                <label for="role">role :</label>
                <select <?= ($_SESSION['user_connected']->role->slug == "MOD" ) ? "" : "disabled" ?> name="role" id="role">
                    <?php foreach ($roles as $role): ?>
                    <option <?= ($member->role->id == $role->id) ? "selected='selected'" : "" ?> value="<?= $role->id ?>"><?= $role->name ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="statu">statu :</label>
                <select <?= ($_SESSION['user_connected']->role->slug == "MOD" ) ? "" : "disabled" ?> name="statu" id="statu">
                    <?php foreach ($status as $statu): ?>
                        <option <?= ($member->statu->id == $statu->id) ? "selected='selected'" : "" ?> value="<?= $statu->id ?>"><?= $statu->name ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Enregister">
            </form>
        </div>

    </section>


<?php
$contenu = ob_get_clean();

require "Layout.php";