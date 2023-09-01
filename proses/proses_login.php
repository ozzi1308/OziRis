<?php
//echo md5('password');
session_start();
include 'connect.php';
$username = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "" ;
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;

if(!empty($_POST['submit_validate'])){
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password' ");
    $hasil = mysqli_fetch_array($query);
    if($hasil){
        $_SESSION['username_altaca'] = $username;
        $_SESSION['level_altaca'] = $hasil['level'];
        header('location:../home');
    } else { ?>
        <script>
            alert('Username yang kamu masukkan salah');
            window.location = "../login"
        </script>
<?php
    }
} else {
   header('location:../home');
}
?>


