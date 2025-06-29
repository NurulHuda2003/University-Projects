
let feature_s_form = document.getElementById('feature_s_form');
let facilities_s_form = document.getElementById('facilities_s_form');



feature_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_feature();
});

function add_feature() {
    let data = new FormData();
    data.append('name', feature_s_form.elements['feature_name'].value);
    data.append('add_feature', '');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities_crud.php", true);

    xhr.onload = function() {
        var myModal = document.querySelector('#feature-s')
        var modal = bootstrap.Modal.getOrCreateInstance(myModal) // Returns a Bootstrap modal instance
        modal.hide();

        if (this.responseText == 1) {
            alert('success', 'New feature Added!');
            feature_s_form.elements['feature_name'].value = '';
            get_features();
        } else {
            alert('error', 'Server Down');
        }
    }
    xhr.send(data);
}


function get_features() {

    let data = new FormData();
    data.append('get_features', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities_crud.php", true);

    xhr.onload = function() {
        document.getElementById('features-data').innerHTML = this.responseText;
    }

    xhr.send(data);
}



function rem_feature(val) {

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "ajax/features_facilities_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.response == 1) {
            alert('success', 'Feature removed');
            get_features();
        } else if (this.responseText == 'room_added') {
            alert('error', 'Feature is added in room');
        } else {
            alert('error', 'Server down!');
        }
    }
    xhr.send('rem_feature=' + val);
}


facilities_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_facility();
});

function add_facility() {
    let data = new FormData();
    data.append('name', facilities_s_form.elements['facility_name'].value);
    data.append('icon', facilities_s_form.elements['facility_icon'].files[0]);
    data.append('desc', facilities_s_form.elements['facility_desc'].value);


    data.append('add_facility', '');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities_crud.php", true);

    xhr.onload = function() {
        var myModal = document.querySelector('#facilities-s')
        var modal = bootstrap.Modal.getOrCreateInstance(myModal) // Returns a Bootstrap modal instance
        modal.hide();

        if (this.responseText == 'inv_img') {
            alert('error', 'ONly SVG are allowed');
        } else if (this.responseText == 'inv_size') {
            alert('error', 'file size too large ... File size limit 1MB');
        } else if (this.responseText == 'upd_failed') {
            alert('error', 'Server Down');
        } else {
            alert('success', 'New Facility Added!');
        facilities_s_form.reset();
            get_facilities();

        }
    }
    xhr.send(data);
}


function get_facilities() {

    let data = new FormData();
    data.append('get_facilities', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities_crud.php", true);

    xhr.onload = function() {
        document.getElementById('facilities-data').innerHTML = this.responseText;
    }

    xhr.send(data);
}

function rem_facility(val) {

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "ajax/features_facilities_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.response == 1) {
            alert('success', 'Facilities removed');
            get_facilities();
        } else if (this.responseText == 'room_added') {
            alert('error', 'Facilities is added in room');
        } else {
            alert('error', 'Server down!');
        }
    }
    xhr.send('rem_facility=' + val);
}



window.onload = function() {
    get_facilities();
    get_features();
}
