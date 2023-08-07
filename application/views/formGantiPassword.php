<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<div class="card" style="width:40%">
		<div class="card-body">
			<form method="post" action="<?php echo base_url('gantiPassword/aksi_gantipassword')?>">
				<div class="form-group">
					 <label>Password Baru</label>
					 <input type="password" name="passBaru" class="form-control">
					 <?php echo form_error('passBaru','<div class="text-danger small">','</div>') ?>
				</div>

				<div class="form-group">
					 <label>Konfirmasi Password Baru</label>
					 <input type="password" name="ulangPass" class="form-control">
                       <?php echo form_error('ulangPass','<div class="text-danger small">','</div>') ?>
				</div>

				<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>      Simpan</button>
			</form>
		</div>
	</div>
	
</div>