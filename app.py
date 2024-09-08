

# -----------about the Developper---------
#
#Name: NGALI ABIRU NDINAKIEH
# qualification: "ingenieur de conception" en genie informatique (BAC+5, Master's)
# skills: data analyst, full-stack web and mobile app developper, AI and ML engineer
# experience: 7 months, at the time of developping this application
# Contact: +237653846229
# email: ngaliabiru@gmail.com

# --------finished---------------


from flask import Flask, request, session, redirect, url_for, render_template, flash
import re
from werkzeug.security import generate_password_hash, check_password_hash
from sqlalchemy import Column, ForeignKey, Integer
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime
import os
from werkzeug.utils import secure_filename
import uuid as uuid
import mysql.connector
from flask_mysqldb import MySQL




app = Flask(__name__)
app.secret_key = 'cairocoders-ednalan'
UPLOAD_FOLDER = 'static/uploads'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
app.config['MAX_CONTENT_LENGTH'] = 16 * 1024 * 1024
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+pymysql://root:@localhost/full_expert'

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'full_expert'

mysql = MySQL(app)
# conn = mysql.connection.cursor()

db = SQLAlchemy(app)
app.app_context()

# DB_HOST = "localhost"
# DB_NAME = "full_expert"
# DB_USER = "root"
# DB_PASS = "123456"

# conn = mysql.connector.connect(host=DB_NAME, user=DB_USER, password='', host=DB_HOST)
global ref


@app.route('/')
def index():
    return render_template('main_home.html')


@app.route('/admin')
def admin():
    return render_template('admin.html')


@app.route('/pub_page')
def pub_page():
    return render_template('pub_page.html')


#admin registration

class BackOffice(db.Model):
    __tablename__ = 'admin'
    id = db.Column('id', db.Integer, primary_key=True)
    username = db.Column(db.String(200))
    password = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, username, password,date):
        self.username = username
        self.password = password
        self.date = date


@app.route('/register_admin', methods=['GET', 'POST'])
def register_admin():
    # Check if "username", "password" and "email" POST requests exist (user submitted form)
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        # Create variables for easy access
        username = request.form['username']
        password = request.form['password']
        date = datetime.utcnow()
        _hashed_password = generate_password_hash(password)
        data = BackOffice(username, _hashed_password, date)
        db.session.add(data)
        db.session.commit()
        # cursor.execute("INSERT INTO admin (username, password,date) VALUES (%s,%s,%s)",
        #                (username, _hashed_password, date))
        # conn.commit()
        flash('You have successfully registered!')
    return render_template('backoffice.html')

@app.route('/register_admins', methods=['GET', 'POST'])
def register_admins():
    return render_template('backoffice.html')
#admin registraation


#admin login funtion begin
@app.route('/admin_login/', methods=['GET', 'POST'])
def admin_login():
    # cursor = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
    cur = mysql.connection.cursor()
    # Check if "username" and "password" POST requests exist (user submitted form)
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        username = request.form['username']
        password = request.form['password']
        # Check if account exists using postgresql
        cur.execute('SELECT admin.password FROM admin WHERE username = %s', (username,))
        # Fetch one record and return result
        # mysql.connection.commit()
        # cur.close()
        account = cur.fetchone()
        cur.close()
        if account:
            password_rs = account[0]
            # If account exists in users table in out database
            if check_password_hash(password_rs, password):
                # Create session data, we can access this data in other routes
                session['loggedin'] = True
                # session['id'] = account['id']
                # session['username'] = account['username']
                # Redirect to home page
                return redirect(url_for('admin_page'))
            else:
                # Account doesnt exist or username/password incorrect
                flash('Incorrect username/password')
        else:
            # Account doesnt exist or username/password incorrect
            flash('Incorrect username/password')
    return render_template('admin.html')
#admin login funtion end


#begining of admin home page
@app.route('/admin_page')
def admin_page():
    # Check if user is loggedin
    if 'loggedin' in session:
        # User is loggedin show them the home page
        return render_template('admin_page.html')
    # User is not loggedin redirect to login page
    return redirect(url_for('admin'))
#ending of admin home page

#begining of admin logout
@app.route('/logouts')
def logouts():
    # Remove session data, this will log the user out
    session.pop('loggedin', None)
    session.pop('id', None)
    session.pop('username', None)
    # Redirect to login page
    return redirect(url_for('admin'))
@app.route('/logout')
#ending of admin logout

#begining comments class and funtion
class Comments(db.Model):
    __tablename__ = 'comment'
    id = db.Column('id', db.Integer, primary_key=True)
    name = db.Column(db.String(200))
    enterprise_name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())
    comment = db.Column(db.String(1000))
    id_enterprise = db.Column(Integer, ForeignKey("enterprises.enterprise_id", ondelete="CASCADE"))

    def __init__(self, name, enterprise_name, email, telephone, date, comment, id_enterprise):
        self.name = name
        self.enterprise_name=enterprise_name
        self.email = email
        self.telephone = telephone
        self.date = date
        self.comment = comment
        self.id_enterprise = id_enterprise


