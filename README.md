


# Leapmotion project
Link Demo:
http://ruathudo.com/leap/

You can use with your own leapmotion directly!




Backend by Truc Truong
##1. Installation:
 - Create a new database name **leapmotion**
 - Import the database schema with the **leapmotion.sql** in the **api/** folder
 - Change your mysql authentication in the **api/index.php** file with your DB name and DB password
 - In **api/** folder, make sure there is a **.htaccess** file with the following information:
 
```````````
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)\?*$ index.php?__route__=/$1 [L,QSA]
``````````


##2. Restful Request Instruction:

-  GET or POST **api/questions** : to get questions
-  GET **api/answer/:id**: to get answers for the questions
-  POST **api/saveAnswer**: post to this with json of *results* object to save all the answers after each session.

##3. Add new questions and answers
Go the **yourdomain.com/admin** to add questions with Admin panel

Should you have any questions? Please contact Truc for support.


