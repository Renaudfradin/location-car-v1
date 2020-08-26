<?php
require 'connexiondb.php';
require 'panier.class.php';
$bdd = new bdd(); 
$panier = new panier($bdd);
?>