-- Tour And Travel Touch - Database Schema
-- Database: firstsql

CREATE DATABASE IF NOT EXISTS firstsql
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE firstsql;

-- Booking inquiries table
CREATE TABLE IF NOT EXISTS information (
    id INT AUTO_INCREMENT PRIMARY KEY,
    whereto VARCHAR(255) NOT NULL COMMENT 'Destination name',
    howmany VARCHAR(50) NOT NULL COMMENT 'Number of travelers',
    arrival DATE NOT NULL COMMENT 'Arrival date',
    leaving DATE NOT NULL COMMENT 'Departure date',
    textdata TEXT COMMENT 'Customer name and additional details',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
