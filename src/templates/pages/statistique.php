<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "$FRAG/head.php" ?>
    <title>Vos statistique / Liv'ChromaDex</title>
</head>

<body>
    <div class="flex">
        <?php include "$FRAG/header.php" ?>
        <main class="width_86 medium-100 small-100">
            <h1 class="color_fcca04 black_ops_one">Vos statistiques</h1>
            <h2 class="color_aef4ec rye">Charme Chroma</h2>
            <div class="flex justify_between p_stats medium-80 small-80"><p>Oui</p><p>Non</p></div>
            <div class="container relative medium-80 small-80">
                <div id="current_progress_chroma"><div class="flex justify_between"><p id="pourcent_chroma_true"><?= $pourcentTrue ?>%</p><p id="pourcent_chroma_false"><?= $pourcentFalse ?>%</p></div></div>
                <div id="progress_bar_chroma_true"></div>
                <div id="progress_bar_chroma_false"></div>
            </div>
            <h2 class="color_aef4ec rye">Sexe</h2>
            <div class="flex justify_between p_stats medium-80 small-80"><p>Mâle</p><p>Female</p></div>
            <div class="container relative medium-80 small-80">
                <div id="current_progress_sexe"><div class="flex justify_between"><p id="pourcent_male"><?= $pourcentMale ?>%</p><p id="pourcent_female"><?= $pourcentFemale ?>%</p></div></div>
                <div id="progress_bar_male"></div>
                <div id="progress_bar_female"></div>
            </div>
        </main>
    </div>
    <script src="../src/js/stats.js"></script>
    <script src="../src/js/menu.js"></script>
</body>

</html>