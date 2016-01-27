#!/bin/bash
mail -s "Welcome" $1  <<EOF
"http://www.secs.oakland.edu/~scnolton/email.php?EMAIL=$1"
EOF

