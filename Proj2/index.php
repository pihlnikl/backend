<?php include "init.php" ?>
<?php include "head.php" ?>

<article>

    <h1>Logga in</h1>
    <p>Logga in eller registrera dig</p>
    <a href="index.php?stage=signin"><input type="button" value="Logga in"></a>
    <a href="index.php?stage=signup"><input type="button" value="Registrera profil"></a>

    <?php
        if(isset($_REQUEST["stage"]) && ($_REQUEST["stage"] == "signup"))
        {
            include "register.php";
        }
        else if(isset($_REQUEST["stage"]) && ($_REQUEST["stage"] == "signin" || $_REQUEST["stage"] == "login"))
        {
            include "login.php";
        }
    ?>

</article>
