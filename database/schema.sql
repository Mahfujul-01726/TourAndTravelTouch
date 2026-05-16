-- Tour And Travel Touch - Database Schema
-- Database: firstsql
--
-- ⚠️ InfinityFree: Create the database via Control Panel → MySQL Databases FIRST.
--    Then open phpMyAdmin, select your DB, and import this file.
--    The CREATE DATABASE / USE statements are intentionally removed.
--    Updated in database.php with your InfinityFree DB name.

-- Booking inquiries table
CREATE TABLE IF NOT EXISTS information (
    id INT AUTO_INCREMENT PRIMARY KEY,
    whereto VARCHAR(255) NOT NULL COMMENT 'Destination name',
    howmany VARCHAR(50) NOT NULL COMMENT 'Number of travelers',
    arrival DATE NOT NULL COMMENT 'Arrival date',
    leaving DATE NOT NULL COMMENT 'Departure date',
    textdata TEXT COMMENT 'Additional notes from the customer',
    user_id INT DEFAULT NULL COMMENT 'FK to users.id',
    user_name VARCHAR(255) DEFAULT NULL COMMENT 'Customer name (from logged-in user)',
    user_email VARCHAR(255) DEFAULT NULL COMMENT 'Customer email (from logged-in user)',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_user_id (user_id),
    INDEX idx_user_email (user_email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- User accounts table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Admin accounts table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
