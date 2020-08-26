<!-- DEBUT nav bar-->
<div class="ul" id="myTopnav">
  <a href="../HOME-UK.php" class="home">AKIM VTC</a>
  <div class="coin">
  <a href="page-location-UK.php" class="resteloc">Rentals</a>
  <a href="panier-UK.php" class="resteloc">Panier</a>

    <?php
        if (!isset($_SESSION["id"])) {
          echo"<a href='../compte/page-connexion-UK.php'>login</a>";
          echo"<a href='../compte/page-incription-UK.php'>registration</a>";
        }else{ 
            $requsers = $bdd->query1('SELECT * FROM users WHERE id');?>
            <a href="../compte/page-profil-UK.php?id=<?= $_SESSION["id"]?>"><?=$requsers['pseudo'] ?></a>
            <a href='../compte/deconnexion-UK.php' class="resteloc">disconnect</a>
        <?php } ?> 
        </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i></a>
</div>
<nav>
            <ul>
                <li class="menu-langue"><a href="#"  class='resteloc'>Langue</a>
                  <ul class="submenu">
                      <li><a href= "../HOME.php" class="resteloc">French</a></li>
                      <li><a href="../HOME-UK.php" class="resteloc">English</a></li>
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