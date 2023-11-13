<?php
// Informasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uts-kriptografi";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi ke database
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk melakukan enkripsi dengan metode polialfabet
function polyalphabet_cipher_encrypt($plaintext, $key) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $encrypted_text = '';

    for ($i = 0; $i < strlen($plaintext); $i++) {
        $char = $plaintext[$i];
        if (strpos($alphabet, $char) !== false) {
            $char_index = strpos($alphabet, $char);
            $key_char = $key[$char_index % strlen($key)];
            $encrypted_text .= $key_char;
        }
    }

    return $encrypted_text;
}

// Memeriksa apakah ada permintaan POST dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $username = $_POST["username"];
    $password = strtolower($_POST["password"]);

    // Menentukan kunci untuk enkripsi polialfabet
    $kunci = strtolower("UJIAN");
    $abjad = "abcdefghijklmnopqrstuvwxyz";
    $hasil = $kunci . $abjad;
    $key = implode("", array_unique(str_split($hasil)));

    // Melakukan enkripsi password
    $encrypted_password = polyalphabet_cipher_encrypt($password, $key);

    // Menyusun query SQL untuk menyimpan data pengguna baru
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$encrypted_password')";

    // Menjalankan query SQL dan menampilkan pesan hasil
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil! Silakan <a href='login.html'>login</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>
