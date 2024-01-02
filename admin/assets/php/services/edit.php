<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/add.css">
    <title>HOOK AGENCY ADMIN | Add Service</title>
</head>
<body>
    <header>
        <div class="title">
            <h2>HOOK AGENCY ADMIN</h2>
        </div>
        <div class="nav">
            <ul class="mainLink">
                <li><a class="active" href="index.html">Services</a></li>
                <li><a href="assets/html/project/add.html">Projects</a></li>
                <li><a href="assets/html/team/add.html">Team</a></li>
                <li><a href="assets/html/message/index.html">Messages</a></li>
            </ul>
        </div>
    </header>
    <div class="contentForm">
        <?php

            include("conn.php");

            $id=$_GET["edt"];
            $query=mysqli_query($conn, "SELECT * from services where serviceId=$id");
            while($row=mysqli_fetch_array($query)){

        ?> 
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <h3>EDIT SERVICE ITEM</h3>
            <label for="title">Title : </label>
            <input type="text" value="<?php echo $row["title"] ?>" name="title">
            <label for="image">Image : </label>
            <input type="file" name="image" id="image" required accept=".jpg, .jpeg, .png" value="">
            <input type="text" value="<?php echo $row["description"] ?>" name="description">
            <button type="submit" name="submit">Add Service</button>
        </form>
        <?php 
        
            }
        
        ?>
    </div>
</body>
</html>
<?php

    include("conn.php");
    if(isset($_POST["submit"])){
        $id=$_GET["edt"];
        $title=$_POST["title"];
        $description=$_POST["description"];
        $image=$_FILES["image"]["name"];
        $image_tmp=$_FILES["image"]["tmp_name"];
        $image_size=$_FILES["image"]["size"];
        $image_type=$_FILES["image"]["type"];
        $image_error=$_FILES["image"]["error"];
        if($image_error==0){
            move_uploaded_file($image_tmp, "images/".$image);
        }
        $query=mysqli_query($conn, "UPDATE services SET title='$title', description='$description', image='$image' WHERE serviceId=$id");
        if($query){
            echo"
            <script>
            alert('Service Item Updated Successfully');
            window.location.href='../../html/service/view.php';
            </script>
            ";
            // header("location:index.php");
        }
        else{
            echo "error";
        }

    }

?>