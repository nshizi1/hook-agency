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
                <li><a href="../team/add.html">Team</a></li>
                <li><a class="active" href="../message/index.php">Messages</a></li>
            </ul>
        </div>
    </header>
    <div class="contentTable">
        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>message</th>
                <th>Operation</th>
            </tr>
            <?php

                include("conn.php");
                $query=mysqli_query($conn, "SELECT * from messages");
                $count=1;
                while ($row = mysqli_fetch_array( $query )){

            ?>
            <tr>
                <td><?php echo $count++ ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['subject'] ?></td>
                <td><?php echo $row['message'] ?></td>
                <td><a href="../../php/messages/delete.php?dlt=<?php echo $row['messageId'] ?>"><button class="delete">Delete</button></a></td>
            </tr>
            <?php

                }

            ?>
        </table>
    </div>
</body>
</html>