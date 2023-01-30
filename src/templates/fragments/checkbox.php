<?php
if (isset($_POST["rencontre"])) {
    if ($_POST["rencontre"] !== "") { ?>
        <input id="inconnu" type="checkbox" name="inconnu" value="1" disabled><span style="color: gray;"> Inconnu</span> 
    <?php } else { ?>
        <input id="inconnu" type="checkbox" name="inconnu" value="1"> Inconnu
    <?php }
}

if (isset($_POST["date"])) {
    if ($_POST["date"] !== "0000-00-00") { ?>
        <input id="oublie" type="checkbox" name="oublie" disabled><span style="color: gray;"> Inconnu</span> 
    <?php } else { ?>
        <input id="oublie" type="checkbox" name="oublie"> Inconnu 
<?php }
}
