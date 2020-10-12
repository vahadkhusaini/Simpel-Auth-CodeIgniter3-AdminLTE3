// mengambil base_url pada file view/partial/navbar.php
const base_url = $('#base_url').data('url');

function get_swal_notif(output) {
	if (output.status == 200) {
		Swal.fire({
			type: 'success',
			position: 'top',
			title: output.message,
			showConfirmButton: false,
			timer: 1000,
		})
		window.setTimeout(function () {
			location.reload();
		}, 1070);

	} else {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: output.message,
			showConfirmButton: false,
			timer: 1050,
		})
	}
}

$('#logout').on('click', function (e) {
	e.preventDefault();
	const url = $('#logout').attr('href');

	Swal.fire({
		type: 'warning',
		title: 'Keluar dari sistem?',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		confirmButtonText: 'Keluar',
		cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			document.location.href = url;
		}
	})
});

$('#change-password').validate({
	rules: {
		oldpass: {
			required: true,
			minlength: 6
		},
		newpass: {
			required: true,
			minlength: 6
		},
	},
	messages: {
		oldpass: {
			required: "harus di isi",
			minlength: "Minimal password 6 karakter"
		},
		newpass: {
			required: "harus di isi",
			minlength: "Minimal password 6 karakter"
		},
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
		error.addClass('invalid-feedback');
		element.closest('.col-sm-8').append(error);
	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
	},
	submitHandler: function (form) {
		console.log('success');
		const href = $('#change-password').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#change-password').serialize(),
			dataType: 'json',
			success: function (output) {

				if (output.error == true) {
					Swal.fire({
						type: 'error',
						position: 'top',
						title: output.message,
						showConfirmButton: false,
						timer: 1200,
					})
				} else if (output.error == false) {
					console.log("success");
					Swal.fire({
						type: 'success',
						position: 'top',
						title: output.message,
						showConfirmButton: false,
						timer: 1000,
					})
					window.setTimeout(function () {
						location.reload();
					}, 1100);
				}
			}
		});
	}
});
// Master Pengguna

$('.edit-pengguna').on('click', function () {
	const Id = $(this).data('id');

	$.ajax({
		type: 'POST',
		url: base_url + 'master/pengguna/get_byId',
		data: {
			Id: Id
		},
		dataType: 'json',
		success: function (usr) {
			$("input[name='id_pengguna']").val(usr.id_pengguna);
			$("input[name='nama_pengguna']").val(usr.nama_pengguna);
			$("input[name='nama_lengkap']").val(usr.nama_lengkap);
			$(" input[name='status'][value=" + usr.status + "]").prop("checked", "true");
		}
	})
});

$('#edit-pengguna').validate({
	rules: {
		nama_supplier: {
			required: true
		},
		no_telepon: {
			required: true
		},
		alamat: {
			required: true
		},
	},
	messages: {
		nama_supplier: {
			required: "harus di isi"
		},
		no_telepon: {
			required: "harus di isi"
		},
		alamat: {
			required: "harus di isi"
		},
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
		error.addClass('invalid-feedback');
		element.closest('.col-sm-8').append(error);
	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
	},
	submitHandler: function (form) {
		const href = $('#edit-pengguna').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#edit-pengguna').serialize(),
			dataType: 'json',
			success: function (output) {
				if (output.status == 200) {
					Swal.fire({
						title: 'Data Tersimpan',
						showConfirmButton: false,
						timer: 1000,
					})
					location.reload();
				}
			}
		});
	}
});

$('#tambah_pengguna').validate({
	rules: {
		nama_pengguna: {
			required: true
		},
		nama_lengkap: {
			required: true
		},
		password: {
			required: true,
			minlength: 6
		},
		hakakses: {
			required: true
		},
	},
	messages: {
		nama_pengguna: {
			required: "Nama Pengguna harus diisi"
		},
		nama_lengkap: {
			required: "Nama Lengkap harus diisi"
		},
		password: {
			required: "Password harus diisi",
			minlength: "Minimal password 6 karakter"
		},
		hakakses: {
			required: "Hak Akses harus diisi"
		},
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
		error.addClass('invalid-feedback');
		element.closest('.col-sm-8').append(error);
	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
	},
	submitHandler: function (form) {
		const href = $('#tambah_pengguna').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#tambah_pengguna').serialize(),
			dataType: 'json',
			success: function (output) {
				if (output.status == 200) {
					Swal.fire({
						type: 'success',
						position: 'top',
						title: output.message,
						showConfirmButton: false,
						timer: 1000,
					})
					window.setTimeout(function () {
						location.reload();
					}, 1070);

				} else {
					Swal.fire({
						type: 'error',
						position: 'top',
						title: output.message,
						showConfirmButton: false,
						timer: 1050,
					})
				}
			}
		});
	}
});

$('#edit_pengguna').validate({
	rules: {
		nama_pengguna: {
			required: true
		},
		nama_lengkap: {
			required: true,
			minlength: 6
		},
	},
	messages: {
		nama_pengguna: {
			required: "Nama Pengguna harus diisi"
		},
		password: {
			required: "Nama Lengkap harus diisi",
			minlength: "Minimal 6 karakter"
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
		const href = $('#edit_pengguna').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#edit_pengguna').serialize(),
			dataType: 'json',
			success: function (output) {
				if (output.status == 200) {
					Swal.fire({
						type: 'success',
						position: 'top',
						title: output.message,
						showConfirmButton: false,
						timer: 1000,
					})
					window.setTimeout(function () {
						location.reload();
					}, 1053);

				} else {
					Swal.fire({
						type: 'error',
						position: 'top',
						title: output.message,
						showConfirmButton: false,
						timer: 1050,
					})
				}
			}
		});
	}
});

$('.delete-user').on('click', function () {
	const Id = $(this).data('id');
	const Name = $(this).data('nama');
	console.log(Id, Name);
	Swal.fire({
		type: 'warning',
		title: 'Apakah anda yakin?',
		text: 'Pengguna ' + Name + ' akan dihapus',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal',
		preConfirm: (pre) => {
			console.log("TRUE");
			$.ajax({
				type: 'POST',
				url: base_url + 'master/pengguna/hapus',
				data: {
					Id: Id
				},
				dataType: 'json',
				success: function (output) {
					get_swal_notif(output);
				}
			})
		},
	})
})