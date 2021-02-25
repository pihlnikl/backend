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
            <h1>Cookies</h1>
        </article>

        <article>
            <?php
            $user = get_current_user();
            $lastvisit = time();
                setcookie("user", $user, time()+(86400*30), "/");
                setcookie("lastvisit", $lastvisit, time()+(86400*30), "/");

                if (isset($_COOKIE["user"]))
                {
                    print("Välkommen tillbaka " . $_COOKIE["user"]);
                    print("<br>Du var här första gången: " . date("H:i:s d:m:Y", $_COOKIE["lastvisit"]));
                }
                else
                {
                    print("Välkommen, detta är din första gång på denna sida!");

                }
            ?>
        </article>

    </section>
</body>
</html>