<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Liv'ChromaDex</title>
</head>

<body>
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
        <script>
            setTimeout(() => {
                var mess = document.getElementById("msg-container");
                mess.style.top = "-100px";
                setTimeout(() => {
                    mess.parentElement.removeChild(mess);
                }, 1000)

            }, 4000)
        </script>
    <?php
    }
    ?>
    <div class="container">
        <main id="fConnect">
            <h1 class="h1_home black_ops_one"><span class="color_fcca04">Liv</span><span class="color_ff4646">'</span><span class="color_fcca04">Chroma</span><span class="color_ff4646">Dex</span></h1>
            <div class="container_btn_home small-margin-left-70">
                <?php if (isset($_SESSION["connected"]) and $_SESSION["connected"] === true) { ?>
                    <a class="btn rye small-80" href="<?= $ROOT ?>/monDex/">Ouvrir mon Dex</a>
                    <a class="btn rye small-80" href="<?= $ROOT ?>/deconnexion/">Se déconnecter</a>
                <?php } else { ?>
                    <a class="btn rye small-80" href="<?= $ROOT ?>/connexion/">Se connecter</a>
                    <a class="btn rye small-80" href="<?= $ROOT ?>/inscription/">Créer un compte</a>
                <?php } ?>

            </div>
        </main>
    </div>
    <script src="../src/js/menu.js"></script>

</body>

</html>