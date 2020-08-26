<?php
require_once("connexiondb.php");

if (isset($_SESSION["id"])){

  $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
  $requser->execute(array($_SESSION["id"]));
  $user = $requser->fetch();

  if (isset($_POST["newpseudo"]) AND !empty($_POST["newpseudo"]) AND $_POST["newpseudo"] != $user["pseudo"]) {

    $newpseudo = htmlspecialchars($_POST["newpseudo"]);
    $insertpseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
    $insertpseudo->execute(array($newpseudo, $_SESSION["id"]));
    header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
  }


  if (isset($_POST["newfirstname"]) AND !empty($_POST["newfirstname"]) AND $_POST["newfirstname"] != $user["firstname"]) {
    $newfirstname = htmlspecialchars($_POST["newfirstname"]);
    $insertage = $bdd->prepare("UPDATE users SET firstname = ? WHERE id = ?");
    $insertage->execute(array($newfirstname, $_SESSION["id"]));
    header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
  }


  if (isset($_POST["newlastname"]) AND !empty($_POST["newlastname"]) AND $_POST["newlastname"] != $user["lastname"]) {
    $newlastname = htmlspecialchars($_POST["newlastname"]);
    $insertage = $bdd->prepare("UPDATE users SET lastname = ? WHERE id = ?");
    $insertage->execute(array($newlastname, $_SESSION["id"]));
    header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
  }


  if (isset($_POST["newgenre"]) AND !empty($_POST["newgenre"]) AND $_POST["newgenre"] != $user["genre"]) {
    $newage = htmlspecialchars($_POST["newgenre"]);
    $insertage = $bdd->prepare("UPDATE users SET genre = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
  }


  if (isset($_POST["newage"]) AND !empty($_POST["newage"]) AND $_POST["newage"] != $user["age"]) {
    $newage = htmlspecialchars($_POST["newage"]);
    $insertage = $bdd->prepare("UPDATE users SET age = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
  }


  if (isset($_POST["newpays"]) AND !empty($_POST["newpays"]) AND $_POST["newpays"] != $user["pays"]) {
    $newage = htmlspecialchars($_POST["newpays"]);
    $insertage = $bdd->prepare("UPDATE users SET pays = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
  }


  if (isset($_POST["newlocations"]) AND !empty($_POST["newlocations"]) AND $_POST["newlocations"] != $user["locations"]) {
    $newage = htmlspecialchars($_POST["newlocations"]);
    $insertage = $bdd->prepare("UPDATE users SET locations = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
  }


  if (isset($_POST["newphone"]) AND !empty($_POST["newphone"]) AND $_POST["newphone"] != $user["phone"]) {
    $newphone = htmlspecialchars($_POST["newphone"]);
    if (preg_match("#^0[1-9][0-9]{8}$#",$_POST["newphone"])) {
    $insertphone = $bdd->prepare("UPDATE users SET phone = ? WHERE id = ?");
    $insertphone->execute(array($newphone, $_SESSION["id"]));
    header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
    }else {
      echo 'Le '.$_POST['newphone'].'est pa valide';
    }
    
  }
  

  if(isset($_POST["newpasswords"]) AND !empty($_POST["newpasswords"]) AND isset($_POST["newpasswords2"]) AND !empty($_POST["newpasswords2"])) {
    $passwords1 = sha1($_POST["newpasswords"]);
    $passwords2 = sha1($_POST["newpasswords2"]);
    if($passwords1 == $passwords2) {
       $insertpasswords = $bdd->prepare("UPDATE users SET passwords = ? WHERE id = ?");
       $insertpasswords->execute(array($passwords1, $_SESSION['id']));
       header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
    }
    else {
       $msg = "Your two passwords do not match!";
    }
  }

  if(isset($_POST["newemail"]) AND !empty($_POST["newemail"]) AND isset($_POST["newemail2"]) AND !empty($_POST["newemail2"])) {
    $mail1 = $_POST["newemail"];
    $mail2 = $_POST["newemail2"];
    if($mail1 == $mail2) {
       $insertmail = $bdd->prepare("UPDATE users SET email = ? WHERE id = ?");
       $insertmail->execute(array($mail1, $_SESSION['id']));
       header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
    }
    else {
       $msg = "Your two emails adress do not match!";
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

<h1 class="tmodif">Edition du profil</h1>
<p class="texmodif">Pour modifier les informations vous concernant, remplissez simplement le formulaire ci-dessous.</p>
<div class="formmodif">
<table>
 <form method="POST"action="" enctype="multipart/form-data" class="tooutlestable">
  
  <tr>
    <td>
      <label for="newpseudo">Pseudo :</label>
    </td>
    <td>
      <input type="text" name="newpseudo" id="newpseudo" placeholder="votre new pseudo" value="<?php echo $user["pseudo"]; ?>"> <br /><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newfirstname">First name :</label>
    </td>
    <td>
      <input type="text" name="newfirstname" id="newfirstname" placeholder="Votre Prenom" value="<?php echo $user["firstname"]; ?>"> <br /><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newlastname"> Name :</label>
    </td>
    <td>
      <input type="text" name="newlastname" id="newlastname" placeholder="Votre nom" value="<?php echo $user["lastname"]; ?>"> <br/><br />
    </td>
  </tr>

  <tr>
    <td>
  <label for="newgenre">Civility :</label>
    </td>

    <td><?= $user['genre'];?>
            <select name="newgenre">
                <option value=""> </option>
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
            </select>
    </td>
  </tr>


  <tr>
    <td>
  <label for="newage">Age :</label>
    </td>
    <td>
            <select name="newage" class="age">
                <?php
                  for ($i=0; $i < 100; $i++) { 
                    echo "<option value='$i'>"; }
                ?>
            </select>
    </td>
  </tr>

  <tr>
    <td>
      <label for="newpasswords">Password :</label>
    </td>
    <td>
      <input type="password" name="newpasswords" id="newpasswords" placeholder="Your new password" ><br /><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newpasswords2">Confirm your password :</label>
    </td>
    <td>
      <input type="password" name="newpasswords2" id="newpasswords2" placeholder="confirm your new  password" ><br /><br />
    </td>
  </tr>

   <tr>
    <td>
      <label for="newemail">Email Adress :</label>
    </td>
    <td>
      <input type="email" name="newemail" id="newemail" placeholder="exemple@qqq.com"value="<?php echo $user["email"]; ?>" > <br /><br />
    </td>
  </tr> 

  
  <div class="mail2">                  
  <tr>
    <td>
      <label for="newemail2">Confirm Email Adress :</label>
    </td>
    <td>
      <input type="email" name="newemail2" id="newemail2" placeholder="exemple@qqq.com"><br /><br />
    </td>
  </tr>
  </div>
</div>
  

  <tr>
    <td>
      <label for="newlocations">Adress :</label>
    </td>
    <td>
      <input type="text" name="newlocations" id="newlocations" placeholder="votre adresse"value="<?php echo $user["locations"]; ?>"><br /><br />
    </td>
  </tr>

  <tr>
    <td>
  <label for="newpays">Country :</label>
    </td>
    <td>
            <select name="newpays">
                <option value="France">France</option>
                <option value="Belgique">Belgique</option>
                <option value="Canada">Canada</option>
                <option value="Maroc">Maroc</option>
                <option value="Tunisie">Tunisie</option>
                <option value="Algerie">Algerie</option>
                <option value="Togo">Togo</option>
                <option value="Rwanda">Rwanda</option>
            </select>
    </td>
  </tr>

  <tr>
    <td>
      <label for="newphone">Phone number :</label>
    </td>
    <td>
      <input type="text" name="newphone" id="newphone" placeholder="num tell" value="<?php echo $user["phone"]; ?>"><br /><br />
    </td>
  </tr>
</table>





<a href=""><button class="btnupdate" type="submit" name="forminscription">Update profile</button></a>
</form>
<br><br><br>
<a href='page-profil-UK.php?id=<?=$_SESSION["id"] ?>'><button class="btnprofil">Profile</button></a>  
</div>
<?php if(isset($msg)) { echo $msg; } ?>
<?php
include_once("foother-inc-UK.php");
?>
<script src="app.js"></script>

</body>
</html>

<?php
}
else {
  header("Location: connexion-UK.php");
}
?>
