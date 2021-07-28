<?php
  // Don't display server errors 
  ini_set("display_errors", "on");

  // Initialize a database connection
  $server = "localhost";
  $user = "u118668223_blogmanager";
  $password = "Manish7352";
  $database = "u118668223_blogsdb";


  $conn = mysqli_connect($server, $user, $password, $database);

  // Destroy if not possible to create a connection
  if(!$conn){
      echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
  }