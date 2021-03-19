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
                        <li class="nav-item active">
                           <a class="nav-link" href="<?php echo base_url('index.php/info') ?>">Ganti Profil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/ganti_password') ?>">Ganti Password</a>
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
						<?php echo $this->session->flashdata('info_dasar'); ?>
                     </div>
                  </div>
               </div>
               <?php echo form_open_multipart('index.php/info');?>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Nama Depan <span class="required">*</span></label>
                           <input class="form-control border-form-control text-capitalize"  name="nama_depan" value="<?php echo $data_user['nama_depan'] ?>" required type="text" <?= $this->session->userdata('role_id') == 1 ? 'disabled' : ''  ?>>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Nama Belakang <span class="required">*</span></label>
                           <input class="form-control border-form-control text-capitalize"  name="nama_belakang" value="<?php echo $data_user['nama_belakang'] ?>" required type="text" <?= $this->session->userdata('role_id') == 1 ? 'disabled' : ''  ?>>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Phone <span class="required">*</span></label>
                           <input id="nomor_hp" class="form-control border-form-control" name="nomor_hp" value="<?php echo $data_user['nomor_hp'] ?>" type="text">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Email <span class="required">*</span></label>
                           <input class="form-control border-form-control " value="<?php echo $user['email'] ?>" name="email" disabled="" type="email">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Tempat Lahir <span class="required">*</span></label>
						   <input id="nomor_hp" class="form-control border-form-control" <?= $this->session->userdata('role_id') == 1 ? 'disabled' : ''  ?> list="tempat_lahir_list" type="text" name="tempat_lahir" value="<?php echo $data_user['tempat_lahir'] ?>">
						   <datalist id="tempat_lahir_list">
								<option>Jakarta</option>
								<option>Bandung</option>
							</datalist>
							<?php echo form_error('tempat_lahir','<small>','</small>'); ?>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Tanggal Lahir <span class="required">*</span></label>
                           <input class="form-control border-form-control tgl_lahir" <?= $this->session->userdata('role_id') == 1 ? 'disabled' : ''  ?> name="tgl_lahir" value="<?php if ($data_user['tgl_lahir'] != ''){ echo date('d-m-Y', strtotime($data_user['tgl_lahir'])); }?>">
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
      
      <script type="text/javascript">
		$('.tgl_lahir').datepicker(
		{
			changeMonth: true,
			changeYear: true,
			dateFormat: 'dd-mm-yy',
			yearRange: '-60y:c+nn',
			maxDate: '-3y'
		});

		$( '#nomor_hp' ).mask('0000−0000−00000');
</script>