<?php 

include('dbconnection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>this page is uploade image</title>
</head>
<body>
    <div>
        <label for="imageFile">Choose your file</label>
        <input type="file" name="imageFile" id="imageFile">
        <span id="uploaded"></span>
    </div>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on("change","#imageFile",function(event){
                var img = document.getElementById("imageFile").files[0];
                var img_name = img.name;
                var img_extension = img_name.split(".").pop().toLowerCase();
                if(jQuery.inArray(img_extension,['png','jpg','jpeg']) != -1){
                    var img_size = img.size;
                    if(img_size < 1000000){
                        var form_data = new FormData();
                        form_data.append("imageFile",img);
                        $.ajax({
                            url:"uploade.php",
                            type:"post",
                            data:form_data,
                            contentType:false,
                            cache:false,
                            processData:false,
                            beforeSend: function(){
                                $("#uploaded").text("Loading..");
                            },
                            success: function(response){
                                $("#uploaded").html(response);
                            },
                            error: function(xhr,status,result){
                                $("#uploaded").html(result);
                            }
                        });
                    }else{
                        alert("image size should be less than or equal to 1MB..");
                    }
                }else{
                    alert("Image formate not supported..");
                }
            });
        })
    </script>
</body>
</html>