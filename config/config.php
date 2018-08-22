<?php
//
return array(
    "db_user" => "dbo750395619",    
    "db_pass" => "AlaskaP4*",
    "db_host" => "db750395619.db.1and1.com",
    "db_name" => "db750395619"
);


// établir la connection à la base de données
/*return array(
    "db_user" => "root",    
    "db_pass" => "",
    "db_host" => "localhost",
    "db_name" => "alaska"
);*/
/*
//Mysql EXTENSION
$host_name = 'db750395619.db.1and1.com';
$database = 'db750395619';
$user_name = 'dbo750395619';
$password = 'AlaskaP4*';

$connect = mysql_connect($host_name, $user_name, $password, $database);
if (mysql_errno()) {
    die('<p>La connexion au serveur MySQL a échoué: '.mysql_error().'</p>');
} else {
    echo '<p>Connexion au serveur MySQL établie avec succès.</p >';
}
/*

//PDO EXTENSION"
$host_name = 'db750395619.db.1and1.com';
$database = 'db750395619';
$user_name = 'dbo750395619';
$password = 'AlaskaP4*';

$dbh = null;
try {
  $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}

/*
$host_name = 'db750395619.db.1and1.com';
$database = 'db750395619';
$user_name = 'dbo750395619';
$password = 'AlaskaP4*';
$connect = mysqli_connect($host_name, $user_name, $password, $database);


if (mysqli_connect_errno()) {
    die('<p>La connexion au serveur MySQL a échoué: '.mysqli_connect_error().'</p>');
} else {
    echo '<p>Connexion au serveur MySQL établie avec succès.</p >';
}*/
?>