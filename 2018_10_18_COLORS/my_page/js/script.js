window.onload = function() {

    // Define elements in HTML:
    const orderDetailBtn = document.getElementById('orderDetailBtn');
    const changeInfoBtn = document.getElementById('changeInfoBtn');
    const logoutBtn = document.getElementById('logoutBtn');

    // Load orderDetail page by default:
    replaceText('order_detail.php');


    // Remove active class from button:
    function btnStatusUpdate() {

        orderDetailBtn.parentNode.classList.remove("side-nav__item--active");
        changeInfoBtn.parentNode.classList.remove("side-nav__item--active");
        logoutBtn.parentNode.classList.remove("side-nav__item--active");

    }


    // Add event listener to the button:
    orderDetailBtn.addEventListener('click', function(e){
        e.preventDefault();

        // let href = orderDetailBtn.href;
        // href = href.substr(-15);
        // console.log(href);
        // replaceText('order_detail.php' + href);


        replaceText('order_detail.php');
        btnStatusUpdate();
        orderDetailBtn.parentNode.classList.add("side-nav__item--active");
    });

    changeInfoBtn.addEventListener('click', function(e){
        e.preventDefault();

        // Load change_info page by AJAX:
        replaceText('change_info.php');
        btnStatusUpdate();
        changeInfoBtn.parentNode.classList.add("side-nav__item--active");

    });

    logoutBtn.addEventListener('click', function(){

        // clear all cookies:
        (function () {
            var cookies = document.cookie.split("; ");
            for (var c = 0; c < cookies.length; c++) {
                var d = window.location.hostname.split(".");
                while (d.length > 0) {
                    var cookieBase = encodeURIComponent(cookies[c].split(";")[0].split("=")[0]) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join('.') + ' ;path=';
                    var p = location.pathname.split('/');
                    document.cookie = cookieBase + '/';
                    while (p.length > 0) {
                        document.cookie = cookieBase + p.join('/');
                        p.pop();
                    };
                    d.shift();
                }
            }
        })();


        window.location.href = "../login/index.php";
    });





    // ========================= Define functions ========================

    function replaceText(ajax_file_name) {
        let target = document.getElementById("main-view");
        let xhr = new XMLHttpRequest();
        xhr.open('GET', './ajax_files/' + ajax_file_name, true);
        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send();
    }


};