<?php
session_start();

// P7: penggunaan POST
$nama = trim((string) ($_POST['nama'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$semesterForm = trim((string) ($_POST['semester'] ?? ''));
$jenisPesan = trim((string) ($_POST['jenis_pesan'] ?? ''));
$prodi = trim((string) ($_POST['prodi'] ?? ''));
$pesan = trim((string) ($_POST['pesan'] ?? ''));
$tanggal = trim((string) ($_POST['tanggal'] ?? ''));
$minat = $_POST['minat'] ?? [];

$pesanKesalahan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (trim($nama ?? '') === '') {
        $pesanKesalahan .= 'Nama lengkap wajib diisi. ';
    }
if (trim($email) === '') {
        $pesanKesalahan .= 'Email wajib diisi. ';
    }
if (trim($semesterForm) === '') {
        $pesanKesalahan .= 'Semester wajib diisi. ';
    }
if (trim($tanggal) === '') {
        $pesanKesalahan .= 'Tanggal kunjungan wajib diisi. ';
    }
if ($jenisPesan === '') {
        $pesanKesalahan .= 'Jenis pesan wajib dipilih. ';
    }
if ($prodi === '') {
        $pesanKesalahan .= 'Program studi wajib dipilih. ';
    }
if (trim($pesan) === '') {
        $pesanKesalahan .= 'Pesan wajib diisi. ';
    }
if (empty($minat)) {
        $pesanKesalahan .= 'Minat wajib dipilih minimal satu. ';
    }
if (trim($semesterForm) !== '') {
        $semesterValid = filter_var(
            $semesterForm,
            FILTER_VALIDATE_INT
    );
if (
        $semesterValid === false ||
        $semesterValid < 1 ||
        $semesterValid > 14
    ) {
        $pesanKesalahan .= 'Semester harus berupa bilangan bulat antara 1 dan 14. ';
    }
}
if (trim($email) !== '') {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $pesanKesalahan .= 'Format email tidak valid. ';
    }
}
if (!in_array($jenisPesan, ['pertanyaan', 'saran'], true)) {
        $pesanKesalahan .= 'Jenis pesan tidak valid. ';
}
if (!in_array($prodi, ['SI', 'TI'], true)) {
        $pesanKesalahan .= 'Program studi tidak valid. ';
}

$minatDiizinkan = ['HTML', 'CSS'];

if (!is_array($minat)) {
    $pesanKesalahan .= 'Format pilihan topik tidak valid. ';
} else {
foreach ($minat as $topik) {
    if (!in_array($topik, $minatDiizinkan, true)) {
     $pesanKesalahan .= 'Pilihan topik tidak valid. ';
        break;
            }
        }
    }
}

// P6: PHP dasar dan pemrograman sisi peladen
// Bagian 1: Variabel dan konstanta
$nim = "2622500022";
$namaMahasiswa = "Yazid Riandi";
$programStudi = "SI";
$tahunAkademik = "2026/2027";
$semester = 2;
$ipk = "3.75";
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "yazid-riandi/2622500022-PWD-SI1J-2627";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else
if ($semester < 3) {
$keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
$keteranganSemester = "Semester menengah";
} else {
$keteranganSemester = "Semester akhir";
}

$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik 
Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {
    case "SI":
      $fokusProgramStudi = "Sistem informasi dan proses bisnis";
      break;
    case "TI":
      $fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
      break;
    default:
      $fokusProgramStudi = "Belum ditentukan";
}

// P7
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['pesanKesalahan'] = $pesanKesalahan;
    $_SESSION['nama'] = $nama;
    $_SESSION['email'] = $email;
    $_SESSION['semester'] = $semesterForm;
    $_SESSION['tanggal'] = $tanggal;
    $_SESSION['jenis_pesan'] = $jenisPesan;
    $_SESSION['prodi'] = $prodi;
    $_SESSION['minat'] = $minat;
    $_SESSION['pesan'] = $pesan;

    header('Location: index.php');
    exit;
}

$pesanKesalahan = $_SESSION['pesanKesalahan'] ?? '';
$nama = $_SESSION['nama'] ?? '';
$email = $_SESSION['email'] ?? '';
$semesterForm = $_SESSION['semester'] ?? '';
$tanggal = $_SESSION['tanggal'] ?? date("Y-m-d");
$jenisPesan = $_SESSION['jenis_pesan'] ?? '';
$prodi = $_SESSION['prodi'] ?? '';
$minat = $_SESSION['minat'] ?? '';
$pesan = $_SESSION['pesan'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Pribadi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- First page -->
    <div class="first-page">
        <h1>UTS PWD GASAL 2026/2027</h1>
        <p>Silahkan klik lanjut di bawah ini</p>
        <a href="#next">Lanjut</a>
    </div>
    
    <!-- Second page -->
     <div class="backgrounds">
            <div class="nama">Made by Yazid Riandi</div>
        </header>
  
        <div class="container">
            <div class="sidebar">
                <h2>MENU</h2>
                    <ul>
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#profile">Profil</a></li>
                        <li><a href="file.php">Pendaftaran</a></li>
                </ul>
            </div>
     <section id="next">
        <div class="content">
                <div class="card">
                    <h2>BERANDA</h2>
                    <p>Perkenalkan, nama saya Yazid Riandi, dengan Nomor Induk Mahasiswa (NIM) 2622500022. Saya merupakan mahasiswa Program Studi Sistem Informasi. Saya lahir di Pangkal Pinang pada tanggal 3 Mei 2007. Saya memiliki semangat untuk terus belajar, mengembangkan kemampuan, serta menambah wawasan, khususnya di bidang teknologi informasi. Saya berharap melalui perkuliahan ini dapat memperoleh ilmu dan pengalaman baru, meningkatkan keterampilan, serta menjadi pribadi yang lebih baik dan mampu meraih cita-cita di masa depan./p>
                </div>
            </div>
  </section>
  <section id="register">
    <div class="card">
                    <h2>PROFILE</h2>
                    <p>Perkenalkan, nama saya Yazid Riandi, dengan Nomor Induk Mahasiswa (NIM) 2622500022. Saya merupakan mahasiswa Program Studi Sistem Informasi. Saya lahir di Pangkal Pinang pada tanggal 3 Mei 2007. Saya memiliki semangat untuk terus belajar, mengembangkan kemampuan, serta menambah wawasan, khususnya di bidang teknologi informasi. Saya berharap melalui perkuliahan ini dapat memperoleh ilmu dan pengalaman baru, meningkatkan keterampilan, serta menjadi pribadi yang lebih baik dan mampu meraih cita-cita di masa depan./p>
                </div>
            </div>           
                </div>
            </div>
        
</body>
</html>
