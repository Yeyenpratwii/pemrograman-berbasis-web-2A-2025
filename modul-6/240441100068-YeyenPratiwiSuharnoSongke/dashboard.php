<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: akun/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="pink-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-full max-w-xl">
        <h1 class="text-3xl font-bold mb-6 text-center">Dashboard</h1>
        <p class="mb-4 text-center">Selamat datang di Sistem Manajemen Karyawan dan Absensi!</p>

        <div class="flex flex-col gap-4">
            <a href="karyawan/index.php" class="bg-blue-500 text-white py-2 px-4 rounded text-center hover:bg-blue-600">
                Kelola Data Karyawan
            </a>
            <a href="akun/logout.php" class="bg-red-500 text-white py-2 px-4 rounded text-center hover:bg-red-600">
                Logout
            </a>
        </div>
    </div>

</body>
</html>