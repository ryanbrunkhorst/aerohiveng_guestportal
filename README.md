# aerohivengguestportal
A very simple HTML/PHP script based Guest portal for Aerohive NG. Can be run on Azure in web app. 

I created this very simply web app for our future migration over to Aerohive Hivemanager NG.

I wanted to build a web-based form that would work on any device so that visitor credentials could be created and deseminated
to the guest via SMS and email.

Using the Hivemanager NG API in conjunction with some very simple PHP/CURL allows for the creation of these credentials.

Notes:

-I opted to add a randomized number to the username field as a workaround to not have credential renewals set up. 
In the future I plan to investigate and see if I can build some logic that will actually renew the credentials
of users who already exist.

-I plan to work on a more elegant response page after credentials are created that will include a redirect button to the 
form for those who do not wish for the kiosk to reset to the form after 60 seconds. My thoughts are if there are a lot 
of people queuing to get credentials they will most likely want to create them in quick succession.

-I will add more instructions to this readme in time. For now, I have left comments in the files that will hopefully
guide in the proper direction.
