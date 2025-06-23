<!-- Footer design-->
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2">All in one place</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, excepturi tempora quibusdam quas architecto et, obcaecati, expedita tempore facere odit velit sequi. Iusto, ex ducimus culpa odit obcaecati velit esse.

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
            if($contact_r['twi']!=''){
                echo<<<data
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
    function setActive(){
       let navbar=document.getElementById('nav-bar');
        let a_tags=navbar.getElementsByTagName('a');
        for(i=0;i<a_tags.length;i++){
            let file=a_tags[i].href.split('/').pop();
            let file_name=file.split('.')[0];
            if(document.location.href.indexOf(file_name)>=0){
                a_tags[i].classList.add('active');
            }
        }
    }
    setActive();
 </script>