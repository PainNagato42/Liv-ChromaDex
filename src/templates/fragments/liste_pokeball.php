<select class="small-margin-10" name="pokeball" id="pokeball" required>
    <option>Quel PokéBall utilisé ?</option>
    <?php
    if (!isset($_POST["pokeball"])) {
        foreach ($listePball as $Pokball) {
            if (isset($Pokemn)) {
                if ($Pokemn->getTarget("pokeball_id")->get("label") === $Pokball->get("label")) { ?>
                    <option value="<?= $Pokball->id() ?>" selected><?= $Pokball->get("label") ?></option>
                <?php } else { ?>
                    <option value="<?= $Pokball->id() ?>"><?= $Pokball->get("label") ?></option>
                <?php }
            } else { ?>
                <option value="<?= $Pokball->id() ?>"><?= $Pokball->get("label") ?></option>
        <?php }
        }
        } else {
            foreach ($listePball as $Pokball) {
                if ($_POST["pokeball"] === $Pokball->id()) { ?>
        <option value="<?= $Pokball->id() ?>" selected><?= $Pokball->get("label") ?></option>
    <?php } else { ?>
        <option value="<?= $Pokball->id() ?>"><?= $Pokball->get("label") ?></option>
<?php }
            }
        } ?>
</select>