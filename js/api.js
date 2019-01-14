function loadObject(){
    var requestAPI = new XMLHttpRequest();
    requestAPI.open('GET', 'http://localhost/lulus_api/index.php/peminatan');
    requestAPI.onload = function(){
        var data = JSON.parse(requestAPI.responseText);
        console.log(data[0]);
    };
    requestAPI.send();
}