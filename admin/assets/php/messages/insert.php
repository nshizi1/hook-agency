<?php

    include("conn.php");

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $query=mysqli_query($conn, "INSERT into messages(messageId, name, email, subject, message) values('','$name','$email','$subject','$message')");

    if(!$query){
        echo "
            <script>
                alert('Error! Message Was Not Sent');
                window.location='../../../../index.html';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('Message Sent Successfully');
                window.location='../../../../index.html';
            </script>        
        ";
    }

?>