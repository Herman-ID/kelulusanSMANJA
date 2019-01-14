<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php echo $title?></title>
    <script src="<?php echo base_url('third_party/admin/')?>js/jquery-1.10.2.js" type="text/javascript"></script>

    <?php include('rel.php')?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

		<link rel="icon" href="https://home.sman1jamblang.sch.id/wp-content/uploads/2018/02/cropped-logo-sekolah-1-32x32.png" sizes="32x32" />
<link rel="icon" href="https://home.sman1jamblang.sch.id/wp-content/uploads/2018/02/cropped-logo-sekolah-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://home.sman1jamblang.sch.id/wp-content/uploads/2018/02/cropped-logo-sekolah-1-180x180.png" />
</head>
<body>
<style>
.card{
    padding:20px;
}    

</style>
<?php if(!is_logged_in() || !($this->session->userdata['logged_in']['is_admin'])==1)
        {
            if(is_logged_in() && ($this->session->userdata['logged_in']['is_admin'])==0){
                redirect();
            }
            else{
            redirect('login');}
        }
?>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <?php include('menu.php')?>
    </div>

    <div class="main-panel">
        <?php include('navbar.php')?>

        <div class="content">
            <?php $this->load->view('admin/'.$page);?>
        </div>


    <?php include('footer.php');?>
    </div>
</div>


</body>
<?php include('js.php')?>
</html>
