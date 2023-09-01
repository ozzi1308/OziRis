<?php
include 'connect.php';
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";

if (!empty($_POST['input_user_validate'])) {
    $select = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '<script>alert("Email yang dimasukkan sudah ada ygy");
                    window.location="../user"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_user SET nama='$name', username='$username', level='$level', nohp='$nohp', alamat='$alamat' WHERE id_user='$id'");
        if ($query) {
            $massage = '<script>alert("Data User Berhasil update");
                    window.location="../user"</script>';
        } else {
            $massage = '<script>alert("Data User Gagal update");
                    window.location="../user"</script>';
        }
    }
}
echo $massage;
?>