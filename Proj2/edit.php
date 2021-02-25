<?php
    $conn = create_conn();
    $user = $_SESSION['user'];
    $sql = "SELECT*FROM users WHERE user=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute(); 
    
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc())
    {
        print("<form action='profile.php' method='post'");
        print("<p>Användare: <input type='text' name='user' value='" . $row["user"] . "'><br>");
        print("Annonstext: <textarea name='bio'>" . $row["bio"] . "</textarea><br>");
        print("Epost: <input type='text' name='email' value='" . $row["email"] . "'><br>");
        print("Namn: <input type='text' name='name' value='" . $row["name"] . "'><br>");
        print("Postnummer: <input type='text' name='zip' value='" . $row["zip"] . "'><br>");
        print("Lön: <input type='text' name='salary' value='" . $row["salary"] . "'><br>");
        print("Nytt lösenord: <input type='password' name='newpassword'><br>");
        print("Preferens: " . $row['preference'] . "<br>");
        print("Preferens: <select name='preference'>
                <option value='' disabled selected>Välj</option>
                <option value=0>Man</option>
                <option value=1>Kvinna</option>
                <option value=2>Båda</option>
                <option value=3>Annat</option>
                <option value=4>Alla</option>
            </select><br>");
        print("Skriv lösenord för att editera: <input type='password' name='password'><br>");
        print("<input type='hidden' name='stage' value='edit'>");
        print("<input type='submit' value='Editera'>");
        print("</form>");

        $user = $_SESSION["user"];
        $pass = test_input($_REQUEST["password"]);
        $password = hash("sha256", $pass);
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $zip = $_REQUEST["zip"];
        $bio = $_REQUEST["bio"];
        $salary = $_REQUEST["salary"];
        $preference = $_REQUEST["preference"];
        $nuser = $_REQUEST["user"];
        include "fetch.php";
        if (isset($_REQUEST["newpassword"]))
        {
            $npass = $_REQUEST["newpassword"];
            $npassword = hash("sha256", $npass);
        }
        else
        {
            $npassword = $password;
        }

        $_SESSION["user"] = $row["user"];
        $conn = create_conn();
        $sql = "UPDATE users SET (user, name, password, email, zip, bio, salary, preference) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssii", $nuser, $name, $npassword, $email, $zip, $bio, $salary, $preference);
        $stmt->execute();

        $result = $stmt->get_result();

        if($conn->querry($sql) === TRUE)
        {
            print("Profil updaterad");
            $_SESSION["user"] = $row["user"];
            header("refresh:2;url='./index.php");
        }
        else
        {
            print("Error " . $conn->error);
        }
    }
?>