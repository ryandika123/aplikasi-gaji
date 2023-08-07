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
		<h2><strong>Cetak Slip Gaji Pegawai </strong></h2>
	</center>

	<?php
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                 $bulan = $_GET['bulan'];
                 $tahun = $_GET['tahun'];
                 $bulantahun = $bulan.$tahun;
             }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
             }
    ?>

   <?php foreach($potongan as $p) {
           $potongan =$p->jml_gaji;
   }?>
    
	<?php foreach($print_slip as $ps) : ?> 

		<?php $potongan_gaji=$ps->alpa * $potongan; ?>

	    <table style="width: 30%;">
			<tr>
				<td>Nama Pegawai</td>
				<td>:</td>
				<td><?php echo $ps->nama_pegawai ?></td>
			</tr>
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td><?php echo $ps->nik ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo $ps->nama_jabatan ?></td>
			</tr>
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

		<table class="table table-striped table-bordered mt-2">
			<tr>
				<th class="text-center" width="5%">No</th>
				<th class="text-center">Keterangan</th>
				<th class="text-center">Jumlah</th>
			</tr>
			<tr>
				<td>1</td>
				<td>Gaji Pokok</td>
				<td class="text-center">Rp. <?php echo number_format($ps->gaji_pokok,0,',','.')?>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Tunjangan Transportasi</td>
				<td class="text-center">Rp. <?php echo number_format($ps->transport,0,',','.')?>
				</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Uang Makan</td>
				<td class="text-center">Rp. <?php echo number_format($ps->uang_makan,0,',','.')?>
				</td>
			</tr>
			<tr>
				<td>4</td>
				<td>Potongan</td>
				<td class="text-center">Rp. <?php echo number_format($potongan_gaji,0,',','.')?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: right;">Total Gaji</td>
				<td class="text-center">Rp. <?php echo number_format($ps->gaji_pokok+$ps->transport-$ps->uang_makan-$potongan_gaji,0,',','.')?>
				</td>
			</tr>
		</table>

		<table width="100%">
			<td></td>
			<td>
				<p >Pegawai</p>
				<br>
				<br>
				<p class="font-weight-bold">
					<?php echo $ps->nama_pegawai ?>
				</p>
			</td>

			<td width="200px">
				<p>Tarakan, <?php echo date("d M Y") ?> <br> Finance</p>
				<br>
				<br>
				<p>___________________</p>
			</td>
		</table>
	<?php endforeach;?>

<!--- Fungsi untuk memunculkan top up print --->
<script type="text/javascript">
	window.print()
</script>

</body>
</html>