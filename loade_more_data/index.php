<?php

// include"dbconnection.php";

// $query = "select * from my_tbl order by id limit 2";
// $run = mysqli_query($conn, $query);

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loade more data page</title>
    <style>
        #loader{
            display: none;
        }
    </style>
</head>
<body>
    <div style="text-align: center; ">
        <h1>This page is example of loade more data</h1>

        <table border="1" id="data_table" align="center">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
            </tr>
            <?php
            
            // while($row = mysqli_fetch_array($run)){
            //     echo"<tr>
            //       <td>".$row[0]."</td>
            //       <td>".$row[1]."</td>
            //       <td>".$row[2]."</td>
            //     </tr>";
            //     $id = $row[0];
            // }
            ?>
            <tr id="remove_row">
                <td colspan="3">
                    <input id="load_more" type="button" value="load more" data-id="<?php echo $id; ?>" style="border-style: none; background-color: inherit;">
                </td>
            </tr>
        </table>
        <div  id="loader" style="text-align: center; ">
            <img src="loading2.gif" alt="" height="100" width="150">
        </div>
    </div>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on("click","#load_more",function(event){
                var id = $("#load_more").attr("data-id");
                $.ajax({
                    url:"load.php",
                    type:"POST",
                    data:{id:id},
                    beforeSend:function(){
                        $('#loader').show();
                    },
                    success:function(response){
                        $("#remove_row").remove();
                        $("#data_table").append(response);
                        $("#loader").hide();
                    }
                })
            })
        })
    </script>
</body>
</html> -->








<?php
include "dbconnection.php";

$query = "SELECT * FROM my_tbl ORDER BY id LIMIT 2";
$run = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load More Data Page</title>
    <style>
        #loader {
            display: none;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <h1>This page is an example of loading more data</h1>

        <table border="1" id="data_table" align="center">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
            </tr>
            <?php
            $lastId = null; // Track the last ID

            while ($row = mysqli_fetch_array($run)) {
                echo "<tr>
                        <td>{$row[0]}</td>
                        <td>{$row[1]}</td>
                        <td>{$row[2]}</td>
                      </tr>";
                $lastId = $row[0]; // Update the last ID
            }
            ?>
            <?php if ($lastId !== null): ?>
            <tr id="remove_row">
                <td colspan="3">
                    <input id="load_more" type="button" value="Load more" data-id="<?php echo $lastId; ?>" style="border-style: none; background-color: inherit;">
                </td>
            </tr>
            <?php endif; ?>
        </table>

        <div id="loader" style="text-align: center;">
            <img src="loading2.gif" alt="" height="100" width="150">
        </div>
    </div>

    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on("click", "#load_more", function(event){
                var id = $(this).attr("data-id"); // Use 'this' to refer to the clicked button
                $.ajax({
                    url: "load.php",
                    type: "POST",
                    data: { id: id },
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    success: function(response) {
                        $("#remove_row").remove();
                        $("#data_table").append(response);
                        $('#loader').hide();
                    },
                    error: function() {
                        alert("An error occurred while loading data.");
                        $('#loader').hide();
                    }
                });
            });
        });
    </script>
</body>
</html>
