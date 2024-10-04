<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example of fetch db and auto complete functionality</title>
</head>
<body>
    <div style="text-align: center;">
        <h1 style="color:blue;font-size:46px; margin: 10px; padding:50px; background-color: black;  ">Example of fetch db and auto complete functionality</h1>
        <input type="text" name="" id="txt" placeholder="Enter your name" style="margin: 5px; padding:10px; border-radius:5px;">
        <div id="name_List"></div>
    </div>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $("#txt").keyup(function(){
                var name = $("#txt").val();
                if(name != ''){
                    $.ajax({
                        url:"process.php",
                        type:"post",
                        data:{name:name},
                        success:function(response){
                            $("#name_List").text(response);
                        },
                        error: function(xhr, status, result){
                            $("#name_List").text("Server not availble");
                        }
                    })
                }else{
                    $("#name_List").text("Please enter value");
                }
                
            })
        })
    </script>
</body>
</html>