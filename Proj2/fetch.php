<?php
$conn = create_conn();
$sql = "SELECT * FROM users WHERE user=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute(); 

$result = $stmt->get_result();

while($row = $result->fetch_assoc())
{
    if(isset($_REQUEST["stage"]) && $_REQUEST["stage"] == "login")
    {
        if($row["password"] == $password && $row["user"] == $user)
        {
            $_SESSION["user"] = $_REQUEST["user"];
            print("loggar in...");
            header("refresh:1;url=./profile.php?");
        }
        else
        {
            print("Fel lösenord eller användarnamn / Användarnamn och/eller lösenord fattas!");
        }
    }
    else if(isset($_REQUEST["stage"]) && $_REQUEST["stage"] == "delete")
    {
        if($row["password"] == $password)
        {   
            print("Raderar..");
            continue;
        }
        else
        {
            print("Fel lösenord!");
        }
    }
    else if(isset($_REQUEST["stage"]) && $_REQUEST["stage"] == "edit")
    {
        if($row["password"] == $password)
        {
            $id = $row["id"];
            print("Editerar...");
            continue;
        }
        else
        {
            print("Kolla info / lösenord");
        }
    }
}
?>