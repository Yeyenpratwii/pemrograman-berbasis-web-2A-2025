<?php
function getBlogArticles() {
    return [
        1 => [
            'judul' => 'Belajar dari Kegagalan Kunci Menuju Kesuksesan',
            'tanggal' => '2024-04-10',
            'refleksi' => "Belajar dari kegagalan adalah kunci menuju kesuksesan. Kegagalan sering dianggap sebagai musuh utama dalam perjalanan hidup. Namun, pengalaman pribadi menunjukkan bahwa kegagalan adalah salah satu cara terbaik untuk tumbuh. Saat pertama kali gagal dalam ujian semester, dunia terasa hampir runtuh. Namun setelah waktu berlalu, kegagalan membuka mata untuk hal-hal penting dalam hidup.\n\nKegagalan mengajarkan untuk introspeksi dan mencari apa yang kurang dalam persiapan. Dari kegagalan, kita belajar mengatur waktu lebih baik, mencari cara belajar efektif, dan memahami bahwa kegagalan bukan akhir, melainkan awal pembelajaran baru.\n\nTokoh besar seperti Thomas Edison berkata, \"Saya belum gagal. Saya hanya menemukan 10.000 cara yang tidak berhasil.\" Kata-kata ini menginspirasi untuk tidak menyerah, terus mencoba, dan belajar dari setiap pengalaman.\n\nKutipan Inspiratif:\n\"Kegagalan bukanlah akhir dari perjalanan, tetapi justru bagian dari proses yang membentuk kesuksesan.\" — Thomas Edison",
            'gambar' => 'gambar2.png',
            'kutipan' => [
                "Kegagalan bukanlah akhir dari perjalanan, tetapi justru bagian dari proses yang membentuk kesuksesan. - Thomas Edison",
            ],
            'sumber' => 'https://www.buatbuku.com/article/kegagalan-belajar-dari-thomas-edison'
        ],
        2 => [
            'judul' => 'Pentingnya Pendidikan bagi Masa Depan',
            'tanggal' => '2024-05-05',
            'refleksi' => "Pendidikan merupakan cara utama untuk mengatasi kebodohan dan kemiskinan di Indonesia. Dengan mengenyam pendidikan, seseorang dapat memperoleh wawasan luas tentang dunia.\n\nPendidikan dapat diperoleh di mana saja dan kapan saja. Kita harus menyadari pentingnya belajar dalam kehidupan. Pendidikan berdampak besar pada perkembangan masa depan individu dan bangsa.\n\nPendidikan terbagi menjadi formal, non-formal, dan informal. Contoh formal: SD, SMP, SMA, perguruan tinggi. Non-formal: kursus atau bimbingan belajar. Kesungguhan belajar sangat menentukan hasil. Pendidikan yang baik membantu menata masa depan dan berpikir kritis menghadapi masalah hidup.\n\nPendidikan juga berperan mengurangi pengangguran. Dengan memahami nilai pendidikan, seseorang dapat berkontribusi menciptakan lapangan kerja dan membantu pemerintah mengatasi pengangguran. Pendidikan sangat penting untuk masa depan, sehingga kita harus mengaplikasikan nilai-nilai pendidikan dalam kehidupan sehari-hari.\n\nKutipan Inspiratif:\n\"Pendidikan adalah senjata paling ampuh yang dapat kamu gunakan untuk mengubah dunia.\" — Nelson Mandela",
            'gambar' => 'gambar.png',
            'kutipan' => [
                "Pendidikan adalah senjata paling ampuh yang dapat kamu gunakan untuk mengubah dunia. - Nelson Mandela",
            ],
            'sumber' => 'https://dispendik.mojokertokab.go.id/artikel-pentingnya-pendidikan-bagi-masa-depan/'
        ],
    ];
}

function getRandomQuote($quotes) {
    $index = rand(0, count($quotes)-1);
    return $quotes[$index];
}

$articles = getBlogArticles();

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Blog Reflektif</title>
<link rel="stylesheet" href="style.css" />
<style>
  .article-list a {
    display: block;
    margin-bottom: 8px;
    color: #2980b9;
    text-decoration: none;
  }
  .article-list a:hover {
    text-decoration: underline;
  }
  .article {
    border: 1px solid #ddd;
    padding: 15px;
    margin-top: 20px;
    border-radius: 6px;
  }
  .article img {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
    margin-bottom: 10px;
  }
  .quote {
    font-style: italic;
    margin-top: 10px;
    color: #555;
  }
  .source {
    margin-top: 5px;
    font-size: 0.9em;
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
  <h1>Blog Reflektif</h1>

  <div class="article-list">
    <h3>Daftar Artikel:</h3>
    <?php foreach($articles as $key => $art): ?>
      <a href="?id=<?= $key ?>"><?= htmlspecialchars($art['judul']) ?> (<?= $art['tanggal'] ?>)</a>
    <?php endforeach; ?>
  </div>

  <?php if ($id && isset($articles[$id])): 
    $art = $articles[$id];
    $quote = getRandomQuote($art['kutipan']);
  ?>
    <div class="article">
      <h2><?= htmlspecialchars($art['judul']) ?></h2>
      <small>Tanggal Posting: <?= htmlspecialchars($art['tanggal']) ?></small>
      <img src="<?= htmlspecialchars($art['gambar']) ?>" alt="Gambar <?= htmlspecialchars($art['judul']) ?>" />
      <p style="white-space: pre-line;"><?= htmlspecialchars($art['refleksi']) ?></p>
      <p class="quote">"<?= htmlspecialchars($quote) ?>"</p>
      <?php if ($art['sumber']): ?>
        <p class="source">Sumber: <a href="<?= htmlspecialchars($art['sumber']) ?>" target="_blank"><?= htmlspecialchars($art['sumber']) ?></a></p>
      <?php endif; ?>
    </div>
  <?php elseif ($id): ?>
    <p>Artikel tidak ditemukan.</p>
  <?php endif; ?>

  <div class="navbar">
    <a href="halaman1.php">Kembali ke Profil</a>
    <a href="halaman2.php">Menuju Timeline</a>
  </div>
</div>
</body>
</html> 