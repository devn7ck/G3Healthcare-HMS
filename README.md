# Healthcare E-application System
Healthcare E-application System using MySQL, Php and Bootstrap


## Prerequisites
1. Install XAMPP web server
2. Any Editor (Preferably VS Code)
3. Web browser (Preferably Chrome & Microsoft Edge)

## Languages and Technologies used
1. HTML5/CSS3
2. JavaScript (to create dynamically updating content)
3. Bootstrap (An HTML, CSS, and JS library)
4. XAMPP (A web server by Apache Friends)
5. Php
6. MySQL (An RDBMS that uses SQL)
7. TCPDF (to generate PDFs)
8. PHPMailer (to send email messages)

## Steps to run the project on a local computer
1. Download and install XAMPP in your machine
2. Download and install Microsoft Visual Studio Code
3. Extract all the files and move it to the 'htdocs' folder of your XAMPP directory.
4. Start the Apache and Mysql in your XAMPP control panel.
5. Open web browser and type 'localhost/phpmyadmin'
6. In phpmyadmin page, create a new database from the left panel and name it as 'hmsdb'
7. Import the file 'hmsdb.sql' inside your newly created database and click ok.
8. Open terminal in vscode and type in "npm install <package>". NB: <packages> are bootstrap, jquery, popper.js, sweetalert2.
9. Open a new tab and type 'localhost/www.G3Healthcare.com' in the url of your browser
10. Hurray! That's it!
    
### SOFTWARES USED
  - XAMPP was installed on the Windows 10 machine and APACHE2 Server and MySQL were initialized. And, files were built inside C://xampp/htdocs/www.G3Healthcare.com
  - Visual Studio Code was used as a text editor.
  - Microsoft Edge Version 112.0.1722.39 (Official build) (64-bit) was used to run the project (localhost/www.G3Healthcare.com was used as the url).
  

### Starting Apache And MySQL in XAMPP:
  The XAMPP Control Panel allows you to manually start and stop Apache and MySQL. To start Apache or MySQL manually, click the ‘Start’ button under ‘Actions’.
  
  
<p align="center"><img src=""></img></p>

## GETTING INTO THE PROJECT:
Healthcare E-application System in php and mysql. This system has a ‘Home’ page from where the patient, doctor & administrator can login into their accounts by toggling the tabs accordingly.



'SERVICES' page  allows us to get some more information about the quality and the services of the healthcare organisation.



‘Contact’ page allows users to provide feedback or queries about the services of the healthcare organisation. Fig 1.3 shows the ‘Contact’ page.



The ‘Home’ page consists of 3 modules:
1. Patient Module
2. Doctor Module
3. Admin Module

### Patient Module:

  &nbsp; &nbsp; &nbsp; This module allows patients to create their account, book an appointment to see a doctor and see their appointment history.
  The registration page(in the home page itself) asks patients to enter their First Name, Last Name, Email ID, Contact Number, Password and radio buttons to select their gender.
  


Once the patient has created his/her own account after clicking the ‘Register’ button, then he will be redirected to the Dashboard.



The Dashboard page allows patients to perform two operations:

**1. Book his/her appointment:**

  &nbsp; &nbsp; &nbsp; Here, the patients can able to book their appointments to see a doctor. The appointment form requires patients to select the doctor that they want to see, Date and Time that they want to meet with the doctor. The consultancy fee will be shown accordingly to the patient as it was already determined by the doctor.



After clicking on the ‘Create new entry’ button, the patient will receive an alert that acknowledges the successful appointment of the patient.



**2. View patients’ Appointment History:**

  &nbsp; &nbsp; &nbsp; Here, the patient can see their appointment history which contains Doctor Name, Consultancy Fee, Appointment Date and Time.
	


Once the patient has logged out of the account, if the patient wants to go into the account again, the patient can login the account, instead of registering the account again. This shows the login page.
Clicking on ‘Login’ button will redirect the patient to the dashboard page which we have seen earlier (Fig 1.5)



