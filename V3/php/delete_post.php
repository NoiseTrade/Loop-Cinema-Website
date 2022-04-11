<?php
    # Access session.
    session_start() ;

    
    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

    require ( 'connect_db.php');

    if ( isset( $_GET['post_id'] ) ) $post_id = $_GET['post_id'] ;

    $sql = "DELETE FROM mov_rev WHERE post_id='$post_id'";

    if ($link->query($sql) === TRUE) {
        header("Location: my_reviews.php");
    }

    else {
        echo "Error deleting record: " . $link->error;
    }

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
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<link rel="stylesheet" href="css/cinemastyle.css">
</body>