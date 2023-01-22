<!DOCTYPE html>
<html lang="ro">
<title>Artistii nostri | ASTRO Productions</title>
    <meta charset="UTF-8">
        <meta name="description" content="Astro Productions - Cunoaste artisti noi de pretutindeni">
       

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
    <style>
      
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
      
      .artist-container {
        display: flex;
        align-items: center;
        margin: 20px;
      }
      
      .artist-image {
        width: 150px;
        height: 150px;
        margin-right: 20px;
      }




      
      .artist-name {
        font-size: 18px;
      }
     .artist-description{
         background-color: lightgrey;
         font-size: 16px;
         margin-left: 0px;
         
         
     }


    </style>
  </head>
  
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
            <a href="../../../../../views/pagini/inregistrare.php">
                <img src="../../../../../resurse/imagini/login2.png" class="login-img"></a>
        </nav>
  <main>
    <?php 
      $con = mysqli_connect("localhost", "root", "", "proiectDAW", "3306");
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
         <h2 class='artist-name'>".$row_artist["nume"]."  -- ".$row_artist["gen_muzical"]."</h2>
         <p class='artist-description'>".$row_artist["descriere"]."</p>
         <br>
       </div>
     </div>";




      }
          }
          else
          {
      echo "Nu exista artisti.";
          }
    
    ?>
    
</main>

<footer>
            <p>Copyright © 2021 ASTRO Productions</p>
          </footer>
</html>