<?php 
session_start();
error_reporting(0);
include "timeout.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SISTEM INFORMASI KEPEGAWAIAN</title>
<link rel="stylesheet" href="css/style.css" type="text/css"  />
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-1.4.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/hoverIntent.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style_content.css" type="text/css"/>
<link rel="stylesheet" href="css/style_table.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/themes/cupertino/easyui.css">
<link rel="stylesheet" type="text/css" href="css/themes/icon.css">
<link rel="stylesheet" type="text/css" href="css/ui/themes/base/jquery.ui.all.css">


<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery.ui.core.js"></script>

	<script type="text/javascript">
      $(document).ready(function(){
			   $('ul.nav').superfish();
		  });
  </script>
</head>

<body>
<div id="container">
<div id="header">
<span class="judul"></span><br />
<table width="100%" border='0'><tr>
<td width='50px'>&nbsp;</td>
<td width='130px'><image src="images/KOMIDAheader.png" width='110' height='100'/></td>
<td width='30px'>&nbsp;</td>
<td width='550px'>
<span class="judul">HRD INFORMATION SYSTEM</span><br />
<span class="judul2">KOPERASI MITRA DHUAFA</span><br />
<span class="alamat">Jl.Raya Lenteng Agung No.10 Kecamatan Jagakarsa - Jakarta Selatan 12610 </span><br />

</td>
<td>&nbsp;
</td>
</tr>
</table>
</div>

<div id="menu">
	<ul class="nav">
	<?php if ($_SESSION['leveluser']=='3'){ ?>
	<li>
	<a class="border link linkback" href="?module=pegawai&act=detail&id=<?php echo $_SESSION['namauser'];?>">Data Pegawai</a>
	<ul><li><a href="?module=absen" class="li">Input Data Absensi</a></li>
	<li><a href="?module=absensi" class="li">Input Data Absensi2</a></li>
	</ul>
	</li>
	<li><a class="border link linkback" href="logout.php">Logout</a></li>
	<?php 
	}
	if ($_SESSION['leveluser']=='1'){
	?>
		<li><a class="border link linkback" >Administrator</a>
            <ul>
			<li><a href="?module=bagian" class="li">Divisi</a></li>
            <li><a href="?module=jabatan" class="li">Jabatan</a></li>
			<li><a href="?module=cabang" class="li">Cabang</a></li>
			<li><a href="?module=regional" class="li">Regional</a></li>
            <li><a href="logout.php" class="li">Logout</a></li>
            </ul>
        </li>
		<li><a href="?module=pegawai" class="border link linkback" >Data Master</a>
            <ul>
			<li><a href="?module=pindahcabang" class="li">Mutasi Karyawan</a></li>
			<li><a href="?module=c_pegawai" class="li">Calon Karyawan</a></li>
			<li><a href="?module=kjb" class="li">Promosi Jabatan</a></li>
			<li><a href="?module=absen" class="li">Absensi</a></li>
			<li><a href="?module=absensi" class="li">Absensi2</a></li>
            </ul>
        </li>
        <li><a class="border link linkback" href="?module=pelatihan">Data Pelatihan</a></li>
        
	<?php } 
	if($_SESSION['leveluser']=='1' or $_SESSION['leveluser']=='2'){
	?>
		<li><a class="border link linkback" href="#">Laporan</a>
        	<ul>
			<li><a href="laporan_pegawai.php" class="li" target="_blank">Laporan Data Karyawan</a></li>
            <li><a href="?module=lap_absen" class="li">Laporan Data Absensi</a></li>
            <li><a href="laporan_pelatihan.php" target="_blank" class="li">Laporan Data pelatihan</a></li>
            </ul>
        </li>
	<?php } ?>
        <li class="clear"></li>
    </ul>
</div>
<!--<div id="tt" class="easyui-tabs" style="height:570px;">-->
<div>
<div id="content">
<div class="form">
 <div id="scroldiv" style="overflow-y: scroll; height:400px;">
	<?php include "data.php"; ?>
  </div>
</div>
</div>
</div>	
</div>


</body>
<div id="footer">Copyright &copy; 2017 || koperasi Mitra Dhuafa</div>
</html>
