<?php
session_start();

if (isset($_SESSION['subscription_error'])) {
  unset($_SESSION['subscription_error']);
}
if (isset($_SESSION['subscription_success'])) {
  unset($_SESSION['subscription_sucess']);
}

require 'dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LoyaltyCard</title>
  <link class="theme" rel="stylesheet" href="lightvar.css" />
  <link rel="stylesheet" href="style.css" />
  <script src="main.js" defer></script>
  <script src="log-overlay.js" defer></script>
</head>

<body>
  <?php
  require 'overlay.php';
  ?>
  <header>
    <div class="header1"><a href="index.php"><img src="img/logo.svg" alt="Logo" /></a></div>
    <div class="header2"><a href="index.php">
        <h1>LoyaltyCard</h1>
      </a>

    </div>
    <div class="header3">
      <ul>
        <?php
        if (isset($_SESSION['username'])) {
          if ($_SESSION['isadmin'] == true) {
            echo '<li><a href="admin.php">Admin</a></li>';
          }
        }
        ?>
        <ul class="language">
          <li><a href="#">Français</a></li>
          <li><a href="#">English</a></li>
        </ul>
        <?php
        if (isset($_SESSION['username'])) {
          echo '<li><a href="disconnect.php">Déconnexion</a></li>';
          echo '<li><a href="profil.php">Mon compte</a></li>';
        } else {
          echo '<li class="connexion"><a href="#">Connexion et inscription</a></li>';
        }
        if (isset($_SESSION['id'])) {
        ?>
          <li class="panier"><a href="cartuser.php">Panier</a></li>
        <?php
        } else {
        ?>
          <li class="connexion"><a href="#">Panier</a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </header>
  <nav>
    <ul>
      <li><a href="index.php">En ce moment</a></li>
      <li><a href="infos.php">À propos</a></li>
      <li><a href="souscrire.php">Souscrire a LoyaltyCard</a></li>
      <li class="dropdown">
        <a href="index.php">&nbsp&nbspTout les avantages</a>
        <ul class="dropdown-item">
          <?php
          $rq = $db->query('SELECT name FROM categories');
          $categories = $rq->fetchAll();
          foreach ($categories as $category) {
          ?>
            <li><a href="categorie.php?name=<?php echo $category['name'] ?>"><?php echo $category['name'] ?></a></li>
          <?php
          } ?>
        </ul>
      </li>
    </ul>
  </nav>
  <main>