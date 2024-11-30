<?php

$enclosure = new Models\Enclosure();

// Errors array
$error = [];

// Vérification d'une requête POST
if (!empty($_POST)) {
    // Ajouter un enclos à la bddd
    // Vérification du champ "nom" du formulaire
    if (!empty($_POST['enclosureName'])) {
        try {
            $enclosure->setName($_POST['enclosureName']);
        } catch (Exception $e) {
            $error['name'] = $e->getMessage();
        }
    } else {
        $error['name'] = 'Nom obligatoire';
    };

    // Vérification du champ "description" du formulaire
    if (!empty($_POST['enclosureDescription'])) {
        try {
            $enclosure->setDescription($_POST['enclosureDescription']);
        } catch (Exception $e) {
            $error['description'] = $e->getMessage();
        }
    } else {
        $error['description'] = 'Nom obligatoire';
    };

    // Vérification du champ "date" du formulaire
    if (!empty($_POST['enclosureDate'])) {
        try {
            $enclosure->setCreated_at($_POST['enclosureDate']);
        } catch (Exception $e) {
            $error['date'] = $e->getMessage();
        }
    } else {
        $error['date'] = 'Nom obligatoire';
    };

    // vérification de l'absence d'erreur
    if (empty($error)) {
        // Création de l'enclos
        $enclosure->createEnclosure();
        // Redirect to the home page
        header('Location: /');
    } else {
        $error['global'] = 'Echec de la creation';
    };
}

render('index', [
    'enclosures' => $enclosure->getAllEnclosures(),
    'errors' => $error
]);
?>