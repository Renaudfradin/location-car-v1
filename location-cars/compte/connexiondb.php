<?php
session_start();

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=locationvoiture;charset=utf8', 'root', '',$pdo_options);


?>