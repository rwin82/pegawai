<?php 

echo "<div>
<h2 class='head'>LAPORAN ABSENSI PER-PERIODE</h2>

<form action='laporan_absen.php' method='POST' target='_blank'>";

combonamabln(1, 12, bulan, 1);
$now =  date("Y");
combothn(2000, $now, tahun, 1);

echo"<input type=submit name=submit value=Tampilkan>
</form></div>";


echo "<div>
<h2 class='head'>EXPORT TO EXCELL</h2>

<form action='lap_absen_to_xls.php' method='POST' target='_blank'>";

combonamabln(1, 12, bulan, 1);
$now =  date("Y");
combothn(2000, $now, tahun, 1);

echo"<input type=submit name=submit value=Export>
</form></div>";

?>
