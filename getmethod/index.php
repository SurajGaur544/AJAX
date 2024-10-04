<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>This is get method example</h1>
        <form action="" method="get" id="myForm">
            <input type="text" name="uname" id="uname" placeholder="Enter your first name">
            <br /><br />
            <input type="text" name="surname" id="surname" placeholder="Enter your surname">
            <br /><br />
            <input type="button" value="submit" id="btn">
        </form>
        <br /><br />
        <h2 id="result"></h2>
    </div>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn").click(function(){
                var uname = $("#uname").val();
                var surname = $("#surname").val();
                if(uname == "" || surname == ""){
                    alert("Both fields are required");
                }else{
                    $.get(
                        "process.php",
                        // {uname:uname , surname:surname},
                        $("#myForm").serialize(),
                        function(response, status, xhr){
                            $("#result").text(response);
                        }
                    );
                }
            });
        });
    </script>
</body>
</html>