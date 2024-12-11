<?php
session_start();


$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "upload_db";

try {

    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . $e->getMessage());
}
// ดึงข้อมูลจากdb 
try {
    $stmt = $conn->prepare("SELECT id, username, password FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("ข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage());
}
// login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!empty($username) && !empty($password)) {
        try {
            // ตรวจสอบข้อมูลผู้ใช้ในฐานะ Admin
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND role = :role");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $role = 'admin';
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // เก็บข้อมูลใน Session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // เปลี่ยนหน้าไปยัง index.php
                header("Location: index.php");
                exit();
            }
        } catch (PDOException $e) {
            // แสดงข้อความกรณีเกิดข้อผิดพลาดจากฐานข้อมูล
            $error = "เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . htmlspecialchars($e->getMessage());
        }
    }
}
// add-member
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['username'] ?? null;
    $newPassword = $_POST['password'] ?? null;
    $role = 'admin';


    if (!empty($newUsername) && !empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
            $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: member.php?success=เพิ่มข้อมูลสำเร็จ");

            exit;
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "เกิดข้อผิดพลาด: " . $e->getMessage();
            header("Location: member.php");
            exit;
        }
    } else {
        $_SESSION['error_message'] = "กรุณากรอกข้อมูลให้ครบถ้วน.";
        header("Location: member.php");
        exit;
    }
}


try {
    // ดึงข้อมูลรูปภาพ
    $sql = "SELECT file_name FROM images WHERE id = :id";
    $sth = $conn->prepare($sql);
    $id = 1;
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $fileName = $result['file_name'];
    }

    // ดึงข้อมูลจากตาราง experience
    $sqlExperience = "SELECT * FROM experience";
    $sthExperience = $conn->prepare($sqlExperience);
    $sthExperience->execute();
    $experienceData = $sthExperience->fetchAll(PDO::FETCH_ASSOC);

    // ดึงข้อมูลจากตาราง education
    $sqleducation = "SELECT * FROM education";
    $stheducation = $conn->prepare($sqleducation);
    $stheducation->execute();
    $educationData = $stheducation->fetchAll(PDO::FETCH_ASSOC);

    // ดึงข้อมูลจากตาราง skill
    $sqlskill = "SELECT * FROM skill";
    $sthskill = $conn->prepare($sqlskill);
    $sthskill->execute();
    $skillData = $sthskill->fetchAll(PDO::FETCH_ASSOC);

    // ดึงข้อมูลจากตาราง thesis
    $sqlthesis = "SELECT * FROM thesis";
    $sththesis = $conn->prepare($sqlthesis);
    $sththesis->execute();
    $thesisData = $sththesis->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("ข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage());
}