@app.route("/comment", methods=['POST', 'GET'])
def comment():
    if request.method == 'POST':
        name = request.form['name']
        emails_enterprise = request.form['emails_enterprise']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()
        comments = request.form['comments']
        # cursor = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
        cur = mysql.connection.cursor()
        cur.execute(
            f"SELECT enterprises.enterprise_id FROM enterprises WHERE enterprises.email_enterprise='{emails_enterprise}'")
        id_enterprise = cur.fetchone()
        cur.close()
        if id_enterprise:
            id_enterprise = id_enterprise[0]
            data = Comments( name,emails_enterprise, email, telephone, date, comments, id_enterprise)
            db.session.add(data)
            db.session.commit()
            com = Comments.query.order_by(Comments.id)
            flash("Thank you, Your comment was successfully uploaded, NGALI, the Full Expert team")
            print(com)
            return render_template("message.html", com=com)
        else:
            flash("Sorry! this email does not correspond to any enterprise. Go to the main menu, click on contact button of the enterprise and pick its email. NGALI, the Full Expert team")
            return render_template("message.html")
        # flash("Sorry, check your credentials and submit again!")
    return render_template("message.html")
#ending comments class and funtion


#client dashboard
@app.route('/home')
def home():
    # Check if user is loggedin
    if 'loggedin' in session:
        # User is loggedin show them the home page
        return render_template('home.html')
    # User is not loggedin redirect to login page
    return redirect(url_for('login'))
#client dashboard

#client login function
@app.route('/login/', methods=['GET', 'POST'])
def login():
    # cursor = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
    cur = mysql.connection.cursor()
    # Check if "username" and "password" POST requests exist (user submitted form)
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        username = request.form['username']
        password = request.form['password']
        # print(password)
        # Check if account exists using MySQL
        cur.execute('SELECT userss.password FROM userss WHERE username = %s', (username,))
        # Fetch one record and return result
        account = cur.fetchone()
        cur.close()
        if account:
            password_rs = account[0]
            # print(password_rs)
            # If account exists in users table in out database
            if check_password_hash(password_rs, password):
                # Create session data, we can access this data in other routes
                session['loggedin'] = True
                # session['id'] = account['id']
                # session['username'] = account['username']
                # Redirect to home page
                return redirect(url_for('home'))
            else:
                # Account doesnt exist or username/password incorrect
                flash('Incorrect username/password')
        else:
            # Account doesnt exist or username/password incorrect
            flash('Incorrect username/password')
    return render_template('login.html')
#client login function

#account creation function
@app.route('/register', methods=['GET', 'POST'])
def register():
    # cursor = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
    cur = mysql.connection.cursor()
    # Check if "username", "password" and "email" POST requests exist (user submitted form)
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form and 'email' in request.form:
        # Create variables for easy access
        fullname = request.form['fullname']
        username = request.form['username']
        password = request.form['password']
        email = request.form['email']
        date = datetime.utcnow()
        _hashed_password = generate_password_hash(password)
        # Check if account exists using MySQL
        cur.execute('SELECT * FROM userss WHERE username = %s', (username,))
        account = cur.fetchone()
        # cur.close()
        # print(account)
        # If account exists show error and validation checks
        if account:
            flash('Account already exists!')
        elif not re.match(r'[^@]+@[^@]+\.[^@]+', email):
            flash('Invalid email address!')
        elif not re.match(r'[A-Za-z0-9]+', username):
            flash('Username must contain only characters and numbers!')
        elif not username or not password or not email:
            flash('Please fill out the form!')
        else:
            # Account doesnt exists and the form data is valid, now insert new account into users table
            cur.execute("INSERT INTO userss (fullname, username, password, email,date,key_id) VALUES (%s,%s,%s,%s,%s,%s)",
                           (fullname, username, _hashed_password, email,date,password))
            mysql.connection.commit()
            flash('You have successfully registered!')
    elif request.method == 'POST':
        # Form is empty... (no POST data)
        flash('Please fill out the form!')
    # Show registration form with message (if any)
    return render_template('register.html')
#account creation function


#returning send message page
@app.route('/send_message', methods=['GET', 'POST'])
def send_message():
    return render_template('send_message.html')
#returning send message page

