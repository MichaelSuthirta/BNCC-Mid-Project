<?php
  require "database.php";
  $userData=getData();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="dashboardCSS.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      tr:nth-child(odd){
        background-color:lightgrey;
      }

      tr:nth-child(even){
        background-color:#efefef;
      }

      button{
        color: white;
        text-align: center;
        width:100px;
        height:40px;
        background-color: black;
        border-radius: 15px;
        border: 0;
        cursor:pointer;
      }
      .buttonDel{
        background-color:red;
      }
    </style>
    <script>

      function showDelete(id) {
        console.log('Delete button clicked', id);

        var popupDel = document.getElementById('popupDel');
        var contentDel = document.getElementById('contentDel');

        popupDel.style.display = 'block';
        popupDel.style.opacity = 1;
        popupDel.style.visibility = 'visible';
        contentDel.style.opacity = '1';
        contentDel.style.visibility = 'visible';

        document.getElementById('deleteUserId').value = id;
    }  

    function closeDelete(){
      var popupCenterD = document.getElementById('popupCenterD');
      var popupContentD = document.getElementById('popupContentD');
    
      popupCenterD.style.display = 'none';
      popupContentD.style.opacity = '0';
      popupContentD.style.visibility = 'hidden';
    }

    function confirmDelete(){
      var id = document.getElementById('deleteUserId').value;
      console.log('User ID:', id);
    }
</script>
</head>

<body style="background-color: black;">

<script src="popup.js"></script>

<nav class="navbar navbar-expand-lg bg-body-tertiary" >

<div class="center" id="popupCenterD" style="opacity:0; visibility:hidden;">
      <!-- <div class="content" id="popupContentD">
        <div class="popup">
          <h2>Delete User</h2>
        </div>
        <p >Do you want to delete this user?</p>
        <hr class="line">
        <button class="buttonDel" type="submit" form="deleteForm" name="yesBtn" onclick="confirmDelete()" >Yes</button>
        <button class="button" name="no" onclick="closeDelete()" >No</button>
      </div>
    </div> -->

    <form id="deleteForm" action="" method="POST">
      <input type="hidden" name="id" id="deleteUserId" value="">
    </form>
</div>



  <div class="container-fluid" style="margin-left:40px;">
    <a class="navbar-brand" href="#">Attendance System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<form class="d-flex" role="search">
<input class="form-control me-2" type="search" placeholder="Search for user..." aria-label="Search"]
style="max-width: 1250px; margin:50px; margin-left:105px;">
<button class="btn btn-outline-success" type="submit" style="height:40px; margin-top:49px;">Search</button>
</form>
<br>
<div class="container" border="20px" style="border:20px; background-color: #efefef; 
padding: 20px 45px;">
<div class="content">
    <table>
        <th style="font-size:25px; background-color:#efefef;">User List</th>
        <tr>
          <th style="font-size:20px; padding:10px;">No</th>
          <th style="font-size:20px; padding:10px; max-width:200px;">Picture</th>
          <th style="font-size:20px; padding:10px; text-align:center;">Full Name</th>
          <th style="font-size:20px; padding:10px; text-align:center;">Email</th>
        </tr>
        <tbody>
          <?php $num=1; foreach($userData as $uData): ?>
            <tr>
              <td style="padding:10px;"><?= $num++;?></td>
              <td style="padding:10px; text-align:center;">
                <?php $photo = "../images/" . $uData["photo"]; 
                echo '<img src="' . $photo . '
                " alt="Picture" style="max-width: 150px; max-height: 150px;">'; ?>
              </td>
              <td style="padding:10px; text-align:center;"><?= $uData["firstName"]." ".$uData["lastName"];?></td>
              <td style="padding:10px; text-align:center;"><?= $uData["email"];?></td>
              <td style="padding:10px; text-align:center;">
                <div class="my-3 d-flex justify-content:center">
                  <a><button class="button" onclick="">View</button></a>
                </div>
                
               <div class="my-3 d-flex justify-content:center">
                  <a href="users_option/edit.php"><button class="button" onclick="">Edit</button></a>
               </div>
                <div class="my-3 d-flex justify-content:center">
                <input type="hidden" class="hiddenID" value="<?= $user["id"] ?>">
                <button class="delete-button" onclick="showDelete(<?= $uData['id'] ?>)">Delete</button>
              </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>

        <div class="popup" id="popupDel" style="position:absolute; transform:translate(-50%,-50%),text-align:center; top:50%; left:50%;
        background-color:white;opacity:0;">
            <div class="content" id="contentDel" style=
            "position:absolute; transform:translate(-50%,-50%);text-align:center; top:50%; left:50%; opacity:0; visibility:hidden;">
                <h1>Are you sure you want to delete this user?</h1>
            </div>
            <br>
            <button type="button" class="cancel" id="cancel" onclick="closeDel()" name="closeDel" 
            style="opacity:0;visibility:hidden;">Cancel</button>
        </div>
      
      <div class="my-3 d-flex justify-content:center">
      <a class="btn btn-primary" href="users_option/add.php">Add User</a>
      </div>
</div>
</body>
</html>