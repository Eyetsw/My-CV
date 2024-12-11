<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b827d8c466.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        .detail {
            margin-left: 20px;
            font-size: 0.9rem;
            color:white;
        }

        .year {
            font-size: 2rem;
            margin-left: 15px;
            color: #6d4c41;
            display: block;
        }

        .text {
            margin-left: 25px;
            font-size: 0.9rem;
        }

        .image {
            position: relative;
            background-image: url('image/kmutnb.jpg');
            opacity: 0.4;
            width: 40%;
            height: 400px;
        }
        .overlay{
            background-color: rgba(0, 0, 0, 0.6); 
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 400px; 
            z-index: -1;
        }
    </style>
</head>

<body>

    <h1 style="margin-top: 80px; margin-left: 300px; ">
        <i class="fa-solid fa-bookmark" style="padding-right: 10px; margin-left: -100px;" id="education"></i><b style="opacity: 0.8;">EDUCATION</b>
    </h1>
    <div class="container mt-5 mb-5" style="background-color: #eeeeee; width: 70%; height: 400px;">
        <div class="row ">
            <div class="col-6 image ">
                <div class="overlay"></div>
                <h2 class="text-center detail " style=" margin-top: 95px; ">
                    <i class="fa-solid fa-quote-left " style="font-size: 28px;  "></i><br><br>
                    <b>I graduated from the Faculty of Engineering,<br>
                        Production Engineering and Robotics, <br>
                        at King Mongkut's University of Technology North Bangkok <br>
                        I'am enthusiastic about working and have creative thinking skills.
                        I'am able to collaborate well with others, <br>take responsibility,
                        and am eager to develop both myself <br>and the organization with engineering knowledge .</b><br><br>
                    <i class="fa-solid fa-quote-right" style="font-size: 28px;"></i>
                </h2>
            </div>
            <div class="col-6">
                <h2 class=" year" style="margin-top: 60px; ">
                    <b>2020-2024 </b>
                </h2>
                <h3 class="text" style="margin-top: 10px;  ">
                    Bachelor of Production and Robotics Engineer <br></h3>
                <h3 class="text" style=" margin-top: 5px; ">King mongkut’s university of technology north bangkok .<br><br>
                    GPA : 2.83 </h3>
                <h2 class="year" style="margin-top: 40px; ">
                    <b>2017-2019 </b>
                </h2>
                <h3 class="text" style="  margin-top: 10px; ">
                    Senior High School Rittiyawannarai School .<br><br>
                    GPA : 3.65 <br></h3>
            </div>
        </div>
    </div>

</body>

</html>