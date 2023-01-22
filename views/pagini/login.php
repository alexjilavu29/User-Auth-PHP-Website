<?php


require_once('../../resurse/phpmailer/class.phpmailer.php');
require_once ('../../recaptcha-master/src/autoload.php');
if (isset($_POST["login"])) {
    
    $con = mysqli_connect("localhost", "root", "", "proiectDAW", "3306");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }


    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($con,"SELECT * FROM users WHERE username= '".$username."' AND password = '" . $password . "'");

    echo mysqli_num_rows($result);
    if (mysqli_num_rows($result)) {

        $row = mysqli_fetch_assoc($result);

        if ($row['username'] == $username && $row['password'] == $password) {

            echo "V-ați autentificat cu succes!";
            session_start();
            $_SESSION['username'] = $username;
            //echo $_SESSION['username'];
            $_SESSION['password'] = $password;
            //echo $_SESSION['password'];
            $_SESSION['email'] = $row['email'];
            //echo $_SESSION['email'];
            $_SESSION['idUser'] = $row['idUser'];
            //echo $_SESSION['idUser'];
            $_SESSION['logged_in'] = 1;

           // header("Location: ../../../../index.php");

            // exit();
        } else {
            exit("Nu s-a putut realiza conexiunea.");
        }


    }
    else if(mysqli_num_rows($result)==0)
    {
        exit("Nu s-a putut gasi niciun utilizator cu datele introduse.");
    } else{
        exit("S-au inregistrat mai multi utilizatori cu aceleasi date de contact.");
    }
}


    ?>

<!DOCTYPE html>
<html lang="ro">
    <head>
        <title>Autentificare Client | ASTRO Productions</title>
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
        <style>#email
        {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 2px solid rgb(39, 39, 39);
            border-radius: 2px;
        }
  </style>
          
          <body>
            <form action="login.php" method="post">
                <br>
                <label for="username">Nume de utilizator:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password">Parolă:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <input type="submit" name="login" value="Intră în cont">
              </form>
              <br><br>

              <br>
          </body>
          </main>
          
          <footer>
            <p>Copyright © 2021 ASTRO Productions</p>
          </footer>

</html>