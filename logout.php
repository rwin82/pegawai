<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda yakin akan keluar dari aplikasi ini'); window.location = 'index.php'</script>";
?>
