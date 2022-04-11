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
  <body>
<header>

  

  <!-- The HTML5 video element that will create the background video on the header -->
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="img/movie-footage.mp4" type="video/mp4">
  </video>

  <!-- The header content -->
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        <h1 class="display-3">Loop Cinema</h1>
        <p class="lead mb-0">"Always Returning For More"</p>
      </div>
    </div>
  </div>
</header>

<!-- Page section example for content below the video header -->
<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <p>Loop Cinema is a premium family run cinema in the City of Edinburgh</p>
        <p>We have been proud to deliver fantastic cinematic content to you for over 10 years!</p>
        <p>With our top of the range IMax screens, Dolby surround sound and supreme comfort chairs - We will have you "Always Returning For More" </p>
      </div>
    </div>
  </div>
</section>
</body>