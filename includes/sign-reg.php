
<a href="javascript: closeRegOverlay();"><img src="img/back.png" style="width: 45px;
position: absolute;
top: 10px;
right: calc(90% - 35px);" /></a>
<h1 style="text-align: center; margin-top: 60px;">REGISTER</h1><br />
<br />
<?php  
echo "<div style='text-align: center; position: absolute; left: 0; right: 0;'>";
echo $error;
echo "</div>";

echo '<br />';

 ?>

<form class="formcontainer" action="engines/eng-sign-reg.php" method="POST">
<input id="13432" placeholder="EMAIL" class="formfield" type="text" name="email"><br>
<input id="22342" placeholder="PASSWORD" class="formfield" type="password" name="pass"><br />
<input class="formbutton" type="submit" value="REGISTER" />
</form>


<script>
var flashInterval = setInterval(function() {
    $('#13432').toggleClass('blue-border');
	$('#22342').toggleClass('blue-border');
}, 1000);
//window.clearInterval(flashInterval);
</script>




