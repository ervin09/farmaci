<div id="permbajtja">

<?php if( !isset( $_GET['action'])) { ?>
<a href="http://localhost/ervin/admin/?page=news&action=add&type=rule">Shto Rregullore</a> 

<h2> Rules on Database </h2>

<?php 
	$result = mysql_query (" SELECT ID,title,link FROM pages WHERE type='rule'");
	if( !$result ) {
		die ('Invalid query: ' .mysql_error());
	}
	while( $page =mysql_fetch_array ($result) ) : ?>
	
	
	
		<div class="db-page">
		
		<?php echo $page['title'] ; ?>
		<span>
		</span>
			<a href ="http://localhost/ervin/?news=<?php echo $page['link']; ?>">View </a> |
			<a href ="http://localhost/ervin/admin/?page=news&action=update&link=<?php echo $page['link']; ?>&type=rule">Edit </a>|
			<a href ="http://localhost/ervin/admin/?page=news&action=delete&link=<?php echo $page['link']; ?>">Delete  </a>		
		
		</div>

		
	<?php endwhile;
	
	 }elseif ( $_GET['action'] == 'add' || $_GET['action'] == 'update')  {
		
		include 'inc/form-page.php';
	
	}elseif( $_GET['action'] == 'delete') {	
	
		$link = $_GET['link'];
		
		
		$result = mysql_query ("DELETE FROM pages WHERE link='$link' AND type='rule'");
		
		header ('Location:http://localhost/ervin/admin/?page=rule');
			
		
		
		} ?>

</div>