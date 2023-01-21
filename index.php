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
                <li><a href="../../../../../views/pagini/inregistrare.php">Inregistrare</a></li>
                <li>
                    <div><a href="../../../../../views/pagini/despre.php">Despre</a></div>
                    <ul>
                        <li>Prezentare</li>
                        <li>Istoric</li>
                        <li>Motivatie</li>
                    </ul>
                </li>
                <li><a href="../../../../../views/pagini/artisti.php">
                    Artiștii noștri</a>
                </li>
                <li>Abonează-te la Newsletter!</li>
            </ul>
            <a href="../../../../../views/pagini/inregistrare.php">
                <img src="../../../../../resurse/imagini/login2.png" class="login-img"></a>
        </nav>
                <main>
        <h1>Bine ati venit la firma noastra de productie muzicala</h1>
            <div class="active-users">
                <h2>Numarul de utilizatori activi: <?php echo $active_users_count; ?></h2>
              </div>
            <div class="top-artists">
              <div class="top-artist">
                <img src="artist1.jpg" class="top-artist-image" alt="artist 1">
                <h3>Artist 1</h3>
              </div>
              <div class="top-artist">
                <img src="artist2.jpg" class="top-artist-image" alt="artist 2">
                <h3>Artist 2</h3>
              </div>
              <div class="top-artist">
                <img src="artist3.jpg" class="top-artist-image" alt="artist 3">
                <h3>Artist 3</h3>
              </div>
              <div class="top-artist">
                <img src="artist4.jpg" class="top-artist-image" alt="artist 4">
                <h3>Artist 4</h3>
              </div>
              <div class="top-artist">
                <img src="artist5.jpg" class="top-artist-image" alt="artist 5">
                <h3>Artist 5</h3>
              </div>
            </div>
            <div class="gallery">
              <img src="image1.jpg" class="gallery-image" alt="image 1">
              <img src="image2.jpg" class="gallery-image" alt="image 2">
              <img src="image3.jpg" class="gallery-image" alt="image 3">
              <img src="image4.jpg" class="gallery-image" alt="image 4">
              <img src="image5.jpg" class="gallery-image" alt="image 5">
            </div>
            <div class="description">
              <p>Firma noastra de productie muzicala este dedicata descoperirii si promovarii artistilor talentati. Lucram cu o varietate de genuri muzicale si colaboram cu artisti din intreaga lume pentru a crea muzica de calitate. Va invitam sa navigati pe site-ul nostru pentru a afla mai multe despre artistii si proiectele noastre.</p>
            </div>
            <?php
                // Connect to the database
                $conn = mysqli_connect("host", "username", "password", "database_name");

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Get the active users count from the database
                $sql = "SELECT COUNT(*) as count FROM users WHERE active = 1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $active_users_count = $row['count'];

                // Close the connection
                mysqli_close($conn);
            ?>
          </main>
          <footer>
            <p>Copyright © 2021 ASTRO Productions</p>
          </footer>
          </html>