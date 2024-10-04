<?php
include("dbconnection.php");
if($_FILES['imageFile']['name'] != ''){
    $img = $_FILES['imageFile']['name'];

    $folder = "images/";
    $folder = $folder . $img;

    $query = "insert into my_img_tbl (path) values('$folder')";
    $run = mysqli_query($conn, $query);
    if($run){
        move_uploaded_file($_FILES['imageFile']['tmp_name'], $folder);
        sleep(2);
        echo "<h2>Image Uploading successfully..<h2> <br />
        <img src='$folder' alt='' height='150' width='150' >";
    }else{
        sleep(2);
        echo "<h2>Image Uploading Failed..<h2>";
    }
}else{
    sleep(2);
    echo "<h2>Image Uploading Failed..<h2>";
}
?>