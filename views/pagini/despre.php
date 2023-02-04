<?php
require_once('../../resurse/phpmailer/class.phpmailer.php');
require_once ('../../recaptcha-master/src/autoload.php');
if (isset($_POST["despre"])) {
    $con = mysqli_connect("localhost", "astro_user", "VuEpEARll3ReG", "astro_proiectdaw", "3306");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

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
                $mail->SetFrom($_POST["email"], $_POST["nume"]);
                
                $mail->AddAddress('astro.productions.off@gmail.com', 'ASTRO Productions');
                $mail->isHTML(true);
                $mail->Subject = $_POST["subiect"];
                $mail->Body = $_POST["mesaj"];
                $mail->send();

            } catch (Exception $e) {
                echo $e->getMessage();
            }
}

    ?>
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
            <style>#email
        {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 2px solid rgb(39, 39, 39);
            border-radius: 2px;
        }</style>
        <div style="display:flex;">
             <div style="width:50%; float:left;">

                <br>
              <h2>Despre ASTRO Productions</h2>
              <p>Suntem o companie de producție muzicală care se specializează în crearea de muzică de înaltă calitate pentru o varietate de medii. Indiferent dacă căutați un coloana sonoră personalizată pentru filmul sau jocul video dvs., sau un sunet unic și profesionist pentru podcast-ul sau canalul YouTube, vă acoperim.</p>

              <h2>Serviciile noastre</h2>
              <ul>
                <li>Crearea coloanei sonore personalizate</li>
                <li>Producție muzicală</li>
                <li>Design sonor</li>
                <li>Mixaj și mastering</li>
              </ul>


              <h2>Portofoliul nostru</h2>
              <ul>
                <li>Partitură pentru filmul "Marea aventură"</li>
                <li>Coloană sonoră pentru jocul video "Escape the City"</li>
                <li>Muzică de intro pentru podcast-ul "The Daily Brief"</li>
                <li>Tema canalului YouTube pentru "Cooking with Karen"</li>
              </ul>

            </div>
             <div style="width:50%; float:left;">

                <h2 style="text-align: center;">Contactați-ne!</h2>
                <br>
                <form action="despre.php" method="post">
                <br>
                
                <label for="nume">Nume:</label>
                <input type="text" id="nume" name="nume" required>
                <br>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="subiect">Subiect:</label>
                <input type="text" id="subiect" name="subiect" required>
                <br>
                <label for="mesaj">Mesaj:</label>
                 <textarea id="mesaj" name="mesaj"></textarea>
                <br><br>
                <br> 
                <input type="submit" name="despre" value="Trimite-ne un mesaj!">
              </form>
              </div>
              

              
          </main>
          <footer>
            <p>Copyright © 2021 ASTRO Productions</p>
          </footer>
</html>