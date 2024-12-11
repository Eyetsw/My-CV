<?php
session_start();
include_once 'dbconfig_1.php';
?>

<!DOCTYPE html>
<html lang="th">

<head>
  <title>Upload Image System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>
<body>
    <div class="container">
      
        
                <form action="upload_1.php" method="POST" enctype="multipart/form-data">
                    <div class="text-center justify-content-center align-item-center p-5 border-dashed rounded-3 ">
                        <h6 class="text-center">Select image file and Row id to upload</h6>
                        <label for="row_id" class="text-center" style="margin-top: 20px;  margin-bottom: 20px; ">Select Row ID:</label>
                    <select name="product_id" id="product_id">
                    <?php
                            // เชื่อมต่อกับฐานข้อมูลและดึงข้อมูล ID ที่มีอยู่
                            $query = $db->query("SELECT product_id FROM product"); // ปรับตามตารางของคุณ
                            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['product_id'] . "'>" . $row['product_id'] . "</option>";
                            }
                    ?>
                    </select>
                        <input type="file" name="file" class="form-control streched-link " accept="image/gif, image/jpeg, image/png">
                        <p class="small" style="margin-top: 30px;"><b>NOTE : </b> Only JPG, JPEG, PNG & GIF </p>
                    </div>
                    <div class="d-smflex " style="text-align: center;">
                        <input type="submit" name="submit" value="Upload" class="btn btn-sm btn-primary" >
                    </div>
                   
                </form>

            
        <div class="row">
            <?php if (!empty($_SESSION['statusMsg'])) { ?>
                <div class="alert alert-secondary" style="margin-top: 30px;" role="alert">
                    <?php 
                        echo $_SESSION['statusMsg']; 
                        unset($_SESSION['statusMsg']);
                    ?>
                </div>
            <?php } ?>
        </div>
        <div class="row g-2">
            <?php
                $query = $db->query("SELECT * FROM product ORDER BY product_image DESC");
                if ($query->rowCount() > 0) {
                    while($row = $query->fetch(PDO::FETCH_ASSOC)){
                        $imageURL = 'upimage/'.$row['product_image'];
            ?>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card shadow h-100">
                    <img src="<?php echo $imageURL?>" alt="" width="100%" class="card-img">
                </div>
            </div>

            <?php    
                    } //whileloop
                } //if
                 else{ ?>
                <p class="text-center mt-3">NO image found...</p>
            <?php    } ?>
        </div>
    </div>






</body>
</html>