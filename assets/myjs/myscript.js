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



$('#edit-profile').validate({
	rules: {
		username: {
			required: true
		},
		name: {
			required: true
		},
	},
	messages: {
		username: {
			required: "harus di isi"
		},
		name: {
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
		console.log('success');
		const href = $('#edit-profile').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#edit-profile').serialize(),
			dataType: 'json',
			success: function (output) {

				if (output.error == true) {
					Swal.fire({
						type: 'error',
						position: 'top',
						title: 'Gagal',
						showConfirmButton: false,
						timer: 1000,
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
					}, 1070);
				}
			}
		});
	}
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

// Master Barang 
show_data() 

function show_data() {
	$.ajax({
		type: 'ajax',
		url: base_url + 'master/barang/get_all_data',
		dataType: 'json',
		async: false,
		success: function (data) {
			var html = '';
			let i;
			let no = 1;
			for (i = 0; i < data.length; i++) {
				console.log(data);
				html += '<tr>' +
					'<td>' + no + '</td>' +
					'<td>' + data[i].kode_barcode + '</td>' +
					'<td>' + data[i].nama_barang + '</td>' +
					'<td>' + data[i].nama_kategori + '</td>' +
					'<td>' + data[i].stok + '</td>' +
					'<td>' + data[i].harga_beli + '</td>' +
					'<td>' +
					'<a href="#" data-toggle="modal" data-target="#modal-edit-barang" data-id="' + data[i].id_barang + '"' +
					'class="edit-barang btn btn-primary">' +
					'<i class="fas fa-edit"></i></a>' +

					'<a href="#" data-id="' + data[i].id_barang + '" data-nama="' + data[i].nama_barang + '"' +
					'class="delete-barang btn btn-danger">' +
					'<i class="fas fa-trash-alt"></i>' +
					'</a>' +
					'</td>' +
					'</tr>';
				no++;
			}
			$('#show_data').html(html);
		}
	});
}

$('#tambah-barang').validate({
	rules: {
		kode_barcode: {
			required: true
		},
		nama_barang: {
			required: true
		},
		harga_beli: {
			required: true
		},
		nama_supplier: {
			required: true
		},
		kategori: {
			required: true
		},
		satuan: {
			required: true
		},
	},
	messages: {
		kode_barcode: {
			required: "harus di isi"
		},
		nama_barang: {
			required: "harus di isi"
		},
		harga_beli: {
			required: "harus di isi"
		},
		kategori: {
			required: "harus di isi"
		},
		nama_barang: {
			required: "harus di isi"
		},
		satuan: {
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
		console.log('success');
		const href = $('#tambah-barang').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#tambah-barang').serialize(),
			dataType: 'json',
			success: function (output) {
				if (output.status == 200) {
					Swal.fire({
						type: 'success',
						position: 'top',
						title: output.message,
						showConfirmButton: false,
						timer: 10050,
					})
					$('#modal-tambah-barang').modal('hide');
					show_data();
					$('#tambah-barang')[0].reset();
					$("input[name='id_barang']").val(output.auto_kode);
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

$('#example').on('click', '.edit-barang', function () {
	const Id = $(this).data('id');

	$.ajax({
		type: 'POST',
		url: base_url + 'master/barang/get_barang_byId',
		data: {
			Id: Id
		},
		dataType: 'json',
		success: function (barang) {
			$("input[name='id_barang']").val(barang.id_barang);
			$("input[name='kode_barcode']").val(barang.kode_barcode);
			$("input[name='nama_barang']").val(barang.nama_barang);
			$("input[name='harga_beli']").val(barang.harga_beli);
			$("input[name='stok']").val(barang.stok);
			$("input[name='id_supplier']").val(barang.id_supplier);
			console.log(barang.nama_supplier);
			$("input[name='nama_supplier']").val(barang.nama_supplier);
			$('#satuan option[value=' + barang.satuan + ']').attr("selected", "true");
			$('#kategori option[value=' + barang.id_kategori + ']').attr("selected", "true");
		}
	});
})

$('#edit-barang').validate({
	rules: {
		kode_barcode: {
			required: true
		},
		nama_barang: {
			required: true
		},
		harga_beli: {
			required: true
		},
		satuan: {
			required: true
		},
	},
	messages: {
		kode_barcode: {
			required: "harus di isi"
		},
		nama_barang: {
			required: "harus di isi"
		},
		harga_beli: {
			required: "harus di isi"
		},
		satuan: {
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
		const href = $('#edit-barang').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#edit-barang').serialize(),
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
					$('#modal-edit-barang').modal('hide');
					show_data();
					$('#edit-barang')[0].reset();

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

$('#example').on('click', '.delete-barang', function () {
	const Id = $(this).data('id');
	const Name = $(this).data('nama');
	console.log(Id, Name);
	Swal.fire({
		type: 'warning',
		title: 'Hapus Barang?',
		text: Name + ' akan dihapus',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal',
		preConfirm: (login) => {
			console.log("TRUE");
			$.ajax({
				type: 'POST',
				url: base_url + 'master/barang/hapus',
				data: {
					Id: Id
				},
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
						show_data();

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
			})
		},
	})
})

// Master kategori

$('#tambah-kategori').validate({
	rules: {
		nama_kategori: {
			required: true,
			minlength: 3
		},
	},
	messages: {
		nama_kategori: {
			required: "Nama Kategori harus diisi",
			minlength: "Isi dengan benar"
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
		const href = $('#tambah-kategori').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#tambah-kategori').serialize(),
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

$('.edit-kategori').on('click', function () {
	const Id = $(this).data('id');

	$.ajax({
		type: 'POST',
		url: base_url + 'master/barang/get_ktg_byId',
		data: {
			Id: Id
		},
		dataType: 'json',
		success: function (ktg) {
			$("input[name='id_kategori']").val(ktg.id_kategori);
			$("input[name='nama_kategori']").val(ktg.nama_kategori);
		}
	});
})

$('#edit-kategori').validate({
	rules: {
		nama_kategori: {
			required: true,
			minlength: 3
		},
	},
	messages: {
		nama_kategori: {
			required: "Nama Kategori harus diisi",
			minlength: "Isi dengan benar"
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
		const href = $('#edit-kategori').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#edit-kategori').serialize(),
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

$('.delete-kategori').on('click', function () {
	const Id = $(this).data('id');
	const Name = $(this).data('nama');
	console.log(Id, Name);
	Swal.fire({
		type: 'warning',
		title: 'Hapus Kategori?',
		text: Name + ' akan dihapus',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal',
		preConfirm: (login) => {
			console.log("TRUE");
			$.ajax({
				type: 'POST',
				url: base_url + 'master/barang/hapus_kategori',
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

// Master Kelompok Akun
$('#tambah-akun').validate({
	rules: {
		id_akun: {
			required: true
		},
		nama_akun: {
			required: true
		},
	},
	messages: {
		id_akun: {
			required: "harus di isi"
		},
		nama_akun: {
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
		const href = $('#tambah-akun').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#tambah-akun').serialize(),
			dataType: 'json',
			success: function (output) {
				get_swal_notif(output);
			}
		});
	}
});

$('.edit-akun').on('click', function () {
	const Id = $(this).data('id');

	$.ajax({
		type: 'POST',
		url: base_url + 'master/akun/get_akun_byId',
		data: {
			Id: Id
		},
		dataType: 'json',
		success: function (akun) {
			$("input[name='id_akun']").val(akun.id_akun);
			$("input[name='nama_akun']").val(akun.nama_akun);

		}
	});
})

$('#edit-akun').validate({
	rules: {
		id_akun: {
			required: true
		},
		nama_akun: {
			required: true
		},
	},
	messages: {
		id_akun: {
			required: "harus di isi"
		},
		nama_akun: {
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
		const href = $('#edit-akun').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#edit-akun').serialize(),
			dataType: 'json',
			success: function (output) {
				get_swal_notif(output);
			}
		});
	}
});

$('.delete-akun').on('click', function () {
	const Id = $(this).data('id');
	const Name = $(this).data('nama');
	console.log(Id, Name);
	Swal.fire({
		type: 'warning',
		title: 'Hapus Kelompok Akun?',
		text: Name + ' akan dihapus',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal',
		preConfirm: (pre) => {
			console.log("TRUE");
			$.ajax({
				type: 'POST',
				url: base_url + 'master/akun/hapus',
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

// Master Supplier


$('#tambah-supplier').validate({
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
		const href = $('#tambah-supplier').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#tambah-supplier').serialize(),
			dataType: 'json',
			success: function (output) {
				get_swal_notif(output);
			}
		});
	}
});

$('.edit-supplier').on('click', function () {
	const Id = $(this).data('id');

	$.ajax({
		type: 'POST',
		url: base_url + 'master/supplier/get_supplier_byId',
		data: {
			Id: Id
		},
		dataType: 'json',
		success: function (spl) {
			$("input[name='id_supplier']").val(spl.id_supplier);
			$("input[name='nama_supplier']").val(spl.nama_supplier);
			$("input[name='no_telepon']").val(spl.no_telepon);
			$('#alamat').val(spl.alamat);
		}
	});
})

$('#edit-supplier').validate({
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
		const href = $('#edit-supplier').data('url');
		$.ajax({
			type: 'POST',
			url: href,
			data: $('#edit-supplier').serialize(),
			dataType: 'json',
			success: function (output) {
				get_swal_notif(output);
			}
		});
	}
});

$('.delete-supplier').on('click', function () {
	const Id = $(this).data('id');
	const Name = $(this).data('nama');
	console.log(Id, Name);
	Swal.fire({
		type: 'warning',
		title: 'Hapus Supplier?',
		text: Name + ' akan dihapus',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal',
		preConfirm: (login) => {
			console.log("TRUE");
			$.ajax({
				type: 'POST',
				url: base_url + 'master/supplier/hapus',
				data: {
					Id: Id
				},
				dataType: 'json',
				success: function (output) {
					get_swal_notif(output)
				}
			})
		},
	})
})

// Cart

$('#add_to_cart').on('click', function () {

	if ($('#kode_barang').val() == "") {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: 'Pilih data barang',
			showConfirmButton: false,
			timer: 1050,
		})
	} else if ($('#jumlah').val() == "") {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: 'Masukkan jumlah barang',
			showConfirmButton: false,
			timer: 1050,
		})
	} else if ($('#harga_barang').val() == "") {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: 'Masukkan harga barang',
			showConfirmButton: false,
			timer: 1050,
		})
	} else {
		const Kode = $('#kode_barang').val();
		const Barcode = $('#barcode').val();
		const Name = $('#nama_barang').val();
		const Qty = $('#jumlah').val();
		const Harga = $('#harga_barang').val();
		const Satuan = $('#satuan').val();
		const subtotal = Harga * Qty;
		let PPn = 0;

		console.log($('#pajak').val());
		console.log(subtotal);

		if ($('#pajak').val() == 1) {
			Ppn = subtotal * 0.10;
		} else {
			Ppn = 0;
		}

		$.ajax({
			type: 'POST',
			url: base_url + 'transaksi/cart/add',
			data: {
				Kode: Kode,
				Barcode: Barcode,
				Name: Name,
				Qty: Qty,
				Harga: Harga,
				Ppn: Ppn,
				Satuan: Satuan
			},
			success: function (data) {
				empty();
				$('#show_cart').html(data);
			}
		});
	}
});

$(document).on('click', '.delete-cart', function () {
	const Id = $(this).attr("id"); //mengambil row_id dari artibut id

	$.ajax({
		type: "POST",
		url: base_url + 'transaksi/cart/delete',
		data: {
			Id: Id
		},
		success: function (data) {
			$('#show_cart').html(data);
		}
	});
});

$(document).on('click', '.update-cart', function () {
	const Kode = $(this).attr("data-id"); //mengambil row_id dari artibut id
	const Barcode = $(this).attr("data-barcode");
	const Name = $(this).attr("data-name");
	const Qty = $(this).attr("data-qty");
	const Harga = $(this).attr("data-price");
	const Satuan = $(this).attr("data-satuan");

	$("input[name='kode_barang']").val(Kode);
	$("input[name='barcode']").val(Barcode);
	$("input[name='nama_barang']").val(Name);
	$("input[name='jumlah']").val(Qty);
	$("input[name='harga_barang']").val(Harga);
	$('#satuan option[value=' + Satuan + ']').attr("selected", "true");
	// $("input[name='satuan']").val(Satuan);

	const Id = $(this).attr("data-rowid"); //mengambil row_id dari artibut id
	console.log(Id);

	$.ajax({
		type: "POST",
		url: base_url + 'transaksi/cart/delete',
		data: {
			Id: Id
		},
		success: function (data) {
			$('#show_cart').html(data);
		}
	});
});

$(document).on('click', '.destroy-cart', function () {
	$.ajax({
		type: 'POST',
		url: base_url + 'transaksi/cart/destroy',
		success: function (data) {
			$('#show_cart').html(data);
		}
	});
});

// Transaksi

function get_total() {
	const total = $('#jumlah').val() * $('#harga_barang').val();
	$('#total').val(total);
}

$('#jumlah').on('keyup', function () {
	get_total();
});

$('#harga_barang').on('keyup', function () {
	get_total();
});

function empty() {
	$('#kode_barang').val('');
	$('#barcode').val('');
	$('#nama_barang').val('');
	$('#jumlah').val(null);
	$('#harga_barang').val(null);
	$('#total').val(null);
}

$('.table').on('click', '.supplier', function () {
	const Id = $(this).attr('data-id');
	const Name = $(this).attr('data-nama');

	$("input[name='id_supplier']").val(Id);
	$("input[name='nama_supplier']").val(Name);

	$('#Modal-Supplier').modal('hide');
});

$('#sel-brg').on('click', function () {
	const Id = $("input[name='id_supplier']").val();
	console.log(Id);

	$.ajax({
		type: 'POST',
		url: base_url + 'master/barang/show_barang',
		data: {
			Id: Id
		},
		success: function (data) {
			$('#show_brg').html(data);
		}
	});
})

$('#example2').on('click', '.barang', function () {
	const Kode = $(this).attr('data-kode');
	const Barcode = $(this).attr('data-barcode');
	const Name = $(this).attr('data-nama');
	const Harga = $(this).attr('data-harga');
	const Satuan = $(this).attr('data-satuan');

	$("input[name='kode_barang']").val(Kode);
	$("input[name='barcode']").val(Barcode);
	$("input[name='nama_barang']").val(Name);
	$("input[name='harga_barang']").val(0);
	//$("input[name='satuan']").val(Satuan);
	$('#satuan option[value=' + Satuan + ']').attr("selected", "true");
	$('#jumlah').val(null);
	$('#total').val(null);

	$('#Modal-Barang').modal('hide');
});

$('.table').on('click', '.pesanan', function () {

	const Id = $(this).attr('data-id');
	const Id_supp = $(this).attr('data-id-supp');
	const Name = $(this).data('nama');
	const Status = $(this).data('status');
	console.log(Id);

	if (Status == 'Selesai') {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: 'Pemesanan sudah diproses!',
			showConfirmButton: false,
			timer: 1050,
		})
	} else {

		$("input[name='no_pemesanan']").val(Id);
		$("input[name='id_supplier']").val(Id_supp);
		$("input[name='nama_supplier']").val(Name);
		$("textarea[name='keterangan']").val('Pembelian dari ' + Name);

		$.ajax({
			type: 'POST',
			url: base_url + 'transaksi/cart/get_order',
			data: {
				Id
			},
			success: function (data) {
				$('#show_cart').html(data);
			}
		});
		$('#Modal-Pemesanan').modal('hide');
	}
});

$('#tambah-pemesanan').validate({
	rules: {
		no_pemesanan: {
			required: true
		},
		id_supplier: {
			required: true
		},
		nama_supplier: {
			required: true
		},
	},
	messages: {
		no_pemesanan: {
			required: "No Pemesanan harus diisi"
		},
		id_supplier: {
			required: "ID Supplier harus diisi"
		},
		nama_supplier: {
			required: "Nama Supplier harus diisi"
		},
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
		error.addClass('invalid-feedback');
		element.closest('.col-md-8').append(error);
	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
	},
	submitHandler: function (form) {
		Swal.fire({
			title: 'Simpan transaksi pemesanan?',
			text: "Pastikan semua data benar!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Simpan',
			preConfirm: (yes) => {
				$.ajax({
					type: 'POST',
					url: base_url + 'transaksi/pemesanan/simpan',
					data: $('#tambah-pemesanan').serialize(),
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
								window.location.href = base_url + 'transaksi/pemesanan'
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
				})

			},
		})
	}
});

$('#tambah-pembelian').validate({
	rules: {
		no_nota: {
			required: true
		},
		no_pemesanan: {
			required: true
		},
		id_supplier: {
			required: true
		},
		nama_supplier: {
			required: true
		},
		keterangan: {
			required: true
		},
		tempo: {
			required: true
		},
	},
	messages: {
		no_nota: {
			required: "No Nota harus diisi"
		},
		no_pemesanan: {
			required: "No Pemesanan harus diisi"
		},
		id_supplier: {
			required: "ID Supplier harus diisi"
		},
		nama_supplier: {
			required: "Nama Supplier harus diisi"
		},
		keterangan: {
			required: "Keterangan tidak boleh kosong"
		},
		tempo: {
			required: "Tempo harus diisi"
		},
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
		error.addClass('invalid-feedback');
		element.closest('.col-md-7').append(error);
	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
	},
	submitHandler: function (form) {
		Swal.fire({
			title: 'Simpan transaksi pembelian?',
			text: "Pastikan semua data benar!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Simpan',
			preConfirm: (yes) => {
				$.ajax({
					type: 'POST',
					url: base_url + 'transaksi/pembelian/simpan',
					data: $('#tambah-pembelian').serialize(),
					dataType: 'json',
					success: function (output) {
						if (output.status == 200) {
							Swal.fire({
								type: 'success',
								position: 'top',
								title: output.message,
								showConfirmButton: false,
								timer: 10000,
							})
							window.setTimeout(function () {
								window.location.href = base_url + 'transaksi/pembelian'
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
				})
			},
		})
	}
});

$('.print-pemesanan').on('click', function (e) {
	e.preventDefault();

	const href = $(this).attr('href');
	console.log(href);
	Swal.fire({
		type: 'warning',
		title: 'Cetak Bukti Pemesanan?',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Cetak',
		cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			window.open(href, '_blank');
		}
	})
});

$('.print-pembelian').on('click', function (e) {
	e.preventDefault();

	const href = $(this).attr('href');
	console.log(href);
	Swal.fire({
		type: 'warning',
		title: 'Cetak Faktur Pembelian?',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Cetak',
		cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			window.open(href, '_blank');
		}
	})
});

// Retur 

$('.table').on('click', '.pembelian', function () {
	const Id = $(this).attr('data-id');
	const Id_supp = $(this).attr('data-id-supp');
	const Name = $(this).data('nama');
	const Status = $(this).data('status');

	if (Status == 'lunas') {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: 'Pembelian sudah lunas!',
			showConfirmButton: false,
			timer: 1050,
		})
	} else {

		$("input[name='no_nota']").val(Id);
		$("input[name='no_retur']").val("RTB" + Id);
		$("input[name='id_supplier']").val(Id_supp);
		$("input[name='nama_supplier']").val(Name);
		$("textarea[name='keterangan']").val('Retur Pembelian Untuk ' + Name);

		console.log(Name);
		$('#Modal-Pembelian').modal('hide');
	}
});

$('#add_to_cart_retur').on('click', function () {

	if ($('#kode_barang').val() == "") {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: 'Pilih data barang',
			showConfirmButton: false,
			timer: 1050,
		})
	} else if ($('#jumlah').val() == "" || $('#jumlah').val() == 0) {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: 'Masukkan jumlah barang',
			showConfirmButton: false,
			timer: 1050,
		})
	} else if ($('#harga_barang').val() == "") {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: 'Masukkan harga barang',
			showConfirmButton: false,
			timer: 1050,
		})
	} else {

		const Kode = $('#kode_barang').val();
		const Barcode = $('#barcode').val();
		const Name = $('#nama_barang').val();
		let Qty = $('#jumlah').val();
		const Harga = $('#harga_barang').val();
		const subtotal = Harga * Qty;
		let PPn = 0;

		console.log($('#pajak').val());
		console.log(subtotal);

		if ($('#pajak').val() == 1) {
			Ppn = subtotal * 0.10;
		} else {
			Ppn = 0;
		}

		$.ajax({
			type: 'POST',
			url: base_url + 'transaksi/retur/cek_stok',
			dataType: 'json',
			data: {
				Kode: Kode
			},
			success: function (data) {
				console.log(data.stok);
				console.log(Qty);
				let stok = data.stok;

				if (data.stok < Qty) {

					Swal.fire({
						type: 'error',
						position: 'top',
						title: 'Retur lebih dari stok!',
						showConfirmButton: false,
						timer: 1300,
					})
				} else {
					$.ajax({
						type: 'POST',
						url: base_url + 'transaksi/cart/add',
						data: {
							Kode: Kode,
							Barcode: Barcode,
							Name: Name,
							Qty: Qty,
							Harga: Harga,
							Ppn: Ppn
						},
						success: function (data) {
							$('#kode_barang').val("");
							$('#barcode').val("");
							$('#nama_barang').val("");
							$('#jumlah').val(null);
							$('#harga_barang').val(null);
							$('#total').val(null);

							$('#show_retur_data').html(data);
						}
					});
				}
			}
		});
	}
});


$('#tambah-retur').validate({
	rules: {
		no_retur: {
			required: true
		},
		tanggal: {
			required: true
		},
		id_supplier: {
			required: true
		},
		nama_supplier: {
			required: true
		},
	},
	messages: {
		no_retur: {
			required: "No Retur harus diisi"
		},
		tanggal: {
			required: "Tanggal harus diisi"
		},
		id_supplier: {
			required: "ID Supplier harus diisi"
		},
		nama_supplier: {
			required: "Nama Supplier harus diisi"
		},
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
		error.addClass('invalid-feedback');
		element.closest('.col-md-8').append(error);
	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
	},
	submitHandler: function (form) {
		Swal.fire({
			title: 'Simpan Retur Pembelian?',
			text: "Pastikan semua data benar!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Simpan',
			preConfirm: (yes) => {
				$.ajax({
					type: 'POST',
					url: base_url + 'transaksi/retur/simpan',
					data: $('#tambah-retur').serialize(),
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
				})
			},
		})
	}
});

$('.print-retur').on('click', function (e) {
	e.preventDefault();

	const href = $(this).attr('href');
	console.log(href);
	Swal.fire({
		type: 'warning',
		title: 'Cetak Bukti Retur Pembelian?',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Cetak',
		cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			window.open(href, '_blank');
		}
	})
});

// pelunasan
$('.table').on('click', '.lunasi', function () {

	const Id = $(this).attr('data-id');
	const Id_supp = $(this).attr('data-id-supp');
	const Name = $(this).data('nama');
	const Status = $(this).data('status');
	const Total = $(this).data('total');

	if (Status == 'lunas') {
		Swal.fire({
			type: 'error',
			position: 'top',
			title: 'Pembelian sudah lunas!',
			showConfirmButton: false,
			timer: 1050,
		})
	} else {
		$.ajax({
			type: 'POST',
			url: base_url + 'transaksi/pelunasan/cek_retur',
			data: {
				Id: Id
			},
			dataType: 'json',
			success: function (output) {

				if (output.status == 200) {
					$("input[name='no_nota']").val(Id);
					$("input[name='no_pelunasan']").val('BYR' + Id);
					$("input[name='id_supplier']").val(Id_supp);
					$("input[name='nama_supplier']").val(Name);
					$("input[name='total']").val(Total);
					$("input[name='retur']").val(output.total);
					$("textarea[name='keterangan']").val('Pelunasan Untuk ' + Name);

					const total = $('#total').val() - $('#retur').val();
					$('#totalbayar').val(total);
					console.log(total);

					console.log(Name);
					$('#Data-Pembelian').modal('hide');
				} else {

				}
			}
		})

	}
});


$('#tambah-pelunasan').validate({
	rules: {
		no_nota: {
			required: true
		},
		tanggal: {
			required: true
		},
		id_supplier: {
			required: true
		},
		nama_supplier: {
			required: true
		},
	},
	messages: {
		no_nota: {
			required: "No Nota harus dipilih"
		},
		tanggal: {
			required: "Tanggal harus diisi"
		},
		id_supplier: {
			required: "ID Supplier harus diisi"
		},
		nama_supplier: {
			required: "Nama Supplier harus diisi"
		},
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
		error.addClass('invalid-feedback');
		element.closest('.col-md-8').append(error);
	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
	},
	submitHandler: function (form) {
		Swal.fire({
			title: 'Bayar Pelunasan?',
			text: "Pastikan semua data benar!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Simpan',
			preConfirm: (yes) => {
				$.ajax({
					type: 'POST',
					url: base_url + 'transaksi/pelunasan/simpan',
					data: $('#tambah-pelunasan').serialize(),
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
								window.location.href = base_url + 'transaksi/pelunasan'
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
				})

			},
		})
	}
});

$('.print-pelunasan').on('click', function (e) {
	e.preventDefault();

	const href = $(this).attr('href');
	console.log(href);
	Swal.fire({
		type: 'warning',
		title: 'Cetak Bukti Pelunasan?',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Cetak',
		cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			window.open(href, '_blank');
		}
	})
});

// laporan 

$('#cetak').on('click', function (e) {
	e.preventDefault();

	const href = $(this).attr('href');
	Tanggal1 = $("input[name='tanggal1']").val();
	Tanggal2 = $("input[name='tanggal2']").val();
	Swal.fire({
		type: 'warning',
		title: 'Cetak Laporan?',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Cetak',
		cancelButtonText: 'Batal',
		preConfirm: (login) => {
			console.log("TRUE");
			window.open(href + Tanggal1 + '/' + Tanggal2, '_blank');
		},
	})
})

$("#tampilkan").on('click', function (e) {
	Tanggal1 = $("input[name='tanggal1']").val();
	Tanggal2 = $("input[name='tanggal2']").val();
	console.log(Tanggal1, Tanggal2);

	$.ajax({
		type: 'POST',
		url: base_url + 'laporan/jurnal/get_jurnal_by_date',
		data: {
			Tanggal1: Tanggal1,
			Tanggal2: Tanggal2
		},
		dataType: 'json',
		success: function (data) {
			var html = '';
			let i;
			for (i = 0; i < data.length; i++) {
				console.log(data);
				html += '<tr>' +
					'<td>' + data[i].tanggal + '</td>' +
					'<td>' + data[i].keterangan + '</td>' +
					'<td>' + data[i].id_akun + '</td>' +
					'<td>' + data[i].nama_akun + '</td>' +
					'<td>' + data[i].debet + '</td>' +
					'<td>' + data[i].kredit + '</td>' +
					'</tr>';
			}
			$('#show_report').html(html);
		}

	});
});
