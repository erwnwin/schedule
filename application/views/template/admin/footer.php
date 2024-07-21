  <!-- Footer Start -->
  <footer class="footer">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-6">
                  Made with <i class="uil-heart-sign"></i> by <b> <a href="#" target="_blank">Titik Balik Teknologi</a></b>
              </div>
              <div class="col-md-6">
                  <div class="text-md-right footer-links d-none d-md-block">
                      <!-- <a href="javascript: void(0);">About</a>
                      <a href="javascript: void(0);">Support</a> -->
                      <a href="#versi1.1" class="text-black">Versi 1.3</a>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- end Footer -->

  </div>

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->


  </div>
  <!-- END wrapper -->



  <div class="rightbar-overlay"></div>
  <!-- /Right-bar -->

  <!-- bundle -->
  <script src="<?= base_url() ?>assets/template/assets/js/vendor.min.js"></script>
  <script src="<?= base_url() ?>assets/template/assets/js/app.min.js"></script>

  <!-- third party js -->
  <!-- <script src="<?= base_url() ?>assets/template/assets/js/vendor/Chart.bundle.min.js"></script> -->
  <script src="<?= base_url() ?>assets/template/assets/js/vendor/apexcharts.min.js"></script>
  <script src="<?= base_url() ?>assets/template/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= base_url() ?>assets/template/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
  <!-- third party js ends -->

  <!-- demo app -->
  <script src="<?= base_url() ?>assets/template/assets/js/pages/demo.dashboard-analytics.js"></script>
  <!-- end demo js-->
  <!-- Code injected by live-server -->

  <!-- toast -->
  <script type="text/javascript" src="<?= base_url() ?>assets/toast/demos/js/jquery.toast.js"></script>

  <!-- Sweetalert -->
  <script src="<?= base_url() ?>assets/lib/js/sweetalert2.min.js"></script>
  <script src="<?= base_url() ?>assets/lib/js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url() ?>assets/lib/js/myscript.js"></script>


  <!-- Datatables js -->
  <script src="<?= base_url() ?>assets/template/assets/js/vendor/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/template/assets/js/vendor/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url() ?>assets/template/assets/js/vendor/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/template/assets/js/vendor/responsive.bootstrap4.min.js"></script>

  <!-- Datatable Init js -->
  <script src="<?= base_url() ?>assets/template/assets/js/pages/demo.datatable-init.js"></script>

  <!-- third party js -->
  <script src="<?= base_url() ?>assets/template/assets/js/vendor/Chart.bundle.min.js"></script>
  <!-- third party js ends -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

  <!-- lottie -->
  <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>


  <!-- JS -->
  <script src="<?= base_url() ?>assets/jadwal/js/jadwal.js"></script>


  <script>
      const xValues = ["Laki-laki", "Perempuan"];
      const yValues = [10, 2];
      const barColors = [
          "#b91d47",
          "#00aba9"
      ];

      new Chart("myChart", {
          type: "doughnut",
          data: {
              labels: xValues,
              datasets: [{
                  backgroundColor: barColors,
                  data: yValues
              }]
          },
          options: {
              title: {
                  display: true,

              }
          }
      });
  </script>



  <script>
      window.addEventListener("load", () => {

          const loader = document.querySelector(".loader");

          loader.classList.add("loader--hidden");

          loader.addEventListener("transitioned", () => {
              document.body.removeChild(document.querySelector(".loader"));
          });
      });
  </script>

  <script>
      $(document).ready(function() {
          var firstName = $('#firstName').text();
          var lastName = $('#lastName').text();
          var intials = $('#firstName').text().charAt(0) + $('#lastName').text().charAt(0);
      });
  </script>

  <script>
      var flashNice = $('#flash-nice').data('flash');
      if (flashNice) {
          Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: flashNice
          })
      }

      var flashError = $('#flash-error').data('flash');
      if (flashError) {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: flashError
          })
      }

      $(document).on('click', '#btn-hapus', function(e) {
          e.preventDefault();
          var link = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Anda yakin?',
              text: "Data akan dihapus!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: "#539a55",
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location = link;
              }
          })
      })
  </script>
  <script>
      $(document).on('click', '#btn-hapus-ku', function(e) {
          e.preventDefault();
          var link = $(this).attr('action');

          Swal.fire({
              title: 'Apakah Anda yakin?',
              text: "Data akan dihapus!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: "#539a55",
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location = link;
              }
          })
      })
  </script>
  <script>
      var flash = $('#flash').data('flash');
      if (flash) {
          $.toast({
              heading: "Success",
              text: flash,
              showHideTransition: "plain",
              position: "top-right",
              icon: "success",
              stack: false
          })
      }

      var flash = $('#flash-edit').data('flash');
      if (flash) {
          $.toast({
              heading: "Update",
              text: flash,
              showHideTransition: "plain",
              position: "top-right",
              icon: "info",
              stack: false
          })
      }

      var flashGagal = $('#flash-gagal').data('flash');
      if (flashGagal) {
          $.toast({
              heading: "Deleted",
              text: flashGagal,
              showHideTransition: "plain",
              position: "top-right",
              icon: "error",
              stack: false
          })
      }

      var flashValid = $('#flash-valid').data('flash');
      if (flashValid) {
          $.toast({
              heading: "Gagal",
              text: flashValid,
              showHideTransition: "plain",
              position: "top-right",
              icon: "error",
              stack: false
          })
      }
  </script>

  <script type="text/javascript">
      $(document).ready(function() {

          $('.eval-js').on('click', function(e) {
              e.preventDefault();

              if (!$(this).hasClass('generate-toast')) {
                  var code = $(this).siblings('pre').find('code').text();
                  code.replace("<span class='hidden'>", '');
                  code.replace("</span");

                  eval(code);
              };
          });

          $('#icon-type').on('change', function() {
              if (!$(this).val()) {
                  $('.custom-color-info').show();
                  $('.toast-icon-line').hide();
                  $('.toast-bgColor-line').show();
                  $('.toast-textColor-line').show();
              } else {
                  $('.toast-icon-line').show();
                  $('.custom-color-info').hide();
                  $('.toast-bgColor-line').hide();
                  $('.toast-textColor-line').hide();
                  $('.toast-icon-line span.toast-icon').text($(this).val());
              }
          });

          // You are about to see some extremely horrible code that can be MUCH MUCH improved,
          // I've knowlingly done it that way, please don't judge me based upon this ;)
          $(document).ready(function() {

              function generateCode() {
                  var text = $('.plugin-options #toast-text').val();
                  var heading = $('.plugin-options #toast-heading').val();
                  var transition = $('.toast-transition').val();
                  var allowToastClose = $('#allow-toast-close').val();
                  var autoHide = $('#auto-hide-toast').val();
                  var stackToasts = $('#stack-toasts').val();
                  var toastPosition = $('#toast-position').val()
                  var toastBg = $('#toast-bg').val();
                  var toastTextColor = $('#toast-text-color').val();
                  var toastIcon = $('#icon-type').val();
                  var textAlign = $('#text-align').val();
                  var toastEvents = $('#add-toast-events').val();
                  var loader = $('#show-loader').val();
                  var loaderBg = $('#loader-bg').val();

                  if (text) {
                      $('.toast-text-line').show();
                      $('.toast-text-line .toast-text').text(text);
                  } else {
                      $('.toast-text-line').hide()
                      $('.toast-text-line .toast-text').text('');
                  };

                  if (heading) {
                      $('.toast-heading-line').show();
                      $('.toast-heading-line .toast-heading').text(heading);
                  } else {
                      $('.toast-heading-line').hide()
                      $('.toast-heading-line .toast-heading').text('');
                  };

                  if (transition) {
                      $('.toast-transition-line').show()
                      $('.toast-transition-line .toast-transition').text(transition);
                  } else {
                      $('.toast-transition-line').hide();
                      $('.toast-transition-line .toast-transition').text('fade');
                  }

                  if (allowToastClose) {
                      $('.toast-allowToastClose-line').show();
                      $('.toast-allowToastClose-line .toast-allowToastClose').text(allowToastClose);
                  } else {
                      $('.toast-allowToastClose-line').hide();
                      $('.toast-allowToastClose-line .toast-allowToastClose').text(false);
                  }

                  if (autoHide && (autoHide == 'false')) {
                      $('.toast-hideAfter-line').show();
                      $('.toast-hideAfter-line .toast-hideAfter').text('false');
                      $('.autohide-after').hide();
                  } else {
                      $('.toast-hideAfter-line').show();
                      $('.toast-hideAfter-line .toast-hideAfter').text($('#autohide-after').val() ? $('#autohide-after').val() : 3000);
                      $('.autohide-after').show();
                  }

                  if (stackToasts && stackToasts != 'true') {
                      $('.toast-stackLength-line').show();
                      $('.toast-stackLength-line .toast-stackLength').text(stackToasts);
                      $('.stack-length').hide();
                  } else {
                      $('.stack-length').show();
                      $('.toast-stackLength-line').show();
                      $('.toast-stackLength-line .toast-stackLength').text($('#stack-length').val() ? $('#stack-length').val() : 5);
                  }

                  if (toastPosition && (toastPosition !== 'custom-position')) {
                      $('.toast-position-string-line').show();
                      $('.custom-toast-position').hide();
                      $('.toast-position-string-line .toast-position').text(toastPosition);
                  } else {
                      $('.toast-position-string-line').hide();
                      $('.toast-position-string-line .toast-position').text('');
                  }

                  if (toastPosition && (toastPosition === 'custom-position')) {
                      $('.custom-toast-position').show();
                      $('.toast-position-string-obj').show();
                      var left = $('#left-position').val() ? $('#left-position').val() : 'auto';
                      var right = $('#right-position').val() ? $('#right-position').val() : 'auto';
                      var top = $('#top-position').val() ? $('#top-position').val() : 'auto';
                      var bottom = $('#bottom-position').val() ? $('#bottom-position').val() : 'auto';
                      $('.toast-position-string-obj .toast-position-left').text((left !== 'auto') ? left : "'" + left + "'");
                      $('.toast-position-string-obj .toast-position-right').text((right !== 'auto') ? right : "'" + right + "'");
                      $('.toast-position-string-obj .toast-position-top').text((top !== 'auto') ? top : "'" + top + "'");
                      $('.toast-position-string-obj .toast-position-bottom').text((bottom !== 'auto') ? bottom : "'" + bottom + "'");
                  } else {
                      $('.toast-position-string-obj').hide();
                      // $('.toast-position-string-obj toast-position').text('');
                  }

                  if (!toastIcon) {
                      if (toastBg) {
                          $('.toast-bgColor-line').show();
                          $('.toast-bgColor-line .toast-bgColor').text(toastBg);
                      } else {
                          $('.toast-bgColor-line').hide();
                          $('.toast-bgColor-line .toast-bgColor').text('');
                      }

                      if (toastTextColor) {
                          $('.toast-textColor-line').show();
                          $('.toast-textColor-line .toast-textColor').text(toastTextColor);
                      } else {
                          $('.toast-textColor-line').hide();
                          $('.toast-textColor-line .toast-textColor').text('');
                      }
                  }

                  if (textAlign) {
                      $('.toast-textAlign-line').show();
                      $('.toast-textAlign-line .toast-textAlign').text(textAlign);
                  } else {
                      $('.toast-textAlign-line').hide();
                      $('.toast-textAlign-line .toast-textAlign').text('');
                  }

                  if (loader == 'false') {
                      $('.toast-textLoader').html('false');
                  } else {
                      $('.toast-textLoader').html('true');
                  }

                  if (loaderBg) {
                      $('.toast-textLoaderBg').html(loaderBg);
                  }

                  if (toastEvents == 'false') {
                      $('.toast-beforeShow-line').hide();
                      $('.toast-afterShown-line').hide();
                      $('.toast-beforeHide-line').hide();
                      $('.toast-afterHidden-line').hide();
                  } else {
                      $('.toast-beforeShow-line').show();
                      $('.toast-afterShown-line').show();
                      $('.toast-beforeHide-line').show();
                      $('.toast-afterHidden-line').show();
                  }
              }

              $('#top-position').on('change', function() {
                  $('#bottom-position').val('auto');
              });
              $('#bottom-position').on('change', function() {
                  $('#top-position').val('auto');
              });
              $('#left-position').on('change', function() {
                  $('#right-position').val('auto');
              });
              $('#right-position').on('change', function() {
                  $('#left-position').val('auto');
              });
              $('.plugin-options :input').on('change', function() {
                  $.toast().reset('all');
                  generateCode();
              });

              $('.generate-toast').on('click', function(e) {
                  e.preventDefault();
                  generateToast();
              });

              function generateToast() {
                  var options = {};

                  if ($('.toast-text-line').is(':visible')) {
                      options.text = $('.toast-text-line .toast-text').text();
                  }

                  if ($('.toast-heading-line').is(':visible')) {
                      options.heading = $('.toast-heading').text();
                  };

                  if ($('.toast-transition-line').is(':visible')) {
                      options.showHideTransition = $('.toast-transition-line .toast-transition').text();
                  };

                  if ($('.toast-allowToastClose-line').is(':visible')) {
                      options.allowToastClose = ($('.toast-allowToastClose-line .toast-allowToastClose').text() === 'true') ? true : false;
                  };

                  if ($('.toast-hideAfter-line').is(':visible')) {
                      options.hideAfter = parseInt($('.toast-hideAfter-line .toast-hideAfter').text(), 10) || false;
                  };

                  if ($('.toast-stackLength-line').is(':visible')) {
                      options.stack = parseInt($('.toast-stackLength-line .toast-stackLength').text(), 10) || false;
                  };

                  if ($('.toast-position-string-line').is(':visible')) {
                      options.position = $('.toast-position-string-line .toast-position').text();
                  };

                  if ($('.toast-position-string-obj').is(':visible')) {
                      options.position = {};
                      options.position.left = parseFloat($('.toast-position .toast-position-left').text()) || 'auto';
                      options.position.right = parseFloat($('.toast-position .toast-position-right').text()) || 'auto';
                      options.position.top = parseFloat($('.toast-position .toast-position-top').text()) || 'auto';
                      options.position.bottom = parseFloat($('.toast-position .toast-position-bottom').text()) || 'auto';
                  };

                  if ($('.toast-icon-line').is(':visible')) {
                      options.icon = $('.toast-icon-line .toast-icon').text();
                  };

                  if ($('.toast-bgColor-line').is(':visible')) {
                      options.bgColor = $('#toast-bg').val();
                  };

                  if ($('.toast-text-color').is(':visible')) {
                      options.textColor = $('#toast-text-color').val();
                  };

                  if ($("#text-align").is(':visible')) {
                      options.textAlign = $('#text-align').val();
                  };

                  options.loader = $('.toast-textLoader').html() === 'false' ? false : true;
                  options.loaderBg = $('.toast-textLoaderBg').html();

                  $.toast(options);
              }

              generateCode();
          });
      });
  </script>

  <?php if ($this->uri->segment(1) == "guru-pengampu") : ?>
      <script>
          var numberForm = 2;
          $("#mapelSelectForm").on('change', function() {
              var selectedVal = $(this).val();
              var dataSelect = $(this).data("mapelselect");
              $.ajax({
                  type: "POST",
                  url: "<?= base_url('DataPenugasanGuru/getDataKelasByKodeMapel') ?>",
                  data: {
                      'kode_mapel': selectedVal
                  },
                  success: function(data) {
                      dataKelas = JSON.parse(data);
                      console.log(dataKelas);
                  }
              })
              console.log('inidata' + dataSelect);
          });
          // Modal 
          $('#TugasGuru').on('show.bs.modal', function(event) {
              var button = $(event.relatedTarget);
              var mapel = button.data('mapel');
              var kode_mapel = button.data('kodemapel');
              var modal = $(this);
              $.ajax({
                  type: 'POST',
                  url: "<?= base_url('DataPenugasanGuru/getDataKelas') ?>",
                  data: {
                      'kode_mapel': kode_mapel
                  },
                  success: function(data) {
                      modal.find('.modal-title').text('Mata Pelajaran ' + mapel);
                      modal.find('.modal-body input').val(mapel);
                      modal.find('#form').html(data);
                      // html = JSON.parse(data);
                      // console.log(html);
                  }
              })
          })

          $('div.hapus-data').on('click', function() {
              const form = $(this);
              let id_tugas = form.data('idtugas');
              let form_group = form.parent().parent().parent();
              $.ajax({
                  url: "<?= base_url('Guru_pengampu/hapus') ?>",
                  type: "POST",
                  data: {
                      'id_tugas': id_tugas
                  },
                  success: function(data) {
                      form_group.find(".form-mapel").removeAttr("disabled");
                      form_group.find(".form-kelas").removeAttr("disabled");
                      form_group.find(".form-beban-jam").removeAttr("disabled");
                      form_group.find(".select-guru").removeAttr("disabled");
                      form.remove();
                  }
              })
          });
      </script>
  <?php endif; ?>







  </body>


  <!-- Mirrored from coderthemes.com/hyper/saas/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Sep 2020 03:23:13 GMT -->

  </html>