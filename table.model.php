<?php

require_once "db.connect.php";

function createTable() {
    $db = connectDB();
    $sql = "CREATE TABLE `orders` (
        `id` int(11) NOT NULL,
        `order_id` int(11) NOT NULL,
        `category` varchar(255) NOT NULL,
        `description` text NOT NULL,
        `price` tinyint(4) NOT NULL DEFAULT '0',
        `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $query = $db->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::FETCH_ASSOC);
    $query->execute();
    return $query->fetchAll();
}

function addRowTable() {

}

function showAllTables() {
    $db = connectDB();
    $sql = "SHOW TABLES";
    $query = $db->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function describeTable($tableName) {
    $db = connectDB();
    $sql = "DESCRIBE $tableName";
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO :: FETCH_ASSOC);
}

function editTable($tableName, $params = []) {
    $db = connectDB();
    $sql = "ALTER TABLE $tableName MODIFY $params";
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO :: FETCH_ASSOC);
}

function deleteTable($tableName, $params) {
    $db = connectDB();
    $sql = "ALTER TABLE $tableName DROP COLUMN $params";
    $query = $db->prepare($sql);
    $query->execute();
}