# Tour And Travel Touch

> **A full-stack travel booking platform connecting travelers to destinations across Bangladesh.**
> Built with vanilla PHP 8+, MySQL, and modern frontend engineering — no frameworks, no bloat.

<p align="center">
  <a href="https://tourandtraveltouch.great-site.net"><img src="https://img.shields.io/badge/Live_Site-tourandtraveltouch.great--site.net-00d2ff?style=flat-square" alt="Live Site"></a>
  <a href="https://github.com/mahfujul-01726/TourAndTravelTouch"><img src="https://img.shields.io/github/stars/mahfujul-01726/TourAndTravelTouch?style=flat-square" alt="GitHub Stars"></a>
  <img src="https://img.shields.io/badge/Version-2.0-ff6b6b?style=flat-square" alt="Version 2.0">
  <img src="https://img.shields.io/badge/PHP-8%2B-777bb4?style=flat-square&logo=php" alt="PHP 8+">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=flat-square&logo=bootstrap" alt="Bootstrap 5">
  <img src="https://img.shields.io/badge/License-MIT-6c5ce7?style=flat-square" alt="MIT License">
</p>

---

## Table of Contents

- [Overview](#overview)
- [Destinations](#destinations)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Architecture](#architecture)
- [Getting Started](#getting-started)
- [Configuration](#configuration)
- [Admin Panel](#admin-panel)
- [Security Model](#security-model)
- [Performance Considerations](#performance-considerations)
- [CI/CD Pipeline](#cicd-pipeline)
- [Contributing](#contributing)
- [License](#license)

---

## Overview

Tour And Travel Touch is a production-grade travel booking platform that showcases six hand-picked destinations across Bangladesh. The system delivers a complete booking lifecycle — browsing, registration, booking submission, travel plan management, and administrative oversight — all on a vanilla PHP stack.

**Design philosophy:** This project intentionally avoids heavy frameworks to demonstrate mastery of core web fundamentals. Every SQL query uses prepared statements. Every form submission carries CSRF validation. Every output is XSS-sanctioned. The frontend layers interactive 3D effects, particle systems, and parallax depth onto a responsive Bootstrap 5 foundation — proving that vanilla code can still deliver modern UX.

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

### Frontend Engineering

| Feature | Implementation |
|---|---|
| **3D Tilt Cards** | CSS 3D transforms with per-axis rotation responding to mouse position |
| **Particle Network** | Canvas API — procedural nodes with spring-force edge connections and mouse repulsion |
| **Background Slideshow** | CSS `opacity` transitions driven by `setInterval` with preloaded image assets |
| **Parallax Hero** | `mousemove` event delegation translating 3-layer depth offsets via `requestAnimationFrame` |
| **Scroll Reveal** | `IntersectionObserver` API — fade-in and slide-up triggers at configurable thresholds |
| **Theme Switching** | CSS custom properties toggling between two complete color palettes (Orange/Black, Red/Green) |
| **Scene Transitions** | HSL overlay interpolation keyed to the currently visible destination card |
| **Glassmorphism** | `backdrop-filter: blur()` with semi-transparent backgrounds across modals, nav, and cards |
| **Toast Notifications** | Session-persisted flash messages consumed via JSON endpoint and rendered with auto-dismiss timers |
| **Responsive Grid** | Bootstrap 5's 12-column system — fluid from 320px to 2560px viewports |

### Backend Engineering

| Feature | Implementation |
|---|---|
| **Authentication** | Email/password registration with bcrypt hashing (cost factor 12), session-based login/logout |
| **Booking Engine** | Full CRUD — authenticated users create, view, and search bookings with server-side date validation |
| **CSRF Protection** | 32-byte random tokens generated per session, validated on every state-mutating POST request |
| **Search** | `LIKE`-based query across destination name and customer details with prepared statements |
| **Flash Messaging** | Session-backed success/error message system, consumed by the frontend via a dedicated JSON endpoint |
| **Admin Dashboard** | Separate authentication realm with booking and user management tables |

---

## Tech Stack

| Layer | Technology | Rationale |
|---|---|---|
| **Frontend** | HTML5, CSS3, JavaScript (ES6+) | Zero-dependency interactivity |
| **CSS Framework** | Bootstrap 5.0.2 | Proven grid, battle-tested cross-browser consistency |
| **Icons** | Font Awesome 6.2.1 | Travel-appropriate icon set |
| **Typography** | Google Fonts — Poppins, Inter | Modern, highly readable pair |
| **Backend** | PHP 8+ (vanilla, no framework) | Full control over request lifecycle, no hidden magic |
| **Database** | MySQL / MariaDB via `mysqli` | Relational schema with prepared statement access |
| **CI/CD** | GitHub Actions | Automated FTP deployment on push to main |
| **Hosting** | InfinityFree | PHP 8 + MySQL hosting at zero cost |

---

## Architecture

### Layered System Design

```
┌──────────────────────────────────────────────────────────────────┐
│                    CLIENT (index.html)                           │
│  Hero · Destination Cards · Services · Gallery · Particles      │
│  JavaScript: 3D Tilt · Particle Network · Parallax · Scroll FX  │
│  CSS: Glassmorphism · CSS Custom Properties · Responsive Grid   │
└───────────────────────────┬──────────────────────────────────────┘
                            │ HTTP (POST / GET / JSON)
                            ▼
┌──────────────────────────────────────────────────────────────────┐
│                   PHP APPLICATION LAYER                          │
│                                                                  │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────────────┐   │
│  │  handlers/   │  │  admin/      │  │  config/             │   │
│  │  booking.php │  │  login.php   │  │  app.php             │   │
│  │  login.php   │  │  dashboard   │  │  database.php        │   │
│  │  register.php│  │  .php        │  │                      │   │
│  │  search.php  │  │              │  │  helpers.php         │   │
│  │  csrf-token  │  └──────────────┘  │  (auth, CSRF,       │   │
│  │  .php        │                    │   flash, utilities)  │   │
│  │  flash.php   │                    └──────────────────────┘   │
│  │  logout.php  │                                               │
│  └──────────────┘                                               │
│                       │                                          │
│              MySQLi (Prepared Statements)                        │
└───────────────────────────┬──────────────────────────────────────┘
                            ▼
┌──────────────────────────────────────────────────────────────────┐
│                   DATABASE (MySQL / MariaDB)                     │
│                                                                  │
│  information (bookings)  ·  users (accounts)                     │
│  admins (admin accounts)                                         │
└──────────────────────────────────────────────────────────────────┘
```

### Data Flow

1. **Client** serves `index.html` — a single-page application consuming backend JSON endpoints
2. **PHP handlers** validate input, enforce CSRF tokens, execute parameterized queries, and return JSON or redirect responses
3. **Database layer** uses `mysqli` with prepared statements — no raw SQL concatenation anywhere in the codebase
4. **Session layer** manages authentication state, flash messages, and CSRF tokens across requests

### Project Structure

```
├── index.html                        # Main single-page frontend
├── pages/                            # Authentication pages
│   ├── login.html
│   └── signup.html
├── backend/
│   ├── config/
│   │   ├── app.php                   # CORS, session, URL configuration
│   │   └── database.php              # Database connection (mysqli)
│   ├── helpers.php                   # Shared utilities — auth, CSRF, flash
│   ├── handlers/                     # Request processors (6 handlers)
│   └── admin/                        # Admin panel
├── assets/
│   ├── css/
│   │   ├── theme-orange.css          # Primary theme
│   │   └── theme-red.css             # Alternate theme
│   ├── js/
│   │   └── config.js                 # Frontend backend URL configuration
│   └── images/                       # UI assets and destination photography
├── database/
│   └── schema.sql                    # MySQL schema (3 tables + seed data)
└── .github/workflows/
    └── deploy.yml                    # GitHub Actions CI/CD
```

---

## Getting Started

### Prerequisites

- PHP 8.0+
- MySQL 5.7+ or MariaDB 10.3+
- Apache / Nginx / XAMPP / WAMP / Laragon

### Local Setup

```bash
# 1. Clone the repository
git clone https://github.com/mahfujul-01726/TourAndTravelTouch.git
cd TourAndTravelTouch

# 2. Import the database schema
mysql -u root -p your_database_name < database/schema.sql

# 3. Configure backend
#    Edit backend/config/database.php with your local database credentials.
#    Edit backend/config/app.php — set FRONTEND_URL to your local server address.

# 4. Configure frontend
#    Edit assets/js/config.js — set BACKEND_URL to match your local setup.

# 5. Serve
#    Point your web server document root to the project directory,
#    then open index.html in a browser.
```

### Production Deployment (InfinityFree)

1. Create an account at [infinityfree.com](https://infinityfree.com)
2. Create a MySQL database through the control panel
3. Import `database/schema.sql` via phpMyAdmin
4. Update `backend/config/database.php` with InfinityFree database credentials
5. Upload all files to `htdocs/` via FTP or File Manager
6. Verify the live domain

> **Pro tip:** The CI/CD pipeline (see below) automates step 5 on every push to `main`.

---

## Configuration

| File | Variable | Purpose |
|---|---|---|
| `backend/config/database.php` | `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME` | Database connection credentials |
| `backend/config/app.php` | `FRONTEND_URL` | Frontend origin (used for CORS and redirects) |
| `backend/config/app.php` | `SESSION_NAME` | Session cookie name |
| `assets/js/config.js` | `BACKEND_URL` | Base URL for all backend AJAX calls |

All configurable values are centralized — no hardcoded URLs or credentials exist in handler or view code.

---

## Admin Panel

A separate authentication realm for administrative operations.

| Detail | Value |
|---|---|
| **URL** | `/backend/admin/login.php` |
| **Default Username** | `admin` |
| **Default Password** | `admin123` |
| **Account Creation** | Auto-provisioned on first login |

> **Security notice:** Change the default password immediately after initial access. The admin panel uses the same CSRF and prepared-statement protections as the public-facing handlers.

---

## Security Model

| Threat | Mitigation |
|---|---|
| **SQL Injection** | 100% of database queries use `mysqli` prepared statements with parameterized bindings |
| **Cross-Site Scripting (XSS)** | All dynamic output passes through `htmlspecialchars()` with `ENT_QUOTES | ENT_HTML5` |
| **Password Compromise** | bcrypt hashing with cost factor 12 (≈250ms per hash on modern hardware) |
| **Cross-Site Request Forgery** | 32-byte random tokens generated per session, validated on every POST handler |
| **Session Hijacking** | HTTP-only, Secure, SameSite=Lax cookie attributes; session regeneration on privilege escalation |
| **Information Leakage** | Generic error messages presented to users; detailed errors logged server-side only |

---

## Performance Considerations

- **CSS animations** run on the GPU compositor thread (`transform`, `opacity`) to avoid layout thrashing
- **Particle canvas** uses `requestAnimationFrame` with delta-time normalization for consistent framerates across displays
- **Images** are preloaded in JavaScript before the slideshow starts — no flash of empty background
- **Database queries** are scoped and indexed; `SELECT *` is avoided in production handlers
- **No ORM overhead** — every query is hand-tuned for the specific access pattern

---

## CI/CD Pipeline

The project uses GitHub Actions for continuous deployment.

```yaml
# .github/workflows/deploy.yml
# On push to main: FTP-deploys all files to InfinityFree hosting.
```

The pipeline runs zero-downtime deployments and excludes development-only files via `.gitattributes`.

---

## Contributing

Contributions are reviewed and welcomed. This project maintains a **strictly vanilla PHP** policy — no Laravel, no Symfony, no Composer dependencies.

### Workflow

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/your-feature`
3. Commit with clear, conventional messages
4. Push: `git push origin feature/your-feature`
5. Open a Pull Request

### Standards

| Requirement | Rationale |
|---|---|
| Prepared statements on all SQL | Non-negotiable — no raw query concatenation |
| CSRF tokens on all POST handlers | Every state-mutating endpoint must validate |
| `htmlspecialchars()` on all output | Prevents stored and reflected XSS |
| PHP 8.0+ and MySQL 5.7+ compatibility | Matches the production hosting environment |
| No framework dependencies | Core architectural constraint |

---

## License

This project is provided for educational and portfolio purposes. See [LICENSE](LICENSE) for details.

---

<p align="center">
  <strong>Author:</strong> <a href="https://github.com/mahfujul-01726">Mahfujul Karim</a>
  &nbsp;·&nbsp;
  <strong>Live Demo:</strong> <a href="https://tourandtraveltouch.great-site.net">tourandtraveltouch.great-site.net</a>
  &nbsp;·&nbsp;
  <strong>Repository:</strong> <a href="https://github.com/mahfujul-01726/TourAndTravelTouch">github.com/mahfujul-01726/TourAndTravelTouch</a>
  <br><br>
  <sub>Built with PHP, MySQL, and vanilla JavaScript. No frameworks. No magic. Just engineering.</sub>
</p>
