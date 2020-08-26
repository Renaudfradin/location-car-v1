<?php
require_once("connexiondb.php");

if (isset($_GET["id"]) AND $_GET["id"] > 0){
    $getid = intval($_GET["id"]);
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
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
<?php  include_once("navbar-UK.php");?>
<!-- FIN nav bar-->

<?php if (isset($_SESSION["id"]) AND $userinfo["id"] == $_SESSION["id"]) { ?>

<h1 class="Bonjour">Hello <?php echo $userinfo["genre"]; ?> <?php echo $userinfo["firstname"]; ?> <?php echo $userinfo["lastname"]; ?></h1>
<div class="profil">
    <br>
    <p class="info">Personal informations</p><br>
    Civility : <?= $userinfo["genre"]; ?><br>
    First name : <?= $userinfo["firstname"]; ?><br>
    Name : <?= $userinfo["lastname"]; ?><br>
    Pseudo :<?= $userinfo["pseudo"]; ?><br>
    Email Adress :<?= $userinfo["email"]; ?><br>
    Age :<?= $userinfo["age"]; ?><br>
    Adress : <?= $userinfo["locations"]; ?><br>
    Country : <?= $userinfo["pays"]; ?><br>
    Phone number : <?= $userinfo["phone"]; ?><br><br>
    
    <a href="page-editionprofil-UK.php"><button class="bouton1">Edit Profile</button></a>
    <br><br>
    <a href="deconnexion-UK.php"><button class="bouton1">Sign Out</button></a>
    <br><br>
    <?php
    if ($userinfo["admins"] == 1) { ?>
        <a href="page-admin-UK.php"><button class="bouton1">Site Management</button></a>
        <?php }else{ echo "";} ?>
</div>        
<br><br>
<?php include_once("foother-inc-UK.php"); ?>
<script src="app.js"></script>



<?php
}else {
  header('Location: page-connexion-UK.php');
}
?>

</body>
</html>
