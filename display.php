<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Dokter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../tie_uts/css/bootstrap.min.css" rel="stylesheet">

    <script src="../tie_uts/js/jquery-3.7.1.js"></script>
    <script>
         $(document).ready(function() {
             window.setTimeout(function() {
                 $(".alert").fadeTo(500, 0).slideUp(500, function(){
                     $(this).remove();
                });
            }, 3000);
        });
    </script>
</head>
<body>

<div class="container mt-3">

    <h2>Data Masyarakat</h2>

<!-- menampilkan pesan -->
    <?php if (isset($_GET['pesan'])) { ?>
            <p class="alert alert-primary" role="alert"><?php echo $_GET['pesan']; ?></p>
        <?php } ?>

    <table class="table">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tgl Pengaduan</th>
                <th>Isi Laporan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require('../tie_uts/konfig.php');

            $query = "SELECT `masyarakat`.`nik`, `masyarakat`.`nama`, `pengaduan`.`tgl_pengaduan`, `pengaduan`.`isi_laporan`
            FROM `masyarakat` 
                LEFT JOIN `pengaduan` ON `masyarakat`.`nik` = `pengaduan`.`nik`";

            $result = $koneksi->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" .$row['nik']. "</td>";
                    echo "<td>" .$row['nama']. "</td>";
                    echo "<td>" .$row['tgl_pengaduan']. "</td>";
                    echo "<td>" .$row['isi_laporan']. "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak Ada Data.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>