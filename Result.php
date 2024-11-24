<?php
session_start();
if (!isset($_SESSION['data'])) {
    echo "Tidak ada data yang tersedia.";
    exit;
}

$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title><?php
session_start();
if (!isset($_SESSION['data'])) {
    echo "Tidak ada data yang tersedia.";
    exit;
}

$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?= htmlspecialchars($data['age']) ?></td>
        </tr>
        <tr>
            <td>Kata Sandi</td>
            <td><?= htmlspecialchars($data['password']) ?></td>
        </tr>
        <tr>
            <td>Browser/OS</td>
            <td><?= htmlspecialchars($data['userAgent']) ?></td>
        </tr>
    </table>
    <h2>Isi File:</h2>
    <table>
        <tr>
            <th>Baris</th>
            <th>Isi</th>
        </tr>
        <?php foreach ($data['fileContent'] as $lineNumber => $line): ?>
            <tr>
                <td><?= $lineNumber + 1 ?></td>
                <td><?= htmlspecialchars($line) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?= htmlspecialchars($data['age']) ?></td>
        </tr>
        <tr>
            <td>Kata Sandi</td>
            <td><?= htmlspecialchars($data['password']) ?></td>
        </tr>
        <tr>
            <td>Browser/OS</td>
            <td><?= htmlspecialchars($data['userAgent']) ?></td>
        </tr>
    </table>
    <h2>Isi File:</h2>
    <table>
        <tr>
            <th>Baris</th>
            <th>Isi</th>
        </tr>
        <?php foreach ($data['fileContent'] as $lineNumber => $line): ?>
            <tr>
                <td><?= $lineNumber + 1 ?></td>
                <td><?= htmlspecialchars($line) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
