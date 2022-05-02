<header class="container">
  <div class="row">
    <div class="col-5">
    </div>
    <div class="col-2">
      <a href="/"><img src="../img/company_logo.svg" alt="Logo de La baie Ourson"></a>
    </div>
    <div class="col-5">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
          <a class="nav-link <?php if(PAGEALIAS == "accueil"){ echo "active";} ?>" aria-current="page" href="/">Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(PAGEALIAS == "cart"){ echo "active";} ?>" href="/cart">Panier</a>
        </li>
        <?php
        $isConnected = false;
        if(isset($_SESSION["user"])){
          $isConnected = true;
        }
        if (!$isConnected) :
        ?>
          <li class="nav-item">
            <a class="nav-link <?php if(PAGEALIAS == "signup"){ echo "active";} ?>" href="/signup">Créer un compte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if(PAGEALIAS == "signin"){ echo "active";} ?>" href="/signin">Se connecter</a>
          </li>
        <?php
        else :
        ?>
          <li class="nav-item">
            <a class="nav-link" href="/signout">Se déconnecter</a>
          </li>
        <?php
        endif;
        ?>
      </ul>
    </div>
  </div>
</header>