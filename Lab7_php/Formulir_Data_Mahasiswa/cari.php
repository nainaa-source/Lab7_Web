
<?php

// Array data mahasiswa
$daftarMahasiswa = [
    "Alya Putri",
    "Bima Pratama",
    "Citra Lestari",
    "Doni Saputra",
    "Siti Rahma",
    "Rizky Ramadhan",
    "Nadia Amelia"
];

// Mengambil kata kunci dari URL
$kataKunci = trim($_GET["kata_kunci"] ?? "");

// Menyiapkan array hasil pencarian
$hasilPencarian = [];

// Melakukan pencarian nama
if ($kataKunci !== "") {

    foreach ($daftarMahasiswa as $nama) {

        if (stripos($nama, $kataKunci) !== false) {
            $hasilPencarian[] = $nama;
        }

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Mahasiswa</title>
</head>

<body>

    <h1>Pencarian Data Mahasiswa</h1>

    <p>Praktikum PHP - Metode GET dan Array</p>

    <hr>

    <h2>Form Pencarian</h2>

    <form method="GET" action="cari.php">

        <label for="kata_kunci">Masukkan Nama Mahasiswa:</label><br>

        <input
            type="text"
            id="kata_kunci"
            name="kata_kunci"
            value="<?= htmlspecialchars($kataKunci, ENT_QUOTES, "UTF-8"); ?>"
            placeholder="Contoh: Alya"
            required
        >

        <button type="submit">
            Cari
        </button>

        <button type="reset">
            Reset
        </button>

    </form>

    <hr>

    <?php if (isset($_GET["kata_kunci"])) : ?>

        <h2>Hasil Pencarian</h2>

        <?php if ($kataKunci === "") : ?>

            <p>Masukkan kata kunci pencarian.</p>

        <?php elseif (!empty($hasilPencarian)) : ?>

            <p>
                Ditemukan <?= count($hasilPencarian); ?> mahasiswa:
            </p>

            <ol>

                <?php foreach ($hasilPencarian as $nama) : ?>

                    <li>
                        <?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8"); ?>
                    </li>

                <?php endforeach; ?>

            </ol>

        <?php else : ?>

            <p>Nama mahasiswa tidak ditemukan.</p>

        <?php endif; ?>

    <?php endif; ?>

    <hr>

    <p>
        <a href="index.php">Kembali ke Form Data Mahasiswa</a>
    </p>

</body>
</html>
