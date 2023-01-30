<select class="small-margin-10" name="game" id="game" required>
    <option>Quel jeu ?</option>
    <?php
    if (!isset($_POST["game"])) {
        foreach ($listeG as $Game) {
            if (isset($Pokemn)) {
                if ($Pokemn->getTarget("game_id")->get("label") === $Game->get("label")) { ?>
                    <option value="<?= $Game->id() ?>" selected><?= $Game->get("label") ?></option>
                <?php } else { ?>
                    <option value="<?= $Game->id() ?>"><?= $Game->get("label") ?></option>
                <?php }
            } else { ?>
                <option value="<?= $Game->id() ?>"><?= $Game->get("label") ?></option>
            <?php }
            ?>
            <?php }
    } else {
        foreach ($listeG as $Game) {
            if ($_POST["game"] === $Game->id()) { ?>
                <option value="<?= $Game->id() ?>" selected><?= $Game->get("label") ?></option>
            <?php } else { ?>
                <option value="<?= $Game->id() ?>"><?= $Game->get("label") ?></option>
    <?php }
        }
    } ?>
</select>