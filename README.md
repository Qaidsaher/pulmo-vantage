
# Pulmo Vantage

Pulmo Vantage is a Laravel-based web application designed for dynamic, responsive layouts and optimized for both frontend beauty and backend power.  
Built with modern tools like TailwindCSS and Blade components, Pulmo Vantage provides a strong foundation for scalable web applications.

---

## 🚀 Features

- Laravel 11 Framework
- TailwindCSS for modern, responsive design
- Blade components integration
- Authentication scaffolding (Laravel Breeze)
- Dynamic content layouts
- Hero sections, CTAs, and custom theming
- Easily extendable architecture

---

## 🛠 Installation

Follow these steps to set up the project locally:

1. **Clone the repository**

```bash
git clone https://github.com/Qaidsaher/pulmo-vantage.git
cd pulmo-vantage
```

2. **Install dependencies**

```bash
composer install
npm install
```

3. **Set up the environment**

Copy the `.env.example` to a new `.env` file:

```bash
cp .env.example .env
```

4. **Generate application key**

```bash
php artisan key:generate
```

5. **Set up database**

Update your `.env` file with your database credentials, then run:

```bash
php artisan migrate
```

6. **Build frontend assets**

```bash
npm run dev
```
For production:

```bash
npm run build
```

7. **Serve the application**

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) to see the app running.

---

## 📂 Project Structure

- `/app` - Laravel application core (Models, Controllers, etc.)
- `/resources/views` - Blade templates
- `/resources/css` - TailwindCSS styles
- `/routes/web.php` - Application routes
- `/public` - Public assets (CSS, JS, images)

---

## ✅ Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM
- MySQL or compatible database

---

## 📸 Screenshots

*(Optionally, you can add screenshots here if you want to visually show sections of the project.)*

---

## 🤝 Contributing

Contributions are welcome!  
Please fork the repository, create a new branch, and submit a pull request for review.

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 👨‍💻 Author

- **Qaidsaher** — [GitHub Profile](https://github.com/Qaidsaher)

---


