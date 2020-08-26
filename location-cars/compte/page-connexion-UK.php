<?php
require_once("connexiondb.php");

if (isset($_POST["formconnect"])) {

  $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
  $mdpconnect = sha1($_POST["mdpconnect"]);

  if (!empty($pseudoconnect) AND !empty($mdpconnect) ) {
    
    $requser = $bdd->prepare("SELECT * FROM users WHERE pseudo = ? AND passwords = ?");
    $requser->execute(array($pseudoconnect, $mdpconnect));
    $userexist = $requser->rowCount();

    if ($userexist == 1) {
      $userinfo = $requser->fetch();
      $_SESSION["id"] = $userinfo["id"];
      $_SESSION["pseudo"] = $userinfo["pseudo"];
      $_SESSION["email"] = $userinfo["email"];
      $_SESSION["admins"] = $userinfo["admins"];
      
      header("Location: page-profil-UK.php?id=".$_SESSION["id"]);
    }
    else {
      $erreur ="bad nickname or password";
    }
  }
  else {
    $erreur = "All fields must be complete";
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

  <h1 class="h1co">Log in </h1>
  <br>

<div class="formcon">
  <form method="POST"action="">
    <table>
    <tr>
      <td>
        <label for="pseudoconnect">Pseudo :</label>
      </td>
      <td>
        <input type="text" name="pseudoconnect" id="pseudoconnect" placeholder="your pseudo" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="mdpconnect">Password :</label>
      </td>
      <td>
        <input type="password" name="mdpconnect" id="mdpconnect" placeholder="password" required>
      </td>
    </tr>


  </table>
    <br>
    <a href="#">Forgot your password</a><br><br>
    <button type="submit" name="formconnect" class="btn-connec">Log in</button><br><br>
    </form>
    
  <a href="page-incription-UK.php">Not registered ?</a>
</div>
<br><br><br><br>


  <?php
if (isset($erreur)) {
  echo $erreur;
}

include_once("foother-inc-UK.php");
?>
<script src="app.js"></script>
</body>
</html>
