<?php 

// Check if the 'id' parameter in the URL is empty; if it is, redirect to the homepage
if (empty($_GET['id'])) redirectTo('/');

// Create a new instance of the Enclosure model
$animal = new Models\Animal();

// Attempt to set the ID of the animal using the 'id' from the POST request
try {
    $animal->setId($_POST['id']);
} catch (\Throwable $th) {
    // If an error occurs while setting the ID, redirect to the homepage
    redirectTo('/');
}

// Call the method to delete the animal from the database
$animal->deleteAnimal();

// After deleting the animal, redirect to the homepage
redirectTo('/');

?>
