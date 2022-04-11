<?php

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 

# Set page title and display header section.
$page_title = 'What\’s On' ;
include ('includes/logout.html');

# Open database connection.
require ('connect_db.php');

?>

<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="css/cinemastyle.css">



</head>
<body>

<div class="container">
<h1 class="text-center">Coming Soon</h1>
<div class="row">
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src="img/spidermanposter" alt="Movie" class="img-thumbnail bg-secondary">
				  <h7 class="card-title">Spider-Man - No Way Home</h7>
			   </div>
		  </div>
		</div>  
	
	
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src="img/matrixposter.jpeg" alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">The Matrix - Resurrections</h5>
			   </div>
		  </div>
		</div>  
	
	
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src="img/batmanposter.jpg" alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">The Batman</h5>
			   </div>
		  </div>
		</div>  
	
	
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src="img/kingsmanposter.jpg" alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">The King's Men</h5>
			   </div>
		  </div>
		</div>  