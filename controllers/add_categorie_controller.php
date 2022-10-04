<?php
require_once 'models/Categorie.php';
require_once 'services/db.php';

$errors = [];
$toto=new Categorie();

if(isset($_POST['name'])){

    $n = ucfirst(trim($_POST['name']));

    // Hydrate l'instance Categorie
    $toto->setName($n);

    $errors = $toto->validate();

    if(empty($errors)){
        $pdo = getConnect();
        $pdoRequest = $pdo->prepare('INSERT INTO categories (name) VALUES (:name)');
        $pdoRequest-> bindValue(':name', $n );
        $pdoRequest->execute();
    }
}

require 'view/addCategorie.html';
