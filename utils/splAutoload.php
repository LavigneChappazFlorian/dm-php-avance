<?php 
    // This function automatically loads classes without having to include them manually
    spl_autoload_register(function ($class) {
        // Replace backslashes with slashes in the class name
        $class = str_replace('\\', '/', $class);
        // Includes the class file using the modified name
        require "$class.php";
    })
?>