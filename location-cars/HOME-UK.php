<?php include_once("compte/connexiondb.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style9.css">
    
    <link rel="stylesheet" href="css/modal1.css">
    <link rel="stylesheet" href="css/naavhomme.css">
    <link rel="stylesheet" href="css/responsivestyle2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/foother3.css"> 
    <title>HOME</title>
</head>
<body>

<!-- DEBUT nav bar-->
<?php  include_once("navbar-UK.php");?>
<!-- FIN nav bar-->
<?php //$cars = $bdd->prepare(); 
      //$cars->execute(array());
?>

<!-- DEBUT IMG ARRIVER-->
<div class="wrap">
<img src="image/home_picture.jpg" alt="" class="img_home">
<h1 class="T1">Book your taxi in advance at the best price</h1>
<p class="P1">Compare the offers of over 11,000 vehicles with driver everywhere in France</p>
    <div class="form1">
    <form action="" method="GET">
        <form action="" method="post" class="form1in">
            <input type="text" class="depart">
            <input type="text" class="arriver">
            <input type="date" name="" class="date">
            <input type="text" name="" class="bag">
            <input type="text" name="" class="bag">
            <button type="submit" class="btnform1">Continue</button>
        </form>
    </div>
</div>
</form>

<!-- FIN IMG ARRIVER-->
<!--
    <h3 class="titrederniers">DERNIÈRES LOCATIONS AJOUTER</h3>
    <ul class="dernier">
        <li class="derniers"> consequuntur eius, fuga porro ratione veritatis a blanditiis harum! </li>
        <li class="derniers"> consequuntur eius, fuga porro ratione veritatis a blanditiis harum! </li>
        <li class="derniers"> consequuntur eius, fuga porro ratione veritatis a blanditiis harum! </li>
        <li class="derniers"> consequuntur eius, fuga porro ratione veritatis a blanditiis harum! </li>
    </ul>
-->

    <br>
    <br>
    <h2 class="commentsamarcheT">How it works ?</h2>
    <ul>
        <li class="commentsamarche">1 <br><img src="image/ordi.PNG" alt="" class="imgcomment"> <br><p>POST A ROUTE</p></li>
        <li class="commentsamarche">2 <br><img src="image/perso.PNG" alt="" class="imgcomment"> <br><p>COMPARE AND BOOK</p></li>
        <li class="commentsamarche">3 <br><img src="image/voiture.PNG" alt="" class="imgcomment"> <br><p>HAVE A NICE TRIP !</p></li>
    </ul>

<!-- DEBUT foother -->
<?php include_once("foother-inc-UK.php"); ?>
<script src="js/app.js"></script>
<!-- FIN foother-->



</body>
</html>