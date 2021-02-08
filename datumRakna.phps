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
            <h1>Beräkna Datum</h1>
        </article>

        <article>
            <?php
                $day = $_GET["dag"];
                $month = $_GET["manad"];
                $year = $_GET["ar"];
                print("<p>Dagen: " . $day . "<br>");
                print("Månaden: " . $month ."</p>");

                if (($day > 0) && ($day < 32) && ($month > 0) && ($month < 13))
                {
                    $timenow = time();
                    $giventime = mktime(12,0,0,$month,$day,$year);
                    $difference = $giventime - $timenow;
                    $days = $difference / (60*60*24);
                    $restHours = $difference % (60*60*24);
                    $hours = $restHours / (60*60);
                    $restMinutes = $restHours % (60*60);
                    $minutes = $restMinutes / 60;
                    $restSeconds = $minutes % 60;
                    $seconds = $restSeconds;
                    $weekday = utf8_encode(strftime($giventime));
                    $dayOfWeek = date("l", $weekday);

                    if ($timenow > $giventime)
                    {
                        print("Det är ".floor($days)." dagar, ".floor($hours)."h, ".floor($minutes)."min och ".floor($seconds)."s i det förflutna <br>");
                        print("Veckodagen är: ". $dayOfWeek);
                    }
                    else
                    {
                        print("Det är ".floor($days)." dagar, ".floor($hours)."h, ".floor($minutes)."min och ".floor($seconds)."s i framtiden <br>");
                        print("Veckodagen är: ". $dayOfWeek);
                    }
                }
                else
                {
                    print("<p>Inte ett korrekt datum</p>");
                }
            ?>
        </article>
    </section>
</body>
</html>