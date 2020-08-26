<?php
require 'header.php';

if (isset($_GET['id'])) {
   $car =  $bdd->query('SELECT id FROM cars WHERE id=:id', array('id' => $_GET['id']));
    //var_dump($car);
    if (empty($car)) {
        die("The product does not exist");
    }
    $panier->add($car[0]->id);
    
    //javascript:history.back() permet de retourner sur la page precedente
    die("The rent is good buy <a href='javascript:history.back()'>return to see other rentals</a>");
}else{
    die("There is no product to add to cart");
}


?>
