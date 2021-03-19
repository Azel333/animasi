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
						<?php } else { ?>
                     <li class="nav-item">
                           <a class="nav-link" href="<?php echo base_url('index.php/video_saya') ?>">Video Saya</a>
                        </li>
                     <li class="nav-item active">
                           <a class="nav-link" href="<?php echo base_url('index.php/upload') ?>">Upload Video <span class="sr-only">(current)</span></a>
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
             <?php echo $this->session->flashdata('status_upload'); ?>
		<form id="upload_form" enctype="multipart/form-data">
            <div class="container-fluid upload-details">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Upload Details</h6>
                     </div>
                  </div>
                  <div class="col-lg-2">
                     <!-- <div class="imgplace"></div> -->
                     <div class="form-group">
						<input id="thumb" type="file" name="thumb" class="dropify" data-height="123">
					</div>
                  </div>
                  <div class="col-lg-10">
                      
                     <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="video" id="fileku">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                     <div class="osahan-progress">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                            <span id="status" class="sr-only"></span>
                        </div>
                     </div>
                     <div class="custom-file">
                                        <label for="f_du">Video Length</label>
                                        <input type="number" name="f_du" class="form-control" id="f_du" readonly/>
                                    </div>
                  </div>
    </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="osahan-form">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="title">Video Title</label>
                                 <input type="text" name="title" placeholder="" id="title" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="description">About</label>
                                 <textarea name="description" rows="3" id="description" name="description" class="form-control">Description</textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="osahan-area text-center mt-3">
                        <button class="btn btn-outline-primary" type="button" name="edit" onclick="uploadFile()">
												upload
                                            </button>
                     </div>
                  </div>
               </div>
            </div>
            </form>
<audio id="audio"></audio>
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
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
<script type="text/javascript" src="<?php echo base_url('assets/dropify/dist/js/dropify.min.js')?>"></script>
      <script>
      $('.dropify').dropify(
			{
				messages:
				{
					default: 'Masukan Thumbnail',
					replace: 'Ganti',
					remove:  'Hapus',
					error:   'error'
				}
			});
// Code to get duration of audio /video file before upload - from: http://coursesweb.net/

//register canplaythrough event to #audio element to can get duration
var f_duration =0;  //store duration
document.getElementById('audio').addEventListener('canplaythrough', function(e){
  //add duration in the input field #f_du
  f_duration = Math.round(e.currentTarget.duration);
  document.getElementById('f_du').value = f_duration;
  URL.revokeObjectURL(obUrl);
});

//when select a file, create an ObjectURL with the file and add it in the #audio element
var obUrl;
document.getElementById('fileku').addEventListener('change', function(e){
  var file = e.currentTarget.files[0];
  //check file extension for audio/video type
  if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)){
    obUrl = URL.createObjectURL(file);
    document.getElementById('audio').setAttribute('src', obUrl);
  }
});

function uploadFile() {
	var file = document.getElementById("fileku").files[0];
	var duration = document.getElementById("f_du");
	var title = $('#title').val();
	var thumb = document.getElementById("thumb").files[0];
	var description = $('#description').val();
   console.log(thumb);
    var formdata = new FormData();
	formdata.append("video", file);
	formdata.append("f_du", duration);
	formdata.append("title", title);
	formdata.append("thumb", thumb);
	formdata.append("description", description);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressUpload, false);
    ajax.open("POST", "<?php echo base_url('index.php/upload_video');?>", true);
    ajax.send(formdata);
}

function progressUpload(event){
    var percent = (event.loaded / event.total) * 100;
    document.getElementById("progress-bar").style.width = Math.round(percent)+'%';    
    document.getElementById("status").innerHTML = Math.round(percent)+"%";
	if(event.loaded==event.total){
		window.location.href = '<?php echo base_url('index.php/upload');?>';
	}
}
</script>