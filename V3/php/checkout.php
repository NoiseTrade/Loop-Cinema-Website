<?php

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 

# Set page title and display header section.
$page_title = 'Book Movie' ;
include ('includes/logout.html');

# Check for passed total and cart.
if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
{

# Open database connection.
require ('connect_db.php');

# Ticket reservation and total in 'booking' database table.
$q = "INSERT INTO booking ( user_id, total, booking_date ) 
VALUES (
". $_SESSION['user_id'].",".$_GET['total'].", NOW() 
) ";
$r = mysqli_query ($link, $q);

# Retrieve current booking id.
$booking_id = mysqli_insert_id($link) ;

# Retrieve cart items from 'movie' database table.
$q = "SELECT * FROM movie WHERE id IN (";
foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
$q = substr( $q, 0, -1 ) . ') ORDER BY id ASC';
$r = mysqli_query ($link, $q);

# Store order contents in 'booking_contents' database table.
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
{
  $query = "INSERT INTO booking_contents
  ( booking_id, id, quantity, mov_price )
  VALUES ( $booking_id, ".$row['id'].",".$_SESSION['cart'][$row['id']]['quantity'].",".$_SESSION['cart'][$row['id']]['price'].")" ;
  $result = mysqli_query($link,$query);
}

echo '
<h5>Thank You for booking with Loop Cinema.  Please enjoy your movie!</h5>
';
# Remove booking items.  
  $_SESSION['cart'] = NULL ;
}

# Or display a message.
else { echo '<p></p>' ; }
# Retrieve items from 'booking' database table.
$q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}
ORDER BY booking_date DESC
LIMIT 1" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
    echo '<div class="container">
    <div class="card bg-light mb-3">
             <div class="row no-gutters">
                 <div class="col-md-4">
            <img width="256" class="img-fluid" alt="QR Code " src="img/qrcode.png">
                 </div>
                 <div class="col-md-8">
                 <div class="card-body">
        ';
        while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
        {
          echo '
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row">
                         <label for="booking ref" class="col-sm-12 col-form-label">
               Booking Reference:  #EC1000' . $row['booking_id'] . '</label> 
              </div>
                   </li>
           <li class="list-group-item">
                <div class="form-group row">
                 <label for="booking ref" class="col-sm-12 col-form-label">
              Total Paid:   &pound ' . $row['total'] . ' 
                 </label>
                </div>
              </li>
                </ul>
          <hr>
      <div class="card-footer">
         <small>'  . $row['booking_date'] . '</small>
      </div>
      </div>
      </div>			
      ';
        }
# Close database connection.
  mysqli_close( $link ) ; 
}

include('includes/footer.html');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/cinemastyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
<link rel="stylesheet" href="css/cinemastyle.css">
</body>