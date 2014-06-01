<?php
$request = $_GET['request'];
$request = str_replace("VBVBV","/",$request);
$request = "http://" . $request;
$page = file_get_contents($request, false);
echo $page;



?>