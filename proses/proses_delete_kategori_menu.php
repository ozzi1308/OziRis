<?php
include 'connect.php';
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['delete_kategori_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori FROM tb_daftar_menu WHERE kategori = '$id'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '<script>alert("Kategori telah digunakan pada Daftar Menu. Kategori tidak dapat dihapus");
                    window.location="../katmenu"</script>';
    } else {
        $query = mysqli_query($conn, "DELETE FROM tb_kategori_menu WHERE id_kategori_menu = '$id'");
        if ($query) {
            $massage = '<script>alert("Kategori Berhasil dihapus");
                    window.location="../katmenu"</script>';
        } else {
            $massage = '<>alert("Kategori Gagal dihapus");
                    window.location="../katmenu"</script>';
        }
    }
}
echo $massage;
?>