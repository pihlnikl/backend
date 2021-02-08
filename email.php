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
            <h1>Registrering</h1>
            <form action="email.php" method="get">
                E-post: <input type="text" name="email"><br>
                Användarnamn: <input type="text" name="user"><br>
                <input type="submit">
            </form>
        </article>

        <article>
            <?php
                if (isset($_GET["email"]) && isset($_GET["user"]))
                {
                    $user = test_input($_GET["user"]);
                    $email = test_input($_GET["email"]);
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Inte giltig e-post";
                        print($emailErr);
                    }
                    else {
                        print("Välkommen ".$user." med e-posten ".$email."! Lösenord har skickats till givna e-post adressen.");

                        $symbol = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                        $length = mb_strlen($symbol);
                        for ($i = 0; $i < 10; $i++)
                        {
                            $index = rand(0, $length -1);
                            $pass .= mb_substr($symbol, $index, 1);
                        }

                        $subject = "Välkommen!";
                        $message = "Tack för registreringen, här är ditt lösenord: ".$pass;
                        mail($email,$subject,$message);
                    }
                }
                else
                {
                    print("Var snäll och fyll i allting!");
                }
            ?>
        </article>
    </section>
</body>
</html>