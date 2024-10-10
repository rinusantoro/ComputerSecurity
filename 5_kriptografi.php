<?php
// Fungsi untuk enkripsi teks menggunakan str_replace dengan placeholder sementara
function customEncrypt($plaintext) {
    // Daftar huruf asli
    $search = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
               'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
               'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
               'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    // Daftar huruf pengganti
    $replace = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 
                'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm',
                'Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D',
                'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];

    // Gunakan placeholder sementara
    $placeholder = [];
    foreach ($search as $index => $char) {
        $placeholder[] = "__{$index}__"; // Buat placeholder unik
    }

    // Ganti huruf asli dengan placeholder sementara
    $temp_text = str_replace($search, $placeholder, $plaintext);
    // Ganti placeholder dengan huruf pengganti
    $encrypted = str_replace($placeholder, $replace, $temp_text);

    return $encrypted;
}

// Fungsi untuk dekripsi teks menggunakan str_replace dengan placeholder sementara
function customDecrypt($ciphertext) {
    // Daftar huruf asli
    $search = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
               'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
               'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
               'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    // Daftar huruf pengganti
    $replace = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 
                'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm',
                'Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D',
                'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];

    // Gunakan placeholder sementara
    $placeholder = [];
    foreach ($search as $index => $char) {
        $placeholder[] = "__{$index}__"; // Buat placeholder unik
    }

    // Ganti huruf pengganti dengan placeholder sementara
    $temp_text = str_replace($replace, $placeholder, $ciphertext);
    // Ganti placeholder dengan huruf asli
    $decrypted = str_replace($placeholder, $search, $temp_text);

    return $decrypted;
}

// Membaca input dari keyboard
echo "Masukkan teks yang ingin dienkripsi: ";
$original_text = trim(fgets(STDIN)); // trim() untuk menghapus karakter spasi dan newline
echo "Teks asli: " . $original_text . "\n";

// Enkripsi teks
$encrypted_text = customEncrypt($original_text);
echo "Teks terenkripsi: " . $encrypted_text . "\n";

// Dekripsi teks
$decrypted_text = customDecrypt($encrypted_text);
echo "Teks setelah dekripsi: " . $decrypted_text . "\n";

?>
