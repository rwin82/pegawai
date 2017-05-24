<?php 
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/class_paging.php";
include "../../config/kode_auto.php";

$module=$_GET['module'];
$act=$_GET['act'];


if($module=='regional' AND $act=='input' ){
	mysql_query("insert into regional set id_reg='$_POST[id]', n_regional='$_POST[nama]'");
	header('location:../../media.php?module='.$module);
}

elseif($module=='regional' AND $act=='edit' ){
	mysql_query("update regional set n_regional='$_POST[nama]' where id_reg='$_POST[id]'");
	header('location:../../media.php?module='.$module);
}

elseif($module=='regional' AND $act=='hapus' ){
	mysql_query("delete from regional where id_reg='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}


?>