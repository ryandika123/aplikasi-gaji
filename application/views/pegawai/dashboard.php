<?php

function merubah_tanggal($tgl){
    $bulan = [
        "1" => "Januari",
        "2" => "Februari",
        "3" => "Maret",
        "4" => "April",
        "5" => "Mei",
        "6" => "Juni",
        "7" => "Juli",
        "8" => "Agustus",
        "9" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember",
    ];
  

    $pecah_koma = explode(',', $tgl);

    $hari = "";

    switch ($pecah_koma[0]) {
        case 'Sunday':
            $hari = "Minggu";
            break;
        case 'Monday':
            $hari = "Senin";
            break;
        case 'Tuesday':
            $hari = "Selasa";
            break;
        case 'Wednesday':
            $hari = "Rabu";
            break;
        case 'Thursday':
            $hari = "Kamis";
            break;
        case 'Friday':
            $hari = "Jumat";
            break;
        case 'Saturday':
            $hari ="Sabtu";
            break;
    }


    $pecahkan = explode("-", $pecah_koma[1]);

    return $hari.', '.$pecahkan[0]." ".$bulan[ (int) $pecahkan[1]]." ".$pecahkan[2];
}

?>

<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">

	<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>
	<div class="alert alert-success"> Selamat Datang, Anda login sebagai pegawai.</div>

	<div class="card" style="margin-bottom: 120px; width: 60%;">
		
		<div class="card-header font-weight-bold bg-primary text-white">
			Data Pegawai
		</div>

	    <?php foreach ($pegawai as $pg) : ?> 
		<div class="card-body">
			<div class="row">
				<div class="col-md-5">
				  <img src="<?php echo base_url('asset/img/'.$pg->foto)?>">
				</div>	
				
				<div class="col-md-7">
					<table class="table">
						<tr>
							<td>NIP</td>
							<td>:</td>
							<td><span class="badge badge-success"><?php echo $pg->nik ?></span></td>
						</tr>
						<tr>
							<td>Nama Pegawai</td>
							<td>:</td>
							<td><?php echo $pg->nama_pegawai?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?php echo $pg->jenis_kelamin?></td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>:</td>
							<td><?php echo $pg->jabatan?></td>
						</tr>
						<tr>
							<td>Tanggal Masuk</td>
							<td>:</td>
							<td><?php echo merubah_tanggal( date('l, d-m-Y', strtotime($pg->tanggal_masuk)));?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>:</td>
							<td><?php echo $pg->status?></td>
						</tr>
						<tr>
							<td>Hak Akses</td>
							<td>:</td>
							  <?php if($pg->hak_akses=='1') { ?>
                      		<td><span class="badge badge-danger">Admin</span></td>
			                <?php }else{?>   <td><span class="badge badge-success">Pegawai</span></td>
			                <?php } ?>

						</tr>
					</table>
				</div>
			</div>	
		</div>
	    <?php endforeach ?>
	</div>
</div>