<?php global $FRAG; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "$FRAG/head.php" ?>
    <title>Inscription / Liv'ChromaDex</title>
</head>

<body>
    <div class="flex">
        <?php include "$FRAG/header.php" ?>
        <main class="width_86 small-100">
            <h1 class="color_fcca04 black_ops_one">Inscription</h1>
            <form class="form_center" method="POST" action="<?= $ROOT ?>/creation/">
                <div>
                    <label class="color_aef4ec rye" for="pseudo">Pseudo</label>
                    <input id="pseudo" name="pseudo" class="width_100" type="text" value="<?= isset($_POST["pseudo"]) ? $_POST["pseudo"] : "" ?>" />
                    <p class="color_red"> <?= isset($V->getErrors()["pseudo"]) ? $V->getErrors()["pseudo"][0] : "" ?> </p>
                </div>
                <div>
                    <label class="color_aef4ec rye" for="email">Email</label>
                    <input id="email" name="email" class="width_100" type="email" />
                    <p class="color_red"> <?= isset($V->getErrors()["email"]) ? $V->getErrors()["email"][0] : "" ?> </p>
                </div>
                <div>
                    <label class="color_aef4ec rye" for="mdp">Mot de passe</label>
                    <input id="mdp" name="mdp" class="width_100" type="password" />
                    <p class="color_red"> <?= isset($V->getErrors()["mdp"]) ? $V->getErrors()["mdp"][0] : "" ?> </p>
                </div>
                <input type="submit" value="Valider">
            </form>
        </main>
    </div>
    <script src="../src/js/menu.js"></script>
</body>

</html>