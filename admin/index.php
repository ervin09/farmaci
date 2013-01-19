
<?php include '../header.php'; 
?>

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
	

	<?php }?>
	
	<div class="logout">
	<h2><a href="http://localhost/ervin1/admin/?dil=true">Emergency Exit</a></h2>
	</div>
	
	<div class="tabela">

<script language="javascript" type="text/javascript" src="js/script.js" ></script>
<form method="post" action="">    

<INPUT type="button"  value="Shto produkt ri" onclick="addRow('dataTable')" />
 
    <INPUT type="button" value="Fshi produkt" onclick="deleteRow('dataTable')" />
 		
 		<input type="submit" name="add" value="store" />
 		
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "farmacia";
$db_table = "magazina";

$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

$selected = mysql_select_db("farmacia",$dbhandle) 
  or die("Could not select farmacia");
  

$result = mysql_query("SELECT * FROM magazina");

$sasia=$_POST['sasia'];
$njesia=$_POST['njesia'];
$emertimi =$_POST['emertimi'];
$cmimi=$_POST['cmimi'];

if (!isset($_REQUEST['store'])) {
   
$sql=mysql_query("INSERT INTO magazina VALUES('$njesia', '$emertimi', '$sasia', '$cmimi')");

}else {
	die("Could not insert");
	}

	mysql_close($dbhandle);
?> 		
 	
     <form method="post" action="">    
        
    <TABLE id="dataTable" border="1">    			   
     <TR>  	 
       	  
       	   <TD><INPUT type="checkbox" name="chk"/></TD>
            <TD >1</TD>
            <TD> <INPUT type="text" / placeholder="Njesia" name="njesia" > </TD>
            <TD> <INPUT type="text" / placeholder="Emertimi" name="emertimi" > </TD>
            <TD> <INPUT type="text" / placeholder="Sasia" name="sasia" > </TD>
            <TD> <INPUT type="text" / placeholder="Cmimi" name="cmimi" > </TD>
           
        </TR> 
    </TABLE>
</form>
	</div>
	
	
</div>
</div>

<?php include '../right.php'; ?>
</div>
<?php include '../footer.php'; ?>