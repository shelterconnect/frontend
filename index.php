<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="apple-touch-icon-precomposed" href="ICON HERE"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" 
      type="image/png" 
      href="includes/favicon_bread_trans.png">
<LINK href="includes/main.css" rel="stylesheet" type="text/css">
<title>Shelter Connect Home</title>
<script src="includes/jquery-2.1.0.min.js"></script>
<script src="includes/jquery-ui-1.10.4.min.js"></script>
<script src="includes/jquery.ui.touch-punch.min.js"></script>
</head>

<div id="sign-in-overlay"><?php include('sign/sign-in.php'); ?></div>
<div id="sign-reg-overlay"><?php include('sign/sign-reg.php'); ?></div>
<div id="sign-prof-overlay"><?php include('sign/sign-prof.php'); ?></div>


<div class="navbar">
    
    <?php require_once("includes/navbar.php") ?>
    
</div>

<div class="contents">
    
<div id="map" style="height: 500px; width: 500px;"></div>
</div>

<?php include_once("includes/mapdisplay.php") ?>
  


<script>
function signInOverlay(){
	$('#sign-in-overlay').fadeIn('slow', function(){
		});
}
function closeInOverlay(){
	$('#sign-in-overlay').fadeOut('slow', function(){
		});
}
function signRegOverlay(){
	$('#sign-reg-overlay').fadeIn('slow', function(){
		});
}
function closeRegOverlay(){
	$('#sign-reg-overlay').fadeOut('slow', function(){
		});
}

</script>


<body>
</body>
</html>
