<?php
include_once 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['username'] ?? null;
    $newPassword = $_POST['password'] ?? null;
    $role = 'admin';

    // ตรวจสอบค่าที่ได้รับ
    var_dump($newUsername, $newPassword); // ตรวจสอบค่าที่ได้รับจากฟอร์ม

    if (!empty($newUsername) && !empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
            $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->execute();
            echo "เพิ่มสมาชิกสำเร็จ!";
        } catch (PDOException $e) {
            echo "เกิดข้อผิดพลาด: " . $e->getMessage();
            exit;
        }
    } else {
        echo "กรุณากรอกข้อมูลให้ครบถ้วน.";
    }
    var_dump($newUsername, $hashedPassword); 
}
?>