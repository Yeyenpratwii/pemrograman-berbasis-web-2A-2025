<!-- indeks.php -->
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../akun/login.php");
    exit;
}

require_once '../config/db.php';
$result = mysqli_query($conn, "SELECT * FROM karyawan_absensi");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 min-h-screen p-10">
    <div class="bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Data Karyawan</h2>
        <a href="tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">+ Tambah Data</a>
        <table class="w-full border border-collapse">
            <thead class="bg-indigo-200">
                <tr>
                    <th class="border px-2 py-1">NIP</th>
                    <th class="border px-2 py-1">Nama</th>
                    <th class="border px-2 py-1">Umur</th>
                    <th class="border px-2 py-1">Jenis Kelamin</th>
                    <th class="border px-2 py-1">Departemen</th>
                    <th class="border px-2 py-1">Jabatan</th>
                    <th class="border px-2 py-1">Kota</th>
                    <th class="border px-2 py-1">Tanggal</th>
                    <th class="border px-2 py-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr class="text-center">
                    <td class="border px-2 py-1"><?= $row['nip'] ?></td>
                    <td class="border px-2 py-1"><?= $row['nama'] ?></td>
                    <td class="border px-2 py-1"><?= $row['umur'] ?></td>
                    <td class="border px-2 py-1"><?= $row['jenis_kelamin'] ?></td>
                    <td class="border px-2 py-1"><?= $row['departemen'] ?></td>
                    <td class="border px-2 py-1"><?= $row['jabatan'] ?></td>
                    <td class="border px-2 py-1"><?= $row['kota_asal'] ?></td>
                    <td class="border px-2 py-1"><?= $row['tanggal_absensi'] ?></td>
                    <td class="border px-2 py-1">
                        <a href="edit.php?id=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>