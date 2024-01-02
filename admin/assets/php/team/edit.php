<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/add.css">
    <title>HOOK AGENCY ADMIN | Add Team Member</title>
</head>
<body>
    <header>
        <div class="title">
            <h2>HOOK AGENCY ADMIN</h2>
        </div>
        <div class="nav">
            <ul class="mainLink">
                <li><a href="../../../index.html">Services</a></li>
                <li><a href="../project/add.html">Projects</a></li>
                <li><a class="active" href="add.html">Team</a></li>
                <li><a href="../message/index.html">Messages</a></li>
            </ul>
        </div>
    </header>
    <div class="contentForm">
        <?php

            include("conn.php");
            $id=$_GET["edt"];
            $query=mysqli_query($conn, "SELECT * from members where memberId=$id");
            while($row=mysqli_fetch_array($query)){

        ?>
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <h3>EDIT TEAM MEMBER</h3>
            <input type="text" value="<?php echo $row["name"] ?>" name="name" placeholder="Names">
            <input type="file" required name="image" name="image" id="">
            <input type="text" value="<?php echo $row["title"] ?>" required name="title" placeholder="Title In Company">
            <button type="submit" name="submit">Add Member</button>
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
        $name=$_POST["name"];
        $title=$_POST["title"];
        $image=$_FILES["image"]["name"];
        $image_tmp=$_FILES["image"]["tmp_name"];
        $image_size=$_FILES["image"]["size"];
        $image_type=$_FILES["image"]["type"];
        $image_error=$_FILES["image"]["error"];
        if($image_error==0){
            move_uploaded_file($image_tmp, "images/".$image);
        }
        $query=mysqli_query($conn, "UPDATE members SET title='$title', name='$name', image='$image' WHERE memberId=$id");
        if($query){
            echo"
            <script>
            alert('Team Member Was Updated Successfully');
            window.location.href='../../html/team/view.php';
            </script>
            ";
            // header("location:index.php");
        }
        else{
            echo "error";
        }

    }

?>