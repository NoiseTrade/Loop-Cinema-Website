<?php

#check form submitted
if ($_SERVER['REQUEST_METHOD'] == 'post')
{

  #open database connection 
  require ('connect_db.php');

  #get connection , load and validate functions.

  require('login_tools.php');

  #check login
  list ($check, $data) = validate ($link,$_POST['email'],$_POST['pass']);

  #on success set session data and display logging in page or assign an error message
  if($check)
  {

    #access session 
    session_start();
    $_SESSION['user_id']=$data['user_id'];
    $_SESSION['first_name']=$data['first_name'];
    $_SESSION['last_name']=$data['last_name'];
    load('home.php');

  }

  #or on failure set errors
  else{$errors = $data;}

  #close database connection 
  mysqli_close($link);

}

?>