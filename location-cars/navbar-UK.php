<!-- DEBUT nav bar-->
<!--
<nav>
      <ul class="ul">
          <li class="li"><a href="HOME.php" class="lia">AKIM VTC</a></li>
          <li class="li"><a href="location/page-location.php" class="lia">Les locations</a></li>
          <li class="li"><a href="" class="lia">anuaire</a></li>
        <div class="conins">
          php
            if (!isset($_SESSION["id"])) {
              echo"<li class='li'><a href='compte/page-connexion.php' class='lia'>connexion</a></li>";
              echo"<li class='li'><a href='compte/page-incription.php' class='lia'>inscription</a></li>";
            }else{
                $getid1 = intval($_SESSION["id"]);
                $p = $bdd->prepare("SELECT * FROM users WHERE id = ?");
                $p->execute(array($getid1));
                $p1 = $p->fetch();  ?>
               <li class="li"><a href="compte/page-profil.php?id==$_SESSION["id"]?>" class="lia">=$p1['pseudo'] ?></a></li>
               php
                echo"<li class='li'><a href='compte/deconnexion.php' class='lia'>deconnexion</a></li>";
            } ?> 
        </div>
      </ul>
    </nav> -->
<div class="ul" id="myTopnav">
  <a href="HOME-UK.php" class="home-UK">AKIM VTC</a>
  <div class="coin">
  <a href="location/page-location-UK.php" class="resteloc">Rentals</a>
  <a href="location/panier-UK.php" class="resteloc">Panier</a>
  <?php
        if (!isset($_SESSION["id"])) {
          echo"<a href='compte/page-connexion-UK.php' class='resteloc'>login</a>";
          echo"<a href='compte/page-incription-UK.php' class='resteloc'>registration</a>";
        }else{
            $getid1 = intval($_SESSION["id"]);
            $p = $bdd->prepare("SELECT * FROM users WHERE id = ?");
            $p->execute(array($getid1));
            $p1 = $p->fetch();  ?>
            <a href="compte/page-profil-UK.php?id=<?=$_SESSION["id"]?>"><?=$p1['pseudo'] ?></a>
            <a href='compte/deconnexion-UK.php' class="resteloc">disconnect</a>
        <?php } ?> 
        </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i></a>
</div>
<nav>
            <ul>
                <li class="menu-langue"><a href="#"  class='resteloc'>Langue</a>
                  <ul class="submenu">
                      <li><a href= "HOME.php" class="resteloc">French</a></li>
                      <li><a href="HOME-UK.php" class="resteloc">English</a></li>
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