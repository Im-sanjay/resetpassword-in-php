PHPMailer
PHPMailer - A full-featured email creation and transfer class for PHP
Build status: Build Status Scrutinizer Quality Score Code Coverage

Latest Stable Version Total Downloads Latest Unstable Version License API Docs

Class Features
Probably the world's most popular code for sending email from PHP!
Used by many open-source projects: WordPress, Drupal, 1CRM, SugarCRM, Yii, Joomla! and many more
Integrated SMTP support - send without a local mail server
Send emails with multiple To, CC, BCC and Reply-to addresses
Multipart/alternative emails for mail clients that do not read HTML email
Add attachments, including inline
Support for UTF-8 content and 8bit, base64, binary, and quoted-printable encodings
SMTP authentication with LOGIN, PLAIN, CRAM-MD5, and XOAUTH2 mechanisms over SSL and SMTP+STARTTLS transports
Validates email addresses automatically
Protect against header injection attacks
Error messages in over 50 languages!
DKIM and S/MIME signing support
Compatible with PHP 5.5 and later
Namespaced to prevent name clashes
Much more!
Why you might need it
Many PHP developers need to send email from their code. The only PHP function that supports this is mail(). However, it does not provide any assistance for making use of popular features such as encryption, authentication, HTML messages, and attachments.

Formatting email correctly is surprisingly difficult. There are myriad overlapping RFCs, requiring tight adherence to horribly complicated formatting and encoding rules – the vast majority of code that you'll find online that uses the mail() function directly is just plain wrong! Please don't be tempted to do it yourself – if you don't use PHPMailer, there are many other excellent libraries that you should look at before rolling your own. Try SwiftMailer, Zend/Mail, ZetaComponents etc.

The PHP mail() function usually sends via a local mail server, typically fronted by a sendmail binary on Linux, BSD, and macOS platforms, however, Windows usually doesn't include a local mail server; PHPMailer's integrated SMTP implementation allows email sending on Windows platforms without a local mail server.


Preserves full repo history of authors, commits and branches from the original SourceForge project.
