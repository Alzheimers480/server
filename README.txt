There Are currently 4 php scripts and one bash script in the public_html folder.
There is also 1 php script in the php_templ folder. I will go over each script here.

---------------------auth.php-----------------------
auth.php: This script is used to authorize login for a user. it takes 2 paramters: USERNAME and
PASSWORD. The script will return the echo "True" if the user is authorized to log in.
The script will echo "False" if the Password is wwrong for that user.
The script will echo "user wasn't found False" if the username was not found in the database.

Here is an example curl for auth.php:
curl -L http://www.secs.oakland.edu/~scnolton/auth.php --data "USERNAME=switch201&PASSWORD=password"
It should return "True"
---------------------auth.php-----------------------

---------------------newuser.php-----------------------
newuser.php: This script is used to add a new user to the USERS2 database.
This script takes 6 paramters: USERNAME, PASSWORD, PASSWORD2, FNAME, LNAME, and EMAIL
If everything is filled out correctly, the script will echo "New User Created".
If something is wrong the script will echo one of the following:
"one of the fields was blank Unable to create new user"
"The 2 passwords didn't match Unable to create new user"
"user already exists Unable to create new user"
When a new user is created email.php is sent to the the user. when the user clics the link his or her email becomes verified.

Here is an example curl for newuser.php:
curl -L http://www.secs.oakland.edu/~scnolton/newuser.php --data "USERNAME=switch202&PASSWORD=password&PASSWORD2=password&FNAME=Grumpy&LNAME=OldFart&EMAIL=scnolton@oakland.edu"
It should return "New User Created"
---------------------newuser.php-----------------------

---------------------var.php-----------------------
var.php: This script is used to check if a user has verfiyed his or her email or not.
The script only takes one paramter: USERNAME
The script will return a "1", if the user has verfied his or heer email. It will return "0"
note that these are strings from an echo and not integers.

Here is an example curl for var.php
curl -L http://www.secs.oakland.edu/~scnolton/var.php --data "USERNAME=switch201"
this should return "0" unleess the variable in the database gets changed
---------------------var.php-----------------------

---------------------email.php-----------------------
email.php: this is the script we send to users email so that they can verfiy their email.
when we send them the link to the script we injeect the username paramter into the URL
so that the database knows what user to flip the verfied bit for.
---------------------email.php-----------------------

---------------------db.php-----------------------
This is a reusable script for creating an intial connection to the scnolton database
---------------------db.php-----------------------