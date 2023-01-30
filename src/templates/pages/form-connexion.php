<?php global $FRAG;?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include "$FRAG/head.php" ?>
    <title>Page de connexion / Liv'ChromaDex</title>
</head>
<body>
<div class="flex">
        <?php include "$FRAG/header.php" ?>
        <main class="width_86 small-100">
            <h1 class="color_fcca04 black_ops_one">Connexion</h1>
            <form class="form_center" method="POST" action="<?= $ROOT ?>/connecte/">
                <div>
                    <label class="color_aef4ec rye" for="email">Email</label>
                    <input id="email" name="email" class="width_100" type="email" value="<?= isset($_POST["email"]) ? $_POST["email"] : "" ?>"/>
                    <p class="color_red"><?= isset($error_email) ? $error_email: "" ?></p>
                </div>
                <div>
                    <label class="color_aef4ec rye" for="mdp">Mot de passe</label>
                    <input id="mdp" name="mdp" class="width_100" type="password" value=""/>
                    <p class="color_red"><?= isset($error_mdp) ? $error_mdp : "" ?></p>
                </div>
                <input type="submit" value="Valider">
            </form>
        </main>
    </div>
    <script src="../src/js/menu.js"></script>
</body>
</html>