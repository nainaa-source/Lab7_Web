
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum PHP</title>
</head>
<body>

    <h1>Belajar PHP</h1>
    <hr>

    <!-- PRAKTIKUM 1: Menampilkan Teks dan Waktu Server -->
    <h2>1. Menampilkan Teks dan Waktu Server</h2>

    <?php
        echo "<p>PHP berhasil dijalankan.</p>";
        echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
    ?>

    <hr>

    <!-- PRAKTIKUM 2: Menghitung Nilai Akhir Mahasiswa -->
    <h2>2. Menghitung Nilai Akhir Mahasiswa</h2>

    <?php
        $nama = "Siti";
        $tugas = 85;
        $uts = 78;
        $uas = 90;

        $nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

        if ($nilaiAkhir >= 85) {
            $predikat = "A";
        } elseif ($nilaiAkhir >= 75) {
            $predikat = "B";
        } elseif ($nilaiAkhir >= 60) {
            $predikat = "C";
        } else {
            $predikat = "D";
        }

        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
        echo "Predikat: " . $predikat;
    ?>

    <hr>

    <!-- PRAKTIKUM 3: Menampilkan Array dan Foreach -->
    <h2>3. Daftar Mahasiswa</h2>

    <?php
        $mahasiswa = ["Alya", "Bima", "Citra", "Doni"];

        echo "<ol>";

        foreach ($mahasiswa as $nama) {
            echo "<li>" . htmlspecialchars($nama) . "</li>";
        }

        echo "</ol>";
    ?>

    <hr>

    <!-- PRAKTIKUM 4: Function Menghitung Diskon -->
    <h2>4. Menghitung Harga Setelah Diskon</h2>

    <?php
        function hitungDiskon($harga, $persen) {
            $potongan = $harga * ($persen / 100);
            return $harga - $potongan;
        }

        $hargaAkhir = hitungDiskon(150000, 10);

        echo "Harga awal: Rp150.000<br>";
        echo "Diskon: 10%<br>";
        echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".");
    ?>

    <hr>

    <!-- PRAKTIKUM 5: Form GET -->
    <h2>5. Form Pencarian Menggunakan GET</h2>

    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text">

        <button type="submit">Cari</button>
    </form>

    <?php
        if (isset($_GET["kata"])) {
            $kata = trim($_GET["kata"]);

            echo "<p>Kata kunci: " .
                htmlspecialchars($kata, ENT_QUOTES, "UTF-8") .
                "</p>";
        }
    ?>

    <hr>

    <!-- PRAKTIKUM 6: Form POST -->
    <h2>6. Form Input Data Mahasiswa Menggunakan POST</h2>

    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input id="nama" name="nama" type="text" required>

        <br><br>

        <label for="prodi">Program Studi:</label>
        <input id="prodi" name="prodi" type="text" required>

        <br><br>

        <button type="submit" name="kirim">Kirim Data</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["kirim"])) {
            $nama = trim($_POST["nama"] ?? "");
            $prodi = trim($_POST["prodi"] ?? "");

            if ($nama === "" || $prodi === "") {
                echo "<p>Semua kolom wajib diisi.</p>";
            } else {
                echo "<h3>Data Diterima</h3>";
                echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
                echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8");
            }
        }
    ?>

    <hr>

    <!-- PRAKTIKUM 7: Menghitung Subtotal Belanja -->
    <h2>7. Menghitung Subtotal Belanja</h2>

    <form method="POST" action="">
        <label for="barang">Nama Barang:</label>
        <input id="barang" name="barang" type="text" required>

        <br><br>

        <label for="harga">Harga:</label>
        <input id="harga" name="harga" type="number" min="0" step="0.01" required>

        <br><br>

        <label for="jumlah">Jumlah:</label>
        <input id="jumlah" name="jumlah" type="number" min="1" step="1" required>

        <br><br>

        <button type="submit" name="hitung">Hitung Subtotal</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["hitung"])) {
            $barang = trim($_POST["barang"] ?? "");
            $hargaInput = $_POST["harga"] ?? "";
            $jumlahInput = $_POST["jumlah"] ?? "";

            if (
                $barang === "" ||
                !is_numeric($hargaInput) ||
                !ctype_digit((string)$jumlahInput) ||
                (float)$hargaInput < 0 ||
                (int)$jumlahInput < 1
            ) {
                echo "<p>Periksa kembali nama barang, harga, dan jumlah.</p>";
            } else {
                $harga = (float)$hargaInput;
                $jumlah = (int)$jumlahInput;

                $subtotal = $harga * $jumlah;

                echo "<h3>Hasil Perhitungan</h3>";
                echo "Nama Barang: " . htmlspecialchars($barang, ENT_QUOTES, "UTF-8") . "<br>";
                echo "Harga: Rp" . number_format($harga, 0, ",", ".") . "<br>";
                echo "Jumlah: " . $jumlah . "<br>";
                echo "Subtotal: Rp" . number_format($subtotal, 0, ",", ".");
            }
        }
    ?>

    <hr>

    <footer>
        <p>Praktikum Pemrograman Web - PHP</p>
    </footer>

</body>
</html>
