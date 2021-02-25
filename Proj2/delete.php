<p>Raddera annons:</p>
<form action="profile.php" method="post">
    Lösenord: <br><input type="password" name="password"><br>
    <input type="hidden" name="stage" value="delete">
    <input type="submit" value="Raddera annons">
</form>
<?php
    $user = $_SESSION["user"];
    $pass = test_input($_REQUEST["password"]);
    $password = hash("sha256", $pass);
    include "fetch.php";

    $conn = create_conn();
    $sql = "DELETE FROM users WHERE user=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();

    $result = $stmt->get_result();

    if($conn->querry($sql) === TRUE)
    {
        print("Profil raderad");
        header("refresh:2;url='./index.php");
    }
    else
    {
        print("Error " . $conn->error);
    }
?>