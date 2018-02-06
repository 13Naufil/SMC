<!-- ================================================
   Scripts
   ================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.2.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="<?php echo base_url();?>js/materialize.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- Data tables -->
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/data-tables/data-tables-script.js"></script>

<!-- chartist -->
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/chartist-js/chartist.min.js"></script>

<?php if(isset($loader)==1): ?>


<!-- chartjs -->
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/chartjs/chart.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/chartjs/chart-script.js"></script>
<?php endif; ?>


<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="<?php echo base_url();?>js/plugins.js"></script>
<!-- sparkline -->
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/sparkline/sparkline-script.js"></script>

<!-- google map api -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>

<!--jvectormap
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/plugins/jvectormap/vectormap-script.js"></script>-->


<!-- Toast Notification -->
<script type="text/javascript">
    // Toast Notification
    $(window).load(function() {
        setTimeout(function() {
            //Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
        }, 1500);
    });

</script>
</body>

</html>