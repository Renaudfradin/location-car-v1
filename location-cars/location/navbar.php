<!-- DEBUT nav bar-->
<div class="ul" id="myTopnav">
  <a href="../HOME.php" class="home">AKIM VTC</a>
  <div class="coin">
  <a href="page-location.php" class="resteloc">Les locations</a>
  <a href="panier.php" class="resteloc">Panier</a>

    <?php
        if (!isset($_SESSION["id"])) {
          echo"<a href='../compte/page-connexion.php'>connexion</a>";
          echo"<a href='../compte/page-incription.php'>inscription</a>";
        }else{ 
            $requsers = $bdd->query1('SELECT * FROM users WHERE id');?>
            <a href="../compte/page-profil.php?id=<?= $_SESSION["id"]?>"><?=$requsers['pseudo'] ?></a>
            <a href='../compte/deconnexion.php' class="resteloc">déconnexion</a>
        <?php } ?> 
        </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i></a>
</div>
<nav>
            <ul>
                <li class="menu-langue"><a href="#"  class='resteloc'>Langue</a>
                  <ul class="submenu">
                      <li><a href="../HOME.php" class="resteloc">Francais</a></li>
                      <li><a href="../HOME-UK.php" class="resteloc">Anglais</a></li>
                  </ul>
                </li>               
            </ul>
  </nav>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "ul") {
    x.className += " responsive";
  } else {
    x.className = "ul";
  }
}
</script>

<!-- FIN nav bar-->