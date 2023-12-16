<link href="../tie_uts/css/bootstrap.min.css" rel="stylesheet">
<?php
require('../tie_uts/konfig.php');

if (isset($_POST['nik']) && isset($_POST['pass'])) {
    $nik = $_POST['nik'];
    $password = $_POST['pass'];


    $query = "SELECT * FROM masyarakat WHERE nik = '$nik'";

    $result = $koneksi->query($query);

    if ($result->num_rows == FAlSE) {
        $user = $result->fetch_assoc();

        if (($password == $user['password']) && ($user['nik'])) {
            $pesan = "login berhasil selamat datang." . $user['nama']. "!";
            header("Location: ../tie_uts/display.php");
            echo '<div class="badge bg-success text-wrap" style="width: 20rem; text-align: center;"">'.$pesan. '</div>';

        } else {
        // echo "Password salah.$password_hash";
            header('Location: ../tie_uts/login.php?pesan= <strong>Gagal Login</strong>');
        }
    } else {
        header('Location: ../tie_uts/login.php?pesan= <strong>Nik Tidak Ditemukan</strong>');
    }
} else {
    header('Location: ../tie_uts/login.php?pesan= <strong>Gagal Login</strong>');
}

$koneksi->close();
?>