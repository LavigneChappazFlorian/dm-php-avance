<?php

namespace Models;

use \PDO as PDO;

class Database
{
    static private $instance = null; // Variable "instance"  pour savoir si une instance de la bdd est créée

    protected $pdo = null; // Variable contenant la bdd avec son instance

    public function __construct()
    {
        if (!self::$instance) { // Si aucune instance est créée
            self::$instance = new PDO('mysql:dbname=zoo;host=localhost;charset=utf8', 'root', 'root', [ // Connexion à la base de données
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        $this->pdo = self::$instance;
    }
}
