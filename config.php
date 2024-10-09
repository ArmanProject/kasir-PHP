<?php
// Konfigurasi Koneksi Database
$host = 'localhost';
$dbname = 'kasir_db';
$username = 'root';
$password = '';

// Membuat koneksi ke MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pengaturan Umum Aplikasi
$site_name = 'Kasir';
$version = '1.0.0';
$admin_email = 'maulanaarman.261219@gmail.com';

// Definisi Path
define('BASE_URL', 'http://localhost/myapp/');
define('UPLOADS_PATH', '/path/to/uploads/');
define('TEMPLATES_PATH', '/path/to/templates/');

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Memulai session (jika diperlukan)
session_start();
?>
