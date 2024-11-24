<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $age = (int)$_POST['age'];
    $password = htmlspecialchars(trim($_POST['password']));
    $file = $_FILES['file'];

    $errors = [];

    // Validasi data teks
    if (empty($name) || strlen($name) < 3 || strlen($name) > 50) {
        $errors[] = "Nama harus antara 3-50 karakter.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }
    if ($age <= 0) {
        $errors[] = "Umur harus lebih dari 0.";
    }
    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Kata sandi harus lebih dari 6 karakter.";
    }

    // Validasi file
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Terjadi kesalahan saat mengunggah file.";
    } elseif ($file['size'] > 10 * 1024 * 1024) {
        $errors[] = "File terlalu besar. Maksimal 10MB.";
    }

    // Jika ada error, tampilkan pesan kesalahan dan hentikan eksekusi
    if (!empty($errors)) {
        echo "<h3>Kesalahan</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        exit;
    }

    // Baca isi file (hanya jika jenis file mendukung pembacaan teks)
    $fileContent = "File tidak dapat ditampilkan sebagai teks.";
    $rows = [];
    if (mime_content_type($file['tmp_name']) === 'text/plain') {
        $fileContent = file_get_contents($file['tmp_name']);
        $rows = explode(PHP_EOL, $fileContent);
    }

    // Info sistem
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // Simpan data dalam sesi untuk halaman hasil
    session_start();
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'password' => $password,
        'fileContent' => $rows,
        'userAgent' => $userAgent,
        'fileName' => $file['name'],
        'fileSize' => $file['size']
    ];
    header("Location: result.php");
    exit;
}
