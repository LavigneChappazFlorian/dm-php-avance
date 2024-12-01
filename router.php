<?php

// Requiring utils.php & splAutoload.php in the router will require them in all other files on the site
require 'utils/utils.php';
require 'utils/splAutoload.php';


// Redirection system with conditions
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

    case '/animal';
        require 'controllers/indexAnimalCtrl.php';
        break;

    case '/animal/update';
        require 'controllers/updateAnimalCtrl.php';
        break;

    case '/animal/delete';
        require 'controllers/deleteAnimalCtrl.php';
        break;

    default: 
        require 'views/error404.php';
        break;
}