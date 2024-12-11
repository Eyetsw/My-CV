<?php
include_once 'dbconfig.php';

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <title>login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/b827d8c466.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="stylebackground.css" rel="stylesheet">

    <?php include 'navbar.php' ?>

</head>

<body>

    <div>
        <h1 class="text-center" style="margin-top: 20px; padding: 40px ;"><b>Admin Login</h1>
        <hr>
        <div class="container">
        <form action="dbconfig.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
           
        </form>
    </div>
    </div>



</body>

</html>