#account uptade function
@app.route('/update_account', methods=['GET', 'POST'])
def update_account():
    # cursor = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
    cur = mysql.connection.cursor()
    # Check if "username", "password" and "email" POST requests exist (user submitted form)
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form and 'email' in request.form:
        # Create variables for easy access
        fullname = request.form['fullname']
        username = request.form['username']
        password = request.form['password']
        email = request.form['email']
        old_username = request.form['old_username']
        _hashed_password = generate_password_hash(password)
        try:
            # Check if account exists using MySQL
            cur.execute('SELECT userss.id FROM userss WHERE username = %s', (old_username,))
            account = cur.fetchone()[0]
            # If account exists show error and validation checks
            if account:
                if not re.match(r'[^@]+@[^@]+\.[^@]+', email):
                    flash('Invalid email address!')
                    return render_template('update_account.html')
                if not re.match(r'[A-Za-z0-9]+', username):
                    flash('Username must contain only characters and numbers!')
                    return render_template('update_account.html')
                if not username or not password or not email:
                    flash('Please fill out the form!')
                    return render_template('update_account.html')
                # flash('Account already exists!')
                cur.execute(
                    f"UPDATE userss "
                    f"SET "
                    f"fullname = '{fullname}', username = '{username}', password = '{_hashed_password}', email = '{email}',key_id = '{password}'"
                    f"WHERE userss.id = {account};",
                )
                mysql.connection.commit()
                cur.execute(
                    f"UPDATE enterprises "
                    f"SET "
                    f"email_enterprise = '{email}'"
                    f"WHERE enterprises.id_user={account};",
                )
                mysql.connection.commit()
                flash("Your account has been successfully updated, NGALI, the Full Expert team")
                return render_template('update_account.html')
            else:
                flash('Sorry! your account was not updated because there was no account with such username! NGALI, the Full Expert team')
                return render_template('update_account.html')
        except TypeError:
            flash('Sorry! your account was not updated because there was no account with such username! NGALI, the Full Expert team')
            return render_template('update_account.html')
    elif request.method == 'POST':
        # Form is empty... (no POST data)
        flash('Please fill out the form!')
    # Show registration form with message (if any)
    return render_template('update_account.html')
#account update function

#user logout function
@app.route('/logout')
def logout():
    # Remove session data, this will log the user out
    session.pop('loggedin', None)
    session.pop('id', None)
    session.pop('username', None)
    # Redirect to login page
    return redirect(url_for('login'))
#user logout function

@app.route('/log')
def log():
    if 'loggedin' in session:
        return render_template('login.html')

#view profile function
@app.route('/profile')
def profile():
    # cursor = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
    cur = mysql.connection.cursor()

    # Check if user is loggedin
    if 'loggedin' in session:
        cur.execute('SELECT * FROM userss WHERE id = %s', [session['id']])
        account = cur.fetchone()
        # Show the profile page with account info
        return render_template('profile.html', account=account)
    # User is not loggedin redirect to login page
    return redirect(url_for('login'))
#view profile function

#update profile function
@app.route('/profile_update', methods=['GET', 'POST'])
def profile_update():
    # cursor = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
    cur = mysql.connection.cursor()
    # Check if user is loggedin
    if 'loggedin' in session:
        global email_enterprise
        global filename
        if request.method == 'POST':
            nom_enterprise = request.form["nom_enterprise"]
            nom_enterprise = nom_enterprise.upper()
            enterprise_tel = request.form["enterprise_tel"]
            email_enterprise = request.form["email_enterprise"]
            url = request.form["url"]
            location = request.form["location"]
            enterprise_desc = request.form['enterprise_desc']
            google_map = request.form['google_map']
            file = request.files['file']
            if len(enterprise_tel)!=9:
                flash("Please fill in a correct phone number")
                return render_template('update_enterprise.html')
            try:
                cur.execute(f"SELECT enterprises.enterprise_id FROM enterprises WHERE enterprises.email_enterprise='{email_enterprise}'")
                i = cur.fetchone()[0]
                if i:
                    cur.execute(f"SELECT userss.id FROM userss WHERE userss.email='{email_enterprise}'")
                    id_user = cur.fetchone()[0]
                    # file2 = request.files['file2']
                    if file.filename == '':
                        flash('Did not upload any logo')
                        try:
                            logo = 'default.PNG'
                            cur.execute(
                                f"UPDATE enterprises "
                                f"SET "
                                f"nom_enterprise = '{nom_enterprise}', enterprise_tel = {enterprise_tel}, email_enterprise = '{email_enterprise}', url = '{url}',location = '{location}',enterprise_desc = '{enterprise_desc}',google_map = '{google_map}', logo = '{logo}'"
                                f"WHERE enterprises.id_user={id_user};",
                                )
                            mysql.connection.commit()
                            flash('You have successfully edited your enterprise!')
                            posts = Enterprises.query.order_by(Enterprises.id)
                            return render_template("update_enterprise.html", posts=posts)
                        except TypeError:
                            flash(
                                "Sorry! There is no account with this user email, the enterprise email must be the email you used in creating your account.  However, if you must use this email, you have to create a different account with it! NGALI, the Full Expert team")
                            return render_template("update_enterprise.html")
                    elif file and allowed_file(file.filename):
                        filename = secure_filename(str(uuid.uuid1()) + '_' + file.filename)
                        file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
                        try:
                            logo = filename
                            cur.execute(
                                f"UPDATE enterprises "
                                f"SET "
                                f"nom_enterprise = '{nom_enterprise}', enterprise_tel = {enterprise_tel}, email_enterprise = '{email_enterprise}', url = '{url}',location = '{location}',enterprise_desc = '{enterprise_desc}',google_map = '{google_map}', logo = '{logo}'"
                                f"WHERE enterprises.id_user={id_user};",
                                )
                            mysql.connection.commit()
                            flash('You have successfully edited your enterprise! NGALI, the Full Expert team')
                            posts = Enterprises.query.order_by(Enterprises.id)
                            return render_template("update_enterprise.html", posts=posts, filename=filename)
                        except TypeError:
                            flash(
                                "Sorry! There is no account with this user email, the enterprise email must be the email you used in creating your account. However, if you must use this email, you have to create a different account with it! NGALI, the Full Expert team")
                            return render_template("update_enterprise.html")
                    else:
                        flash('allowed images types are png, jpeg, gif ,jpg.')
                        return render_template('update_enterprise.html')
                return render_template('update_enterprise.html')
            except TypeError:
                flash("Sorry! you cannot update this enterprise because, no enterprise exist with this enterprise email.However, if you must use this email, you have to create a different account with it NGALI, the Full Expert team")
                return render_template('update_enterprise.html')
        return render_template('update_enterprise.html')



