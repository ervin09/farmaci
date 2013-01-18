<?php include'header.php'; ?>

<div id="content">
<div class="post">
<h2 class="title"><?php location('&rarr;'); ?></h2>
<?php 
if(isset($_POST['submit'])){

if (isset ($_COOKIE['hyr'])){
	
	$_SESSION['hyr']=true;
		header('Location: http://localhost/ervin1/admin/');
		exit();
		}
	$user = $_POST['username'];
	$pass = $_POST['password'];

$result = mysql_query("SELECT id, user, password FROM users WHERE user='$user' AND password='$pass'");
	 		if( !$result ){
 			}
 				
 				$login = mysql_fetch_array ($result);

if( !is_array($login))
{
	$error="Incorrect Username or Password";

 }else{	
	$_SESSION['hyr']=true;
	$_SESSION['user_id'] =$login['id'];
	if( $_POST['remember']=='on'){
		setcookie('hyr', $_POST['username'] .'|'. $_POST['password'], time() +  (60 * 60));
	}	
	header('Location: http://localhost/ervin1/admin/');

}
}
?>
<div id="page">

<form method="post" action="">

	<?php if (isset ($error))
	{echo '<div class="error">' .$error .'</div>';
	
		}
	if (isset ($_SESSION['$msg'])){
		echo $_SESSION['$msg'];
}	?>
	<div id="admini">
	<label>Username</label>
	<input name="username" value="" type="text" id="fusha"><br>
	<label>Password</label>
	<input name="password" value="" type="password" id="fusha"><br>
	<label for= "remember"><input id='remember' type="checkbox" name="remember" />Remember me</label>
	<br>
	<input type="submit" value="Enter" id="butoni" name="submit">
</div>
</form>

</div>


<?php   if( isset( $_POST['submit'] ) ) {

	if( isset( $_COOKIE['hyr'] ) ) {

		$_SESSION['hyr'] = true;
		header('Location:http://localhost/ervin1/admin/');
		exit;

	}

	$user = $_POST['username'];
	$pass = $_POST['password'];
	$result = mysql_query("SELECT id, user, password FROM users  WHERE user='$user' AND password='$pass'");
	
	if( !$result ) {
		die('Error: ' . mysql_error() );	
	}
	
	$login = mysql_fetch_array( $result );
	
	if( !is_array( $login ) ) {
	
		$error = 'Incorrect Username or Password';

	} else {
		$_SESSION['hyr'] = true;
		$_SESSION['user_id'] = $login['id'];
		
		if( $_POST['remember'] == 'on' ) {
			setcookie('hyr', $_POST['username'] .'|'. $_POST['password'], time() + ( 60 * 60 ) );
		}
		header('Location:http://localhost/ervin1/admin/');
	}
	 
} ?> 

</div>


<?php include 'right.php';?>
</div>	
<?php include 'footer.php' ; ?>