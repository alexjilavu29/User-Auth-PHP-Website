<?php
require_once('../../resurse/phpmailer/class.phpmailer.php');
require_once ('../../recaptcha-master/src/autoload.php');
if (isset($_POST["inregistrare"])) {
    $con = mysqli_connect("localhost", "root", "", "proiectDAW", "3306");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    if (empty($_POST['g-recaptcha-response'])){
        echo "Te rugam sa rezolvi captcha-ul";
         exit();
       }
      
        
    $select = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_POST['email']."'");
    if(mysqli_num_rows($select)) {
    exit('Email-ul este deja folosit!');
    }

    $select = mysqli_query($con, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
    if(mysqli_num_rows($select)) {
    exit('Numele de utilizator este deja folosit!');
    }

    $insert_user = "INSERT INTO users (username,email, password) VALUES ('" . $_POST["username"] . "','" . $_POST["email"] . "','" . $_POST["password"] . "')";
    echo $insert_user;
    mysqli_query($con, $insert_user);
    mysqli_close($con);

    




    $mail = new PHPMailer(true);

    $mail->IsSMTP();
    $mail->SMTPDebug = 2;
    try {
        $gmail_password = "zmulvuerrnvsjths";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = 'astro.productions.off@gmail.com'; 
        $mail->Password = $gmail_password; 
        $mail->SetFrom('astro.productions.off@gmail.com', 'ASTRO Productions');
        $mail->AddReplyTo($_POST["email"], $_POST["username"]);
        $mail->AddAddress($_POST["email"], $_POST["username"]);
        $mail->isHTML(true);
        $mail->Subject = "INREGISTRARE || ASTRO Productions";
        $mail->Body = "Va multumim pentru inregistrarea contului la firma noastra. Speram sa va bucurati de muzica la fel ca si noi! ";
        $mail->send();

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}



    ?>

<!DOCTYPE html>
<html lang="ro">
    <head>
        <title>Inregistrare Client | ASTRO Productions</title>
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
        <script src='https://www.google.com/recaptcha/api.js'></script>
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

        #button
        {
            text-decoration: none;
            text-align: center;
            margin: auto auto;
            display:block;
            place-items: center;
            width: 20%;
            padding: 20px;
            box-sizing: border-box;
            border: 2px solid rgb(39, 39, 39);
            border-radius: 10px;
            box-shadow: 3px 3px 15px rgb(212, 241, 255);
            color:black;
        }
  </style>
          
          <body>
            <form action="inregistrare.php" method="post">
                <label for="username">Nume de utilizator:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password">Parolă:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                 <div class="g-recaptcha" data-sitekey="6LfqxRkkAAAAABQO7Bn4_crxi0sXPHGFX4lsU_Fy"></div>
                <br> 
                <input type="submit" name="inregistrare" value="Autentifică-mă">
              </form>
              <br><br>
        
           <a href="../../../../../views/pagini/login.php" id="button">
            Aveți deja cont?</a>
              <br>
    
            
          </body>
          </main>
          
          <footer>
            <p>Copyright © 2021 ASTRO Productions</p>
          </footer>

</html>
