<?php
function getProfileData() {
    return [
        'nama' => 'Yeyen Pratiwi Suharno Songke',
        'nim' => '240441100068',
        'ttl' => '11 Januari 2006',
        'email' => 'yennprtwi11@gmail.com',
        'hp' => '082144658140',
    ];
}

function displayFormResult($data) {
    echo "<h2>Hasil Input Anda</h2>";
    echo "<table border='1' cellpadding='8' style='border-collapse: collapse; margin-bottom:20px;'>";
    echo "<tr><th>Bahasa Pemrograman yang Dikuasai</th><td>" . implode(", ", $data['bahasa']) . "</td></tr>";
    echo "<tr><th>Pengalaman Proyek Pribadi</th><td>" . nl2br(htmlspecialchars($data['pengalaman'])) . "</td></tr>";
    echo "<tr><th>Software yang Sering Digunakan</th><td>" . implode(", ", $data['software']) . "</td></tr>";
    echo "<tr><th>Sistem Operasi yang Digunakan</th><td>" . htmlspecialchars($data['os']) . "</td></tr>";
    echo "<tr><th>Tingkat Penguasaan PHP</th><td>" . htmlspecialchars($data['php_level']) . "</td></tr>";
    echo "</table>";

    if (count($data['bahasa']) > 2) {
        echo "<p><strong>Anda cukup berpengalaman dalam pemrograman!</strong></p>";
    }
}

$errors = [];
$input = [
    'bahasa' => [],
    'pengalaman' => '',
    'software' => [],
    'os' => '',
    'php_level' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty(trim($_POST['bahasa'] ?? ''))) {
        $errors[] = "Harap isi bahasa pemrograman yang dikuasai.";
    } else {
        $langs = array_filter(array_map('trim', explode(',', $_POST['bahasa'])));
        if (count($langs) == 0) {
            $errors[] = "Harap isi minimal satu bahasa pemrograman.";
        } else {
            $input['bahasa'] = $langs;
        }
    }

    if (empty(trim($_POST['pengalaman'] ?? ''))) {
        $errors[] = "Harap isi pengalaman proyek pribadi.";
    } else {
        $input['pengalaman'] = trim($_POST['pengalaman']);
    }

    if (empty($_POST['software'])) {
        $errors[] = "Harap pilih minimal satu software.";
    } else {
        $input['software'] = $_POST['software'];
    }

    if (empty($_POST['os'])) {
        $errors[] = "Harap pilih sistem operasi.";
    } else {
        $input['os'] = $_POST['os'];
    }

    if (empty($_POST['php_level'])) {
        $errors[] = "Harap pilih tingkat penguasaan PHP.";
    } else {
        $input['php_level'] = $_POST['php_level'];
    }
}

