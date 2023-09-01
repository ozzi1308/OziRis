<?php
include 'connect.php';
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '$id'");
    if ($query) {
        $massage = '<script>alert("Data User Berhasil dihapus");
                    window.location="../user"</script>';
    } else {
        $massage = '<script>alert("Data User Gagal dihapus");
                    window.location="../user"</script>';
    }
}
echo $massage;
?>