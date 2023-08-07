
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>

    <div class="card" style="width: 60%;">
        <div class="card-body">

            <?php foreach ($jabatan as $j): ?>
            <form method="post" action="<?php echo base_url('admin/dataJabatan/update_data_aksi')?>">

                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="hidden" class="form-control" name="id_jabatan" value="<?php echo $j->id_jabatan?>">
                    <input type="text" class="form-control" name="nama_jabatan" value="<?php echo $j->nama_jabatan?>">
                </div>

                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="text" class="form-control" name="gaji_pokok" value="<?php echo $j->gaji_pokok?>">
                </div>

                <div class="form-group">
                    <label>Transport</label>
                    <input type="text" class="form-control" name="transport" value="<?php echo $j->transport?>">
                </div>

                <div class="form-group">
                    <label>Uang Makan</label>
                    <input type="text" class="form-control" name="uang_makan" value="<?php echo $j->uang_makan?>">
                </div>

                <button class="btn btn-primary" name="simpan">Proses Perubahan</button>
            
            </form>
        <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- End of Main Content -->

