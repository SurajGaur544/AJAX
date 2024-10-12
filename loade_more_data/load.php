<?php
// include("dbconnection.php");

// function GetMaxId(){
//     global $conn;
//     $query = "SELECT MAX(id) FROM my_tbl";
//     $run = mysqli_query($conn,$query);
//     $row = mysqli_fetch_array($run);
//     return $row[0];
// }

// if(isset($_POST['id'])){
//   $id = isset($_POST['id']);
//   $query = "SELECT * FROM my_tbl WHERE id > '$id' ORDER BY id LIMIT 2";
//   $runn = mysqli_query($conn,$query);
//   $output = "";
//   $newId = null;
//   while($row = mysqli_fetch_array($runn)){
//     $output .="<tr>
//                   <td>".$row[0]."</td>
//                   <td>".$row[1]."</td>
//                   <td>".$row[2]."</td>
//                 </tr>";
//                 $newId = $row[0];
                
//   }
//   // $newId < GetMaxId()
//   if($newId !== null && $newId < GetMaxId()){
//     $output .= "<tr id='remove_row'>
//                 <td colspan='3'>
//                     <input id='load_more' type='button' value='load more' data-id=' $id' style='border-style: none; background-color: inherit;'>
//                 </td>
//             </tr>";
//   }
  
// }
// // sleep(2);
// echo $output;
?>





<?php
include("dbconnection.php");

function GetMaxId() {
    global $conn;
    $query = "SELECT MAX(id) FROM my_tbl";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
    return $row[0];
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); 
    $query = "SELECT * FROM my_tbl WHERE id > '$id' ORDER BY id LIMIT 2";
    $runn = mysqli_query($conn, $query);
    
    $output = "";
    $newId = null; 

    while ($row = mysqli_fetch_array($runn)) {
        $output .= "<tr>
                      <td>{$row[0]}</td>
                      <td>{$row[1]}</td>
                      <td>{$row[2]}</td>
                    </tr>";
        $newId = $row[0]; 
    }

    
    if ($newId !== null && $newId < GetMaxId()) {
        $output .= "<tr id='remove_row'>
                    <td colspan='3'>
                        <input id='load_more' type='button' value='Load more' data-id='$newId' style='border-style: none; background-color: inherit;'>
                    </td>
                </tr>";
    }
}

// Uncomment this line if you want to simulate a delay
// sleep(2);
echo $output;
?>
