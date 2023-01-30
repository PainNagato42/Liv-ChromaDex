<?php global $FRAG; ?>
<?php global $ROOT; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "$FRAG/head.php" ?>
    <title>Modif / Liv'ChromaDex</title>
</head>

<body>
    <div class="flex">
        <?php include "$FRAG/header.php" ?>
        <main>
            <?php
            if (isset($_SESSION['message']) and !empty($_SESSION["message"])) {
            ?>
                <div class="user-messages-container" id="msg-container">
                    <?php
                    foreach ($_SESSION["message"] as $k => $message) {
                    ?>
                        <div class="user-message <?= $message["type"] ?>">
                            <p><?= $message['content'] ?></p>
                        </div>
                    <?php
                    }

                    $_SESSION['message'] = [];
                    ?>
                </div>
            <?php
            }
            ?>
            <div class="margin_left_20 small-margin-auto">
                <h1 class="color_fcca04 black_ops_one">Ajout et modification de pokémon</h1>
                <form class="form_ajout" method="POST" action="<?= $ROOT ?>/traitement_ajout/">
                    <label class="color_aef4ec rye">Ajoutez un nouveau Pokémon</label>
                    <div class="relative">
                        <input type="text" class="small-80" id="namePok" name="nom" placeholder="Nom du Pokémon" value="<?= isset($_POST["nom"]) ? $_POST["nom"] : "" ?>">
                        <div class="absolute" id="pok"></div>
                    </div>
                    <input type="number" class="nb_rencontre" name="nb_rencontre" min="0" placeholder="Nombre" value="<?= isset($_POST["nb_rencontre"]) ? $_POST["nb_rencontre"] : "" ?>">
                    <?php
                    if (isset($_POST["inconnu"])) { ?>
                        <label class="contents" for="inconnu"><input id="inconnu" type="checkbox" name="inconnu" value="1" checked> Inconnu</label>
                    <?php } else {
                    ?>
                        <label class="contents check_nb" for="inconnu"><input id="inconnu" type="checkbox" name="inconnu" value="1"> Inconnu</label>
                    <?php }
                    ?>
                    <?php include "$FRAG/liste_methode.php"; ?>
                    <?php include "$FRAG/liste_pokeball.php"; ?>
                    <?php include "$FRAG/liste_game.php"; ?>
                    <?php include "$FRAG/liste_sexe.php"; ?>
                    <?php include "$FRAG/liste_charme.php"; ?>
                    <input class="date" type="date" name="date" value="<?= isset($_POST["date"]) ? $_POST["date"] : "" ?>">
                    <?php
                    if (isset($_POST["oublie"])) { ?>
                        <label class="contents" for="oublie"><input id="oublie" type="checkbox" name="oublie" checked> Inconnu</label>
                    <?php } else { ?>
                        <label class="contents check_date" for="oublie"><input id="oublie" type="checkbox" name="oublie"> Inconnu</label>
                    <?php }
                    ?>
                    <input class="rye" type="submit" value="Valider le Pokémon">
                </form>
                <div class="flex">
                    <p class="color_aef4ec rye p_modif">Modifiez un pokémon</p>
                    <div><input class="search" type="text" placeholder="Rechercher Pokémon"></div>
                </div>
                <div class="flex search_div small-margin-left-20">
                    <?php
                    foreach ($listePok as $Pokemn) {
                        include "$FRAG/pokemon_card_modif.php";
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="../src/js/ajout.js"></script>
    <script src="../src/js/menu.js"></script>
    <script>
        setTimeout(() => {
            var mess = document.getElementById("msg-container");
            mess.style.top = "-100px";
            setTimeout(() => {
                mess.parentElement.removeChild(mess);
            }, 1000)

        }, 4000)
    </script>
</body>

</html>