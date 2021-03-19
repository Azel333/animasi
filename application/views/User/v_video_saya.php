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
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="single-video-left">
                           <div class="single-video">
                              <video poster="<?php echo base_url('asset/img/user/thumbnail/').$video['thumb'];?>" style="width:100%;height:100%;" controls="controls" width="100%" height="100%">
                        <source src="<?php echo base_url('assets/video/pengguna/').$video['upload_video'] ?>">
                    </video>
                           </div>
                           <div class="single-video-title box mb-3">
                              <h2><?php echo $video['judul_video'] ?></h2>
                           </div>
                           <?php $data_user	= $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array();
                           $data	= $this->db->get_where('user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(); ?>
                           <div class="single-video-author box mb-3">
                               <img class="img-fluid" src="<?php echo base_url('asset/img/user/profile/').$data['image'];?>" alt="">
                              <p><a href="#"><strong><?php echo $data_user['nama_depan'].' '. $data_user['nama_belakang'] ?></strong></a></p>
                              <small>Upload pada  <?php echo date('d M Y', $video['tgl_upload_video']);?></small>
                           </div>
                           <div class="single-video-info-content box mb-3">
                              <h6>Deskripsi:</h6>
                              <p><?php echo$video['deskripsi_video'];?></p>
                              <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group">
                                <?php if ($this->session->userdata('role_id') == 0) {  ?>
                           
                           <form method="post" action="<?php echo base_url('index.php/komentar_video') ?>">
                                <input type="hidden" name="id_video" value="<?php echo $video['id_video'] ?>" class="form-control"/>
                                <label class="control-label">Sasaran Animasi</label>
                                <select name="sasaran" id="sasaran" class="form-control">
                                 <option selected disabled="">Pilih jenjang usia</option>
                                 <option value="anak">Anak-anak (7-12)</option>
                                 <option value="remaja">remaja (12-17)</option>
                                 <option value="dewasa">dewasa (diatas 18)</option>
                                 <option value="semua">Semua umur</option>
                                 </select>
                                 <label class="control-label">Prinsip Animasi</label>
                                <select name="prinsip" id="prinsip" class="form-control">
                                 <option selected disabled="">Pilih prinsip</option>
                                 <option value="1">Squash & Stretch</option>
                                 <option value="2">Anticipation</option>
                                 <option value="3">Staging</option>
                                 <option value="4">Straight Ahead Action and Pose to Pose</option>
                                 <option value="5">Follow Through and Overlapping Action</option>
                                 <option value="6">Slow In and Slow Out</option>
                                 <option value="7">Arcs</option>
                                 <option value="8">Secondary Action</option>
                                 <option value="9">Timing & Spacing</option>
                                 <option value="10">Exaggeration</option>
                                 <option value="11">Solid Drawing</option>
                                 <option value="12">Appeal</option>
                                 </select>
                                 <label class="control-label">Tindakan</label>
                                <select name="cek" id="cek" class="form-control">
                                 <option selected disabled="">Tindakan</option>
                                 <option value="revisi">Revisi</option>
                                 <option value="tidak revisi">Tdak Revisi</option>
                                 </select> <hr />
<div id="test"></div>

                                <?php } else { ?>
                           <?= $video['komentar'] !== '' ? '<label class="control-label">Komentar</label>' : '' ?>
                                   <p><?php echo $video['komentar'];?></p>
                                <?php } ?>
                                </form>
                        </div>
                     </div>
                  </div>
                           </div>
                        </div>
                     </div>
                    </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
      <script>
	$(document).ready(function()
	{
		$('#cek').change(function()
		{
			var cek = $('#cek').val();
			if(cek == 'revisi')
			{
				$('#test').html('<label class="control-label">Komentar <span class="required">*</span></label>\
               <textarea rows="5"  class="form-control" name="komentar" ></textarea >\
            <hr />\
<button class="btn btn-outline-primary" type="submit"> Selesai</button>');
			}
         if(cek == 'tidak revisi')
			{
				$('#test').html('<button class="btn btn-outline-primary" type="submit"> Selesai</button>');
			}
		});
	});
</script>