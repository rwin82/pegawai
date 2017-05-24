<?php
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";

	if ($_SESSION['leveluser']=='3'){
		if($_GET['module']=="pegawai"){
		include "modul/pegawai/pegawai.php";
			}
		if($_GET['module']=="absen"){
		include "modul/absen/absen.php";
			}
		else if($_GET['module']=="absensi"){
		include "modul/absensi/absensi.php";
		}
	}
	
if ($_SESSION['leveluser']=='1'){
	if($_GET['module']=="home"){
		echo "<div class='home'></div>";
	}
	
	else if($_GET['module']=="bagian"){
	include "modul/bagian/bagian.php";
	}

	else if($_GET['module']=="cabang"){
	include "modul/cabang/cabang.php"; 
	}
	else if($_GET['module']=="regional"){
	include "modul/regional/regional.php";
	}
	else if($_GET['module']=="pindahcabang"){
	include "modul/Penempatan/pindahcabang.php";
	}
	else if($_GET['module']=="jabatan"){
	include "modul/jabatan/jabatan.php";
	}
		else if($_GET['module']=="c_pegawai"){
	include "modul/c_pegawai/c_pegawai.php";
	}
	else if($_GET['module']=="pegawai"){
	include "modul/pegawai/pegawai.php";
	}
	else if($_GET['module']=="absen"){
	include "modul/absen/absen.php";
	}
	else if($_GET['module']=="absensi"){
	include "modul/absensi/absensi.php";
	}
	else if($_GET['module']=="pelatihan"){
	include "modul/pelatihan/pelatihan.php";
	}
	else if($_GET['module']=="kjb"){
	include "modul/k_jabatan/k_jabatan.php";
	}
	else if($_GET['module']=="lap_absensi"){
	include "menu_laporan.php";
	}
	else if($_GET['module']=="lap_absen"){
	include "menu_laporan.php";
	}
	else if($_GET['module']=="lap_absen_xls"){
	include "lap_absen_to_xls.php";
	}
	
 }
 
 if ($_SESSION['leveluser']=='2'){
	if($_GET['module']=="lap_absensi"){
	include "menu_laporan.php";
	}
 
 }

?>