import sys
import mysql.connector
from flask import Flask, render_template, request, redirect, url_for, session
from flask_mysqldb import MySQL
import MySQLdb.cursors
import MySQLdb.cursors, re, hashlib
# import sshtunnel

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

# sshtunnel.SSH_TIMEOUT = 5.0
# sshtunnel.TUNNEL_TIMEOUT = 5.0


# with sshtunnel.SSHTunnelForwarder(
#     ('www.domain.com'),
#     ssh_username='deitralou24907', ssh_password='Transform4Equity$250',
#     remote_bind_address=('deitralou24907.domaincommysql.com', 3306)
# ) as tunnel:
#     conn = MySQLdb.connect(
#         user='dreiser',
#         passwd='T4Equity2023!',
#         host='deitralou24907.domaincommysql.com', port=tunnel.local_bind_port,
#         db='member_portal',
#     )


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

# WORKING CONFIGURATION
conn = MySQLdb.connect (
  host = "localhost", 
  user = "root", 
  passwd = "Leumas88!", 
  db = "transform") 


## TESTING ALL THE CONFIGURATIONS
# conn = MySQLdb.connect (
#  #server = "custsql-dom03.eigbox.net",
#  host = "deitralou24907.domaincommysql.com", 
#  user = "ssesay", 
#  passwd = "Leumas88!", 
#  db = "member_portal")

print ("connected to the database")
c = conn.cursor()
c.execute("SELECT * FROM users")
rows = c.fetchall()
for row in rows:
    print(row)


@app.route('/test/', methods=['GET'])
def index():
    return render_template('index.html')


@app.route('/test/', methods=['GET', 'POST'])
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
            session['status'] = account['active']
            # Redirect to home page
            return redirect(url_for('home'))
        else:
            # Account doesnt exist or username/password incorrect
            msg = 'Incorrect username/password!'
    return render_template('index.html', msg=msg)

# # http://localhost:5000/python/logout - this will be the logout page
# @app.route('/pythonlogin/logout')
@app.route('/test/logout')
def logout():
    # Remove session data, this will log the user out
   session.pop('loggedin', None)
   session.pop('id', None)
   session.pop('username', None)
   session.pop('status', None)
   # Redirect to login page
   return redirect(url_for('login'))

# http://localhost:5000/pythinlogin/home - this will be the home page, only accessible for logged in users
@app.route('/test/home')
def home():
    # Check if the user is logged in
    if 'loggedin' in session:
        # User is loggedin show them the home page
        return render_template('home.html', username=session['username'])
    # User is not loggedin redirect to login page
    return redirect(url_for('login'))

# http://localhost:5000/pythinlogin/home - this will be the home page, only accessible for logged in users
@app.route('/test/resources')
def resources():
    # Check if the user is logged in
    if 'loggedin' in session:
            if 'status' in session:
                # User is loggedin show them the home page
                return render_template('resources.html', username=session['username'])
    # User is not loggedin redirect to login page
    return redirect(url_for('index'))


# http://localhost:5000/pythinlogin/home - this will be the home page, only accessible for logged in users
@app.route('/test/profile')
def profile():
     # We need all the account info for the user so we can display it on the profile page
    
    # Check if the user is logged in
    if 'loggedin' in session:
        # Show the profile page with account info
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute('SELECT * FROM users WHERE idusers = %s', (session['id'],))
        account = cursor.fetchone

        # User is loggedin show them the home page
        return render_template('profile.html', account=account)
    # User is not loggedin redirect to login page

    return redirect(url_for('genprof.html'))

@app.route('/test/sqltable')
def sqltable():
    p = []
    if 'loggedin' in session:
        cursor2 = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor2.execute('SELECT * FROM users')
        result = cursor2.fetchall()
       
    return render_template('sqltable.html', sqltab=result)

@app.route('/test/updateAccount', methods=['GET', 'POST'])
def updateAccount():
    if 'loggedin' in session:
        msg = ''

        # Check if "username", "password" and "email" POST requests exist (user submitted form)
        if request.method == 'POST' and 'email' in request.form and 'acctStatus' in request.form:
            # Create variables for easy access
            username = request.form['email']
            status = request.form['acctStatus']

            # Check if account exists using MySQL
            cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
            cursor2 = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
            cursor.execute('SELECT * FROM users WHERE email = %s', (username,))
            cursor2.execute('SELECT idusers FROM users WHERE email = %s', (username,))
            id = cursor2.fetchone()['idusers']
            account = cursor.fetchone()
            # If account exists show error and validation checks
            if not username:
                msg = 'Please fill out the email address!'
            elif not re.match(r'[^@]+@[^@]+\.[^@]+', username):
                msg = 'Invalid email address!'
            elif not status:
                msg = 'Please fill out the id!'
            elif not username or not status:
                msg = 'Please fill out the form!'
            else:
                # Hash the password

                # Account doesn't exist, and the form data is valid, so insert the new account into the accounts table
                cursor.execute('UPDATE users SET active = %s WHERE email =%s and idusers=%s', (status, username, id,))
                mysql.connection.commit()
                msg = 'You have successfully updated the account'


        elif request.method == 'POST':
            # Form is empty... (no POST data)
            msg = 'Please fill out the form!'
        # Show registration form with message (if any)
 
    return render_template('profile.html', msg=msg)