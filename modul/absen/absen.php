
 <script src="/../../js/jquery.min.js"></script>
 <script>
        $(document).ready(function (){
            $("#hadir").change(function() {
                // foo is the id of the other select box 
                if ($(this).val() == 0) {
                    $("#ket").show();
					$("#jam_masuk").hide();
					$("#jam_pulang").hide();
                }else{
					$("#jam_masuk").show();
					$("#jam_pulang").show();
                    $("#ket").hide();
                } 
				
				
            });
        });
 </script>

<?php

$aksi="modul/absen/aksi_absen.php";
date_default_timezone_set("Asia/Jakarta");

function keterangan($var){
	if($var=='I'){
		$status="IZIN";
		return $status;
	}
	else if($var=='S'){
		$status="SAKIT";
		return $status;
	}
	else if($var=='C'){
		$status="CUTI";
		return $status;
	}	
	else if($var=='A'){
		$status="TANPA KETERANGAN";
		return $status;	
	}
	else {
		$status="-";
		return $status;
	}
}


function kehadiran($var){
	if($var==0){
		$status="Tidak Hadir";
		return $status;
	}
	else if($var==1){
		$status="Hadir";
		return $status;
	}
	
}

switch($_GET[act]){
	default:
	$tgl= date('Y-m-d');
	$branch=$_SESSION[branch];
	$leveluser=$_SESSION[leveluser];
	if($leveluser==1){
	$tampil=mysql_query("select * from absen a inner join pegawai b on a.nip=b.nip order by a.nip ASC");
	}
	else
	{	
	$tampil=mysql_query("select a.*,b.nama from absen a inner join pegawai b on a.nip=b.nip where b.id_cab='$branch' order by a.nip ASC");
	}
	echo "<h2 class='head'>DATA ABSENSI</h2>
	<div class='absensi'>".tgl_indo($tgl)."</div>
	<div>
	<input type=button value='Tambah Data' onclick=\"window.location.href='?module=absen&act=input';\">
	</div>
	<table class='tabel'>
	<thead>
  <tr>
    <td>NO</td>
	<td>TANGGAL</td>
    <td>NIK</td>
    <td>NAMA KARYAWAN</td>
	<td>STATUS KEHADIRAN</td>
	<td>JAM DATANG</td>
	<td>JAM PULANG</td>
	<td>KETERANGAN</td>
	<td>CONTROL</td>
  </tr>
  </thead>";
  $no=1;
  while($dt=mysql_fetch_array($tampil)){
  echo "<tr>
    <td>$no</td>
	<td>$dt[tanggal_absen]</td>
    <td>$dt[nip]</td>
    <td>$dt[nama]</td>
	<td>".kehadiran($dt[status_masuk])."</td>
	<td>$dt[jam_masuk]</td>
	<td>$dt[jam_pulang]</td>
	<td>".keterangan($dt[ket])."</td>
	<td><span>"; if($dt['status_absen']=='0') { echo "<a href=\"$aksi?module=absen&act=approve&id=$dt[id_absensi]\" onClick=\"return confirm('Apakah Anda benar-benar mau menyetujuinya?')\">Approve</a>";} else { echo "<a href=\"$aksi?module=absen&act=unapprove&id=$dt[id_absensi]\" onClick=\"return confirm('Apakah Anda benar-benar mau merubah statusnya?')\">Unapprove</a>";} echo " | </span><span><a href=\"$aksi?module=absen&act=hapus&id=$dt[id_absensi]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">Hapus</a>
	</span></td>
  </tr>";
  $no++;
  }
echo "  
</table>
	";
	
	break;
	
	case "input":
	$branch=$_SESSION[branch];
	$leveluser=$_SESSION[leveluser];
	echo "<h2 class='head'>Entry Data absen</h2>
	<form action='$aksi?module=absen&act=input' method='post'>
	<table class='tabelform'>
	<tr>
	<td>Tanggal</td><td>:</td><td>
	<select name='hm'>
                <option value='none' selected='selected'>Tgl*</option>";
			for($h=1; $h<=31; $h++) 
			{ 
				echo"<option value=",$h,">",$h,"</option>";
			} 
	echo"</select>
	<select name='bm'>
            	<option value='none' selected='selected'>Bulan*</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
	<select name='tm'>
            <option value='none' selected='selected'>Tahun*</option>";
			$now =  date("Y");
			$saiki = 2000;
			for($l=$saiki; $l<=$now; $l++)
			{
				echo"<option value=",$l,">",$l,"</option>";
			}	
	echo "</select>
	</td>
	</tr>
	<tr>
	<td>NIK</td><td>:</td><td><select name='nip'>
	<option value='' selected >Pilih pegawai</option>";
	if($leveluser==1) {
	$jab=mysql_query("select * from pegawai");
	}
	else
	{
	$jab=mysql_query("select * from pegawai where id_cab='$branch'");		
	}
	while($j=mysql_fetch_array($jab)){
	echo "<option value='$j[nip]'>$j[nama]</option>";
	}
	echo "</select></td>
	</tr>
	<tr>
	<td>Kehadiran</td><td>:</td>
	<td><select id='hadir' name='status_masuk'>
	<option value='' selected >Pilih Kehadiran</option>
	<option value='1' >Hadir</option>
	<option value='0' >Tidak Hadir</option>
	</select></td></td>
	</tr>
	<tr id='jam_masuk'>
	<td>Jam Masuk</td><td>:</td><td><input type='time' name='jam_masuk'></td>
	</tr>
	<tr id='jam_pulang'><td>Jam Pulang</td><td>:</td><td><input type='time' name='jam_pulang'></td>
	</tr>
	<tr id='ket'>
	<td>Keterangan</td><td>:</td><td><select name='ket'>
	<option value='' selected >Pilih Keterangan</option>
	<option value='C' >Cuti</option>
	<option value='I' >Ijin</option>
	<option value='S' >Sakit</option>
	<option value='A' >Tanpa Keterangan</option>
	</select><input type=hidden name=tgl value='$tgl'></td>
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
	
}


?>