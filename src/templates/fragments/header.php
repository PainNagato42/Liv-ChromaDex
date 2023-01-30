<?php global $ROOT; ?>
<header class="rye">
    <a class="logo black_ops_one color_ff4646" href="<?= $ROOT ?>/"><span class="color_fcca04">Liv</span>'<span class="color_fcca04">Chroma</span>Dex</a>
    <nav>
        <ul>
            <li><a href="<?= $ROOT ?>">Page d'accueil</a></li>
            <?php
            if (isset($_SESSION["connected"]) and $_SESSION["connected"] === true) { ?>
                <li><a href="<?= $ROOT ?>/monDex/">Mon Dex</a></li>
            <?php }
            ?>
            <?php
            if (isset($_SESSION["connected"]) and $_SESSION["connected"] === true) { ?>
                <li><a href="<?= $ROOT ?>/generation/">générations</a></li>
            <?php }
            ?>
            <?php
            if (isset($_SESSION["connected"]) and $_SESSION["connected"] === true) { ?>
                <li><a href="<?= $ROOT ?>/ajout/">Ajouter / Modifier Pokémon</a></li>
            <?php }
            ?>
            <?php
            if (isset($_SESSION["connected"]) and $_SESSION["connected"] === true) { ?>
                <li><a href="<?= $ROOT ?>/badges/">Badges</a></li>
            <?php }
            ?>
            <?php
            if (isset($_SESSION["connected"]) and $_SESSION["connected"] === true) { ?>
                <li><a href="<?= $ROOT ?>/stats/">Statistiques</a></li>
            <?php }
            ?>
            <?php
            if (isset($_SESSION["connected"]) and $_SESSION["connected"] === true) { ?>
                <li><a class="btn connecte" href="<?= $ROOT ?>/deconnexion/">Se déconnecter</a></li>
            <?php }
            ?>
        </ul>
        <?php
        if (!isset($_SESSION["connected"]) or $_SESSION["connected"] === false) { ?>
            <li><a class="btn connecte" href="<?= $ROOT ?>/connexion/">Se connecter</a></li>
        <?php }
        ?>

    </nav>
    <div class="none medium-block small-block menu color_aef4ec">Menu</div>
</header>