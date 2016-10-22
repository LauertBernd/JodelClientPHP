# JodelClientPHP
JodelClientPHP is a PHP Interface for Jodel (http://jodel-app.com) 

### Current Status:

Working somehow, but not yet completed.

### Installation:

Install using composer. There are a lot of decent installation tutorials for laravel apps. Dont want to discuss it here
### Usage:

First create an account using:
jodelconsole.php createaccount

Get the Access Token and use the Command

jodelconsole.php getposts <accesstoken> 

to get a list of posts.

### Development:

I have arranged somewhat of an "Enterprise"-Like Structure with a lot of Objects and using decent patterns. Feel free to add the Commands into the Request Folder.
 
You can get a list of the Commands from here(old project and not working anymore. just use the urls and start 
https://github.com/LauertBernd/JodelPHP


### Troubleshooting:
If its somehow not working and giving you a "Signed Failed" Error, you will have to update the Signing Credentials.
sTo do so, go to https://bitbucket.org/cfib90/ojoc/commits/all, take a look at the latest few commits and change the constants in the File 

JodelApi/Requests/AbstractRequest.php

according to the credentials of the commit. Then try again :) If its working, make a Push Request to contribute to everyone

### Last words:
 Good Luck everyone and keep jooodling :)