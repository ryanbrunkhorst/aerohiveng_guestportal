# aerohivengguestportal
A very simple HTML/PHP script based Guest portal for Aerohive NG. Can be run on Azure in web app. 

I created this very simply web app for our future migration over to Aerohive Hivemanager NG. Mainly, I wanted to build a web-based form that would work on any device so that visitor credentials could be created and deseminated
to the guest via SMS and email.

Using the Hivemanager NG API in conjunction with some very simple PHP/CURL allows for the creation of these credentials.

Notes:

-I opted to add a randomized number to the username field as a workaround to not have credential renewals set up. 
In the future I plan to investigate and see if I can build some logic that will actually renew the credentials
of users who already exist.

-I will add more instructions to this readme in time. For now, I have left comments in the files that will hopefully
guide one in the proper direction.

I'm open to any suggestions others might have. I'm not a developer by trade so please forgive any blantant mistakes in the code. Better yet, let me know and I'll make adjustments.

Much of the initial setup requires creating a guest management user, usergroups, and credential distribution group in the Hivemanger NG portal. Download the free program Postman to interact with the Aerohive API. An application must also be created in the development portal. Multiple web apps can utilize the same application in the Aerohive development portal. After that is done, OAUTH authentication must be employed using the guest management user. The address bar will show an authentication code which must be pasted into another POST call within 30 secs. I pre-staged postman with the needed URL and HTTP headers. The resulting response becomes the actual API access code which must be refreshed every 60 days. Here are the steps:

1. Put the following into a browser. You will authenticate and then need to visit the following in a browser. The client id must match the field in the Aerohive development portal application.

https://cloud.aerohive.com/thirdpartylogin?client_id=a36b471b&redirect_uri=https://localhost

2. Login with the guest management user credentials.

3. You have 30 secs to go to postman and post the following. Use the auth code from the brower address bar and paste onto REPLACE. The redirect URI must match the field in the Aerohive development portal application. I recommend pre-staging this url with the required headers in Postman.

https://cloud.aerohive.com/services/acct/thirdparty/accesstoken?authCode=REPLACE&redirectUri=https://localhost

<p><img src="https://raw.githubusercontent.com/FPU-NS/aerohiveng_guestportal/master/images/postman_initialoauth.png"><p>

Example response
{
    "data": {
        "####": {
            "ownerId": ####,
            "vhmId": "VHM-@@@@@@@@@",
            "vpcUrl": "https://cloud-va.aerohive.com",
            "accessToken": "ksjdnaskjn32nn293n98n98snsajndskajdnkjn",
            "expireAt": 1503653526777,
            "refreshToken": "sadsajods234ajd24oasjdpoijpo23093498274230"
        }
    }
}

You'll now use the contents of accessToken: to make api calls along with the other the X-AH-API-CLIENT-ID, X-AH-API-CLIENT-SECRET, and X-AH-API-CLIENT-REDIRECT-URI headers. The accessToken and refreshToken are available for viewing in the Hivemanager NG portal. You will need the refreshToken to receive a new API access token every 60 days.

Refresh accesstoken

Using Postman configure as such:
<p><img src="https://raw.githubusercontent.com/FPU-NS/aerohiveng_guestportal/master/images/postman_refreshaccesstoken01.png"><p>
<p><img src="https://raw.githubusercontent.com/FPU-NS/aerohiveng_guestportal/master/images/postman_refreshaccesstoken02.png"><p>

Click send and you should get a response with the new access token. If the access token has expired you will have to complete the initial OAUTH process again.