# kyc de full experts beginning
#the beggining of app content
class User(db.Model):
    __tablename__ = 'userss'
    id = db.Column('id', db.Integer, primary_key=True)
    fullname = db.Column(db.String(100), nullable=False)
    username = db.Column(db.String(50), nullable=False)
    email = db.Column(db.String(100), nullable=False, unique=True)
    password = db.Column(db.String(300), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())
    key_id = db.Column(db.String(100), nullable=False)

    def __init__(self, fullname, username, email, password, date, key_id):
        self.fullname = fullname
        self.username = username
        self.email = email
        self.password = password
        self.date = date
        self.key_id = key_id
class Data(db.Model):
    __tablename__ = 'kyc'
    id = db.Column('kyc_id', db.Integer, primary_key=True)

    nom = db.Column(db.String(120), nullable=False)
    email = db.Column(db.String(120), unique=False, nullable=False)
    pays = db.Column(db.String(200), nullable=False)
    telephone = db.Column(db.Integer(), nullable=False)
    ville = db.Column(db.String(100), nullable=False)
    secteur = db.Column(db.String(200), nullable=True)
    other_sector = db.Column(db.String(200), nullable=True)
    have_company = db.Column(db.String(500), nullable=True)
    have_no_company = db.Column(db.String(500), nullable=True)
    problem = db.Column(db.String(1500), nullable=True)
    date = db.Column(db.DateTime, default=datetime.utcnow())
    id_user = db.Column(Integer, ForeignKey("userss.id", ondelete="CASCADE"))

    def __init__(self, nom, email, pays, telephone, ville, secteur, other_sector, have_company, have_no_company,
                 problem, date, id_user):
        self.nom = nom
        self.email = email
        self.pays = pays
        self.telephone = telephone
        self.ville = ville
        self.secteur = secteur
        self.other_sector = other_sector
        self.have_company = have_company
        self.have_no_company = have_no_company
        self.problem = problem
        self.date = date
        self.id_user = id_user


@app.route("/success", methods=['POST', 'GET'])
def success():
    # cursor = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
    cur = mysql.connection.cursor()
    if request.method == 'POST':
        nom = request.form["nom"]
        email = request.form["address_mail"]
        pays = request.form["pays"]
        telephone = request.form["telephone"]
        ville = request.form["ville"]
        secteur = request.form['secteurs']
        other_sector = request.form['no_sector']
        have_company = request.form['yes']
        have_no_company = request.form['no']
        problem = request.form['problem']
        date = datetime.utcnow()
        if len(telephone) != 9:
            flash("Please fill in a correct phone number")
            return render_template("kyc.html")
        cur.execute(f"SELECT userss.id FROM userss WHERE userss.email='{email}'")
        try:
            id_user = cur.fetchone()[0]
            data = Data(nom, email, pays, telephone, ville, secteur, other_sector, have_company,
                        have_no_company, problem, date, id_user)
            db.session.add(data)
            db.session.commit()
            flash("Your form has been submitted successfully! NGALI, the Full Expert team")
            return render_template("kyc.html")
        except TypeError:
            flash("Sorry! There is no account with this email, the email you put must be the email you used in creating your account! NGALI, the Full Expert team")
            flash('Or you can verify the information and try submitting again')
            return render_template("kyc.html")
class Enterprises(db.Model):
    __tablename__ = 'enterprises'
    id = db.Column('enterprise_id', db.Integer, primary_key=True)
    nom_enterprise = db.Column(db.String(200), nullable=False)
    enterprise_tel = db.Column(db.Integer(), nullable=False)
    email_enterprise = db.Column(db.String(100), unique=True)
    url = db.Column(db.String(500), nullable=True)
    location = db.Column(db.String(500), nullable=False)
    enterprise_desc = db.Column(db.String(1000), nullable=False)
    google_map = db.Column(db.String(1000), nullable=True)
    date = db.Column(db.DateTime, default=datetime.utcnow())
    id_user = db.Column(Integer, ForeignKey("userss.id", ondelete="CASCADE"))
    logo = db.Column(db.String(100), nullable=True, default='default.PNG')

    def __init__(self, nom_enterprise, enterprise_tel, email_enterprise, url, location, enterprise_desc, google_map,
                 date, id_user,logo):
        # self.enterprise_id = enterprise_id
        self.nom_enterprise = nom_enterprise
        self.enterprise_tel = enterprise_tel
        self.email_enterprise = email_enterprise
        self.url = url
        self.location = location
        self.enterprise_desc = enterprise_desc
        self.google_map = google_map
        self.date = date
        self.id_user = id_user
        self.logo = logo

