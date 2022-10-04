<?php
require_once 'models/Categorie.php';
require_once 'models/Room.php';
require_once 'services/db.php';

$errors = [];


$room=new Room();
if(isset($_POST['name'])){

    $r = ucfirst(trim($_POST['name']));
    $categoryId= $_GET['category_id'];


    $room->setName($r);
    $room->setCategoryId($categoryId);

    $errors = $room->validate();

    if(empty($errors)){
        $pdo = getConnect();
        $pdoRequest = $pdo->prepare('INSERT INTO rooms (name, category_id) VALUES (:name, :category_id)');
        $pdoRequest-> bindValue(':name', $r );
        $pdoRequest-> bindValue(':category_id', $categoryId );
        $pdoRequest->execute();
    }
}

require 'view/addRoom.html';



