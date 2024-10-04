<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="getData">
        <h1 >This is jquery ajax page</h1>
    </div>

    <button type="button" id="btn">click here</button>
    
    <script src="jquery.js"></script>
    <script>
       $(document).ready(function(){
        $("#btn").click(function(){
            $("#getData").load("text.html")
        })
       })
    </script>
</body>
</html>