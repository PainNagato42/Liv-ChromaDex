<?php $mois_fr = array(
    1 => 'Janvier',
    2 => 'Février',
    3 => 'Mars',
    4 => 'Avril',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juillet',
    8 => 'Août',
    9 => 'Septembre',
    10 => 'Octobre',
    11 => 'Novembre',
    12 => 'Décembre'
);
$mois = date("m", strtotime($Pokemn->get("date")));
$valueDate = match($mois) {
    '01' => 1,
    '02' => 2,
    '03' => 3,
    '04' => 4,
    '05' => 5,
    '06' => 6,
    '07' => 7,
    '08' => 8,
    '09' => 9,
    '10' => 10,
    '11' => 11,
    '12' => 12
}
?>
<div class="container_card flex width_20 medium-40 small-100">
    <div>
        <p class="color_aef4ec">Rencontres</p>
        <p class="color_fcca04"><?= $Pokemn->get("nb_rencontre") ?></p>
        <p class="color_aef4ec">Charme Chroma ?</p>
        <?php
        if ($Pokemn->get("charm") == 1) { ?>
            <p class="color_fcca04">OUI</p>
        <?php } else { ?>
            <p class="color_fcca04">NON</p>
        <?php }
        ?>
        <p class="color_aef4ec">Sexe</p>
        <?php if ($Pokemn->get("sexe") === "Male") { ?>
            <p class="color_fcca04">Mâle</p>
        <?php } else { ?>
            <p class="color_fcca04"><?= $Pokemn->get("sexe") ?></p>
        <?php } ?>
        <p class="color_aef4ec">Jeu</p>
        <p class="color_fcca04"><?= $Pokemn->getTarget("game_id")->get("label") ?></p>
        <p class="color_aef4ec">Date</p>
        <?php if ($Pokemn->get("date") !== "0000-00-00") { ?>
            <p class="color_fcca04"><?= date("d", strtotime($Pokemn->get("date"))) . " " . $mois_fr[$valueDate] . " " . date("Y", strtotime($Pokemn->get("date"))) ?></p>
        <?php } else { ?>
            <p class="color_fcca04">Inconnu</p>
        <?php } ?>
        <p class="color_aef4ec">Méthode</p>
        <p class="color_fcca04"><?= $Pokemn->getTarget("method_id")->get("label") ?></p>
    </div>
    <div class="box_info_pok">
        <p class="color_aef4ec">#<?= $Pokemn->getTarget("pokedex_id")->get("numero") ?></p>
        <img class="width_100" src="../img/pokemon/<?= $Pokemn->getTarget("pokedex_id")->get("image") ?>" alt="">
        <p class="color_aef4ec"><?= $Pokemn->getTarget("pokedex_id")->get("nom") ?></p>
    </div>
    <div class="pokeball">
        <img class="width_100" src="../img/pokeball/<?= $Pokemn->getTarget("pokeball_id")->get("image") ?>" alt="">
    </div>
</div>