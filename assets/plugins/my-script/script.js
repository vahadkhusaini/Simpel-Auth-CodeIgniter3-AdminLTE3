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
                url: 'http://localhost/sistem_pembelian/auth',
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
                        login_success();						
                    }
                }
            });
        }
    })
}

function login_success(){
    Swal.fire({
                                  type: 'success',
                                  title: 'Login Berhasil',
                                  showConfirmButton: false,
                                  timer: 1000
                  })
  }

  function logout(){
        Swal.fire({
          type: 'warning',
          title: 'Keluar dari sistem?',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          confirmButtonText: 'Keluar',
          cancelButtonText: 'Batal',
          preConfirm: (login) => {
            fetch('http://localhost/sistem_pembelian/auth/login',{
            method: 'POST',
            })
            .then(response => {
              window.location.replace("auth");
            })
          },
        })
      }