<?php 

include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/class_paging.php";
include "../../config/kode_auto.php";
include "../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

if($module=='pindahcabang' AND $act=='edit' ){ 
	mysql_query("update pegawai set id_cab='$_POST[id_cab]',nama='$_POST[nama]' where nip='$_POST[nip]'");
		header('location:../../media.php?module='.$module);
}

?>