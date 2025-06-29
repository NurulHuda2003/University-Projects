

function get_users() {
 

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/users_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("users-data").innerHTML = this.responseText;
    //showing all the data in table format and its id is room data
  };

  
  xhr.send("get_users");
}



function toggle_status(id, val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/users_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "Status toggled");
      get_users();
    } else {
      alert("error", "Status toggled failed!");
    }
  };

  xhr.send("toggle_status=" + id + "&value=" + val);
}



function remove_users(user_id) {
  if (confirm("Are u sure u sure, you want to remove this user?")) {
    let data = new FormData();
    data.append("user_id", user_id);
    data.append("remove_user", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users_crud.php", true);

    xhr.onload = function () {
      if (this.responseText == 1) {
        alert("success", "user Removed!");
        get_users();
      } else {
        alert("error", "user removal failed ");
      }
    };
    xhr.send(data);
  }
}



function search_user(username){
let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/users_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("users-data").innerHTML = this.responseText;
  };

  
  xhr.send("search_user&name="+username);
}

window.onload = function () {
  get_users();
};
