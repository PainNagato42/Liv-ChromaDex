<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "$FRAG/head.php" ?>
    <title><?= $_SESSION["pseudo"] ?> / Liv'ChromaDex</title>
</head>

<body>
    <div class="flex">
        <?php include "$FRAG/header.php" ?>
        <main>
            <h1 class="color_fcca04 black_ops_one">Liv<span class="color_ff4646">'</span>Chroma<span class="color_ff4646">Dex</span> de <?= $_SESSION["pseudo"] ?></h1>
            <div class="container relative margin_60 medium-80 small-80">
                <div id="current_progress">Progression: <span id="countPokUser"><?= $countPokUser ?></span>/<span id="countPdex"><?= $countPdex ?></span></div>
                <div id="current_pourcent" class="none"></div>
                <div id="progress_bar"></div>
            </div>
            <div class="flex">
                <?php
                foreach ($listePok as $Pokemn) {
                    include "$FRAG/pokemon_card.php";
                }
                ?>
            </div>
        </main>
    </div>
    <script src="../src/js/progressBar.js"></script>
    <script src="../src/js/menu.js"></script>
</body>

</html>