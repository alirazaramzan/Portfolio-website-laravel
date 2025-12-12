# Portfolio Website (Laravel) – README

## 📝 Project Overview

This is a personal **Portfolio Website** built using **Laravel**. It showcases your UI/UX design projects, skills, experience, and other professional details. The purpose of this website is to serve as your digital identity and help recruiters or clients explore your work easily.

The project includes:

* Clean and modern UI
* Dynamic project management (CRUD)
* Contact form
* Responsive layout
* Admin dashboard for managing content (if added)

---

## ⚙️ Setup Instructions

Follow these steps to run the project locally.

### **1. Clone the Repository**

```bash
git clone <your-repository-url>
cd <project-folder>
```

### **2. Install Dependencies**

```bash
composer install
npm install
```

### **3. Create Environment File**

```bash
cp .env.example .env
```

### **4. Generate App Key**

```bash
php artisan key:generate
```

### **5. Configure Database**

Open `.env` and update:

```
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### **6. Run Migrations**

```bash
php artisan migrate
```

### **7. Build Frontend Assets**

```bash
npm run dev
```

### **8. Start the Application**

```bash
php artisan serve
```

Your app will run at: **[http://localhost:8000](http://localhost:8000)**

---

## 📖 Usage Guide

### **Homepage**

* Showcases your introduction, skills, services, and featured portfolio items.

### **Portfolio Section**

* Displays all projects with thumbnails, descriptions, and external links.
* You can add/edit/delete projects using the dashboard (if included).

### **Contact Form**

* Allows visitors to send you messages.
* Make sure to configure mail settings in `.env` if you want email notifications:

```
MAIL_MAILER=smtp
MAIL_HOST=your_mail_host
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
```

### **Admin Panel (Optional)**

If you added an admin dashboard:

* Login at `/admin/login`
* Manage projects, skills, experiences, and website content.

---

## 📂 Project Structure

```
app/
resources/
  views/
  css/
  js/
routes/
  web.php
public/
```

---

## 🤝 Contributing

Feel free to contribute by opening issues or pull requests.

---

## 📜 License

This project is open-source and available for modification.


<img width="975" height="538" alt="image" src="https://github.com/user-attachments/assets/33004aba-0c93-40e1-bdd4-bdc250b7d232" />
