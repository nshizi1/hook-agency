<?php

include("conn.php");
$id = $_GET['dlt'];

$query=mysqli_query($conn, "DELETE from messages where messageId=$id");
if(!$query){
    echo "
        <script>
            alert('Message Not Deleted');
            window.location='../../html/message/index.php';
        </script>
        ";
}else{
    echo "
        <script>
            alert('Message Deleted Successfully');
            window.location='../../html/message/index.php';
        </script>
        ";
}

?>