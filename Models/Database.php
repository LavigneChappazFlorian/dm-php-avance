<?php

// Namespace folder
namespace Models;

// Write PDO instead of \PDO to prevent errors in mySQL
use \PDO as PDO;


class Database
{
    // property declaration
    static private $instance = null; // “instance” property to know if an instance of the database has been created

    protected $pdo = null; // Property containing the database and its instance

    public function __construct()
    {
        if (!self::$instance) { // If no instance is created
            self::$instance = new PDO('mysql:dbname=zoo;host=localhost;charset=utf8', 'root', 'root', [ // Database connection
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        $this->pdo = self::$instance;
    }
}
