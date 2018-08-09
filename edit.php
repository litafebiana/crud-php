<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$username=$_POST['username'];
	$password=$_POST['password'];
		
	// update user data
	$sql = "UPDATE users SET username='$username',password='$password' WHERE id_user=$id";
	$query = mysqli_query($mysqli, $sql);
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php

// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$sql = "SELECT * FROM users WHERE id_user=$id";
$query = mysqli_query($mysqli,$sql);
 
while($user_data = mysqli_fetch_array($query))
{
	$username = $user_data['username'];
	$password = $user_data['password'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username" value=<?php echo $username;?>></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password" value=<?php echo $password;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>