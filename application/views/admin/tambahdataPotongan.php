<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>

    <div class="card" style="width: 60%;">
        <div class="card-body">
            <form method="post" action="<?php echo base_url('admin/potonganGaji/tambah_data_aksi')?>">

                <div class="form-group">
                    <label>Jenis Potongan</label>
                    <input type="text" class="form-control" name="potongan">
                    <?php echo form_error('potongan','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Jumlah Potongan</label>
                    <input type="number" class="form-control" name="jml_gaji">
                    <?php echo form_error('jml_gaji','<div class="text-danger small">','</div>') ?>
                </div>

                <button class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->

