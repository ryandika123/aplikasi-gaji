
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jabatan</h1>
    </div>

     <div class="navbar-form navbar-right">
        
        <?php echo form_open('admin/dataJabatan/search') ?>
        
        <input type="text" name="keyword" class="form-control" placeholder="Search">
        <button type="submit" class="btn btn-warning mt-3" name="bcari">Cari</button>
        <button type="submit" class="btn btn-danger mt-3" name="bcari">Reset</button>

        <?php echo form_close() ?>

    </div>

     <a href="<?php echo base_url('admin/dataJabatan/tambah_data') ?>" class="btn btn-sm btn-success mb-2 mt-2"><i class="fas fa-plus"></i> Tambah Data</a>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tunjangan Transport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Total Gaji</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no=1;  foreach ($jabatan as $j): ?>
         <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $j->nama_jabatan?></td>
            <td class="text-center">Rp. <?php echo number_format($j ->gaji_pokok,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($j ->transport,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($j ->uang_makan,0,',','.')?></td>
            <td class="text-center">Rp. <?php echo number_format($j ->gaji_pokok + $j->transport + $j->uang_makan,0,',','.')?></td>
            <td>
                <center>
                    <a href="<?php echo base_url('admin/dataJabatan/update_data/'.$j->id_jabatan) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('admin/dataJabatan/delete_data/'.$j->id_jabatan) ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                </center>
            </td>
         </tr>
        <?php endforeach;?>
    </table>
</div>
<!-- End of Main Content -->

