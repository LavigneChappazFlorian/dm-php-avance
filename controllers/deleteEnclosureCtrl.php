<?php 

// Check if the 'id' parameter in the URL is empty; if it is, redirect to the homepage
if (empty($_GET['id'])) redirectTo('/');

// Create a new instance of the Enclosure model
$enclosure = new Models\Enclosure();

// Attempt to set the ID of the enclosure using the 'id' from the POST request
try {
    $enclosure->setId($_POST['id']);
} catch (\Throwable $th) {
    // If an error occurs while setting the ID, redirect to the homepage
    redirectTo('/');
}

// Call the method to delete the enclosure from the database
$enclosure->deleteEnclosure();

// After deleting the enclosure, redirect to the homepage
redirectTo('/');

?>
