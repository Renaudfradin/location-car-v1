<?php
require("connexiondb.php");
if ($_SESSION["admins"] == 0) {
    header('location:page-connexion-UK.php');
    exit();
}else{ 
   
}

if (isset($_GET['modifier'])){

    $reqcars = $bdd->prepare("SELECT * FROM cars WHERE id = ?");
    $reqcars->execute(array($_GET['modifier']));
    $cars = $reqcars->fetch();
  
    if (isset($_POST["newmarque"]) AND !empty($_POST["newmarque"]) AND $_POST["newmarque"] != $user["marque"]) {
  
        $newmarque = htmlspecialchars($_POST["newmarque"]);
        $insertmarque = $bdd->prepare("UPDATE cars SET marque = ? WHERE id = ?");
        $insertmarque->execute(array($newmarque, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }

    if (isset($_POST["newmodel"]) AND !empty($_POST["newmodel"]) AND $_POST["newmodel"] != $user["model"]) {
  
        $newmodel = htmlspecialchars($_POST["newmodel"]);
        $insertmodel = $bdd->prepare("UPDATE cars SET model = ? WHERE id = ?");
        $insertmodel->execute(array($newmodel, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }

    if (isset($_POST["newpicture"]) AND !empty($_POST["newpicture"]) AND $_POST["newpicture"] != $user["picture"]) {

        $newpicture = htmlspecialchars($_POST["newpicture"]);
        $insertpicture = $bdd->prepare("UPDATE cars SET picture = ? WHERE id = ?");
        $insertpicture->execute(array($newpicture, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }

    if (isset($_POST["newnb_seat"]) AND !empty($_POST["newnb_seat"]) AND $_POST["newnb_seat"] != $user["nb_seat"]) {

        $newnb_seat = htmlspecialchars($_POST["newnb_seat"]);
        $insertnb_seat = $bdd->prepare("UPDATE cars SET nb_seat = ? WHERE id = ?");
        $insertnb_seat->execute(array($newnb_seat, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }

    if (isset($_POST["newnb_door"]) AND !empty($_POST["newnb_door"]) AND $_POST["newnb_door"] != $user["nb_door"]) {

        $newnb_door = htmlspecialchars($_POST["newnb_door"]);
        $insertnb_door = $bdd->prepare("UPDATE cars SET nb_door = ? WHERE id = ?");
        $insertnb_door->execute(array($newnb_door, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }
    
    if (isset($_POST["newclimatisation"]) AND !empty($_POST["newclimatisation"]) AND $_POST["newclimatisation"] != $user["climatisation"]) {

        $newclimatisation = htmlspecialchars($_POST["newclimatisation"]);
        $insertclimatisation = $bdd->prepare("UPDATE cars SET climatisation = ? WHERE id = ?");
        $insertclimatisation->execute(array($newclimatisation, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }

    if (isset($_POST["newvitre"]) AND !empty($_POST["newvitre"]) AND $_POST["newvitre"] != $user["vitre"]) {
    
        $newvitre = htmlspecialchars($_POST["newvitre"]);
        $insertvitre = $bdd->prepare("UPDATE cars SET vitre = ? WHERE id = ?");
        $insertvitre->execute(array($newvitre, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }
  
    if (isset($_POST["newtypes"]) AND !empty($_POST["newtypes"]) AND $_POST["newtypes"] != $user["types"]) {

        $newtypes = htmlspecialchars($_POST["newtypes"]);
        $inserttypes = $bdd->prepare("UPDATE cars SET types = ? WHERE id = ?");
        $inserttypes->execute(array($newtypes, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }

    if (isset($_POST["newprice"]) AND !empty($_POST["newprice"]) AND $_POST["newprice"] != $user["price"]) {

        $newprice = htmlspecialchars($_POST["newprice"]);
        $insertprice = $bdd->prepare("UPDATE cars SET price = ? WHERE id = ?");
        $insertprice->execute(array($newprice, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }
  
    if (isset($_POST["newavailable"]) AND !empty($_POST["newavailable"]) AND $_POST["newavailable"] != $user["available"]) {

        $newavailable = htmlspecialchars($_POST["newavailable"]);
        $insertavailable = $bdd->prepare('UPDATE cars SET available = ? WHERE id = ?');
        $insertavailable->execute(array($newavailable, ($_GET['modifier'])));
        header("Location: page-modifsuppcars-UK.php?modifier=".($_GET['modifier']));
    }
    if (isset($_FILES["newpicture1"]) AND !empty($_FILES["newpicture1"]["name"])) {
        //la on deffini la taille en octet
        //la on a mi une taille de 15MO
          $tailleMax =  15097152;
          $extensionValides = array("jpg","jpeg","gif","png" );
          if ($_FILES["newpicture1"]["size"] <= $tailleMax) {
              //le strchr va nous permettre de renvoyer l extension de newpicture1 avec le point
              //le substr va nous permmetre d ignore le 1er carractere de la chaine car on a mis "1"
              //le strtolower va nous permmetre de tous mettre en minuscule pour etre sur que tous est minucule pour pa qu il y est un beug
             $extensionUpload = strtolower(substr(strchr($_FILES["newpicture1"]["name"],"."),1));
             if (in_array($extensionUpload, $extensionValides)) {
               $chemin = "membres/avatars/".$_FILES["newpicture1"]["name"].".".$extensionUpload;
               $resultat = move_uploaded_file($_FILES["newpicture1"]["tmp_name"],$chemin);
               if ($resultat) {
                 $updatenewpicture1 =$bdd->prepare("UPDATE cars SET picture = :picture WHERE id = :id ");
                 $updatenewpicture1->execute(array(
                      
                ));
                header('Location: page-modifsuppcars.php?modifier='.($_GET['modifier']));
               }
               else {
                 echo  "Erreur durant l inportation de la photo";
               }
             }
             else {
              echo  "votre photo de profil doit etre au format jpg, jpeg, gif ou png";
             }
          }
          else {
            echo  "votre photo de profil ne doit pa depasser 2MO !";
          }
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
<?php  include_once("navbar-UK.php");?>
<!-- FIN nav bar-->
<br><br>
<div class="formmoifcarss">
    <h1 class="Tiformmoifcarss">Modify a rental</h1>
    <form method="POST" action="" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <label for="newmarque">Mark :</label>
            </td>
            <td>
                <input type="text" name="newmarque" id="newmarque"  value="<?= $cars["marque"]; ?>"> <br /><br />
            </td>
        </tr>

        <tr>
            <td>
                <label for="newmodel">Model :</label>
            </td>
            <td>
                <input type="text" name="newmodel" id="newmodel"  value="<?= $cars["model"]; ?>"> <br /><br />
            </td>
        </tr>

        <tr>
            <td>
                <label for="newpicture1">Picture of the rental:</label>
            </td>
            <td>
                <input type="file" name="newpicture1" id="newpicture1"> <br /><br />
            </td>
        </tr>

        <tr>
            <td>
                <label for="newnb_seat">Number of seats:</label>
            </td>
            <td>
                <input type="text" name="newnb_seat" id="newnb_seat"  value="<?= $cars["nb_seat"]; ?>"> <br /><br />
            </td>
        </tr>

        <tr>
            <td>
                <label for="newnb_door">Number of doors:</label>
            </td>
            <td>
                <input type="text" name="newnb_door" id="newnb_door"  value="<?= $cars["nb_door"]; ?>"> <br /><br />
            </td>
        </tr>

        <tr>
            <td>
                <label for="newclimatisation">Air conditioner:<?= $cars ["vitre"]?></label>
            </td>
            <td>
                <select name="newclimatisation" require>
                    <option value="OUI">YES</option>
                    <option value="NON">NO</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="newvitre">Tinted glass :<?= $cars ["vitre"]?></label>
            </td>
            <td>
                <select name="newvitre" require>
                    <option value="OUI">YES</option>
                    <option value="NON">NO</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="newtypes">Type of car:<?= $cars["types"]; ?></label>
            </td>
        <td>
                <select name="newtypes" require>
                    <option value="voiture">Car</option>
                    <option value="moto">motorbike</option>
                    <option value="limousine">limousine</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="newprice">The price of the rental:</label>
            </td>
            <td>
                <input type="text" name="newprice" id="newprice"  value="<?= $cars["price"]; ?>"> <br /><br />
            </td>
        </tr>

        <tr>
            <td>
                <label for="newavailable">Available:<?= $cars["available"]; ?></label>
            </td>
            <td>
                <select name="newavailable" id="" > 
                    <option value="NON">NO</option>
                    <option value="OUI">YES</option>
                </select>
            </td>
        </tr>
    </table>
    <br>
    <button type="submit" name="ajoutlocation" class="btnprofil">Update the rental</button><br><br>
    </form>
<a href='page-profil-UK.php?id=<?=$_SESSION["id"] ?>'><button class="btnprofil">Profile</button></a><br><br>
<a href="javascript:history.back()"><button class="btnprofil">Back</button></a><br>
<br>

</div>
<br>
<?php include_once("foother-inc-UK.php"); ?>
<script src="app.js"></script>
</body>
</html>