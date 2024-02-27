<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
</head>
<body>
    <div class="popup" id="popupOK" style="position:absolute; transform:translate(-50%,-50%),text-align:center; top:50%; left:50%;
        background-color:white;opacity:0;">
             <div class="content" id="contentOK" style=
            "position:absolute; transform:translate(-50%,-50%);text-align:center; top:50%; left:50%; opacity:0; visibility:hidden;">
                <h1>Action Successful</h1>
            </div>
            <br>
            <button type="button" class="close-button" id="close-ok" onclick="closeOK()" name="closeOK" 
            style="opacity:0;visibility:hidden;">Close</button>
    </div>
</body>
</html>