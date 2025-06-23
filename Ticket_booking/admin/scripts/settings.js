
        //ajax container-fluid
        let general_data, contacts_data;

        let general_s_form = document.getElementById('general_s_form');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');

        let contacts_s_form = document.getElementById('contacts_s_form');

        let team_s_form = document.getElementById('team_s_form');
        let member_name_inp = document.getElementById('member_name_inp');
        let member_picture_inp = document.getElementById('member_picture_inp');



        function get_general() { // this function will fetch data from database
            let site_title = document.getElementById('site_title');
            let site_about = document.getElementById('site_about');



            let shutdhown_toggle = document.getElementById('shutdown_toggle');


            let xhr = new XMLHttpRequest();

            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                general_data = JSON.parse(this.responseText);

                site_title.innerText = general_data.site_title;
                site_about.innerText = general_data.site_about;


                site_title_inp.value = general_data.site_title;
                site_about_inp.value = general_data.site_about;

                if (general_data.shutdown == 0) {
                    shutdhown_toggle.checked = false;
                    shutdhown_toggle.value = 0;
                } else {
                    shutdhown_toggle.checked = true;
                    shutdhown_toggle.value = 1;
                }
            }




            xhr.send('get_general');
        }


        general_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            update_general(site_title_inp.value, site_about_inp.value);

        })

        function update_general(site_title_value, site_about_value) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {

                var myModal = document.querySelector('#general-s')
                var modal = bootstrap.Modal.getOrCreateInstance(myModal) // Returns a Bootstrap modal instance
                modal.hide();

                if (this.responseText == 1) {
                    alert('success', 'Changes saved!');
                    get_general();
                } else {
                    alert('error', 'No Changes Made!');
                }
            }
            xhr.send('site_title=' + site_title_value + '&site_about=' + site_about_value + '&update_general');
        }


        function update_shutdown(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1 && general_data.shutdown == 0) {
                    alert('success', 'Site has been Shutdown!');

                } else {
                    alert('success', 'Site Shutdown mode off!');
                }
                get_general();
            }

            xhr.send('update_shutdown=' + val);
        }


        function get_contacts() {

            let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw'];
            let iframe = document.getElementById('iframe');



            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                contacts_data = JSON.parse(this.responseText);
                contacts_data = Object.values(contacts_data);

                for (i = 0; i < contacts_p_id.length; i++) {
                    document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
                }
                iframe.src = contacts_data[contacts_data.length - 1];

                contacts_inp(contacts_data);
            }



            //sending data
            xhr.send('get_contacts');
        }


        function contacts_inp(contacts_data) {
            let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];
            for (i = 0; i < contacts_inp_id.length; i++) {
                document.getElementById(contacts_inp_id[i]).value = contacts_data[i + 1];
            }
        }


        contacts_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            update_contacts();
        })

        function update_contacts() {
            let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw', 'iframe'];
            let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];
            let data_str = "";
            for (i = 0; i < index.length; i++) {
                data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
            }
            //console.log(data_str);
            data_str += "update_contacts";


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                var myModal = document.querySelector('#contact-s')
                var modal = bootstrap.Modal.getOrCreateInstance(myModal) // Returns a Bootstrap modal instance
                modal.hide();


                console.log()
                if (this.responseText == 1) {
                    alert('success', 'Changes saved!');
                    get_contacts();

                } else {
                    alert('error', 'No changes Made!');
                }

            }
            xhr.send(data_str);

        }

        team_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_member();
        });

        function add_member() {
            let data = new FormData();
            data.append('name', member_name_inp.value);
            data.append('picture', member_picture_inp.files[0]);
            data.append('add_member', '');


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);

            xhr.onload = function() {
                var myModal = document.querySelector('#team-s')
                var modal = bootstrap.Modal.getOrCreateInstance(myModal) // Returns a Bootstrap modal instance
                modal.hide();

                if (this.responseText == 'inv_img') {
                    alert('error', 'ONly jpg and png are allowed');
                } else if (this.responseText == 'inv_size') {
                    alert('error', 'file size too large ... File size limit 2MB');
                } else if (this.responseText == 'upd_failed') {
                    alert('error', 'Server Down');
                } else {
                    alert('success', 'New Member Added!');
                    member_name_inp.value = '';
                    member_picture_inp.value = '';
                    get_members();

                }
            }
            xhr.send(data);
        }

        function get_members() {

            let data = new FormData();
            data.append('get_members', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);

            xhr.onload = function() {
               document.getElementById('team-data').innerHTML= this.responseText;
            }
            xhr.send(data);
            //xhr.send('get_members');
        }


        function rem_member(val){
            
            let xhr = new XMLHttpRequest();

            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if(this.response==1){
                    alert('success','Memeber removed');
                    get_members();
                }
                else{
                    alert('error','Server down!');
                }
            }




            xhr.send('rem_member='+val);
        }

        window.onload = function() {
            get_general();
            get_contacts();
            get_members();
        }
  