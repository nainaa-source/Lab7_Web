
<?php

// Function untuk mengubah angka menjadi format Rupiah
function formatRupiah($angka)
{
    return "Rp" . number_format((float) $angka, 0, ",", ".");
}

?>
