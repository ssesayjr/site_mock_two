import sys
import mysql.connector
from flask import Flask, render_template, request, redirect, url_for, session
from flask_mysqldb import MySQL
import MySQLdb.cursors
import MySQLdb.cursors, re, hashlib

# # host = "deitralou24907.domaincommysql.com", 
# # user = "dreiser", 
# # passwd = "*password*", 
# # db = "member_portal"

# conn = mysql.connector.connect(host = "deitralou24907.domaincommysql.com", user = "dreiser", passwd = "T4Equity2023!", database = "member_portal")

# c = conn.cursor()
# c.execute("SELECT * FROM users")
# rows = c.fetchall()
# for row in rows:
#     print(row)


app = Flask(__name__)

app.secret_key = 'cuddle'


app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = 'Leumas88!'
app.config['MYSQL_DB'] = 'transform'

mysql = MySQL(app)

#!/usr/bin/python 
print ("Content-type:text/html\n\n" )
import MySQLdb 

conn = MySQLdb.connect (
  host = "localhost", 
  user = "root", 
  passwd = "Leumas88!", 
  db = "transform") 



print ("connected to the database")
c = conn.cursor()
c.execute("SELECT * FROM users")
rows = c.fetchall()
for row in rows:
    print(row)


@app.route('/login/', methods=['GET', 'POST'])
def login():
    # Output a message if something goes wrong...
    msg = ''

     # Check if "username" and "password" POST requests exist (user submitted form)
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        # Create variables for easy access
        username = request.form['username']
        password = request.form['password']
        # Retrieve the hashed password
        # hash = password
        # hash = hashlib.sha1(hash.encode())
        # password = hash.hexdigest()



        # Check if account exists using MySQL
        cursor = conn.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute('SELECT * FROM users WHERE email = %s AND password = %s', (username, password,))
        # Fetch one record and return the result
        account = cursor.fetchone()


                # If account exists in accounts table in out database
        if account:
            # Create session data, we can access this data in other routes
            session['loggedin'] = True
            session['id'] = account['idusers']
            session['username'] = account['email']
            # Redirect to home page
            return redirect(url_for('home'))
        else:
            # Account doesnt exist or username/password incorrect
            msg = 'Incorrect username/password!'
    return render_template('index.html', msg=msg)

# http://localhost:5000/python/logout - this will be the logout page
@app.route('/pythonlogin/logout')

def logout():
    # Remove session data, this will log the user out
   session.pop('loggedin', None)
   session.pop('id', None)
   session.pop('username', None)
   # Redirect to login page
   return redirect(url_for('login'))


# http://localhost:5000/pythinlogin/home - this will be the home page, only accessible for logged in users
@app.route('/login/home')
def home():
    # Check if the user is logged in
    if 'loggedin' in session:
        # User is loggedin show them the home page
        return render_template('home.html', username=session['username'])
    # User is not loggedin redirect to login page
    return redirect(url_for('login'))

