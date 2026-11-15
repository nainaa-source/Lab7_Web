[laporan_praktikum_naina_khuzayma.md](https://github.com/user-attachments/files/34873900/laporan_praktikum_naina_khuzayma.md)
# LAPORAN PRAKTIKUM PEMROGRAMAN WEB
**DASAR-DASAR PEMROGRAMAN PHP**

Disusun untuk memenuhi tugas mata kuliah: **Pemrograman WEB**

| Keterangan | Detail |
| :--- | :--- |
| **Nama** | Naina Khuzayma |
| **NIM** | 312510153 |
| **Program Studi** | Teknik Informatika |
| **Fakultas** | Teknik |
| **Dosen Pengampu** | Agung Nugroho, S.Kom., M.Kom. |
| **Institusi** | Universitas Pelita Bangsa, Bekasi — 2026 |

---

## IDENTITAS DAN INFORMASI PRAKTIKUM

| Informasi | Detail |
| :--- | :--- |
| **Mata Kuliah** | Pemrograman WEB |
| **Topik Praktikum** | Dasar-Dasar Pemrograman PHP |
| **Tanggal Praktikum** | 15 November 2026 |
| **Nama Praktikan** | Naina Khuzayma |
| **NIM** | 312510153 |
| **Kelas** | I253C |

---

## 1. TUJUAN PRAKTIKUM
1. Memahami dasar penggunaan bahasa pemrograman PHP dalam pengembangan web.
2. Mengetahui cara menggabungkan HTML dengan PHP dalam satu halaman web.
3. Memahami penggunaan variabel, operator aritmatika, dan percabangan `if-else`.
4. Memahami penggunaan array dan perulangan `foreach`.
5. Mempelajari pembuatan fungsi (`function`) untuk melakukan perhitungan.
6. Memahami penggunaan metode `GET` dan `POST` untuk mengirimkan data melalui formulir.
7. Mempelajari validasi input dan menampilkan hasil pengolahan data menggunakan PHP.
8. Mengetahui cara menjalankan aplikasi PHP menggunakan server lokal.

## 2. PERANGKAT YANG DIGUNAKAN

| No. | Perangkat | Keterangan |
| :---: | :--- | :--- |
| 1 | Laptop/Komputer | Perangkat untuk menulis dan menjalankan program. |
| 2 | Windows | Sistem operasi komputer. |
| 3 | Visual Studio Code | Editor untuk membuat dan mengedit kode PHP. |
| 4 | XAMPP | Paket server lokal yang menyediakan Apache dan PHP. |
| 5 | Apache | Web server untuk memproses permintaan halaman lokal. |
| 6 | Google Chrome | Browser untuk menampilkan hasil program. |
| 7 | PHP | Bahasa pemrograman yang digunakan dalam praktikum. |

## 3. CARA MENJALANKAN SERVER LOKAL
1. Instal XAMPP pada komputer apabila belum tersedia.
2. Buka aplikasi **XAMPP Control Panel**.
3. Pada bagian **Apache**, klik tombol **Start**. Pastikan status Apache berubah menjadi **Running**.
4. Buka Visual Studio Code dan pilih **File > Open Folder**.
5. Buka folder proyek `praktikum-php` yang berada di dalam folder `htdocs`.
6. Pastikan file program tersimpan dengan nama `index.php`.
7. Buka browser dan masukkan alamat `http://localhost/praktikum-php/`.
8. Halaman praktikum akan tampil apabila Apache aktif dan file tersimpan pada lokasi yang benar.

> **DOKUMENTASI OUTPUT:**
> * *Gambar 1: XAMPP Control Panel dalam keadaan Running*
> * *Gambar 2: Tampilan keseluruhan halaman web "Belajar PHP" pada browser*

## 4. STRUKTUR FILE
Seluruh materi praktikum pada laporan ini digabungkan ke dalam satu file utama bernama `index.php`. File diletakkan di dalam folder proyek pada direktori `htdocs` milik XAMPP.

```text
C:\xampp\htdocs\praktikum-php\
└── index.php
```

| Direktori / File | Keterangan |
| :--- | :--- |
| `htdocs` | Folder utama untuk menyimpan aplikasi web XAMPP. |
| `praktikum-php` | Folder proyek praktikum PHP. |
| `index.php` | File utama yang berisi kode HTML dan PHP untuk seluruh materi praktikum. |

> **DOKUMENTASI OUTPUT:**
> * *Gambar 3: Susunan folder proyek di Visual Studio Code*

---

## 5. PEMBAHASAN DAN HASIL PRAKTIKUM

### 5.1 Menampilkan Teks dan Waktu Server
**Tujuan:** Menampilkan teks dan tanggal/waktu server pada halaman web menggunakan perintah `echo` dan fungsi `date()`.

**A. Potongan Kode Program**
```php
<?php
    echo "<p>PHP berhasil dijalankan.</p>";
    echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
?>
```

**B. Penjelasan Kode**
* `echo` digunakan untuk menampilkan teks atau nilai ke halaman web.
* `date("d-m-Y H:i:s")` menampilkan tanggal, bulan, tahun, jam, menit, dan detik berdasarkan waktu server.
* Tanda titik (`.`) digunakan untuk menggabungkan teks dengan hasil fungsi `date()`.

**C. Output Hasil Eksekusi**
```text
Belajar PHP

1. Menampilkan Teks dan Waktu Server
PHP berhasil dijalankan.
Waktu server: 15-11-2026 02:45:59
```
**Penjelasan output:** Program menampilkan judul halaman **Belajar PHP**, pesan bahwa PHP berhasil dijalankan, serta waktu server aktual saat diakses (`15-11-2026 02:45:59`).

---

### 5.2 Menghitung Nilai Akhir Mahasiswa
**Tujuan:** Menghitung nilai akhir mahasiswa berdasarkan bobot tugas, UTS, dan UAS, kemudian menentukan predikat menggunakan percabangan.

**A. Potongan Kode Program**
```php
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
```

**B. Penjelasan Kode**
* Variabel menyimpan nama dan nilai tugas, UTS, serta UAS.
* Nilai akhir dihitung dengan bobot tugas $30\%$, UTS $30\%$, dan UAS $40\%$.
* `if`, `elseif`, dan `else` menentukan predikat berdasarkan rentang nilai.
* `htmlspecialchars()` membantu mengamankan teks yang ditampilkan, sedangkan `number_format()` mengatur tampilan dua angka desimal.

**C. Output Hasil Eksekusi**
```text
2. Menghitung Nilai Akhir Mahasiswa
Nama: Siti
Nilai akhir: 84.90
Predikat: B
```
**Penjelasan output:** Nilai akhir Siti adalah `84.90`. Berdasarkan aturan pada kode, nilai tersebut termasuk predikat **B** karena berada pada rentang $\ge 75$ dan $< 85$.

---

### 5.3 Menampilkan Daftar Mahasiswa dengan Array dan Foreach
**Tujuan:** Menyimpan beberapa nama dalam array dan menampilkannya secara berurutan menggunakan perulangan `foreach`.

**A. Potongan Kode Program**
```php
<?php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni"];

echo "<ol>";
foreach ($mahasiswa as $nama) {
    echo "<li>" . htmlspecialchars($nama) . "</li>";
}
echo "</ol>";
?>
```

**B. Penjelasan Kode**
* Array `$mahasiswa` menyimpan empat nama dalam satu variabel.
* `foreach` membaca setiap elemen array secara bergantian.
* Tag HTML `<ol>` membuat daftar bernomor, sedangkan `<li>` membuat item daftar.
* `htmlspecialchars()` digunakan saat menampilkan isi variabel sebagai teks HTML.

**C. Output Hasil Eksekusi**
```text
3. Daftar Mahasiswa
1. Alya
2. Bima
3. Citra
4. Doni
```
**Penjelasan output:** Program berhasil menampilkan empat nama mahasiswa dalam bentuk daftar bernomor. Urutan daftar mengikuti urutan data di dalam array.

---

### 5.4 Menghitung Harga Setelah Diskon dengan Function
**Tujuan:** Membuat fungsi yang menerima harga dan persentase diskon, lalu mengembalikan harga setelah diskon.

**A. Potongan Kode Program**
```php
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
```

**B. Penjelasan Kode**
* `function hitungDiskon()` mendefinisikan fungsi dengan parameter harga dan persen.
* Variabel `$potongan` menghitung nilai diskon dari harga awal.
* `return` mengembalikan harga setelah dikurangi potongan.
* `number_format()` menampilkan angka dengan pemisah ribuan titik.

**C. Output Hasil Eksekusi**
```text
4. Menghitung Harga Setelah Diskon
Harga awal: Rp150.000
Diskon: 10%
Harga setelah diskon: Rp135.000
```
**Penjelasan output:** Diskon $10\%$ dari Rp150.000 adalah Rp15.000. Setelah dikurangi potongan tersebut, harga akhir menjadi `Rp135.000`.

---

### 5.5 Form Pencarian Menggunakan GET
**Tujuan:** Menerima kata kunci dari formulir dan menampilkannya kembali menggunakan metode `GET`.

**A. Potongan Kode Program**
```php
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
```

**B. Penjelasan Kode**
* `method="GET"` mengirim data melalui parameter URL.
* `name="kata"` menjadi nama parameter yang dibaca oleh PHP.
* `isset()` memeriksa apakah parameter kata tersedia.
* `trim()` menghapus spasi di awal dan akhir teks.
* `htmlspecialchars()` mengamankan teks sebelum ditampilkan pada halaman.

**C. Output Hasil Eksekusi**
```text
5. Form Pencarian Menggunakan GET
Kata kunci: [          ] [Cari]
```
**Penjelasan output:** Halaman menampilkan form pencarian dengan kolom input `Kata kunci:` dan tombol `Cari`. Ketika pengguna mengetik kata kunci dan menekan tombol `Cari`, browser mengirimkan parameter `kata` melalui URL dan PHP menampilkannya kembali pada halaman.

---

### 5.6 Form Input Data Mahasiswa Menggunakan POST
**Tujuan:** Menerima data nama dan program studi melalui formulir `POST`, memeriksa kelengkapan data, lalu menampilkan hasilnya.

**A. Potongan Kode Program**
```php
<form method="POST" action="">
    <label for="nama">Nama:</label>
    <input id="nama" name="nama" type="text" required>

    <label for="prodi">Program Studi:</label>
    <input id="prodi" name="prodi" type="text" required>

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
```

**B. Penjelasan Kode**
* `method="POST"` mengirim data melalui isi permintaan HTTP, bukan sebagai parameter URL.
* `$_SERVER["REQUEST_METHOD"]` memeriksa metode permintaan yang digunakan.
* `$_POST` mengambil nilai nama dan program studi dari formulir.
* `required` membantu memeriksa input di sisi browser, sedangkan pemeriksaan PHP memvalidasi data kembali di sisi server.
* `htmlspecialchars()` mengamankan nilai sebelum ditampilkan.

**C. Output Hasil Eksekusi**
```text
6. Form Input Data Mahasiswa Menggunakan POST
Nama: [          ]
Program Studi: [          ]
[Kirim Data]
```
**Penjelasan output:** Program menyediakan dua kolom input (`Nama` dan `Program Studi`) serta tombol `Kirim Data`. Jika kedua kolom terisi saat dikirim, halaman akan menampilkan bagian **Data Diterima** beserta nama dan program studi yang diinputkan.

---

### 5.7 Menghitung Subtotal Belanja
**Tujuan:** Menerima data nama barang, harga, dan jumlah pembelian, melakukan validasi, lalu menghitung subtotal belanja.

**A. Potongan Kode Program**
```php
<?php
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
?>
```

**B. Penjelasan Kode**
* Data barang, harga, dan jumlah diambil dari variabel `POST`.
* `is_numeric()` memeriksa apakah harga berupa angka.
* `ctype_digit()` memeriksa apakah jumlah berisi digit bilangan bulat.
* Percabangan memeriksa nama barang, harga tidak negatif, dan jumlah minimal satu.
* Subtotal dihitung dengan rumus `harga * jumlah`.

**C. Output Hasil Eksekusi**
```text
7. Menghitung Subtotal Belanja
Nama Barang: [          ]
Harga: [          ]
Jumlah: [          ]
[Hitung Subtotal]

Praktikum Pemrograman Web - PHP
```
**Penjelasan output:** Halaman menampilkan formulir input barang (`Nama Barang`, `Harga`, `Jumlah`) serta tombol `Hitung Subtotal`. Apabila data diisi dengan benar dan tombol ditekan, program akan menghitung dan menampilkan subtotal belanja.

---

## 6. RINGKASAN HASIL PRAKTIKUM

| No. | Materi | Ringkasan Hasil |
| :---: | :--- | :--- |
| 1 | Echo dan Date | Menampilkan pesan dan waktu server (`15-11-2026 02:45:59`). |
| 2 | If-Else | Menghitung nilai akhir (`84.90`) dan menentukan predikat mahasiswa (`B`). |
| 3 | Array dan Foreach | Menampilkan daftar bernomor empat nama mahasiswa (Alya, Bima, Citra, Doni). |
| 4 | Function | Menghitung harga setelah diskon $10\%$ dari Rp150.000 menjadi Rp135.000. |
| 5 | GET | Menampilkan form dan memproses kata kunci melalui URL. |
| 6 | POST | Menampilkan form dan memproses input data mahasiswa. |
| 7 | Validasi dan Aritmatika | Menampilkan form, memvalidasi data barang, dan menghitung subtotal belanja. |

## 7. KESIMPULAN
Berdasarkan praktikum yang telah dilakukan, dapat disimpulkan bahwa PHP dapat digunakan untuk mengolah data dan menghasilkan halaman web yang dinamis. Materi praktikum mencakup penggunaan variabel, operator aritmatika, percabangan, array, perulangan, fungsi, formulir `GET` dan `POST`, serta validasi input.

Penggunaan XAMPP sebagai server lokal memudahkan proses pengujian program PHP melalui browser tanpa harus mengunggah file ke hosting. Seluruh materi pada praktikum ini dapat disimpan dalam satu file `index.php` dan dijalankan melalui alamat `localhost`.
