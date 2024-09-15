

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
import smtplib
from email.mime.text import MIMEText
from flask_login import current_user, login_user,UserMixin, LoginManager, logout_user, login_required
from flask_wtf import FlaskForm
from wtforms import StringField, SubmitField, PasswordField, BooleanField, ValidationError
from wtforms.validators import DataRequired,EqualTo, Length
password = 'khabeer@123abdu'


# seats = "https://dxbooking.ethiopianairlines.com/dx/ETDX/#/confirmation"

app = Flask(__name__)
app.secret_key = 'cairocoders-ednalan'
UPLOAD_FOLDER = 'static/upload_cv'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
app.config['MAX_CONTENT_LENGTH'] = 16 * 1024 * 1024
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+pymysql://root:@localhost/full_expert2'

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'full_expert2'

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


@app.route('/full_service')
def full_service():
    return render_template('full_service.html')


@app.route('/pour_quoi_nous')
def pour_quoi_nous():
    return render_template('pour_quoi_nous.html')


@app.route('/qui_sommes_nous')
def qui_sommes_nous():
    return render_template('qui_sommes_nous.html')


@app.route('/full_contact')
def full_contact():
    return render_template('full_contact.html')


class ExpertiseForm(db.Model):
    __tablename__ = 'expertise'
    id = db.Column('id', db.Integer, primary_key=True)
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, fullname, phone, email, message, date):
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/expertise_form', methods=['GET', 'POST'])
def expertise_form():
    if request.method == 'POST':
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        expertise_form = ExpertiseForm(fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(expertise_form)
        db.session.commit()
        return render_template("success.html")
    return render_template('main_home.html')


class IntegrateEquipe(db.Model):
    __tablename__ = 'integrate_equipe'
    id = db.Column('id', db.Integer, primary_key=True)
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    domain = db.Column(db.String(500))
    cv = db.Column(db.String(100))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, fullname, phone, email, domain, cv, date):
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.domain = domain
        self.cv = cv
        self.date = date


ALLOWED_EXTENSIONS = set(['png','jpg','jpeg', 'gif','pdf'])


def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS


@app.route('/integrate_equipe', methods=['GET', 'POST'])
def integrate_equipe():
    if request.method == 'POST':
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        domain = request.form['domain']
        cv1 = request.files['cv']
        date = datetime.utcnow()

        if cv1 and allowed_file(cv1.filename):
            filename = secure_filename(str(uuid.uuid1()) + '_' + cv1.filename)
            cv1.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
            cv = cv1.filename

            multiple_service = IntegrateEquipe(fullname=fullname, phone=phone, email=email, domain=domain, cv=cv, date=date)

            db.session.add(multiple_service)
            db.session.commit()
        return render_template("success.html")
    return render_template('main_home.html')


class ContactRapid(db.Model):
    __tablename__ = 'contact_rapid'
    id = db.Column('id', db.Integer, primary_key=True)
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, fullname, phone, email, date):
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.date = date


@app.route('/contact_rapid', methods=['GET', 'POST'])
def contact_rapid():
    if request.method == 'POST':
        fullname = request.form['nom']
        email = request.form['email']
        phone = request.form['phone']
        date = datetime.utcnow()

        contact_rapid = ContactRapid(fullname=fullname, phone=phone, email=email, date=date)

        db.session.add(contact_rapid)
        db.session.commit()

        return render_template("success.html")
    return render_template('main_home.html')


def send_email(receiver_email, subject, message):
    myEmail = "fullexperts@gmail.com"
    smtp_server = "smtp.gmail.com"
    smtp_port = 587
    app_pass = "wlnpzvixdtdsqmix"
    msg = MIMEText(f"{message}")
    msg['Subject'] = f"{subject}"
    msg['From'] = myEmail
    msg['To'] = receiver_email

    server = smtplib.SMTP(smtp_server, smtp_port)
    server.starttls()
    server.login(myEmail, app_pass)
    server.send_message(msg)

# ################## service domain starts here  ########################

class CollecteData(db.Model):
    __tablename__ = 'collect_data'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/collect_data', methods=['GET', 'POST'])
