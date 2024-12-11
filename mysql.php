<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $image = $_FILES['image'];

    // ตรวจสอบรหัสข้อผิดพลาดของการอัปโหลดไฟล์
    if ($image['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file: " . $image['error'];
        exit; // หยุดการทำงาน
    }

    // ระบุโฟลเดอร์ที่ต้องการเก็บรูปภาพ
    $target_dir = "mysql/";
    $target_file = $target_dir . basename($image["name"]);
    
    // ย้ายไฟล์ไปยังโฟลเดอร์ที่กำหนด
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        try {
            // เชื่อมต่อกับฐานข้อมูล
            $conn = new PDO("mysql:host=localhost;dbname=newmysql", "root", "0945528245080845");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // เตรียมคำสั่ง SQL
            $stmt = $conn->prepare("INSERT INTO eyetable (NAME, Image) VALUES (?, ?)");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $target_file);
            
            // ประมวลผลคำสั่ง
            $stmt->execute();
            
            echo "Product added successfully!";
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage(); // แสดงข้อผิดพลาดฐานข้อมูล
        }
    } else {
        echo "Error moving uploaded file.";
    }
}
?>
