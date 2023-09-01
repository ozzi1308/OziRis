<?php
include 'connect.php';
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama_menu = (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$kategori = (isset($_POST['kategori_menu'])) ? htmlentities($_POST['kategori_menu']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";

$kode_random = rand(10000, 99999) . "-";
$target_diractory = "../assets/img/" . $kode_random;
$target_file = $target_diractory . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['edit_menu_validate'])) {
    // Cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $massage = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $massage = "Maaf, File yang dimasukkan telah ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { //500kb
                $massage = "File foto yang diupload terlalu besar";
                $statusUpload = 0;
            } else {
                if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                    $massage = "Maaf, hanya gambar dengan format jpg, jpeg, png dan gif yang diizinkan";
                    $statusUpload = 0;
                }
            }
        }
    }

    if ($statusUpload == 0) {
        $massage = '<script>alert("' . $massage . ', Gambar tidak dapat diupload");
                    window.location="../minuman"</script>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM tb_daftar_menu WHERE nama_menu = '$nama_menu'");
        if (mysqli_num_rows($select) > 0) {
            $massage = '<script>alert("Nama Menu yang Dimasukkan Telah Ada");
                    window.location="../minuman"</script>';
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "UPDATE tb_daftar_menu SET foto_menu='" . $kode_random . $_FILES['foto']['name'] . "', nama_menu='$nama_menu', keterangan='$keterangan', kategori='$kategori', harga='$harga', stok='$stok' WHERE id='$id'");
                if ($query) {
                    $massage = '<script>alert("Data User Berhasil dimasukkan");
                            window.location="../minuman"</script>';
                } else {
                    $massage = '<script>alert("Data User Gagal dimasukkan");
                            window.location="../minuman"</script>';
                }
            } else {
                $massage = '<script>alert("Maaf, Terjadi Kesalahan File Tidak Dapat Diupload");
                            window.location="../minuman"</script>';
            }
        }
    }
}
echo $massage;
?>