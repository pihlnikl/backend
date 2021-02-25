<?php
if (isset($_REQUEST["salary"]))
{
    $sql = "SELECT * FROM users ORDER BY salary DESC";
    fetchAndWrite($sql);
}

else if(!isset($_REQUEST["salary"]))
{
    $sql = "SELECT * FROM users";
    fetchAndWrite($sql);
}

else
{
    if (!isset($_REQUEST["stage"]))
    {
        $sql = "SELECT * FROM users";
        
    }
    else
    {
        $salary = $_REQUEST["salary"];
        $pop = $_REQUEST["likes"];
        $user = $_SESSION["user"];
    }
}

function fetchAndWrite($sql)
{
    $conn = create_conn();

    if($_SESSION == null)
    {
        if($result = $conn->query($sql))
        {
            while($row = $result->fetch_assoc())
            {
                print("<p class='ad'>");
                print("Användare: " . $row["name"] . "<br>");
                print("Preferens: " . $row["preference"] . "<br>");
                print("Bio: " . $row["bio"] . "<br>");
                
            }
        }
    }
    else
    {
        if($result = $conn->query($sql))
        {
            while($row = $result->fetch_assoc())
            {
                $prefArray = ["Manlig", "Kvinnlig", "Båda", "Annat", "Alla"];
                print("<p class='ad'>");
                print("Användare: " . $row["name"] . "<br>");
                print("Preferens: " . $row["preference"] . "<br>");
                print("Bio: " . $row["bio"] . "<br>");
                print("Lön: " . $row["salary"] . "<br>");
                print("Epost: " . $row["email"] . "<br>");
                print("<a href='./profile.php?user=".$row['user']."'>Kommentera</a></p>");
            }
        }
    }
}
?>