<?php
require 'header.php';

if (isset($_GET['id'])) {
   $car =  $bdd->query('SELECT id FROM cars WHERE id=:id', array('id' => $_GET['id']));
    //var_dump($car);
    if (empty($car)) {
        die("le produit n'existe pas");
    }
    $panier->add($car[0]->id);
    
    //javascript:history.back() permet de retourner sur la page precedente
    die("la location est  bien  acheter <a href='javascript:history.back()'>retourner voir les autres location</a>");
}else{
    die("il ny a pas de produit a ajouter au panier");
}


?>
