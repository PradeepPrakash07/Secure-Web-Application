
# Appointment booking app

This is an Appointment booking website. The website makes use of HTML, PHP , MySQL, CSS and Javascript.
## Hosting on local machine

[XAMPP](https://www.apachefriends.org/download.html)

To host the website on your own machine, download XAMPP. Rename ```webFiles``` folder to ```registration``` and copy the folder to ```XAMPP/htdocs/```. Start XAMPP using ```xampp_start.exe```. Go to any browser and in the address bar type ```localhost/registration```.
You will be greeted with the login/signup page.

### Database (MySQL server)

Navigate to ```xampp\mysql\data``` and copy the ```Database``` folder. You can see the database by navigating to ```localhost/phpmyadmin``` in a browser.

## Features of the application

### Main Website

#### Sign-in/Sign-up page

As soon as user accesses the webpage they will be directed to the signi-in/sign-up page. Here, if the user does not have an existing account then they can create one or can login to their existing account.

##### Signing up
The user has to provide 
- Full name - Which will be reflected on the bookings.
- Username -  Which will be used to identify the user. Username has to be unique.
- Email - User's email id. Email Id will be used for any type of communication. Users can also use their registered email id to login.
- Password - An appropriate password. Password is hashed before storing in the database.

##### Signing in
The use can provide username and password or email and password to log into their account.
If the correct credentials provided then the user will be greated by the bookings page of the website.

#### Bookings
A simple UI has been provided for the users to select their appointment date. If the user has any previous appointments then the `book` button will be disabled to prevent multiple bookings or accidental change of booking date.

##### Previous bookings
The users can access their previous bookings from the nav bar on the website. Here the user can choose to cancel or reschedule their appointment.

##### Edit profile
Incase of password reset, the users must immediately update their password. For this, and for changing their username and fullname an option has been provided in the ```Edit profile``` page of the webiste.

### Admin

An admin account is also set up which can be accessed by navigating to `localhost/registration/admin`. Here, the admin can view existing users and current bookings.

#### Resetting password

Admin can reset the password of a particular user on users request. Password is reset to `pass123` therefore the user must update their password after a reset. 

## Hosting on other servers

Incase the website is to be hosted in a separate server, then the address of database and other details should be changed in the `inc_dbHandler.php` file.
