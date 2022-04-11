<?php

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )

{
    
    # Connect to the database.
    require ('connect_db.php');

    # Initialize an error array.
    $errors = array();

    # Check for an email address:
    if ( empty( $_POST[ 'email' ] ) )
    { $errors[] = 'Enter your email address.'; }
    else
    { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

    # Check for a card number
  if ( empty($_POST[ 'card_number' ] ) )
  {
    
    $errors[] = 'Enter your card number.' ; 

  }

  else
  { $cn = mysqli_real_escape_string( $link, trim( $_POST[ 'card_number' ] ) ) ; }

   # Check for a card month
   if ( empty($_POST[ 'exp_month' ] ) )
   {
     
     $errors[] = 'Enter your expiry month.' ; 
 
   }

   else
   { $em = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_month' ] ) ) ; }

    # Check for a card year
    if ( empty($_POST[ 'exp_year' ] ) )
    {
      
      $errors[] = 'Enter your expiry year.' ; 
  
     
    }

    else
    { $ey = mysqli_real_escape_string( $link, trim( $_POST[ 'exp_year' ] ) ) ; }

     # Check for a cvv
     if ( empty($_POST[ 'cvv' ] ) )
     {$errors[] = 'Enter your CVV number.' ; }
     else
     { $cvv = mysqli_real_escape_string( $link, trim( $_POST[ 'cvv' ] ) ) ; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT * FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    }

# On success update card details on user table .
if ( empty( $errors ) ) 
{
  $q = "UPDATE users SET card_number = $cn,exp_month = $em,exp_year = $ey,cvv = $cvv WHERE email='$e'";
  
  #$q = "UPDATE users SET exp_month = $em WHERE email='$e'";
  #$q = "UPDATE users SET exp_year = $ey WHERE email='$e'";
  #$q = "UPDATE users SET cvv = $cvv WHERE email='$e'";

  $r = @mysqli_query ( $link, $q ) ;
  if ($r)
  {
     header("Location: user.php");
  } else {
      echo "Error updating record: " . $link->error;
  }

  # Close database connection.
    
	mysqli_close($link); 
    exit();

  }

  # Or report errors.
  else 
  {  
    echo ' <div class="container"><div class="alert alert-dark alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
	<h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</div></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
  
} 

?>