ALLOWED_EXTENSIONS = set(['png','jpg','jpeg', 'gif'])

def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS


# enterprise creation function
@app.route("/search", methods=['POST', 'GET'])
def search():
    global email_enterprise
    global filename
    # cursor = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
    cur = mysql.connection.cursor()
    if request.method == 'POST':
        nom_enterprise = request.form["nom_enterprise"]
        nom_enterprise = nom_enterprise.upper()
        enterprise_tel = request.form["enterprise_tel"]
        email_enterprise = request.form["email_enterprise"]
        url = request.form["url"]
        location = request.form["location"]
        enterprise_desc = request.form['enterprise_desc']
        google_map = request.form['google_map']
        date = datetime.utcnow()
        file = request.files['file']
        cur.execute(f"SELECT enterprises.enterprise_id FROM enterprises WHERE enterprises.email_enterprise='{email_enterprise}'")
        test = cur.fetchone()
        if test:
            flash("Sorry! You can only create one enterprise with this email. If you must register another enterprise, you have to create a different account with a different email. NGALI, the Full Expert team")
            return render_template('register_enterprise.html')
        if len(enterprise_tel) != 9:
            flash("Please fill in a correct phone number")
            return render_template('register_enterprise.html')
        cur.execute(f"SELECT userss.id FROM userss WHERE userss.email='{email_enterprise}'")
        if file.filename == '':
            flash('Did not include any logo')
            try:
                logo = 'default.PNG'
                id_user = cur.fetchone()[0]
                data = Enterprises(nom_enterprise, enterprise_tel, email_enterprise, url, location, enterprise_desc,
                                   google_map, date, id_user, logo)
                db.session.add(data)
                db.session.commit()
                flash(" You have successfully registered an enterprise! NGALI, the Full Expert team")
                return render_template("register_enterprise.html")
            except TypeError:
                flash(
                    "Sorry! There is no account with this user email, the enterprise email must be the email you used in creating your account. However, if you must use this email, you have to create a different account with it! NGALI, the Full Expert team")
                return render_template("register_enterprise.html")
        elif file and allowed_file(file.filename):
            filename = secure_filename(str(uuid.uuid1()) + '_' + file.filename)
            file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
            try:
                logo = filename
                id_user = cur.fetchone()[0]
                data = Enterprises(nom_enterprise, enterprise_tel, email_enterprise, url, location, enterprise_desc,
                                   google_map, date, id_user, logo)
                db.session.add(data)
                db.session.commit()
                print('comments')
                flash(" You have successfully registered an enterprise! NGALI, the Full Expert team")
                return render_template("register_enterprise.html", filename=filename)
            except TypeError:
                flash(
                    "Sorry! There is no account with this user email, the enterprise email must be the email you used in creating your account. However, if you must use this email, you have to create a different account with it! NGALI, the Full Expert team")
                return render_template("register_enterprise.html")
        else:
            flash('allowed images types are png, jpeg, gif ,jpg.')
            return render_template('register_enterprise.html')
    # enterprise creation function

# message class and function
class Message(db.Model):
    __tablename__ = 'messages'
    id = db.Column('id', db.Integer, primary_key=True)
    name = db.Column(db.String(100))
    email = db.Column(db.String(100), unique=False)
    messages = db.Column(db.String(1000))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, name, email, messages, date):
        self.name = name
        self.email = email
        self.messages = messages
        self.date = date


@app.route("/messages", methods=['POST', 'GET'])
def messages():
    if request.method == 'POST':
        name = request.form['n']
        email = request.form['email']
        messages = request.form['m']
        date = datetime.utcnow()

        data = Message(name, email, messages, date)
        db.session.add(data)
        db.session.commit()
        flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("success.html")
# message class and function


# different contexte and services class and function
class ChercherIdee(db.Model):
    __tablename__ = 'chercher_idee'
    id = db.Column('id', db.Integer, primary_key=True)
    context_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, context_number, name, email, telephone, date):
        self.context_number = context_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/chercherIdee", methods=['POST', 'GET'])
def chercherIdee():
    if request.method == 'POST':
        context_number = 'Context 1'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = ChercherIdee(context_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        flash("Thank you, the form was successfully submitted!")
    flash("Sorry, check your credentials and submit again!")
    return render_template("success.html")


class AvezIdee(db.Model):
    __tablename__ = 'avez_idee'
    id = db.Column('id', db.Integer, primary_key=True)
    context_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, context_number, name, email, telephone, date):
        self.context_number = context_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/avezIdee", methods=['POST', 'GET'])
def avezIdee():
    if request.method == 'POST':
        context_number = 'Context 2'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = AvezIdee(context_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")


class IdeeArgent(db.Model):
    __tablename__ = 'idee_argent'
    id = db.Column('id', db.Integer, primary_key=True)
    context_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, context_number, name, email, telephone, date):
        self.context_number = context_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/ideeArgent", methods=['POST', 'GET'])
