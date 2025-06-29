<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php require('inc/links.php'); ?>
    <title> <?php echo $settings_r['site_title'] ?>-Rooms</title>
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

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shodow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filters</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropshown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="filterDropshown">
                            <!-- check Avaiability -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 classs="d-flex align-item-center justify-content-between mb-3" style="font-size: 18px;">
                                    <span>Check Avaiability</span>
                                    <button id="chk_avail_btn" onclick="chk_avail_clear()" class="btn shadow-none btn-sm text-secondary d-none">
                                        Reset
                                    </button>
                                </h5>
                                <label class="form-label ">Check in</label>
                                <input type="date" class="form-control shadow-none mb-3" id="checkin" onchange="chk_avail_filter()">
                                <h5 classs="mb-3" style="font-size: 18px;">
                                    Train
                                </h5>
                                <label class="form-label ">Check out</label>
                                <input type="date" class="form-control shadow-none " id="checkout" onchange="chk_avail_filter()">
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

            <div class="col-lg-9 col-md-12 px-4 mb-3 mb-lg-0" id="rooms-data">

            </div>
        </div>
    </div>


    <script>
        let rooms_data = document.getElementById('rooms-data');
        let checkin = document.getElementById('checkin');
        let checkout = document.getElementById('checkout');
        
        let chk_avail_btn = document.getElementById('chk_avail_btn');


        function fetch_rooms() {

            let chk_avail = JSON.stringify({
                checkin: checkin.value,
                checkout: checkout.value
            })

            let xhr = new XMLHttpRequest();
            xhr.open("GET", "ajax/rooms_crud.php?fetch_rooms&chk_avail="+chk_avail,true);

            xhr.onprogress = function() {
                rooms_data.innerHTML =  `<div class="spinner-border mb-3 text-info" id="info_loader" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>`;
            }

            xhr.onload = function() {
                rooms_data.innerHTML = this.responseText;
            }
            xhr.send();
        }
function checkLoginToBook(login, room_id) {
  if (login) {
    window.location.href = 'Rooms_details.php?id=' + room_id;
  } else {
    window.location.href = 'login.php'; // or your login page
  }
}

        function chk_avail_filter() {
            if (checkin.value != '' && checkout.value != '') {
                fetch_rooms();
                chk_avail_btn.classList.remove('d-none');
            }
        }
          function chk_avail_clear() {
            checkin.value = '' ;
            checkout.value = '';
            chk_avail_btn.classList.add('d-none');
            fetch_rooms();   
        }

        fetch_rooms();
    </script>



    <?php require('inc/footer.php'); ?>
</body>

</html>