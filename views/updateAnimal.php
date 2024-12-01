<!-- Page used to update animal data -->
<?php ob_start() ?>

<div class="create-animal">
    <form id="form-animal" method="POST">
        <div class="text-input">
            <div class="name-animal form-group">
                <label for="animalName">Nom de l'animal</label>
                <input type="text" name="animalName" id="animalName" value="<?= $data['animal']->name ?>" placeholder="Ecire le nom de l'animal ici">
                <?php if (!empty($data['errors']['name'])) { ?>
                        <small><?= $data['errors']['name'] ?></small>
                <?php } ?>
            </div>
            <div class="description-animal form-group">
                <label for="animalDescription">Description de l'animal :</label>
                <input type="text" name="animalDescription" id="animalDescription" value="<?= $data['animal']->description ?>" placeholder="Ecrire la desciption de l'animal ici">
                <?php if (!empty($data['errors']['description'])) { ?>
                        <small><?= $data['errors']['description'] ?></small>
                <?php } ?>
            </div>
            <div class="specie-animal form-group">
                <label for="animalSpecie">Espèce de l'animal :</label>
                <input type="text" name="animalSpecie" id="animalSpecie" value="<?= $data['animal']->specie ?>" placeholder="Ecrire la desciption de l'animal ici">
                <?php if (!empty($data['errors']['specie'])) { ?>
                        <small><?= $data['errors']['specie'] ?></small>
                <?php } ?>
            </div>
            <div class="date-animal form-group">
                <label for="animalDate">Date de création de l'animal :</label>
                <input type="text" name="animalDate" id="animalDate" value="<?= $data['animal']->created_at ?>" placeholder="Ecrire la date sous la forme 'Jour/mois/Année'">
                <?php if (!empty($data['errors']['date'])) { ?>
                    <small><?= $data['errors']['date'] ?></small>
                <?php } ?>
            </div>
            <div class="enclos-id-animal form-group">
                <label for="animalEnclosId" class="form-label">Enclos de l'animal :</label>
                <select class="form-select" id="animalEnclosId" name="animalEnclosId">
                    <?php
                    foreach ($data['enclosures'] as $enclosure) { ?>
                        <option value="<?= $enclosure['id'] ?>"><?= $enclosure['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <button type="submit">Mettre à jour l'animal</button>
    </form>
</div>

<?php
$content = ob_get_clean();

render('default', [
    'content' => $content,
], true)
?>