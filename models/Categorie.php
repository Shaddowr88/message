<?php
require_once 'services/db.php';


class Categorie{

    public $id = null;
    public $name = null;





    public function getid(){
        return $this->id;
    }

    public function setid($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }


    public function validate(){

        $errors = [];

        $pdo = getConnect();
        $pdoRequest = $pdo->prepare('SELECT categories.id FROM categories WHERE categories.name= :name');
        $pdoRequest -> bindValue('name', $this->name);
        $pdoRequest -> execute();

        if ($pdoRequest->rowCount()>0){
            $errors []= "la catégorie «{$this->name}» existe déjà";
        }

        if(strlen($this->name)>50){
            $errors []= "Le nom de la catégorie ne doit pas excéder 50 Chart.";
        }

        if(strlen($this->name)<1){
            $errors []= "Le nom de la catégorie ne doit pas etre vide.";
        }

        return $errors;

    }
};


