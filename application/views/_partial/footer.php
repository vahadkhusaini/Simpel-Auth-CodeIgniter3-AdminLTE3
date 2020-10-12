<footer class="main-footer">
    <strong>Starter Codeigniter</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Bootstrap 4 -->
<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>

<!-- InputMask -->
<script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->

<!-- jQuery UI 1.11.4 -->
<!-- date-range-picker -->
<script src="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- jquery-validation -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/flatpickr/package/dist/flatpickr.js"></script>

<script src="<?= base_url('assets/'); ?>plugins/cleave/dist/cleave.js"></script>
<script src="<?= base_url('assets/'); ?>myjs/myscript.js"></script>

</body>
</html>
<script>
$(document).ready(function () {

	$("input[name='tanggal']").flatpickr({
		altInput: true,
		altFormat: "d/m/Y",
		dateFormat: "Y/m/d",
		defaultDate: "today"
	});

	$("#tanggal1").flatpickr({
		altInput: true,
		altFormat: "d/m/Y",
		dateFormat: "Y-m-d",
		defaultDate: "today"
	});

	$("#tanggal2").flatpickr({
		altInput: true,
		altFormat: "d/m/Y",
		dateFormat: "Y-m-d",
		defaultDate: "today"
	});

	$("#tanggal-pelunasan").flatpickr({
		altInput: true,
		altFormat: "d/m/Y",
		dateFormat: "Y/m/d",
		defaultDate: "today"
	});
	
	const tanggal = $("input[name='tanggal']").val();
	const tgl_format = moment(tanggal).format('DD/MM/YYYY');
	$("#tempo").attr('readonly', true);
	$("#tempo").val(0);
	$("input[name='tanggal_tempo']").val(tgl_format);

	function kredit() {
		const tempo = $("#tempo").val();
		const tanggal = $("input[name='tanggal']").val();
		// const format = moment(tanggal).format('D/MM/YYYY');

		const tgl_tempo = moment(tanggal).add(tempo, 'days')
		const tgl_fix = moment(tgl_tempo).format('DD/MM/YYYY');
		$("input[name='tanggal_tempo']").val(tgl_fix);

		console.log(tempo, tanggal, tgl_fix);
	}

	function tunai() {
		const tanggal = $("input[name='tanggal']").val();
		const tgl_format = moment(tanggal).format('DD/MM/YYYY');
		$("#tempo").attr('readonly', true);
		$("#tempo").val(0);
		$("input[name='tanggal_tempo']").val(tgl_format);
	}

	$("#tunai").on('click', function () {
		tunai();
	});

	$("#kredit").on('click', function () {
		$("#tempo").val(null);
		$("#tempo").attr('readonly', false);
	});

	$("#tempo").on('keyup', function () {
		kredit();
	  });
	  
});

</script>