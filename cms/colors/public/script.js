$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();

    // ----------------- Define Functions -----------------

    function replaceText(ajax_file_name) {
        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();
        xhr.open('GET', './ajax_files/' + ajax_file_name, true);
        xhr.onreadystatechange = function() {
            console.log('readyState: ' + xhr.readyState);
            if(xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if(xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send();
    }

    function replaceText_with_id(ajax_file_name, id) {

        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();

        xhr.open('POST', './ajax_files/' + ajax_file_name, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');

        let product_id = id;

        xhr.onreadystatechange = function() {
            console.log('readyState: ' + xhr.readyState);
            if(xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if(xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send("product_id=" + product_id);
    }

    function replaceText_with_form_data(ajax_file_name) {

        // gather form data:
        let form = document.getElementById('submit_new_product_form_element');
        let form_data = new FormData(form);

        // [optional] console log values
        for([key, value] of form_data.entries()) {
            console.log(key + ': ' + value);
        }

        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();

        xhr.open('POST', './ajax_files/' + ajax_file_name, true);
        xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');



        xhr.onreadystatechange = function() {
            console.log('readyState: ' + xhr.readyState);
            if(xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if(xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send(form_data);
    }



    function replaceText_with_form_edited_data(ajax_file_name) {

        // gather form data:
        let form = document.getElementById('submit_edited_product_form_element');
        let form_data = new FormData(form);

        // [optional] console log values
        for([key, value] of form_data.entries()) {
            console.log(key + ': ' + value);
        }

        let target = document.getElementById("main_div");
        let xhr = new XMLHttpRequest();

        xhr.open('POST', './ajax_files/' + ajax_file_name, true);
        xhr.setRequestHeader('X-Requested-with', 'XMLHttpRequest');



        xhr.onreadystatechange = function() {
            console.log('readyState: ' + xhr.readyState);
            if(xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if(xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send(form_data);
    }





});

















