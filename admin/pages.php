<div id ="content">
<?php if(!isset($_GET['action'])){ ?>
<a href ="http://localhost/ervin1/admin/?page=pages&action=add&type=page">Add Page</a>

<h2>Pages on Database</h2>

<?php 
	$result=mysql_query("SELECT ID,title,link FROM pages");
	if ( !$result) {
	die ('Invalid query:' .mysql_error());}
	
	while( $page=mysql_fetch_array( $result )): ?>
	
		<div class="db-page">
		<?php echo $page['title'] ?>
		<span>
<a href="http://localhost/ervin1/?page=<?php echo $page['link']?>"> View|</a> 
<a href="http://localhost/ervin1/admin/?page=pages&action=update&link=<?php echo $page['link']?>&type=page">|Edit|</a> 
<a href="http://localhost/ervin1/admin/?page=pages&action=delete&link=<?php echo $page['link']?>">|Delete|</a>
		</span>
		</div>


		<?php endwhile;
		
		}elseif ($_GET['action'] =='add'|| $_GET['action'] == 'update'){
			include 'inc/form-page.php';
			} 


		elseif($_GET['action']== 'delete' ){
	
			$link=$_GET['link'];
			$result=mysql_query("DELETE FROM pages WHERE link='$link'");
			header ('Location: http://localhost/ervin1/admin/?page=pages');

}

		
?>
</div>
