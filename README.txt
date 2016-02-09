There are currently 4 php scripts and one bash script in the public_html folder.
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

---------------------newacqu.php-----------------------
newacqu.php: this function will add an acquaintance to the database. (we still need to figure out how to send pictures to my server. The pics are NOT on the database though)
This script takes 3 paramters: USERNAME, FNAME, LNAME. When calling this functions it is our job to make sure that the USERNAME is unique.
this script also creates a dir on the server where face pics will be stored. this absolute file path is stored in the database. the file path to the pics is always
"/SECS/home/s/scnolton/facePics/<Acquaintance-Username>"
These are the various echos the script can return. you can figure out whan and why each echo takes place based on what they say:
"New Acquaintance Created"
"one or more paramters missing Unable to Create New Acquaintance"
"Acquaintance already exists Unable to Create New Acquaintance"
<<<<<<< HEAD
"New Acquaintance Created dir already exists!"(the way I have it programed this last one should never happen unless someone deltes a user from the database but doesn't dealete the corisponding dir)
here is a curl you can use to test. make sure you keep the database in order though:
curl -L http://www.secs.oakland.edu/~scnolton/newacqu.php --data "USERNAME=loopy&FNAME=Grumpy&LNAME=OldFart"
---------------------newacqua.php-----------------------

---------------------relate.php-----------------------
relate.php: this function will relate a user to an acquaintance. for the user, the app will only recognize acquatneces that are matched up in the acquaintance table.
this script takes 4 parameters: USERNAME, ACQUNAME, RELATION, and MESSAGE.
these are the various Echos possible 
"True"  (that means it worked)
"Acuqintance ID does not exists False"
"user does not exists False"
"conn failure False"
"one of the feilds was blank False"
here is an example curl you can use to test. make sure you access the database through phpMyAdmin.
curl -L http://www.secs.oakland.edu/~scnolton/relate.php --data "USERNAME=switch202&ACQUNAME=loopy&RELATION=brother&MESSAGE=my older brother. he is so cool."
---------------------relate.php-----------------------
=======
"New Acquaintance Created dir already exists!"(the way I have it programmed this last one should never happen unless someone deletes a user from the database but doesn't delete the corresponding dir)

here is a curl you can use to test. make sure you keep the database in order though:
curl -L http://www.secs.oakland.edu/~scnolton/newacqu.php --data "USERNAME=loopy&FNAME=Grumpy&LNAME=OldFart"
---------------------newacqua.php-----------------------
>>>>>>> f6302536dc654496f2d1c59f2f3ee5561439d6b6
