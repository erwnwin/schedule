  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title" style="color: black;">Profil</h4>
              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">
          <div class="col-xl-4 col-lg-5">
              <div class="card text-center">
                  <div class="card-body">

                      <?php if (
                            $this->session->userdata('hak_akses') == '1' ||
                            $this->session->userdata('hak_akses') == '2'
                        ) { ?>
                          <center>
                              <div class="avatar-md  mt-2 mb-3">
                                  <span class="avatar-title bg-success text-black font-20 rounded-circle">
                                      <!-- <?php
                                            $nama = $this->session->userdata('nama');
                                            $nama = explode(" ", $nama);
                                            $nama_sisa = implode(" ", array_slice($nama, 1));
                                            ?> -->


                                      <?php
                                        $nama_lengkap = $this->session->userdata('nama');
                                        $nama_parts = explode(" ", $nama_lengkap);
                                        $nama_depan = $nama_parts[0]; // Nama depan
                                        $nama_belakang = isset($nama_parts[1]) ? $nama_parts[1] : ''; // Nama belakang, jika ada

                                        // Mengambil karakter pertama dari nama depan dan nama belakang
                                        $inisial_depan = substr($nama_depan, 0, 1); // Karakter pertama dari nama depan
                                        $inisial_belakang = substr($nama_belakang, 0, 1); // Karakter pertama dari nama belakang

                                        ?>

                                      <span id="firstName"> <?= $inisial_depan[0] ?></span>
                                      <?php if ($inisial_belakang == null) { ?>
                                          <span id="lastName" hidden><?= $inisial_belakang[0] ?></span>
                                      <?php } else { ?>
                                          <span id="lastName"><?= $inisial_belakang ?></span>
                                      <?php } ?>
                                  </span>
                              </div>
                          </center>
                      <?php } ?>

                      <?php if (
                            $this->session->userdata('hak_akses') == '3'
                        ) { ?>
                          <center>
                              <div class="avatar-md  mt-2 mb-3">
                                  <span class="avatar-title bg-success text-black font-20 rounded-circle">
                                      <!-- <?php
                                            $nama = $this->session->userdata('nama');
                                            $nama = explode(" ", $nama);
                                            $nama_sisa = implode(" ", array_slice($nama, 1));
                                            ?> -->


                                      <?php
                                        $nama_lengkap = $this->session->userdata('nama');
                                        $nama_parts = explode(" ", $nama_lengkap);
                                        $nama_depan = $nama_parts[0]; // Nama depan
                                        $nama_belakang = isset($nama_parts[1]) ? $nama_parts[1] : ''; // Nama belakang, jika ada

                                        // Mengambil karakter pertama dari nama depan dan nama belakang
                                        $inisial_depan = substr($nama_depan, 0, 1); // Karakter pertama dari nama depan
                                        $inisial_belakang = substr($nama_belakang, 0, 1); // Karakter pertama dari nama belakang

                                        ?>

                                      <span id="firstName"> <?= $inisial_depan[0] ?></span>
                                      <?php if ($inisial_belakang == null) { ?>
                                          <span id="lastName" hidden><?= $inisial_belakang[0] ?></span>
                                      <?php } else { ?>
                                          <span id="lastName"><?= $inisial_belakang ?></span>
                                      <?php } ?>
                                  </span>
                              </div>
                          </center>
                      <?php } ?>



                      <h4 class="mb-0 mt-2"><?=
                                            $this->session->userdata('nama');
                                            ?></h4>
                      <p class="text-muted font-14">
                          <?php if (
                                $this->session->userdata('hak_akses') == '1'
                            ) { ?>
                              ADMINISTRATOR
                          <?php } ?>

                          <?php if (
                                $this->session->userdata('hak_akses') == '2'
                            ) { ?>
                              KURIKULUM
                          <?php } ?>
                      </p>

                      <!-- <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                      <button type="button" class="btn btn-danger btn-sm mb-2">Message</button> -->

                      <div class="text-left mt-3">
                          <h4 class="font-13 text-uppercase">Tentang Saya :</h4>
                          <?php if (
                                $this->session->userdata('hak_akses') == '1'
                            ) { ?>
                              <p class="text-muted font-13 mb-3">
                                  Login sebagai ADMINISTRATOR sistem
                              </p>


                              <p class="text-muted mb-2 font-13"><strong>No HP/WA :</strong><span class="ml-2"><?=
                                                                                                                $this->session->userdata('handphone');
                                                                                                                ?></span></p>

                              <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 "><?=
                                                                                                                $this->session->userdata('email');
                                                                                                                ?></span></p>

                              <p class="text-muted mb-1 font-13"><strong>Alamat :</strong> <span class="ml-2"><?=
                                                                                                                $this->session->userdata('alamat');
                                                                                                                ?></span></p>
                          <?php } ?>

                          <?php if (
                                $this->session->userdata('hak_akses') == '2'
                            ) { ?>
                              <p class="text-muted font-13 mb-3">
                                  Login sebagai BAGIAN KURIKULUM Sekolah
                              </p>


                              <p class="text-muted mb-2 font-13"><strong>No HP/WA :</strong><span class="ml-2"><?=
                                                                                                                $this->session->userdata('handphone');
                                                                                                                ?></span></p>

                              <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 "><?=
                                                                                                                $this->session->userdata('email');
                                                                                                                ?></span></p>

                              <p class="text-muted mb-1 font-13"><strong>Alamat :</strong> <span class="ml-2"><?=
                                                                                                                $this->session->userdata('alamat');
                                                                                                                ?></span></p>
                          <?php } ?>



                          <?php if (
                                $this->session->userdata('hak_akses') == '3'
                            ) { ?>
                              <p class="text-muted font-13 mb-3">
                                  Login sebagai Guru SMA Makassar
                              </p>


                              <p class="text-muted mb-2 font-13"><strong>No HP/WA :</strong><span class="ml-2"><?=
                                                                                                                $this->session->userdata('telp_wa');
                                                                                                                ?></span></p>

                              <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 "><?=
                                                                                                                $this->session->userdata('alamat_email');
                                                                                                                ?></span></p>

                              <p class="text-muted mb-1 font-13"><strong>Alamat :</strong> <span class="ml-2"><?=
                                                                                                                $this->session->userdata('alamat');
                                                                                                                ?></span></p>
                          <?php } ?>


                      </div>


                  </div> <!-- end card-body -->
              </div> <!-- end card -->


          </div> <!-- end col-->

          <div class="col-xl-8 col-lg-7">
              <div class="card">
                  <div class="card-body">
                      <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                          <!-- <li class="nav-item">
                              <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                  About
                              </a>
                          </li> -->
                          <!-- <li class="nav-item">
                              <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                  Tentang Saya
                              </a>
                          </li> -->
                          <li class="nav-item">
                              <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                  Pengaturan
                              </a>
                          </li>
                      </ul>
                      <div class="tab-content">




                          <div class="tab-pane show active" id="settings">
                              <form>
                                  <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="firstname">Nama Depan</label>
                                              <input type="text" class="form-control" id="firstname" placeholder="Masukkan Nama Depan">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="lastname">Nama Belakang (opsional)</label>
                                              <input type="text" class="form-control" id="lastname" placeholder="Masukkan Nama Belakang (opsional)">
                                          </div>
                                      </div> <!-- end col -->
                                  </div> <!-- end row -->


                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="firstname">No HP/WA</label>
                                              <input type="text" class="form-control" id="firstname" placeholder="Masukkan No HP/WA">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="lastname">Email</label>
                                              <input type="text" class="form-control" id="lastname" placeholder="Masukkan Email">
                                          </div>
                                      </div> <!-- end col -->
                                  </div> <!-- end row -->

                                  <div class="row">
                                      <div class="col-12">
                                          <div class="form-group">
                                              <label for="userbio">Alamat</label>
                                              <textarea class="form-control" id="userbio" rows="4" placeholder="Alamat"></textarea>
                                          </div>
                                      </div> <!-- end col -->
                                  </div> <!-- end row -->
                                  <div class="text-right">
                                      <button type="submit" class="btn btn-info mt-2"><i class="mdi mdi-edit"></i> Update Profil</button>
                                  </div>
                              </form>
                              <hr>
                              <form>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="userpassword">Ubah Password</label>
                                              <input type="password" class="form-control" id="userpassword" placeholder="Masukkan password">
                                              <span class="form-text text-muted"><small>Jika password telah diubah maka akan diarahkan kembali ke halaman login untuk masuk ke aplikasi</small></span>
                                          </div>
                                      </div> <!-- end col -->

                                  </div> <!-- end row -->



                                  <div class="text-right">
                                      <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update Password</button>
                                  </div>
                              </form>
                          </div>
                          <!-- end settings content-->

                      </div> <!-- end tab-content -->
                  </div> <!-- end card body -->
              </div> <!-- end card -->
          </div> <!-- end col -->
      </div>
      <!-- end row-->




  </div>
  <!-- container -->

  </div>
  <!-- content -->