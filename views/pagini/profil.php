<?php
$con = mysqli_connect("localhost", "astro_user", "VuEpEARll3ReG", "astro_proiectdaw", "3306");
if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
if (isset($_POST["stergere_artist"])) {
    $del_artist = "DELETE FROM artisti WHERE nume= '".$_POST['stergere_artist']."'";
    if (mysqli_query($con, $del_artist)) {
  echo "Artist șters!";
} else {
  echo "EROARE." . mysqli_error($con);
}
} ?>
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
            
              
                  <div style="display:flex;">
                      <div style="width:50%; float:left;">
                          <section id="cont">
              <h1>Bine ati venit, <?php echo $_SESSION['username']?>!</h2>
              
            </section>
             <section id="date_personale">
                 <ul>
                 
              <h2> ->  Datele dumneavoastra:</h2>
                <li>Nume de utilizator:  <?php  echo $_SESSION['username']?></li>
                <li>Parolă: <?php echo $_SESSION['password']?></li>
                <li>Email: <?php echo $_SESSION['email']?></li>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 && $_SESSION['rol']=='admin'):?>
                <li>Sunteti inregistrat ca si administrator!</li>
                <br>
                <li>Numarul de accesari pentru acest cont: <?php echo $_SESSION['accesari']?></li>
<?php endif; ?></ul>
</div>
<div style="width:50%; float:right;"> 
<br>
<h2 style="text-align: center;"> Doriți să ieșiți din contul dumneavoastră? </h2>
            <br>
              <form action="../../../../logout.php" method="post">
            <input type="submit" value="Delogare">
            </form></div>
</div>
              
              <br>
              <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 && $_SESSION['rol']=='admin'):?>
              <h2 style="text-align: center;"> LISTĂ DE ARTIȘTI: </h2>
              
              <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1)
              {
      
      if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();}
          $cerere_artist="SELECT * FROM artisti";
          $rezultat_artist= mysqli_query($con, $cerere_artist);
          if (mysqli_num_rows($rezultat_artist) > 0){
      while ($row_artist = mysqli_fetch_assoc($rezultat_artist)) 
      {
        echo "<div class='artist-container'>
       <div>
         <h2 class='artist-name' style='text-align: center;'>".$row_artist["nume"]."</h2>
         <br>
       </div>
     </div>";
      }
          }
          else
          {
      echo "Nu exista artisti.";
          }
              }
    ?><?php endif; ?>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 && $_SESSION['rol']=='admin'):?>
    <?php if (mysqli_num_rows($rezultat_artist) > 0): ?>
    <form action="profil.php" method="post">
        <label for="stergere_artist" style="text-align: center;">Introduceți numele artistului pe care doriti să îl ștergeți din listă:</label>
        <input type="text" id="text" name="stergere_artist" required>
    <input type="submit" name="buton_stergere" value="Șterge">
    </form>
    <?php endif; ?>
    <?php endif; ?>
            <br>
            
          </main>
          <footer>
            <p>Copyright © 2021 ASTRO Productions</p>
          </footer>
</html>