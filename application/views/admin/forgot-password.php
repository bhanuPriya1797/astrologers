<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin | Forgot Password</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/ionicons.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/ogpm.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/blue.css') ?>">
</head>
<body class="hold-transition login-page" style="height: auto;">
<div class="login-box">
	<div class="login-logo">Forgot Password</div>
	
	<div class="login-box-body">
		<p class="login-box-msg"></p>

		<?php  
		if($this->session->flashdata('error')){
				echo $this->session->flashdata('error');
		} ?>

		<?php  
		if($this->session->flashdata('message')){
				echo $this->session->flashdata('message');
		} ?>
			
		<form method="POST">
			<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" placeholder="Email" required>
				<span class="glyphicon form-control-feedback"></span>
			</div>
			<div class="text-center">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Send Email</button>
			</div>
		</form>
	</div>
</div>
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
<script>
	$(function(){
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
</script>
</body>
</html>