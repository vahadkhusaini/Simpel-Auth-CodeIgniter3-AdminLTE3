<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="../../index2.html"><b>Toko</b> ENI</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Masuk ke dalam sistem</p>
				<div id="msg"></div>
				<?= $this->session->flashdata('msg'); ?>
				<form action="javascript:void(0)" id="login_form" method="post">
					<div class="form-group mb-3">
						<input type="text" class="form-control" name="username" id="username"
							placeholder="Masukkan Username">

					</div>
					<div class="form-group mb-3">
						<input type="password" class="form-control" name="password" id="password"
							placeholder="Password">

					</div>
					<div class="row">
						<button type="submit" class="btn-lg btn-primary btn-block">Masuk</button>
						<!-- <div class="d-flex justify-content-center">
							<div class="load spinner-border" role="status">
							</div>
							
						</div> -->
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
	<!-- jquery-validation -->
	<script src="<?= base_url('assets/'); ?>plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?= base_url('assets/'); ?>plugins/jquery-validation/additional-methods.min.js"></script>

	<script>
		$(document).ready(function () {

			//var $loading = $('.load').hide();
            // $(document)
				// .ajaxStart(function () {
                //     $('.btn-lg').prop('disabled', true);
				// })
				// .ajaxStop(function () {
                //     $('.btn-lg').prop('disabled', false);
				// });

			if ($("#login_form").length > 0) {
				$("#login_form").validate({
					rules: {
						username: {
							required: true
						},

						password: {
							required: true
						},
					},
					messages: {

						username: {
							required: "Masukan username"
						},
						password: {
							required: "Masukan password"
						},
					},
					errorElement: 'span',
					errorPlacement: function (error, element) {
						error.addClass('invalid-feedback');
						element.closest('.form-group').append(error);
					},
					highlight: function (element, errorClass, validClass) {
						$(element).addClass('is-invalid');
					},
					unhighlight: function (element, errorClass, validClass) {
						$(element).removeClass('is-invalid');
					},

					submitHandler: function (form) {
						$.ajax({
							type: 'POST',
							url: '<?=base_url('auth');?>',
							dataType: 'json',
							data: $('#login_form').serialize(),
							success: function (output) {
								if (output.error == true) {
									$('#msg').show().html(
										'<div class= "alert alert-danger" role = "alert"><h5><i class="icon fas fa-ban"></i> ' +
										output.message + '</h5></div>');
									console.log(output.error);
									$('#login_form')[0].reset();
									$("#username").focus();
								} else if (output.error == false) {
									window.location.replace("dashboard");						
								}
							}
						});
					}
				})
			}
		});

	</script>

</body>

</html>
