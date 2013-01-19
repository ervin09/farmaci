
<br>
<hr>
<?php if( $_GET['action'] == 'update' && $_GET['page'] !== '') { 
	$link=$_GET['link'];

	$result =mysql_query("SELECT title,content,menu_order,type FROM pages WHERE link ='$link' AND type='news'");
	
	if( !$result) {
		die ('Error :' . mysql_error() );
		}
		$update =mysql_fetch_array($result) ;
		
}
?>

<form method="post" action="<?php //echo $_SERVER['PHP_SELF'];?> ">

	<label>Title</label>
	<input type="text" name="title" value="<?php if (isset ($update['title'] )) echo $update['title'];?> ">
	
	<label>Content</label>
	<textarea name="content"><?php if (isset ($update['content'] )) echo $update['content'];?></textarea>
	
	<label>Order</label>
	<input  type="text" name="menu_order" value="<?php if (isset ($update['menu_order'] )) echo $update['menu_order'];?> ">	
	
	<br>
	<input type="submit" value="<?php echo isset ($update) ? 'Perditeso' : 'Shto Faqen'; ?>" name="<?php echo isset ($update) ? 'perditeso' : 'shto'; ?>" >

</form>
<?php
if ( isset($_POST['shto'] ) ) {
	
	$title = $_POST['title'];
	$content = $_POST['content'];
	$order = $_POST['menu_order'];
	$type = 'news';
	$link = strtolower(str_replace(' ' ,'-',$title) );
	$date = date ('Y-m-d h:m:s');
	
	$result = mysql_query("INSERT INTO pages VALUES('', '$title','$link','$content','$order','$type','$date')");
	
	if (!$result ) {
		die('Gabim :'.mysql_error()) ;
		}
		header ('Location: http://localhost/ervin/admin/?page=news');
	}
	elseif( isset($_POST['perditeso'])) {		
	$title = $_POST['title'];
	$content = $_POST['content'];
	$order = $_POST['menu_order'];
	$type = 'news';
	
	$result = mysql_query("UPDATE pages SET title ='$title', content='$content', menu_order=$order , type ='$type'  WHERE link='$link' AND type='news'");
	
	if (!$result ) {
		die('Gabim :'.mysql_error()) ;
		}
		header ('Location: http://localhost/ervin/admin/?page=news');
		exit();
		
	/*
	echo $title .'<br>';
	echo $content .'<br>';
	echo $link .'<br>';
	echo $date .'<br>'; */
	}
?>
