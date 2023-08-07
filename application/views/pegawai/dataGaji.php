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

    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">Bulan/Tahun</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tj. Transportasi</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Potongan</th>
            <th class="text-center">Total Gaji</th>
            <th class="text-center">Cetak Slip</th>
        </tr>
        <?php foreach ($potongan as $p) :?>
           <?php $potongan =$p->jml_gaji; ?>
        <?php endforeach; ?>

        <?php foreach($gaji as $g) : ?>
        <?php $pot_gaji = $g->alpa * $potongan ?>

        <tr>
            <td class="text-center"><?php echo $g->bulan?></td>
            <td class="text-center">Rp. <?php echo number_format($g ->gaji_pokok,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($g ->transport,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($g ->uang_makan,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($pot_gaji,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($g ->gaji_pokok + $g->transport + $g->uang_makan,0,',','.')?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('pegawai/dataGaji/cetakslip/'.$g->id_kehadiran) ?>" class="btn btn-sm btn-primary"><i class="fas fa-print"></i></a>
                </center>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>