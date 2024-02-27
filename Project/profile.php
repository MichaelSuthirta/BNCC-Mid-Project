<?php
    require_once "database.php";

    $id = 'UD01';
    $uData = getprofile($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:black;">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?= '../images/' . $uData["photo"]?>"></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-2 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Profile</h3>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><h5>First Name</h5>
                        <p> <?= $uData["firstName"];?></p>
                    </div>

                    <div class="col-md-6"><h5>Last Name</h5>
                        <p> <?= $uData["lastName"];?></p>
                    </div>

                    <div class="col-md-6"><h5>Email</h5>
                        <p> <?= $uData["email"];?></p>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="button" onclick="window.location.href='dashboard.php'">Back</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">

            <div class="p-2 py-5">
                    <div class="col-md-10" style="padding-top:55px;">
                        <h5>Bio</h5>
                        <p> <?= $uData["bio"];?></p>
                    </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>