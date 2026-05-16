# Tour And Travel Touch

A responsive travel agency website showcasing domestic tourism destinations across **Bangladesh**. Built as a static front-end with a PHP/MySQL backend for handling booking inquiries.

## Live Demo

> **GitHub Pages:** [https://mahfujul-01726.github.io/TourAndTravelTouch](https://mahfujul-01726.github.io/TourAndTravelTouch)

---

## Features

- **Destination Showcase** — 6 curated Bangladeshi travel packages with images, ratings, and pricing (BDT 1,500–8,000).
- **Booking Inquiry System** — Collects traveler details (destination, group size, dates, notes) and stores them in a MySQL database.
- **Booking Search** — Look up existing booking records by customer name.
- **Services Overview** — Highlights 6 service categories: hotels, food & drinks, safety guides, nationwide travel, fast transport, and adventures.
- **Photo Gallery** — 6-image gallery with hover zoom effects.
- **Responsive Design** — Built on Bootstrap 5, optimized for mobile and desktop.
- **Animated Hero** — CSS keyframe animation cycling through Bangladeshi destination names.
- **Two Theme Variants** — Red/green (`TourTravelTouch.css`) and orange/black (`TourTravelTouch1.css`) color schemes.

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| **Frontend** | HTML5, CSS3, JavaScript, Bootstrap 5.0.2, Font Awesome 6.2.1 |
| **Backend** | PHP 7+ (vanilla, no framework) |
| **Database** | MySQL via `mysqli` |
| **Deployment** | GitHub Pages (static frontend) |

---

## Project Structure

```
TourAndTravelTouch/
├── Tour And Travel Touch.html   # Main homepage (single-page layout)
├── signup_form.html             # User registration form
├── signup_form.php              # Handles booking form submissions
├── execute_search.php           # Searches booking records by name
├── db_connect.php               # MySQL connection configuration
├── functions.php                # Helper utilities (auth, existence checks)
├── TourTravelTouch.css          # Theme variant 1 (red/green)
├── TourTravelTouch1.css         # Theme variant 2 (orange/black)
├── _config.yml                  # GitHub Pages deployment config
├── .gitignore
├── images/                      # UI assets (logo, icons, flags — 16 files)
└── images1/                     # Destination & gallery photos (12 files)
```

---

## Database Schema

The application uses a MySQL database named `firstsql` with two tables:

### `information` — Booking records

| Column    | Type       | Description            |
|-----------|------------|------------------------|
| `id`      | INT (PK)   | Auto-increment ID      |
| `whereto` | TEXT       | Destination name       |
| `howmany` | TEXT       | Number of travelers    |
| `arrival` | DATE/TEXT  | Arrival date           |
| `leaving` | DATE/TEXT  | Departure date         |
| `textdata`| TEXT       | Customer name & notes  |

### `users` — User accounts

| Column     | Type       | Description           |
|------------|------------|-----------------------|
| `email`    | VARCHAR    | Unique email address  |
| `password` | VARCHAR    | Salted password hash  |
| `salt`     | VARCHAR    | 64-char hex salt      |

---

## Getting Started

### Prerequisites

- PHP 7.0+
- MySQL / MariaDB

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/mahfujul-01726/TourAndTravelTouch.git
   ```

2. **Set up the database**
   ```sql
   CREATE DATABASE firstsql;
   USE firstsql;

   CREATE TABLE information (
       id INT AUTO_INCREMENT PRIMARY KEY,
       whereto TEXT,
       howmany TEXT,
       arrival TEXT,
       leaving TEXT,
       textdata TEXT
   );

   CREATE TABLE users (
       email VARCHAR(255) UNIQUE,
       password VARCHAR(255),
       salt VARCHAR(64)
   );
   ```

3. **Configure database credentials** — Edit `db_connect.php` with your MySQL host, username, and password.

4. **Run the application**
   ```bash
   php -S localhost:8000
   ```
   Then open `http://localhost:8000/Tour%20And%20Travel%20Touch.html` in your browser.

---

## Deployment

The static frontend is deployable to **GitHub Pages**. Push to the `main` branch and enable Pages from the repository settings. Note that the PHP backend requires a separate PHP-capable server to function.

---

## Author

**Mahfujul Karim**

---

## License

This project is provided for educational and portfolio purposes.
