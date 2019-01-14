<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Smanja</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>third_party/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
    <script src="<?php echo base_url(); ?>third_party/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>js/login.js"></script>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>

		<link rel="icon" href="https://home.sman1jamblang.sch.id/wp-content/uploads/2018/02/cropped-logo-sekolah-1-32x32.png" sizes="32x32" />
<link rel="icon" href="https://home.sman1jamblang.sch.id/wp-content/uploads/2018/02/cropped-logo-sekolah-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://home.sman1jamblang.sch.id/wp-content/uploads/2018/02/cropped-logo-sekolah-1-180x180.png" />
</head>

<body onload="initLogin()">
    <script>

        $("#login__username").on('change keydown paste input', function(){
            alert("change");
        });
        function TextChange(e){
            var user = $("#login__username").val();
            var pass = document.getElementById('login__password');
            if(user.match(/^\d+$/)) {
                pass.type = "text";   
            }
            else{
                pass.type = "password";  
            }
        }
    </script>
    <div class="row">
        <div class="col-lg-7 col-md-12 login-warning">
            <div class="notice-login">
                <h1>Selamat datang !</h1>
                <h2>Masukan username dan password anda,
                    <br> jika anda tidak dapat masuk coba lihat kembali waktu pengumuman dibawah</h2>
                    <p>Untuk panduan penggunaan dapat dilihat di <a href="https://home.sman1jamblang.sch.id/panduan-penggunaan-web-kelulusan-menggunakan-smartphone/" style="color:#ff1111">sini</a>, bulan lahir harus diawali huruf besar dan bila tanggal dibawah 10 maka ditulis tanpa nol
                    <a style="color:#ff1111" href="https://home.sman1jamblang.sch.id/penanganan-kesalahan-web-kelulusan/"> bentuk kesalahan yang terjadi (lihat dulu)</a></p>
                
                <button class=" trigger">waktu pengumuman</button>

            </div>
        </div>
        <div class="col-lg-5 col-md-12 login-area">
            <div class="grid">
                <h3>Masuk</h3>
                <form id='formlogin' action="<?php echo site_url('login/masuk');?>" method="post" class="form login">

                    <div class="form__field">
                        <label for="login__username">
                            <svg class="icon">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
                            </svg>
                            <span class="hidden">Username</span>
                        </label>
                        <input id="login__username" type="text" name="username" class="form__input" placeholder="kode login" onpropertychange="TextChange(this)" onchange="TextChange(this)" required>
                    </div>

                    <div class="form__field">
                        <label for="login__password">
                            <svg class="icon">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use>
                            </svg>
                            <span class="hidden">Password</span>
                        </label>
                        <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
                    </div>

                    <div class="form__field">
                        <input type="submit" value="Sign In">
                    </div>

                </form>

            </div>

            <svg xmlns="http://www.w3.org/2000/svg" class="icons">
                <symbol id="arrow-right" viewBox="0 0 1792 1792">
                    <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"
                    />
                </symbol>
                <symbol id="lock" viewBox="0 0 1792 1792">
                    <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"
                    />
                </symbol>
                <symbol id="user" viewBox="0 0 1792 1792">
                    <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"
                    />
                </symbol>
            </svg>
        </div>

    </div>

    </div>
    <div class="modal-wrapper">
        <div id="modal" class="modal">
            <div class="content">
                <a class="btn-close trigger" href="#" style="position : absolute; top:0px;right:20px;color:white ; z-index:90000 ;padding: 5px !important; margin-top: 0px!important;">
                    X
                </a>
                <div class="container" style="margin-top:20px">
                    <h1 id="head">Menuju Pengumuman:</h1>
                    <ul id="waktu">
                        <li>
                            <span id="days"></span>days</li>
                        <li>
                            <span id="hours"></span>Hours</li>
                        <li>
                            <span id="minutes"></span>Minutes</li>
                        <li>
                            <span id="seconds"></span>Seconds</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        
    </script>
</body>

</html>