    EduSynth - ERP for Educational Institutions
EduSynth is an Enterprise Resource Planning (ERP) solution tailored for educational institutions. It helps manage various academic, administrative, and financial tasks, making it easier for schools, colleges, and universities to operate smoothly.

**Project Overview**

EduSynth is built using Laravel, with CSS, HTML for front-end design, and MySQL for database management. The ERP manages student information, academic schedules, faculty details, and financial processes all under one roof, ensuring efficient data management and streamlined operations.

**This project was developed by Tihami Rahman in collaboration with Gaurav Sen.**

**Features**
- Student Information Management: Store and manage detailed student records including admission details, academic performance, and attendance.

- Faculty Management: Manage faculty details, including profiles, class assignments, and work schedules.

- Academic Scheduling: Create, manage, and update academic schedules with ease, including class timetables and examination schedules.

- Fee & Financial Management: Manage student fees, generate invoices, and track payments.

- User Roles and Access Control: Secure role-based access for administrators, faculty, and students.

- Reports and Dashboards: Generate insightful reports on academic performance, financial health, and operational efficiency.

- Responsive User Interface: Fully responsive design for both mobile and desktop devices.


**Technologies Used**
- Back-End: Laravel (PHP Framework)
- Front-End: HTML, CSS
- Database: MySQL
- Version Control: Git and GitHub

**Project Roles**

*Tihami Rahman: Front-end development and database management.*

*Gaurav Sen: Integration and back-end logic.*

**Installation and Setup**

To set up this project locally, follow these steps:

**Prerequisites**

PHP (version 7.3 or higher)

Composer (PHP dependency manager)

MySQL (or any relational database)

Node.js and npm (for asset management and compilation)

Git (for cloning the repository)

Step 1: Clone the Repository

First, clone the repository to your local machine:
```bash
git clone https://github.com/tihamit/EduSynth-ERP.git
cd EduSynth-ERP
```

Step 2: Install Dependencies

Install PHP and Node.js dependencies:
```bash
composer install
npm install
```

Step 3: Set Up Environment
Create a `.env` file by copying the example `.env.example `file:

```
cp .env.example .env
```

Now, generate the application key:

```
php artisan key:generate
```

Step 4: Configure Database

Open the `.env` file and update the following database credentials according to your MySQL setup:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Step 5: Migrate the Database

Now, run the database migrations to create the necessary tables:


```
php artisan migrate
```

Step 6: Run the Application

After setting up the database, you can start the development server:

```
php artisan serve
```

Open your browser and go to `http://localhost:8000` to see the application.

Step 7: Compile Assets
You can compile the assets (CSS and JavaScript) using npm:


```
npm run dev
```

To compile assets for production, use:

```    
npm run prod
```


**Usage**

Once the server is running, you can log in to the system using the default credentials or create a new admin user through the application interface. Admin users have full access to all modules, while students and faculty have role-based access.


**Contact Information**

For any queries or support related to the EduSynth project, please feel free to reach out:

Tihami Rahman

Gaurav Sen

## Project Screenshots

Below are a few screenshots showcasing key features of SyncSphere.

> **Note:** There are still multiple pages that have not been added here.

- **LogIn page**

![Screenshot 2024-10-01 003020](https://github.com/user-attachments/assets/1505caf4-4c87-404f-a98a-9bb66b28775c)

- **Change Password**

![Screenshot 2024-10-01 003103](https://github.com/user-attachments/assets/399be6b9-e4d5-4321-925d-a8d16941b6a4)

- **Reset Password**

![Screenshot 2024-10-01 003635](https://github.com/user-attachments/assets/9fbe4105-6d3f-4c8f-b3d0-259fe498afd6)

- **Admin Dashboard**

![Screenshot 2024-10-01 003217](https://github.com/user-attachments/assets/1cf2db30-e413-4694-8786-8bb73bfeb943)

- **Create Notice (ADMIN)**

![Screenshot 2024-10-01 003315](https://github.com/user-attachments/assets/cd4324aa-f5a2-4e7e-8aa5-6277506cf2d5)

-**Create Syllabus**

![Screenshot 2024-10-01 003453](https://github.com/user-attachments/assets/805da9fd-656b-4013-bd5c-e183bbd1e7ac)

- **Settings**

![Screenshot 2024-10-01 003507](https://github.com/user-attachments/assets/2506a168-a5d2-45d0-b5e0-37dec82e87c0)






