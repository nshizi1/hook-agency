<?php

    include("conn.php");

    $id=$_GET["dlt"];
    $query=mysqli_query($conn, "DELETE from projects where projectId=$id");
    if(!$query){
        echo "<script>alert('Project Item was not deleted');
                    window.location.href='../../../index.html';
            </script>";
    }else{
        echo "<script>alert('Project Item was deleted successfully');
                    window.location.href='../../html/project/view.php';
            </script>";
    }

?>