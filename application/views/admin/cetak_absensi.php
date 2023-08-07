<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black ;
		}
	</style>
</head>
<body>
	<br>

	<center>
		<h5><strong>PT. IDEC AWI</strong></h5>
		<p>Jl. Jend. Sudirman rt60, n0 40  Tarakan Barat, Kalimantan Utara</p>
		<b><hr></b>
	</center>

	<center>
		<h2><strong>Cetak Data Gaji Pegawai </strong></h2>
	</center>

	<?php
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
	?>



	<table>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?php echo $bulan ?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?php echo $tahun ?></td>
		</tr>
	</table>

	 <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Hadir</th>
            <th class="text-center">Sakit</th>
            <th class="text-center">Alpa</th>
        </tr>


        <?php $no=1; foreach($lap_kehadiran as $g) : ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $g->nama_pegawai ?></td>
            <td class="text-center"><?php echo $g->nik ?></span></td>
            <td><?php echo $g->nama_jabatan ?></td>
            <td><?php echo $g->hadir ?></td>
            <td><?php echo $g->sakit ?></td>
            <td><?php echo $g->alpa ?></td>
        </tr>
        <?php endforeach ?>
    </table>

    <br>

    <table width="100%">
    	<tr>
    		<td></td>
    		<td width="200px">
    			<p>Tarakan, <?php echo date("d M Y") ?><br> Finance</p>
    			<br>
    			<br>
    			<p>___________________</p>
    		</td>
    	</tr>
    </table>



</body>
</html>

<script type="text/javascript">
	window.print()
</script>