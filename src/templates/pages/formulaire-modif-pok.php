<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "$FRAG/head.php" ?>
    <title>Modification du pokémon / Liv'ChromaDex</title>
</head>

<body>
    <div class="flex">
        <?php include "$FRAG/header.php" ?>
        <main class="width_86 small-100">
            <h1 class="color_fcca04 black_ops_one">Modification du pokémon</h1>
            <div class="container">
                <div class="form_modif relative">
                    <div class="relative text-center">
                        <div>
                            <img src="../img/pokemon/<?= $Pokemn->getTarget("pokedex_id")->get("image") ?>" alt="">
                        </div>
                        <p>#<?= $Pokemn->getTarget("pokedex_id")->get("numero") ?> -- <?= $Pokemn->getTarget("pokedex_id")->get("nom") ?></p>

                    </div>
                    <form method="post" action="<?= $ROOT ?>/traitement_modif/<?= $Pokemn->id(); ?>">
                        <input class="modif_hidden" type="hidden" value="<?= $Pokemn->id(); ?>">
                        <?php
                        if ($Pokemn->get("nb_rencontre") !== "Inconnu") { ?>
                            <input type="number" class="nb_rencontre small-margin-10" name="nb_rencontre" placeholder="Nombre" value="<?= $Pokemn->get("nb_rencontre") ?>">
                            <label class="contents check_nb" for="inconnu"><input id="inconnu" type="checkbox" name="inconnu" value="1" disabled> <span style="color: gray;"> Inconnu</span></label>

                        <?php } else { ?>
                            <input type="number" class="nb_rencontre small-margin-10" name="nb_rencontre" placeholder="Nombre">
                            <label class="contents check_nb" for="inconnu"><input id="inconnu" type="checkbox" name="inconnu" value="1" checked> Inconnu</label>
                        <?php }
                        ?>
                        <?php include "$FRAG/liste_methode.php"; ?>
                        <?php include "$FRAG/liste_pokeball.php"; ?>
                        <?php include "$FRAG/liste_game.php"; ?>
                        <select class="small-margin-10" name="sexe" id="sexe" required>
                            <option>Quel sexe ?</option>
                            <?php if ($Pokemn->get("sexe") === "Female") { ?>
                                <option value="Female" selected>Female</option>
                                <option value="Mâle">Mâle</option>
                                <option value="Aucun">Aucun</option>
                            <?php } elseif ($Pokemn->get("sexe") === "Male") { ?>
                                <option value="Female">Female</option>
                                <option value="Male" selected>Mâle</option>
                                <option value="Aucun">Aucun</option>
                            <?php } else { ?>
                                <option value="Female">Female</option>
                                <option value="Male">Mâle</option>
                                <option value="Aucun" selected>Aucun</option>
                            <?php } ?>
                        </select>
                        <select class="small-margin-10" name="charm" id="charm" required>
                            <option value="" selected>Avec le charme chroma ?</option>
                            <?php if ($Pokemn->get("charm") == 1) { ?>
                                <option value="1" selected>OUI</option>
                                <option value="0">NON</option>
                            <?php } else { ?>
                                <option value="1">OUI</option>
                                <option value="0" selected>NON</option>
                            <?php } ?>
                        </select>
                        <?php
                        if ($Pokemn->get("date") !== "0000-00-00") { ?>
                            <input type="date" class="date small-margin-10" name="date" value="<?= $Pokemn->get("date") ?>">
                        <?php } else { ?>
                            <input type="date" class="date small-margin-10" name="date">
                            <label class="contents check_date" for="oublie"><input id="oublie" type="checkbox" name="oublie" value="1" checked> Inconnu</label>
                        <?php }
                        ?>
                        <input type="submit" value="Modifier le pokémon">
                    </form>
                    <div class="absolute btn btn_suppr">supprimer</div>
                    <div class="flex popup">
                        <p>Voulez-vous vraiment supprimer le pokémon ?</p>
                        <div class="flex justify_around">
                            <form method="post" action="<?= $ROOT ?>/traitement_suppr/<?= $Pokemn->id(); ?>">
                                <input id="btn_accept_suppr" type="submit" value="Oui">
                            </form>
                            <div id="btn_refus_suppr" class="btn btn_cancel width_86">Non</div>
                        </div>

                    </div>
                    <div class="mask"></div>
                </div>
                <a class="btn btn_cancel small-80 small-margin-30-auto" href="<?= $ROOT ?>/ajout/">Annuler la modification</a>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="../src/js/form_modif.js"></script>
    <script src="../src/js/menu.js"></script>
</body>

</html>