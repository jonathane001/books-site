-- books.sql
-- Creates the books database and the books table.
-- Run this once in MySQL before using the site.

CREATE DATABASE IF NOT EXISTS books;
USE books;

-- Each row is one book in the store
CREATE TABLE IF NOT EXISTS books (
    isbn     CHAR(13)     NOT NULL PRIMARY KEY,  -- unique book number
    author   VARCHAR(50)  NOT NULL,
    title    VARCHAR(100) NOT NULL,
    genre    VARCHAR(30)  NOT NULL,
    price    DECIMAL(6,2) NOT NULL,
    added_on TIMESTAMP    DEFAULT CURRENT_TIMESTAMP  -- filled in automatically
);

-- A few starter books so the list isn't empty
INSERT IGNORE INTO books (isbn, author, title, genre, price) VALUES
('0672319241', 'Michael Morgan', 'Java 2 for Professional Developers', 'Programming', 34.99),
('0672318040', 'Mark Gabbert', 'Installing Debian GNU/Linux', 'Technology', 24.99),
('9780061120084', 'Harper Lee', 'To Kill a Mockingbird', 'Fiction', 14.99);
