<!--common things for each pages-->

<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top ">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><?php echo $settings_r['site_title'] ?></a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" href="index.php">Home</a>
                </li>

                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="Rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="Facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="Contact_us.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="About_us.php">About us</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>


            <div class="d-flex">
              <?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $path = USERS_IMG_PATH;
    echo <<<data
    <div class="btn-group">
        <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <img src="{$path}{$_SESSION['uPic']}" style="width:25px;height:25px;" class="me-1">   
            {$_SESSION['uname']}
        </button>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
    </div>
    data;
} else {

echo <<<data
    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</button>
    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#RegisterModal">Register</button>
data;
}
?>       
            </div>

        </div>
    </div>
</nav>


<!-- LOGIN Modal -->
<div class="modal fade" id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


            <form id="login-form">
                <div class="modal-header">
                    <h5 class="modal-titled-flex aling-items-center">

                        <i class="bi bi-person-circle"></i> User Login
                    </h5>

                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Email/Phone </label>
                        <input type="text" name="email_mob" id="email_mob" required class="form-control shadow-none">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div> -->
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" requierd class="form-control shadow-none ">
                    </div>
                    <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none me-2">Login</button>
                        <!-- <a href="javascript:void(0) " class="text-secondary text-decoration-none">Forgot
                            Password?</a> -->
                            <a href="javascript:void(0)" class="text-secondary text-decoration-none" data-bs-toggle="modal" data-bs-target="#ForgotPassModal">Forgot Password?</a>


                    </div>

                </div>
            </form>

        </div>
    </div>
</div>




<!-- Register Modal -->
<div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register_form">
                <div class="modal-header">
                    <h5 class="modal-titled-flex aling-items-center">

                        <i class="bi bi-person-vcard fs-3 me-2"></i> User Registation
                    </h5>

                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Note: Yours details must match with your ID(NID, Passport, Driving License)
                        that will be required during check-in.
                    </span>
                    <div class="container-fluid ">
                        <div class="row ">
                            <div class="col-md-6 ps-0 mb-3"> <!--  md-6 divide the page into half -->
                                <label class="form-label ">Full Name</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>


                            <div class="col-md-6 p-0 mb-3"> <!--  md-6 divide the page into half -->
                                <label class="form-label ">Email Address</label>
                                <input type="email" name="email" class="form-control shadow-none " required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3"> <!--  md-6 divide the page into half -->
                                <label class="form-label ">Phone Number</label>
                                <input type="Number" name="phonenum" class="form-control shadow-none " required>
                            </div>


                            <div class="col-md-6 p-0 mb-3"> <!--  md-6 divide the page into half -->
                                <label class="form-label ">Picture</label>
                                <input name="profile" type="File" accept=".jpg,.jpeg,.png,.webp" class="form-control shadow-none " required>
                            </div>
                            <div class="col-md-12 ps-0 mb-3"> <!--  md-6 divide the page into half -->
                                <label class="form-label ">Adress</label>
                                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                            </div>

                            <div class="col-md-6 ps-0 mb-3"> <!--  md-6 divide the page into half -->
                                <label class="form-label ">Pin code</label>
                                <input name="pincode" type="Number" class="form-control shadow-none " required>
                            </div>
                            <div class="col-md-6 p-0 mb-3"> <!--  md-6 divide the page into half -->
                                <label class="form-label ">Date of Birth</label>
                                <input name="dob" type="date" class="form-control shadow-none " required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3"> <!--  md-6 divide the page into half -->
                                <label class="form-label ">password</label>
                                <input type="password" name="pass" class="form-control shadow-none " required>
                            </div>
                            <div class="col-md-6 p-0 mb-3"> <!--  md-6 divide the page into half -->
                                <label class="form-label ">Confirm Password</label>
                                <input type="password" name="cpass" class="form-control shadow-none " required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shadow-none me-2">Register</button>
                    </div>
                </div>


        </div>
        </form>

    </div>
</div>




<!-- Forgot Password Modal -->
<!-- <div class="modal fade" id="ForgotPassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ForgotPassLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="forgot-pass-form">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-key me-2"></i> Forgot Password
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Registered Email or Phone</label>
                        <input type="text" name="email_mob" class="form-control shadow-none" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark shadow-none">Send Reset Link</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
fetch('ajax/login_register_crud.php', {
    method: 'POST',
    body: formData
})
.then(response => response.text())
.then(data => {
    console.log("Forgot password response:", data); // Debug line

    if (data.startsWith("reset_link:")) {
        const resetLink = data.split("reset_link:")[1];
        alert("A reset link has been generated. You will now be redirected to reset your password.");
        window.location.href = resetLink;  // 🚨 This redirects the user to reset_password.php
    } else if (data === 'not_found') {
        alert("No account found with that email or phone number.");
    } else {
        alert("Something went wrong: " + data);
    }
})
.catch(error => {
    console.error('Error:', error);
    alert("An unexpected error occurred.");
});


</script> -->

