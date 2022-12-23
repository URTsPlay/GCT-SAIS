	<!-- set title/ make sure to set title in navigation -->
	<title><?php echo $page_title;?></title>
	<!-- bottom elements/ do not touch -->
	<script type="text/javascript" src="<?php echo $short_url;?>assets/js/jquery-3.5.1.min.js"></script>
 	<script type="text/javascript" src="<?php echo $short_url;?>assets/js/popper.min.js"></script>
 	<script type="text/javascript" src="<?php echo $short_url;?>assets/js/perfect-scrollbar.min.js"></script>
 	<script type="text/javascript" src="<?php echo $short_url;?>assets/js/addons/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo $short_url;?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $short_url;?>assets/js/mdb.min.js"></script>
	<script type="text/javascript" src="<?php echo $short_url;?>assets/js/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="<?php echo $short_url;?>assets/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="<?php echo $short_url;?>assets/js/function.js"></script>
</body>
</html>
<!-- prevents posting forms upon page refresh -->
<script type="text/javascript">
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>