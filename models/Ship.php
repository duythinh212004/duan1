<?php
require_once '../Connect/connect.php';

class Ship extends connect{
    public function getAllShip(){
        $sql = 'select * from ships';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}