
function mobile(){
    $('.con-awal').css({"position":"relative", "height":"35vh"}).removeClass('fixed-con');
    $('.cr > h1').css("font-size", "40px");
}
function desktop(){
    $('.con-awal').css({"position":"fixed","top":"0px","right":"0px", "height":"100vh"});
    $('.cr > h1').css("font-size", "4rem");
}
function screen(){
    if(window.innerWidth <= 990){
        mobile();
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
      initialize();
    screen();
});
var siteurl = 'http://kelulusan.sman1jamblang.sch.id/'

function goback(){
    window.history.back();
}

function getURL(index){
    var path = window.location.pathname.split('/');
    return path[index];
}
function makeid() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  
    for (var i = 0; i < 5; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));
  
    return text;
  }
function hapusbio(id){
    var random = makeid();
    var konfirm = prompt("Masukan kata '" + random + "' tanpa tanda kutip untuk konfirmasi");

    if (konfirm == random) { 
        del('biodata', 'id='+id);
        location.reload(true);
    } 
}
function del(page, data){
    var requestAPI = new XMLHttpRequest();
    requestAPI.open('DELETE', 'http://kelulusan.sman1jamblang.sch.id/index.php/api/'+page,true);
    requestAPI.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    requestAPI.send(data);
}
function initialize(){
    var path = window.location.pathname.split('/');
    if(!(path[2] == 'admin')){
        var id = document.getElementById('id').innerHTML;
        switch (path[2]) {
            case 'biodata':
            getAPI('biodata',id);
            break;
            case 'un':
                    getAPI('un',id);
            break;
            case 'surat':
                getAPI('biodata',id);
                break;
            case 'pengumuman': 
                if(!getURL(3))
                {
                    getAPI('post');
                }
                else{
                    getAPI('post', getURL(4));
                }
                break;
            default:
                break;
        }    
    }
    else{
        if(!path[3]){
            getAPI('statistika');
        }
        else{
            switch (path[3]) {
                case 'biodata':
                    if(!getURL(4))
                    {
                        getAPI('biodata');
                    }
                    else if(getURL(4) != 'edit'){
                        getAPI('biodata',getURL(4));
                    }
                    else
                    {
                        getAPI('biodata', getURL(5));
                    }
                    break;
                case 'user':
                    if(!getURL(4))
                    {
                        getAPI('admin');
                    }
                    else if(getURL(4) != 'edit'){
                        getAPI('admin',parseInt(getURL(5)));
                    }
                    else
                    {
                        getAPI('admin', parseInt(getURL(5)));
                    }
                    break;
                case 'setuju':
                    if(!getURL(4))
                    {
                        getAPI('tugas');
                    }
                    else
                    {
                        getAPI('tugas', parseInt(getURL(4)));
                    }
                    break;
                default:
                    break;
            }
        }
    }           
}

