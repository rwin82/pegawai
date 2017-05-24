<?php 
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/class_paging.php";
include "../../config/kode_auto.php";

$module=$_GET['module'];
$act=$_GET['act'];

if($module=='absen' AND $act=='hapus' ){ 
	mysql_query("delete from absen where id_absensi='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}

if($module=='absen' AND $act=='approve' ){
				
		mysql_query("update absen set status_absen=8 where id_absensi='$_GET[id]'");
		header('location:../../media.php?module='.$module);
		}

if($module=='absen' AND $act=='unapprove' ){
				
		mysql_query("update absen set status_absen=0 where id_absensi='$_GET[id]'");
		header('location:../../media.php?module='.$module);
		}		
		
if($module=='absen' AND $act=='input' ){
	
		$tanggal_masuk="$_POST[tm]-$_POST[bm]-$_POST[hm]";
		$sts_masuk="$_POST[status_masuk]";
		

	$absen=mysql_query("select * from absen where tanggal_absen='$tanggal_masuk' and nip='$_POST[nip]'");
	if(mysql_num_rows($absen)>0){  echo "<script>alert('absen $_POST[nip] telah diinput !!'); window.location = '../../media.php?module=$module			'</script>";
			}else {
		if($sts_masuk==0){
			mysql_query("insert into absen set nip='$_POST[nip]',
											 tanggal_absen='$tanggal_masuk',
											 status_masuk='$_POST[status_masuk]',
											 ket='$_POST[ket]'");
		header('location:../../media.php?module='.$module);
		}
		
		if($sts_masuk==1){
			mysql_query("insert into absen set nip='$_POST[nip]',
											 tanggal_absen='$tanggal_masuk',
											 status_masuk='$_POST[status_masuk]',
											 jam_masuk='$_POST[jam_masuk]',
											 jam_pulang='$_POST[jam_pulang]'");
											 
		header('location:../../media.php?module='.$module);
		}
	}
	
}

?>