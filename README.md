# 🩸 Heroes of Hopes

**Heroes of Hopes** is a web-based platform built with **PHP** and **MySQL**, designed to manage and streamline blood donation and healthcare support activities.  
The system enables administrators to manage donors, blood tests, medicines, and users efficiently through a centralized dashboard.

---

## 🚀 Features

- 🧑‍🤝‍🧑 **Donor Management** – Add, view, and update donor records.  
- 🩸 **Blood Test Records** – Maintain detailed blood test data for all donors.  
- 💊 **Medicine Tracking** – Manage available medicines and their inventory.  
- 👨‍💻 **Admin Dashboard** – Secure access for administrators to oversee the entire system.  
- 📄 **Form Handling** – Simplified data entry via user-friendly forms.  
- 🗄️ **MySQL Database Integration** – Reliable data storage and retrieval.  

---

## 🧰 Tech Stack

| Component | Technology |
|------------|-------------|
| Frontend | HTML5, CSS3, JavaScript |
| Backend | PHP (Procedural) |
| Database | MySQL |
| Web Server | Apache (XAMPP / LAMP / WAMP) |

---

## 📁 Project Structure

heroesofhopes/
├── admin/ # Admin panel and management features
├── assets/ # Static files (CSS, JS, images)
├── dbscripts/ # Database connection and query scripts
├── forms/ # Frontend forms for data entry
heroesofhopesv1/ # Alternate or updated version of the project
heroesdb/ # MySQL table data files (.frm, .ibd)
heroesdb.sql # Database schema and initial data


---

## ⚙️ Installation & Setup

1. **Clone the Repository**
   ```bash
   git clone https://github.com/<your-username>/heroesofhopes.git


Move Project to Server Directory

Copy the heroesofhopes folder into your web server directory:

Windows (XAMPP): C:\xampp\htdocs\

Linux (LAMP): /var/www/html/

Start Apache and MySQL

Use XAMPP, WAMP, or LAMP control panel to start the services.

Import the Database

Open phpMyAdmin

Create a new database (e.g., heroesdb)

Import the file heroesdb.sql located in the project root

Configure Database Connection

Update your database credentials in the PHP connection file (usually in /dbscripts/):

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heroesdb";


Run the Application

Visit http://localhost/heroesofhopes
 in your browser.

🧪 Usage

Log in to the Admin Panel to manage donors, medicines, and blood test data.

Use the Forms section to add or update records.

The system automatically stores data in the configured MySQL database.

🤝 Contributing

Contributions, issues, and feature requests are welcome!
Feel free to open a pull request to improve documentation or add new features.

🪪 License

This project is licensed under the MIT License — see the LICENSE
 file for details.

👨‍💻 Author

Developed by Varunkumar Vasava
If you found this project helpful, consider giving it a ⭐ on GitHub!
