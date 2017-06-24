<?php
# created after initial successful OAUTH connection using a guest management role user created in Hivemanager NG
# every 90 days this api token will need to be refreshed with the corresponding refresh token
# otherwise, initial OAUTH setup will need to be completed again
$accesstoken = "";

# client id obtained from Aerohive Developer portal
$clientid = "";

# client secret obtained from Aerohive Developer portal
$clientsecret = "";

# redirect url set in the Aerohive Developer portal
$redirecturi = "";

# VHM ID from Hivermanager NG about
$ownerid = "";

# user group id. possible user group ids can be found by using get against https://cloud-va.aerohive.com/xapi/v1/identity/userGroups?ownerId=$ownerid
# I typically use postman for this purpose. 
$groupid = "";

$policy = "GUEST";
?>