<?php # PROCESS REVIEW POST.
    # Access session.
    session_start() ; 

    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
    # Check form submitted.
    if ($_SERVER['REQUEST_METHOD'] = 'POST'){

        # Open database connection.
        require ( 'connect_db.php');
        
        # Execute inserting into 'review' database table.
        $q = "INSERT INTO mov_rev(id,first_name,last_name,movie_title,rate, message, post_date) 
        VALUES('{$_SESSION[user_id]}',
                '{$_SESSION[first_name]}',
                '{$_SESSION[last_name]}',
                '{$_POST[movie_title]}',
                '{$_POST[rate]}',
                '{$_POST[message]}',NOW() )";
        $r = mysqli_query ( $link, $q ) ;

        # Report error on failure.
        if (mysqli_affected_rows($link) != 1){

            echo '<p>Error</p>'.mysqli_error($link); } else { include('review.php'); }
            header("Location: review.php");
        } 
    

    mysqli_close( $link);

    include ( 'includes/footer.html' );
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