<?php 
include 'header.php'; 
if (isset($_GET['dell'])) {
    $panier->dell($_GET['dell']);
}
//var_dump($_SESSION['panier']);
$ids=array_keys($_SESSION['panier']);
if (empty($ids)) {
   $cars = array();
}else {
    $cars = $bdd->query('SELECT * FROM cars WHERE id IN ('.implode(',',$ids).')');
}?>


<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style9.css">
    
    <link rel="stylesheet" href="../css/modal1.css">
    <link rel="stylesheet" href="../css/naavhomme.css">
    <link rel="stylesheet" href="../css/responsivestyle2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/foother3.css">
    <title>Document</title>
</head>
<body>
<?php require_once("navbar.php");?>

<div class="article">
<?php
//unset se pour suprimer une variable 
//unset($_SESSION['panier'][1]);
foreach ($cars as $car) { ?>
    <div class="articlepanier">
        <?=$car->marque?> <?=$car->model?><br><br>
        <a href="page-info-location.php?id=<?= $car->id ?>"><img src='../compte/photocars/car/<?=$car->picture?>' width="200px" height="150px"></a><br>
        <div class="">
            <?=$car->price?> $<br> 
            <?=$_SESSION['panier'][$car->id];?>  
        </div>
        <a href='panier.php?dell=<?= $car->id ?>'><button class="">suprimer la reservations</button></a><br>
    </div>
<?php } ?>
</div>

<!--number_format sert a a adpeter  -->


<br><br><br>
Total à payer: <?= number_format($panier->total() );?> $
<br><br>
Nombre de location: <?= $panier->count();?>
<br><br>
<?php
if (isset($_SESSION["id"])) {
    echo"<a href='btnpayer'></a><button>PAYER</button>";
}else {
    echo"Il faut être connecté pour pouvoir réserver une location";
}
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- DEBUT foother-->
<?php include_once("foother-inc.php"); ?>
<script src="app.js"></script>
<!-- FIN nav bar-->






</body>
</html>





