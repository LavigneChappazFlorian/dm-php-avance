<?php

namespace Models;

use Models\Database;
use \PDO as PDO;
use \Exception as Exception;

class Enclosure extends Database 
{
    private int $id;
    private string $name;
    private string $description;
    private $created_at;

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

    //setter
    public function setId($id)
    {
        //Conditions inversées (en négation) pour alléger le code
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
        //Conditions inversées (en négation) pour alléger le code
        if (empty($name)) throw new Exception("Le nom de l'enclos est obligatoire");
        if (strlen($name) < 3) throw new Exception("Le nom de l'enclos doit contenir au moins 3 caractères");
        if (strlen($name) > 50) throw new Exception("Le nom de l'enclos doit contenir au plus 50 caractères");

        $this->name = htmlspecialchars($name);
    }

    public function setDescription($description)
    {
        //Conditions inversées (en négation) pour alléger le code
        if (empty($description)) throw new Exception("La description de l'enclos est obligatoire");
        if (strlen($description) < 3) throw new Exception("La description de l'enclos doit contenir au moins 3 caractères");
        if (strlen($description) > 250) throw new Exception("La description de l'enclos doit contenir au plus 250 caractères");

        $this->description = htmlspecialchars($description);
    }

    public function setCreated_at($created_at)
    {
        //Conditions inversées (en négation) pour alléger le code
        if (empty($created_at)) throw new Exception("La date de la création de l'enclos est obligatoire");
        if (strlen($created_at) < 3) throw new Exception("La date de la création de l'enclos doit contenir au moins 3 caractères");
        if (strlen($created_at) > 50) throw new Exception("La date de la création de l'enclos doit contenir au plus 50 caractères");

        $this->created_at = htmlspecialchars($created_at);
    }

    //Functions

    //Function for create "enclos"
    public function createEnclosure()
    {
        $sql = 'INSERT INTO `enclosures` (`name`, `description`, `created_at`) VALUES (:name, :description, :created_at)';
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
        $sth->bindValue(':created_at', $this->created_at, PDO::PARAM_STR);

        return $sth->execute();
    }

    // Fonction pour récupérer toutes les enclos
    public function getAllEnclosures()
    {
        $stmt = $this->pdo->query('SELECT * FROM `enclosures`');
        return $stmt->fetchAll();
    }

    // Fonction pour récupérer un enclos
    public function getEnclosure()
    {
        $sql = 'SELECT * FROM `enclosures` WHERE id = :id';
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        $sth->execute();

        // "PDO::FETCH_OBJ" Permet de retourner des objets et non un tableau contanant pleins de tableaux de données
        return $sth->fetch(PDO::FETCH_OBJ);
    }

    // Fonction pour mettre à jour les données d'un enclos
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

    // Fonction pour supprimer un enclos
    public function deleteEnclosure()
    {
        $stmt = $this->pdo->prepare('DELETE FROM `enclosures` WHERE `id` = ?');
        $stmt->execute([$this->id]);

        return $stmt->fetchAll();
    }
}
?>
