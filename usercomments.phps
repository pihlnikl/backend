<?php
    $name = $_GET["userName"];
    $comment = $_GET["comment"];
    $date = date("H:i:s d:m:Y");
    $commentFile = "usercomments.txt";

    if (isset($_GET["userName"]) && isset($_GET["comment"]))
    {
        $newComment = "$comment -   $name -     $date\n";
        $newComment .= file_get_contents($commentFile);
        file_put_contents($commentFile, $newComment);
    }
    else
    {
        print("<p>Var snäll och fyll i allting!</p>");
    }

    $comments = file_get_contents($commentFile);
    print("<p>Comments: " . $comments."</p>");
?>