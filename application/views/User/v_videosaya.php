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
                     <li class="nav-item active">
                           <a class="nav-link" href="<?php echo base_url('index.php/video_saya') ?>">Video Saya <span class="sr-only">(current)</span></a>
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
            <div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Pilih berdasar <i class="fa fa-caret-down" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="<?php echo base_url('index.php/video_saya') ?>"><i class="fas fa-fw fa-star"></i> &nbsp; Semua</a>
                                 <a class="dropdown-item" href="<?php echo base_url('index.php/video_saya/tidak') ?>"><i class="fas fa-fw fa-check-circle"></i> &nbsp; Tidak Revisi</a>
                                 <a class="dropdown-item" href="<?php echo base_url('index.php/video_saya/revisi') ?>"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Revisi</a>
                              </div>
                           </div>
                           <h6>Videos</h6>
                        </div>
                     </div>
                     <?php
                     if ($this->uri->segment(2) === 'revisi') {
                        $cek = 'revisi';
                        $query_user = $this->db->get_where('video', array('id_meta'=> $this->session->userdata('id_meta'), 'cek' => $cek))->result_array();
                     }
                     elseif ($this->uri->segment(2) === 'tidak') {
                        $cek = 'tidak revisi';
                        $query_user = $this->db->get_where('video', array('id_meta'=> $this->session->userdata('id_meta'), 'cek' => $cek))->result_array();
                     } 
                     else {
                        $query_user = $this->db->get_where('video', array('id_meta'=> $this->session->userdata('id_meta')))->result_array();
                     }
                     
	

	foreach ($query_user as $row)
	{
?>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="<?= base_url('index.php/video_saya/' . $row['id_video']) ?>"><i class="fas fa-play-circle"></i></a>
                              <a href="<?= base_url('index.php/video_saya/' . $row['id_video']) ?>"><img class="img-fluid" src="<?php echo base_url('asset/img/user/thumbnail/').$row['thumb'];?>" alt=""></a>
                           </div>
                           <div class="video-card-body">
                           <div class="row">
                           <div class="col-6">
                              <div class="video-title">
                                 <a href="<?= base_url('index.php/video_saya/' . $row['id_video']) ?>"><?= $row['judul_video'] ?></a>
                              </div>
                              <div class="video-page text-success">
                                 <?= $row['cek'] ?>  <a title="" data-placement="top" data-toggle="tooltip" href="<?= base_url('index.php/video_saya/' . $row['id_video']) ?>" data-original-title="<?= $row['cek'] ?>"><?= $row['cek'] == 'revisi' ? '<i class="fas fa-fw fa-times-circle text-failed"></i>' : (!$row['cek'] ? '' : '<i class="fas fa-check-circle text-success"></i>') ?></a>
                              </div>
                              <div class="video-view">
                                 <i class="fas fa-calendar-alt"></i> <?php echo date('d M Y', $row['tgl_upload_video']); ?>
                              </div>
                              </div>
                              <div class="col-6">
                              <div class="video-view">
                                 <?php if ($row['cek'] === 'tidak revisi') { ?>
                                    <a class="btn btn-primary" href="<?php echo base_url() . 'index.php/cetak/'.$row['id_video']; ?>">
                                       <span class="glyphicon glyphicon-print"></span> Cetak
                                    </a>
                                 <?php } ?>
                                 </div>
                              </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
	}
?>
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