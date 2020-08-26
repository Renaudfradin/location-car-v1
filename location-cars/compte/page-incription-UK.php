<?php
  require_once("connexiondb.php");

if (isset($_POST['forminscription']) ) {
  if (!empty($_POST['pseudo'])
  AND !empty($_POST['age']) 
  AND !empty($_POST['passwords']) 
  AND !empty($_POST['password2']) 
  AND !empty($_POST['email']) 
  AND !empty($_POST['mail2']))
  {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $age = htmlspecialchars($_POST['age']);
    $mail = htmlspecialchars($_POST['email']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $password = sha1($_POST["passwords"]);
    $password2 = sha1($_POST["password2"]);

    $pseudolength = strlen($pseudo);
    if ($pseudolength <= 255) {
      if ($mail == $mail2 ) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

          $reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
          $reqmail ->execute(array($mail));
          $mailexist = $reqmail->rowCount();


          if ($mail == $mailexist) {


            if ($password  == $password2) {

              $longeurkey = 15;
              $key= "";
              for ($i=1; $i<$longeurkey ; $i++) { 
                $key .= mt_rand(0,9);
              }


              $insertmbr = $bdd->prepare("INSERT INTO users (pseudo,age,passwords,email) VALUES (?, ?, ?, ?)");
              $insertmbr ->execute(array($pseudo, $age, $password, $mail));
              $erreur = "Your account has been created ! <a href=\"page-connexion.php\">Log in </a>";

        
        }
        else {
          $erreur = "The 2 passwords do not match <br>";
        }

        }
        else{
        $erreur = "Email address already used!";
        }

       }
       else {
         $erreur = "Your email address is not valid";
       }
      }
      else {
        $erreur = "The 2 email addresses do not match";
      }


    }
    else {
      $erreur = "Your nickname is too big";
    }
  }
  else {
      $erreur = "Missing pseudo";
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


  <h1 class="inscription">Resgistration</h1>
  <br>
  <br>
  
        
            
<div class="formins">
<form method="POST"action="">
    <table>
    <tr>
      <td>
        <label for="pseudo">Pseudo *</label>
      </td>
      <td>
        <input type="text" name="pseudo" id="pseudo" placeholder="your pseudo" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="age">Age *</label>
      </td>
      <td>
        <input type="text" name="age" id="age" placeholder="your age" required>
      </td>
    </tr>
    <div>
      <p class="IDENTIFIANTS">Your IDENTIFIERS</p>
    </div>
    <tr>
      <td>
        <label for="passwords">Password *</label>
      </td>
      <td>
        <input type="password" name="passwords" id="passwords" placeholder="your password" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="password2">Confirm your password *</label>
      </td>
      <td>
        <input type="password" name="password2" id="password2" placeholder="confirm your password" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="email">email address *</label>
      </td>
      <td>
        <input type="email" name="email" id="email" placeholder="your email address" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="mail2">Confirm your email address *</label>
      </td>
      <td>
        <input type="email" name="mail2" id="mail2" placeholder="Confirm your email address" required>
      </td>
    </tr>

  </table>
  <br>
  <button type="submit" name="forminscription" class="btn-envoyer">To send</button><br><br>

    </form>
    <a href="page-connexion-UK.php"><button class="btn-deja">Already registered?</button></a>
</div>
  
    <br>
    <br>

  <?php
  if (isset($erreur)) {
    echo $erreur;
  }
  include_once("foother-inc-UK.php");
  ?>
  <script src="app.js"></script>
    </div>
    </div>
</div>


</body>
</html>