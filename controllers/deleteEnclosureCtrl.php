<?php 

if (empty($_GET['id'])) redirectTo('/');

$enclosure = new Models\Enclosure();

// Si l'id dans l'adresse est vide on redirige vers la page d'acceuil sinon on récupère l'id de la tâche
try {
    $enclosure->setId($_POST['id']);
} catch (\Throwable $th) {
    redirectTo('/');
}

$enclosure->deleteEnclosure();

redirectTo('/');

?>