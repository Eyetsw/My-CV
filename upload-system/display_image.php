<?php
include_once 'dbconfig.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล

// ดึงข้อมูลรูปภาพจากฐานข้อมูล
$query = $db->query("SELECT file_name FROM images WHERE id = 1");
$imageData = $query->fetch(PDO::FETCH_ASSOC);
$imageURL = 'upload1/' . htmlspecialchars($imageData['file_name']); // สร้าง URL ของภาพ
?>

<!DOCTYPE html>
<html lang="th">

<head>
  <title>index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</head>

<body>

  <div>
    <div class="container pt-5 ">
      <div class="row justify-content-center">
        <div class="col-6 col-12  col-sm-6 col-md-6 col-lg-6">
          <div class="card m-auto " style="background-color:#cfd8dc; width: 90%; height: 480px;  ">
            <img src="#" class="card-img-top m-auto mt-5" style="width: 30%;" alt="Image Description">
           <div class="card-body">
              <hr class="w-50 mx-auto" style="border-top: 2px solid #78909c;">
              <h5 class="card-title text-center" style=" color:#757575;"></i> <b>JUTHAPORN  THIANSUWAN</b></h5>
              <div style="display: flex; justify-content: center; padding: 50px 0;">
                <a  href="#">
                  <img src="<?php echo $imageURL; ?>"  style="width: 300px; height: 300px; margin-right: 30px;">
                </a>
               
              </div>
            
            </div>
          </div>
        </div>
        <div class="col-6 col-12  col-sm-6 col-md-6 col-lg-6 ">
          <h2 class="pt-5 " style="color: #3a3420;"><b>HELLO, I'm Eye</b></h2>
          <h4 class="pt-2">Here's who I am & what I do</h4>
          <p class="d-md-none d-lg-block " style="color: #3a3420; margin-top: 20px;"> I graduated from the Faculty of Engineering, 
            Production Engineering <br> and Robotics,
            at King Mongkut's University of Technology North Bangkok.
          </p>
          <hr class="w-100 mx-auto" style="border-top: 2px solid #78909c;">
          <div class="container  ">
            <div class="row">
              <div class="col-6">
              <a type="button" class="btn btn-outline-dark btn-sm" style="font-size: 1rem"  href="resume.php">Education</a><br>                                                    
              <span style="font-size: 0.8rem; margin-left: 2px;" >King Mongkut's University <br> of Technology North Bangkok. </span><br><br>
              <a type="button" class="btn btn-outline-dark btn-sm" style="font-size: 1rem"  href="resume.php">Experience</a><br>
              <span style="font-size: 0.8rem; margin-left: 2px;" >vavabebe </span> 
              </div>
              <div class="col-6">
              <a type="button" class="btn btn-outline-dark btn-sm" style="font-size: 1rem"  href="resume.php"> Skills</a><br>
              <span style="font-size: 0.8rem; margin-left: 2px;" >Software</span><br><br><br>
              <a type="button" class="btn btn-outline-dark btn-sm" style="font-size: 1rem"  href="resume.php"> Thesis</a><br>
              <span style="font-size: 0.8rem; margin-left: 2px;" >dljcduusjvn</span>
              </div>
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
 






</body>

</html>
