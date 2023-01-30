<?php
$tabSexe = ["Female", "Male", "Aucun"];
?>
<select class="small-margin-10" name="sexe" id="sexe" required>
    <option value="">Quel sexe ?</option>
    <?php if (!isset($_POST["sexe"])) {
        for ($i = 0; $i < count($tabSexe); $i++) { ?>
            <option value="<?= $tabSexe[$i] ?>"><?= $tabSexe[$i] === "Male" ? "Mâle" : $tabSexe[$i] ?></option>
            <?php }
    } else {
        for ($i = 0; $i < count($tabSexe); $i++) {
            if ($_POST["sexe"] === $tabSexe[$i]) { ?>
                <option value="<?= $tabSexe[$i] ?>" selected><?= $tabSexe[$i] === "Male" ? "Mâle" : $tabSexe[$i] ?></option>
            <?php } else { ?>
                <option value="<?= $tabSexe[$i] ?>"><?= $tabSexe[$i] === "Male" ? "Mâle" : $tabSexe[$i] ?></option>
    <?php }
        }
    }
    ?>
</select>