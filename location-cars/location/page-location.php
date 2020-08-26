<?php
require 'header.php';
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
<!-- DEBUT nav bar-->
<?php  include_once("navbar.php");?>
<!-- FIN nav bar-->
<br><br><br>
<div class="locationliste">
    <?php  $cars = $bdd->query('SELECT * FROM cars') ?>
    <?php  //$cars = $bdd->query5('SELECT * FROM cars LIKE "%BMW%" ') ?>
        <?php foreach ($cars as $car) { ?>
            <div class="locattion">
                    <div class="marqueloc">
                    <?=$car->marque?> <?=$car->model?><br><br>
                    </div>
                    <a href="page-info-location.php?model=<?= $car->model ?>"><img src='../compte/photocars/car/<?=$car->picture?>' width="200px" height="150px" class="imglocation"></a><br>
                    <div class="price">
                     <?=$car->price?> $<br>   
                    </div>
                    <a href='page-addlocation.php?id=<?= $car->id ?>' class="addPanier"><button class="btnlouer1">LOUER</button></a><br><br><br>
            </div>
    <?php } ?>
</div>
    





<!-- DEBUT foother-->
<?php include_once("foother-inc.php"); ?>
<script src="app.js"></script>
<!-- FIN nav bar-->
</body>
</html>