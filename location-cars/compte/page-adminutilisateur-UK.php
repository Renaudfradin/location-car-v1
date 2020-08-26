<?php
require_once("connexiondb.php");

if ($_SESSION["admins"] == 0) {
    header('location:page-connexion-UK.php');
    exit();
}else{
 if(isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
    $supprime = (int) $_GET['supprimer'];
    $suppmenbres = $bdd->prepare('DELETE FROM users WHERE id = ?');
    $suppmenbres->execute(array($supprime));
 }
 if(isset($_GET['ajouteradmin']) AND !empty($_GET['ajouteradmin'])) {
    $ajout = (int) $_GET['ajouteradmin'];
    $ajoutadmin = $bdd->prepare('UPDATE users SET admins = 1 WHERE id = ?');
    $ajoutadmin->execute(array($ajout));
 }
 if(isset($_GET['supprimeradmin']) AND !empty($_GET['supprimeradmin'])) {
    $supprimeadmin = (int) $_GET['supprimeradmin'];
    $suppmenbresadmin = $bdd->prepare('UPDATE users SET admins = 0 WHERE id = ?');
    $suppmenbresadmin->execute(array($supprimeadmin));
 }
}


$membres = $bdd ->query("SELECT * FROM users ORDER BY id DESC");
if (isset($_GET['rechercheutill']) AND !empty($_GET['rechercheutill'])) {
    $util = htmlspecialchars($_GET['rechercheutill']);
    //$utilarray = explode(' ' ,$util);
    //var_dump($utilarray);
//le like fait comme un = 
    $membres = $bdd->query('SELECT * FROM users WHERE pseudo LIKE "%'.$util.'%" ORDER BY id DESC');
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
<p class="Voicie"><strong>All users of the site</strong></p>

<form method="GET">
   <input type="search" name="rechercheutill" class="rechercheutill" placeholder="Search a user"/>
   <input type="submit" value="Validate" class="btnrechercheutill"/>
</form>
<br><br>

<div class="util">
   <?php 
   if($membres->rowCount() > 0) { ?>
        <?php while($m =$membres->fetch()){  ?>
            <table id="tableauutil">
            <tr>
                <th>I D</th>
                <th>Username</th>
                <th>Stock</th>
            </tr>
            <tr>
                <td><?= $m['id'] ?></td>
                <td><?= $m['pseudo'] ?> </td>
                <td>
                    <a href="page-adminutilisateur-UK.php?supprimer= <?= $m['id']?> "> 
                    <button class="btnsup">Remove</button>
                    <?php if ($m['admins'] == 1 ) { ?><a href='page-adminutilisateur-UK.php?supprimeradmin= <?= $m['id']?>'><button class="btnsup">Remove admin</button></a> <?php } ?>
                    <?php if ($m['admins'] == 0 ) { ?><a href='page-adminutilisateur-UK.php?ajouteradmin= <?= $m['id']?>'><button class="btnsup">Skip admin</button></a> <?php } ?>
                </td>
            </tr>
            </table><br>
        <?php } ?>
   <?php }else { ?>
    No results for:  <?= $util ?> 
   <?php } ?>


 



<br>
<br>       
<a href="javascript:history.back()"><button class="btn2">Back</button></a><br><br>
<a href='page-profil-UK.php?id=<?=$_SESSION["id"] ?>'><button class="btn2">Profile</button></a>
<br><br>
</div>
<?php
include_once("foother-inc-UK.php");
?>
<script src="app.js"></script>

</body>
</html>