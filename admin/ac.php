<?php

include 'config2.php';


$db_name="farmacia"; 
$tbl_name="magazina";

mysql_select_db("$db_name")or die("cannot select DB");


$sasia=$_POST['sasia'];
$njesia=$_POST['njesia'];
$barcode=$_POST['barcode'];
$emertimi =$_POST['emertimi'];
$cmimi=$_POST['cmimi'];


$sql="INSERT INTO $tbl_name(barcode, njesia, emertimi,sasia,cmimi)VALUES('$barcode', '$njesia', '$emertimi', '$sasia', '$cmimi')";
$result=mysql_query($sql);


if($result){
echo "Successful";
echo "<BR>";
}

else {
echo "ERROR";
}
?> 

<?php 

mysql_close();
?>