<!-- <link href="<?= base_url('assets/style_css/pengunjung/auth.css'); ?>" rel="stylesheet">
<div class="container-fluid auth">
	<div class="row justify-content-center">
		<div class="col-md-4 p-5">
			<div class="card border border-info">
				<form class="p-5" method="post" action="<?php echo base_url('index.php/signin') ?>">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none;">
					<h5 class="card-header info-color white-text text-center">
						<strong>MASUK</strong>
					</h5>
					<?php echo $this->session->flashdata('email_belum_teraktivasi'); ?>
					<div class="form-group">
						<label for="email" class="bmd-label-floating">Email Atau Username</label>
						<input id="email" name="email" type="text" class="form-control"  value="<?php echo set_value('email'); ?>" required>

						<?php if ($this->session->flashdata('email_salah')): ?>
							<div class="alert alert-warning" role="alert">
							  <?php echo $this->session->flashdata('email_salah'); ?>
							</div>
						<?php endif; ?>

						<?php echo form_error('email','<small class="text-danger">','</small>'); ?>
					</div>
					<div class="form-group">
						<label for="password" class="bmd-label-floating">Masukan Password</label>
						<input id="password" name="password" type="password" class="form-control" required>

						<?php if ($this->session->flashdata('password_salah')): ?>
							<div class="alert alert-warning" role="alert">
							  <?php echo $this->session->flashdata('password_salah'); ?>
							</div>
						<?php endif; ?>
						
						<?php echo form_error('password','<small class="text-danger">','</small>'); ?>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="checkbox">
								<label class="custom-label checkbox-inline">
									<input type="checkbox" name="rememberme"> <small><p class="text-dark">Ingat Saya</p></small>
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="text-right">
								<small><a href="<?php echo base_url('auth/forgot_password') ?>">Lupa Password?</a></small>
							</div>
						</div>
					</div>
					<button class="btn btn-raised btn-block btn-info" type="submit" name="masuk">
						Masuk
					</button>
				</form>
			</div>
		</div>
	</div>
</div> -->

<body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-12 p-12 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center login-main-left-header pt-4">
                        <img src="<?php echo base_url('asset/') ?>img/favicon.jpeg" class="img-fluid" alt="LOGO">
					</div>
					 <form class="p-5" method="post" action="<?php echo base_url('index.php/signin') ?>">
					 <?php echo $this->session->flashdata('email_belum_teraktivasi'); ?>
                        <div class="form-group">
                           <label>Email Atau Username</label>
						   <input type="text" name="email" class="form-control" placeholder="Masukan Username Atau Password" value="<?php echo set_value('email'); ?>" required>
						   <?php if ($this->session->flashdata('email_salah')): ?>
							<div class="alert alert-warning" role="alert">
							  <?php echo $this->session->flashdata('email_salah'); ?>
							</div>
						<?php endif; ?>

						<?php echo form_error('email','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                           <label>Password</label>
						   <input type="password" name="password" class="form-control" placeholder="Password">
						   <?php if ($this->session->flashdata('password_salah')): ?>
							<div class="alert alert-warning" role="alert">
							  <?php echo $this->session->flashdata('password_salah'); ?>
							</div>
						<?php endif; ?>
						
						<?php echo form_error('password','<small class="text-danger">','</small>'); ?>
                        </div>
                        <div class="mt-4">
                           <div class="row">
                              <div class="col-12">
                                 <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Masuk</button>
                              </div>
                           </div>
                        </div>
                     </form>
                     <!-- <div class="text-center mt-5">
                        <p class="light-gray">Don’t have an account? <a href="register.html">Sign Up</a></p>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </section>