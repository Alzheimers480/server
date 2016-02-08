curl -Ls http://www.secs.oakland.edu/~scnolton/deleteuser.php --data "USERNAME=switch202" > /dev/null
curl -Ls http://www.secs.oakland.edu/~scnolton/newuser.php --data "USERNAME=switch202&PASSWORD=password&PASSWORD2=password&FNAME=Grumpy&LNAME=OldMan&EMAIL=scnolton@oakland.edu" > /dev/null
x=$(curl -Ls http://www.secs.oakland.edu/~scnolton/newuser.php --data "USERNAME=switch202&PASSWORD=password&PASSWORD2=password&FNAME=Grumpy&LNAME=OldMan&EMAIL=scnolton@oakland.edu")
if [ "$x" == "user already exists False" ]
then
    echo "Duplicate user test passed!"
else
    echo "Duplicate user test failed!"
fi;

x=$(curl -Ls http://www.secs.oakland.edu/~scnolton/auth.php --data "USERNAME=switch202&PASSWORD=password") > /dev/null
if [ "$x" == "True" ]
then
    echo "User auth test passed!"
else
    echo "User auth test failed!"
fi;

x=$(curl -Ls http://www.secs.oakland.edu/~scnolton/auth.php --data "USERNAME=switch202&PASSWORD=passwor") > /dev/null
if [ "$x" == "False" ]
then
    echo "User no-auth test passed!"
else
    echo "User no-auth test failed!"
fi;

curl -Ls http://www.secs.oakland.edu/~scnolton/deleteuser.php --data "USERNAME=switch203" > /dev/null
x=$(curl -Ls http://www.secs.oakland.edu/~scnolton/auth.php --data "USERNAME=switch202&PASSWORD=passwor") > /dev/null
if [ "$x" == "False" ]
then
    echo "No-user try-auth test passed!"
else
    echo "No-user try-auth test failed!"
fi;
