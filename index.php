<?php include "innit.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <section>
        <?php include "navbar.php" ?>
        <article>
            <?php
                $user = get_current_user();
                $userIP = $_SERVER["REMOTE_ADDR"];

                print("<h2>Intressant fakta om dig: </h2>
                <p>Ditt namn: ".$user." <br>
                <p>Din IP address: ".$userIP);

                $servername = $_SERVER['SERVER_NAME'];
                $serverIP = $_SERVER['SERVER_ADDR'];
                $apacheversion = apache_get_version();
                $PHPversion = phpversion();

                print("<h2>Intressant fakta om denna nätsida: </h2>
                <p>PHP version: ".$PHPversion."<br>
                Apache version: ".$apacheversion."<br>
                Serverns namn: ".$servername."<br>
                Serverns IP: ".$serverIP."<br>");

                setlocale(LC_TIME, 'sv');
                print("<h3>Datum just nu: </h3>");
                $time = date("H:i:s");
                $date = date("d:m:Y");
                $weekday = utf8_encode(strftime("%A"));
                $month = utf8_encode(strftime("%B"));
                $weeknumber = date("W");
                print ("Klockan: ".$time."<br>
                Datumet: ".$date."<br>
                Veckodag: ".$weekday."<br>
                Månad: ".$month."<br>
                Veckans nummer: ".$weeknumber);

                include "usercounter.php";
                print("<a href='../BackEnd/usercounter.txt'>Besökräknare (hemlisar)</a>");
            ?>
        </article>
    </section>
</body>
</html>