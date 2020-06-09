<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'TenPenseQuoi.com' ?>
    </title>
    <meta charset="utf-8" />
    <meta name="description" content="Forum de discussions, Tenpensequoi.com est un forum de discussions et de partage, creez et commentez les sujet des utilisateur." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
  </head>
  <header>
    <div class="container col-12">
          <h1 class="text-center title">Tenpensequoi.com ?</h1>
      </div>
  </header>
<input id="page-nav-toggle" class="main-navigation-toggle" type="checkbox" />
  <label class="bg-black" for="page-nav-toggle">Menu
  <svg class="icon--menu-toggle" viewBox="0 0 60 30">
    <g class="icon-group">
      <g class="icon--close">
        <path d="M 15 0 L 45 30" />
        <path d="M 15 30 L 45 0" />
      </g>
    </g>
  </svg>
  </label>
    <nav class="main-navigation">
      <ul>
        <?php if (empty($user->user())) { ?>
          <li><a class="nav-link text-uppercase" href="../"><span>Accueil</span></a></li>
          <li><a class="nav-link text-uppercase" href="../Inscriptions"><span>Inscriptions</span></a></li>
          <li><a class="nav-link text-uppercase" href="../Connexion"><span>Connexion</span></a></li>
        <?php } ?>
          <li><a class="nav-link text-uppercase" href="../Forum"><span>Forum</span></a></li>
        <?php if (!empty($user->user())) { ?>
          <li><a class="nav-link text-uppercase" href="../Mon-Compte">Mon compte <span><?= htmlspecialchars($users['users_name']) ?></span></a>
          </li>
        <?php if (!empty($user->user()) && !empty($users) && $users['users_statut'] == 5) { ?>
          <li><a class="nav-link text-uppercase" href="./admin/Mon-Compte-Admin">Mon compte admin</a></li>
        <?php } ?>
          <li><a class="nav-link text-uppercase" href="../Creer-Mon-Article">Creer un Article</a></li>
          <li><a class="nav-link text-uppercase" href="../Mes-Articles">Voir mes Article</a></li>
          <li><a class="nav-link text-uppercase" href="../Mes-Messages">Message Privés <?php $countMyPrivateMessages = $this->app->user()->countMyPrivateMessages(); if(empty($countMyPrivateMessages)) { echo('0'); } else { echo($countMyPrivateMessages); } ?></a></li>
          <li><a class="nav-link text-uppercase" href="../Mes-Amis">Gerer mes amis</a></li>
          <li><a class="nav-link text-uppercase" href="../Deconnexion">Déconnection</a></li>
        <?php } ?>
      </ul>
    </nav>
      <body>
      <div id="content-wrap">
        <section id="main">
          <?php if ($user->hasFlash()) echo '<div class="container text-center text-uppercase my-message col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 m-auto"><p class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5 mb-5">', $user->getFlash(), '</p></div>'; ?>
          <?= $content ?>
        </section>
      </div>
  <footer class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 p-3">
    <script type="text/javascript" src="../script/script.js"></script>
      <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
        <div class="row">
          <div class="container col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <span><a class="text-white" href="./Contact">Un bug ? Un problème ? Contactez nous</a></span>
          </div>
          <div class="container col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <span><a class="text-white" href="./Reglement">Réglement</a></span>
          </div>
          <div class="container col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <span class="text-white">Version 1.5</span>
          </div>  
        </div>
      </div>
  </footer>
    </div>
  </body>
</html>