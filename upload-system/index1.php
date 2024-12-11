<?php
session_start();
include_once 'dbconfig.php';
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
        <div class="row mt-5">
            <div class="col-12">
        
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="text-center justify-content-center align-item-center p-5 border-dashed rounded-3 ">
                        <h6 class="my-2">Select image file to upload</h6>
                        <input type="file" name="file" class="form-control streched-link " accept="image/if, image/jpeg, image/png">
                        <p class="small mb-0 mt-2"><b>NOTE : </b> Only JPG, JPEG, PNG & GIF></p>
                    </div>
                    <div class="d-smflex justify-content-end mt-2">
                        <input type="submit" name="submit" value="Upload" class="btn btn-sm btn-primary mb-3 ">
                    </div>
                </form>

            </div>
        </div>
        <div class="row">
            <?php if (!empty($_SESSION['statusMsg'])) { ?>
                <div class="alert alert-secondary" role="alert">
                    <?php 
                        echo $_SESSION['statusMsg']; 
                        unset($_SESSION['statusMsg']);
                    ?>
                </div>
            <?php } ?>
        </div>
        <div class="row g-2">
            <?php
                $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");
                if ($query->rowCount() > 0) {
                    while($row = $query->fetch(PDO::FETCH_ASSOC)){
                        $imageURL = 'upload1/'.$row['file_name'];
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
                <p>NO image found...</p>
            <?php    } ?>
        </div>
    </div>






</body>
</html>