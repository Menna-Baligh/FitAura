# FitAura 🛍️

**FitAura** is a simple E-commerce web application built using **Native PHP (no frameworks)** and structured with the **MVC architecture** pattern.

---

## 📁 Project Structure

- `app/` – Contains controllers, models,views, and core classes  
- `public/` – Contains the entry point `index.php`, assets like CSS, JS, and images  
- `DB/` – Contains the database structure and seed data for products table

---

## 🚀 How to Run the Project

1. **Start XAMPP**  
   Make sure **Apache** and **MySQL** are both running.

2. **Move Project Folder**  
   Copy the entire `FitAura` folder into your `htdocs` (XAMPP directory).

3. **Open Terminal and Navigate to Project**  
   Run the built-in PHP server using:

   ```bash
   php -S localhost:8080
   ```

4. **Open in Browser**  
   Go to:

   ```
   http://localhost:8080/public
   ```

   This will load the **home page** of the FitAura store.

---

## 🧠 Important Notes

- ⚠️ Make sure to **import the `schema.sql`** file into **phpMyAdmin**:

  1. Open `http://localhost/phpmyadmin`
  2. Go to **Import** tab
  3. Select `schema.sql` file
  4. Click **Go**

- The project uses MySQL port `3307` u can change it to any port in **core/config.php** 
- Images are stored in `public/img/products/`

---

## ✨ Features

- Secure **User Registration & Login** system  
- **Product Listing** with images and descriptions  
- Dedicated **Products Page** showcasing all available items  
- **Orders Page** to view user order history and statuses  
- Functional **Cart System** for adding, removing, and updating items  
- Complete **Checkout Process** with detailed shipping information  
- Personalized **User Profile Page** with editable information


---

## 📌 Requirements

- PHP ≥ 7.4
- MySQL
- XAMPP or any local server (e.g., Laragon)

---

## 🤝 Author

> Made with 💛 by Menna & [Martina](https://github.com/Martina-511) for learning and demo purposes.
