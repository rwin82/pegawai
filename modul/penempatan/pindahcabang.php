<?php

$aksi="modul/penempatan/aksi_pindahcabang.php";


switch($_GET[act]){
	default:
	if(!isset($_POST[input_cari])){
	$tampil=mysql_query(
		"select * from pegawai a
	inner join cabang b on a.id_cab=b.id_cab where status_peg=8 order by nip ASC limit 100"
	);
	echo "<h2 class='head'>DATA MUTASI KARYAWAN</h2>
	<td align='right'>
	<form method='POST' enctype='multipart/form-data'>
	<input type='text' name='input_cari' Placeholder='Masukan Nik atau Nama' size='30'><input type='submit' name='cari' value='Cari Data' size='30'>
	</form>
	</td>
	<table class='tabel'>
	<thead>
  <tr>
    <td>No</td>
    <td>Nip</td>
    <td>Nama</td>
	<td>Cabang</td>
	<td>Kabupaten</td>
	<td>Control</td>
  </tr>
  </thead>";
  $no=1;
  while($dt=mysql_fetch_array($tampil)){
  echo "<tr>
    <td>$no</td>
    <td>$dt[nip]</td>
	<td>$dt[nama]</td>
    <td>$dt[n_cabang]</td>
	<td>$dt[kabupaten]</td>
	<td><span><a href='?module=pindahcabang&act=edit&id=$dt[nip]'>Pindahkan</a></span>
	</td>
  </tr>";
  $no++;
  }
}
echo "  
</table>
	";
	
if(isset($_POST[input_cari])){
$cari=$_POST['input_cari'];
	$tampil=mysql_query(
	"select * from pegawai a
	inner join cabang b on a.id_cab=b.id_cab where a.status_peg=8 and a.nip like '%$cari%' OR a.nama like '%$cari%' order by nip ASC limit 10"
	);
	echo "<h2 class='head'>DATA MUTASI KARYAWAN</h2>
	<td align='right'>
	<input type=button value='Reset' onclick=\"window.location.href='?module=pindahcabang';\">
	</td>
	<table class='tabel'>
	<thead>
  <tr>
    <td>No</td>
    <td>Nip</td>
    <td>Nama</td>
	<td>Cabang</td>
	<td>Kabupaten</td>
	<td>Control</td>
  </tr>
  </thead>";
  $no=1;
  while($dt=mysql_fetch_array($tampil)){
  echo "<tr>
    <td>$no</td>
    <td>$dt[nip]</td>
	<td>$dt[nama]</td>
    <td>$dt[n_cabang]</td>
	<td>$dt[kabupaten]</td>
	<td><span><a href='?module=pindahcabang&act=edit&id=$dt[nip]'>Pindahkan</a></span>
	</td>
  </tr>";
  $no++;
  }
}
echo "  
</table>
	";

	
	
	break;
	
		
	case "edit":
	$ambil=mysql_query("select * from pegawai where nip='$_GET[id]'");
	$t=mysql_fetch_array($ambil);
	echo "<h2 class='head'>Edit Data Cabang Karyawan</h2>
	<form action='$aksi?module=pindahcabang&act=edit' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td>Nip</td><td>:</td><td><input name='nip' type='text' value='$t[nip]' readonly></td>
	</tr>
	<tr>
	<td>Nama Pegawai</td><td>:</td><td><input class='input' name='nama' type='text' value='$t[nama]'></td>
	</tr>
	<tr>
	<td>Cabang</td><td>:</td><td><select name='id_cab'>	
	<option value='' selected >Pilih Cabang</option>";
	$cab=mysql_query("select * from cabang");
	while($c=mysql_fetch_array($cab)){
	if($t['id_cab']==$c['id_cab']){
	echo "<option value='$c[id_cab]' selected='$t[id_cab]'  >$c[n_cabang]</option>";
	} else {
	echo "<option value='$c[id_cab]'>$c[n_cabang]</option>";
	}
	}
	echo "</select></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
}


?>