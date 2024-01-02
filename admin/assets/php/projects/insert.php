<?php

    include("conn.php");

    $description = $_POST["description"];
    $imageOne = $_FILES['imageOne']['name'];
    $imageTwo = $_FILES['imageTwo']['name'];

    $query=mysqli_query($conn, "INSERT into projects(projectId, description, imageOne,imageTwo) values('','$description','$imageOne','$imageTwo')");

    if($query){
        move_uploaded_file($_FILES['imageOne']['tmp_name'], "images/$imageOne");
        move_uploaded_file($_FILES['imageTwo']['tmp_name'], "images/$imageTwo");
        echo
            "<script>
                alert('Project Item Successfully Added');
                window.location.href='../../html/project/add.html';
            </script>";
    }else{
        echo 
            "<script>
                alert('Error trying to add image');
                window.location.href='../../../index.html';
            </script>";
    }
?>
