<?php 
#display complete logged out page

#access session

session_start();

#redirect if not logged in
if(!isset($_SESSION['user_id'])){require('login_tools.php'); load();}

# Set page title and display header section.
$page_title = 'Home' ;
include ( 'includes/logout.html' ) ;

# Clear existing variables.
$_SESSION = array() ;

# Destroy the session.
session_destroy() ;

# Display body section.
echo '<h1>Goodbye!</h1><p>You are now logged out.</p><p><a href="login.php">Login</a></p>' ;

# Display footer section.
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<link rel="stylesheet" href="css/cinemastyle.css">
</body
