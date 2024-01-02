<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/add.css">
    <title>HOOK AGENCY ADMIN | Add Project</title>
</head>
<body>
    <header>
        <div class="title">
            <h2>HOOK AGENCY ADMIN</h2>
        </div>
        <div class="nav">
            <ul class="mainLink">
                <li><a href="../../../index.html">Services</a></li>
                <li><a class="active" href="../project/add.html">Projects</a></li>
                <li><a href="../team/add.html">Team</a></li>
                <li><a href="add.html">Messages</a></li>
            </ul>
        </div>
    </header>
    <div class="contentForm">
        <?php

            include("conn.php");

            $id=$_GET["edt"];
            $query=mysqli_query($conn, "SELECT * from projects where projectId=$id");
            while($row=mysqli_fetch_array($query)){

        ?>
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <h3>EDIT PROJECT ITEM</h3>
            <label for="image">Image One: </label>
            <input type="file" required name="imageOne" id="">
            <label for="image">Image Two: </label>
            <input type="file" required name="imageTwo" id="">
            <label for="description">Description</label>
            <input type="text" value="<?php echo $row["description"]; ?>" required name="description" placeholder="description">
            <button type="submit" name="submit">Add Project</button>
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
        $description=$_POST["description"];
        $imageOne=$_FILES["imageOne"]["name"];
        $imageTwo=$_FILES["imageTwo"]["name"];
        
        $query=mysqli_query($conn, "UPDATE projects SET description='$description', imageOne='$imageOne', imageTwo='$imageTwo' WHERE projectId=$id");
        if($query){
            move_uploaded_file($_FILES['imageOne']['tmp_name'], "images/$imageOne");
            move_uploaded_file($_FILES['imageTwo']['tmp_name'], "images/$imageTwo");
            echo"
            <script>
            alert('Project Item Updated Successfully');
            window.location.href='../../html/project/view.php';
            </script>
            ";
            // header("location:index.php");
        }
        else{
            echo "error";
        }

    }

?>