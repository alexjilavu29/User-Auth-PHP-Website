<?php
require_once('../../resurse/phpmailer/class.phpmailer.php');
if (isset($_POST["inregistrare"])) {
    $con = mysqli_connect("localhost", "root", "", "proiectDAW", "3306");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
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
        $mail->Username = 'astro.productions.off@gmail.com'; // GMAIL username
        $mail->Password = $gmail_password; // GMAIL password
        $mail->SetFrom('astro.productions.off@gmail.com', 'ASTRO Productions');
        $mail->AddReplyTo($_POST["email"], $_POST["username"]);
        $mail->AddAddress($_POST["email"], $_POST["username"]);
        $mail->isHTML(true);
        $mail->Subject = "VERIFICARE MAIL || ASTRO Productions";
        $mail->Body = "DATI CLICK AICI: ";
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
            <form action="inregistrare.php" method="post">
                <label for="username">Nume de utilizator:</label>
                <input type="text" id="username" name="username">
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <br>
                <label for="password">Parolă:</label>
                <input type="password" id="password" name="password">
                <br><br>
                <input type="submit" name="inregistrare" value="Intră în cont">
                
              </form>
              <br>
              <!-- <form action="/signup" method="post">
                <input type="button" value="Nu sunteți înregistrat?" onclick="location.href='/signup';">
              </form> -->
          </body>
          </main>
          
          <footer>
            <p>Copyright © 2021 ASTRO Productions</p>
          </footer>

</html>