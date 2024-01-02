<?php

    include("conn.php");

    $id=$_GET["dlt"];
    $query=mysqli_query($conn, "DELETE from services where serviceId=$id");
    if(!$query){
        echo "<script>alert('Service was not deleted');
                    window.location.href='../../../index.html';
            </script>";
    }else{
        echo "<script>alert('Service was deleted successfully');
                    window.location.href='../../html/service/view.php';
            </script>";
    }

?>