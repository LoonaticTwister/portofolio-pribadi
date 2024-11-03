<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Kegiatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        form input[type="text"],
        form input[type="date"],
        form input[type="time"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .message {
            color: green;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
include 'config.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kegiatan = $_POST['kegiatan'];
    $tanggal = $_POST['tanggal'];
    $waktu_awal = $_POST['waktu_awal'];
    $waktu_akhir = $_POST['waktu_akhir'];

    $sql = "INSERT INTO jadwal (kegiatan, tanggal, waktu_awal, waktu_akhir) VALUES ('$kegiatan', '$tanggal', '$waktu_awal', '$waktu_akhir')";

    if ($conn->query($sql) === TRUE) {
        $message = "Data berhasil ditambahkan.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Tambah Jadwal Kegiatan</h2>
<form method="post">
    Kegiatan: <input type="text" name="kegiatan" required><br>
    Tanggal: <input type="date" name="tanggal" required><br>
    Waktu Awal: <input type="time" name="waktu_awal" required><br>
    Waktu Akhir: <input type="time" name="waktu_akhir" required><br>
    <button type="submit">Tambah</button>
</form>

<?php if ($message) { ?>
    <div class="message"><?php echo $message; ?></div>
<?php } ?>

</body>
</html>
