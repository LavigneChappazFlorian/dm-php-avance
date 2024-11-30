<?php

// Le fait de "require" utils.php  & splAutoload.php dans le routeur permet de les "require" dans tous les autres fichiers du site
require 'utils/utils.php';
require 'utils/splAutoload.php';


// Sytème de redirection avec des conditions
switch ($_SERVER['REDIRECT_URL']) {
    case '/':
        require 'controllers/indexCtrl.php';
        break;

    case '/enclosure/update';
        require 'controllers/updateEnclosureCtrl.php';
        break;

    case '/enclosure/delete';
        require 'controllers/deleteEnclosureCtrl.php';
        break;

    default: 
        require 'views/error404.php';
        break;
}