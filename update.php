<?php

include "pdo.php";

$query=$pdo->prepare("update usuarios set nombre=:nombre where nombre=:cambio");
$nombre="lala";
$cambio="karen";
$query->bindParam(":nombre",$nombre);
$query->bindParam(":cambio",$cambio);
$query->execute();