<?php

// Namespace folder
namespace Models;
// To use the Database model
use Models\Database;
// Write PDO instead of \PDO to prevent errors in mySQL
use \PDO as PDO;
// Write Exception instead of \Exception to prevent errors in mySQL
use \Exception as Exception;

class Enclosure extends Database 
{
    // private property declaration
    private int $id;
    private string $name;
    private string $description;
    private $created_at;
    private int $enclos_id;

    // getter
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getCreated_at(){
        return $this->created_at;
    }

    public function getEnclos_id(){
        return $this->enclos_id;
    }

    //setter
    public function setId($id)
    {
        //Inverse conditions (in negation) to lighten the code
        if (empty($id)) throw new Exception("L\'id de l'enclos est obligatoire");
        if (!is_numeric($id)) throw new Exception("L\'id de l'enclos doit être un entier");
        $floatVal = floatval($id);
        $id = intval($id);
        if ($id != $floatVal) throw new Exception("L\'id de l'enclos doit être un entier");
        if ($id <= 0) throw new Exception("L\'id de l'enclos doit être supérieur à 0");

        $this->id = $id;
    }

    public function setName($name)
    {
        //Inverse conditions (in negation) to lighten the code
        if (empty($name)) throw new Exception("Le nom de l'enclos est obligatoire");
        if (strlen($name) < 3) throw new Exception("Le nom de l'enclos doit contenir au moins 3 caractères");
        if (strlen($name) > 50) throw new Exception("Le nom de l'enclos doit contenir au plus 50 caractères");

        $this->name = htmlspecialchars($name);
    }

    public function setDescription($description)
    {
        //Inverse conditions (in negation) to lighten the code
        if (empty($description)) throw new Exception("La description de l'enclos est obligatoire");
        if (strlen($description) < 3) throw new Exception("La description de l'enclos doit contenir au moins 3 caractères");
        if (strlen($description) > 250) throw new Exception("La description de l'enclos doit contenir au plus 250 caractères");

        $this->description = htmlspecialchars($description);
    }

    public function setCreated_at($created_at)
    {
        //Inverse conditions (in negation) to lighten the code
        if (empty($created_at)) throw new Exception("La date de la création de l'enclos est obligatoire");
        if (strlen($created_at) < 3) throw new Exception("La date de la création de l'enclos doit contenir au moins 3 caractères");
        if (strlen($created_at) > 50) throw new Exception("La date de la création de l'enclos doit contenir au plus 50 caractères");

        $this->created_at = htmlspecialchars($created_at);
    }

    public function setEnclos_id($enclos_id)
    {
        //Inverse conditions (in negation) to lighten the code
        if (empty($enclos_id)) throw new Exception("L\'id de l'enclos de l'animal est obligatoire");
        if (!is_numeric($enclos_id)) throw new Exception("L\'id de l'enclos de l'animal doit être un entier");
        $floatVal = floatval($enclos_id);
        $enclos_id = intval($enclos_id);
        if ($enclos_id != $floatVal) throw new Exception("L\'id de l'enclos de l'animal doit être un entier");
        if ($enclos_id <= 0) throw new Exception("L\'id de l'enclos de l'animal doit être supérieur à 0");

        $this->enclos_id = $enclos_id;
    }

    //Functions

    //Function for create an enclosure
    public function createEnclosure()
    {
        $sql = 'INSERT INTO `enclosures` (`name`, `description`, `created_at`) VALUES (:name, :description, :created_at)';
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
        $sth->bindValue(':created_at', $this->created_at, PDO::PARAM_STR);

        return $sth->execute();
    }

    // Function to recover all enclosures
    public function getAllEnclosures()
    {
        $stmt = $this->pdo->query('SELECT * FROM `enclosures`');
        return $stmt->fetchAll();
    }

    // Function to recover an enclosure
    public function getEnclosure()
    {
        $sql = 'SELECT * FROM `enclosures` WHERE id = :id';
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->execute();

        // "PDO::FETCH_OBJ" Returns objects rather than an array containing many data arrays
        return $sth->fetch(PDO::FETCH_OBJ);
    }

    // Function to update enclosure data
    public function updateEnclosure()
    {
        $sql = 'UPDATE `enclosures` SET `name`= :name, `description` = :description ,`created_at`= :created_at WHERE `id` = :id';
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
        $sth->bindValue(':created_at', $this->created_at, PDO::PARAM_STR);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $sth->execute();
    }

    // Function to delete an enclosure
    public function deleteEnclosure()
    {
        $stmt = $this->pdo->prepare('DELETE FROM `enclosures` WHERE `id` = ?');
        $stmt->execute([$this->id]);

        return $stmt->fetchAll();
    }

    // Function to display animals in the enclosure
    public function getAllAnimals($enclos_id){
        $sql = $this->pdo->query('SELECT * FROM `animals` WHERE `enclos_id` = :enclos_id');
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':enclos_id', $enclos_id, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll();
    }
}?>
