<?php 

// Create a new instance of the Enclosure model
$enclosure = new Models\Enclosure();

// Errors array
$errors = [];

// Check if the 'id' parameter in the URL is empty; if it is, redirect to the homepage
if (empty($_GET['id'])) redirectTo('/');
try {
    $enclosure->setId($_GET['id']);
} catch (\Throwable $th) {
    redirectTo('/');
}

// Checking POST request
if (!empty($_POST)) {
    // Add an animal to the database
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
        $error['description'] = 'Nom obligatoire';
    };

    // Check the “date” field on the form
    if (!empty($_POST['enclosureDate'])) {
        try {
            $enclosure->setCreated_at($_POST['enclosureDate']);
        } catch (Exception $e) {
            $error['date'] = $e->getMessage();
        }
    } else {
        $error['date'] = 'Nom obligatoire';
    };

    // check for errorss
    if (empty($error)) {
        // Création de l'enclos
        $enclosure->updateEnclosure();
        // Redirect to the home page
        header('Location: /');
    } else {
        $error['global'] = 'Echec de la creation';
    };
}

// Render the 'updateEnclosure' view with the provided data
render('updateEnclosure', [
    'enclosure' => $enclosure->getEnclosure(),
    'errors' => $errors
]);
?>