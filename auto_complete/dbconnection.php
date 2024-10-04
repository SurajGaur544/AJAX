<?php
  $conn = mysqli_connect("localhost","root","","myblog");
  if(!$conn){
    echo "DB connection failed..";
  }
?>