<?php
require_once 'services/db.php';


class Message{

    public $id = null;
    public $roomId = null;
    public $content = null;
    public $pinned = false;
    public $cretedAt = null;


    // id
    public function getid(){
        return $this->id;
    }

    public function setid($id){
        $this->id = $id;
    }


    // RoomId
    public function getRoomId(){
        return $this->roomId;
    }

    public function setRoomId($roomId){
        $this->roomId = $roomId;
    }


    // content
    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    // Pinned
    public function getPinned(){
        return $this->pinned;
    }

    public function setPinned($pinned){
        $this->pinned = $pinned;
    }

    // CretedAt
    public function getCretedAt(){
        return $this->cretedAt;
    }

    public function setCretedAt($cretedAt){
        $this->cretedAt = $cretedAt;
    }

};


