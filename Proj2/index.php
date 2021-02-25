<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Registrering</h1>
    <?php include "email.php" ?>
</article>

<article>
    <h1>Logga in</h1>
    <form action="login.php" method="get">
        Användarnamn: <input type="text" name="user"><br>
        Lösenord: <input type="text" name="pass"><br>
        <input type="submit">
    </form>
    
</article>

<article>
    <h1>Mata in data</h1>
    <?php include "insert.php" ?>
</article>