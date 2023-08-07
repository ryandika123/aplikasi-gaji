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
            <th class="text-center">NIP</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tunjangan Transport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Potongan</th>
            <th class="text-center">Total Gaji</th>
        </tr>

        <?php foreach ($potongan as $p) {
           $alpa =$p->jml_gaji;
        }?>

        <?php $no=1; foreach($cetak_gaji as $g) : ?>
        <?php $potongan = $g->alpa * $alpa ?>
        <tr>
            <td><?php echo $no++?></td>
            <td  class="text-center"><?php echo $g->nik ?></span></td>
            <td><?php echo $g->nama_pegawai ?></td>
            <td><?php echo $g->jenis_kelamin ?></td>
            <td><?php echo $g->nama_jabatan ?></td>
            <td class="text-center">Rp. <?php echo number_format($g ->gaji_pokok,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($g ->transport,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($g ->uang_makan,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($potongan,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($g->gaji_pokok + $g->transport + $g->uang_makan - $potongan,0,',','.')?></td>
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