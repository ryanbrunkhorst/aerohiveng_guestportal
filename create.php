<html>
<head>
<title>Guest Wifi Registration</title>
<style>
body {
    background-color: #000000;
}
#returnbutton {
    background-color: #0039e6;
    color: white;
    width: 75px;
    height:40px;
    border: none;
    border-radius: 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    float: left;
}
#returnbutton:hover {
    background-color: #002db3;
}
</style>
<link href="https://fonts.googleapis.com/css?family=Cutive" rel="stylesheet">  
</head>

<body text="#FFFFFF">
<font face='Cutive'>
<img src="logo.jpg">
<p>  

<?php

#imports variables for API connections to customer's Hivemanager NG VHM from tokens.php
include 'tokens.php'; 

curl_setopt($process, CURLOPT_SSL_VERIFYPEER, true);

#Redirects back to form after 60 seconds.
header('Refresh: 60; URL=index.php');

#Capture of user input as variables
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$phone = $_POST["phone"];

#Adds US country code to mobile phone
$phoneconvert ="1$phone";

#Adding a random number allows a guest to request another guest ppsk. 
#In the future I may add renewal logic. 
$randomnumber = rand(1, 100000);

$userName = "$firstName.$lastName.$randomnumber";
$curl = curl_init();

#Allows a user to put email, mobile phone, or both. Displays error if both fields are empty.
#Contents of $phoneinput variable cannot be included in the CURLOPT_POSTFIELDS below if $delivermethod is only EMAIL.
if (($email == NULL) && ($phone == NULL)){ 
    $error = "You need to provide a valid email or mobile phone number";
}elseif ($phone == NULL){ 
    $phoneinput = NULL;
    $delivermethod = "EMAIL";
}elseif ($email == NULL){ 
    $phoneinput = ",\r\n \"phone\": \"$phoneconvert\"";
    $delivermethod = "SMS";
}else { 
    $phoneinput = ",\r\n \"phone\": \"$phoneconvert\"";
    $delivermethod = "EMAIL_AND_SMS";
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://cloud-va.aerohive.com/xapi/v1/identity/credentials?ownerId=$ownerid",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n  \"deliverMethod\": \"$delivermethod\",\r\n  \"policy\": \"$policy\",\r\n  \"email\": \"$email\",\r\n  \"firstName\": \"$firstName\",\r\n  \"groupId\": \"$groupid\",\r\n  \"lastName\": \"$lastName\",\r\n  \"userName\": \"$userName\"$phoneinput\r\n}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer $accesstoken",
    "cache-control: no-cache",
    "content-type: application/json",
    "x-ah-api-client-id: $clientid",
    "x-ah-api-client-redirect-uri: $redirecturi",
    "x-ah-api-client-secret: $clientsecret"
  ),
));

$response = curl_exec($curl);
$json = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

# displays error if user failed to supply an email or mobile phone number.
if ($error) { 
   echo $error;
#  echo "cURL Error #:" . $err;
} else { 
    echo "Connect to " .$json->data->ssid[0];
    echo " with the password: " .$json->data->password; 
}
?>
<p>
This screen will close in one minute
<p>
<a id="returnbutton" href="index.php">Return</a>
</font>
</body>
</html>