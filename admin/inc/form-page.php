
<br>
<hr>

<?php if( $_GET['action'] == 'update' && $_GET['link'] != '' ) { 
	$link = $_GET['link'];
	
	$result = mysql_query("SELECT title, content, menu_order FROM pages WHERE link='$link'");
<br>
<hr>
?>
<?php if( $_GET['action'] == 'update' && $_GET['page'] != '' ) { 

	$page = $_GET['page'];
	$result = mysql_query("SELECT title, content, menu_order FROM pages WHERE link='$page'");
	if( !$result ) {
		die( 'Error: ' . mysql_error() );
	}	
	$update = mysql_fetch_array( $result );
}
?>

<form method="post" action="">

	<label>Title</label>
	<input type="text" name="title" value="<?php if( isset( $update['title'] ) ) echo $update['title']; ?>">

	
	<label>Content</label>
	
	<textarea name="content"><?php if( isset( $update['content'] ) ) echo $update['content']; ?></textarea>

	<?php	if($_GET['type'] != 'news') { ?>
	<label>Order</label>
	<input type="text" name="menu_order" value="<?php if( isset( $update['menu_order'] ) ) echo $update['menu_order']; ?>">
<?php }?>	

	<br>
	<input type="submit" name="<?php echo (isset( $update ) ? 'update'  : 'add'); ?>" 
				value="<?php echo (isset( $update ) ? 'Update'  : 'Add'); ?>">
	<label>Content</label>
	<textarea name="content"><?php if( isset( $update['content'] ) ) echo $update['content']; ?></textarea>

	<?php if( $_GET['type'] == 'page') { ?> 
		<label>Order</label>
		<input type="text" name="menu_order" value="<?php if( isset( $update['menu_order'] ) ) echo $update['menu_order']; ?>">
	<?php } ?>
	
	<br>
	<input type="submit" 
	name="<?php echo isset( $page ) ? 'perditeso'  : 'shto'; ?>" 
	value="<?php echo isset( $page ) ? 'Perditeso'  : 'Shto Faqen'; ?>">


</form>

<?php 

if( isset( $_POST['add'] ) ) {

	$title = $_POST['title'];
	$content = $_POST['content'];
	$order = isset($_POST['menu_order']) ? $_POST['menu_order'] : 0 ;	
	$link = strtolower( str_replace( ' ', '-', $title ) );
	$date = date('Y-m-d h:m:s'); 
	$type =$_GET['type'];

	$redirect=($_GET['type'] == 'page' ? 'pages' : $_GET['type'] );
	
	
	$result = mysql_query("INSERT INTO pages VALUES('', '$title', '$link', '$content','$order', '$type', '$date')");
	
	if( !$result ) {
		die( 'Error:' . mysql_error() );	
	}
	header('Location: http://localhost/ervin/admin/?page='. $redirect );
	
}
elseif( isset( $_POST['update'] ) ) {
		
	$title = $_POST['title'];
	$content = $_POST['content'];
	
	$order = isset($_POST['menu_order']) ? $_POST['menu_order'] : 0;	
	
	$redirect = ($_GET['type'] == 'page' ? 'pages' : $_GET['type'] );
		
	$result = mysql_query("UPDATE pages SET title='$title', content='$content', menu_order=$order WHERE link='$link'");
	
	if( !$result ) {
		die( 'Error: ' . mysql_error() );	
	}
	header('Location: http://localhost/ervin/admin/?page='. $redirect);