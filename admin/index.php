
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
	
	<div class="tabela">

<script language="javascript" type="text/javascript" src="js/script.js" ></script>

<INPUT type="button" value="Shto nje produkt te ri" onclick="addRow('dataTable')" />
 
    <INPUT type="button" value="Fshi nje produket" onclick="deleteRow('dataTable')" />
 		
 		<input type="submit">
 		
 	
            
    <TABLE id="dataTable" width="350px" border="1">    			   
     <TR>  	 
       	  
       	   <TD><INPUT type="checkbox" name="chk"/></TD>
            <TD >1</TD>
            <TD> <INPUT type="text" / placeholder="Barcode"> </TD>
            <TD> <INPUT type="text" / placeholder="Njesia"> </TD>
            <TD> <INPUT type="text" / placeholder="Emertimi"> </TD>
            <TD> <INPUT type="text" / placeholder="Sasia"> </TD>
            <TD> <INPUT type="text" / placeholder="Cmimi"> </TD>
           
        </TR> 
    </TABLE>

	</div>
	
	
</div>
</div>

<?php include '../right.php'; ?>
</div>
<?php include '../footer.php'; ?>