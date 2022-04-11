<?php # Display complete login page

include ( 'includes/login.html' ) ;

# Open database connection.
require ('connect_db.php');


# display any error messages if present

if(isset($errors) && !empty ($errors))
{
    echo '<p id ="err_msg">Oops! There was a problem: Please try again<br>';
    foreach($errors as $msg) {echo " - $msg<br>";}
  
}


include ( '/includes/footer.html' ) ;

?>

<!DOCTYPE html>
<html>

  <head>
 
    <link rel="stylesheet" href="css/cinemastyle.css">

</head>
  <body>
   
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
      </div>
      <div class="modal-body">       
		<form action="login_action.php" method="post">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Email" name="email" required="">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" name="pass" required="">
			</div>
			
      <div class="modal-footer">
        <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Login">
        </form></div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
  </body>

</html>


