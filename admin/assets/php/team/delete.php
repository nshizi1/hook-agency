<?php

    include("conn.php");

    $id=$_GET["dlt"];
    $query=mysqli_query($conn, "DELETE from members where memberId=$id");
    if(!$query){
        echo "<script>alert('Team Member was not deleted');
                    window.location.href='../../../index.html';
            </script>";
    }else{
        echo "<script>alert('Team Member was deleted successfully');
                    window.location.href='../../html/team/view.php';
            </script>";
    }

?>