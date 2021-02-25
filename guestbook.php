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
            <h1>Leave a comment</h1>
            <form action="guestbook.php" method="get">
                Name: <input type="text" name="userName"><br>
                Comment: <input type="text" name="comment"><br>
                <input type="submit">
            </form>
        </article>
        <article>
            <?php 
                $name = $_GET["userName"];
                $comment = $_GET["comment"];
                $date = date("H:i:s d:m:Y");

                if($comment && $name)
                {
                    $write = fopen("usercomments.txt", "a+");
                    fwrite($write, "\n$comment -  $name -     $date");
                    fclose($write);

                    $read = fopen("usercomments.txt", "r+t");
                    print("All comments:<br>");

                    while(!feof($read))
                    {
                        $c = fgets($read, 1024);
                        print($c . "<br>");
                    }
                    fclose($read);
                }
/*                else
                {
                    if(file_exists("usercomments.txt"))
                    {
                        $read = fopen("usercomments.txt", "r+t");
                        print("All comments:<br>");

                        while(!feof($read))
                        {
                            $c = fgets($read, 1024);
                            print($c . "<br>");
                        }
                        fclose($read);
                    }
                    else
                    {
                        print("No comments");
                    }
                } */
                print("<a href='../BackEnd/usercomments.txt'>Kommentarerna (hemlisar)</a>");
            ?>
        </article>
    </section>
</body>
</html>
