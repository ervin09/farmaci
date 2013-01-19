<br>
<hr>

<?php if( $_GET['page'] == 'profile' ) { 
	$user_id=$_SESSION['user_id'];
	$result = mysql_query("SELECT id, name,surname FROM users WHERE id=$user_id");
	if( !$result ) {
		die( 'Error: ' . mysql_error() );
	}	
	$update = mysql_fetch_array( $result );
}
?>

<form method="post" action="">

	<label>First Name</label>
	<input type="text" name="name" value="<?php if( isset( $update['name'] ) ) echo $update['name']; ?>">
	
	
	<label>Last Name</label>
	<input type="text" name="surname" value="<?php if( isset( $update['surname'] ) ) echo $update['surname']; ?>">
	
	
	<label>Password</label>
	<input type="password" name="password" value="">
	
	
	<br>
	<input type="submit" name="update_user" value="Update User">

</form>

<?php 
if( isset( $_POST['update_user'] ) ) {
		
	$name = $_POST['name'];
	$surname = $_POST['surname'];

	if($_POST['password'] !='') {
		$password = $_POST['password'];
	
		$result = mysql_query("UPDATE users SET name='$name', surname='$surname', password='$password' WHERE id=$user_id");

	} else {

		$result = mysql_query("UPDATE users SET name='$name', surname='$surname' WHERE id=$user_id");

	}
	
	if( !$result ) {
		die( 'Error: ' . mysql_error() );	
	}
	header('Location: http://localhost/ervin/admin/?page=profile');
	
}
?>
