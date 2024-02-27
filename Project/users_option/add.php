<?php
    require_once "../database.php";

    if(isset($_POST["addBtn"])){
        if(checkEmail($_POST)){
            echo "
                <script>
                    window.onload = function(){
                        if(". (checkEmail($_POST) ? "true" : "false") ."){
                            showError('Email already exist');  
                        }
                    };
                </script>";
            }
            else{
                $firstName = isset($_POST["first"]) ? $_POST["first"] : "";
                $lastName = isset($_POST["last"]) ? $_POST["last"] : "";
                $email = isset($_POST["email"]) ? $_POST["email"] : "";
                $photo=isset($_FILES["photo"]["name"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK && !empty($_FILES["photo"]["name"]);
                if (empty($firstName) || empty($lastName) || empty($email) || empty($photo)) {
                    echo "
                        <script>
                            window.onload = function(){
                                showError();
                            }
                        </script>
                   ";
                }
                else{
                    addUser($_POST,$_FILES["photo"]);
                    echo "
                    <script>
                    window.onload = function(){
                        showOK();
                    }
                    </script>";

                    // header("Location: ../dashboard.php");    
                }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addUser</title>
    <script src="../popup.js"></script>
    <style>
        body{
            background-color:black;
            height:5px;
            margin:5% 25%;
        }

        .container{
            display:grid;
            grid-template-columns: auto auto;
        }

        .content{
            font-family: sans-serif; 
        }

        button{
            color: white;
            text-align: center;
            width:55%;
            height:50px;
            background-color: black;
            border-radius: 15px;
            border: 0;
            cursor:pointer;
        }

        button:active{
            color:black;
            background-color: white;
        }

        .popup{
            position: absolute;
            height:300px;
            width:100px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border:3px solid black;
            text-align: center;
            display: none;
            opacity: 0;
            visibility: hidden;
        }
    </style>
</head>
<body>
    <div>
        <form action="" method="POST" enctype="multipart/form-data" id="addForm">
            <div class="container" border="20px"
            style="border:20px; border-radius: 30px; background-color: #efefef; padding: 70px 45px; display:grid; 
            grid-template-columns: auto auto;">
                <div class="content" style="font-size:70px; border:10px; padding: 40px;">
                    <b>Add<br>User</b>
                </div>
                <div class = "content" style="display:block; background-color:white; border:10px; padding:10px; padding-left:15px;
                    ">
                    <img src="" id="preview" style="max-width:100%; max-length:100%; display:block;">
                </div>
                <br>
                <div class="content">
                    <div class="container" style="display:block; background-color:white; border:10px; padding:10px; padding-left:15px;">
                        <div class="content">
                            <input type="file" accept="img/*" name="photo" id="photo">
                        </div>
                    </div>
                <br>
                <div class="content">
                    <div class="container" style="display:block; background-color:white; border:10px; padding:10px; padding-left:15px;">
                          <div class="content">
                           <label for="first">First Name<br></label>
                           <input type="text" id="first" name="first" placeholder="First Name"
                           style="height: 20px; border:0; margin-top:10px; margin-bottom: 0;">
                        </div>
                    </div>
                    <br>
                    <div class="content">
                        <div class="container" style="display:block; background-color:white; border:10px; padding:10px; padding-left:15px;">
                          <div class="content">
                           <label for="last">Last Name<br></label>
                           <input type="text" id="last" name="last" placeholder="Last Name"
                           style="height: 20px; border:0; margin-top:10px; margin-bottom: 0;">
                        </div>
                    </div>
                    <br>
                    <div class="content">
                        <div class="container" style="display:block; background-color:white; border:10px; padding:10px; padding-left:15px;">
                          <div class="content">
                           <label for="email">Email<br></label>
                           <input type="email" id="email" name="email" placeholder="email@gmail.com"
                           style="height: 20px; border:0; margin-top:10px; margin-bottom: 0;">
                        </div>
                   </div>
                   <br>
                   <div class="container" style="display:block; background-color:white; border:10px; padding:10px; padding-left:15px; max-width:auto">
                        <div class="content">
                            <label for="bio">Bio<br></label>
                            <textarea name="bio" id="bio"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="container" style="display:block;">
                        <div class="content">
                            <button type="submit" name="addBtn" id="addBtn" style="font-size: large;">
                                Add User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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

        <div class="popup" id="popupError" style="position:absolute; transform:translate(-50%,-50%),text-align:center; top:50%; left:50%;
        background-color:white;opacity:0;">
            <div class="content" id="contentError" style=
            "position:absolute; transform:translate(-50%,-50%);text-align:center; top:50%; left:50%; opacity:0; visibility:hidden;">
                <h1>Error</h1>
            </div>
            <br>
            <button type="button" class="close-button" id="close-error" onclick="closeError()" name="closeEr" 
            style="opacity:0;visibility:hidden;">Close</button>
        </div>
    </div>

    <script>
        const imgPreview = document.querySelector("#preview");
        const imageUpload = document.querySelector("#photo");

        imageUpload.addEventListener('change', () => {
            const files = imageUpload.files[0];

            if(files){
                imgPreview.src = URL.createObjectURL(files);
                imgPreview.style.display = "block";
            }
        })
    </script>
</body>
</html>