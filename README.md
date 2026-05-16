# Tour And Travel Touch

A responsive travel agency website showcasing domestic tourism destinations across **Bangladesh**. Built with a clean separation of concerns — static front-end with a PHP/MySQL backend for handling booking inquiries.

> **Live Demo:** [https://mahfujul-01726.github.io/TourAndTravelTouch](https://mahfujul-01726.github.io/TourAndTravelTouch)

---

## Features

- **Destination Showcase** — 6 curated Bangladeshi travel packages with images, ratings, and pricing (BDT 1,500–8,000).
- **Booking Inquiry System** — Collects traveler details and stores them securely via prepared statements.
- **Booking Search** — Look up existing bookings by customer name (SQL-injection safe).
- **Services Overview** — Highlights 6 service categories: hotels, food & drinks, safety guides, nationwide travel, fast transport, and adventures.
- **Photo Gallery** — 6-image gallery with hover zoom effects.
- **Responsive Design** — Bootstrap 5 layout optimized for mobile and desktop.
- **Animated Hero** — CSS keyframe animation cycling through Bangladeshi destination names.
- **Two Theme Variants** — Orange/black (default) and red/green color schemes.

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| **Frontend** | HTML5, CSS3, Bootstrap 5.0.2, Font Awesome 6.2.1 |
| **Backend** | PHP 8+ (vanilla, prepared statements) |
| **Database** | MySQL / MariaDB via `mysqli` |
| **Deployment** | GitHub Pages (static frontend) |

---

## Project Structure

```
TourAndTravelTouch/
├── index.html                          # Main homepage (single-page layout)
├── assets/
│   ├── css/
│   │   ├── theme-orange.css            # Default theme (orange/black)
│   │   └── theme-red.css               # Alternative theme (red/green)
│   └── images/
│       ├── ui/                         # UI assets (logo, icons, flags — 16 files)
│       └── destinations/               # Destination & gallery photos (12 files)
├── backend/
│   ├── config/
│   │   └── database.php                # MySQL connection (env-configurable)
│   ├── handlers/
│   │   ├── booking.php                 # Processes booking form submissions
│   │   └── search.php                  # Searches booking records (prepared stmt)
│   └── helpers.php                     # Shared utility functions
├── pages/
│   └── signup.html                     # User registration page
├── database/
│   └── schema.sql                      # Database schema (DDL)
├── _config.yml                         # GitHub Pages configuration
├── .gitignore
└── README.md
```

---

## Database Schema

The application uses a MySQL database named `firstsql` with two tables. The full DDL is in [`database/schema.sql`](database/schema.sql).

### `information` — Booking records

| Column | Type | Description |
|--------|------|-------------|
| `id` | INT (PK) | Auto-increment ID |
| `whereto` | VARCHAR(255) | Destination name |
| `howmany` | VARCHAR(50) | Number of travelers |
| `arrival` | DATE | Arrival date |
| `leaving` | DATE | Departure date |
| `textdata` | TEXT | Customer name & notes |
| `created_at` | TIMESTAMP | Record creation time |
| `updated_at` | TIMESTAMP | Last update time |

### `users` — User accounts

| Column | Type | Description |
|--------|------|-------------|
| `id` | INT (PK) | Auto-increment ID |
| `fullname` | VARCHAR(255) | User's full name |
| `email` | VARCHAR(255) | Unique email address |
| `password_hash` | VARCHAR(255) | Password hash |
| `created_at` | TIMESTAMP | Account creation time |
| `updated_at` | TIMESTAMP | Last update time |

---

## Getting Started

### Prerequisites

- PHP 8.0+
- MySQL / MariaDB

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/mahfujul-01726/TourAndTravelTouch.git
   cd TourAndTravelTouch
   ```

2. **Import the database schema**
   ```bash
   mysql -u root -p < database/schema.sql
   ```

3. **Configure database credentials** — Edit `backend/config/database.php` or set environment variables:
   ```bash
   export DB_HOST=localhost
   export DB_NAME=firstsql
   export DB_USER=root
   export DB_PASS=your_password
   ```

4. **Run the development server**
   ```bash
   php -S localhost:8000
   ```
   Then open `http://localhost:8000` in your browser.

---

## Deployment

The static frontend (HTML, CSS, images) is deployable to **GitHub Pages**. Push to the `main` branch and enable Pages from the repository settings. The PHP backend requires a separate PHP-capable hosting environment (e.g., shared hosting, VPS, or a platform like Heroku).

---

## Author

**Mahfujul Karim**

---

## License

This project is provided for educational and portfolio purposes.
