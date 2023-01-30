<?php
forEach($liste as $pok) { ?>
    <p data-id="<?= $pok->id() ?>" class="pokemon"><?= $pok->get("nom") ?></p>
<?php }
?>