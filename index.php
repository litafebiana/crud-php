<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$sql = 'SELECT * FROM users';
$query = mysqli_query($mysqli,$sql);

?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Add New User</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>Id user</th> <th>Username</th> <th>Password</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($query)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_user']."</td>";
        echo "<td>".$user_data['username']."</td>";
        echo "<td>".$user_data['password']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id_user]'>Edit</a> | <a href='delete.php?id=$user_data[id_user]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>