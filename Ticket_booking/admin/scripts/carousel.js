let carousel_s_form = document.getElementById("carousel_s_form");
let carousel_picture_inp = document.getElementById("carousel_picture_inp");

carousel_s_form.addEventListener("submit", function (e) {
  e.preventDefault();
  add_image();
});

function add_image() {
  let data = new FormData();
  data.append("picture", carousel_picture_inp.files[0]);
  data.append("add_image", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/carousel_crud.php", true);

  xhr.onload = function () {
    var myModal = document.querySelector("#carousel-s");
    var modal = bootstrap.Modal.getOrCreateInstance(myModal); // Returns a Bootstrap modal instance
    modal.hide();

    if (this.responseText == "success") {
      alert("success", "New carousel Added!");
      carousel_picture_inp.value = "";
      location.reload();  // <--- This reloads everything, including Swiper images
      get_carousel();
       
    } else if (this.responseText == "db_failed") {
      alert("error", "Database insert failed");
    } else if (this.responseText == "inv_img") {
      alert("error", "Only jpg, jpeg, png, webp are allowed");
    } else if (this.responseText == "inv_size") {
      alert("error", "File too large. Max 2MB");
    } else if (
      this.responseText == "upd_failed" ||
      this.responseText == "upload_error"
    ) {
      alert("error", "Image upload failed");
    }
  };
  xhr.send(data);
}

function get_carousel() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/carousel_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("carousel-data").innerHTML = this.responseText;
  };
  xhr.send('get_carousel');
}

function rem_image(val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/carousel_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.response == 1) {
      alert("success", "Carousel removed");
      get_carousel();
    } else {
      alert("error", "Server down!");
    }
  };

  xhr.send("rem_image=" + val);
}

window.onload = function () {
  get_carousel();
};
