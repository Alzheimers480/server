To invoke/test the newuser.php script from the comand line use the following curl:

curl -L http://www.secs.oakland.edu/~scnolton/newuser.php --data "USERNAME=<username>&PASSWORD=<password>&PASSWORD2=<password2>&FNAME=<firstName>&LNAME=<LastName>&EMAIL = <email>"

the values with <> are where your data goes you do not need quotes around these.

password and password2 must match for the user to be created. if a new user is created you will get the message "New User Created" if it doesn't work you'll get 
something else I forget what exactly but you can see it in the code.

To invoke/test the auth.php script from the comand line use the following curl:

curl -L http://www.secs.oakland.edu/~scnolton/auth.php --data "USERNAME=<username>&PASSWORD=<password>" 

again the <> indicate where you put in text for the username and password.

if it works it will say something like "Login Success" if it fails is will say "Login Failed"