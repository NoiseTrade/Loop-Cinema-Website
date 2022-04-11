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

# Retrieve movies from 'movie' database table.
$q = "SELECT * FROM movie" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{

# Display body section.
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
{

##echo '<img src='. $row['img'].' alt="Movie">
##<h1> '. $row['movie_title'].' </h1>
##<a href="movie.php?id='.$row['id'].'" >Book Now</a>'

#;


}

# Close database connection.
mysqli_close( $link) ; 
}

# Or display message.
else { echo '<p>There are currently no movies showing.</p>' ; }


# Display footer section.
include ( 'includes/footer.html' ) ;

?>

<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="css/cinemastyle.css">



</head>
<body>

<div class="container">
<h1 class="text-center">Now Showing</h1>
<div class="row">
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src="img/notimetodie.jpg" alt="Movie" class="img-thumbnail bg-secondary">
				  <h7 class="card-title">James Bond - No Time To Die</h7>
				 <a href="movie.php?id=1" class="btn btn-secondary btn-block" role="button"> 
				 Book Now</a>
			   </div>
		  </div>
		</div>  
	
	
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src="img/eternals.jpg" alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">Eternals</h5>
				  <a href="movie.php?id=2" class="btn btn-secondary btn-block" role="button">
				 Book Now</a>
			   </div>
		  </div>
		</div>  
	
	
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src="img/ghostbusters.jpg" alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">Ghostbusters - Afterlife</h5>
				  <a href="movie.php?id=3" class="btn btn-secondary btn-block" role="button">
				 Book Now</a>
			   </div>
		  </div>
		</div>  
	
	
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
				
				  <img src="img/gucci.jpg" alt="Movie" class="img-thumbnail bg-secondary">
				  <h5 class="card-title">House Of Gucci</h5>
				  <a href="movie.php?id=4" class="btn btn-secondary btn-block" role="button">
				 Book Now</a>
			   </div>
		  </div>
		</div>  


		<!--Coming Soon-->
		
		<div class="container">
<h1 class="text-center">Coming Soon </h1>
<div class="row">
	  <div class="col-md-3 d-flex justify-content-center">
		 <div class="card" style="width: 18rem;">
			  <div class="card text-center">
</div>
</div>
</div>
</div>
</div>

			 

<!--Carousel-->
<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
	<img src="img/spiderman" class="img-responsive img-cus" width="1100" height="500">
  </div>
  <div class="carousel-item">
	<img src="img/matrix" alt="Chicago" width="1100" height="500">
  </div>
  <div class="carousel-item">
	<img src="img/batman" alt="New York" width="1100" height="500">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>








	<!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    

  



</body>
<html>