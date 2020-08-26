<?php
include_once("connexiondb.php");
if ($_SESSION["admins"] == 0) {
  header('location:page-connexion.php');
  exit();
}else{

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


    <?php
 if (isset($_POST['formlocation'])) {

    if (!empty($_POST['marque']) 
    AND !empty($_POST['model'])  
    AND !empty($_POST['nb_seat']) 
    AND !empty($_POST['nb_door']) 
    AND !empty($_POST['climatisation']) 
    AND !empty($_POST['vitre'])
    AND !empty($_POST['types']) 
    AND !empty($_POST['price']) 
    AND !empty($_POST['available'])
    )

     {
         
    $marque = htmlspecialchars($_POST['marque']);
    $model = htmlspecialchars($_POST['model']);
    $nb_seat = htmlspecialchars($_POST['nb_seat']);
    $nb_door = htmlspecialchars($_POST['nb_door']);
    $climatisation = htmlspecialchars($_POST['climatisation']);
    $vitre = htmlspecialchars($_POST['vitre']);
    $types = htmlspecialchars($_POST['types']);
    $price = htmlspecialchars($_POST['price']);
    $available = htmlspecialchars($_POST['available']);


    $insertlocation = $bdd->prepare("INSERT INTO cars (marque,model,nb_seat,nb_door,climatisation,vitre,types,price,available) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertlocation ->execute(array($marque, $model, $nb_seat, $nb_door, $climatisation, $vitre, $types, $price, $available));
    //echo ("la location a bien ete ajouter !");
    header("location: page-admin.php");
    }
    else {
        echo("informations manquante ");
    }
    
 }
?>

<br><br>
<div class="formajout">
    <h1><strong>Ajouter une location</strong></h1>
    <table>
      <form action="" method="POST">
      <tr>
        <td>
          <label for="marque">Marque de la voiture :</label>
        </td>
        <td>
          <input type="text" name="marque" id="marque" placeholder="Marque" require><br /><br />
        </td>
      </tr>

      <tr>
        <td>
          <label for="model">Modèle de la voiture :</label>
        </td>
        <td>
          <input type="text" name="model" id="model" placeholder="Modèle" require><br /><br />
        </td>
      </tr>

      <tr>
        <td>
          <label for="nb_seat">Nombre de sièges:</label>
        </td>
        <td>
          <input type="text" name="nb_seat" id="nb_seat" placeholder="Nombre de sièges" require><br /><br />
        </td>
      </tr>

      <tr>
        <td>
          <label for="nb_door">Nombre de portes:</label>
        </td>
        <td>
          <input type="text" name="nb_door" id="nb_door" placeholder="Nombre de portes" require><br /><br />
        </td>
      </tr>

      <tr>
        <td>
          <label for="price">Prix de la voiture:</label>
        </td>
        <td>
          <input type="tewt" name="price" id="price" placeholder="Prix de la voiture" require><br /><br />
        </td>
      </tr>

      <tr>
        <td>
      <label for="climatisation">Climatisation :</label>
        </td>
        <td>
                <select name="climatisation" require>
                    <option value="OUI">OUI</option>
                    <option value="NON">NON</option>
                </select>
        </td>
      </tr>

      <tr>
        <td>
      <label for="types">Type du véhicule  :</label>
        </td>
        <td>
            <select name="types" require>
                <option value="voiture">Voiture</option>
                <option value="moto">Moto</option>
                <option value="limousine">Limousine</option>
            </select>
        </td>
      </tr>

      <tr>
        <td>
      <label for="vitre">Vitres teintées :</label>
        </td>
        <td>
            <select name="vitre" require>
                <option value="teintées">OUI</option>
                <option value="non teintées">NON</option>
            </select>
        </td>
      </tr>

      <tr>
        <td>
      <label for="available">Disponible :</label>
        </td>
        <td>
            <select name="available" require>
                <option value="OUI">OUI</option>
                <option value="NON">NON</option>
            </select>
        </td>
      </tr>
  </table>
<br><br>
    <button type="submit" name="formlocation" class="btnprofil">Rajouter la location</button><br><br>

    </form>
    <a href='page-profil.php?id=<?=$_SESSION["id"] ?>'><button class="btnprofil">Profil</button></a><br>
    <br>
    <a href="page-admin.php"><button class="btnprofil">Retour en arriere</button></a><br>
    <br>
</div>
<br><br>

<?php include_once("foother-inc.php"); ?>
<script src="app.js"></script>
</body>
</html>