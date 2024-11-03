<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "portofolio_reza";
$port = 2526;

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT kegiatan, tanggal, waktu_awal, waktu_akhir FROM jadwal ORDER BY tanggal ASC";
$result = $conn->query($sql);

$output = '<table border="1" class="jadwal-table">
    <tr>
        <th>Kegiatan</th>
        <th>Tanggal</th>
        <th>Waktu Awal</th>
        <th>Waktu Akhir</th>
    </tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>";
        $output .= "<td>" . htmlspecialchars($row['kegiatan']) . "</td>";
        $output .= "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
        $output .= "<td>" . htmlspecialchars($row['waktu_awal']) . "</td>";
        $output .= "<td>" . htmlspecialchars($row['waktu_akhir']) . "</td>";
        $output .= "</tr>"; 
    }
} else {
    $output .= "<tr><td colspan='4'>Tidak ada jadwal yang tersedia.</td></tr>";
}

$output .= "</table>";

echo $output;

$conn->close();
?>
