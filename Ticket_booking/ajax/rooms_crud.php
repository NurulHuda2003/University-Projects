<?php
// Start session
session_start();

// Include essentials: constants, helper functions, etc.
require('../admin/inc/essentials.php');

// Include DB connection
require('../admin/inc/db_config.php');

if (isset($_GET['fetch_rooms'])) {
    //print_r($_GET['chk_avail']);

    //count no of rooms and output variable to store room cards
    $count_rooms = 0;
    $output = "";


    //fetching setting table to check website is  shutdown value
    $settings_q = "SELECT * FROM settings WHERE sr_no=1";
    $settings_r = mysqli_fetch_assoc(mysqli_query($con, $settings_q));



    //query for rooms
    $room_res = select("SELECT * FROM rooms WHERE status=? AND removed=? order by id desc", [1, 0], 'ii');
    while ($room_data = mysqli_fetch_assoc($room_res)) {

        //get features of room

        $fea_q = mysqli_query(
            $con,
            "select f.name from features f 
                    inner join room_features rfea on f.id=rfea.features_id
                    where rfea.room_id='$room_data[id]'"
        );

        $features_data = '';
        while ($fea_row = mysqli_fetch_assoc($fea_q)) {
            $features_data .= "
                    <span class='badge rounded-pill bg-light text-dark text-wrap'>$fea_row[name]</span>";
        }




        //get facilities of room
        $fac_q = mysqli_query($con, "SELECT f.name FROM facilities f inner join room_facilities rfac on f.id=rfac.facilities_id WHERE rfac.room_id='$room_data[id]';");

        $facilities_data = "";
        while ($fac_row = mysqli_fetch_assoc($fac_q)) {
            $facilities_data .= "
                    <span class='badge rounded-pill bg-light text-dark text-wrap'>$fac_row[name]</span>";
        }

        //get thumbnail of image
        $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpeg";
        $thumb_q = mysqli_query($con, "SELECT * FROM rooms_images 
                    WHERE room_id='$room_data[id]' and thumb=1");

        if (mysqli_num_rows($thumb_q) > 0) {
            $thumb_res = mysqli_fetch_assoc($thumb_q);
            $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
        }


        $book_btn = "";
if (!$settings_r['shutdown']) {
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        // user is logged in -> direct book link
        $book_btn = "<a href='Rooms_details.php?id={$room_data['id']}' class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book now</a>";
    } else {
        // user not logged in -> direct login page
        $book_btn = "<a href='login.php' class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book now</a>";
    }
}



        // print room card
        $output .= "
        <div class='card mb-4 border-0 shadow'>
            <div class='row g-0 p-3 align-items-center'>
                <div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>
                    <img src='$room_thumb' class='img-fluid rounded'>
                </div>
                <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                    <h5 class='mb-1'>$room_data[name]</h5>
                    <div class='features mb-3'>
                        <h6 class='mb-3'>Features</h6>
                        $features_data
                    </div>
                    <div class='facilities mb-3'>
                        <h6 class='mb-1'>Facilities</h6>
                        $facilities_data
                    </div>
                    <div class='guests'>
                        <h6 class='mb-1'>Guests</h6>
                        <span class='badge rounded-pill bg-light text-dark text-wrap'>$room_data[adult]</span>
                        <span class='badge rounded-pill bg-light text-dark text-wrap'>$room_data[children]</span>
                    </div>
                </div>
                <div class='col-md-2 mt-lg-0 mt-md-0 mt-4 text-center'>
                    <h6 class='mb-4'>$room_data[price] per night</h6>
                    $book_btn
                    <a href='Rooms_details.php?id=$room_data[id]' class='btn btn-sm w-100 btn-outline-dark shadow-none'>More details</a>
                </div>
            </div>
        </div>";
        $count_rooms++;
    }
    if ($count_rooms > 0) {
        echo $output;
    } else {
        echo "<h3 class='text-center text-danger'>No rooms found!</h3>";
    }
}
