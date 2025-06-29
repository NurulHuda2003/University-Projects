let add_room_form = document.getElementById("add_room_form");

add_room_form.addEventListener("submit", function (e) {
  e.preventDefault();
  add_room();
});

function add_room() {
  let data = new FormData();
  data.append("add_room", "");
  data.append("name", add_room_form.elements["name"].value);
  data.append("area", add_room_form.elements["area"].value);
  data.append("price", add_room_form.elements["price"].value);
  data.append("quantity", add_room_form.elements["quantity"].value);
  data.append("adult", add_room_form.elements["adult"].value);
  data.append("children", add_room_form.elements["children"].value);
  data.append("desc", add_room_form.elements["desc"].value);

  let features = [];

  add_room_form.elements["features"].forEach((el) => {
    if (el.checked) {
      features.push(el.value);
    }
  });

  let facilities = [];

  //this doesnt work if there is one feature only work if there is more than one
  add_room_form.elements["facilities"].forEach((el) => {
    if (el.checked) {
      facilities.push(el.value);
    }
  });

  // --- Features ---
  // let features = [];
  // let featureElements = add_room_form.elements['features'];
  // if (!featureElements.length) featureElements = [featureElements];

  // featureElements.forEach(el => {
  //     if (el.checked) features.push(el.value);
  // });

  // // --- Facilities ---
  // let facilities = [];
  // let facilityElements = add_room_form.elements['facilities'];
  // if (!facilityElements.length) facilityElements = [facilityElements];

  // facilityElements.forEach(el => {
  //     if (el.checked) facilities.push(el.value);
  // });

  data.append("features", JSON.stringify(features));
  data.append("facilities", JSON.stringify(facilities));

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms_crud.php", true);

  xhr.onload = function () {
    var myModal = document.querySelector("#add-room");
    var modal = bootstrap.Modal.getOrCreateInstance(myModal); // Returns a Bootstrap modal instance
    modal.hide();

    if (this.responseText == 1) {
      alert("success", "New Room Added!");
      add_room_form.reset();
      get_allROOMS();
    } else {
      alert("error", "Server Down");
    }
  };
  xhr.send(data);
}

function get_allROOMS() {
  // let data = new FormData();
  // data.append('get_allROOMS', '');

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("room-data").innerHTML = this.responseText;
    //showing all the data in table format and its id is room data
  };

  //xhr.send(data);
  //if i use send.data then i cannot use the Content-Type in this .
  xhr.send("get_allROOMS");
}

let edit_room_form = document.getElementById("edit_room_form");

function edit_details(id) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    // console.log(JSON.parse(this.responseText));

    let data = JSON.parse(this.responseText);
    edit_room_form.elements["name"].value = data.roomdata.name;
    edit_room_form.elements["area"].value = data.roomdata.area;
    edit_room_form.elements["price"].value = data.roomdata.price;
    edit_room_form.elements["quantity"].value = data.roomdata.quantity;
    edit_room_form.elements["adult"].value = data.roomdata.adult;
    edit_room_form.elements["children"].value = data.roomdata.children;
    edit_room_form.elements["desc"].value = data.roomdata.desc;
    edit_room_form.elements["room_id"].value = data.roomdata.id;

    //here responseText fetch all the data in text form but here cheking value
    //so have to convert it to Number
    edit_room_form.elements["facilities"].forEach((el) => {
      if (data.facilities.includes(Number(el.value))) {
        el.checked = true;
      }
    });

    //checking featrues
    edit_room_form.elements["features"].forEach((el) => {
      if (data.features.includes(Number(el.value))) {
        el.checked = true;
      }
    });
  };
  xhr.send("get_room=" + id);
}

edit_room_form.addEventListener("submit", function (e) {
  e.preventDefault();
  submit_edit_room();
});

