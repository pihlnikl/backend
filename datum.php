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
            <h1>Datum</h1>
            <form action="datumRakna.php" method="get">
                Dag: <input type="text" name="dag"><br>
                Månad: <input type="text" name="manad"><br>
                År: <input type="text" name="ar"><br>
                <input type="submit">
            </form>
        </article>
    </section>
</body>
</html>