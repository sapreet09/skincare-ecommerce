# 🌿 Skincare E-Commerce Website (Laravel)

A modern **full-stack eCommerce web application** built using **Laravel**, designed to simulate a real-world skincare online store with authentication, cart system, checkout flow, admin panel, and payment integration.

This project demonstrates **production-level Laravel architecture** suitable for freelance client projects and portfolio showcasing.

---

## 🚀 Features

### 🛍️ Customer Side

* Homepage with featured products
* Product listing & product detail pages
* Add to Cart / Update Cart / Remove Cart
* Session-based cart system
* Secure Checkout (Authentication required)
* Order placement system
* Razorpay payment integration (Test Mode)
* Order success page
* User order history
* Invoice generation

---

### 🔐 Authentication

* User Registration & Login (Laravel Breeze)
* Protected checkout routes
* Profile management
* Order tracking

---

### 🧑‍💼 Admin Panel

* Admin dashboard
* Product CRUD management
* Order management
* Order status updates:

  * Pending → Processing → Shipped → Delivered
* Revenue tracking

---

## 🧱 Tech Stack

| Layer           | Technology                     |
| --------------- | ------------------------------ |
| Backend         | Laravel 12                     |
| Frontend        | Blade + Bootstrap              |
| Database        | MySQL                          |
| Authentication  | Laravel Breeze                 |
| Payment Gateway | Razorpay (Test Mode)           |
| Server          | Apache (WAMP/XAMPP compatible) |

---

## 📂 Project Structure

```
app/
 ├── Http/Controllers
 │    ├── Front/
 │    └── Admin/
resources/views/
 ├── front/
 └── admin/
routes/
 └── web.php
```

---

## ⚙️ Installation Guide

### 1️⃣ Clone Repository

```bash
git clone https://github.com/sapreet09/skincare-ecommerce.git
cd skincare-ecommerce
```

---

### 2️⃣ Install Dependencies

```bash
composer install
npm install
npm run build
```

---

### 3️⃣ Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Update database credentials in `.env`.

---

### 4️⃣ Run Migration

```bash
php artisan migrate
```

(Optional seed products manually from Admin Panel)

---

### 5️⃣ Start Server

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

---

## 💳 Payment Testing

This project uses **Razorpay Test Mode**.

✅ Fake payments can be completed safely.
❌ No real money is deducted.

---

## 👨‍💻 Demo Credentials

### Admin

```
Email: admin@example.com
Password: password
```

### User

Register a new account from frontend.

---

## 📸 Screenshots (Add Later)

* Home Page
* Product Page
* Cart Page
* Checkout
* Admin Dashboard
* Orders Management

*(Upload screenshots inside `/screenshots` folder and link here.)*

---

## 🎯 Purpose of Project

This project was built to:

* Practice advanced Laravel concepts
* Demonstrate real eCommerce workflow
* Showcase freelance-ready development skills
* Serve as a portfolio project

---

## 🔮 Future Improvements

* Multi-vendor support
* Coupon system
* Product reviews
* Wishlist
* API version (Laravel REST API)
* Deployment on AWS / VPS

---

## 🤝 Author

**Sapreet Kaur**
Executive Software Developer
Laravel | PHP | MySQL | Full-Stack Development

GitHub: https://github.com/sapreet09

---

## ⭐ Support

If you like this project, consider giving it a ⭐ on GitHub!
