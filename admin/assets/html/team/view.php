<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/view.css">
    <title>Document</title>
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
            <ul class="SubLink">
                <li><a href="add.html">Add</a></li>
                <li><a class="active" href="view.html">View</a></li>
            </ul>
        </div>
    </header>
    <div class="contentTable">
        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Title In Company</th>
                <th colspan="2">Operation</th>
            </tr>
            <?php

                include("conn.php");
                $count=1;
                $query=mysqli_query($conn, "SELECT * from members");
                while ($row = mysqli_fetch_array( $query )){

            ?>
            <tr>
                <td><?php echo $count++ ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["image"] ?></td>
                <td><?php echo $row["title"] ?></td>
                <td><a href="../../php/team/edit.php?edt=<?php echo $row["memberId"] ?>"><button class="Edit">Edit</button></a></td>
                <td><a href="../../php/team/delete.php?dlt=<?php echo $row["memberId"] ?>"><button class="delete">Delete</button></a></td>
            </tr>
            <?php
            
                }
            
            ?>
        </table>
    </div>
</body>
</html>