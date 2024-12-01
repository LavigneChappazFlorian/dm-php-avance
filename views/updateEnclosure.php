<!-- Page used to update enclosure data and view the animals associated with it!-->
<?php ob_start() ?>

<div class="create-enclosure">
    <form id="form-enclosure" method="POST">
        <div class="text-input">
            <div class="name-enclore form-group">
                <label for="enclosureName">Nom de l'enclos</label>
                <input type="text" name="enclosureName" id="enclosureName" value="<?= $data['enclosure']->name ?>" placeholder="Ecire le nom de l'enclos ici">
                <?php if (!empty($data['errors']['name'])) { ?>
                        <small><?= $data['errors']['name'] ?></small>
                <?php } ?>
            </div>
            <div class="description-enclosure form-group">
                <label for="enclosureDescription">Description de l'enclos :</label>
                <input type="text" name="enclosureDescription" id="enclosureDescription" value="<?= $data['enclosure']->description ?>" placeholder="Ecrire la desciption cercant l'enclos ici">
                <?php if (!empty($data['errors']['description'])) { ?>
                        <small><?= $data['errors']['description'] ?></small>
                <?php } ?>
            </div>
            <div class="date-enclosure form-group">
                <label for="enclosureDate">Date de création de l'enclos :</label>
                <input type="text" name="enclosureDate" id="enclosureDate" value="<?= $data['enclosure']->created_at ?>" placeholder="Ecrire la date sous la forme 'Jour/mois/Année'">
                <?php if (!empty($data['errors']['description'])) { ?>
                    <small><?= $data['errors']['date'] ?></small>
                <?php } ?>
            </div>
        </div>

        <button type="submit">Mettre à jour l'enclos</button>
    </form>
</div>

<?php
$content = ob_get_clean();

render('default', [
    'content' => $content,
], true)
?>