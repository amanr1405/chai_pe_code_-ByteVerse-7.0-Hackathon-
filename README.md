# Faculty and Student Assignment & Work Sharing System

## Overview
This project is a web-based application that makes assignment and work sharing between faculty and students easier. It allows faculty to assign tasks/homework to students, either individually or batchwise. Students can view and submit their assignments, and faculty can provide feedback or remarks that students can view.

This system is built using **HTML**, **CSS**, **JavaScript**, **PHP**, and **Bootstrap** for a responsive and user-friendly experience.

## Features

### 1. **User Authentication**
   - Login system for both faculty and students to access their respective dashboards.
   - Session-based login to ensure secure access.

### 2. **Faculty Dashboard**
   - **Assign Tasks**: Faculty can assign tasks or homework to students either individually or in batches.
   - **View Submissions**: Faculty can view student submissions and track the completion status.
   - **Add Remarks**: Faculty can provide feedback or remarks after reviewing the submissions.

### 3. **Student Dashboard**
   - **View Tasks**: Students can view the tasks or homework assigned to them by faculty.
   - **Submit Work**: Students can submit their assignments or projects for review.
   - **View Remarks**: Once faculty reviews the submissions, students can see any feedback or remarks.

### 4. **Task/Work Management**
   - **Task Status**: Displays the status of student submissions (e.g., "Uploaded" or "Pending").
   - **File Upload**: Students can upload files such as assignments or projects for faculty review.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP
- **Database**: MySQL (for storing student tasks, assignments, and remarks)
- **Session Management**: PHP sessions to track user logins


### File Descriptions:
- **index.html**: Home page of the site
- **about.html**: Information page about the project
- **contact.html**: Contact page for inquiries
- **services.html**: Page outlining the services offered
- **style.css**: Main stylesheet for the project
- **script.js**: JavaScript for frontend functionality (e.g., form validation)
- **db.php**: Database connection file
- **admin_dashboard.php**: Faculty's dashboard page for task management
- **schedule_task.php**: Page for scheduling new tasks
- **view_task.php**: Page to view student submissions and provide feedback
- **login.php**: Login page for faculty and students

## Installation Instructions

### Prerequisites
Ensure you have the following installed on your system:
- **PHP**: To run server-side logic.
- **MySQL**: For the database.
- **Apache** (or any other server supporting PHP).

### Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/assignment-sharing-system.git
