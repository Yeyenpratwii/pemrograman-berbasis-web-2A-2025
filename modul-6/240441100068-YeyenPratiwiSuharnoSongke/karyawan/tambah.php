<!-- tambah.php -->
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../akun/login.php");
    exit;
}

require_once '../config/db.php';

if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jk = $_POST['jenis_kelamin'];
    $dept = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];
    $kota = $_POST['kota_asal'];

    $query = "INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal) 
              VALUES ('$nip', '$nama', '$umur', '$jk', '$dept', '$jabatan', '$kota')";
    mysqli_query($conn, $query);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 p-10">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-lg mx-auto">
        <h2 class="text-2xl font-bold mb-4">Tambah Karyawan</h2>
        <form method="POST" class="space-y-3">
            <input name="nip" placeholder="NIP" required class="w-full border px-3 py-2 rounded">
            <input name="nama" placeholder="Nama" required class="w-full border px-3 py-2 rounded">
            <input name="umur" type="number" placeholder="Umur" required class="w-full border px-3 py-2 rounded">
            <select name="jenis_kelamin" required class="w-full border px-3 py-2 rounded">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input name="departemen" placeholder="Departemen" required class="w-full border px-3 py-2 rounded">
            <input name="jabatan" placeholder="Jabatan" required class="w-full border px-3 py-2 rounded">
            <input name="kota_asal" placeholder="Kota Asal" required class="w-full border px-3 py-2 rounded">
            <button name="simpan" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
        </form>
    </div>
</body>
</html>