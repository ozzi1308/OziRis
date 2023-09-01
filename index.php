<?php
session_start();
if (isset($_GET["x"]) && $_GET["x"] == "home") {
  $halaman = "home.php";
  include "main.php";
} elseif (isset($_GET["x"]) && $_GET["x"] == "makanan") {
  $halaman = "makanan.php";
  include "main.php";
} elseif (isset($_GET["x"]) && $_GET["x"] == "minuman") {
  $halaman = "minuman.php";
  include "main.php";
} elseif (isset($_GET["x"]) && $_GET["x"] == "pesanan") {
  $halaman = "pesanan.php";
  include "main.php";
} elseif (isset($_GET["x"]) && $_GET["x"] == "user") {
  if ($_SESSION['level_altaca'] == 1) {
    $halaman = "user.php";
    include "main.php";
  } else {
    $halaman = "home.php";
    include "main.php";
  }
} elseif (isset($_GET["x"]) && $_GET["x"] == "report") {
  if ($_SESSION['level_altaca'] == 1) {
    $halaman = "report.php";
    include "main.php";
  } else {
    $halaman = "home.php";
    include "main.php";
  }
} elseif (isset($_GET["x"]) && $_GET["x"] == "login") {
  include "login.php";
} elseif (isset($_GET["x"]) && $_GET["x"] == "logout") {
  include "proses/proses_logout.php";
} elseif (isset($_GET["x"]) && $_GET["x"] == "katmenu") {
  $halaman = "katmenu.php";
  include "main.php";
} else {
  $halaman = "home.php";
  include "main.php";
}
?>