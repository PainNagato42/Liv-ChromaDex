<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "$FRAG/head.php" ?>
    <title>Vos Badges / Liv'ChromaDex</title>
</head>

<body>
    <div class="flex">
        <?php include "$FRAG/header.php" ?>
        <main class="width_86 medium-100 small-100">
            <h1 class="color_fcca04 black_ops_one">Vos Badges</h1>
            <div class="container relative medium-80 small-80">
                <div id="current_progress">Progression: <span id="current_badges"></span>/<span id="allBadgesAcount"></span></div>
                <div id="current_pourcent" class="none"></div>
                <div id="progress_bar"></div>
            </div>
            <!-- ############################################################################## !-->
            <!-- ######################### BADGES GENERATIONS ################################# !-->
            <!-- ############################################################################## !-->

                <h2 class="text-center uppercase rye color_aef4ec">Badges générations</h2>
            <div class="flex justify_center container">
                <?php

                // $countG = nombre de pokemon sauf fabuleux par generation
                $countG = [150, 99, 133, 102, 152, 69, 99, 129,105];

                for ($i = 0; $i < count($tabConditionG); $i++) {
                ?>
                    <label class="container_badge">
                        <input class="check_none" type="checkbox">
                        <div class="card_badge text-center">
                            <div class="front">
                                <h4 class="color_aef4ec"><?= $i+1 ?>G</h4>
                                <?php
                                if (${"countG".$i+1} === $countG[$i]) { ?>
                                    <img class="badge_progress" src="../img/badge/<?= $i+1 ?>G.png" alt="Badge de la <?= $i+1 ?>G">
                                <?php } else { ?>
                                    <img src="../img/badge/non.png" alt="">
                                <?php }
                                ?>
                            </div>
                            <div class="back">
                                <p>Avoir tout les shiny de la <?= $i+1 ?>G (sauf fabuleux) pour débloquer ce badge</p>
                            </div>
                        </div>
                    </label>
                <?php
                }
                ?>
            </div>
            <!-- ############################################################################## !-->
            <!-- ######################### BADGES LEGENDAIRES ################################# !-->
            <!-- ############################################################################## !-->

            <h2 class="text-center uppercase rye color_aef4ec">Badges légendaires</h2>
            <div class="flex justify_center container">
            <?php

                $nameBadges = ["Trio_oiseaux","Trio_chiens","Duo_2G","Trio_golems","Duo_amoureux","Trio_3G","Trio_elf","Trio_4G","Trio_justice","Trio_génie","Trio_5G","Trio_6G","Les_ultra","Les_Toko","Trio_7G","Golems_8G"];

                $descriptions = ["Artikodin, Electhor et Sulfura","Raikou, Entei et Suicune","Lugia et Ho-Oh","Regirock, Regice et Registeel","Latias et Latios","Kyogre, Groudon et Rayquaza","Créhelf, Créfollet et Créfadet","Dialga, Palkia et Giratina","Cobaltium, Terrakium et Viridium","Boréas, Fulguris et Démétéros","Reshiram, Zekrom et Kyurem","Xerneas, Yveltal et Zygarde","tout les utra-chimères","Tokorico, Tokopiyon, Tokotoro et Tokopisco","Solgaleo, Lunala et Necrozma","Regieleki et Regidrago"];

                $countLeg = [3,3,2,3,2,3,3,3,3,3,3,3,11,4,3,2];

                for ($i = 0; $i < count($tabConditionLeg); $i++) {
                    $str = explode("_", $nameBadges[$i]);
                    
                ?>
                    <label class="container_badge">
                        <input class="check_none" type="checkbox">
                        <div class="card_badge text-center">
                            <div class="front">
                                <h4 class="color_aef4ec"><?= $str[0] ?> <br> <?= $str[1]?></h4>
                                <?php
                                if (${"countLeg".$i+1} === $countLeg[$i]) { ?>
                                    <img class="badge_progress" src="../img/badge/<?= $nameBadges[$i] ?>.png" alt="Badge du <?= $str[0]. " ". $str[1] ?>">
                                <?php } else { ?>
                                    <img src="../img/badge/non.png" alt="">
                                <?php }
                                ?>
                            </div>
                            <div class="back">
                                <p>Avoir <?= $descriptions[$i] ?> shiny pour débloquer ce badge</p>
                            </div>
                        </div>
                    </label>
                <?php
                }
                ?>
            </div>
            <!-- ############################################################################## !-->
            <!-- ########################### BADGES Starter ################################### !-->
            <!-- ############################################################################## !-->

            <h2 class="text-center uppercase rye color_aef4ec">Badges starter</h2>
            <div class="flex justify_center container">
            <?php
                for ($i = 0; $i < count($tabConditionsStarter); $i++) {
                ?>
                    <label class="container_badge">
                        <input class="check_none" type="checkbox">
                        <div class="card_badge text-center">
                            <div class="front">
                                <h4 class="color_aef4ec">Starter <br> <?= $i+1?>G</h4>
                                <?php
                                if (${"countStarter".$i+1} === 9) { ?>
                                    <img class="badge_progress" src="../img/badge/Starter<?= $i+1 ?>G.png" alt="Badge des starters <?= $i+1?>G">
                                <?php } else { ?>
                                    <img src="../img/badge/non.png" alt="">
                                <?php }
                                ?>
                            </div>
                            <div class="back">
                                <p>Avoir tout les starters et leurs évolutions shiny de la <?= $i+1 ?>G</p>
                            </div>
                        </div>
                    </label>
                <?php
                }
                ?>
            </div>
            <!-- ############################################################################## !-->
            <!-- ########################### BADGES FORMES #################################### !-->
            <!-- ############################################################################## !-->

            <h2 class="text-center uppercase rye color_aef4ec">Badges formes</h2>
            <div class="flex justify_center container">
            <?php
                $countForme = [18,16,17,2];

                for ($i = 0; $i < count($tabFormes); $i++) {
                    $nameForme = explode("'",$tabFormes[$i])[1];
                ?>
                    <label class="container_badge">
                        <input class="check_none" type="checkbox">
                        <div class="card_badge text-center">
                            <div class="front">
                                <h4 class="color_aef4ec"><?= $nameForme ?></h4>
                                <?php
                                if (${"countForme".$i+1} === $countForme[$i]) { ?>
                                    <img class="badge_progress" src="../img/badge/<?= $nameForme ?>.png" alt="Badge forme <?= $nameForme ?>">
                                <?php } else { ?>
                                    <img src="../img/badge/non.png" alt="">
                                <?php }
                                ?>
                            </div>
                            <div class="back">
                                <p>Avoir tout les pokémons shiny de la forme <?= $nameForme ?></p>
                            </div>
                        </div>
                    </label>
                <?php
                }
                ?>
            </div>
            <!-- ############################################################################## !-->
            <!-- ########################### BADGES FABULEUX ################################## !-->
            <!-- ############################################################################## !-->

            <h2 class="text-center uppercase rye color_aef4ec">Badges fabuleux</h2>
            <div class="flex justify_center container">
            <?php

                for ($i = 0; $i < count($tabFabuleux); $i++) {
                    $namefabuleux = explode("'",$tabFabuleux[$i])[1];
                ?>
                    <label class="container_badge">
                        <input class="check_none" type="checkbox">
                        <div class="card_badge text-center">
                            <div class="front">
                                <h4 class="color_aef4ec"><?= $namefabuleux ?></h4>
                                <?php
                                if (${"checkFabuleux".$i+1} === true) { ?>
                                    <img class="badge_progress" src="../img/badge/<?= $namefabuleux ?>.png" alt="Badge <?= $namefabuleux ?>">
                                <?php } else { ?>
                                    <img src="../img/badge/non.png" alt="">
                                <?php }
                                ?>
                            </div>
                            <div class="back">
                                <p>Avoir <?= $namefabuleux ?> shiny</p>
                            </div>
                        </div>
                    </label>
                <?php
                }
                ?>
            </div>
        </main>
    </div>
    <script src="../src/js/badge.js"></script>
    <script src="../src/js/menu.js"></script>
</body>

</html>