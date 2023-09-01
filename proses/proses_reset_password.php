<?php
include 'connect.php';
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "UPDATE tb_user SET password=md5('kamuaku') WHERE id_user = '$id'");
    if ($query) {
        $massage = '<script>alert("Password berhasil direset");
                    window.location="../user"</script>
                    </script>';
    } else {
        $massage = '<script>alert("Password gagal direset")</script>';
    }
}echo $massage;
?>