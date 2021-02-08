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
            <h1>Ladda upp filer</h1>
            <form action="fileupload.php" method="post" enctype="multipart/form-data">
                Filerna: <input type="file" name="target_file" id="target_file"><br>
                <input type="submit" name="submit">
            </form>
        </article>
        <article>
        <?php
            $uploadFolder = "uploads/";
            $target_file = $uploadFolder . basename($_FILES["target_file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) 
            {
                $check = getimagesize($_FILES["target_file"]["tmp_name"]);
                if($check !== false) 
                {
                    echo "File is an image - " . $check["mime"] . ".<br>";
                    $uploadOk = 1;
                } 
                else 
                {
                    echo "File is not an image.<br>";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) 
            {
                echo "Sorry, file already exists.<br>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["target_file"]["size"] > 500000) 
            {
                echo "Sorry, your file is too large.<br>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) 
            {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) 
            {
                echo "Sorry, your file was not uploaded.<br>";
                // if everything is ok, try to upload file
            } 
            else 
            {
                if (move_uploaded_file($_FILES["target_file"]["tmp_name"], $target_file)) 
                {
                    echo "The file ". htmlspecialchars( basename( $_FILES["target_file"]["name"])). " has been uploaded.";
                } 
                else 
                {
                    echo "Sorry, there was an error uploading your file.<br>";
                }
            }
            $scan = scandir("uploads/");
            foreach($scan as $file)
            {
                if(!is_dir("uploads/$file"))
                {
                    print("<br><a href='../BackEnd/uploads/$file'>$file</a><br>");
                }
            }
        ?>
        </article>
    </section>
</body>
</html>