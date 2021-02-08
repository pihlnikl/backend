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
            <h1>Hidden Page</h1>
        </article>
        <article>
            <?php
            if(isset($_SESSION["user"]))
            {
                print("Hej på dig ".$_SESSION["user"]);
                print("<h1>Hidden Page</h1>
                
                <p>Lorem ipsum dolor sit amet.</p>");
            }
            else
            {
                print("<p>Lorem not very ipsum</p>");
                print("Var snäll, logga in: <a href='./sessions.php'>Sessions</a>");
            }
            ?>
        </article>
    </section>
</body>
</html>