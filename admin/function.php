<?php 
include 'config2.php';

function site_title( $nd = ' - ' ) {

	global $db;	
	
	if( isset( $_GET['page'] ) ) {
		$link = $_GET['page'];
	} else {
		$link = 'home-page';	
	}	

	$result = mysql_query("SELECT title FROM pages WHERE link='$link'");
	if( !$result ) {
		$title = 'Not Found';
	} else {
		$page = mysql_fetch_array( $result );
		$title = $page['title'];	
	}

	echo SITENAME . $nd . $title;	
	
}
/*
*ky funksion liston faqet e menuse
*/
function listo_faqet( $echo = true ) {
	
	//Global ben te aksesuseshme array-n $faqet brenda funksionit 
	global $db;

	$result = mysql_query("SELECT title, link, menu_order FROM pages WHERE type='page' ORDER BY menu_order ASC");
	if( !$result ) {
		die( mysql_error() );
	}
	$linket = '';
	while( $links = mysql_fetch_array( $result ) ) {
		
		$linket .= '<li><a href="'. BASEURL .'/?page='.$links['link'].'">'.$links['title'].'</a></li>';
	
	}	
	if( $echo == true ){
		echo $linket;
	 } else {
	 	return $linket;
	 }		
}

function location( $nd = ' / ' ){
 	
 	global $faqet;
 	
 	$ndarje = ' ' .$nd .' ';
 	
 	$page =  isset( $_GET['page'] ) ? $_GET['page'] : 'home';
 	
 	switch($page) {
 		
 		case 'home' :
 			$vendi = 'Home';
 		break;
 		
 		case 'contact-us' :
 			$vendi = 'Contact Us';
 		break;
 		
 		case 'about-us':
 			$vendi = 'About Us';
 		break;
 
 		case 'blog':
 			$vendi = 'Blog';
 		break;
 		
 		case 'login':	
			$vendi = 'Login';
		break;
 		
 		case 'admin': 	
 			$vendi = 'Administration Panel';
 		break;
 		
 		case 'service':
 			$vendi = 'Service';
 		break;
 		
 		default:
 			$vendi = 'Not Found';
 		break;
 		
 		}
 		
 		if( $page == 'home' ){
 			
 			echo 'Home';
 			
 		} else {
 		
 			echo '<a href= "http://localhost/ervin1/">Home</a>' . $ndarje . $vendi ;
		} 
 	}
 	
function is_logged_in(){
		
	global $db;
		
if(isset($_SESSION['hyr']) ) {
		return true;
	}	elseif(isset( $_COOKIE['hyr'] )){

		list($username, $password)	= explode ('|',$_COOKIE['hyr']);
		
		$result = mysql_query("SELECT id, user, password FROM users WHERE user='$username' AND password='$password'");
			
			if( !$result ) {
				$error = 'error: '. mysql_error();		
				$_SESSION['test'] = $error;					
			}			
				$rows = mysql_num_rows( $result );
					
				if( $rows != 0 ) {
				$login = mysql_fetch_array( $result );
				$_SESSION['hyr'] = true;
				$_SESSION['user_id'] = $login['id'];
							
				return true;
						
			} else {
				return false;					
}
}
}
