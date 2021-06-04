<?php

  //starts session
  session_start();

  // remove all session variables
  session_unset();

  // destroy the session
  session_destroy();

  if($_GET['page']=="index")
  {
    header("location:index.php?success3=1");
  }
  else if($_GET['page']=="menu")
  {
    header("location:menu.php?success3=1&list=all");
  }
  die('Logged-out with success!');
?>