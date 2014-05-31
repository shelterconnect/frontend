<a href="javascript: closeInOverlay();"><img src="img/back.png" style="width: 45px;
position: absolute;
top: 10px;
right: calc(90% - 35px);" /></a>
<h1 style="text-align: center; margin-top: 60px;">Sign In</h1><br />
<br />


<?php  
echo "<div style='text-align: center; position: absolute; left: 0; right: 0;'>";
echo $error;
echo "</div>";

echo '<br />';

 ?>

<form class="formcontainer" action="engines/eng-sign-in.php" method="POST">
<input id="1531" placeholder="EMAIL" class="formfield" type="text" name="email"><br>
<input id="2513" placeholder="PASSWORD" class="formfield" type="password" name="pass"><br />
<input class="formbutton" type="submit" value="SIGN IN" />
</form>


<script>
var flashInterval = setInterval(function() {
    $('#1531').toggleClass('blue-border');
	$('#2513').toggleClass('blue-border');
}, 1000);
//window.clearInterval(flashInterval);
</script>