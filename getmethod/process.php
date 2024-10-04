<?php 

include"dbconnection.php";

if(isset($_POST['uname']) && isset($_POST['surname'])){
    $uname = $_POST['uname'];
    $surname = $_POST['surname'];
    if($uname == ''|| $surname == ''){
        sleep(2);
        echo "all field are requied";
    }else{
        $query = "insert into my_tbl (name, surname) values('$uname', '$surname')";
        $run = mysqli_query($con, $query);
        if($run){
            sleep(2);
            echo "Data has been inserted successfully...";
        }else{
            sleep(2);
            echo "Data insertion failed...";
        }
    }
    
}

?>