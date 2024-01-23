-- Create a MySQL Database
CREATE DATABASE IF NOT EXISTS search_engine_project;
USE search_engine_project;

-- Create a Table to store website information
CREATE TABLE IF NOT EXISTS websites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255),
    title_tag_content TEXT
);

-- Add a table for keywords
CREATE TABLE IF NOT EXISTS keywords (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keyword VARCHAR(255) UNIQUE,
    occurrences INT
);

-- Add a table for unnecessary keywords
CREATE TABLE IF NOT EXISTS unnecessary_keywords (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keyword VARCHAR(255) UNIQUE
);
