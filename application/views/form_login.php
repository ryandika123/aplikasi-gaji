
<style type="text/css">
    body {
        background: sandybrown;
    }
</style>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                    </div>
                                    <hr>
                                    <?php echo $this->session->flashdata('pesan')?>
                                    <form method="post" class="user" action="<?php echo base_url('welcome')?>">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda !">
                                                <?php echo form_error('username', '<div class="text-danger small ml-2">','</div'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda !">
                                        
                                                <?php echo form_error('password', '<div class="text-danger small ml-2">','</div'); ?>
                                        </div>

                        
                                        <button class="btn btn-primary btn-user btn-block mt-3" type="submit">
                                            Login
                                        </button>
                                
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    