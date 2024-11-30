<?php ob_start() ?>

    <div class="create-enclosure">
        <form id="form-enclosure" method="POST">
            <div class="text-input">
                <div class="name-enclore form-group">
                    <label for="enclosureName">Nom de l'enclos</label>
                    <input type="text" name="enclosureName" id="enclosureName" placeholder="Ecire le nom de l'enclos ici">
                    <?php if (!empty($data['errors']['name'])) { ?>
                        <small><?= $data['errors']['name'] ?></small>
                    <?php } ?>
                </div>
                <div class="description-enclosure form-group">
                    <label for="enclosureDescription">Description de l'enclos</label>
                    <input type="text" name="enclosureDescription" id="enclosureDescription" placeholder="Ecrire la desciption cercant l'enclos ici">
                    <?php if (!empty($data['errors']['description'])) { ?>
                        <small><?= $data['errors']['description'] ?></small>
                    <?php } ?>
                </div>
                <div class="date-enclosure form-group">
                    <label for="enclosureDate">Date de création de l'enclos :</label>
                    <input type="text" name="enclosureDate" id="enclosureDate" placeholder="Ecrire la date sous la forme 'Jour/mois/Année'">
                    <?php if (!empty($data['errors']['date'])) { ?>
                        <small><?= $data['errors']['date'] ?></small>
                    <?php } ?>
                </div>
            </div>

            <button type="submit">Créer un enclos</button>
        </form>
    </div>

    <?php foreach($data['enclosures'] as $enclosure) { 
        render('enclosures/enclosure', ['enclosure' => $enclosure], true); 
    } ?>

<?php
$content = ob_get_clean();

render('default', [
    'content' => $content
], true) 
?>