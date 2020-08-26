<?php
require 'header.php';


if (!isset($_GET['model'])){
    header('Location: page-location.php');
} else {
    

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
<br>
<!--<a href="javascript:history.back()" class="lienretour"><button>← retourner en arriere</button></a>-->
<br><br>

<div class="locationinfo">
<?php  $cars = $bdd->query2('SELECT * FROM cars WHERE model=:model', array('model' => $_GET['model']))

    ?>
   <div class="titleinfo"><strong><?=$cars->marque?> <?=$cars->model?></strong><br><br><br></div>
            <p>OPTION:</p>
        <div class="div1et2et3">
            <div class="div1et2">
                 <div class="div1">
                    Nombre de siege:<?=$cars->nb_seat?><br><br>
                    Nombre de portes:<?=$cars->nb_door?><br><br>
                    Climatisation:<?=$cars->climatisation?><br><br>
                </div>
                <div class="div2">
                    Vitres:<?=$cars->vitre?><br><br>
                    Type de locations:<?=$cars->types?><br><br>
                    Disponible:<?=$cars->available?><br><br>
                    Prix:<?=$cars->price?> $
                </div>
            </div>
            <img src='../compte/photocars/car/<?=$cars->picture?>' class="imglocation1"><br>   
        </div>

<a href='page-addlocation.php?id=<?= $cars->id ?>' class="addPanier"><button class="btnlouer">LOUER</button></a><br><br><br>
</div>
<br><br><br>


<!-- DEBUT foother-->
<?php include_once("foother-inc.php"); ?>
<script src="app.js"></script>
<!-- FIN nav bar-->


<?php

}
?>
</body>
</html>