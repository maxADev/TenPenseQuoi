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
  <div class="parallax col-12"></div>
  </header>
  <body>
    <div id="wrap">
      <nav>
        <ul>
          <li><a href="../">Accueil</a></li>
        </ul>
      </nav>
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