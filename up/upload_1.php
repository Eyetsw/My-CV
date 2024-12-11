<?php //อัพไปที่ database
session_start();
include_once 'dbconfig_1.php';


// file pload path
$targetDir ="upimage/";

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
                    // รับค่า row_id ที่เลือก
                    $product_id = $_POST['product_id'];
                    if (empty($product_id)) {
                        $_SESSION['statusMsg'] = "Product ID is not set.";
                        header("location: newindex.php");
                        exit();
                    }

                    // เตรียมคำสั่ง SQL สำหรับการอัปเดตข้อมูลในแถวที่เลือก
                    $insert = $db->prepare("UPDATE product SET product_image = :product_image WHERE product_id = :id ");
                    $insert->bindParam(':product_image', $fileName);
                    $insert->bindParam(':id', $product_id);

                    if ($insert->execute()) {
                        $_SESSION['statusMsg'] = "The file " . $fileName . " has been uploaded successfully.";
                        header("location: newindex.php");
                    } else {
                        $_SESSION['statusMsg'] = "Database error: Unable to insert file record.";
                        header("location: newindex.php");
                    }
                } else {
                    $_SESSION['statusMsg'] = "Database connection failed.";
                    header("location: newindex.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Error moving the uploaded file.";
                header("location: newindex.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, PNG, JPEG, GIF, & PDF files are allowed.";
            header("location: newindex.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file again.";
        header("location: newindex.php");
    }
}

?>
