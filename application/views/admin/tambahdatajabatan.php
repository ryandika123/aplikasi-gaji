
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>

    <div class="card" style="width: 60%;">
        <div class="card-body">
            <form method="post" action="<?php echo base_url('admin/dataJabatan/tambah_data_aksi')?>">

                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="text" class="form-control" name="nama_jabatan">
                    <?php echo form_error('nama_jabatan','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="text" class="form-control" name="gaji_pokok">
                    <?php echo form_error('gaji_pokok','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Transport</label>
                    <input type="text" class="form-control" name="transport">
                    <?php echo form_error('transport','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Uang Makan</label>
                    <input type="text" class="form-control" name="uang_makan">
                    <?php echo form_error('uang_makan','<div class="text-danger small">','</div>') ?>
                </div>

                <button class="btn btn-primary" name="simpan">Simpan</button>
            
            </form>
        </div>
    </div>

</div>
<!-- End of Main Content -->