function submit_edit_room() {
  let data = new FormData();
  data.append("edit_room", "");
  data.append("room_id", edit_room_form.elements["room_id"].value);

  data.append("name", edit_room_form.elements["name"].value);
  data.append("area", edit_room_form.elements["area"].value);
  data.append("price", edit_room_form.elements["price"].value);
  data.append("quantity", edit_room_form.elements["quantity"].value);
  data.append("adult", edit_room_form.elements["adult"].value);
  data.append("children", edit_room_form.elements["children"].value);
  data.append("desc", edit_room_form.elements["desc"].value);

  // // --- Features ---
  let features = [];
  // let featureElements = edit_room_form.elements['features'];
  // if (!featureElements.length) featureElements = [featureElements];

  // featureElements.forEach(el => {
  //     if (el.checked) features.push(el.value);
  // });

  edit_room_form.elements["features"].forEach((el) => {
    if (el.checked) {
      features.push(el.value);
    }
  });

  // // --- Facilities ---
  let facilities = [];
  // let facilityElements = edit_room_form.elements['facilities'];
  // if (!facilityElements.length) facilityElements = [facilityElements];

  // facilityElements.forEach(el => {
  //     if (el.checked) facilities.push(el.value);
  // });

  //this doesnt work if there is one feature only work if there is more than one
  edit_room_form.elements["facilities"].forEach((el) => {
    if (el.checked) {
      facilities.push(el.value);
    }
  });

  data.append("features", JSON.stringify(features));
  data.append("facilities", JSON.stringify(facilities));

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms_crud.php", true);

  xhr.onload = function () {
    var myModal = document.querySelector("#edit-room");
    var modal = bootstrap.Modal.getOrCreateInstance(myModal); // Returns a Bootstrap modal instance
    modal.hide();

    if (this.responseText == 1) {
      alert("success", " Room data Edited!");
      edit_room_form.reset();
      get_allROOMS();
    } else {
      alert("error", "Server Down");
    }
  };
  xhr.send(data);
}

function toggle_status(id, val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "Status toggled");
      get_allROOMS();
    } else {
      alert("error", "Status toggled failed!");
    }
  };

  xhr.send("toggle_status=" + id + "&value=" + val);
}

let add_image_form = document.getElementById("add_image_form");
add_image_form.addEventListener("submit", function (e) {
  e.preventDefault();
  add_image();
});

function add_image() {
  let data = new FormData();
  data.append("image", add_image_form.elements["image"].files[0]);
  data.append("room_id", add_image_form.elements["room_id"].value);
  data.append("add_image", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms_crud.php", true);

  xhr.onload = function () {
    if (this.responseText == "up_failed") {
      alert("error", "Image upload failed");
    } else if (this.responseText == "inv_img") {
      alert("error", "Only jpg, jpeg, png, webp are allowed");
    } else if (this.responseText == "inv_size") {
      alert("error", "File too large. Max 2MB");
    } else if (
      this.responseText == "upd_failed" ||
      this.responseText == "upload_error"
    ) {
      alert("error", "Image upload failed");
    } else {
      alert("success", "New image added", "image-alert");

      room_images(
        add_image_form.elements["room_id"],
        value,
        (document.querySelector("#room-images .modal-title").innerText = name)
      );
      add_image_form.reset();
    }
  };
  xhr.send(data);
}

function rooms_images(id, name) {
  // console.log("rooms_images called with:", id, name);
  document.querySelector("#room-images .modal-title").innerText = name;
  add_image_form.elements["room_id"].value = id;
  add_image_form.elements["image"].value = "";

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("room-image-data").innerHTML = this.responseText;
  };

  xhr.send("get_room_images=" + id);
}

function remove_room(room_id) {
  if (confirm("Are u sure u sure, you want to delete this room?")) {
    let data = new FormData();
    data.append("room_id", room_id);
    data.append("remove_room", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms_crud.php", true);

    xhr.onload = function () {
      if (this.responseText == 1) {
        alert("success", "ROOM Removed!");
        get_allROOMS();
      } else {
        alert("error", "ROOM removal failed ");
      }
    };
    xhr.send(data);
  }
}

function thumb_image(img_id, room_id) {
  let data = new FormData();
  data.append("image_id", img_id);
  data.append("room_id", room_id);
  data.append("thumb_image", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms_crud.php", true);

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "Image Thumbnail changed", "image-alert");

      room_images(
        room_id,
        value,
        (document.querySelector("#room-images .modal-title").innerText = name)
      );
      add_image_form.reset();
    } else {
      alert("error", "Image thumb removal failed ", "image-alert");
    }
  };
  xhr.send(data);
}

function rem_image(img_id, room_id) {
  let data = new FormData();
  data.append("image_id", img_id);
  data.append("room_id", room_id);
  data.append("thumb_image", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms_crud.php", true);

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "Image Thumbnail changed", "image-alert");

      room_images(
        room_id,
        value,
        (document.querySelector("#room-images .modal-title").innerText = name)
      );
      add_image_form.reset();
    } else {
      alert("error", "Image thumb removal failed ", "image-alert");
    }
  };
  xhr.send(data);
}

window.onload = function () {
  get_allROOMS();
};
