
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>

    <div class="card" style="width: 60%;">
        <div class="card-body">

            <?php foreach ($pot_gaji as $j): ?>
            <form method="post" action="<?php echo base_url('admin/potonganGaji/update_data_aksi')?>">

                <div class="form-group">
                    <label>Jenis Potongan</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $j->id?>">
                    <input type="text" class="form-control" name="potongan" value="<?php echo $j->potongan?>">
                </div>

                <div class="form-group">
                    <label>Jumlah Potongan Gaji</label>
                    <input type="number" class="form-control" name="jml_gaji" value="<?php echo $j->jml_gaji?>">
                </div>

                <button class="btn btn-primary" name="simpan">Proses Perubahan</button>
            </form>
            
        <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- End of Main Content -->

