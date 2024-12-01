<?php 

// Namespace folder
namespace Models;
// To use the Database model
use Models\Database;
// Write PDO instead of \PDO to prevent errors in mySQL
use \PDO as PDO;
// Write Exception instead of \Exception to prevent errors in mySQL
use \Exception as Exception;

class Animal extends Database
{
    // private property declaration
    private int $id;
    private string $name;
    private string $description;
    private string $specie;
    private string $created_at;
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

    public function getSpecie(){
        return $this->specie;
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
        if (empty($id)) throw new Exception("L\'id de l'animal est obligatoire");
        if (!is_numeric($id)) throw new Exception("L\'id de l'animal doit être un entier");
        $floatVal = floatval($id);
        $id = intval($id);
        if ($id != $floatVal) throw new Exception("L\'id de l'animal doit être un entier");
        if ($id <= 0) throw new Exception("L\'id de l'animal doit être supérieur à 0");

        $this->id = $id;
    }

    public function setName($name)
    {
        //Inverse conditions (in negation) to lighten the code
        if (empty($name)) throw new Exception("Le nom de l'animal est obligatoire");
        if (strlen($name) < 3) throw new Exception("Le nom de l'animal doit contenir au moins 3 caractères");
        if (strlen($name) > 50) throw new Exception("Le nom de l'animal doit contenir au plus 50 caractères");

        $this->name = htmlspecialchars($name);
    }

    public function setSpecie($specie)
    {
        //Inverse conditions (in negation) to lighten the code
        if (empty($specie)) throw new Exception("L'espèce de l'animal est obligatoire");
        if (strlen($specie) < 3) throw new Exception("L'espèce de l'animal doit contenir au moins 3 caractères");
        if (strlen($specie) > 250) throw new Exception("L'espèce de l'animal doit contenir au plus 250 caractères");

        $this->specie = htmlspecialchars($specie);
    }

    public function setDescription($description)
    {
        //Inverse conditions (in negation) to lighten the code
        if (empty($description)) throw new Exception("La description de l'animal est obligatoire");
        if (strlen($description) < 3) throw new Exception("La description de l'animal doit contenir au moins 3 caractères");
        if (strlen($description) > 250) throw new Exception("La description de l'animal doit contenir au plus 250 caractères");

        $this->description = htmlspecialchars($description);
    }

    public function setCreated_at($created_at)
    {
        //Inverse conditions (in negation) to lighten the code
        if (empty($created_at)) throw new Exception("La date de la création de l'animal est obligatoire");
        if (strlen($created_at) < 3) throw new Exception("La date de la création de l'animal doit contenir au moins 3 caractères");
        if (strlen($created_at) > 50) throw new Exception("La date de la création de l'animal doit contenir au plus 50 caractères");

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

    //Function to create an animal
    public function createAnimal()
    {
        $sql = 'INSERT INTO `animals` (`name`, `description`, `specie`, `created_at`, `enclos_id`) VALUES (:name, :description, :specie, :created_at, :enclos_id)';
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
        $sth->bindValue(':specie', $this->specie, PDO::PARAM_STR);
        $sth->bindValue(':created_at', $this->created_at, PDO::PARAM_STR);
        $sth->bindValue(':enclos_id', $this->enclos_id, PDO::PARAM_INT);

        return $sth->execute();
    }

    // Function to recover all animals
    public function getAllAnimals()
    {
        $stmt = $this->pdo->query('SELECT * FROM `animals`');
        return $stmt->fetchAll();
    }

    // Function to recover an animal
    public function getAnimal()
    {
        $sql = 'SELECT * FROM `animals` WHERE id = :id';
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->execute();

        // "PDO::FETCH_OBJ" Returns objects rather than an array containing many data arrays
        return $sth->fetch(PDO::FETCH_OBJ);
    }

    // Function to update animal data
    public function updateAnimal()
    {
        $sql = 'UPDATE `animals` SET `name`= :name, `description` = :description , `specie` = :specie, `created_at`= :created_at, `enclos_id` = :enclos_id WHERE `id` = :id';
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
        $sth->bindValue(':specie', $this->specie, PDO::PARAM_STR);
        $sth->bindValue(':created_at', $this->created_at, PDO::PARAM_STR);
        $sth->bindValue(':enclos_id', $this->enclos_id, PDO::PARAM_INT);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $sth->execute();
    }

    // Function to delete an animal
    public function deleteAnimal()
    {
        $stmt = $this->pdo->prepare('DELETE FROM `animals` WHERE `id` = ?');
        $stmt->execute([$this->id]);

        return $stmt->fetchAll();
    }
}?>