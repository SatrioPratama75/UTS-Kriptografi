<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uts-kriptografi";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi database
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk mendekripsi teks dengan metode polialfabet
function polyalphabet_cipher_decrypt($encrypted_text, $key) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $decrypted_text = '';

    for ($i = 0; $i < strlen($encrypted_text); $i++) {
        $char = $encrypted_text[$i];
        if (strpos($key, $char) !== false) {
            $key_char = strpos($key, $char);
            $plaintext_char = $alphabet[$key_char];
            $decrypted_text .= $plaintext_char;
        }
    }
    return $decrypted_text;
}

// Memeriksa jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = $_POST["username"];
    $password = strtolower($_POST["password"]);

    // Membuat kunci untuk enkripsi/dekripsi
    $kunci = strtolower("UJIAN");
    $abjad = "abcdefghijklmnopqrstuvwxyz";
    $hasil = $kunci . $abjad;
    $key = implode("", array_unique(str_split($hasil)));

    // Query untuk mengambil data user berdasarkan username
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    // Memeriksa apakah user ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row["password"];

        // Dekripsi password dari database
        $decrypted_password = polyalphabet_cipher_decrypt($stored_password, $key);

        // Memeriksa kecocokan password
        if ($password == $decrypted_password) {
            // Redirect ke halaman utama jika login berhasil
            header("Location: menu_utama.html");
            exit();
        } else {
            // Menampilkan pesan jika password tidak cocok
            echo "Login gagal. Password tidak cocok. Kembali ke halaman <a href='login.html'>login</a>.";
        }
    } else {
        // Menampilkan pesan jika username tidak ditemukan
        echo "Login gagal. Username tidak ditemukan.";
    }
}

// Menutup koneksi database
$conn->close();
?>
