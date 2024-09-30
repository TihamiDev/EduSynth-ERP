EduSynth - ERP for Educational Institutions
EduSynth is an Enterprise Resource Planning (ERP) solution tailored for educational institutions. It helps manage various academic, administrative, and financial tasks, making it easier for schools, colleges, and universities to operate smoothly.

Project Overview
EduSynth is built using Laravel, with CSS, HTML for front-end design, and MySQL for database management. The ERP manages student information, academic schedules, faculty details, and financial processes all under one roof, ensuring efficient data management and streamlined operations.

This project was developed by Tihami Rahman in collaboration with Gaurav Sen.

Features
Student Information Management: Store and manage detailed student records including admission details, academic performance, and attendance.
Faculty Management: Manage faculty details, including profiles, class assignments, and work schedules.
Academic Scheduling: Create, manage, and update academic schedules with ease, including class timetables and examination schedules.
Fee & Financial Management: Manage student fees, generate invoices, and track payments.
User Roles and Access Control: Secure role-based access for administrators, faculty, and students.
Reports and Dashboards: Generate insightful reports on academic performance, financial health, and operational efficiency.
Responsive User Interface: Fully responsive design for both mobile and desktop devices.
Technologies Used
Back-End: Laravel (PHP Framework)
Front-End: HTML, CSS
Database: MySQL
Version Control: Git and GitHub
Project Roles
Tihami Rahman: Front-end development and database management.
Gaurav Sen: Integration and back-end logic.
Installation and Setup
To set up this project locally, follow these steps:

Prerequisites
PHP (version 7.3 or higher)
Composer (PHP dependency manager)
MySQL (or any relational database)
Node.js and npm (for asset management and compilation)
Git (for cloning the repository)
Step 1: Clone the Repository
First, clone the repository to your local machine:

bash
Copy code
git clone https://github.com/your-username/EduSynth.git
cd EduSynth
Step 2: Install Dependencies
Install PHP and Node.js dependencies:

bash
Copy code
composer install
npm install
Step 3: Set Up Environment
Create a .env file by copying the example .env.example file:

bash
Copy code
cp .env.example .env
Now, generate the application key:

bash
Copy code
php artisan key:generate
Step 4: Configure Database
Open the .env file and update the following database credentials according to your MySQL setup:

plaintext
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
Step 5: Migrate the Database
Now, run the database migrations to create the necessary tables:

bash
Copy code
php artisan migrate
Step 6: Run the Application
After setting up the database, you can start the development server:

bash
Copy code
php artisan serve
Open your browser and go to http://localhost:8000 to see the application.

Step 7: Compile Assets
You can compile the assets (CSS and JavaScript) using npm:

bash
Copy code
npm run dev
To compile assets for production, use:

bash
Copy code
npm run prod
Optional: Seed the Database
If you want to seed the database with dummy data:

bash
Copy code
php artisan db:seed
Usage
Once the server is running, you can log in to the system using the default credentials or create a new admin user through the application interface. Admin users have full access to all modules, while students and faculty have role-based access.

Contribution Guidelines
Contributions are welcome! If you'd like to contribute to this project, please follow these steps:

Fork the repository to your own GitHub account.
Create a new branch for your feature or bug fix:
bash
Copy code
git checkout -b feature/new-feature
Make your changes and commit them:
bash
Copy code
git commit -m "Added new feature"
Push to your branch:
bash
Copy code
git push origin feature/new-feature
Create a Pull Request on GitHub.
Future Enhancements
Some planned features for future releases include:

Integration with third-party APIs for online payments.
SMS and Email notifications for fee reminders and announcements.
Student and Faculty portals for self-service.
Dynamic dashboards with more customizable widgets.
License
This project is open-source and available under the MIT License.

Contact Information
For any queries or support related to the EduSynth project, please feel free to reach out:

Tihami Rahman: GitHub
Gaurav Sen
