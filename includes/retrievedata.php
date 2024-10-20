<?php

require_once 'dbh.inc.php';

function getAllUserData() {
    global $pdo;

    $query = "SELECT * FROM `registration`;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}