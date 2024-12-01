<?php

// Create a new instance of the Enclosure and the Animal model
$animal = new Models\Animal();
$enclosure = new Models\Enclosure();

// Errors array
$error = [];

// Checking POST request
if (!empty($_POST)) {
    // Add an animal to the database
    // Check form “name” field on the form
    if (!empty($_POST['animalName'])) {
        try {
            $animal->setName($_POST['animalName']);
        } catch (Exception $e) {
            $error['name'] = $e->getMessage();
        }
    } else {
        $error['name'] = 'Nom obligatoire';
    };

    // Check the "description" field on the form
    if (!empty($_POST['animalDescription'])) {
        try {
            $animal->setDescription($_POST['animalDescription']);
        } catch (Exception $e) {
            $error['description'] = $e->getMessage();
        }
    } else {
        $error['description'] = 'Description obligatoire';
    };

    // Check the "specie" field on the form
    if (!empty($_POST['animalSpecie'])) {
        try {
            $animal->setSpecie($_POST['animalSpecie']);
        } catch (Exception $e) {
            $error['specie'] = $e->getMessage();
        }
    } else {
        $error['specie'] = 'Espèce obligatoire';
    };

    // Check the “date” field on the form
    if (!empty($_POST['animalDate'])) {
        try {
            $animal->setCreated_at($_POST['animalDate']);
        } catch (Exception $e) {
            $error['date'] = $e->getMessage();
        }
    } else {
        $error['date'] = 'Date obligatoire';
    };

    // Check the “enclosureId” field on the form
    if (!empty($_POST['enclosureId'])) {
        try {
            $animal->setEnclos_id($_POST['enclosureId']);
        } catch (Exception $e) {
            $error['enclosureId'] = $e->getMessage();
        }
    } else {
        $error['enclosureId'] = 'Enclos obligatoire';
    };

    // check for errors
    if (empty($error)) {
        // Animal creation
        $animal->createAnimal();
        // Redirect to the home page
        header('Location: /');
    } else {
        $error['global'] = 'Echec de la creation';
    };
}

// Render the 'indexAnimal' view with the provided data
render('indexAnimal', [
    'animals' => $animal->getAllAnimals(),
    'enclosures' => $enclosure->getAllEnclosures(),
    'errors' => $error
]);
?>