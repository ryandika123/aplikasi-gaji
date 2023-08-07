

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>


     <a href="<?php echo base_url('admin/potonganGaji/tambah_data') ?>" class="btn btn-sm btn-success mb-2 mt-2"><i class="fas fa-plus"></i> Tambah Data</a>
     <br>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Jenis Potongan</th>
            <th class="text-center">Jumlah Potongan</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no=1;  foreach ($pot_gaji as $p): ?>
         <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $p->potongan?></td>
            <td class="text-center">Rp. <?php echo number_format($p ->jml_gaji,0,',','.')?></td>
            <td>
                <center>
                        <a href="<?php echo base_url('admin/potonganGaji/update_data/'.$p->id) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo base_url('admin/potonganGaji/delete_data/'.$p->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Menghapus Pegawai Ini ?')" ><i class="fas fa-trash"></i></a>
                </center> 
            </td>

         </tr>
        <?php endforeach;?>
    </table>
</div>
<!-- End of Main Content -->

