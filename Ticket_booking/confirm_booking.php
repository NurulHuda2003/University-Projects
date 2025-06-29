<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="/Ticket_booking/css/common.css">
    <title> <?php echo $settings_r['site_title'] ?>-Rooms_deatils</title>


    <style>
        :root {
            --teal: #2ec1ac;
            --teal_hover: #279e8c;

        }

        .custom-bg {
            background-color: var(--teal) !important;
            border: 1px solid var(--teal);

        }
    </style>

</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>
    <?php

    /*
check room id from url is present or not
shutdown mode is active or not 
user is logged in or not

*/

    if (!isset($_GET['id']) || $settings_r['shutdown'] == true) {
        redirect('Rooms.php');
    } else if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        redirect('Rooms.php');
    }
    //filter and get room and user data
    $data = filteration($_GET);
    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? and `status`=? 
    AND `removed`=? ", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($room_res) == 0) {
        redirect('Rooms.php');
    }
    $room_data = mysqli_fetch_assoc($room_res);


    $_SESSION['room'] = [
        "id" => $room_data['id'],
        "name" => $room_data['name'],
        "price" => $room_data['price'],
        "payment" => null,
        "available" => false,
    ];
    //print_r($_SESSION['room']);

    $user_res = select(
        "SELECT * FROM `user_cred` WHERE `id` =? limit 1",
        [$_SESSION['uId']],
        "i"
    );
    $user_data = mysqli_fetch_assoc($user_res);
    ?>



    <div class="container">
        <div class="row">
            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold">Confirm booking</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary text-decoration-none"> > </span>
                    <a href="Rooms.php" class="text-secondary text-decoration-none">Rooms</a>
                    <span class="text-secondary text-decoration-none"> > </span>
                    <a href="Rooms.php" class="text-secondary text-decoration-none">Confirm</a>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4 ">
                <?php
                //get thumbnail of image
                $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpeg";
                $thumb_q = mysqli_query($con, "SELECT * FROM `rooms_images` 
                    WHERE `room_id`='$room_data[id]' and `thumb`=1");

                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                }
                echo <<<data
                    <div class="card p-3 shadow-sm rounded">
                    <img src="$room_thumb" class="img-fluid rounded mb-2">
                   <h5> $room_data[name] </h5>
                   <h6>$room_data[price] </h6>
                    </div>
                data;
                ?>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <form action="#" id="booking_form">
                            <h6 class="mb-3 ">BOOKING Details</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label ">Name</label>
                                    <input name="name" type="text" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input name="phonenum" type="number" value="<?php echo $user_data['phonenum'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control shadow-none" rows="1" required>
                                        <?php echo $user_data['address'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Check-in</label>
                                    <input name="checkin" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                                </div>
                                <!--have to add train dropdown for cheking train check_availability -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label mb-1">Check-out</label>
                                    <input name="checkout" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                                </div>
                                <div class="col-12">
                                    <div class="spinner-border mb-3 text-info d-none" id="info_loader" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <h6 class="mb-3 text-danger" id="pay_info">Provide checkin & checkout date!</h6>
                                    <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled>Pay Now</button>

                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>


        </div>
    </div>


    <?php require('inc/footer.php'); ?>
    <script>
        let booking_form = document.getElementById('booking_form');
        let info_loader = document.getElementById('info_loader');
        let pay_info = document.getElementById('pay_info');

        function check_availability() {
            let checkin_val = booking_form.elements['checkin'].value;
            let checkout_val = booking_form.elements['checkout'].value;

            booking_form.elements['pay_now'].setAttribute('disabled', true);

            if (checkin_val != '' && checkout_val != '') {

                pay_info.classList.add('d-none');
                pay_info.classList.replace('text-dark', 'text-danger');
                info_loader.classList.remove('d-none');

                let data = new FormData();

                data.append('check_availability', '');
                data.append('check_in', checkin_val);
                data.append('check_out', checkout_val);

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/confirm_booking_crud.php", true);

                xhr.onload = function() {
                    let data = JSON.parse(this.responseText);

                    if (data.status == 'check_in_out_equal') {
                        pay_info.innerText = "You cannot check-out on the same day";
                    } else if (data.status == 'check_out_earlier') {
                        pay_info.innerText = "Checkout date is earlier than chekin date";
                    } else if (data.status == 'check_in_earlier') {
                        pay_info.innerText = "Checkin date is earlier than chekin date";
                    } else if (data.status == 'unavaiable') {
                        pay_info.innerText = "Room not available for this date";
                    } else {
                        pay_info.innerHTML = "No. of days: " + data.days + "<br>Total Amount to pay: " + data.payment;
                        pay_info.classList.replace('text-danger', 'text-dark');
                        booking_form.elements['pay_now'].removeAttribute('disabled');

                    }
                    pay_info.classList.remove('d-none');
                    info_loader.classList.add('d-none');

                }
                xhr.send(data);
            }


        }
    </script>
</body>

</html>