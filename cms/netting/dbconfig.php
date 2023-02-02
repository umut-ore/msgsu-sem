<?php

use PHPMailer\PHPMailer\PHPMailer;

date_default_timezone_set('Europe/Istanbul');
const DBHOST = "localhost";
const DBUSER = "";
const DBPWD = '';
const DBNAME = "";


const EMAIL_HOST = "";
const EMAIL_SMTPAuth = True;
const EMAIL_USERNAME = "";
const EMAIL_PASS = "";
const EMAIL_SMTP_PORT = 000;
const EMAIL_SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
const EMAIL_CHARSET = "UTF-8";


const recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";      //ReCaptcha URL
const recaptcha_secret = "";          //ReCaptcha SECRET