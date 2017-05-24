<?php

$aksi="modul/regional/aksi_regional.php";

switch($_GET[act]){
	default:
	$tampil=mysql_query("select * from regional order by id_reg asc");
	
	echo "<h2 class='head'>DATA REGIONAL</h2>
	<div>
	<input type=button value='Tambah Data' onclick=\"window.location.href='?module=regional&act=input';\">
	</div>
	<table class='tabel'>
	<thead>
  <tr>
    <td>No</td>
    <td>Id regional</td>
    <td>Nama Regional</td>
	<td>Control</td>
  </tr>
  </thead>";
  $no=1;
  while($dt=mysql_fetch_array($tampil)){
  echo "<tr>
    <td>$no</td>
    <td>$dt[id_reg]</td>
    <td>$dt[n_regional]</td>
	<td><span><a href='?module=regional&act=edit&id=$dt[id_reg]'>Edit</a></span><span>
	<a href=\"$aksi?module=regional&act=hapus&id=$dt[id_reg]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">Hapus</a></span></td>
  </tr>";
  $no++;
  }
echo "  
</table>
	";
	
	break;
	
	case "input":
	echo "<h2 class='head'>ENTRY DATA REGIONAL</h2>
	<form action='$aksi?module=regional&act=input' method='post'>
	<table class='tabelform'>
	<tr>
	<td>ID Regional</td><td>:</td><td><input class='input' name='id' type='text' value=".kdauto(regional,R)."></td>
	</tr>
	<tr>
	<td>Nama Regional</td><td>:</td><td><input class='input' name='nama' type='text'></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
	break;
	
	case "edit":
	$edit=mysql_query("select * from regional where id_reg='$_GET[id]'");
	$data=mysql_fetch_array($edit);
	echo "<h2>EDIT DATA REGIONAL</h2>
	<form action='$aksi?module=regional&act=edit' method='post'>
	<table>
	<tr>
	<td>ID Regional</td><td>:</td><td><input class='input' name='id' type='text' value='$data[id_reg]'></td>
	</tr>
	<tr>
	<td>Nama Regional</td><td>:</td><td><input class='input' name='nama' type='text' value='$data[n_regional]'></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit value=Update>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>";
	break;
	
	case "hapus":
	
	break;
}


?>