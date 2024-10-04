<?php
include("dbconnection.php");

function GetMaxId(){
    global $conn;
    $query = "select max(id) from my_tbl";
    $run = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($run);
    return $row[0];
}

if(isset($_POST['id'])){
  $id = isset($_POST['id']);
  $query = "select * from my_tbl where id > '$id' order by id limit 2";
  $runn = mysqli_query($conn,$query);
  $output = "";
  while($row = mysqli_fetch_array($runn)){
    $output .="<tr>
                  <td>".$row[0]."</td>
                  <td>".$row[1]."</td>
                  <td>".$row[2]."</td>
                </tr>";
                $id = $row[0];
  }
  if($id < GetMaxId()){
    $output .= "<tr id='remove_row'>
                <td colspan='3'>
                    <input id='load_more' type='button' value='load more' data-id=' $id' style='border-style: none; background-color: inherit;'>
                </td>
            </tr>";
  }
  
}
sleep(2);
echo $output;
?>