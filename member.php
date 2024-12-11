<?php include 'dbconfig.php'; 
if (!isset($_SESSION['role'])) {
    echo  '<div class="alert alert-danger text-center" style="margin-top: 50px;" role="alert">
    กรุณาเข้าสู่ระบบ
  </div>';
  header("Refresh: 2; url=adminlogin.php");        
  exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>member</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    <script src="https://kit.fontawesome.com/b827d8c466.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="stylebackground.css" rel="stylesheet">

    <?php include 'navbar.php';  ?>
  
    <style>
        table {
            width: 95%;
            margin: 20px;
            border-collapse: collapse;
        }

        tbody td {

            color: white;
            padding: 10px;
            border: 1px solid;

        }

        thead th {
            background-color: #546e7a;
            color: white;
            padding: 10px;
            border: 1px solid;

        }
    </style>
</head>

<body>
    <div style="background-color:#eceff1;  height: 150px; ">
        <h2 class="text-center" style=" padding: 50px;"><b>จัดการข้อมูลแอดมิน</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <!-- Button trigger modal -->
                <a type="button" class="btn btn-success" style="margin-top: 25px;" data-bs-toggle="modal" data-bs-target="#addMember">
                    เพิ่มสมาชิก
                </a>
                <?php include_once 'modal-member.php' ?>
                <div style="margin-top: 20px;">
                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success text-center" role="alert">
                            <?= htmlspecialchars($_GET['success']) ?>
                        </div>
                    <?php elseif (isset($_GET['error'])): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= htmlspecialchars($_GET['error']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>USERNAME</th>
                            <th>ACTION</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($users)) {
                            foreach ($users as $user) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($user['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                                echo "<td> 
                                 <div class='d-flex'>
                                <a href='#' class='btn ' 
                               style=' background-color: #ffc107;
                                 color:#000000;' 
                                   data-bs-toggle='modal'
                                   data-bs-target='#editMember' 
                                   data-username='" . htmlspecialchars($user['username']) . "' 
                                   data-password='" . htmlspecialchars($user['password']) . "'>
                                   แก้ไข
                                </a>
                                <div style='margin-left: 15px;'>
                                <form method='POST' action='delete-member.php' >
                                    <input type='hidden' name='id' value='" . htmlspecialchars($user['id']) . "'>
                                    <button type='submit' class='btn btn-danger' onclick='return confirm(\"คุณต้องการลบสมาชิกนี้หรือไม่?\");'>ลบ</button>
                                </form>
                                </div>
                                </div>
                              </td>";
                                include_once 'modal-edit.php';

                                echo "</tr>";
                            }
                        }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>


</body>

</html>