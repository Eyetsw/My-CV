<?php

include_once 'dbconfig.php';

?>

<!DOCTYPE html>
<html lang="th">

<head>
  <title>index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



  <script src="https://kit.fontawesome.com/b827d8c466.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="stylebackground.css" rel="stylesheet">

 <?php include 'navbar.php'; ?>
  <style>
    .custom-button {
      font-size: 1rem;
      color: #333;
      border: 1px solid #757575;
      border-radius: 5px;
      transition: all 0.3s ease;
      /* ความนุ่มนวล */
    }

    .custom-button:hover {
      background-color: #757575;
      color: white;
    }

    .text-one {
      margin-top: 10px;
      font-size: 0.75rem;
      margin-left: 15px;
    }

    .text-two {
      font-size: 0.75rem;
      margin-left: 25px;
      margin-top: 10px;
    }
  </style>

</head>

<body>

  <div>
    <div class="container pt-5 " style="margin-bottom: 50px;">
      <div class="row justify-content-center">
        <div class="col-6 col-12  col-sm-6 col-md-6 col-lg-6">
          <div class="card m-auto shadow h-500 " style="background-color:#cfd8dc; width: 90%; height: 550px; ;  ">
            <img src="upload1/<?php echo  $fileName; ?>" class="card-img-top m-auto mt-5" style="width: 40%;">
            <div class="card-body">
              <hr class="w-50 mx-auto" style="border-top: 2px solid #78909c;">
              <h5 class="card-title text-center" style=" color:#757575; padding-top: 15px;"> <b>JUTHAPORN THIANSUWAN</b></h5>
              <h5 class="card-title text-center" style=" color:#757575; padding-top: 5px;"> <b>###</b></h5>
              <h5 class="card-title text-center" style="font-size : 1rem; color:#546e7a; margin-top: 80px;"></i> <b>FOLLOW ME</b></h5><br>
              <div style="display: flex; justify-content: center; margin-top: -13px;">
                <a href="https://www.facebook.com/profile.php?id=100006712006016">
                  <i class="fa-brands fa-square-facebook" style="color: #546e7a; font-size: 33px; margin-right: 30px; margin-top: -3px;"></i>
                </a>
                <a href="https://mail.google.com/mail/u/0/#inbox">
                  <i class="fa-solid fa-envelope" style="color: #546e7a; font-size: 35px; margin-top: -2px;"></i>
                </a>
                <a href="https://www.instagram.com/eye.tsw/">
                  <i class="fa-brands fa-square-instagram" style="color: #546e7a; font-size: 30px; margin-left: 30px; "></i>
                </a>
                <a href="https://github.com/Eyetsw">
                  <i class="fa-brands fa-github" style="color: #546e7a; font-size: 30px; margin-left: 30px; "></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-12  col-sm-6 col-md-6 col-lg-6 ">
          <h2 class="pt-5 " style="color: #3a3420;"><b>HELLO, I'm Eye</b></h2>
          <p class="d-md-none d-lg-block " style="color: #3a3420; margin-top: 20px;"> I graduated from the Faculty of Engineering,<br>
            Production Engineering and Robotics,
            at King Mongkut's University <br> of Technology North Bangkok .
          </p>
          <hr class="w-100 mx-auto" style="border-top: 2px solid #78909c;">
          <div class="container  ">
            <div class="row">
              <div class="col-7">
                <a type="button" class=" btn btn-sm custom-button" href="resume.php#education">Education</a>
                <div class="text-one">
                  <?php
                  $sql = "SELECT * FROM education WHERE public = 1";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();

                  if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo  htmlspecialchars($row['Degrees']) . " of " . htmlspecialchars($row['Faculty / Program']) .
                        "<br> at " . htmlspecialchars($row['Academy']) . "<br>";
                      echo '<div style ="margin-top: 5px;"> GPA : ' . htmlspecialchars($row['GPA']) . ' </div>';
                    }
                  }
                  ?>
                </div>

                <a type="button" class=" btn custom-button btn-sm" style="margin-top: 25px;" href="resume.php#Skills">Skills</a>
                <div class="text-one">
                  <?php

                  $sql = "SELECT * FROM skill WHERE public = 1";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $currentCategory = "";

                  if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      if ($currentCategory != $row['category']) {
                        $currentCategory = $row['category'];
                        echo  htmlspecialchars($row['category']);
                      }
                      echo '<div style =" margin-left: 5px;"> - ' . htmlspecialchars($row['skill_name']) . "</div>";
                    }
                  }
                  ?>

                </div>
              </div>



              <div class="col-5">
                <a type="button" class="btn custom-button btn-sm" style=" margin-left: 0px; " href="resume.php#Experience">Experience</a>
                <div class="text-two">
                  <?php
                  $sql = "SELECT * FROM experience WHERE public = 1";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $count = 0;
                  if ($stmt->rowCount() > 0) {
                    echo '<div style="font-size: 0.75rem; margin-left: -10px;">PARTTIME JOB : <br></div>';
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      if ($count > 0) {
                        echo '<div style="font-size: 0.75rem; margin-left: -10px; margin-top: 5px;">INTERNSHIP :</div>';
                      }
                      echo "Organize : " . htmlspecialchars($row['experience_Organize']) . "<br>";
                      echo "Position : " . htmlspecialchars($row['experience_position']) . "<br>";
                      $count++;
                    }
                  }

                  ?>
                </div>

                <a type="button" class="btn custom-button btn-sm" style="margin-top: 20px;" href="resume.php#Thesis"> Thesis</a><br>
                <div class="text-two">
                  <?php
                  $sql = "SELECT * FROM thesis";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();

                  if ($stmt->rowCount() > 0) {

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                      echo htmlspecialchars($row['project_name']) . "<br>";
                    }
                  }

                  ?>

                </div>

              </div>
            </div>
          </div>
        </div>









</body>

</html>