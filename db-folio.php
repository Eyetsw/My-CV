<?php
include_once 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['portfolio_image']) && $_FILES['portfolio_image']['error'] == 0) {
        $targetDir = "image/";
        $fileName = basename($_FILES["portfolio_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $name = htmlspecialchars($_POST['portfolio_name']);

        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["portfolio_image"]["tmp_name"], $targetFilePath)) {
                try {
                    $sql = "INSERT INTO portfolio (IMAGE, NAME) VALUES (?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(1, $fileName, PDO::PARAM_STR);
                    $stmt->bindParam(2, $name, PDO::PARAM_STR);
                    if ($stmt->execute()) {
                        header("Location:add-folio.php?success=" . urlencode("อัปโหลดและบันทึกข้อมูลสำเร็จ"));
                        exit();  // ควรใช้ exit() เพื่อไม่ให้รันโค้ดหลังจากการ redirect
                    } else {
                        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
                    }
                } catch (PDOException $e) {
                    echo "ข้อผิดพลาด: " . $e->getMessage();
                }
            } else {
                echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
            }
        } else {
            echo "รองรับเฉพาะไฟล์ JPG, JPEG, PNG และ GIF เท่านั้น";
        }
    } else {
        echo "โปรดเลือกไฟล์ที่จะอัปโหลด";
    }
} else {
    echo "โปรดเลือกไฟล์ที่จะอัปโหลด";
}

exit();

?>