def ideeArgent():
    if request.method == 'POST':
        context_number = 'Context 3'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = IdeeArgent(context_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")


class RealiserProjet(db.Model):
    __tablename__ = 'realiser_projet'
    id = db.Column('id', db.Integer, primary_key=True)
    context_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, context_number, name, email, telephone, date):
        self.context_number = context_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/realiserProjet", methods=['POST', 'GET'])
def realiserProjet():
    if request.method == 'POST':
        context_number = 'Context 4'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = RealiserProjet(context_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        # flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")


class RealiserIdee(db.Model):
    __tablename__ = 'realiser_idee'
    id = db.Column('id', db.Integer, primary_key=True)
    context_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, context_number, name, email, telephone, date):
        self.context_number = context_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/realiserIdee", methods=['POST', 'GET'])
def realiserIdee():
    if request.method == 'POST':
        context_number = 'Context 5'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = RealiserIdee(context_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        # flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")


class MontageProjet(db.Model):
    __tablename__ = 'montage_projet'
    id = db.Column('id', db.Integer, primary_key=True)
    Service_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, Service_number, name, email, telephone, date):
        self.Service_number = Service_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/montageProjet", methods=['POST', 'GET'])
def montageProjet():
    if request.method == 'POST':
        Service_number = 'Service 1'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = MontageProjet(Service_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        # flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")


class EtudeMarche(db.Model):
    __tablename__ = 'etude_marche'
    id = db.Column('id', db.Integer, primary_key=True)
    Service_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, Service_number, name, email, telephone, date):
        self.Service_number = Service_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/etudeMarche", methods=['POST', 'GET'])
def etudeMarche():
    if request.method == 'POST':
        Service_number = 'Service 2'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = EtudeMarche(Service_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        # flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")


class Marketing(db.Model):
    __tablename__ = 'marketing'
    id = db.Column('id', db.Integer, primary_key=True)
    Service_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, Service_number, name, email, telephone, date):
        self.Service_number = Service_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/marketing", methods=['POST', 'GET'])
def marketing():
    if request.method == 'POST':
        Service_number = 'Service 3'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = Marketing(Service_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        # flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")


class Formation(db.Model):
    __tablename__ = 'formation'
    id = db.Column('id', db.Integer, primary_key=True)
    Service_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, Service_number, name, email, telephone, date):
        self.Service_number = Service_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/formation", methods=['POST', 'GET'])
def formation():
    if request.method == 'POST':
        Service_number = 'Service 4'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = Formation(Service_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        # flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")


class Doctoral(db.Model):
    __tablename__ = 'doctoral'
    id = db.Column('id', db.Integer, primary_key=True)
    Service_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, Service_number, name, email, telephone, date):
        self.Service_number = Service_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/doctoral", methods=['POST', 'GET'])
