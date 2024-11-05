<?php

// untuk mengakhiri sesi pengguna yang sedang login dan mengarahkan mereka ke halaman login.

// memulai sesi
session_start();

// dihapus sesinya
session_destroy();

header("Location: login.php");
exit()
?>