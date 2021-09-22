<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<title></title>
</head><body>
	<h3>Tanggal : <?= date('d-m-Y H:i:s'); ?></h3>
	<br><br><br><br><br>
	<table border = "1" border-collapse="0" border-spacing="0" style="width: 100%">
		<tr>
			<th>Kriteria Pasien</th>
			<th>Paket Menu</th>
			<th>Urutan Menu</th>
		</tr>
		<tr>
			<td style="text-align: center"><?= $_GET['nama_kriteria'] ?></td>
			<td>
				<?php foreach($alternatif_topsis as $row): ?>
					<?= 
					"<b>" . $row['nama_alternatif'] . "</b><br>".
					"Pagi : " . $row['pagi'] . "<br>".
					"Siang : " . $row['siang'] . "<br>".
					"Sore : " . $row['sore'] . "<br>"
					; 

					?>
				<?php endforeach; ?>
			</td>
			<?php $urutan = explode(', ' , $_GET['urutan_menu']); ?>
			<td style="text-align: center">
				<?php for($x = 0; $x < count($urutan); $x++): ?>
					<?= $urutan[$x] . "<br>"; ?>
				<?php endfor; ?>
			</td>
		</tr>
	</table>
</body></html>