$profile = getProfileData();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Profil Interaktif Mahasiswa</title>
<link rel="stylesheet" href="style.css" />
<style>
  .navbar {
    margin-top: 20px;
  }
  .navbar a {
    margin-right: 15px;
    color: #2980b9;
    text-decoration: none;
  }
  .navbar a:hover {
    text-decoration: underline;
  }
  .form-inline label {
    margin-right: 15px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  table, th, td {
    border: 1px solid #333;
    padding: 8px;
    text-align: left;
  }
  th {
    background-color: #f2f2f2; 
    width: 30%; 
  }
  h1,h2 {
    text-align: center;
  }
  textarea {
    width: 100%;
    max-width: 100%;
    min-width: 100%;
    height: 120px;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 16px;
    box-sizing: border-box;
    resize: vertical; 
  }
  .button {
    background-color: #1e3a8a; /* biru gelap */
    color: white;
    padding: 12px 28px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }
  .button:hover {
    background-color: #1e40af; 
    transform: scale(1.02);
  }
  .button:active {
    background-color: #1e3a8a;
    transform: scale(0.98);
  }
</style>
</head>
<body>
<div class="container">
  <h1>Profil Interaktif Mahasiswa</h1>

  <h2>Data Diri</h2>
  <table>
    <tr><th>Nama</th><td><?= htmlspecialchars($profile['nama']) ?></td></tr>
    <tr><th>NIM</th><td><?= htmlspecialchars($profile['nim']) ?></td></tr>
    <tr><th>Tempat, Tanggal Lahir</th><td><?= htmlspecialchars($profile['ttl']) ?></td></tr>
    <tr><th>Email</th><td><?= htmlspecialchars($profile['email']) ?></td></tr>
    <tr><th>Nomor HP</th><td><?= htmlspecialchars($profile['hp']) ?></td></tr>
  </table>

  <?php if ($errors): ?>
    <div style="color:red; margin-bottom: 15px;">
        <ul>
        <?php foreach($errors as $err) echo "<li>$err</li>"; ?>
        </ul>
    </div>
  <?php endif; ?>

  <form method="post" action="">
    <label>Bahasa Pemrograman yang Dikuasai (pisahkan dengan koma):</label><br>
    <input 
      type="text" 
      name="bahasa" 
      value="<?= htmlspecialchars(is_array($input['bahasa']) ? implode(", ", $input['bahasa']) : '') ?>" 
      style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;"
      placeholder="Contoh: PHP, JavaScript, Python"
    />
    <br><br>

    <label>Penjelasan singkat tentang pengalaman membuat proyek pribadi:</label><br>
    <textarea name="pengalaman" rows="4"><?= htmlspecialchars($input['pengalaman'] ?? '') ?></textarea>

    <br>

    <label>Software yang sering digunakan:</label>
    <div class="form-inline">
      <label><input type="checkbox" name="software[]" value="VS Code" <?= in_array('VS Code', $input['software'] ?? []) ? 'checked' : '' ?> /> VS Code</label>
      <label><input type="checkbox" name="software[]" value="XAMPP" <?= in_array('XAMPP', $input['software'] ?? []) ? 'checked' : '' ?> /> XAMPP</label>
      <label><input type="checkbox" name="software[]" value="Git" <?= in_array('Git', $input['software'] ?? []) ? 'checked' : '' ?> /> Git</label>
      <label><input type="checkbox" name="software[]" value="Postman" <?= in_array('Postman', $input['software'] ?? []) ? 'checked' : '' ?> /> Postman</label>
    </div>

    <br>

    <label>Sistem Operasi yang digunakan:</label>
    <div class="form-inline">
      <label><input type="radio" name="os" value="Windows" <?= ($input['os'] ?? '') === 'Windows' ? 'checked' : '' ?> /> Windows</label>
      <label><input type="radio" name="os" value="Linux" <?= ($input['os'] ?? '') === 'Linux' ? 'checked' : '' ?> /> Linux</label>
      <label><input type="radio" name="os" value="Mac" <?= ($input['os'] ?? '') === 'Mac' ? 'checked' : '' ?> /> Mac</label>
    </div>

    <br>

    <label>Tingkat Penguasaan PHP:</label>
    <select name="php_level">
      <option value="">--Pilih--</option>
      <option value="Pemula" <?= ($input['php_level'] ?? '') === 'Pemula' ? 'selected' : '' ?>>Pemula</option>
      <option value="Menengah" <?= ($input['php_level'] ?? '') === 'Menengah' ? 'selected' : '' ?>>Menengah</option>
      <option value="Mahir" <?= ($input['php_level'] ?? '') === 'Mahir' ? 'selected' : '' ?>>Mahir</option>
    </select>

    <br><br>
    <button type="submit" class="button">Submit</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$errors) {
      displayFormResult($input);
  }
  ?>

  <div class="navbar">
    <a href="halaman2.php">Menuju Timeline</a>
    <a href="halaman3.php">Menuju Blog</a>
  </div>
</div>
</body>
</html>
