
<?php

// Memanggil file function
require_once __DIR__ . "/functions.php";

// Menyiapkan variabel
$errors = [];
$mahasiswa = null;

// Memproses data ketika form dikirim menggunakan POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Mengambil data dari form
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = trim($_POST["semester"] ?? "");
    $email = trim($_POST["email"] ?? "");

    $tugasInput = trim($_POST["tugas"] ?? "");
    $utsInput = trim($_POST["uts"] ?? "");
    $uasInput = trim($_POST["uas"] ?? "");

    // Validasi kolom wajib
    if ($nama === "") {
        $errors[] = "Nama wajib diisi.";
    }

    if ($nim === "") {
        $errors[] = "NIM wajib diisi.";
    } elseif (!preg_match("/^[0-9]{10}$/", $nim)) {
        $errors[] = "NIM harus terdiri dari tepat 10 digit angka.";
    }

    if ($prodi === "") {
        $errors[] = "Program studi wajib diisi.";
    }

    // Validasi semester
    if ($semesterInput === "") {
        $errors[] = "Semester wajib diisi.";
    } elseif (
        !ctype_digit($semesterInput) ||
        (int) $semesterInput < 1 ||
        (int) $semesterInput > 14
    ) {
        $errors[] = "Semester harus berupa bilangan bulat antara 1 sampai 14.";
    }

    // Validasi email
    if ($email === "") {
        $errors[] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    // Validasi tiga komponen nilai
    $daftarNilai = [
        "Nilai Tugas" => $tugasInput,
        "Nilai UTS" => $utsInput,
        "Nilai UAS" => $uasInput
    ];

    foreach ($daftarNilai as $label => $nilai) {

        if ($nilai === "") {
            $errors[] = $label . " wajib diisi.";

        } elseif (
            !is_numeric($nilai) ||
            (float) $nilai < 0 ||
            (float) $nilai > 100
        ) {
            $errors[] = $label . " harus berupa angka antara 0 sampai 100.";
        }
    }

    // Memproses data apabila tidak terdapat error
    if (empty($errors)) {

        $tugas = (float) $tugasInput;
        $uts = (float) $utsInput;
        $uas = (float) $uasInput;

        // Menghitung nilai rata-rata
        $nilaiRataRata = ($tugas + $uts + $uas) / 3;

        // Menyimpan ringkasan data mahasiswa
        $mahasiswa = [
            "nama" => $nama,
            "nim" => $nim,
            "prodi" => $prodi,
            "semester" => (int) $semesterInput,
            "email" => $email,
            "tugas" => $tugas,
            "uts" => $uts,
            "uas" => $uas,
            "rata_rata" => $nilaiRataRata
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Data Mahasiswa</title>
</head>

<body>

    <h1>Aplikasi Data Mahasiswa</h1>
    <p>Praktikum Pemrograman Web - PHP</p>

    <hr>

    <h2>Form Input Data Mahasiswa</h2>

    <form method="POST" action="index.php">

        <label for="nama">Nama Lengkap:</label><br>
        <input
            type="text"
            id="nama"
            name="nama"
            required
        >

        <br><br>

        <label for="nim">NIM (10 Digit):</label><br>
        <input
            type="text"
            id="nim"
            name="nim"
            inputmode="numeric"
            minlength="10"
            maxlength="10"
            pattern="[0-9]{10}"
            title="NIM harus terdiri dari tepat 10 digit angka."
            required
        >

        <br><br>

        <label for="prodi">Program Studi:</label><br>
        <input
            type="text"
            id="prodi"
            name="prodi"
            required
        >

        <br><br>

        <label for="semester">Semester:</label><br>
        <input
            type="number"
            id="semester"
            name="semester"
            min="1"
            max="14"
            step="1"
            required
        >

        <br><br>

        <label for="email">Email:</label><br>
        <input
            type="email"
            id="email"
            name="email"
            required
        >

        <hr>

        <h3>Komponen Penilaian</h3>

        <label for="tugas">Nilai Tugas:</label><br>
        <input
            type="number"
            id="tugas"
            name="tugas"
            min="0"
            max="100"
            step="0.01"
            required
        >

        <br><br>

        <label for="uts">Nilai UTS:</label><br>
        <input
            type="number"
            id="uts"
            name="uts"
            min="0"
            max="100"
            step="0.01"
            required
        >

        <br><br>

        <label for="uas">Nilai UAS:</label><br>
        <input
            type="number"
            id="uas"
            name="uas"
            min="0"
            max="100"
            step="0.01"
            required
        >

        <br><br>

        <button type="submit" name="kirim">
            Kirim Data
        </button>

        <button type="reset">
            Reset Form
        </button>

    </form>

    <hr>

    <!-- Menampilkan seluruh pesan kesalahan -->
    <?php if (!empty($errors)) : ?>

        <h2>Terjadi Kesalahan</h2>

        <ul>
            <?php foreach ($errors as $error) : ?>
                <li>
                    <?= htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>


    <!-- Menampilkan ringkasan data apabila valid -->
    <?php if ($mahasiswa !== null) : ?>

        <h2>Ringkasan Data Mahasiswa</h2>

        <p>
            Nama:
            <?= htmlspecialchars($mahasiswa["nama"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <p>
            NIM:
            <?= htmlspecialchars($mahasiswa["nim"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <p>
            Program Studi:
            <?= htmlspecialchars($mahasiswa["prodi"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <p>
            Semester:
            <?= htmlspecialchars((string) $mahasiswa["semester"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <p>
            Email:
            <?= htmlspecialchars($mahasiswa["email"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <h3>Hasil Perhitungan Nilai</h3>

        <p>
            Nilai Tugas:
            <?= number_format($mahasiswa["tugas"], 2, ",", "."); ?>
        </p>

        <p>
            Nilai UTS:
            <?= number_format($mahasiswa["uts"], 2, ",", "."); ?>
        </p>

        <p>
            Nilai UAS:
            <?= number_format($mahasiswa["uas"], 2, ",", "."); ?>
        </p>

        <p>
            <strong>
                Nilai Rata-rata:
                <?= number_format($mahasiswa["rata_rata"], 2, ",", "."); ?>
            </strong>
        </p>

        <hr>

        <p>
            <a href="index.php">Mulai dari Awal</a>
        </p>

    <?php endif; ?>


    <hr>

    <h3>Contoh Function Format Rupiah</h3>

    <p>
        Harga contoh:
        <?= htmlspecialchars(formatRupiah(150000), ENT_QUOTES, "UTF-8"); ?>
    </p>

    <hr>

    <p>
        <a href="cari.php">Buka Halaman Pencarian Mahasiswa (GET)</a>
    </p>

    <footer>
        <p>Praktikum Pemrograman Web - PHP</p>
    </footer>

</body>
</html>
