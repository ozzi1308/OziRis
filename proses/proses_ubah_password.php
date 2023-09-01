<?php
session_start();
include 'connect.php';
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$passwordlama = (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama'])) : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru'])) : "";
$konfirmasipassword = (isset($_POST['konfirmasipassword'])) ? md5(htmlentities($_POST['konfirmasipassword'])) : "";

if (!empty($_POST['ubah_password_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_altaca]' && password = '$passwordlama' ");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if ($passwordbaru == $konfirmasipassword) {
            $query = mysqli_query($conn, "UPDATE tb_user SET password='$passwordbaru' WHERE username = '$_SESSION[username_altaca]'");
            if ($query) {
                $massage = '<script>alert("Password Berhasil diubah");
                        window.history.back()</script>
                        </script>';
            } else {
                $massage = '<script>alert("Password Gagal diubah");
                        window.history.back()</script>
                        </script>';
            }
        } else {
            $massage = '<script>alert("Password Baru Tidak Sama");
                        window.history.back()</script>
                        </script>';
        }
    } else {
        $massage = '<script>alert("Password Lama Tidak Sesuai");
                        window.history.back()</script>
                        </script>';
    }
} else {
    header('location:../home');
}
echo $massage;
?>