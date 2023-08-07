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

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="navbar-form navbar-right">
        
        <?php echo form_open('admin/dataPegawai/search') ?>
        
        <input type="text" name="keyword" class="form-control" placeholder="Search">
        <button type="submit" class="btn btn-warning mt-3" name="bcari">Cari</button>
        <button type="submit" class="btn btn-danger mt-3" name="bcari">Reset</button>

        <?php echo form_close() ?>

    </div>

     <a href="<?php echo base_url('admin/dataPegawai/tambah_data') ?>" class="btn btn-sm btn-success mb-2 mt-2"><i class="fas fa-plus"></i> Tambah Data</a>
     <br>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">No. Telepon</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Hak Akses</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no=1;  foreach ($pegawai as $p): ?>
         <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td  class="text-center"><span class="badge badge-success"><?php echo $p->nik ?></span></td>
            <td class="text-center"><?php echo $p->nama_pegawai?></td>
            <td class="text-center"><?php echo $p->jenis_kelamin?></td>
            <td class="text-center"><?php echo $p->jabatan?></td>
            <td class="text-center"><?php echo merubah_tanggal( date('l, d-m-Y', strtotime($p->tanggal_masuk)));?></td>
            <td class="text-center"><?php echo $p->status?></td>
            <td class="text-center"><?php echo $p->alamat?></td>
            <td class="text-center"><?php echo $p->telepon?></td>
            <td class="text-center"><img src="<?php echo base_url(). 'asset/img/'.$p->foto ?>" width="100px"></td>
            <?php if($p->hak_akses=='1') { ?>
                      <td  class="text-center"><span class="badge badge-danger">Admin</span></td>
                <?php }else{?>   <td  class="text-center"><span class="badge badge-success">Pegawai</span></td>
                <?php } ?>

            <td>
                <center>
                    <a href="<?php echo base_url('admin/dataPegawai/update_data/'.$p->id_pegawai) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('admin/dataPegawai/delete_data/'.$p->id_pegawai) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Menghapus Pegawai Ini ?')" ><i class="fas fa-trash"></i></a>
                </center>
            </td>
         </tr>
        <?php endforeach;?>
    </table>
</div>
<!-- End of Main Content -->

