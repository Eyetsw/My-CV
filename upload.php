<?php
session_start();
include_once 'dbconfig.php';


// file pload path
$targetDir ="upload1/";

if(isset($_POST['submit'])){
    if(!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilepath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilepath, PATHINFO_EXTENSION);

        //ระบุว่าให้ไฟล์ไหนผ่านการอัพโหลดได้ 
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if (in_array($fileType,$allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilepath)) {
                // เช็คการเชื่อมต่อฐานข้อมูล
                if ($db) {
                    // เตรียมคำสั่ง SQL
                    $insert = $db->query("INSERT INTO images(file_name, uploaded_on) VALUES('" . $fileName . "', NOW())");

                    if ($insert) {
                        $_SESSION['statusMsg'] = "The file " . $fileName . " has been uploaded successfully.";
                        header("location: index1.php");
                    } else {
                        $_SESSION['statusMsg'] = "Database error: Unable to insert file record.";
                        header("location: index1.php");
                    }
                } else {
                    $_SESSION['statusMsg'] = "Database connection failed.";
                    header("location: index1.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Error moving the uploaded file.";
                header("location: index1.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, PNG, JPEG, GIF, & PDF files are allowed.";
            header("location: index1.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file again.";
        header("location: index1.php");
    }
}

?>
