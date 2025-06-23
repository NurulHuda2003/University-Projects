<?php
require('inc/essentials.php');

adminLogin();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Settings</title>
    <?php
    require('inc/links.php')
    ?>
</head>

<body class="bg-light">
    <?php
    require('inc/header.php')
    ?>



    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="mb-4"> Settings</h4>

                <!-- General setting -->
                <div class="card border-0 shadow-sm rounded p-4 mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">General Settings</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"> </p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text" id="site_about"> </p>
                    </div>
                </div>

                <!-- General setting Modal section-->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Setting</h5>
                                </div>
                                <div class="modal-body">
                                    <div class=" mb-3"> <!--  md-6 divide the page into half -->
                                        <label class="form-label fw-bold ">Site Title</label>
                                        <input required type="text" id="site_title_inp" name="site_title" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3"> <!--  md-6 divide the page into half -->
                                        <label class="form-label fw-bold">About Us</label>
                                        <textarea required name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value=general_data.site_title; site_about.value=general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- shutdhown section-->
                <div class="card border-0 shadow-sm rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Shutdown Website</h5>
                        <div class="form-check form-switch">
                            <form>
                                <input onchange="update_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown_toggle">
                            </form>

                        </div>
                    </div>
                    <p class="card-text  ">
                        No customer will be allow to book ticket , when shutdown is activated.
                    </p>
                </div>

                <!-- Contact Details section -->
                <div class="card border-0 shadow-sm rounded p-4 mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Contact Settings</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contact-s">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                <p class="card-text" id="address"> </p>
                            </div>
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                <p class="card-text" id="gmap"> </p>
                            </div>
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">Phone Number</h6>
                                <p class="card-text mb-1"><i class="bi bi-telephone-fill"></i>
                                    <span id="pn1">
                                    </span>
                                </p>
                                <p class="card-text"><i class="bi bi-telephone-fill"></i>
                                    <span id="pn2">
                                    </span>
                                </p>
                            </div>
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                                <p class="card-text" id="email"> </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">Specials Links</h6>
                                <p class="card-text mb-1"><i class="bi bi-facebook me-1"></i>
                                    <span id="fb">
                                    </span>
                                </p>
                                <p class="card-text mb-1"><i class="bi bi-instagram me-1"></i>
                                    <span id="insta">
                                    </span>
                                </p>
                                <p class="card-text">
                                    <i class="bi bi-twitter me-1"></i>
                                    <span id="tw">
                                    </span>
                                </p>
                            </div>
                            <div class="mb-4">
                                <h6 class="card-subtitle mb-1 fw-bold">i-Frame</h6>
                                <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact US setting  Modal section-->
                <div class="modal fade" id="contact-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Contact Setting</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class=" mb-3">
                                                    <label class="form-label fw-bold ">Address</label>
                                                    <input required type="text" id="address_inp" name="address" class="form-control shadow-none" required>
                                                </div>
                                                <div class=" mb-3">
                                                    <label class="form-label fw-bold ">Google Map link</label>
                                                    <input required type="text" id="gmap_inp" name="gmap" class="form-control shadow-none" required>
                                                </div>
                                                <div class=" mb-3">
                                                    <label class="form-label fw-bold ">Phone Numbers (with country code)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-telephone-fill"></i> </span>
                                                        <input type="number" name="pn1" id="pn1_inp" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-telephone-fill"></i> </span>
                                                        <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-none">
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <label class="form-label fw-bold ">Email</label>
                                                    <input required type="email" id="email_inp" name="email" class="form-control shadow-none" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class=" mb-3">
                                                    <label class="form-label fw-bold ">Social Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-facebook "></i> </span>
                                                        <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-instagram"></i> </span>
                                                        <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"> <i class="bi bi-twitter"></i> </span>
                                                        <input type="text" name="tw" id="tw_inp" class="form-control shadow-none">
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <label class="form-label fw-bold ">iFrame src</label>
                                                    <input required type="text" id="iframe_inp" name="iframe" class="form-control shadow-none" required>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- Management team section -->
                <div class="card border-0 shadow-sm rounded p-4 mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Management team </h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
                                <i class="bi bi-plus-square"></i></i> Add
                            </button>
                        </div>

                        <!-- image fetching portion -->
                        <div class="row" id="team-data">
                        </div>

                    </div>
                </div>


                <!--Management Section Modal section-->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add team member</h5>
                                </div>
                                <div class="modal-body">
                                    <div class=" mb-3"> <!--  md-6 divide the page into half -->
                                        <label class="form-label fw-bold ">Name</label>
                                        <input required type="text" id="member_name_inp" name="member_name" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3"> <!--  md-6 divide the page into half -->
                                        <label class="form-label fw-bold">Picture</label>
                                        <input required type="file" id="member_picture_inp" accept=".jpg,.png,.webp,.jpeg" name="member_picture" class="form-control shadow-none" required>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="member_name.value ='' ,member_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>



            </div>
        </div>
    </div>

    <?php
    require('inc/script.php')
    ?>
    <script src="scripts/settings.js"></script>

</body>

</html>