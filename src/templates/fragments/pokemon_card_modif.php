  <div class="container_card_modif flex width_15 medium-20 small-40">
      <a class="d-contents" href="<?= $ROOT ?>/modif/<?= $Pokemn->id() ?>">
          <div class="card_modif flex justify_between width_100">
              <div class="width_30 flex justify_center align_center">
                  <img class="img_pokemon width_100" src="../img/pokemon/<?= $Pokemn->getTarget("pokedex_id")->get("image") ?>" alt="">
              </div>
              <div class="width_30 flex justify_center align_center">
                <p><?= $Pokemn->getTarget("pokedex_id")->get("nom") ?></p>
              </div>
              <div class="width_30 flex justify_center align_center">
                  <img class="pokeball_modif" src="../img/pokeball/<?= $Pokemn->getTarget("pokeball_id")->get("image") ?>" alt="">
              </div>
          </div>
      </a>
  </div>