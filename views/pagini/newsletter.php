<?php
require_once('../../resurse/phpmailer/class.phpmailer.php');
require_once ('../../recaptcha-master/src/autoload.php');
if (isset($_POST["newsletter"])) {
    $con = mysqli_connect("localhost", "astro_user", "VuEpEARll3ReG", "astro_proiectdaw", "3306");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    if (empty($_POST['g-recaptcha-response'])){
        echo "Te rugam sa rezolvi captcha-ul";
     exit();
   }
      
        
    $select = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_POST['email']."'");
    $row = mysqli_fetch_assoc($select);
    if ($row['newsletter'] != 1) {
        if (mysqli_num_rows($select)) {
            $insert_news = "UPDATE users SET newsletter = 1 WHERE email = '" . $_POST['email'] . "'";
            mysqli_query($con, $insert_news);

            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPDebug = 2;
            try {
                $row = mysqli_fetch_assoc($select);
                $gmail_password = "zmulvuerrnvsjths";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465;
                $mail->Username = 'astro.productions.off@gmail.com';
                $mail->Password = $gmail_password;
                $mail->SetFrom('astro.productions.off@gmail.com', 'ASTRO Productions');
                $mail->AddReplyTo($_POST["email"], $row["username"]);
                $mail->AddAddress($_POST["email"], $row["username"]);
                $mail->isHTML(true);
                $mail->Subject = "Newsletter || ASTRO Productions";
                $mail->Body = " Va multumim ca v-ati abonat la newsletter-ul nostru! <br><br>
            Ne bucuram sa va tinem la curent cu cele mai noi actualizari si noutati din lumea muzicii.
            <br><br>
            In ultima perioada, am lansat albume noi de la artistii nostri de top, iar acestea au primit recenzii excelente din partea criticilor de muzica. De asemenea, am organizat concerte live online, si am anuntat turnee viitoare pentru acesti artisti.
            <br>
            In plus, am lansat un nou program de mentorship pentru tinerii artisti, care le ofera oportunitati de a colabora cu artistii nostri consacrati si de a-si dezvolta abilitatile muzicale.
            <br><br>
            Nu pierdeti urmatoarele actualizari si noutati, asigurati-va ca va verificati adresa de e-mail si urmariti-ne pe Instagram la @astro_productions.
            <br><br>
            Va multumim din nou pentru sustinerea dvs. continua,<br>
            Alexandru Jilavu,<br>
            Manager ASTRO Productions<br> ";
                $mail->send();

            } catch (Exception $e) {
                echo $e->getMessage();
            }
            header("Location: ../../../views/pagini/newsletter.php");
        }
    }
    else
    {
        echo "Sunteti deja abonat la newsletter!";
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
            <form action="newsletter.php" method="post">
                <br>
                <label for="email">Introduceți mail-ul personal:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <br>
                 <div class="g-recaptcha" data-sitekey="6LfqxRkkAAAAABQO7Bn4_crxi0sXPHGFX4lsU_Fy"></div>
                <br> 
                <input type="submit" name="newsletter" value="Abonează-mă">
              </form>
              <br><br>

    
            
          </body>
          </main>
          
          <footer>
            <p>Copyright © 2021 ASTRO Productions</p>
          </footer>

</html>