<?php
require_once 'services/db.php';
require_once 'models/Categorie.php';
require_once 'models/Room.php';
require_once 'models/Message.php';

$pdo = getConnect();

// Clectionner toutes les category avec chaque rooms correspondantes
$query = $pdo->prepare( 'SELECT
        rooms.id AS room_id, rooms.name AS room_name,
        categories.id AS category_id, categories.name AS category_name
    FROM categories
    LEFT JOIN rooms ON rooms.category_id = categories.id
    ORDER BY categories.name ASC, rooms.name ASC');
$query -> execute();


//var_dump($multiDatas);

$categories =[];
while ($multiDatas= $query -> fetchAll(PDO::FETCH_ASSOC)){
    if(isset($categories[$multiDatas['category_id']])){
        $categories[$multiDatas['category_id']]['category']= new Categorie(
            $multiDatas['category_name'],
            $multiDatas['category_id']
        );


    }
}




//var_dump($categories);





require 'view/chat.html';