function editbio(){
    var request = new Array();
    var nama = document.getElementById('nama-siswa').value;
    var nisn = document.getElementById('nisn-siswa').value;
    var kelas = document.getElementById('kelas-siswa').value;
    var nomor = document.getElementById('nomor-siswa').value;
    var peminatan = document.getElementById('peminatan-siswa').value;
    var lahir = document.getElementById('lahir-siswa').value;

    var id = getURL(5);
    var data = 'id='+id+'&nama='+nama+'&nisn='+nisn+'&kelas='+kelas+'&ttl='+lahir+'&noujian='+nomor+'&peminatan='+peminatan;
    put('biodata', data);
    goback();
}
function put(page, data){
    
    var requestAPI = new XMLHttpRequest();
    requestAPI.open('PUT', 'http://kelulusan.sman1jamblang.sch.id/index.php/api/'+page,true);
    requestAPI.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    requestAPI.send(data);
}
function ajukan(){
    var request = new Array();
    var nama = document.getElementById('nama-siswa').value;
    var nisn = document.getElementById('nisn-siswa').value;
    var kelas = document.getElementById('kelas-siswa').value;
    var nomor = document.getElementById('nomor-siswa').value;
    var peminatan = document.getElementById('peminatan-siswa').value;
    var lahir = document.getElementById('lahir-siswa').value;

    request = 
    
        [
            nama, 
            nisn,
            kelas,
            nomor,
            peminatan,
            lahir,
        ]
    ;
    var id = document.getElementById('id').innerHTML;
    console.log(JSON.stringify(request));
    var data='key='+id+'&value='+request;
    masukan('tugas', data);
    alert("anda telah mengajukan perubahan");
    goback();
}
function masukan(page, data){
    var requestAPI = new XMLHttpRequest();
    requestAPI.open('POST', 'http://kelulusan.sman1jamblang.sch.id/index.php/api/'+page,true);
    requestAPI.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    requestAPI.send(data);
}
function getAPI(page, id)
{
    var datas;
    var requestAPI = new XMLHttpRequest();
    if(id==null){
        requestAPI.open('GET', 'http://kelulusan.sman1jamblang.sch.id/index.php/api/'+ page);
    }
    else{
        requestAPI.open('GET', 'http://kelulusan.sman1jamblang.sch.id/index.php/api/'+ page +'?id='+id);
    }
    requestAPI.onload = function(){
        datas = JSON.parse(requestAPI.responseText);
        console.log(datas);
        renderHTML(page, datas);
    };
    requestAPI.send();
}
function changeDate(data){
    var tgl = data.split(' ');
    switch(tgl[1]){
        case 'January':
            tgl[1] = 'Januari';
            break;
        case 'February':
            tgl[1] = 'Februari';
            break;
        case 'March':
            tgl[1] = 'Maret';
            break;
        case 'May':
            tgl[1] = 'Mei';
            break;
        case 'June':
            tgl[1] = 'Juni';
            break;
        case 'July':
            tgl[1] = 'Juli';
            break;
        case 'August':
            tgl[1] = 'Agustus';
            break;
        case 'October':
            tgl[1] = 'Oktober';
            break;
        case 'December':
            tgl[1].replace('Desember');
        break;
    }
    var tanggal = tgl.join(' ');
    return tanggal;
}
function renderHTML(page, data)
{
    switch (page) {
        case 'post':
            if(!getURL(3)){
            var container = document.getElementById('pengumuman-con');
            container.innerHTML = '';
            for (let i = 0; i < data.length; i++) {
                var index = '<div class="category-card category-card--highlights">'+
                                '<div style="background-color:#71B5EC" class="category-card__image-wrapper">'+
                                    '<a href="/guide/admin/highlights/quick-overview">'+
                                        '<div class="category-card__image"></div>'+
                                    '</a>'+
                                '</div>'+ 
                                '<div class="category-card__content">'+
                                    '<h3 class="category-card__title">'+
                                        '<a href="'+window.location.pathname+'/'+ data[i].id_post +'" class="u-link">'+ data[i].judul +'</a>'+
                                    '</h3>'+
                                    '<div class="category-card__articles">'+
                                    '<p>'+data[i].tanggal+
                                    '</p><br>'+
                                        '<p>'+data[i].isi+
                                        '</p>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';                
                container.innerHTML += index;
            }}
            else {
                var judul = document.getElementById('judul-pengumuman');
                var container = document.getElementById('pengumuman-div');
                var tanggal = document.getElementById('tanggal-div');
                tanggal.innerHTML += data[0].tanggal;
                judul.innerHTML = data[0].judul;
                container.innerHTML += data[0].isi;
            }
            break;
        case 'admin':
            if(!getURL(4)){
                var container = document.getElementById('body-tabel');
                container.innerHTML = '';
                for (let i = 0; i < data.length; i++) {
                    var index = '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].kode_login+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                            '</tr>';
                    container.innerHTML += index;
                }
            }
            else{
                document.getElementById('nama-admin').innerHTML = data[0].nama;
                document.getElementById('kode-admin').innerHTML = data[0].kode_login;
                document.getElementById('email-admin').innerHTML = data[0].email;
                document.getElementById('tel-admin').innerHTML = data[0].telepon;
            }
            break;
        case 'tugas':
        if(!getURL(4)){
        console.log(data);
        var container = document.getElementById('body-tabel');
        container.innerHTML = '';
        for (let i = 0; i < data.length; i++) {
            var index = '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].nama+'</td>'+
                        '<td><button class="btn btn-info btn-fill btn-wd btn-kiri" onclick="tugas_detail('+data[i].id+')">Lihat</button><button class="btn btn-danger btn-fill btn-wd btn-kanan" onclick="tugas_hapus('+data[0].id+')">Abaikan</button></td>'+
                    '</tr>';
            container.innerHTML += index;
        } }else {
            var ubah = data[0].value.split(',');
            var datas = 'id='+data[0].nisn+'&nama='+ubah[0]+
                        '&nisn='+ubah[1]+'&kelas='+ubah[2]+
                        '&ttl='+ubah[5]+', '+ubah[6]+'&noujian='+ubah[3]+'&peminatan='+ubah[4];
    
            document.getElementById('nama-siswa').innerHTML = data[0].nama;
            document.getElementById('nisn-siswa').innerHTML = data[0].nisn;
            document.getElementById('kelas-siswa').innerHTML = data[0].kelas;
            document.getElementById('nomor-siswa').innerHTML = data[0].no_ujian;
            document.getElementById('peminatan-siswa').innerHTML = data[0].peminatan;
            document.getElementById('lahir-siswa').innerHTML = data[0].ttl; 
            document.getElementById('ubah-nama-siswa').innerHTML = ubah[0];
            document.getElementById('ubah-nisn-siswa').innerHTML = ubah[1];
            document.getElementById('ubah-kelas-siswa').innerHTML = ubah[2];
            document.getElementById('ubah-nomor-siswa').innerHTML = ubah[3];
            document.getElementById('ubah-peminatan-siswa').innerHTML = ubah[4];
            document.getElementById('ubah-lahir-siswa').innerHTML = ubah[5]+', '+ubah[6]; 
            document.getElementById('setujui').addEventListener("click", function() {
                put('biodata',datas);
                del('tugas', 'id='+data[0].id);
                window.location.href = siteurl+'index.php/admin/setuju';
            });
            document.getElementById('hapus').addEventListener("click", function() {
                del('tugas', 'id='+data[0].id);
                window.location.href = siteurl+'index.php/admin/setuju';
            });
        }
            break;
        case 'biodata':
            if(getURL(3) == 'biodata' && getURL(2) == 'admin' && !getURL(4)){
                var container = document.getElementById('body-tabel');
                container.innerHTML = '';
                for (let i = 0; i < data.length; i++) {
                    var nisn= data[i].nisn.toString();
                    var index = '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].kelas+'</td>'+
                                '<td>'+nisn+'</td>'+
                                '<td>'+data[i].jumlah+'</td>'+
                                '<td><a class="btn btn-info btn-fill btn-wd btn-kiri" href="'+siteurl+'index.php/admin/biodata/'+nisn+'">Lihat</a><a class="btn btn-warning btn-fill btn-wd btn-tengah" href="'+siteurl+'index.php/admin/biodata/edit/'+nisn+'">Edit</a><button class="btn btn-danger btn-fill btn-wd btn-kanan" onclick="hapusbio('+nisn+')">Hapus</button></td>'+
                            '</tr>';
                    container.innerHTML += index;
                }    
            }
            else if(getURL(3) == 'edit' || getURL(4) == 'edit'){
                document.getElementById('nama-siswa').value = data[0].nama;
                document.getElementById('nisn-siswa').value = data[0].nisn;
                document.getElementById('kelas-siswa').value = data[0].kelas;
                document.getElementById('nomor-siswa').value = data[0].no_ujian;
                document.getElementById('peminatan-siswa').value = data[0].peminatan;
                document.getElementById('lahir-siswa').value = data[0].ttl;
            }else{
                console.log(data);
                document.getElementById('nama-siswa').innerHTML = data[0].nama;
                document.getElementById('nisn-siswa').innerHTML = data[0].nisn;
                document.getElementById('kelas-siswa').innerHTML = data[0].kelas;
                document.getElementById('nomor-siswa').innerHTML = data[0].no_ujian;
                document.getElementById('peminatan-siswa').innerHTML = data[0].peminatan;
                document.getElementById('lahir-siswa').innerHTML = data[0].ttl; 
            }
            break;
        case 'siswa':
            document.getElementById('nama-siswa').innerHTML = data[0].nama;
            document.getElementById('nisn-siswa').innerHTML = data[0].nisn;
            document.getElementById('kelas-siswa').innerHTML = data[0].kelas;
            document.getElementById('nomor-siswa').innerHTML = data[0].no_ujian;
            document.getElementById('peminatan-siswa').innerHTML = data[0].peminatan;
            document.getElementById('lahir-siswa').innerHTML = data[0].ttl;
            var besar = parseInt(data[0].indo)+parseInt(data[0].mtk)+parseInt(data[0].pelajaran)+parseInt(data[0].inggris);
            document.getElementById('nama-siswa').innerHTML = data[0].nama;
            document.getElementById('nisn-siswa').innerHTML = data[0].nisn;
            document.getElementById('kelas-siswa').innerHTML = data[0].kelas;
            document.getElementById('nomor-siswa').innerHTML = data[0].no_ujian;
            document.getElementById('peminatan-siswa').innerHTML = data[0].peminatan;  
            document.getElementById('indo-nilai').innerHTML = data[0].indo; 
            document.getElementById('inggris-nilai').innerHTML = data[0].inggris; 
            document.getElementById('matematika-nilai').innerHTML = data[0].mtk; 
            document.getElementById('peminatan-nilai').innerHTML = data[0].pelajaran; 
            document.getElementById('besar-nilai').innerHTML =besar; 
            document.getElementById('akhir-nilai').innerHTML = besar/4;
            document.getElementById('peringkat-nilai').innerHTML = data[0].peringkat;
            break;
        case 'un':
            var besar = parseInt(data[0].indo)+parseInt(data[0].mtk)+parseInt(data[0].pelajaran)+parseInt(data[0].inggris);
            document.getElementById('nama-siswa').innerHTML = data[0].nama;
            document.getElementById('nisn-siswa').innerHTML = data[0].nisn;
            document.getElementById('kelas-siswa').innerHTML = data[0].kelas;
            document.getElementById('nomor-siswa').innerHTML = data[0].no_ujian;
            document.getElementById('peminatan-siswa').innerHTML = data[0].peminatan;  
            document.getElementById('indo-nilai').innerHTML = data[0].indo; 
            document.getElementById('inggris-nilai').innerHTML = data[0].inggris; 
            document.getElementById('matematika-nilai').innerHTML = data[0].mtk; 
            document.getElementById('peminatan-nilai').innerHTML = data[0].pelajaran; 
            document.getElementById('besar-nilai').innerHTML =besar; 
            document.getElementById('akhir-nilai').innerHTML = besar/4;
            document.getElementById('peringkat-nilai').innerHTML = data[0].peringkat;
            break;
        default:
            break;
    }
}
function redirect_detail(id)
{
    id = id.toString();
    
    window.location.href = siteurl+'index.php/admin/biodata/'+id;    
}
function redirect_edit(id)
{
    window.location.href = siteurl+'index.php/admin/biodata/edit/'+id;
}
function cetaksurat()
{
    var id = document.getElementById('id').innerHTML;
    var datas;
    var requestAPI = new XMLHttpRequest();
    requestAPI.open('GET', 'http://kelulusan.sman1jamblang.sch.id/index.php/api/biodata?id='+id);
    requestAPI.onload = function(){
        datas = JSON.parse(requestAPI.responseText);
        getImage(datas,'http://kelulusan.sman1jamblang.sch.id/image/logo.jpg', 'http://kelulusan.sman1jamblang.sch.id/image/ttd.png', cetak);
    };
    requestAPI.send();
}
function getImage(data, url1, url2, callback) {
    var img = new Image();
    var img2 = new Image();
    img.onError = function () {
        alert('Cannot load image: "' + url + '"');
    };
    img.onload = function () {
        callback(data, img, img2);
    };
    img.src = url1;
    img2.src = url2;
}
function cetak(data, logo, ttd) {
    var ex = 'id='+data[0].nisn;
    put('siswastat',ex);
    var doc = new jsPDF('potrait', 'mm', 'A4');
    doc.setFont("times");
    doc.setFontSize(14);
    doc.text(63, 25, 'PEMERINTAH DAERAH PROVINSI JAWA BARAT');
    doc.addImage(logo, 'JPEG', 15, 20, 30, 30);
    doc.setFontSize(12);
    doc.text(100,30, 'DINAS PENDIDIKAN');
    doc.setFontStyle("bold");
    doc.text(76, 35, 'CABANG DINAS PENDIDIKAN WILAYAH X');
    doc.text(93, 40, 'SMA NEGERI 1 JAMBLANG');
    doc.setFontStyle("reguler");
    doc.setFontSize(11);
    doc.text(60, 45, 'Jl. Nyi Mas Rarakerta No.33 Tlp(0231)8825069 Jamblang - Cirebon 45156 ');
    doc.text(60, 50, 'web: sman1jamblang.sch.id  email: sman_1_jamblangcirebon@ymail.com');
    doc.line(190,55,  10, 55);
    doc.setFontSize(14);
    doc.text(68,75, 'SURAT KETERANGAN KELULUSAN');
    doc.setFontSize(11);
    doc.text(78,80, 'NO : 422.6/430/SMANJA/Cabdin Wil-X');
    doc.setFontSize(12);
    doc.text(20,95, 'Mempertimbangkan Peraturan Menteri Pendidikan dan Kebudayaan Nomor 20 Tahun 2016 Tentang');
    doc.text(20,100, 'Standar Kompetensi Lulusan Pendidikan Dasar dan Menengah.');
    doc.text(20,110, 'Berdasarkan hasil rapat Dewan Guru SMA Negeri1 Jamblang tanggal 02 Mei 2018. Kepala SMA');
    doc.text(20,115, 'Negeri 1 Jamblang Kabupaten Cirebon Provinsi Jawa Barat, dengan ini menerangkan bahwa :');
    doc.text(30,125,'Nama                                    : '+data[0].nama);
    doc.text(30,132,'Tempat/Tanggal lahir           : '+data[0].ttl);
    doc.text(30,139,'N I S N                                 : '+data[0].nisn);
    doc.text(30,146,'No. Peserta Ujian Nasional  : '+data[0].no_ujian);
    doc.text(105,155,'Dinyatakan','center');
    doc.setFontStyle('bold');
    doc.setFontSize(20);
    doc.text(105,165, 'LULUS / TIDAK LULUS', 'center');
    doc.setFontSize(12);
    doc.line(145,162.5,  95, 162.5);
    doc.setFontStyle('reguler');
    doc.text(20,180, 'dari SMA Negeri 1 Jamblang Kabupaten Cirebon Provinsi Jawa Barat pada Tahun Pelajaran 2017/2018');
    doc.text(20,185, 'Demikian Surat Keterangan Kelulusan ini disampaikan untuk dapat digunakan sebagaimana mestinya');
    doc.addImage(ttd, 'PNG', 115, 205, 50, 50);
    doc.text(137, 205, 'Cirebon, Mei 2018');
    doc.text(137,210,'Kepala SMA Negeri 1 Jamblang,');
    doc.text(137, 250, 'H. Aply Rochmana, S.Pd.');
    doc.text(137,255,'NIP. 19601019 198403 1 002');
    doc.save('Surat Kelulusan '+data[0].nama+'.pdf');
}
function tugas_detail(id)
{
    window.location.href = siteurl+'index.php/admin/setuju/'+id;        
}
function tugas_hapus(id){
    del('tugas', 'id='+id);
    location.reload();
}
function handleFiles(files) {
    // Check for the various File API support.
    if (window.FileReader) {
        // FileReader are supported.
        getAsText(files[0]);
    } else {
        alert('FileReader are not supported in this browser.');
    }
  }

  function getAsText(fileToRead) {
    var reader = new FileReader();
    // Read file into memory as UTF-8      
    reader.readAsText(fileToRead);
    // Handle errors load
    reader.onload = loadHandler;
    reader.onerror = errorHandler;
  }

  function loadHandler(event) {
    var csv = event.target.result;
    processData(csv);
  }

  function processData(csv) {
      var allTextLines = csv.split(/\r\n|\n/);
      var lines = [];
      for (var i=0; i<allTextLines.length-1; i++) {
          var data = allTextLines[i].split(',');
              var tarr = [];
              for (var j=0; j<data.length; j++) {
                  tarr.push(data[j]);
              }
              lines.push(tarr);
              var data = 'ket='+tarr[7]+'&nama='+tarr[0]+'&nisn='+tarr[1]+'&kelas='+tarr[6]+'&tempat='+tarr[2] +'&tanggal='+tarr[3]+'&nomor='+tarr[4]+'&peminatan='+tarr[5];
              console.log(data);
              masukan('biodata', data);
              console.log(tarr);
      }
     alert("berhasil"); 
  }

  function errorHandler(evt) {
    if(evt.target.error.name == "NotReadableError") {
        alert("Canno't read file !");
    }
  }