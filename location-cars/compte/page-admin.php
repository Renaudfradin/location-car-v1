<?php
include_once("connexiondb.php");
if ($_SESSION["admins"] == 0) {
    header('location:page-connexion.php');
    exit();
}else{

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

<h1 class="AD">Espace Administration</h1>
<p class="descripadm">Depuis cette espace vous pourrez administrer le site, vous pourrez rajouter une location ou modifier une location existante et aussi supprimer des utilisateurs </p>
<!--<a href='page-profil.php?id=////$_SESSION["id"] ?>'><button class="btnprofil">Profil</button></a>
<br><br><br>-->
<div class="btns">
    <a href="page-adminutilisateur.php"><button class="btnutil">Gérer les Utilisateurs</button></a>  
    <br><br><br>
    <a href="page-ajoutlocation.php"><button class="btnutil">Ajouter une location </button></a>  
    <br><br><br>
    <a href="page-modifsuppcars.php"><button class="btnutil1">Modifier/Supprimer une location</button></a>
    <br><br><br>
</div>

<?php
  if (isset($msg)) {
    echo $msg;
  }
  ?>
<?php
include_once("foother-inc.php");
?>
<script src="app.js"></script>

<?php
}
?>

</body>
</html>