<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "$FRAG/head.php" ?>
    <title><?= $U->get("pseudo") ?> - Generations / Liv'ChromaDex</title>
</head>

<body>
    <div class="flex">
        <?php include "$FRAG/header.php" ?>
        <main class="width_86 medium-100 small-100">
            <h1 class="color_fcca04 black_ops_one">Liv<span class="color_ff4646">'</span>Chroma<span class="color_ff4646">Dex</span> de <?= $U->get("pseudo") ?></br><span class="span_generation rye">Par Générations</span></h1>

            <div class="container medium-80 small-80">
                <div class="text-center box_generation rye">
                    <?php for ($i = 1; $i <= $nbGeneration; $i++) {
                        if ($i === 1) { ?>
                            <div data-G="1" class="choix_generation active">1G</div>
                        <?php } else { ?>
                            <div data-G=<?= $i ?> class="choix_generation"><?= $i ?>G</div>
                    <?php }
                    } ?>
                </div>
            </div>
            <?php
            for ($i = 1; $i <= $nbGeneration; $i++) {
                if ($i === 1) { ?>
                    <div data-boxG=<?= $i ?> class="box_pokemon_generation">
                        <div class="container relative margin_60 medium-80 small-80">
                            <div id="current_progressG<?= $i ?>">Progression: <span id="countPokUserG<?= $i ?>"><?= ${"countPokUserG" . $i} ?></span>/<span id="countPdexG<?= $i ?>"><?= ${"countPdexG" . $i} ?></span></div>
                            <div id="current_pourcentG<?= $i ?>" class="none"></div>
                            <div id="progress_barG<?= $i ?>"></div>
                        </div>
                        <div class="flex">
                            <?php
                            foreach (${"listePokG" . $i} as $Pokemn) {
                                include "$FRAG/pokemon_card.php";
                            }
                            ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div data-boxG=<?= $i ?> class="box_pokemon_generation none">
                    <div class="container relative margin_60 medium-80 small-80">
                        <div id="current_progressG<?= $i ?>">Progression: <span id="countPokUserG<?= $i ?>"><?= ${"countPokUserG" . $i} ?></span>/<span id="countPdexG<?= $i ?>"><?= ${"countPdexG" . $i} ?></span></div>
                        <div id="current_pourcentG<?= $i ?>" class="none"></div>
                        <div id="progress_barG<?= $i ?>"></div>
                    </div>
                    <div class="flex">
                        <?php
                        foreach (${"listePokG" . $i} as $Pokemn) {
                            include "$FRAG/pokemon_card.php";
                        }
                        ?>
                    </div>
                </div>
               <?php } ?>

            <?php }
            ?>
        </main>
    </div>
    <script src="../src/js/generation.js"></script>
    <script src="../src/js/menu.js"></script>
</body>

</html>