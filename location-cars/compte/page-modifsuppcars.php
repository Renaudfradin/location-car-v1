<?php
require_once("connexiondb.php");
if ($_SESSION["admins"] == 0) {
    header('location:page-connexion.php');
    exit();
}else{  
    if (isset($_GET['supprimer']) AND !empty($_GET['supprimer']) ) {
        $supprimeloc = (int) $_GET['supprimer'];
        $suppmenbresbd = $bdd->prepare('DELETE FROM cars WHERE id = ? ');
        $suppmenbresbd->execute(array($supprimeloc));
    }
}
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
    <title>HOME</title>
</head>
<body>
<!-- DEBUT nav bar-->
<?php  include_once("navbar.php");?>
<!-- FIN nav bar-->

<div class="table1">
    <h1>Voici toutes les locations du site</h1>
    <?php $reqcars = $bdd->query("SELECT * FROM cars ORDER BY id DESC ")  ?>
            <?php   while ($cars = $reqcars->fetch()) {  ?>
                        <div class="th">
                            ID:<?= $cars['id'] ?><br>
                            Marque:<?= $cars['marque'] ?><br>
                            Model:<?= $cars['model'] ?><br>
                            Image:<?= $cars['picture'] ?><br>
                            Nb_seat:<?= $cars['nb_seat'] ?><br>
                            Nb_door:<?= $cars['nb_door'] ?><br>
                            Climatisation:<?= $cars['climatisation'] ?><br>
                            Vitre:<?= $cars['vitre'] ?><br>
                            Types:<?= $cars['types'] ?><br>
                            Price:<?= $cars['price'] ?><br>
                            Available:<?= $cars['available'] ?><br><br><br>

                            <a href="page-modifsuppcars.php?supprimer=<?= $cars['id']?>"><button class="btnsuploc">Supprimer</button></a><br><br>
                            <a href="page-modifcars.php?modifier= <?= $cars['id'] ?>"><button class="btnsuploc">Modifier la location</button></a>

                        </div>
                        <?php } 
?>
            
</div>
<!-- <div class="btntotal">
    <a href='page-profil.php?id=$_SESSION["id"] ?>'><button class="btnprofil">Profil</button></a>
                <br>
    <a href="page-admin.php"><button>Retour en arriere</button></a>  
 </div>-->
 
             
                

    
<br>
<?php
include_once("foother-inc.php");
?>
<script src="app.js"></script>

</body>
</html>