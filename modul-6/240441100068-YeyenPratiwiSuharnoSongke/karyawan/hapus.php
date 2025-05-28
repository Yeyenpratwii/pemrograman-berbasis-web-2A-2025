<!-- hapus.php -->
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../akun/login.php");
    exit;
}

require_once '../config/db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM karyawan_absensi WHERE id = $id");

header("Location: index.php");
exit;
?>