<select class="small-margin-10" name="charm" id="charm" required>
    <option value="">Avec le charme chroma ?</option>
    <?php if (!isset($_POST["charm"])) {
        for ($i = 1; $i >= 0; $i--) { ?>
            <option value="<?= $i ?>"><?= $i === 1 ? "Oui" : "Non" ?></option>

            <?php }
    } else {
        for ($i = 1; $i >= 0; $i--) {
            var_dump($_POST["charm"]);
            if ($_POST["charm"] === "$i") { ?>

                <option value="<?= $i ?>" selected><?= $i === 1 ? "Oui" : "Non" ?></option>
            <?php } else { ?>
                <option value="<?= $i ?>"><?= $i === 1 ? "Oui" : "Non" ?></option>
    <?php }
        }
    }
    ?>
</select>