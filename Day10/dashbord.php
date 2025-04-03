<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php
    include_once("config.php");
    $sql = "select * from user";
    $getuser = $conn->prepare($sql);

    $getuser->execute();

    $user=$getuser->fetchAll();
    
    
    ?>
<table>
<thead>
<th>ID</th>
<th>NAME</th>
<th>SURNAME</th>
<th>EMAIL</thead>
</thead>

<tbody>
<?php

foreach($user as $user){
?>

<tr>
    <td><?=$user["id"]?></td>
    <td><?=$user["name"]?></td>
    <td><?=$user["surname"]?></td>
    <td><?=$user["email"]?></td>
</tr>
<?php } ?>
</tbody>
</table>

<a href="index.php">preke qitu</a>

</body>
</html>