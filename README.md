# UTS-Kriptografi

# Sistem Keamanan Login dengan Polyalphabetic Cipher

Sistem ini dirancang untuk meningkatkan keamanan pada proses login dengan menerapkan metode dekripsi Polyalphabetic Cipher pada password pengguna. Polyalphabetic Cipher adalah suatu teknik enkripsi yang menggunakan variasi substitusi alfabetik pada posisi yang berbeda dalam teks yang dienkripsi.

## Fitur Utama

1. **Enkripsi Password**: Password pengguna dienkripsi menggunakan Polyalphabetic Cipher sebelum disimpan di database.
2. **Dekripsi Password**: Saat proses login, password dari database didekripsi dengan kunci yang sama untuk verifikasi.
3. **Perlindungan Terhadap Serangan**: Menggunakan Polyalphabetic Cipher untuk menghindari pola dalam penyimpanan password, meningkatkan keamanan terhadap serangan.

## Cara Penggunaan

1. **Registrasi Akun**: Pengguna dapat mendaftarkan akun dengan menentukan username dan password. Password akan dienkripsi sebelum disimpan di database.
2. **Login**: Pengguna dapat login dengan memasukkan username dan password. Password yang dimasukkan akan didekripsi dengan menggunakan kunci yang sesuai sebelum verifikasi.

## Persyaratan Sistem

- PHP
- MySQL atau database lainnya untuk menyimpan informasi pengguna

## Instalasi

1. Clone repositori ini ke server web Anda.
2. Impor struktur tabel database dari file `database.sql`.
3. Sesuaikan koneksi database di file `config.php`.
4. Akses halaman utama dari server web Anda.

## Kontribusi

Kontribusi dan saran sangat dihargai. Silakan buat _issue_ atau _pull request_ untuk memberikan masukan atau peningkatan pada sistem.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
