<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php require('inc/links.php'); ?>
    <title> <?php echo $settings_r['site_title'] ?>-About</title>


    <style>
        .box {
            /* border-top-color:var(--teal)!important; */
            border-top-color: aqua !important;
        }
    </style>

</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>
    <!--About us-->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">About Us</h2>
        <div class="h-line bg-dark "></div> <!--horizontal line-->
        <p class="text-center mt-3">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam are the offices as things! Rejected asperieres cumque ad sapiente, sed dolores quibusdam inventore voluptate dolor! We lead them to hinder to obtain amet ipsum!        </p>
    </div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">It is a very painful experience.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam are the offices as things! Rejected asperieres cumque ad sapiente, sed dolores quibusdam inventore voluptate dolor! We lead them to hinder to obtain amet ipsum!

                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="images/About/About.avif" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/About/hotel.svg" width="70px">
                    <h4 class="mt-3">100+ Rooms</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/About/customers.svg" width="70px">
                    <h4 class="mt-3">200+ Customers</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/About/rating.svg" width="70px">
                    <h4 class="mt-3">200+ Reviews</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/About/staff.svg" width="70px">
                    <h4 class="mt-3">300+ Staffs</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Team-->
    <h3 class="my-5 fw-bold h-font text-center">Management Team</h3>
    <div class="container px-4 ">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <?php
                    $about_r=selectALL('team_details');
                    $path=ABOUT_IMG_PATH;
                    while($row=mysqli_fetch_array($about_r)){
                        echo<<<data
                            <div class="swiper-slide bg-white text-center overflow-10 rounded">
                            <img src="$path$row[picture]" class="w-100">
                            <h5 class="mt-2">$row[name]</h5>
                        </div>
                        data;
                    }
                ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween:40,
            loop:true,
            grabCursor:true,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints:{
        320:{
            slidesPerView:1,
        },
        640:{
            slidesPerView:1,
        },
        768:{
            slidesPerView:2,
        },
        1024:{
            slidesPerView:3,
        }
      }

        });
    </script>
</body>

</html>