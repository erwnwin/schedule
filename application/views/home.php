<div class="mobile-menu-overlay"></div>

<div class="main-container">



    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Home</h2>
        </div>

        <div class="row pb-10">

            <div class="col-xl-12 col-lg-12 col-md-6 mb-20">
                <div class="pd-20 card-box height-100-p">
                    <div id="carouselHomePage" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselHomePage" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselHomePage" data-slide-to="1"></li>
                            <li data-target="#carouselHomePage" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?= base_url() ?>assets/depan/vendors/images/img3.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url() ?>assets/depan/vendors/images/img4.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url() ?>assets/depan/vendors/images/img5.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselHomePage" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselHomePage" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-6 mb-20">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading h4">Well done!</h4>
                    <p>
                        Aww yeah, you successfully read this important alert
                        message. This example text is going to run a bit longer so
                        that you can see how spacing within an alert works with this
                        kind of content.
                    </p>
                    <hr />
                    <p class="mb-0">
                        Whenever you need to, be sure to use margin utilities to
                        keep things nice and tidy.
                    </p>
                </div>
            </div>

        </div>




        <!-- <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">Recent Patient</div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Name</th>
                        <th>Gender</th>
                        <th>Weight</th>
                        <th>Assigned Doctor</th>
                        <th>Admit Date</th>
                        <th>Disease</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/depan/vendors/images/photo4.jpg" class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="weight-600">Jennifer O. Oster</div>
                                </div>
                            </div>
                        </td>
                        <td>Female</td>
                        <td>45 kg</td>
                        <td>Dr. Callie Reed</td>
                        <td>19 Oct 2020</td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Typhoid</span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/depan/vendors/images/photo5.jpg" class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="weight-600">Doris L. Larson</div>
                                </div>
                            </div>
                        </td>
                        <td>Male</td>
                        <td>76 kg</td>
                        <td>Dr. Ren Delan</td>
                        <td>22 Jul 2020</td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Dengue</span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/depan/vendors/images/photo6.jpg" class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="weight-600">Joseph Powell</div>
                                </div>
                            </div>
                        </td>
                        <td>Male</td>
                        <td>90 kg</td>
                        <td>Dr. Allen Hannagan</td>
                        <td>15 Nov 2020</td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Infection</span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/depan/vendors/images/photo9.jpg" class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="weight-600">Jake Springer</div>
                                </div>
                            </div>
                        </td>
                        <td>Female</td>
                        <td>45 kg</td>
                        <td>Dr. Garrett Kincy</td>
                        <td>08 Oct 2020</td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Covid 19</span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/depan/vendors/images/photo1.jpg" class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="weight-600">Paul Buckland</div>
                                </div>
                            </div>
                        </td>
                        <td>Male</td>
                        <td>76 kg</td>
                        <td>Dr. Maxwell Soltes</td>
                        <td>12 Dec 2020</td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Asthma</span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/depan/vendors/images/photo2.jpg" class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="weight-600">Neil Arnold</div>
                                </div>
                            </div>
                        </td>
                        <td>Male</td>
                        <td>60 kg</td>
                        <td>Dr. Sebastian Tandon</td>
                        <td>30 Oct 2020</td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Diabetes</span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/depan/vendors/images/photo8.jpg" class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="weight-600">Christian Dyer</div>
                                </div>
                            </div>
                        </td>
                        <td>Male</td>
                        <td>80 kg</td>
                        <td>Dr. Sebastian Tandon</td>
                        <td>15 Jun 2020</td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Diabetes</span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/depan/vendors/images/photo1.jpg" class="border-radius-100 shadow" width="40" height="40" alt="" />
                                </div>
                                <div class="txt">
                                    <div class="weight-600">Doris L. Larson</div>
                                </div>
                            </div>
                        </td>
                        <td>Male</td>
                        <td>76 kg</td>
                        <td>Dr. Ren Delan</td>
                        <td>22 Jul 2020</td>
                        <td>
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Dengue</span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                                <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> -->

        <!-- <div class="title pb-20 pt-20">
            <h2 class="h3 mb-0">Quick Start</h2>
        </div> -->