<?php

require_once 'services/db.php';


class Room
{

    public $id = null;
    public $categoryId = null;
    public $name = null;

    // id
    public function getid()
    {
        return $this->id;
    }

    public function setid($id)
    {
        $this->id = $id;
    }


    // CategoryId
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    // Name
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function validate(){

        $errors = [];

        $pdo = getConnect();
        $pdoRequest = $pdo->prepare('
            SELECT rooms.id FROM rooms
            WHERE rooms.name = :name AND rooms.category_id = :category_id
        ');
        $pdoRequest->bindValue(':name', $this->name);
        $pdoRequest->bindValue(':category_id', $this->categoryId);
        $pdoRequest -> execute();

        if ($pdoRequest->rowCount()>0){
            $errors []= "la le salon «{$this->name}» existe déjà";
        }

        if(strlen($this->name)>50){
            $errors []= "Le nom du salon ne doit pas excéder 50 Chart.";
        }

        if(strlen($this->name)<1){
            $errors []= "Le nom du salon ne doit pas être vide.";
        }

        return $errors;

    }

}

;


