<div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
               <img class="img-fluid" alt="" style="height: 289.23px;" src="<?php echo base_url('asset/img/user/background/').$data_user['back_image'] ?>">
               <div class="channel-profile">
                  <img class="channel-profile-img" alt="" src="<?php echo base_url('asset/img/user/profile/').$user['image'];?>">
                  <!-- <div class="social hidden-xs">
                     Social &nbsp;
                     <a class="fb" href="#">Facebook</a>
                     <a class="tw" href="#">Twitter</a>
                     <a class="gp" href="#">Google</a>
                  </div> -->
               </div>
            </div>
            <div class="single-channel-nav">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="channel-brand" href="#"><?php echo ($data_user['nama_depan']);?> <?php echo $data_user['nama_belakang'];?></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/profile') ?>">Tentang Saya</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/info') ?>">Ganti Profil</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="<?php echo base_url('index.php/ganti_password') ?>">Ganti Password <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/ganti_foto') ?>">Ganti Foto</a>
                        </li>
                        <?php
								if ($this->session->userdata('role_id') == 0) { ?>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/signup') ?>">Tambah Pengguna</a>
						</li>
                  <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/video_user') ?>">Video User</a>
                        </li>
						<?php } else { ?>
                     <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/video_saya') ?>">Video Saya</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/upload') ?>">Upload Video</a>
                        </li>
                  <?php }
								?>
                     </ul>
                     <div class="my-2 my-lg-0">
                         <button class="btn btn-outline-danger btn-sm" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</button>
                     </div>
                  </div>
               </nav>
            </div>
            <div id="content-wrapper">
            <div class="container-fluid upload-details">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
						<h6>Settings</h6>
						<p>
									Pastikan Anda memasukkan password baru setidaknya minimal 6 karakter dan terdiri dari kombinasi karakter, angka dan simbol agar password lebih aman
								</p>
						<?php echo $this->session->flashdata('password_sudah_pernah'); ?>
							<?php echo $this->session->flashdata('ganti_password_berhasil'); ?>
							<?php echo $this->session->flashdata('password_lama_salah'); ?>
                     </div>
                  </div>
               </div>
               <form method="post" action="<?php echo base_url('index.php/ganti_password') ?>">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group">
                           <label class="control-label">Password Lama <span class="required">*</span></label>
						   <input class="form-control border-form-control" type="password" name="password_lama" title="Enter password" required>
						   <?php echo form_error('password_lama'); ?>
                        </div>
                     </div>
					</div>
					<div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Password Baru <span class="required">*</span></label>
                           <input class="form-control border-form-control"  minlength="6" type="password" name="password_baru1" title="Enter password">
                        </div>
                  </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                           <label class="control-label">Password Baru <span class="required">*</span></label>
						   <input class="form-control border-form-control" minlength="6" type="password" name="password_baru2" title="Enter password">
						   <?php echo form_error('password_baru2'); ?>
                        </div>
                     </div>
                  </div>
				  <div class="row">
                     <div class="col-sm-12 text-right">
						 <button type="submit" class="btn btn-success border-none"> Simpan Perubahan </button>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <footer class="sticky-footer ml-0">
               <div class="container">
                  <div class="row no-gutters">
                     <div class="col-lg-6 col-sm-6">
                         <p class="mt-1 mb-0"><strong class="text-dark">Vidoe</strong>. 
                           <small class="mt-0 mb-0"><a class="text-primary" target="_blank" href="https://templatespoint.net/">TemplatesPoint</a>
                           </small>
                        </p>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      