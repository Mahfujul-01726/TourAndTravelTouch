# Tour And Travel Touch

A full-stack travel booking platform that connects travelers with destinations across Bangladesh. Built with vanilla PHP and MySQL on the backend, featuring an immersive frontend with interactive animations and responsive design.

[![Live Site](https://img.shields.io/badge/Live_Site-tourandtraveltouch.great--site.net-00d2ff?style=flat-square)](https://tourandtraveltouch.great-site.net)
[![GitHub Stars](https://img.shields.io/github/stars/mahfujul-01726/TourAndTravelTouch?style=flat-square)](https://github.com/mahfujul-01726/TourAndTravelTouch)
[![Version](https://img.shields.io/badge/Version-2.0-ff6b6b?style=flat-square)]()
[![PHP](https://img.shields.io/badge/PHP-8%2B-777bb4?style=flat-square&logo=php)]()
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql)]()
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=flat-square&logo=bootstrap)]()
[![License](https://img.shields.io/badge/License-MIT-6c5ce7?style=flat-square)]()

---

## Table of Contents

- [Overview](#overview)
- [Destinations](#destinations)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Architecture](#architecture)
- [Getting Started](#getting-started)
- [Admin Panel](#admin-panel)
- [Security](#security)
- [Contributing](#contributing)
- [License](#license)

---

## Overview

Tour And Travel Touch is a travel booking platform featuring six hand-picked destinations across Bangladesh. The platform provides a complete booking workflow — users can browse destinations, register accounts, submit bookings, and manage their travel plans. An admin dashboard enables monitoring and management of bookings and users.

The project serves as a demonstration of full-stack development with vanilla PHP, featuring prepared-statement SQL queries, CSRF protection, bcrypt password hashing, session-based authentication, and a responsive frontend with interactive visual effects.

---

## Destinations

| Destination | Region | Type | Starting From |
|---|---|---|---|
| **Sundarbans** | Khulna | Mangrove Forest / UNESCO World Heritage | 5,000 ৳ |
| **Srimangal** | Sylhet | Tea Garden / Rainforest | 5,500 ৳ |
| **Rangamati** | Chittagong Hill Tracts | Lake District / Hill Station | 7,700 ৳ |
| **Bandarbans** | Chittagong Hill Tracts | Hill Tracks / Trekking | 6,000 ৳ |
| **Saint Martin** | Bay of Bengal | Coral Island / Beach | 8,000 ৳ |
| **Shait-Gumbad Mosque** | Bagerhat | Historic Mosque / UNESCO Tentative | 1,500 ৳ |

*Prices in Bangladeshi Taka (BDT). Packages include guided tours and standard accommodations.*

---

## Features

### Frontend

- **3D Tilt-Effect Cards** — Destinations, services, and gallery images respond to mouse hover with CSS 3D transforms
- **Interactive Particle Canvas** — Animated particle network with mouse interaction and ambient glow
- **Background Slideshow** — Cross-fading background transitions in hero and packages sections
- **Parallax Hero** — Mouse-driven depth movement across layered elements
- **Scroll Animations** — Intersection Observer-based fade-in and reveal effects
- **Dynamic Theme Switching** — Toggle between two color schemes (Orange/Black and Red/Green) via CSS custom properties
- **Cinematic Scene Transitions** — Overlay colors shift based on the destination card in view
- **Glassmorphism UI** — Backdrop blur elements throughout the interface
- **Toast Notifications** — Session-driven flash messages with auto-dismiss
- **Responsive Design** — Bootstrap 5 grid supporting mobile through desktop viewports

### Backend

- **User Registration & Authentication** — Email-based registration with bcrypt password hashing (cost 12), login, and logout
- **Booking Engine** — Authenticated users can submit, view, and search bookings with date validation
- **CSRF Protection** — 32-byte random tokens generated per session, validated on all POST requests
- **Search Functionality** — Booking lookup by destination name or customer details
- **Flash Messaging** — Session-based success and error messages consumed via JSON endpoint

### Admin

- Password-protected dashboard at `/backend/admin/login.php`
- Statistics overview (total bookings, registered users)
- Booking management table with destination, traveler count, dates, and customer details
- User management table with registration timestamps

---

## Tech Stack

| Layer | Technology | Purpose |
|---|---|---|
| Frontend | HTML5, CSS3, JavaScript (ES6+) | Structure, styling, interactivity |
| CSS Framework | Bootstrap 5.0.2 | Responsive layout and grid system |
| Icons | Font Awesome 6.2.1 | Travel-related iconography |
| Typography | Google Fonts (Poppins, Inter) | Modern typefaces |
| Backend | PHP 8+ (vanilla) | Request handling, validation, session management |
| Database | MySQL / MariaDB via `mysqli` | Persistent storage with relational schema |
| CI/CD | GitHub Actions | FTP-based deployment to hosting |
| Hosting | InfinityFree | PHP and MySQL hosting |

---

## Architecture

```
┌─────────────────────────────────────────────────────────────┐
│                     FRONTEND (index.html)                    │
│  Hero Section | Destination Cards | Services | Gallery      │
│  JS: 3D Tilt · Particles · Parallax · Scroll Animations    │
│  CSS: Glassmorphism · CSS Variables · Responsive Grid       │
└───────────────────────┬─────────────────────────────────────┘
                        │ HTTP POST/GET
                        ▼
┌─────────────────────────────────────────────────────────────┐
│                     PHP BACKEND                              │
│  handlers/booking.php     handlers/login.php                │
│  handlers/register.php    handlers/search.php               │
│  handlers/auth-status.php handlers/csrf-token.php           │
│  handlers/flash.php       handlers/logout.php               │
│                        │                                    │
│              backend/config/database.php                     │
│              (mysqli, prepared statements)                   │
└──────────────────────────┬──────────────────────────────────┘
                           ▼
┌─────────────────────────────────────────────────────────────┐
│              DATABASE (MySQL / MariaDB)                      │
│  information (bookings)  ·  users (accounts)                │
│  admins (admin accounts)                                    │
└─────────────────────────────────────────────────────────────┘
```

### Project Structure

```
├── index.html                    # Main single-page frontend
├── pages/                        # Authentication pages
│   ├── login.html
│   └── signup.html
├── backend/
│   ├── config/
│   │   ├── app.php               # CORS, session, URL configuration
│   │   └── database.php          # Database connection
│   ├── helpers.php               # Shared utilities (CSRF, flash, auth)
│   ├── handlers/                 # Request processors
│   └── admin/                    # Admin panel
├── assets/
│   ├── css/
│   │   ├── theme-orange.css      # Primary theme
│   │   └── theme-red.css         # Alternate theme
│   ├── js/
│   │   └── config.js             # Frontend backend URL config
│   └── images/                   # UI assets and destination photos
├── database/
│   └── schema.sql                # MySQL schema
└── .github/workflows/
    └── deploy.yml                # GitHub Actions CI/CD
```

---

## Getting Started

### Prerequisites

- PHP 8.0 or higher
- MySQL 5.7+ or MariaDB
- A web server (Apache, Nginx) or local development environment (XAMPP, WAMP, Laragon)

### Local Setup

1. **Clone the repository**

   ```bash
   git clone https://github.com/mahfujul-01726/TourAndTravelTouch.git
   ```

2. **Set up the database**

   Create a MySQL database and import the schema:

   ```bash
   mysql -u root -p your_database_name < database/schema.sql
   ```

3. **Configure database connection**

   Edit `backend/config/database.php` with your local database credentials.

4. **Configure application URLs**

   - `backend/config/app.php` — Set `FRONTEND_URL` to your local server address
   - `assets/js/config.js` — Set `BACKEND_URL` to match

5. **Serve the application**

   Place the project in your web server's document root and access `index.html` through your browser.

### Production Deployment (InfinityFree)

1. Create an account at [infinityfree.com](https://infinityfree.com)
2. Create a MySQL database through the control panel
3. Import `database/schema.sql` via phpMyAdmin
4. Update `backend/config/database.php` with InfinityFree database credentials
5. Upload all files to the `htdocs/` directory via FTP or File Manager
6. Access your InfinityFree domain to verify deployment

---

## Admin Panel

An administrative interface is available for managing bookings and users.

| Detail | Value |
|---|---|
| URL | `/backend/admin/login.php` |
| Default Username | `admin` |
| Default Password | `admin123` |

*The admin account is created automatically on first login. Change the default password after initial access.*

---

## Security

| Layer | Mechanism |
|---|---|
| SQL Injection | Prepared statements with parameterized queries |
| Cross-Site Scripting (XSS) | `htmlspecialchars()` on all output |
| Password Storage | bcrypt hashing with cost factor 12 |
| Cross-Site Request Forgery | 32-byte random tokens validated on every POST |
| Session Cookies | HTTP-only, Secure, SameSite=Lax attributes |
| Error Handling | Generic error messages to prevent information leakage |

---

## Contributing

Contributions are welcome. Please follow these guidelines:

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/your-feature`
3. Commit your changes with clear messages
4. Push to your branch: `git push origin feature/your-feature`
5. Open a Pull Request

**Guidelines:**
- Maintain the existing vanilla PHP architecture (no frameworks)
- Use prepared statements for all SQL queries
- Include CSRF protection for any new form handlers
- Test with PHP 8.0+ and MySQL 5.7+

---

## License

This project is provided for educational and portfolio purposes. See the [LICENSE](LICENSE) file for details.

---

<div align="center">
  <p><strong>Author:</strong> <a href="https://github.com/mahfujul-01726">Mahfujul Karim</a></p>
  <p><strong>Live Demo:</strong> <a href="https://tourandtraveltouch.great-site.net">tourandtraveltouch.great-site.net</a></p>
  <p><strong>Repository:</strong> <a href="https://github.com/mahfujul-01726/TourAndTravelTouch">github.com/mahfujul-01726/TourAndTravelTouch</a></p>
  <br>
  <sub>Built with PHP, MySQL, and vanilla JavaScript.</sub>
</div>
