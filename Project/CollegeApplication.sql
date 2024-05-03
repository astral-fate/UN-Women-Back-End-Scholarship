SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `CollegeApplication`
CREATE DATABASE IF NOT EXISTS CollegeApplication;
USE CollegeApplication;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    lastname VARCHAR(255),
    phone VARCHAR(50),
    dob DATE,
    address VARCHAR(255),
    city VARCHAR(100),
    department VARCHAR(100) NOT NULL,
    state VARCHAR(100),
    country VARCHAR(100),
    zipcode VARCHAR(20)
);


CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    personal_details TEXT,
    academic_qualifications TEXT,
    documents LONGBLOB,
    status VARCHAR(100) DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

COMMIT;

