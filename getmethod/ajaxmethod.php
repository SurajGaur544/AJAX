<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>example of ajaxmethod</title>
    <style>
        #loader{
            display: none;
        }
    </style>
</head>
<body>
    <div>
        <h1>example of ajaxmethod</h1>
        <form action="" method="get" id="myForm">
            <input type="text" name="uname" placeholder="Enter your first name" >
            <br /><br />
            <input type="text" name="surname" placeholder="Enter your surname name" >
            <br /><br />
            <input type="button" value="submit" id="btn">
        </form>
        <br /><br />
        <h2 id="result"></h2>
        <div id="loader">
            <img src="loading2.gif" alt="" height="100px" width="100px">
        </div>
    </div>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn").click(function(){
                var uname = $("#uname").val();
                var surname = $("#surname").val();
                if(uname == '' || surname == '') {
                    // alert("all feild are require");
                    $('#result').text("all feild are require");
                }else{
                    $.ajax({
                        url: "process.php",
                        type: "post",
                        data: $("#myForm").serialize(),
                        beforeSend:function(){
                            $("#loader").show();
                        },
                        success: function(result,status,xhr){
                            $('#result').text(result);
                            $("#loader").hide();
                        },
                        error: function(xhr,status,result){
                            $('#result').text("This page is "+result);
                            $("#loader").hide();
                        },
                        // complete:function(xhr,status){
                        //     alert(status);
                        // }
                        
                    })
                }
            })
        })
    </script>
</body>
</html>