<?php

# Access session.
session_start() ; 

# Open database connection.
require ( 'connect_db.php' ) ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;
# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $id => $mov_qty )
  {
    # Ensure values are integers.
    $id = (int) $id;
    $qty = (int) $mov_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }  }
  
# Initialise grand total variable.
$total = 0;

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{

# Retrieve booking in the cart from the 'movie' database table.
  $q = "SELECT * FROM movie WHERE id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY id ASC';
        $r = mysqli_query ($link, $q);

# Display body section with a form and a table.
  echo '<div class="container">
  <div class="row">
      <div class="col-sm">
    <div class="card bg-light mb-3">
        <div class="card-header"> 
              <h5 class="card-title">Booking Summary</h5>
        </div>
        <div class="card-body">
        <form action="show1.php" method="post">
      ';

while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $_SESSION['cart'][$row['id']]['price'];
            $total += $subtotal;

# Display the row/s:
    echo " <ul class=\"list-group list-group-flush\"> 
         <li class=\"list-group-item\">
           <div class=\"form-group row\">
<label for=\"movie_title\" class=\"col-sm-12 col-form-label\">Movie Title:    {$row['movie_title']}</label> 
       </div>
         </li>
                <li class=\"list-group-item\">
          <div class=\"form-group row\">
<label for=\"show time\" class=\"col-sm-12 col-form-label\">Starting @ {$row['show1']}</label>               
           </div>
         </li>
    </ul>
<br>
<div class=\"input-group mb-3\">
<input type=\"text\" class=\"form-control\" name=\" qty[{$row['id']}]\" value=\" {$_SESSION['cart'][$row['id']]['quantity']}\" aria-label=\"qty\" aria-describedby=\"basic-addon2\">
    <div class=\"input-group-append\">
<input type=\"submit\" name=\"submit\" class=\"btn btn-secondary\" value=\"Update\">
    </div>
</div>
</form> ";
  }
# Display the total.
echo '<ul class="list-group list-group-flush">
<li class="list-group-item">
    <div class="form-group row">
    <label for="Total" class="col-sm-12 col-form-label">To Pay:  &pound; '.number_format($total,2).'</label>               
    </div>
</li>
<li class="list-group-item">
<a href="checkout.php?total='.$total.'"><button type="button" class="btn btn-secondary btn-block" role="button">Book Now</button></a>
</li>
</ul>
</form>
</div></div></div></div></div>  ';  }

else
{ 
# Or display a message.
echo '<div class="container">
    <div class="alert alert-secondary" role="alert">
    <h2>No reservations have been made.</h2>
    <a href="home.php" class="alert-link">View What\'s On Now </a>
        </div> ' ;  }

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