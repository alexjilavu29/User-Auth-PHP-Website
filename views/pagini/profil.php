<!DOCTYPE html>
<html lang="ro">
    <head>
        <title>Astro Productions</title>
        <meta charset="UTF-8">
        <meta name="description" content="Astro Productions - Cunoaste artisti noi de pretutindeni">
        <link rel="shortcut icon" href="../../../../../resurse/imagini/favicon.ico" type="image/x-icon"/>
        <link rel="apple-touch-icon" sizes="180x180" href="../../../../../resurse/imagini/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../../../../resurse/imagini/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../../../../resurse/imagini/favicon-16x16.png">
        <link rel="manifest" href="../../../../../resurse/imagini/site.webmanifest">
        <link rel="mask-icon" href="../../../../../resurse/imagini/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="../../../../../resurse/css/general.css" type="text/css"/>
        <link rel="stylesheet" href="../../../../../resurse/css/hamburger.css" type="text/css"/>
        <link rel="stylesheet" href="../../../../../resurse/css/header.css" type="text/css"/>
        <link rel="stylesheet" href="../../../../../resurse/css/inregistrare.css" type="text/css"/>
          </head>
    
    <body>
       
       
    
    <header>
    <?php session_start(); ?>
            <a href="../../../../../index.php">
            <img src="../../../../../resurse/imagini/image.png" class="header-img">
        </a>
            <h1 class="header-titlu"> ASTRO PRODUCTIONS</h1>
        </header>
        <nav >
            <label id="hamburger" for="ch-menu" >
                <img src="../../../../resurse/imagini/Hamburger_icon_alb.png" alt="menu">
            </label>
            <input id="ch-menu" type="checkbox">
            <ul class="meniu">
                <li><a href="../../../../../index.php">
                    Acasa
                </a></li>



                
              <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1): ?>
                <li><a href="../../../../../views/pagini/profil.php">Profil</a></li>
              <?php else: ?>
                <li><a href="../../../../../views/pagini/inregistrare.php">Inregistrare</a></li>
              <?php endif; ?>
            
                


                <li>
                    <a href="../../../../../views/pagini/despre.php">Despre</a>
                </li>
                <li><a href="../../../../../views/pagini/artisti.php">
                    Artiștii noștri</a>
                </li>
                <li><a href="../../../../../views/pagini/newsletter.php">Abonează-te la Newsletter!</a></li>
            </ul>
           <a 
             <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1): ?>
                href="../../../../../views/pagini/profil.php"
              <?php else: ?>
                href="../../../../../views/pagini/inregistrare.php"
              <?php endif; ?>
            >
                <img src="../../../../../resurse/imagini/login2.png" class="login-img"></a>
        </nav>
        <main>
            <section id="cont">
              <h1>Bine ati venit, <?php echo $_SESSION['username']?>!</h2>
              
            </section>
            <section id="date_personale">
              <h2>Datele dumneavoastra:</h2>
              <ul>
                <li>Nume de utilizator:  <?php  echo $_SESSION['username']?></li>
                <li>Parolă: <?php echo $_SESSION['password']?></li>
                <li>Email: <?php echo $_SESSION['email']?></li>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 && $_SESSION['rol']=='admin'):?>
                <li>Sunteti inregistrat ca si administrator!</li>
<?php endif; ?>
              </ul>
            <br>
            <h2> Doriti sa iesiti din contul dumneavoastra? </h2>
              <form action="../../../../logout.php" method="post">
            <input type="submit" value="Log Out">
            </form>
          </main>
          <footer>
            <p>Copyright © 2021 ASTRO Productions</p>
          </footer>
</html>
