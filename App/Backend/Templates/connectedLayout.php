<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'TenPenseQuoi.com' ?>
    </title>
    <meta charset="utf-8" />
    <meta name="description" content="Forum de discussions, Tenpensequoi.com est un forum de discussions et de partage, creez et commentez les sujet des utilisateur." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
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
        <?php if (!empty($user->user()) && !empty($users) && $users['users_statut'] == 5) { ?>
          <li><a class="nav-link text-uppercase" href="../Mon-Compte">Mon compte utilisateur <span><?= htmlspecialchars($users['users_name']) ?></span></a>
          <li><a class="nav-link text-uppercase" href="./admin/Mon-Compte-Admin">Mon compte admin <span><?= htmlspecialchars($users['users_name']) ?></span></a></li>
          <?php if(!empty($user->user()) && !empty($users) && $users['users_statut'] == 5 && $users['users_name'] == '15f5e1d6e5z1d1s2e5') { ?>
          <li><a class="nav-link text-uppercase" href="./Users-Administration">Administration des utilisateurs</a></li>
          <?php } ?>
          <li><a class="nav-link text-uppercase" href="./Posts-Administration">Administration des Articles</a></li>
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
      <footer>
      </footer>
    </div>
  </body>
</html>