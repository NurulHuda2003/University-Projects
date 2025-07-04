<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php require('inc/links.php'); ?>
  
    <title> <?php echo $settings_r['site_title'] ?> -Home</title>

    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width:575px) {

            .availability-form {
                margin-top: 25px;
                padding: 0 35px;

            }
        }
    </style>
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



    </div>
    <!-- carousel -->
    <div class="container-fluid px-lg-4 me-4">
        <!-- Swiper -->

        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                $res = selectALL('carousel');
                while ($row = mysqli_fetch_assoc($res)) {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<<data
                <div class="swiper-slide">
                    <img src="$path$row[image]" loading="lazy" class="w-100 d-block" />
                </div>
                data;
                }

                ?>
            </div>


        </div>


        <!-- check availability -->
        <div class="container availability-form">
            <div class="row">
                <div class="col-lg-12 bg-white shadow p-4 rounded">
                    <h5 class="mb-4">Check booking availability</h5>
                    <form>
                        <div class="row align-items-end">
                            <div class="col-lg-3">
                                <label class="form-label " style="font-weight:500;">Check in</label>
                                <input type="date" class="form-control shadow-none ">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label " style="font-weight:500;">Check out</label>
                                <input type="date" class="form-control shadow-none ">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label" style="font-weight: 500;">Adult</label>
                                <select class="form-select shadow-none">

                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label" style="font-weight: 500;">Children</label>
                                <select class="form-select shadow-none">

                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br>



        <!--Room  -->
        <h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2>
        <div class="container">
            <div class="row">

                <?php
                $room_res = select("SELECT * FROM `rooms` WHERE `status`=? 
                AND `removed`=?  order by `id` desc limit 3", [1, 0], 'ii');

                while ($room_data = mysqli_fetch_assoc($room_res)) {

                    //get features of room

                    $fea_q = mysqli_query(
                        $con,
                        "select f.name from `features` f 
                    inner join `room_features` rfea on f.id=rfea.features_id
                    where rfea.room_id='$room_data[id]'"
                    );

                    $features_data = '';
                    while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                        $features_data .= "
                    <span class='badge rounded-pill bg-light text-dark text-wrap'>$fea_row[name]</span>";
                    }




                    //get facilities of room
                    $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f inner join `room_facilities` rfac on f.id=rfac.facilities_id WHERE rfac.room_id='$room_data[id]';");

                    $facilities_data = "";
                    while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                        $facilities_data .= "
                    <span class='badge rounded-pill bg-light text-dark text-wrap'>$fac_row[name]</span>";
                    }

                    //get thumbnail of image
                    $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpeg";
                    $thumb_q = mysqli_query($con, "SELECT * FROM `rooms_images` 
                    WHERE `room_id`='$room_data[id]' and `thumb`=1");

                    if (mysqli_num_rows($thumb_q) > 0) {
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                    }

                    $book_btn="";
                    if(!$settings_r['shutdown']){
                        $login=0;
                        if(isset($_SESSION['login'])&& $_SESSION['login']==true){
                            $login=1;
                        }
                        $book_btn="<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm w-80 btn-outline-dark text-white custom-bg shadow-none mb-2'>Book now</button>
";
                    }


                    //print room card
                    echo <<<data
                            <div class="col-lg-4 col-md-6 my-3"><!--large devices column size ==lg,md==medium devices -->
                        <!--cards div-->
                        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                            <img src="$room_thumb" class="card-img-top">
                            <div class="card-body">
                                <h5 class="mb-1">$room_data[name]</h5>
                                <h6 class="mb-4">৳$room_data[price] per night</h6>

                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                 $features_data
                                </div>
                                <div class="facilities mb-4">
                                    <h6 class="mb-1">Facilities</h6>
                                   $facilities_data
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb-1"> Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        $room_data[adult] Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        $room_data[children] Children
                                    </span>

                                </div>
                                <div class="Rating mb-4">
                                    <h6 class="mb-1">Rating</h6>
                                    <span class="badge rounded-pill bg-light">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-half text-warning"></i>
                                    </span>

                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                $book_btn
                                    <a href="Rooms_details.php?id=$room_data[id]" class="btn btn-sm  btn-outline-dark shadow-none">More details</a>
                                </div>
                            </div>
                        </div>

                    </div>

                   
                   data;
                }
                ?>


                <div class="col-lg-12 text-center mt-5">
                    <a href="Rooms.php" class="btn btn-sml btn-outline-dark rounded-0 fw-bold shadow-none">More rooms >>></a>
                </div>
            </div>
        </div>



        <!--facilities-->
        <h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font">Our Facilities</h2>
        <div class="container">
            <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
                <?php
                $res = mysqli_query($con, "select * from `facilities`
                     order by `id` desc limit 5");
                $path = FACILITIES_IMG_PATH;
                while ($row = mysqli_fetch_assoc($res)) {
                    echo <<<data
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="$path$row[icon]" width="60px">
                    <h5 class="mt-3">$row[name]</h5>
                </div>

        data;
                }
                ?>

                <div class="col-lg-12 text-center mt-5">
                    <a href="Facilities.php" class="btn btn-sm btn-outline-dark  rounded-0 fw-bold shadow-none">More Facilities >></a>

                </div>
            </div>
        </div>

        <!--   Testimonial  -->
        <h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font mb-5">Testimonials</h2>
        <div class="container">
            <!-- Swiper -->
            <div class="swiper SwiperTestimonial">
                <div class="swiper-wrapper mb-5">

                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/features/wifi.svg" width="30px">
                            <h6 class="m-0 ms-2">Random user 1</h6>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ad dolore tenetur ab quis adipisci libero corporis distinctio iste repellat vero eveniet qui, placeat temporibus id hic dolores fugiat voluptatum.
                        </p>
                        <div class="Rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/features/wifi.svg" width="30px">
                            <h6 class="m-0 ms-2">Random user 2</h6>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ad dolore tenetur ab quis adipisci libero corporis distinctio iste repellat vero eveniet qui, placeat temporibus id hic dolores fugiat voluptatum.
                        </p>
                        <div class="Rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white p-4">
                        <div class="profile d-flex align-items-center mb-3">
                            <img src="images/features/wifi.svg" width="30px">
                            <h6 class="m-0 ms-2">Random user 3</h6>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ad dolore tenetur ab quis adipisci libero corporis distinctio iste repellat vero eveniet qui, placeat temporibus id hic dolores fugiat voluptatum.
                        </p>
                        <div class="Rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="About_us.php" class="btn btn-sm btn-outline-dark  rounded-0 fw-bold shadow-none">Know More >></a>

            </div>
        </div>


        <!--   Reach Us  -->
        <h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font mb-5">Reach us</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 md-8 p-4 mb-lg-0 mb-3 bg-white rounded ">
                    <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
                <div class="col-lg-4 md-4"><!--md=medium device-->
                    <div class="bg-white p-4 rounded mb-4">
                        <h5>Call US</h5>
                        <a href="Tel:+<?php echo $contact_r['ph1'] ?>" class="d-inline-block  text-decoration-none text-none">
                            <i class="bi bi-telephone-forward-fill"></i> +<?php echo $contact_r['ph1'] ?>
                        </a>
                        <br>
                        <?php
                        $ph2 = $contact_r['ph2'];
                        if ($contact_r['ph2'] != '') {
                            echo <<<data

                                 <a href="Tel:+$ph2" class="d-inline-block mb-2 text-decoration-none text-none">
                            <i class="bi bi-telephone-forward-fill">+$ph2</i></a>
                         data;
                        }
                        ?>


                    </div>
                    <div class="bg-white p-4 rounded mb-4">
                        <h5>Follow US</h5>
                        <?php
                        if ($contact_r['twi'] != '') {
                            echo <<<data
                                <a href="$contact_r[twi]" class="d-inline-block mb-3">
                                <span class="badge bg-light text-dark fs-6 p-2">
                                    <i class="bi bi-twitter me-1"></i> <!--margin end==me-->
                                    Twitter

                                </span>
                            </a>
                            <br>
                            data;
                        }
                        ?>

                        <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3">
                            <span class="badge bg-light text-dark fs-6 p-2">
                                <i class="bi bi-facebook me-1"></i> <!--margin end==me-->
                                Facebook

                            </span>
                        </a>
                        <br>
                        <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block">
                            <span class="badge bg-light text-dark fs-6 p-2">
                                <i class="bi bi-instagram me-1"></i> <!--margin end==me-->
                                instagram

                            </span>
                        </a>
                        <br>

                    </div>

                </div>
            </div>
        </div>


        <!--footer -->

        <?php require('inc/footer.php'); ?>

        <script src="" async defer></script>


        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper Testimonial -->
        <script>
            var swiper = new Swiper(".SwiperTestimonial", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: "auto",
                slidesPerView: "3",
                loop: true,
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                    },
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });
        </script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                spacebetween: 40,
                effect: "fade",
                loop: true,
                autoplay: {
                    delay: 4000,
                    disabelOnInteraction: false,
                }

                //mousewheel: true,
                //   navigation: {
                //     nextEl: ".swiper-button-next",
                //     prevEl: ".swiper-button-prev",
                //   },



            });
        </script>
        </script>

</body>

</html>