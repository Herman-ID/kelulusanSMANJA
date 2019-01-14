<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?></title>
 
    <script src="<?php echo base_url(); ?>third_party/jquery/jquery-3.3.1.min.js"></script>
		<link rel="icon" href="https://home.sman1jamblang.sch.id/wp-content/uploads/2018/02/cropped-logo-sekolah-1-32x32.png" sizes="32x32" />
<link rel="icon" href="https://home.sman1jamblang.sch.id/wp-content/uploads/2018/02/cropped-logo-sekolah-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://home.sman1jamblang.sch.id/wp-content/uploads/2018/02/cropped-logo-sekolah-1-180x180.png" />
    <?php include('css.php');?>
</head>
<body>
<?php if(!is_logged_in() || !($this->session->userdata['logged_in']['is_admin'])==0)
        {
            if(is_logged_in() && ($this->session->userdata['logged_in']['is_admin'])==1){
                redirect('admin');
            }
            else{
            redirect('login');
                
            }
        }
?>
<p id="id" style="display:none"><?php $va = ($this->session->userdata['logged_in']['nisn']);echo $va;?></p>
<div class="menu">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">
                <svg fill="#FFF" height="35" viewBox="0 0 24 24" width="35" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
            </span>
    </div>
    <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
              <a href="<?php echo site_url()?>">Beranda</a>
              <a href="<?php echo site_url('surat')?>">Surat Kelulusan</a>
              <a href="<?php echo site_url('biodata')?>">Biodata</a>
              <a href="http://sman1jamblang.sch.id">Pengumuman</a>
              <a href="<?php echo site_url('login/keluar')?>">Log Out</a>
            </div>
          </div>
<style>
    a:hover{
        text-decoration: none;
    }
</style>

    <?php 
        if($app = 'siswa'){
            $this->load->view('siswa/'.$page);
        }
        else{
            $this->load->view('admin/'.$page);
        }
    ?>
    <?php include('js.php');?>
    
    <script>
            function openNav() {
                document.getElementById("myNav").style.height = "100%";
            }
            
            function closeNav() {
                document.getElementById("myNav").style.height = "0%";
            }
            </script>
</body>

</html>