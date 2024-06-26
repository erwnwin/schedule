  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Profil</h4>
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



                      <h4 class="mb-0 mt-2">Dominic Keller</h4>
                      <p class="text-muted font-14">Founder</p>

                      <!-- <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                      <button type="button" class="btn btn-danger btn-sm mb-2">Message</button> -->

                      <div class="text-left mt-3">
                          <h4 class="font-13 text-uppercase">About Me :</h4>
                          <p class="text-muted font-13 mb-3">
                              Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                              1500s, when an unknown printer took a galley of type.
                          </p>
                          <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">Geneva
                                  D. McKnight</span></p>

                          <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">(123)
                                  123 1234</span></p>

                          <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">user@email.domain</span></p>

                          <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">USA</span></p>
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
                                              <label for="firstname">First Name</label>
                                              <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="lastname">Last Name</label>
                                              <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                          </div>
                                      </div> <!-- end col -->
                                  </div> <!-- end row -->

                                  <div class="row">
                                      <div class="col-12">
                                          <div class="form-group">
                                              <label for="userbio">Bio</label>
                                              <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                          </div>
                                      </div> <!-- end col -->
                                  </div> <!-- end row -->

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="useremail">Email Address</label>
                                              <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                              <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="userpassword">Password</label>
                                              <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                              <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                          </div>
                                      </div> <!-- end col -->
                                  </div> <!-- end row -->



                                  <div class="text-right">
                                      <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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