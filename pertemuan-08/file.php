
<?php
$file = "data.json";
$pesan = "";
$status = "";
$hasilData = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $semester = trim($_POST['semester'] ?? '');
    $tanggal = $_POST['tanggal'] ?? '';
    $jenis = $_POST['jenis'] ?? '';
    $topik = $_POST['topik'] ?? [];
    $program = $_POST['program'] ?? '';
    $isiPesan = trim($_POST['pesan'] ?? '');

    $jenisValid = ['Pertanyaan', 'Saran'];
    $programValid = [
        'Teknik Informatika',
        'Sistem Informasi',
        'Manajemen Informatika',
        'Teknik Komputer'
    ];

    if (
        $nama == '' ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        !filter_var($semester, FILTER_VALIDATE_INT) ||
        $semester < 1 || $semester > 14 ||
        !in_array($jenis, $jenisValid, true) ||
        !is_array($topik) ||
        count(array_diff($topik, ['HTML', 'CSS'])) > 0 ||
        !in_array($program, $programValid, true) ||
        $isiPesan == '' ||
        !preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)
    ) {
        $pesan = "Mohon isi semua data dengan benar!";
        $status = "error";

    } else {

        $data = json_decode(file_get_contents($file), true);

        if (!is_array($data)) {
            $data = [];
        }

        $hasilData = [
            "nama" => $nama,
            "email" => $email,
            "semester" => $semester,
            "tanggal" => $tanggal,
            "jenis" => $jenis,
            "topik" => $topik,
            "program" => $program,
            "pesan" => $isiPesan,
            "waktu_daftar" => date("Y-m-d H:i:s")
        ];

        $data[] = $hasilData;

        if (file_put_contents(
            $file,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        ) !== false) {
            $pesan = "Data berhasil dikirim!";
            $status = "success";
        } else {
            $pesan = "Gagal menyimpan data!";
            $status = "error";
            $hasilData = null;
        }
    }
}

function aman($nilai) {
    return htmlspecialchars((string)$nilai, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Kontak</title>
<link rel="stylesheet" href="StyleFile.css">
</head>

<body>

<div class="container">

    <div class="header">
        <div class="icon">✉</div>
        <h1>Form Kontak</h1>
        <p>Silakan isi formulir berikut dengan lengkap</p>
    </div>

    <?php if ($pesan != ""): ?>
        <div class="alert <?= aman($status) ?>">
            <?= aman($pesan) ?>
        </div>
    <?php endif; ?>

    <!-- FORM PENDAFTARAN -->
    <form method="POST" action="">

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama"
            placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"
            placeholder="nama@email.com" required>
        </div>

        <div class="form-group">
            <label>Semester</label>
            <input type="number" name="semester"
            placeholder="Contoh: 2" min="1" max="14" required>
        </div>

        <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal" required>
        </div>

        <div class="form-group">
            <label>Jenis Pesan</label>
            <div class="option">
                <label>
                    <input type="radio" name="jenis"
                    value="Pertanyaan" required> Pertanyaan
                </label>

                <label>
                    <input type="radio" name="jenis"
                    value="Saran"> Saran
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Topik yang Diminati</label>
            <div class="option">
                <label>
                    <input type="checkbox" name="topik[]"
                    value="HTML"> HTML
                </label>

                <label>
                    <input type="checkbox" name="topik[]"
                    value="CSS"> CSS
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Program Studi</label>
            <select name="program" required>
                <option value="">-- Pilih Program Studi --</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Manajemen Informatika">Manajemen Informatika</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
            </select>
        </div>

        <div class="form-group">
            <label>Pesan</label>
            <textarea name="pesan"
            placeholder="Tuliskan pesan Anda di sini..."
            required></textarea>
        </div>

        <div class="buttons">
            <button type="submit">Kirim</button>
            <button type="reset" class="reset">Batal</button>
        </div>

    </form>

    <!-- HASIL PENDAFTARAN -->
    <?php if ($hasilData !== null): ?>

    <div class="hasil">

        <h2>Data yang Diterima</h2>

        <div class="hasil-item">
            <strong>Nama:</strong>
            <?= aman($hasilData['nama']) ?>
        </div>

        <div class="hasil-item">
            <strong>Email:</strong>
            <?= aman($hasilData['email']) ?>
        </div>

        <div class="hasil-item">
            <strong>Semester:</strong>
            <?= aman($hasilData['semester']) ?>
        </div>

        <div class="hasil-item">
            <strong>Tanggal Kunjungan:</strong>
            <?= aman($hasilData['tanggal']) ?>
        </div>

        <div class="hasil-item">
            <strong>Jenis Pesan:</strong>
            <?= aman($hasilData['jenis']) ?>
        </div>

        <div class="hasil-item">
            <strong>Program Studi:</strong>
            <?= aman($hasilData['program']) ?>
        </div>

        <div class="hasil-item">
            <strong>Minat:</strong>

            <?php if (!empty($hasilData['topik'])): ?>
                <?= aman(implode(", ", $hasilData['topik'])) ?>
            <?php else: ?>
                Tidak ada minat yang dipilih.
            <?php endif; ?>
        </div>

        <div class="hasil-item">
            <strong>Pesan:</strong>
            <p><?= nl2br(aman($hasilData['pesan'])) ?></p>
        </div>

        <div class="success-label">
            ✓ Data berhasil diterima!
        </div>

    </div>

    <?php endif; ?>

    <div class="footer">
        © 2026 Form Kontak | Dibuat dengan PHP
    </div>

</div>

</body>
</html>
