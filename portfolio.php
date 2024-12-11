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
    <title>Portfolio</title>
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
        <h2 class="text-center" style=" padding: 50px;"><b>จัดการข้อมูลผลงาน</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 ">

                <a type="button" class="btn btn-success" style="margin-top: 25px;" href="add-folio.php">
                    เพิ่มผลงาน
                </a>


                <table>
                    <thead>
                        <tr>
                            <th width="80" style="text-align: center;">ลำดับ</th>
                            <th width="150" style="text-align: center;">Image</th>
                            <th>Name</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $stmt = $conn->prepare("SELECT * FROM portfolio");
                            $stmt->execute();
                            $portfolio = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                                foreach ($portfolio as $row) {
                                    echo "<tr>";
                                    echo "<td style='text-align: center;'>" . htmlspecialchars($row['ID']) . "</td>";
                                    echo "<td style='text-align: center;'><img src='image/" . htmlspecialchars($row['IMAGE']) . "' alt='" . htmlspecialchars($row['NAME']) . "' width='100'></td>";
                                    echo "<td>" . htmlspecialchars($row['NAME']) . "</td>";
                                    echo "</tr>";
                                }
                                echo '</table>';
                           
                        } catch (PDOException $e) {
                            echo "ข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                        }
                        

                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</body>

</html>