def collect_data():
    if request.method == 'POST':
        service_type = 'Collecte & analyse des données '
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        collect_data = CollecteData(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(collect_data)
        db.session.commit()
        return render_template("success.html")
    return render_template('full_service.html')


class MontageProjets(db.Model):
    __tablename__ = 'montage_projets'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/montage_projets', methods=['GET', 'POST'])
def montage_projets():
    if request.method == 'POST':
        service_type = 'Montage des projets'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        montage_projets = MontageProjets(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(montage_projets)
        db.session.commit()
        return render_template("success.html")
    return render_template('full_service.html')


class Conseils(db.Model):
    __tablename__ = 'conseil'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/conseil', methods=['GET', 'POST'])
def conseil():
    if request.method == 'POST':
        service_type = 'Conseils & accompagnement'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        conseil = Conseils(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(conseil)
        db.session.commit()
        return render_template("success.html")
    return render_template('full_service.html')


class Formation(db.Model):
    __tablename__ = 'formation'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/formation', methods=['GET', 'POST'])
def formation():
    if request.method == 'POST':
        service_type = 'Formation & éducation'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        formation = Formation(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(formation)
        db.session.commit()
        return render_template("success.html")
    return render_template('full_service.html')


class Marketing(db.Model):
    __tablename__ = 'marketing'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/marketing', methods=['GET', 'POST'])
def marketing():
    if request.method == 'POST':
        service_type = 'Marketing & communication'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        marketing = Marketing(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(marketing)
        db.session.commit()
        return render_template("success.html")
    return render_template('full_service.html')


class Application(db.Model):
    __tablename__ = 'application'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/application', methods=['GET', 'POST'])
def application():
    if request.method == 'POST':
        service_type = 'Développement Web & Application'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        application = Application(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(application)
        db.session.commit()
        return render_template("success.html")
    return render_template('full_service.html')


class Batiments(db.Model):
    __tablename__ = 'batiments'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/batiment', methods=['GET', 'POST'])
def batiment():
    if request.method == 'POST':
        service_type = 'Bâtiments & Travaux Publics'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        batiment = Batiments(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(batiment)
        db.session.commit()
        return render_template("success.html")
    return render_template('full_service.html')


class QHSE(db.Model):
    __tablename__ = 'qhse'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/qhse', methods=['GET', 'POST'])
def qhse():
    if request.method == 'POST':
        service_type = 'Qualité, Hygiène, Sécurité, Environnement(QHSE)'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        qhse = QHSE(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(qhse)
        db.session.commit()
        return render_template("success.html")
    return render_template('full_service.html')


class Comptabilite(db.Model):
    __tablename__ = 'comptabilite'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/comptabilite', methods=['GET', 'POST'])
def comptabilite():
    if request.method == 'POST':
        service_type = 'Comptabilité et Finance'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        comptabilite = Comptabilite(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(comptabilite)
        db.session.commit()
        return render_template("success.html")
    return render_template('full_service.html')


class Assurance(db.Model):
    __tablename__ = 'assurance'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/assurance', methods=['GET', 'POST'])
def assurance():
    if request.method == 'POST':
        service_type = 'Assurance & Santé'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        assurance = Assurance(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message, date=date)

        db.session.add(assurance)
        db.session.commit()

        return render_template("success.html")
    return render_template('full_service.html')


class Hotels(db.Model):
    __tablename__ = 'hotel'
    id = db.Column('id', db.Integer, primary_key=True)
    service_type = db.Column(db.String(100))
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    message = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, service_type, fullname, phone, email, message, date):
        self.service_type = service_type
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.message = message
        self.date = date


@app.route('/hotel', methods=['GET', 'POST'])
def hotel():
    if request.method == 'POST':
        service_type = 'Hôtels & Tourisme'
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        message = request.form['message']
        date = datetime.utcnow()

        hotel = Hotels(service_type=service_type, fullname=fullname, phone=phone, email=email, message=message,
                              date=date)

        db.session.add(hotel)
        db.session.commit()

        return render_template("success.html")
    return render_template('full_service.html')


####################### end  of service area here###################


class ContactUs(db.Model):
    __tablename__ = 'contact_us'
    id = db.Column('id', db.Integer, primary_key=True)
    fullname = db.Column(db.String(100))
    phone = db.Column(db.String(100))
    email = db.Column(db.String(100))
    content = db.Column(db.String(500))
    text = db.Column(db.String(500))
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, fullname, phone, email, content, text, date):
        self.fullname = fullname
        self.phone = phone
        self.email = email
        self.content = content
        self.text = text
        self.date = date


@app.route('/contact_us', methods=['GET', 'POST'])
def contact_us():
    if request.method == 'POST':
        fullname = request.form['name']
        phone = request.form['phone']
        email = request.form['email']
        content = request.form['content']
        text = request.form['text']
        date = datetime.utcnow()

        contact_us = ContactUs(fullname=fullname, phone=phone, email=email, content=content, text=text, date=date)

        db.session.add(contact_us)
        db.session.commit()

        return render_template("success.html")
    return render_template('full_service.html')


####################### admin section begin  ###########################################

@app.route('/dashboard_user', methods=['GET', 'POST'])
@login_required
def dashboard_user():
    id = current_user.id
    user_profile = User.query.all()
    return render_template('dashboard_user.html', user_profile=user_profile, id=id)


class User(db.Model, UserMixin):
    __tablename__ = 'admin'
    id = db.Column('id', db.Integer, primary_key=True)
    fullname = db.Column(db.String(100), nullable=False)
    username = db.Column(db.String(50), nullable=False)
    email = db.Column(db.String(100), nullable=False, unique=True)
    password = db.Column(db.String(300), nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow())

    def __init__(self, fullname, username, email, password, date):
        self.fullname = fullname
        self.username = username
        self.email = email
        self.password = password
        self.date = date


login_manager = LoginManager()
login_manager.init_app(app)
login_manager.login_view = 'login'


@login_manager.user_loader
def load_user(user_id):
    return User.query.get(int(user_id))


class LoginForm(FlaskForm):
    username = StringField("username", validators=[DataRequired()])
    password = PasswordField("password", validators=[DataRequired()])
    submit = SubmitField('submit')


@app.route('/login/', methods=['GET', 'POST'])
def login():
    form = LoginForm()
    if form.validate_on_submit():
        user = User.query.filter_by(username=form.username.data).first()
        if user:
            if check_password_hash(user.password, form.password.data):
                login_user(user)
                return redirect(url_for('dashboard_user'))
            else:
                flash("Sorry! wrong password or username")
        else:
            flash("Sorry! this user does not exist")
    return render_template('full_login_admin.html', form=form)


#account creation function for admin
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
        cur.execute('SELECT * FROM admin WHERE username = %s', (username,))
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
            cur.execute("INSERT INTO admin (fullname, username, password, email,date) VALUES (%s,%s,%s,%s,%s)",
                           (fullname, username, _hashed_password, email,date))
            mysql.connection.commit()
            receiver_mail = email
            subject = "Acknowledgement from full experts consulting"
            message = f"""
            Hi {fullname}!
             Your account has been successfully created.

            You can now log into your acount.

            In your account, you will be able to:

            - Register an enterprise (Note that only one enterprise can be registered with a given email address and the email of the enterprise must be the email you use in creating your account. However, if you must use another email to register an enterprise, you must create a different account with it.)
            - Edit this enterprise
            - Edit your account
            - Fill a know your client info form
            - publish advertisements (These are services you want people connected to this app to do for you. For example, you might need someone to assist you, make your publicity yourself or post anything that the public will like to see and contact you. This is a great opportunity for you to show your enterprise to the world)


            This is an automated email sent by a bot. You can respond to it if you wish.

            Thanks for trusting us, and we are opened to answer all your questions

            Best regards,
            Ngali, The full experts teams

            Bounamousadi, Douala Cameroon
            consulting@fullexpert.com
            ngaliabiru@gmail.com

            """
            try:
                send_email(receiver_email=receiver_mail, message=message, subject=subject)
            except smtplib.SMTPConnectError:
                pass
            flash('You have successfully registered!')
    elif request.method == 'POST':
        # Form is empty... (no POST data)
        flash('Please fill out the form!')
    # Show registration form with message (if any)
    return render_template('register.html')


@app.route('/sign_up')
def sign_up():
    return render_template('register.html')


@app.route('/new_register_enterprise')
@login_required
def new_register_enterprise():
    pass


@app.route('/edit_account',methods=['GET', 'POST'])
def edit_account():
    pass


@app.route('/edit_enterprise')
@login_required
def edit_enterprise():
    pass


@app.route('/new_kyc')
@login_required
def new_kyc():
    pass


@app.route('/post_annonce',methods=['GET', 'POST'])
@login_required
def post_annonce():
    pass


if __name__ == "__main__":
    app.run(debug=True)
