<h1>Registrering</h1>
<form action="index.php" method="post">
    Användarnamn: <br><input type="text" name="user"><br>
    Namn: <br><input type="text" name="name"><br>
    E-post: <br><input type="text" name="email"><br>
    Postnummer: <br><input type="text" name="zip"><br>
    Om dig: <br><input type="text" name="bio"><br>
    Lön: <br><input type="text" name="salary"><br>
    Lösenord: <br><input type="password" name="password"><br>
    Preferens: <br><select name="preference"><br>
        <option value="" disabled selected>Välj</option>
        <option value=0>Manlig</option>
        <option value=1>Kvinnlig</option>
        <option value=2>Båda</option>
        <option value=3>Annat</option>
        <option value=4>Alla</option>
    </select>
    <input type="hidden" name="stage" value="signup">
    <input type="submit" value="Registrera">
</form>

<?php
    if (isset($_REQUEST["email"]) && isset($_REQUEST["user"]) && isset($_REQUEST["name"]) && isset($_REQUEST["zip"]) && isset($_REQUEST["salary"]) && isset($_REQUEST["preference"]) && isset($_REQUEST["password"]))
    {
        $conn = create_conn();

        $user = test_input($_REQUEST["user"]);
        $email = test_input($_REQUEST["email"]);
        $name = test_input($_REQUEST["name"]);
        $zip = test_input($_REQUEST["zip"]);
        $bio = test_input($_REQUEST["bio"]);
        $salary = test_input($_REQUEST["salary"]);
        $preference = $_REQUEST["preference"];
        $password = test_input($_REQUEST["password"]);
        $password = hash("sha256", $password);

        //include "fetch.php";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Inte giltig e-post";
            print($emailErr);
        }
        else 
        {
            print("Välkommen " . $user . "<br>");

            $statement = $conn->prepare("INSERT INTO users (user, name, password, email, zip, bio, salary, preference) 
                                                    VALUES (?,?,?,?,?,?,?,?)");
            $statement->bind_param("ssssssii", $user, $name, $password, $email, $zip, $bio, $salary, $preference);

            if($statement->execute())
            {
                print("Registrering lyckades!");
                $_SESSION["user"] = $_REQUEST["user"];
                header("refresh:1;url=./users.php");
            }
        }
    }
    else
    {
        print("Var snäll och fyll i allting!");
    }
?>