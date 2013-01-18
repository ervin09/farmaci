
<?php include '../header.php'; ?> 

<div id="content">
<div class="post">
<?php

	if ( isset ($_GET['dil'])){
	unset(	$_SESSION['hyr']); //unset fshin item ne array
	setcookie('hyr','',time()-360); //in this time the cookies are deleted
	$_SESSION['$msg']= "You've been logged out from the page"; 
	header ('Location:http://localhost/ervin1/?page=login'); //redirecting
}?>

<?php	
	if( !isset ($_SESSION['hyr']) && !isset($_COOKIE['hyr']) ){

	header ('Location:http://localhost/ervin1/?page=login');
	exit();
	}

if(!is_logged_in()) {
	header ('Location:http://localhost/ervin1/?page=login');
	exit();
		
}
?>
<div class="page">
<?php if( isset ($_GET['page'])){
	include $_GET['page'] .'.php';
	
	}else{ ?>
	
<?php
	$user_id = $_SESSION['user_id'];


 $result = mysql_query("SELECT name FROM users WHERE id='$user_id'");
 $user = mysql_fetch_array ($result);
 $username=$user['name'];				?>
 				
<h1> Welcome <?php echo $username .'!' ?></h1>

<p>Succesful Login</p>
	
	<a href ="http://localhost/ervin1/admin/?page=pages">Pages</a>
	<a href ="http://localhost/ervin1/admin/?page=profile">Profile</a>
	<a href ="http://localhost/ervin1/admin/?page=news">News</a>

	<?php }?>
	
	<div class="logout">
	<h2><a href="http://localhost/ervin1/admin/?dil=true">Emergency Exit</a></h2>
	</div>
</div>
</div>

<?php include '../right.php'; ?>
</div>
<?php include '../footer.php'; ?>