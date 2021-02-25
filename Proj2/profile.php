<?php include "init.php" ?>
<?php include "head.php" ?>

<h1>Profilsida</h1>

<a href="profile.php?stage=edit"><input type="button" value="Editera"></a>
<a href="profile.php?stage=delete"><input type="button" value="Radera"></a>

<?php
    //$current = $_SESSION["user"];
    //$user = $_REQUEST["user"];
    //include "comments.php";
    if(isset($_SESSION["user"]))
    {
        if(isset($_REQUEST["stage"]) && ($_REQUEST["stage"] == "edit"))
        {
            include "edit.php";
        }
        else if(isset($_REQUEST["stage"]) && ($_REQUEST["stage"] == "delete"))
        {
            include "delete.php";
        }
    }
    else if(isset($_SESSION["user"]) && $current != $user)
    {
        //SELECT id, user FROM users WHERE username = $_REQUEST["user"];
        //SELECT comment FROM comments WHERE profile_id = $row["id"];
    }
    else
    {
        Print("Skapa en profil för att kolla på andra");
    }
?>