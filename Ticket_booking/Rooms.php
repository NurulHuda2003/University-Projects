<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Ticket Booking-Rooms</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="/Ticket_booking/css/common.css">

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
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Rooms</h2>
        <div class="h-line bg-dark "></div> <!--horizontal line-->
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shodow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filters</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropshown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="filterDropshown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 classs="mb-3" style="font-size: 18px;">
                                    Check Avaiability</h5>
                                <label class="form-label ">Check in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <h5 classs="mb-3" style="font-size: 18px;">
                                    Check Avaiability</h5>
                                <label class="form-label ">Check out</label>
                                <input type="date" class="form-control shadow-none ">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 classs="mb-3" style="font-size: 18px;">
                                    Facilities</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">

                                    <label class="form-label" for="f1">Facilities one</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">

                                    <label class="form-label" for="f2">Facilities two</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none">

                                    <label class="form-label" for="f3">Facilities three</label>
                                </div>
                            </div>
                            <!-- Guest-->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 classs="mb-3" style="font-size: 18px;">Guest</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label" for="f1">Adults</label>
                                        <input type="number" id="f1" class="form-control shadow-none me-1">
                                    </div>
                                    <div>
                                        <label class="form-label" for="f1">Children</label>
                                        <input type="number" id="f1" class="form-control shadow-none me-1">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4 mb-3 mb-lg-0">
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">


                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpeg" class="img-fluid rounded">
                        </div>

                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Simple Room Name</h5>
                            <!--room features-->
                            <div class="features mb-3">
                                <h6 class="mb-3">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Bathrooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Kitchen
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Belcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Sofa
                                </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Ac
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Room Heater
                                </span>
                            </div>

                            <div class="guests">
                                <h6 class="mb-1"> Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    4 Children
                                </span>

                            </div>

                        </div>


                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">200৳ per night</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>

                        </div>



                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">


                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpeg" class="img-fluid rounded">
                        </div>

                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Simple Room Name</h5>
                            <!--room features-->
                            <div class="features mb-3">
                                <h6 class="mb-3">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Bathrooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Kitchen
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Belcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Sofa
                                </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Ac
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Room Heater
                                </span>
                            </div>

                            <div class="guests">
                                <h6 class="mb-1"> Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    4 Children
                                </span>

                            </div>

                        </div>


                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">200৳ per night</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>

                        </div>



                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">


                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpeg" class="img-fluid rounded">
                        </div>

                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Simple Room Name</h5>
                            <!--room features-->
                            <div class="features mb-3">
                                <h6 class="mb-3">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Bathrooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Kitchen
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Belcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    2 Sofa
                                </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Ac
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">
                                    Room Heater
                                </span>
                            </div>

                            <div class="guests">
                                <h6 class="mb-1"> Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    4 Children
                                </span>

                            </div>

                        </div>


                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">200৳ per night</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>

                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php require('inc/footer.php'); ?>
</body>

</html>