
<script>
    var pengumuman = Date.parse('May 06, 2018 00:00:00');
    let now = new Date().getTime();
    function go(page)
    {
        if (page == "un" && now<=pengumuman){
            alert("data UN belum ada");
        }
        else{
        var redirect = page;
        var url = "<?php echo site_url('"+ redirect +"')?>"
        window.location = url;}
    }
</script>
        <script src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<?php
    if($app = 'siswa'){
        echo'<script src="'.base_url().'js/data.js"></script>';
        
    }
?>