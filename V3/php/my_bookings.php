<?php 
    # Access session.
    session_start() ; 

    include ( 'includes/logout.html' ) ;

    require ( 'connect_db.php');

    # Retrieve items from 'bookings' database table.
    $q = "SELECT * FROM booking WHERE user_id={$_SESSION[user_id]}
        ORDER BY booking_date DESC";

    $r = mysqli_query( $link, $q);
    if ( mysqli_num_rows( $r ) > 0 ){

        echo '<div class="container">';
        while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )){

            echo '
                            <div class="card bg-light mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                    <img width="256" class="img-fluid" alt="QR Code " src="img/qrcode.png">
                                    </div>
                                <div class="col-md-8">
                            <div class="card-body">

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="form-group row">
                                        <label for="booking ref" class="col-sm-12 col-form-label">
                                            Booking Reference:  #EC1000' . $row['booking_id'] . '
                                        </label>
                                        <label for="booking ref" class="col-sm-12 col-form-label">
                                            Total Paid:   &pound ' . $row['total'] . '
                                        </label>                                    
                                        <div class="card-footer">
                                            <small>'  . $row['booking_date'] . '</small>
                                        </div>
                                    </div>
                                </li> 
                            </div>
                            </div>
                            </div>

                    </div>
                                
                    ';  

        }

    }

    else { echo '<div class="container">
                    <br>
                    <div class="alert alert-secondary" role="alert">
                        <p>You have no Bookings</p>
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