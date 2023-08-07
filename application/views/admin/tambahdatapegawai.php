
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>

    <div class="card" style="width: 90%;">
        <div class="card-body">
            <form method="post" action="<?php echo base_url('admin/dataPegawai/tambah_data_aksi')?>" enctype="multipart/form-data">

                <div class="row">
                  <div class="col">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nik">
                    <?php echo form_error('nik','<div class="text-danger small">','</div>') ?>
                  </div>

                  <div class="col">
                    <label>Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama_pegawai">
                    <?php echo form_error('nama_pegawai','<div class="text-danger small">','</div>') ?>
                  </div>

                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" name="username">
                        <?php echo form_error('nama_pegawai','<div class="text-danger small">','</div>') ?>
                  </div>
                </div>


                <div class="row">
                  <div class="col">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                    <?php echo form_error('nik','<div class="text-danger small">','</div>') ?>
                  </div>

                  <div class="col">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki Laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                      <?php echo form_error('jenis_kelamin','<div class="text-danger small">','</div>') ?>
                  </div>


                  <div class="col">
                    <label>Jabatan</label>
                    <select class="form-control" name="jabatan">
                        <option value="">Pilih Jabatan</option>
                        <?php foreach($jabatan as $j) : ?>
                        <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                    <?php endforeach; ?>
                    </select>
                      <?php echo form_error('jabatan','<div class="text-danger small">','</div>') ?>
                  </div>

                </div>

                <br>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="">Pilih Status</option>
                        <option value="Pegawai Tetap">Pegawai Tetap</option>
                        <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                    </select>
                      <?php echo form_error('status','<div class="text-danger small">','</div>') ?>
                </div>


                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" class="form-control" name="tanggal_masuk">
                    <?php echo form_error('tanggal_masuk','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea cols="2" rows="2" class="form-control" name="alamat"></textarea>
                    <?php echo form_error('alamat','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control" name="telepon">
                    <?php echo form_error('telepon','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                    <?php echo form_error('foto','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                            <option>Pilih Hak Akses</option>
                            <option value="1">Admin</option>
                            <option value="2">Pegawai</option>
                    </select>
                    <?php echo form_error('hak_akses','<div class="text-danger small">','</div>') ?>
                </div>


                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            
            </form>
        </div>
    </div>

</div>
<!-- End of Main Content -->