This is how the patient module works. On the whole, this module allows patients to register their account or login their account(if he/she has one), book an appointment and view his/her appointment history.

### Doctor Module:

  &nbsp; &nbsp; &nbsp; The doctors can login into their account which can be done by toggling the tab from ‘Patient’ to ‘Doctor’. This shows the login form for a doctor. Registration of a doctor account can be done only by admin. We will discuss more about this in Admin Module.
  


Once the doctor clicking the ‘Login’ button, they will be redirected to their own dashboard



In this page, doctor can able to see their appointments which has been booked by the patients. This shows the appointment of the doctor which has been booked by the patient. This means that the doctor  will have an appointment with the patient on the specified date and time. 



In real-time, the doctors will have thousands of appointments. It will be easier for a doctor to search for appointment in the case of more appointments. To make it easier, I have a ‘Search’ box in the navigation bar which allows doctors to search for a patient by their contact number.
&nbsp; &nbsp; &nbsp; Once everything is done, the doctor can logout of their account. Thus, in general, a doctor can login into his/her account, view their appointments and search for a patient. This is all about Doctor Module.

### Admin Module:
   
   &nbsp; &nbsp; &nbsp; This module is the heart of our project where an admin can see the list of all patients. Doctors and appointments and the feedback/queries received from the ‘Contact’ page. Also admin can add doctor too. 
  &nbsp; &nbsp; &nbsp; Login into admin account can be done by toggling into admin tab of the Home page.
  &nbsp; &nbsp; &nbsp; `username`: mrgyamfi, `password`: gyamfi123



On clicking the ‘Login’ button, the admin will be redirected to his/her dashboard.



This module allows admin to perform five major operations:

**1. View the list of all patients registered:**

  &nbsp; &nbsp; &nbsp; Admin can able to view all the patients registered. This includes the patients’ First Name, Last Name, Email ID, Contact Number and Password. As like in doctor module, admin can also search for a patient by their contact number in the search box.
  

  
**2. View the list of all doctors registered:**

  &nbsp; &nbsp; &nbsp; Details of the doctors can also be viewed by the admin. This details include the Name of the doctor, Password, Email and Consultancy fees. Searching for a doctor can be done by using the doctor’s Email ID in the search box.



**3. View the Appointment lists:**

  &nbsp; &nbsp; &nbsp; Admin can also able to see the entire details of the appointment that shows the appointment details of the patients with their respective doctors. This includes the First Name, Last Name, Email and Contact Number of patients, doctor’s name, Appointment Date, Time and the Consultancy Fees. 
  

  
**4. Add Doctor:**

  &nbsp; &nbsp; &nbsp; Admin alone can add a new doctor since anyone can register as a doctor if we put this section on the home page. This form asks Doctor’s Name, Email ID, Password and his/her Consultancy Fees.
  

  
  After adding a new doctor, if we check the doctor’s list, we will see the details of new doctor is added to the list.
  

  
**5. View User’s feedback/Queries:**

  &nbsp; &nbsp; &nbsp; Admin is allowed to view the feedback/Query that has been given by the user in the ‘Contact’ page. This includes Sender’s Name, Email Id, Subject, Contact Number and the message(Feedback/ Query).
  

  
  &nbsp; &nbsp; &nbsp; Taking everything into consideration, admin can able to view the details of patients and doctors, appointment details, Feedback by the user and can add a new doctor. Once everything is done, the admin can logout from his account.



**5. Cancel Appointments:**
	
   &nbsp; &nbsp; &nbsp; Patients and doctors can able to delete their appointments.
 

    
  If the patient deletes the last record (for any doctor), then a label "deleted by you" will be displayed in the column 'Current Status' and the action will change to cancel state.
  

  
  Now if we login to the doctor Ganesh's account and view his appointment details, then it will look like this:
  

  
  Similarly doctors can also delete their appointments and patients can view their updated appointment details.
  

**5. Remove Doctors by Admin:**
&nbsp; &nbsp; &nbsp; Admin can also delete the doctors from the system. This let admin to have more control over the system.
  
