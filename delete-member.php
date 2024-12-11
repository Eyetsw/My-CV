<?php
include_once 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if (!empty($id)) {
        try {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: member.php?success=" . urlencode("ลบข้อมูลสำเร็จ"));
                exit;
            } else {
                header("Location: member.php?error=" . urlencode("ไม่สามารถลบข้อมูลได้"));
                exit;
            }
        } catch (PDOException $e) {
            header("Location: member.php?error=" . urlencode("เกิดข้อผิดพลาด: " . $e->getMessage()));
            exit;
        }
    } else {
        header("Location: member.php?error=" . urlencode("ไม่พบข้อมูลสมาชิก"));
        exit;
    }
}
?>
