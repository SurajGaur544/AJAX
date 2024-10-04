<?php
include('dbconnection.php');



   if(isset($_post['name']) == ''){
    $name = $_post['name'];
    $query = "select * from users where name = '$name' order by id ";
    $run = mysqli_query($conn, $query);
    if($run){
        echo "this is data..";
    }
   }else{
    echo "Plese Enter value";
   }
?>