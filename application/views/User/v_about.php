<div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
               <img class="img-fluid" style="height: 289.23px;" alt="" src="<?php echo base_url('asset/img/user/background/').$data_user['back_image'] ?>">
               <div class="channel-profile">
                  <img class="channel-profile-img" alt="" src="<?php echo base_url('asset/img/user/profile/').$user['image'];?>">
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
                        <li class="nav-item active">
                           <a class="nav-link" href="<?php echo base_url('index.php/profile') ?>">Tentang Saya <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/info') ?>">Ganti Profil</a>
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
                        <h6>Profil Pribadi</h6>
                     </div>
                  </div>
               </div>
                  <div class="row">
									<div class="col-lg-4">
										<p>Nama</p>
										<p>Username</p>
										<p>Email</p>
										<p>Kelamin</p>
										<p>No. Handphone</p>
										<p>Tempat,Tanggal Lahir</p>
										<p>Usia</p>
									</div>
									<div class="col-lg-8">
										<p class="text-capitalize">
											:
											<?php echo $data_user['nama_depan'];?>
											<?php echo $data_user['nama_belakang'];?>
										</p>
										<p>
											:
											<?php echo $user['username'];?>
										</p>
										<p>
											:
											<?php echo $user['email'];?>
										</p>
										<p>
											:
											<?php echo $data_user['kelamin'];?>
										</p>
										<p>
											:
											<?php echo $data_user['nomor_hp'];?>
										</p>
										<p>
											:
											<?php echo $data_user['tempat_lahir'];
											if ($data_user['tempat_lahir'] && $data_user['tgl_lahir'])
											{
												echo ", ";
											}
											if ($data_user['tgl_lahir'] != '')
											{
												echo date('d M Y', strtotime($data_user['tgl_lahir']));
											}?>
										</p>
										<p>
											:
											<?php
												if ($data_user['tgl_lahir'] != '')
												{
													$awal  = date_create($data_user['tgl_lahir']);
													$akhir = date_create(); // waktu sekarang
													$diff  = date_diff( $awal, $akhir );
													echo $diff->y . ' tahun';
												}
											?>
										</p>
									</div>
								</div>
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
      