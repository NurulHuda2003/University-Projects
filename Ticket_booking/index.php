<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Ticket Booking-Home</title>
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php require ('inc/links.php');?>
  
    <style>
.availability-form{
    margin-top: -50px;
    z-index: 2;
    position: relative;
}
@media screen and (max-width:575px){
    
.availability-form{
    margin-top: 25px;
    padding: 0 35px;
   
}
}

    </style>
    

</head>

<body class="ng-light">

   <?php require('inc/header.php'); ?>
  


    </div>
    <!-- carousel -->
    <div class="container-fluid px-lg-4 me-4">
        <!-- Swiper -->

        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/carousel/nature-1.png" loading="lazy" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/nature-2.png" loading="lazy" class="w-100  d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/nature-3.png" loading="lazy" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/nature-4.png" loading="lazy" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/nature-5.png" loading="lazy" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/nature-6.png" loading="lazy" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/train-bangladesh-1000-o.jpg" loading="lazy" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/nature-7.png" loading="lazy" class="w-100 d-block" />
                </div>
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
        <div class ="container">
            <div class="row">
                <div class ="col-lg-4 col-md-6 my-3"><!--large devices column size ==lg,md==medium devices -->
                     <!--cards div-->
                    <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                        <img src="images/rooms/1.jpeg" class="card-img-top">
                        <div class="card-body">
                          <h5 >Simple Room Name</h5>
                          <h6 class="mb-4">200৳ per night</h6>

                          <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
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
                          <div class="facilities mb-4">
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
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book now</a>
                            <a href="#" class="btn btn-sm  btn-outline-dark shadow-none">More details</a>
                          </div>
                        </div>
                      </div>

                </div>
                <div class ="col-lg-4 col-md-6 my-3"><!--large devices column size ==lg,md==medium devices -->
                    <!--cards div-->
                   <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                       <img src="images/rooms/1.jpeg" class="card-img-top">
                       <div class="card-body">
                         <h5 >Simple Room Name</h5>
                         <h6 class="mb-4">200৳ per night</h6>

                         <div class="features mb-4">
                           <h6 class="mb-1">Features</h6>
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
                         <div class="facilities mb-4">
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
                           <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book now</a>
                           <a href="#" class="btn btn-sm  btn-outline-dark shadow-none">More details</a>
                         </div>
                       </div>
                     </div>

               </div>


               <div class ="col-lg-4 col-md-6 my-3"><!--large devices column size ==lg,md==medium devices -->
                <!--cards div-->
               <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                   <img src="images/rooms/1.jpeg" class="card-img-top">
                   <div class="card-body">
                     <h5 >Simple Room Name</h5>
                     <h6 class="mb-4">200৳ per night</h6>

                     <div class="features mb-4">
                       <h6 class="mb-1">Features</h6>
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
                     <div class="facilities mb-4">
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
                       <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book now</a>
                       <a href="#" class="btn btn-sm  btn-outline-dark shadow-none">More details</a>
                     </div>
                   </div>
                 </div>

           </div>


                <div class="col-lg-12 text-center mt-5">
                    <a href="#" class="btn btn-sml btn-outline-dark rounded-0 fw-bold shadow-none">More rooms >>></a>
                </div>
            </div>
        </div>
<!--facilities-->
        <h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font">Our Facilities</h2>

        <div class="container">
            <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/features/wifi.svg" width="80px">
                    <h5 class="mt-3">Wifi</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/features/wifi.svg" width="80px">
                    <h5 class="mt-3">Wifi</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/features/wifi.svg" width="80px">
                    <h5 class="mt-3">Wifi</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/features/wifi.svg" width="80px">
                    <h5 class="mt-3">Wifi</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/features/wifi.svg" width="80px">
                    <h5 class="mt-3">Wifi</h5>
                </div>
                <div class="col-lg-12 text-center mt-5">
                    <a href="#" class="btn btn-sm btn-outline-dark  rounded-0 fw-bold shadow-none">More Facilities >></a>

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
    <a href="#" class="btn btn-sm btn-outline-dark  rounded-0 fw-bold shadow-none">Know More >></a>

</div>
        </div>

<!--   Reach Us  -->
<h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font mb-5">Reach us</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-8 md-8 p-4 mb-lg-0 mb-3 bg-white rounded ">
            <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.95338886736!2d90.41968899999999!3d23.7808405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1746562040436!5m2!1sen!2sbd"   loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
        <div class="col-lg-4 md-4"><!--md=medium device-->
            <div class="bg-white p-4 rounded mb-4">
                <h5>Call US</h5>
                <a href="Tel:+85209520632"class="d-inline-block  text-decoration-none text-none">
                    <i class="bi bi-telephone-forward-fill"></i> +85209520632</a>
                    <br>
                    <a href="Tel:+85209520632"class="d-inline-block mb-2 text-decoration-none text-none">
                        <i class="bi bi-telephone-forward-fill">+85209520632</i> </a>
                    
            </div>
            <div class="bg-white p-4 rounded mb-4">
                <h5>Follow US</h5>
                <a href="#"class="d-inline-block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-twitter me-1"></i> <!--margin end==me-->
                        Twitter
                        
                    </span>
                    </a>
                    <br>
                    <a href="#"class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> <!--margin end==me-->
                            Facebook
                            
                        </span>
                    </a>
                    <br>
                    <a href="#"class="d-inline-block">
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

<?php require('inc/footer.php');?>

        <script src="" async defer></script>
        

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

 <!-- Initialize Swiper Testimonial -->
 <script>
    var swiper = new Swiper(".SwiperTestimonial", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView:"3",
      loop:true,
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