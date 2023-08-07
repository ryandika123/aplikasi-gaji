
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>

    <div class="card" style="width: 60%;">
        <div class="card-body">

            <?php foreach ($pegawai as $p): ?>
            <form method="post" action="<?php echo base_url('admin/dataPegawai/update_data_aksi')?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nik" value="<?php echo $p->nik?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="hidden" class="form-control" name="id_pegawai" value="<?php echo $p->id_pegawai?>">
                    <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $p->nama_pegawai?>">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $p->username?>">
                </div>


                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $p->password?>">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="<?php echo $p->jenis_kelamin ?>"><?php echo $p->jenis_kelamin ?></option>
                        <option value="Laki Laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control" name="jabatan">
                        <option value="<?php echo $p->jabatan ?>"><?php echo $p->jabatan ?></option>
                        <?php foreach($jabatan as $j) : ?>
                        <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                    <?php endforeach; ?>
                    </select>
                      <?php echo form_error('jabatan','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type=date class="form-control" name="tanggal_masuk" value="<?php echo $p->tanggal_masuk?>">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="<?php echo $p->status ?>"><?php echo $p->status?></option>
                        <option value="Pegawai Tetap">Pegawai Tetap</option>
                        <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea value="<?php echo $p->alamat?>" class="form-control" name="alamat"><?php echo $p->alamat?></textarea>
                </div>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="<?php echo $p->telepon?>">
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" name="foto" value="<?php echo $p->foto?>">
                </div>

                 <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="<?php echo $p->hak_akses ?>">
                            <?php if($p->hak_akses=='1'){
                                echo "Admin";
                            }else{
                                echo "Pegawai";
                            } ?>
                        </option>
            
                        <option value="1">Admin</option>
                        <option value="2">Pegawai</option>
                    </select>
                    <?php echo form_error('hak_akses','<div class="text-danger small">','</div>') ?>
                </div>


                <button class="btn btn-primary" name="simpan">Proses Perubahan</button>
            
            </form>
        <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- End of Main Content -->

