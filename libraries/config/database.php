<?php

// Retourne une connexion à la DB
//  @return PDO

function getPDO (): PDO {

    $serveurname= 'localhost';
    $dbname= 'vivino';
    $user ='root';
    $pass = '';

    $pdo = new PDO("mysql:host=$serveurname;charset=utf8;dbname=$dbname", $user, $pass, [
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
        // mode de requete par défaut => renvoit des tableaux associatifs
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}