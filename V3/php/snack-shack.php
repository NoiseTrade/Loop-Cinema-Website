<?php

# DISPLAY COMPLETE REGISTRATION PAGE.
$page_title = 'User Area ' ;
include('includes/logout.html');
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Open database connection.
require ( 'connect_db.php' ) ;

# Close database connection.
mysqli_close( $link ) ;

include ( 'includes/footer.html' ) ;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/cinemastyle.css">
</head>

<link rel="stylesheet" href="css/cinemastyle.css">

<div class="container">
			<h1 class="text-center">Loop Cinema Snacks</h1>
            <h5 class="text-center">"Always coming back for more"</h5>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
					<h5 class="card-header">Savoury</h5>
				<div class="card-body">
				
					<div class="table-responsive">
					<!--Table-->
					<table class="table table-striped">

					<!--Table head-->
				<thead>
				<tr>
					<th><h5 class="card-title">Food</h5></th>
					<th><h5 class="card-title">Price</h5></th>
				</tr>
				</thead>
	    <tbody>
			<tr>
			  <td>Regular Popcorn </td>
			  <td> £ 4.90 </td>
			</tr>
		  
	</tbody><tbody>
			<tr>
			  <td>Large Popcorn </td>
			  <td> £ 5.30 </td>
			</tr>
		  
	</tbody><tbody>
			<tr>
			  <td>Popcorn Topping (Toffee, Butter, Sweet &amp; Salty, Chocolate) </td>
			  <td> £ 0.50 </td>
			</tr>
		  
	</tbody><tbody>
			<tr>
			  <td>Hot Dog </td>
			  <td> £ 4.50 </td>
			</tr>
		  
	</tbody><tbody>
			<tr>
			  <td>Nachos </td>
			  <td> £ 4.00 </td>
			</tr>
		  
	</tbody><tbody>
			<tr>
			  <td>Nacho Topping (Cheese, Salsa, Jalapenos, Guacamole, Sour Cream) </td>
			  <td> £ 0.50 </td>
			</tr>
		  
		
	     
		</tbody>
	</table>
  <!--Table-->
</div>
</div>
</div>
</div>


	 
<!--  =============================
	=====    Sweets =======
	=================================== --> 
	 
				<div class="col-md-6">
					<div class="card">
					<h5 class="card-header">Sweets</h5>
				<div class="card-body">
				
					<div class="table-responsive">
					<!--Table-->
					<table class="table table-striped">

					<!--Table head-->
				<thead>
				<tr>
					<th><h5 class="card-title">Food</h5></th>
					<th><h5 class="card-title">Price</h5></th>
				</tr>
				</thead>
	  

		<tbody>
			<tr>
			<td>Special Loop Cinema Cone 1 x scoop </td>
			
			<td> £ 1.20 </td>
	
		</tr></tbody><tbody>
			<tr>
			<td>Special Loop Cinema Cone 2 x scoop </td>
			
			<td> £ 1.80 </td>
	
		</tr></tbody><tbody>
			<tr>
			<td>Loop Cinema Ice Cream Tub 1 x scoop </td>
			
			<td> £ 0.80 </td>
	
		</tr></tbody><tbody>
			<tr>
			<td>Loop Cinema Ice Cream Tub 2 x scoop </td>
			
			<td> £ 1.50 </td>
	
		</tr></tbody><tbody>
			<tr>
			<td>Hot Doughnut with Nutella &amp; Nuts </td>
			
			<td> £ 2.50 </td>
	
		</tr></tbody><tbody>
			<tr>
			<td>Hot Waffle with Nutella &amp; Nuts </td>
			
			<td> £ 2.50 </td>
	
		</tr></tbody><tbody>
			<tr>
			<td>Hot Doughnut with Caramel &amp; Banana </td>
			
			<td> £ 2.50 </td>
	
		</tr></tbody><tbody>
			<tr>
			<td>Hot Waffle with Caramel &amp; Banana </td>
			
			<td> £ 2.50 </td>
	
		</tr></tbody><tbody>
			<tr>
			<td>Hot Doughnut with Strawberries &amp; Cream </td>
			
			<td> £ 2.50 </td>
		
	     
		</tr></tbody>
	</table>
  <!--Table-->
</div>
</div>
</div>
</div>
  
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