def doctoral():
    if request.method == 'POST':
        Service_number = 'Service 5'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = Doctoral(Service_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        # flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")


class Risk(db.Model):
    __tablename__ = 'risk'
    id = db.Column('id', db.Integer, primary_key=True)
    Service_number = db.Column(db.String(20))
    name = db.Column(db.String(200))
    email = db.Column(db.String(200), unique=False)
    telephone = db.Column(db.Integer(), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, Service_number, name, email, telephone, date):
        self.Service_number = Service_number
        self.name = name
        self.email = email
        self.telephone = telephone
        self.date = date


@app.route("/risk", methods=['POST', 'GET'])
def risk():
    if request.method == 'POST':
        Service_number = 'Service 6'
        name = request.form['name']
        email = request.form['email']
        telephone = request.form['telephone']
        date = datetime.utcnow()

        data = Risk(Service_number, name, email, telephone, date)
        db.session.add(data)
        db.session.commit()
        # flash("Thank you, the form was successfully submitted!")
        return render_template("success.html")
    flash("Sorry, check your credentials and submit again!")
    return render_template("main_home.html")
# different contexte and services class and function

# loading enterprise registration page after login
@app.route("/register_enterprise", methods=['POST', 'GET'])
def register_enterprise():
    # Check if user is loggedin
    if 'loggedin' in session:
        # User is loggedin show them the home page
        return render_template('register_enterprise.html')
    # User is not loggedin redirect to login page
    return redirect(url_for('login'))
# loading enterprise registration page after login

# loading kyc page after login
@app.route("/kyc", methods=['POST', 'GET'])
def kyc():
    # Check if user is loggedin
    if 'loggedin' in session:
        # User is loggedin show them the home page
        return render_template('kyc.html')
    # User is not loggedin redirect to login page
    return redirect(url_for('login'))
# loading kyc page after login
#create enterprise ending



#search engine beggining

@app.route('/searches')
def searches():
    commen = Comments.query.all()
    q = request.args.get('q')
    if q:
        qq= q.upper()
        posts = Enterprises.query.filter(Enterprises.nom_enterprise.contains(qq) | Enterprises.enterprise_desc.contains(q)| Enterprises.location.contains(q))
        return render_template('searched.html', posts=posts, commen=commen)
    else:
        postss = Enterprises.query.all()
        page = request.args.get('page', 1, type=int)
        per_page = 2
        start = (page - 1)*per_page
        end = start + per_page
        total_pages = (len(postss) + per_page-1)//per_page
        posts = postss[start:end]
        return render_template('search.html',page=page, posts=posts, commen=commen, total_pages=total_pages)


@app.route('/search_bar')
def search_bar():
    commen = Comments.query.all()
    q = request.args.get('q')
    if q:
        qq= q.upper()
        posts = Enterprises.query.filter(Enterprises.nom_enterprise.contains(qq) | Enterprises.enterprise_desc.contains(q)| Enterprises.location.contains(q))
        s = posts.count()
        return render_template('individual_search.html', posts=posts, commen=commen, s=s)
    else:
        postss = Enterprises.query.all()
        page = request.args.get('page', 1, type=int)
        per_page = 8
        start = (page - 1)*per_page
        end = start + per_page
        total_pages = (len(postss) + per_page-1)//per_page
        posts = postss[start:end]
        s = Enterprises.query.count()

        return render_template('enterprise-list.html',page=page, posts=posts, commen=commen,s=s, total_pages=total_pages)


@app.route('/search_enterprise_list', methods=['POST', 'GET'])
def search_enterprise_list():
    if request.method == 'POST':
        q = request.form['q1']
        if q:
            qq = q.upper()
            posts = Enterprises.query.filter(
                Enterprises.nom_enterprise.contains(qq) | Enterprises.enterprise_desc.contains(
                    q) | Enterprises.location.contains(q))
            s = posts.count()
            # page = request.args.get('page', 1, type=int)
            # per_page = 1
            # start = (page - 1) * per_page
            # end = start + per_page
            # total_pages = (s + per_page - 1) // per_page
            # post = posts[start:end]
            # return render_template('enterprise-list.html', page=page, posts=posts,
            #                        total_pages=total_pages)
            return render_template('search-enterprise-list.html', posts=posts, s=s)
    # return render_template('search-enterprise-list.html')

@app.route('/client_request_to_add', methods=['POST', 'GET'])
def client_request_to_add():
    return render_template('enterprise_register_by_admin.html')

@app.route('/buy_pub_space', methods=['POST', 'GET'])
def buy_pub_space():
    return render_template('buy_pub_space.html')

@app.route('/details_on_enterprises/<int:id>')
def details_on_enterprises(id):
    post = Enterprises.query.get_or_404(id)
    return render_template('details_on_enterprises.html', post=post)


@app.route('/imobilier', methods=['POST', 'GET'])
def imobilier():
    q = 'immobilière'
    posts = Enterprises.query.filter(Enterprises.enterprise_desc.contains(q))
    s = posts.count()
    # return render_template('enterprise-list.html', page=page, posts=posts,
    #                        total_pages=total_pages)
    return render_template('search_by_sector.html', posts=posts, s=s)


@app.route('/hôtellerie', methods=['POST', 'GET'])
def hôtellerie():
    q = 'hôtellerie'
    posts = Enterprises.query.filter(Enterprises.enterprise_desc.contains(q))
    s = posts.count()
    # return render_template('enterprise-list.html', page=page, posts=posts,
    #                        total_pages=total_pages)
    return render_template('search_by_sector.html', posts=posts, s=s)


@app.route('/banque_et_micro_finance', methods=['POST', 'GET'])
def banque_et_micro_finance():
    q = 'banque et micro finance'
    posts = Enterprises.query.filter(Enterprises.enterprise_desc.contains(q))
    s = posts.count()
    # return render_template('enterprise-list.html', page=page, posts=posts,
    #                        total_pages=total_pages)
    return render_template('search_by_sector.html', posts=posts, s=s)


@app.route('/enterprise_register_by_admin', methods=['POST', 'GET'])
def enterprise_register_by_admin():
    cur = mysql.connection.cursor()
    if request.method == 'POST':
        nom_enterprise = request.form["enterpriseName"]
        fullname = request.form["name"]
        username = request.form["username"]
        password = request.form['password']
        nom_enterprise = nom_enterprise.upper()
        enterprise_tel = request.form["tel"]
        email_enterprise = request.form["email"]
        url = request.form["url"]
        location = request.form["location"]
        enterprise_desc = request.form['description']
        google_map = request.form['map']
        date = datetime.utcnow()
        file = request.files['image']
        _hashed_password = generate_password_hash(password)

        data = User(fullname, username, email_enterprise, _hashed_password,date, password)
        db.session.add(data)
        db.session.commit()
        flash("user successfully created")

        cur.execute(
            f"SELECT enterprises.enterprise_id FROM enterprises WHERE enterprises.email_enterprise='{email_enterprise}'")
        test = cur.fetchone()
        if test:
            flash(
                "Sorry! You can only create one enterprise with this email. If you must register another enterprise, you have to create a different account with a different email. NGALI, the Full Expert team")
            return render_template('enterprise_register_by_admin.html')
        if len(enterprise_tel) != 9:
            flash("Please fill in a correct phone number")
            return render_template('enterprise_register_by_admin.html')
        cur.execute(f"SELECT userss.id FROM userss WHERE userss.email='{email_enterprise}'")
        if file.filename == '':
            flash('Did not include any logo')
            try:
                logo = 'default.PNG'
                id_user = cur.fetchone()[0]
                data = Enterprises(nom_enterprise, enterprise_tel, email_enterprise, url, location, enterprise_desc,
                                   google_map, date, id_user, logo)
                db.session.add(data)
                db.session.commit()
                flash(" You have successfully registered an enterprise! NGALI, the Full Expert team")
                return render_template("enterprise_register_by_admin.html")
            except TypeError:
                flash(
                    "Sorry! There is no account with this user email, the enterprise email must be the email you used in creating your account. However, if you must use this email, you have to create a different account with it! NGALI, the Full Expert team")
                return render_template("enterprise_register_by_admin.html")
        elif file and allowed_file(file.filename):
            filename = secure_filename(str(uuid.uuid1()) + '_' + file.filename)
            file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
            try:
                logo = filename
                id_user = cur.fetchone()[0]
                data = Enterprises(nom_enterprise, enterprise_tel, email_enterprise, url, location, enterprise_desc,
                                   google_map, date, id_user, logo)
                db.session.add(data)
                db.session.commit()
                print('comments')
                flash(" You have successfully registered an enterprise! NGALI, the Full Expert team")
                return render_template("enterprise_register_by_admin.html", filename=filename)
            except TypeError:
                flash(
                    "Sorry! There is no account with this user email, the enterprise email must be the email you used in creating your account. However, if you must use this email, you have to create a different account with it! NGALI, the Full Expert team")
                return render_template("enterprise_register_by_admin.html")
        else:
            flash('allowed images types are png, jpeg, gif ,jpg.')
            return render_template('enterprise_register_by_admin.html')
    return render_template('enterprise_register_by_admin.html')






# admin session
@app.route('/user_admin',methods=['POST', 'GET'])
def user_admin():
    if 'loggedin' in session:
        user = User.query.all()
        return render_template('users.html', user=user)

@app.route('/enterprise_admin',methods=['POST', 'GET'])
def enterprise_admin():
    if 'loggedin' in session:
        enterprise = Enterprises.query.all()
        return render_template('enterprise_admin.html', enterprise=enterprise)
    # User is not loggedin redirect to login page
    return redirect(url_for('admin'))

@app.route('/kyc_admin',methods=['POST', 'GET'])
def kyc_admin():
    if 'loggedin' in session:
        kyc = Data.query.all()
        return render_template('kyc_admin.html', kyc=kyc)
    # User is not loggedin redirect to login page
    return redirect(url_for('admin'))

# context function
@app.route('/context_admin',methods=['POST', 'GET'])
def context_admin():
    if 'loggedin' in session:
        chercherIdee = ChercherIdee.query.all()
        avezIdee = AvezIdee.query.all()
        ideeArgent = IdeeArgent.query.all()
        realiserProjet = RealiserProjet.query.all()
        realiserIdee = RealiserIdee.query.all()
        return render_template('context_admin.html',
                               chercherIdee=chercherIdee,
                               avezIdee=avezIdee,
                               ideeArgent=ideeArgent,
                               realiserProjet=realiserProjet,
                               realiserIdee=realiserIdee)
    # User is not loggedin redirect to login page
    return redirect(url_for('admin'))


@app.route('/service_admin',methods=['POST', 'GET'])
def service_admin():
    if 'loggedin' in session:
        montageProjet = MontageProjet.query.all()
        etudeMarche = EtudeMarche.query.all()
        marketing = Marketing.query.all()
        formation = Formation.query.all()
        doctoral = Doctoral.query.all()
        risk = Risk.query.all()
        return render_template('service_admin.html',
                               montageProjet=montageProjet,
                               etudeMarche=etudeMarche,
                               marketing=marketing,
                               formation=formation,
                               doctoral=doctoral,
                               risk=risk)
    # User is not loggedin redirect to login page
    return redirect(url_for('admin'))

@app.route('/comment_admin',methods=['POST', 'GET'])
def comment_admin():
    if 'loggedin' in session:
        comment_admin = Comments.query.all()
        return render_template('comment_admin.html', comment_admin=comment_admin)
    # User is not loggedin redirect to login page
    return redirect(url_for('admin'))

@app.route('/message_admin',methods=['POST', 'GET'])
def message_admin():
    if 'loggedin' in session:
        messages = Message.query.all()
        return render_template('message_admin.html', messages=messages)
    # User is not loggedin redirect to login page
    return redirect(url_for('admin'))

@app.route('/publicity_admin',methods=['POST', 'GET'])
def publicity_admin():
    if 'loggedin' in session:
        # User is loggedin show them the home page
        return render_template('publicity_admin.html')
    # User is not loggedin redirect to login page
    return redirect(url_for('admin'))


if __name__ == "__main__":
    app.run(debug=True)