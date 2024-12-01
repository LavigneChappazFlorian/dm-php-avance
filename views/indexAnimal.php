<!-- <!-- Home page for creating an animal and view all animals already created !-->
<?php ob_start() ?>

    <div class="create-animal">
        <form id="form-animal" method="POST">
            <div class="text-input">
                <div class="name-enclore form-group">
                    <label for="animalName">Nom de l'animal</label>
                    <input type="text" name="animalName" id="animalName" placeholder="Ecire le nom de l'animal ici">
                    <?php if (!empty($data['errors']['name'])) { ?>
                        <small><?= $data['errors']['name'] ?></small>
                    <?php } ?>
                </div>
                <div class="description-animal form-group">
                    <label for="animalDescription">Description de l'animal</label>
                    <input type="text" name="animalDescription" id="animalDescription" placeholder="Ecrire la desciption cercant l'animal ici">
                    <?php if (!empty($data['errors']['description'])) { ?>
                        <small><?= $data['errors']['description'] ?></small>
                    <?php } ?>
                </div>
                <div class="espece-animal form-group">
                    <label for="animalSpecie">Espèce de l'animal</label>
                    <input type="text" name="animalSpecie" id="animalSpecie" placeholder="Ecrire l'espèce de l'animal ici">
                    <?php if (!empty($data['errors']['specie'])) { ?>
                        <small><?= $data['errors']['specie'] ?></small>
                    <?php } ?>
                </div>
                <div class="date-animal form-group">
                    <label for="animalDate">Date de création de l'animal :</label>
                    <input type="text" name="animalDate" id="animalDate" placeholder="Ecrire la date sous la forme 'Jour/mois/Année'">
                    <?php if (!empty($data['errors']['date'])) { ?>
                        <small><?= $data['errors']['date'] ?></small>
                    <?php } ?>
                </div>
                <div class="enclos-id-animal form-group">
                    <label for="enclosureId" class="form-label">Enclos de l'animal :</label>
                    <select class="form-select" id="enclosureId" name="enclosureId">
                        <option value="" selected disabled>Choisir un enclos</option>
                        <?php
                        foreach ($data['enclosures'] as $enclosure) { ?>
                            <option value="<?= $enclosure['id'] ?>"><?= $enclosure['name'] ?></option>
                        <?php } ?>
                    </select>
                    <?php if (!empty($data['errors']['enclosureId'])) { ?> 
                    <small><?= $data['errors']['enclosureId'] ?></small>    
                    <?php } ?>
                </div>
            </div>

            <button type="submit">Créer un animal</button>
        </form>
    </div>

    <?php foreach($data['animals'] as $animal) { 
        render('enclosures/animal', [
            'animal' => $animal,
            'enclosure' => $enclosure], true); 
    } ?>

<?php
$content = ob_get_clean();

render('default', [
    'content' => $content
], true) 
?>