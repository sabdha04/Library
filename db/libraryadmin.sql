-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk libraryadmin
CREATE DATABASE IF NOT EXISTS `libraryadmin` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `libraryadmin`;

-- membuang struktur untuk table libraryadmin.active_loans
CREATE TABLE IF NOT EXISTS `active_loans` (
  `loan_id` int NOT NULL AUTO_INCREMENT,
  `member_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `loan_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('returned','active') DEFAULT 'active',
  PRIMARY KEY (`loan_id`),
  KEY `member_id` (`member_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `active_loans_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  CONSTRAINT `active_loans_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.active_loans: ~4 rows (lebih kurang)
INSERT INTO `active_loans` (`loan_id`, `member_id`, `book_id`, `loan_date`, `return_date`, `status`) VALUES
	(1, 1, 1, '2023-06-01', '2023-06-15', 'active'),
	(2, 2, 2, '2023-06-05', '2023-06-19', 'active'),
	(3, 3, 3, '2023-06-10', '2023-06-24', 'active'),
	(4, 4, 4, '2023-06-15', '2023-06-29', 'active');

-- membuang struktur untuk table libraryadmin.books
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `availability` enum('available','unavailable') DEFAULT 'available',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.books: ~6 rows (lebih kurang)
INSERT INTO `books` (`book_id`, `title`, `author`, `category`, `availability`) VALUES
	(1, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 'available'),
	(2, '1984', 'George Orwell', 'Dystopian', 'available'),
	(3, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Classic', 'available'),
	(4, 'The Catcher in the Rye', 'J.D. Salinger', 'Classic', 'available'),
	(5, 'Moby-Dick', 'Herman Melville', 'Adventure', 'available'),
	(6, 'Pride and Prejudice', 'Jane Austen', 'Romance', 'unavailable');

-- membuang struktur untuk table libraryadmin.history
CREATE TABLE IF NOT EXISTS `history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `loans` date NOT NULL,
  `returns` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.history: ~5 rows (lebih kurang)
INSERT INTO `history` (`id`, `name`, `title`, `loans`, `returns`, `status`) VALUES
	(1, 'John Doe', 'The Great Gatsby', '2024-06-01', '2024-06-15', 'Return'),
	(2, 'Jane Smith', 'To Kill a Mockingbird', '2024-06-05', '2024-06-20', 'Return'),
	(3, 'Michael Johnson', '1984', '2024-06-10', '2024-06-25', 'Return'),
	(4, 'Alice Brown', 'Moby Dick', '2024-06-12', '2024-06-27', 'Return'),
	(5, 'Chris Evans', 'War and Peace', '2024-06-14', '2024-06-29', 'Return');

-- membuang struktur untuk table libraryadmin.loans
CREATE TABLE IF NOT EXISTS `loans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `loans` date NOT NULL,
  `returns` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.loans: ~43 rows (lebih kurang)
INSERT INTO `loans` (`id`, `name`, `title`, `loans`, `returns`, `status`) VALUES
	(1, 'John Doe', 'The Great Gatsby', '2024-06-01', '2024-06-15', 'Active'),
	(2, 'Jane Smith', 'To Kill a Mockingbird', '2024-06-05', '2024-06-20', 'Active'),
	(3, 'Michael Johnson', '1984', '2024-06-10', '2024-06-25', 'Active'),
	(4, 'John Doe', 'The Great Gatsby', '2024-06-01', '2024-06-15', 'Active'),
	(5, 'Jane Smith', 'To Kill a Mockingbird', '2024-06-05', '2024-06-20', 'Active'),
	(6, 'Michael Johnson', '1984', '2024-06-10', '2024-06-25', 'Active'),
	(7, 'Alice Brown', 'Moby Dick', '2024-06-12', '2024-06-27', 'Active'),
	(8, 'Chris Evans', 'War and Peace', '2024-06-14', '2024-06-29', 'Active'),
	(9, 'David Clark', 'Pride and Prejudice', '2024-06-16', '2024-07-01', 'Active'),
	(10, 'Eva Green', 'The Catcher in the Rye', '2024-06-18', '2024-07-03', 'Active'),
	(11, 'Frank Harris', 'Brave New World', '2024-06-20', '2024-07-05', 'Active'),
	(12, 'Grace Johnson', 'Crime and Punishment', '2024-06-22', '2024-07-07', 'Active'),
	(13, 'Hannah White', 'The Odyssey', '2024-06-24', '2024-07-09', 'Active'),
	(14, 'Ian Black', 'The Iliad', '2024-06-26', '2024-07-11', 'Active'),
	(15, 'Jack Brown', 'The Brothers Karamazov', '2024-06-28', '2024-07-13', 'Active'),
	(16, 'Kelly Green', 'Anna Karenina', '2024-06-30', '2024-07-15', 'Active'),
	(17, 'Liam Harris', 'Ulysses', '2024-07-02', '2024-07-17', 'Active'),
	(18, 'Mia Johnson', 'Don Quixote', '2024-07-04', '2024-07-19', 'Active'),
	(19, 'Noah Clark', 'One Hundred Years of Solitude', '2024-07-06', '2024-07-21', 'Active'),
	(20, 'Olivia White', 'Madame Bovary', '2024-07-08', '2024-07-23', 'Active'),
	(21, 'Paul Evans', 'The Divine Comedy', '2024-07-10', '2024-07-25', 'Active'),
	(22, 'Quinn Brown', 'Great Expectations', '2024-07-12', '2024-07-27', 'Active'),
	(23, 'Ryan Smith', 'Jane Eyre', '2024-07-14', '2024-07-29', 'Active'),
	(24, 'Sophia Johnson', 'Wuthering Heights', '2024-07-16', '2024-07-31', 'Active'),
	(25, 'Thomas Clark', 'The Adventures of Huckleberry Finn', '2024-07-18', '2024-08-02', 'Active'),
	(26, 'Uma Green', 'Alice Adventures in Wonderland', '2024-07-20', '2024-08-04', 'Active'),
	(27, 'Victor Harris', 'The Picture of Dorian Gray', '2024-07-22', '2024-08-06', 'Active'),
	(28, 'Will Brown', 'Heart of Darkness', '2024-07-24', '2024-08-08', 'Active'),
	(29, 'Xena Johnson', 'Les Misérables', '2024-07-26', '2024-08-10', 'Active'),
	(30, 'Yara Clark', 'Frankenstein', '2024-07-28', '2024-08-12', 'Active'),
	(31, 'Zack White', 'The Count of Monte Cristo', '2024-07-30', '2024-08-14', 'Active'),
	(32, 'Amber Evans', 'Dracula', '2024-08-01', '2024-08-16', 'Active'),
	(33, 'Brian Green', 'The Scarlet Letter', '2024-08-03', '2024-08-18', 'Active'),
	(34, 'Catherine Harris', 'Gulliver\'s Travels', '2024-08-05', '2024-08-20', 'Active'),
	(35, 'Daniel Johnson', 'The Grapes of Wrath', '2024-08-07', '2024-08-22', 'Active'),
	(36, 'Ella Clark', 'Slaughterhouse-Five', '2024-08-09', '2024-08-24', 'Active'),
	(37, 'Finn Brown', 'Catch-22', '2024-08-11', '2024-08-26', 'Active'),
	(38, 'Grace Smith', 'Lord of the Flies', '2024-08-13', '2024-08-28', 'Active'),
	(39, 'Hannah Johnson', 'Of Mice and Men', '2024-08-15', '2024-08-30', 'Active'),
	(40, 'Ian Clark', 'Fahrenheit 451', '2024-08-17', '2024-09-01', 'Active'),
	(41, 'Jack White', 'Animal Farm', '2024-08-19', '2024-09-03', 'Active'),
	(42, 'Kelly Evans', '1984', '2024-08-21', '2024-09-05', 'Active'),
	(43, 'sabdha', 'jujutsu kaisen', '2024-07-01', '2024-07-31', 'Active');

-- membuang struktur untuk table libraryadmin.loan_history
CREATE TABLE IF NOT EXISTS `loan_history` (
  `loan_id` int NOT NULL AUTO_INCREMENT,
  `member_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `loan_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('returned','late') DEFAULT 'returned',
  PRIMARY KEY (`loan_id`),
  KEY `member_id` (`member_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `loan_history_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  CONSTRAINT `loan_history_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.loan_history: ~4 rows (lebih kurang)
INSERT INTO `loan_history` (`loan_id`, `member_id`, `book_id`, `loan_date`, `return_date`, `status`) VALUES
	(1, 1, 1, '2023-05-01', '2023-05-15', 'returned'),
	(2, 2, 2, '2023-05-05', '2023-05-19', 'late'),
	(3, 3, 3, '2023-05-10', '2023-05-24', 'returned'),
	(4, 4, 4, '2023-05-15', '2023-05-29', 'returned');

-- membuang struktur untuk table libraryadmin.lost_damaged_books
CREATE TABLE IF NOT EXISTS `lost_damaged_books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_id` int DEFAULT NULL,
  `status` enum('lost','damaged') NOT NULL,
  `details` text,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `lost_damaged_books_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.lost_damaged_books: ~2 rows (lebih kurang)
INSERT INTO `lost_damaged_books` (`id`, `book_id`, `status`, `details`) VALUES
	(1, 1, 'lost', 'Lost by a member in June 2023'),
	(2, 2, 'damaged', 'Damaged cover');

-- membuang struktur untuk table libraryadmin.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.members: ~4 rows (lebih kurang)
INSERT INTO `members` (`id`, `name`, `email`, `phone`, `address`) VALUES
	(1, 'John Doe', 'john.doe@example.com', '123-456-7890', '123 Main St'),
	(2, 'Jane Smith', 'jane.smith@example.com', '234-567-8901', '456 Elm St'),
	(3, 'Alice Johnson', 'alice.johnson@example.com', '345-678-9012', '789 Oak St'),
	(4, 'Bob Brown', 'bob.brown@example.com', '456-789-0123', '101 Pine St');

-- membuang struktur untuk table libraryadmin.most_active_members
CREATE TABLE IF NOT EXISTS `most_active_members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_id` int DEFAULT NULL,
  `borrow_count` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `most_active_members_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.most_active_members: ~4 rows (lebih kurang)
INSERT INTO `most_active_members` (`id`, `member_id`, `borrow_count`) VALUES
	(1, 1, 5),
	(2, 2, 4),
	(3, 3, 3),
	(4, 4, 2);

-- membuang struktur untuk table libraryadmin.most_borrowed_books
CREATE TABLE IF NOT EXISTS `most_borrowed_books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_id` int DEFAULT NULL,
  `borrow_count` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `most_borrowed_books_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.most_borrowed_books: ~4 rows (lebih kurang)
INSERT INTO `most_borrowed_books` (`id`, `book_id`, `borrow_count`) VALUES
	(1, 1, 5),
	(2, 2, 3),
	(3, 3, 2),
	(4, 4, 4);

-- membuang struktur untuk table libraryadmin.total_books_by_category
CREATE TABLE IF NOT EXISTS `total_books_by_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `total_count` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.total_books_by_category: ~5 rows (lebih kurang)
INSERT INTO `total_books_by_category` (`id`, `category`, `total_count`) VALUES
	(1, 'Fiction', 1),
	(2, 'Dystopian', 1),
	(3, 'Classic', 2),
	(4, 'Adventure', 1),
	(5, 'Romance', 1);

-- membuang struktur untuk table libraryadmin.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel libraryadmin.users: ~0 rows (lebih kurang)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
	(1, 'Arthur', 'arthur@gmail.com', '$2y$10$Wj5xexLg/FossliqSzjViO/eYNHEEGTNqxbcNp7WO0I9LmzLTPIJK', 'user', '2024-07-01 09:41:07');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
