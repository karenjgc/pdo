<?php

include "pdo.php";
try {
    $query = $pdo->prepare("insert into usuarios(nombre, telefono) values(:nombre,:telefono)");
    $nombre = "karen";
    $tel = "2172940";
    $query->bindParam(":nombre", $nombre);
    $query->bindParam(":telefono", $tel);
    $query->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
};