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
            <h1>Sessions</h1>
            <p>Logga in</p>
            <p>Använd user: Exempel för att kolla funktionalitet för Hidden sidan</p>
            <form action="sessions.php" method="get">
            Användarnamn: <input type="text" name="user"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit">
            </form>
        </article>
        <article>
            <?php
            if(isset($_GET["user"]))
            {
                $user = test_input($_GET["user"]);
                $password = test_input($_GET["password"]);
                if($user == "Exempel")
                {
                    $_SESSION["user"] = $user;
                    print("<a href='./hidden.php'>Hidden Page</a>");
                }
                else
                {
                    print("Vem är du?");
                }
            }
            ?>
        </article>
    </section>
</body>
</html>