$(document).ready(function() {

    $(".btn-login").click( function() {
    
      var username = $("#username").val();
      var password = $("#password").val();

      if(username.length == "") {

        // Swal.fire({
        //     icon: 'success',
        //     title: 'Sukses',
        //     text: flash
        // })

        Swal.fire({
          icon: 'warning',
          
          title: 'Oops...',
          text: 'Username Wajib Diisi !'
        });

      } else if(password.length == "") {

        Swal.fire({
          icon: 'warning',
          
          title: 'Oops...',
          text: 'Password Wajib Diisi !'
        });

      } else {
        $.ajax({
            url: "login/act-login",
            // url: "<?php echo base_url() ?>index.php/login/act-login",
            type: "POST",
            data: {
                "username": username,
                "password": password
            },

            success:function(response){

              if (response == "success") {

                Swal.fire({
                  icon: 'success',
                  title: 'Login Berhasil!',
                  text: 'Anda akan di arahkan dalam 3 Detik',
                  timer: 3000,
                  showCancelButton: false,
                  showConfirmButton: false
                })
                .then (function() {
                  window.location.href = "dashboard";
                });


            } else {

              Swal.fire({
                icon: 'error',
                title: 'Login Gagal!',
                text: 'Masih ada yang belum sesuai. Silahkan coba lagi!'
              });

            }
            console.log(response);

          },

          error:function(response){

              Swal.fire({
                icon: 'error',
                
                title: 'Opps!',
                text: 'Maaf'
              });

              console.log(response);

          }

        });

      }

    });

  });
