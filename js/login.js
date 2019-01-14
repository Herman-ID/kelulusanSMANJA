
function mobile(){
    $('.login-warning').height('30vh');
    $('.notice-login').css("padding-top", "0px");
    $('.login-area').css({"padding-top": "30px","padding-bottom":"0px", "height":"50vh"});
    $('.notice-login>h1').css("font-size", "2rem");
    $('.notice-login>h2').css("display", "block");
    $('.trigger').css({"padding":"5px 40px","margin-top":"20px"});
}
function desktop(){
    $('.login-warning').height('100vh');
    $('.notice-login').css("padding-top", "30%");
    $('.login-area').css({"padding": "15% 80px","height":"100vh"});
    $('.notice-login>h1').css("font-size", "3.4rem");
    $('.notice-login>h2').css("display", "show");
    $('.trigger').css({"padding":"5px 40px","margin-top":"20px"});
}
function mobile_s(){
    $('.login-warning').height('30vh');
    $('.notice-login').css("padding-top", "0px");
    $('.login-area').css({"padding-top": "30px","padding-bottom":"0px", "height":"50vh"});
    $('.notice-login>h1').css("font-size", "2rem");
    $('.notice-login>h2').css("display", "none");
    $('.trigger').css({"padding":"2px","margin-top":"15px"});
}
function screen(){
    if(window.innerWidth <= 990 && window.innerWidth >425){
        mobile();
    }
    else if( window.innerWidth <= 425){
        mobile_s();
    }
    else{
        desktop();
    }
}
var addEvent = function(object, type, callback) {
    if (object == null || typeof(object) == 'undefined') return;
    if (object.addEventListener) {
        object.addEventListener(type, callback, false);
    } else if (object.attachEvent) {
        object.attachEvent("on" + type, callback);
    } else {
        object["on"+type] = callback;
    }
};
addEvent(window, "resize", function(event) {
    screen();
  });
$(document).ready(function () {
    screen();
    $('.trigger').on('click', function () {
        $('.modal-wrapper').toggleClass('open');
        $('.page-wrapper').toggleClass('blur-it');
        return false;
    });
});

function initLogin() {
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24,
        count = 'May 03, 2018 00:00:00';
    var today = new Date();
    if (today == count || Date.parse(today) > Date.parse(count)) {
        document.getElementById('waktu').style.display = "none";
        document.getElementById('head').innerHTML = "Pengumuman telah dibuka";
        document.getElementById('modal').style.height = '300px';
    } else {
        let countDown = new Date(count).getTime(),
            x = setInterval(function () {

                let now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById('days').innerText = Math.floor(distance / (day)),
                    document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached
                //if (distance < 0) {
                //  clearInterval(x);
                //  'IT'S MY BIRTHDAY!;
                //}

            }, second)

    }
}
function loadObject(id){
    var requestAPI = new XMLHttpRequest();
    requestAPI.open('GET', 'http://localhost/lulus_api/index.php/user?id='+id);
    requestAPI.onload = function(){
        var data = JSON.parse(requestAPI.responseText);    
    };
    requestAPI.send();
    return data;
}