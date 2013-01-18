<div id="permbajtja">


<div class='images'>
<?php 
	
	//Glob
	$image=glob('upload/*');
	
	foreach ($image as $img ): ?>
	
		<div class="img">
		<img src="<?php echo $img?>" width="120px" height="120px">
		<pre><code><?php
		$img ='<img src="'.BASEURL.'/admin/'.$img.'" width="120px" height="120px">';
		echo htmlspecialchars($img);
		?></code></pre>
		</div>
	
	
	<?php endforeach ; ?>
	

	</div>
	
	<?php 
	
	if(isset( $_POST['submit'])) {
		
	
		
		$name = $_FILES['upload']['tmp_name'] ;
		$dest = 'upload/'.$_FILES['upload']['name'] ;
		
		move_uploaded_file($name,$dest);	
		
		}			
		?>

<form method="post" action="" enctype="multipart/form-data">

<label for="image">Upload Image</label>
<input type="file" name="upload" id="image" >
<input type="submit" name="submit" value="Upload">



</form>

</div>