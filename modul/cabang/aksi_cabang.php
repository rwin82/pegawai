<?php 
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/class_paging.php";
include "../../config/kode_auto.php";

$module=$_GET['module'];
$act=$_GET['act'];


if($module=='cabang' AND $act=='input' ){
	mysql_query("insert into cabang set id_cab='$_POST[id]', n_cabang='$_POST[nama]',id_reg='$_POST[id_reg]',kabupaten='$_POST[kabupaten]',provinsi='$_POST[provinsi]'");
	header('location:../../media.php?module='.$module);
}

elseif($module=='cabang' AND $act=='edit' ){
	mysql_query("update cabang set n_cabang='$_POST[nama]',id_reg='$_POST[id_reg]',kabupaten='$_POST[kabupaten]',provinsi='$_POST[provinsi]' where id_cab='$_POST[id]'");
	header('location:../../media.php?module='.$module);
}

elseif($module=='cabang' AND $act=='hapus' ){
	mysql_query("delete from cabang where id_cab='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}


?>