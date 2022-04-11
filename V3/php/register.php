<?php

$page_title = "Register";
include ( 'includes/login.html' ) ;

#check form submitted
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    #Connect to the database

    require('connect_db.php');

    # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>' ;
  }
  
  # Check for a card number.
  if (empty( $_POST[ 'card_number' ] ) )
  { $errors[] = 'Enter your card_number.' ; }
  else
  { $cn = mysqli_real_escape_string( $link, trim( $_POST[ 'card_number' ] ) ) ; }
  
  # Check for expiry month.
  if (empty( $_POST[ 'exp_month' ] ) )
  { $errors[] = 'Enter card expiry month.' ; }
  else
  { $exp_m = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_month' ] ) ) ; }
  
  
  # Check for a expiry year.
  if (empty( $_POST[ 'exp_year' ] ) )
  { $errors[] = 'Enter your expiry year.' ; }
  else
  { $exp_y = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_year' ] ) ) ; }

# Check for a security.
  if (empty( $_POST[ 'cvv' ] ) )
  { $errors[] = 'Enter your security on back of card.' ; }
  else
  { $cvv = mysqli_real_escape_string( $link, trim( $_POST[ 'cvv' ] ) ) ; }


  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, card_number, exp_month, exp_year, cvv, reg_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), $cn, $exp_m, $exp_y, $cvv, NOW() )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<
		<h1 class="alert-heading"Registered!</h1>
		<p>You are now registered.</p>
		<div class="modal-footer">
    <a class="alert-link" href="login.php">Login</a>
    
    
    '; }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
  }
  # Or report errors.
  
  
  else 
  {
    echo '
			<h1>The following error(s) occurred:</h1>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<p>or please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="css/cinemastyle.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  </head>
  <body>

  <link rel="stylesheet" href="css/cinemastyle.css">
    
  <nav class="navbar navbar-default">
	</nav>
<div class="container">
  <div class="row">
    <div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Create Account</div>
			<div class="card-body">
			<form action="register.php" class="was-validated" method="post">
				<div class="input-group">
					<div class="input-group-prepend">
					<span class="input-group-text">First and last name</span>
					</div>
					<input type="text" name="first_name" class="form-control" value="" required> 
					<input type="text" name="last_name" class="form-control" value="" required>
				 </div>
				 <br>
				 <div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Email" value="" required>
				 	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

				 </div>
				 <div class="form-group">
					<input type="password" name="pass1" class="form-control" placeholder="Create New Password" value="" required>
				 </div>
				 <div class="form-group">
					<input type="password" name="pass2" class="form-control" placeholder="Confirm Password" value="" required>
				 </div>
		  </div>
		</div>
	</div>


<div class="col-sm">
		<div class="card bg-light mb-3">
		  <div class="card-header">Add Payment Card</div>
			<div class="card-body">
				<div class="form-group">
				  <input type="text" name="card_number" class="form-control" placeholder="Card Number" value="" required>
				</div>
				<div class="input-group">
					<div class="input-group-prepend">
					<span class="input-group-text">Card Expiry Date</span>
					</div>
						<input type="text" name="exp_month" class="form-control" placeholder="MM" value="" required>
						<input type="text" name="exp_year" class="form-control" placeholder="YY" value="" required>
				</div>
				<br>
				<div class="form-group">
				  <input type="text" name="cvv"  class="form-control" placeholder="3 digit securuty code" value="" required>
				</div>

				<input type="submit" class="btn btn-secondary btn-lg btn-block" value="Submit"></p>
		</form>
			</div>
		</div>
	</div>
</div>
  </body>
</html>

<?php
include ( 'footer.html' ) ;
?>
