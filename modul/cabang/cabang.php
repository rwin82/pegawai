<script type="text/javascript">
$(function() {
	$("#theTable tr:even").addClass("stripe1");
	$("#theTable tr:odd").addClass("stripe2");
	$("#theTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<?php

$aksi="modul/cabang/aksi_cabang.php";

switch($_GET[act]){
	default:
	$tampil=mysql_query("select a.*,b.* from cabang a inner join regional b on a.id_reg=b.id_reg order by id_cab ASC");
	
	echo "<h2 class='head'>DATA CABANG</h2>
	<div>
	<input type=button value='Tambah Data' onclick=\"window.location.href='?module=cabang&act=input';\">
	</div>
	<table width='100%' class='tabel'>
	<thead>
  <tr>
    <td>No</td>
    <td>Id cabang</td>
    <td>Nama cabang</td>
	<td>Nama Regional</td>
	<td>Kabupaten</td>
	<td>Provinsi</td>
	<td>Control</td>
  </tr>
  </thead>
	<!--<tr>
    <th>No</th>
    <th>Id cabang</th>
    <th>Nama cabang</th>
	<th>Nama Regional</th>
	<th>Kabupaten</th>
	<th>Provinsi</th>
	<th>Control</th>
  </tr>-->";
  $no=1;
  while($dt=mysql_fetch_array($tampil)){
  echo "<tr>
    <td>$no</td>
    <td>$dt[id_cab]</td>
    <td>$dt[n_cabang]</td>
	 <td>$dt[n_regional]</td>
	  <td>$dt[kabupaten]</td>
	  <td>$dt[provinsi]</td>
	<td><span><a href='?module=cabang&act=edit&id=$dt[id_cab]'>Edit</a></span><span>
	<a href=\"$aksi?module=cabang&act=hapus&id=$dt[id_cab]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">Hapus</a></span></td>
  </tr>  ";
  $no++;
  }
echo "  
</table>
	";
	
	break;
	
	case "input":
	echo "<h2 class='head'>Entry Data Cabang</h2>
	<form action='$aksi?module=cabang&act=input' method='post'>
	<table class='tabelform'>
	<tr>
	<td>ID Cabang</td><td>:</td><td><input class='input' name='id' type='text' value=".kdauto(cabang,C)."></td>
	</tr>
	<tr>
	<td>Nama Cabang</td><td>:</td><td><input class='input' name='nama' type='text'></td>
	</tr>
	<tr>
	<td>ID Regional</td><td>:</td><td><select name='id_reg'>	
	<option value='' selected >Pilih Regional</option>";
	$reg=mysql_query("select * from regional");
	while($r=mysql_fetch_array($reg)){
	echo "<option value='$r[id_reg]'  >$r[n_regional]</option>";
	}
	echo "</select></td>
	</tr>
	<tr>
	<td>Kabupaten</td><td>:</td><td><input class='input' name='kabupaten' type='text'></td>
	</tr>
	<tr>
	<td>Provinsi</td><td>:</td><td><input class='input' name='provinsi' type='text'></td>
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
	$edit=mysql_query("select a.*,b.* from cabang a inner join regional b on a.id_reg=b.id_reg where id_cab='$_GET[id]'");
	$data=mysql_fetch_array($edit);
	echo "<h2>Edit Data cabang</h2>
	<form action='$aksi?module=cabang&act=edit' method='post'>
	<table>
	<tr>
	<td>ID Cabang</td><td>:</td><td><input class='input' name='id' type='text' value='$data[id_cab]'></td>
	</tr>
	<tr>
	<td>Nama Cabang</td><td>:</td><td><input class='input' name='nama' type='text' value='$data[n_cabang]'></td>
	</tr>
	<tr>
	<td>ID Regional</td><td>:</td><td><select name='id_reg'>
	<option value='' selected >Pilih Regional</option>";
	$reg=mysql_query("select * from regional");
	while($r=mysql_fetch_array($reg)){
	if($data['id_reg']==$r['id_reg']){
	echo "<option value='$r[id_reg]' selected='$data[id_reg]'>$r[n_regional]</option>";
	} else {
	echo "<option value='$r[id_reg]'>$r[n_regional]</option>";
	}
	}
	echo "</select></td>
	</tr>
	<tr>
	<td>Kabupaten</td><td>:</td><td><input class='input' name='kabupaten' type='text' value='$data[kabupaten]'></td>
	</tr>
	<tr>
	<td>Provinsi</td><td>:</td><td><input class='input' name='provinsi' type='text' value='$data[provinsi]'></td>
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