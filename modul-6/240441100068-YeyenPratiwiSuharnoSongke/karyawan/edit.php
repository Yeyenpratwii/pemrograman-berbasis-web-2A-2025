<!-- edit.php -->
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../akun/login.php");
    exit;
}

require_once '../config/db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM karyawan_absensi WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jk = $_POST['jenis_kelamin'];
    $dept = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];
    $kota = $_POST['kota_asal'];
    $tanggal = $_POST['tanggal_absensi'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_pulang'];

    $query = "UPDATE karyawan_absensi SET 
              nip='$nip', nama='$nama', umur='$umur', jenis_kelamin='$jk',
              departemen='$dept', jabatan='$jabatan', kota_asal='$kota',
              tanggal_absensi='$tanggal', jam_masuk='$jam_masuk', jam_pulang='$jam_pulang'
              WHERE id = $id";

    mysqli_query($conn, $query);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100 p-10">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-lg mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Data Absensi</h2>
        <form method="POST" class="space-y-3">
            <input name="nip" value="<?= $data['nip'] ?>" required class="w-full border px-3 py-2 rounded" placeholder="NIP">
            <input name="nama" value="<?= $data['nama'] ?>" required class="w-full border px-3 py-2 rounded" placeholder="Nama">
            <input name="umur" type="number" value="<?= $data['umur'] ?>" required class="w-full border px-3 py-2 rounded" placeholder="Umur">
            <select name="jenis_kelamin" required class="w-full border px-3 py-2 rounded">
                <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
            <input name="departemen" value="<?= $data['departemen'] ?>" required class="w-full border px-3 py-2 rounded" placeholder="Departemen">
            <input name="jabatan" value="<?= $data['jabatan'] ?>" required class="w-full border px-3 py-2 rounded" placeholder="Jabatan">
            <input name="kota_asal" value="<?= $data['kota_asal'] ?>" required class="w-full border px-3 py-2 rounded" placeholder="Kota Asal">

            <!-- Tanggal & Waktu -->
            <input type="date" name="tanggal_absensi" value="<?= $data['tanggal_absensi'] ?>" required class="w-full border px-3 py-2 rounded">
            <input type="time" name="jam_masuk" value="<?= $data['jam_masuk'] ?>" required class="w-full border px-3 py-2 rounded">
            <input type="time" name="jam_pulang" value="<?= $data['jam_pulang'] ?>" required class="w-full border px-3 py-2 rounded">

            <button name="update" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
        </form>
    </div>
</body>
</html>