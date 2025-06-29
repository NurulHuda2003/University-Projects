<!-- Footer design-->
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2"><?php echo $settings_r['site_title'] ?> </h3>
            <p>
                <?php echo $settings_r['site_about'] ?>
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
            <a href="Rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
            <a href="Facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilites</a><br>
            <a href="Contact_us.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a><br>
            <a href="About_us.php" class="d-inline-block mb-2 text-dark text-decoration-none">About Us</a><br>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow US</h5>
            <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-instagram me-1"></i> <!--margin end==me-->
                instagram
            </a>
            <br>
            <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-facebook me-1"></i> <!--margin end==me-->
                Facebook
            </a>
            <br>
            <?php
            if ($contact_r['twi'] != '') {
                echo <<<data
                    <a href="$contact_r[twi]" class="d-inline-block text-dark text-decoration-none">
                    <i class="bi bi-twitter me-1"></i> <!--margin end==me-->
                    Twitter
                </a>
                <br>
                data;
            }
            ?>

        </div>
    </div>
</div>

<h6 class="text-center bg-dark text-white p-3 m-0">
    Design and Devoloped by BSDK
</h6>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    function alert(type, msg, position = 'body') {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `
      <div class="alert ${bs_class} alert-dismissible fade show " role="alert">
        <strong class="me-3">${msg}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;

        if (position == 'body') {
            document.body.append(element);
            element.classList.add('custom-alert');
        } else {
            document.getElementById(position).appendChild(element);
        }

        document.body.append(element);
        setTimeout(remAlert, 3000);
    }

    function remAlert() {
        document.getElementsByClassName('alert')[0].remove();
    }


    function setActive() {
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');
        for (i = 0; i < a_tags.length; i++) {
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];
            if (document.location.href.indexOf(file_name) >= 0) {
                a_tags[i].classList.add('active');
            }
        }
    }
    setActive();

    let register_form = document.getElementById('register_form');
    register_form.addEventListener('submit', function(e) {
        e.preventDefault();

        let data = new FormData();
        data.append('name', register_form.elements['name'].value);
        data.append('email', register_form.elements['email'].value);
        data.append('phonenum', register_form.elements['phonenum'].value);
        data.append('address', register_form.elements['address'].value);
        data.append('pincode', register_form.elements['pincode'].value);
        data.append('dob', register_form.elements['dob'].value);
        data.append('pass', register_form.elements['pass'].value);
        data.append('cpass', register_form.elements['cpass'].value);
        data.append('profile', register_form.elements['profile'].files[0]);
        data.append('register', '');

        var myModal = document.getElementById('RegisterModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register_crud.php", true);

        xhr.onload = function() {
            if (this.responseText == 'pass_mismatch') {
                alert('error', "PAssword pass_mismatch");
            } else if (this.responseText == 'email_already') {
                alert('error', 'Email is already registered');
            } else if (this.responseText == 'phone_already') {
                alert('error', 'Email is already registered');
            } else if (this.responseText == 'inv_already') {
                alert('error', 'Only Jpg,webp & png are allowed');
            } else if (this.responseText == 'upd_failed') {
                alert('error', 'Image upload failed');
            } else if (this.responseText == 'ins_failed') {
                alert('error', 'Registation failed');
            } else {
                alert('success', "Registation Successful");
                register_form.reset();
            }
        };

        xhr.send(data);

    });
    setActive();


    let login_form = document.getElementById('login-form');

    login_form.addEventListener('submit', function(e) {
        e.preventDefault();

        let data = new FormData();

        data.append('email_mob', login_form.elements['email_mob'].value);
        data.append('pass', login_form.elements['pass'].value);

        data.append('login', '');

        var myModal = document.getElementById('LoginModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register_crud.php", true);

        xhr.onload = function() {
            if (this.responseText == 'inv_email/mobile num') {
                alert('error', "Valid Email or  Mobile Phone");
            } else if (this.responseText == 'inactive') {
                alert('error', "Account suspended");
            } else if (this.responseText == 'inv_pass') {
                alert('error', "Password doenst match");
            }
            //  else if (this.responseText == 'inv_already') {
            else {
                let fileurl = window.location.href.split('/').pop().split('?').shift();
                if (fileurl == 'room_details.php') {
                    window.location = window.location.href;
                } else {
                    window.location = window.location.pathname;

                }
            }
        };

        xhr.send(data);

    });

    function checkLoginToBook(status, room_id) {
        if (status) {
            window.location.href = 'confirm_booking.php?id=' + room_id;
        } else {
            alert('error', 'Please login in to book Ticket')
        }
    }



    setActive();
</script>