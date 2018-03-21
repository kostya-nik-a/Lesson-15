<?php

require_once "db.connect.php";

function createTable($params) {
    try {
        $db = connectDB();

        $sql = "CREATE TABLE `" . $params['tableName'] . "` (
        `" . $params['id'] . "` " . $params['type_field'] . "(" . $params['lenght'] . ") NOT NULL " . $params['extra'] . ",
        `" . $params['description'] . "` " . $params['type_field'] . "(" . $params['lenght'] . ") NOT NULL,
        PRIMARY KEY (`" . $params['id'] . "`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $params['type_code'] . ";";
        $query = $db->prepare($sql);

        $query->execute();
        return $query->fetchAll();
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function addRowTable($params) {
    try {
        $db = connectDB();

        $sql = "INSERT INTO `" . $params['tableName'] . "` (
        `" . $params['id'] . "` " . $params['type_field'] . "(" . $params['lenght'] . ") NOT NULL " . $params['extra'] . ",
        `" . $params['description'] . "` " . $params['type_field'] . "(" . $params['lenght'] . ") NOT NULL,
        PRIMARY KEY (`" . $params['id'] . "`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $params['type_code'] . ";";
        $query = $db->prepare($sql);

        $query->execute();
        return $query->fetchAll();
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
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

function editTable($action, $tableName, $params) {
    $db = connectDB();
    switch ($action) {
        case 'change':
            $sql = "ALTER TABLE $tableName MODIFY $params";
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO :: FETCH_ASSOC);
            break;
        case 'delete':
            $sql = "ALTER TABLE $tableName DROP COLUMN $params";
            $query = $db->prepare($sql);
            $query->execute();
            break;
    }
}