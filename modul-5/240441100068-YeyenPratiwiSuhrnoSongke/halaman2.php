<?php
function getTimelineData() {
    return [
        ['year' => 'Agustus 2024', 'event' => 'Ospek Awal masuk kuliah.'],
        ['year' => 'November 2024', 'event' => 'Kepanitiaan MAKASI 24. Berperan sebagai MC non-formal di acara MAKASI 24. Pengalaman pertama menjadi pembawa acara di lingkungan kampus, belajar berbicara di depan umum dengan gaya santai namun tetap menghormati suasana acara. Kegiatan ini membangun rasa percaya diri dan kemampuan komunikasi.'],
        ['year' => 'Desember 2024', 'event' => 'Kepanitiaan ISC.'],
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Timeline Pengalaman Kuliah</title>
<link rel="stylesheet" href="style.css" />
<style>
  .timeline {
    position: relative;
    margin: 20px 0;
    padding-left: 30px;
    border-left: 3px solid #2c3e50;
  }
  .timeline-item {
    margin-bottom: 25px;
    padding-left: 15px;
    position: relative;
  }
  .timeline-item::before {
    content: '';
    position: absolute;
    left: -15px;
    top: 5px;
    width: 12px;
    height: 12px;
    background: #2980b9;
    border-radius: 50%;
  }
  .timeline-year {
    font-weight: bold;
    color: #2980b9;
  }

  h1,h2 {
    text-align: center;
  }
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
</style>
</head>
<body>
<div class="container">
  <h1>Timeline Pengalaman Kuliah</h1>
  <div class="timeline">
    <?php
    $timeline = getTimelineData();
    foreach ($timeline as $item) {
        echo "<div class='timeline-item'>";
        echo "<div class='timeline-year'>{$item['year']}</div>";
        echo "<div class='timeline-event'>{$item['event']}</div>";
        echo "</div>";
    }
    ?>
  </div>

  <div class="navbar">
    <a href="halaman1.php">Kembali ke Profil</a>
    <a href="halaman3.php">Menuju Blog</a>
  </div>
</div>
</body>
</html>
