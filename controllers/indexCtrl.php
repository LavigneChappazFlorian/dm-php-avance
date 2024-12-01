<?php

// Create a new instance of the Enclosure model
$enclosure = new Models\Enclosure();

// Errors array
$error = [];

// Checking POST request
if (!empty($_POST)) {
    // Add an enclosure to the database
    // Check form “name” field on the form
    if (!empty($_POST['enclosureName'])) {
        try {
            $enclosure->setName($_POST['enclosureName']);
        } catch (Exception $e) {
            $error['name'] = $e->getMessage();
        }
    } else {
        $error['name'] = 'Nom obligatoire';
    };

    // Check the "description" field on the form
    if (!empty($_POST['enclosureDescription'])) {
        try {
            $enclosure->setDescription($_POST['enclosureDescription']);
        } catch (Exception $e) {
            $error['description'] = $e->getMessage();
        }
    } else {
        $error['description'] = 'Description obligatoire';
    };

    // Check the “date” field on the form
    if (!empty($_POST['enclosureDate'])) {
        try {
            $enclosure->setCreated_at($_POST['enclosureDate']);
        } catch (Exception $e) {
            $error['date'] = $e->getMessage();
        }
    } else {
        $error['date'] = 'Date obligatoire';
    };

    // check for errors
    if (empty($error)) {
        // Enclosure creation
        $enclosure->createEnclosure();
        // Redirect to the home page
        header('Location: /');
    } else {
        $error['global'] = 'Echec de la creation';
    };
}

// Render the 'index' view with the provided data
render('index', [
    'enclosures' => $enclosure->getAllEnclosures(),
    'errors' => $error
]);
?>