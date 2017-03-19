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
