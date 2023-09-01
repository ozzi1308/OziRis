<?php
include 'connect.php';
$name = (isset($_POST['name'])) ? htmlentities($_POST['name']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['pilih_level'])) ? htmlentities($_POST['pilih_level']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";

if (!empty($_POST['input_user_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '<script>alert("Email yang dimasukkan sudah ada");
                    window.location="../user"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_user (nama,username,level,nohp,alamat,password) values ('$name','$username','$level','$nohp','$alamat','$password')");
        if ($query) {
            $massage = '<script>alert("Data User Berhasil dimasukkan");
                    window.location="../user"</script>';
        } else {
            $massage = '<script>alert("Data User Gagal masukkan");
                    window.location="../user"</script>';
        }
    }
}
echo $massage;
?>