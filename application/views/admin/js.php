
<!--   Core JS Files   -->
<script src="<?php echo base_url('third_party/admin/')?>js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?php echo base_url('third_party/admin/')?>js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="<?php echo base_url('third_party/admin/')?>js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo base_url('third_party/admin/')?>js/bootstrap-notify.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="<?php echo base_url('third_party/admin/')?>js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->

<script type="text/javascript">
    $(document).ready(function(){
        /* 
        demo.initChartist(); */
/* 
$.notify({
            icon: 'ti-gift',
            message: "Selamat datang"
            
        },{
            type: 'success',
            timer: 4000
        }); */
        $(".nav>li").each(function() {
            var navItem = $(this);
            if (navItem.find("a").attr("href") == 'http://localhost'+location.pathname) 
                {
                navItem.addClass("active");
            }
        });
    });
    </script>
    <script src="<?php echo base_url('js')?>/data.js"></script>
