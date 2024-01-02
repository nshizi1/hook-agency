<?php

    include("conn.php");

    $title = $_POST["title"];
    $description = $_POST["description"];
    if($_FILES["image"]["error"] === 4){
        echo "
        <script>
            alert('Image Does Not Exist');
            window.location.href='../../../index.html';
        </script>";
    }else{
        $fileName=$_FILES["image"]["name"];
        $fileSize=$_FILES["image"]["size"];
        $tmpName=$_FILES["image"]["tmp_name"];

        $validImageExtension=['jpg', 'jpeg', 'png'];
        $imageExtension=explode('.', $fileName);
        $imageExtension=strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo 
            "<script>
                alert('Invalid Image Extension');
                window.location.href='../../../index.html';
            </script>";
        }else if($fileSize > 1000000){
            echo 
            "<script>
                alert('Image Size Is Too Large');
                window.location.href='../../../index.html';
            </script>";
        }else{
            $newImageName = uniqid();
            $newImageName .= '.' .$imageExtension;

            move_uploaded_file($tmpName, 'images/' . $newImageName);
            $query= "INSERT INTO services(serviceId, title, image, description) VALUES('', '$title', '$newImageName','$description')";
            mysqli_query($conn, $query);
            echo
            "<script>
                alert('Service Successfully Added');
                window.location.href='../../../index.html';
            </script>";
        }
    }

?>