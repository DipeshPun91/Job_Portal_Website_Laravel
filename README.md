💼 Job Portal Website
This repository contains the source code for a Job Portal Website, built to connect employers with job seekers. The platform enables users to create profiles, search for job listings, apply for jobs, and for employers to post job openings. It also includes features like job filtering, user authentication, and role-based access.

🛠️ Technologies Used
Figma: For UI/UX design and prototyping.
Laravel: Backend framework to handle core functionality such as job listings, applications, and user management.
MySQL: Database to store job listings, user profiles, applications, and company data.
XAMPP: Local development server to run the website.
Custom CSS: Additional styling for a personalized user experience.

🚀 Features
Job Listings: Users can browse job listings based on categories like industry, location, and type of job.
Job Search & Filters: Advanced search and filtering options for users to find jobs that match their skills and preferences.
Employer Job Posting: Employers can create and manage job postings.
User Authentication: Role-based access for job seekers and employers, secured with Laravel's authentication system.
Profile Management: Job seekers and employers can create and update their profiles.

📦 Installation
To set up the project locally:

Clone the repository:
git clone https://github.com/your-username/job-portal-website.git

Switch to the master branch:
git checkout master

Install dependencies:
composer install
npm install

Configure the .env file:
Update database credentials and other environment variables.

Migrate and seed the database:
php artisan migrate

Run the development server:
php artisan serve

🎨 Customization
Modify the frontend by editing Blade template files in the resources/views directory.
Customize the CSS by editing the app.css file located in the public/css/ folder.
Manage JavaScript functionality in the app.js file in the public/js/ folder.

🤝 Contributing
If you'd like to contribute to the project, feel free to submit a pull request. You can:

Add new features 🛠️
Fix bugs 🐛
Improve UI/UX 🎨
Optimize performance ⚡
📄 License
This project is licensed under the MIT License.
