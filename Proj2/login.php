
<form action="index.php" method="post">
    Användarnamn: <br><input type="text" name="user"><br>
    Lösenord: <br><input type="password" name="password"><br>
    <input type="hidden" name="stage" value="login">
    <input type="submit" value="Logga in">
</form>

<?php
    $user = test_input($_REQUEST["user"]);
    $pass = test_input($_REQUEST["password"]);
    $password = hash("sha256", $pass);
    include "fetch.php";
?>