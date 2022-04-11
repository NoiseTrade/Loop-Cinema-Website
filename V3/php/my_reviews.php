<?php

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 

# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM mov_rev WHERE id={$_SESSION[user_id]}
ORDER BY post_date DESC" ;

include ( 'includes/logout.html' ) ;

# Open database connection.
require ( 'connect_db.php' ) ;

$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
    echo '<div class="container">';
    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
      {
    echo '<div class="alert alert-dark" role="alert">
                <h4 class="alert-heading">' . $row['movie_title'] . '  </h4>
    <p>Rating:  ' . $row['rate'] . ' &#9734</p>
    <p>' . $row['message'] . '</p>
    <hr>
    <footer class="blockquote-footer">
    <span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
    <cite title="Source Title"> '. $row['post_date'].'</cite>
    <br>
    <div class="alert alert-secondary" role="alert">
    <a  class="alert-link" href="delete_post.php?post_id='.$row['post_id'].'"> <i class="fas fa-trash-alt"></i>  Delete Post</a><br>
    </footer>
    </div>
                
    ';  
      }

    }
    else { echo '<div class="container">
    <br>
    <div class="alert alert-secondary" role="alert">
    <p>You have no movie reviews</p>
    </div>
    <div> ' ; }
    
                
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