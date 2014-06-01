
<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$email = $_POST['email'];
$pass = $_POST['pass'];

$arr = array('email' => $email, 'password' => $pass);

$content = json_encode($arr);

$url = "https://shelterconnect.ngrok.com/organizations/authenticate";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-Type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

echo $status;

if ( $status != 201 ) {
    //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}


curl_close($curl);

//echo $json_response;

$response = json_decode($json_response, false);

$token = $response->{'token'};

setcookie('usertoken',$token,time()+3600*24*3,'/');

header('Location: /');

?>