<select class="small-50 small-margin-10" name="method" id="method" required>
    <option>Quel méthode utilisé ?</option>
    <?php
    if (!isset($_POST["method"])) {
        foreach ($listeM as $methode) {
            if (isset($Pokemn)) {
                if ($Pokemn->getTarget("method_id")->get("label") === $methode->get("label")) { ?>
                    <option value="<?= $methode->id() ?>" selected><?= $methode->get("label") ?></option>
                <?php } else { ?>
                    <option value="<?= $methode->id() ?>"><?= $methode->get("label") ?></option>
                <?php }
            } else { ?><option value="<?= $methode->id() ?>"><?= $methode->get("label") ?></option>
        <?php }
        } 
        } else {
            foreach ($listeM as $methode) {
                if ($_POST["method"] === $methode->id()) { ?>
        <option value="<?= $methode->id() ?>" selected><?= $methode->get("label") ?></option>
    <?php } else { ?>
        <option value="<?= $methode->id() ?>"><?= $methode->get("label") ?></option>
<?php }
            }
        } ?>
</select>