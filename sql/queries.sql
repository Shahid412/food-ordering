-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 09:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foms`
--

--
-- Complex queries
--

SELECT od.order_id, od.price, od.qty, od.discount, od.total, c.name, p.p_name, o.dated, o.pay_type, u.username
	FROM order_details od 
	INNER JOIN orders o 
	ON od.order_id=o.order_id
	INNER JOIN customers c
	ON o.c_id=c.c_id
	INNER JOIN products p
	ON od.p_id=p.prod_id 
	INNER JOIN users u
	ON od.u_id=u.u_id 
	WHERE p.p_name LIKE '%$query%'
	;

SELECT products.prod_id, 
	products.p_name, 
	products.ppu, 
	products.des, 
	suppliers.sup_name
	FROM products
	INNER JOIN suppliers 
	ON products.sup_id=suppliers.sup_id 
	WHERE products.name LIKE '%$pname%';

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `name`, `address`, `phone`, `type`) VALUES
(1, 'Kaveat', 'Libya', '838 882 883', 'D'),
(2, 'Beccar', 'Bosnia', '283 882 773', 'W'),
(3, 'Cesar', 'Syria', '253 823 123', 'W'),
(4, 'Gullich', 'Indiana', '929 300 3882', 'W'),
(5, 'Ficher', 'Alaska', '122 333 223', 'W'),
(6, 'Loclu', 'Netherlands', '333 452 332', 'W'),
(7, 'Voiley Brey', 'Georgia', '8877 44 2232', 'D');

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `name`, `address`, `phone`, `sal`) VALUES
(1, 'Ali', 'DC', '3999 334 33883', 4000),
(2, 'Billar Mic', 'Bissoura', '3999 223 4442', 2350),
(3, 'Khicher Naz', 'Canada', '422 223 6593', 4300),
(4, 'Wadic Bila', 'Asiana', '992 4182 2932', 3230),
(5, 'Kisar Arora', 'Jamaica City', '2004 4999 33', 2020),
(6, 'Jinger Kii', 'China', '8389 3939 388', 4883);

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `c_id`, `dated`, `pay_type`) VALUES
(1, 3, '2021-02-20', 'Bank'),
(2, 2, '2020-12-03', 'Cash'),
(3, 4, '2021-01-09', 'Cash'),
(4, 3, '2020-05-22', 'Bank'),
(5, 1, '2021-04-02', 'Check'),
(6, 5, '2021-07-17', 'Cash'),
(7, 2, '2021-04-12', 'cash');

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `p_id`, `u_id`, `price`, `qty`, `discount`, `total`) VALUES
(1, 4, 5, 150, 100, 200, 14800),
(2, 3, 5, 85, 40, 70, 3330),
(6, 2, 6, 100, 4, 10, 390),
(3, 4, 1, 150, 30, 0, 450),
(4, 6, 7, 120, 3, 4, 356),
(5, 1, 1, 130, 100, 400, 12600),
(7, 1, 1, 120, 5, 50, 550);

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `p_name`, `ppu`, `des`, `sup_id`) VALUES
(1, 'Pizza', 100, '', 2),
(2, 'Zinger', 80, 'A normal burger', 4),
(3, 'Shwarma', 60, 'Spicy', 1),
(4, 'Fajita', 110, '', 3),
(5, 'Finger Chips', 50, 'Medium size', 3),
(6, 'Salad', 95, 'All fruits', 4);

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sup_id`, `sup_name`, `address`, `phone`) VALUES
(1, 'Gisselle Traders', 'Bhutan', '828 38838 229'),
(2, 'Normal Diet', 'Dilas', '3883 22399 2299'),
(3, 'Healthy Foods Ltd', 'Arabia', '3884 38820 299'),
(4, 'The Extra Food', 'London', '3280 2993 39993'),
(5, 'Handy Area', 'Jaikababad', '328 392 3239'),
(6, 'Good Foodies', 'America', '399 3929 39929'),
(7, 'Hichki Foodies', 'Bangladesh', '8383 38848 039');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `name`, `username`, `password`) VALUES
(1, 'Alanaidur Binda', 'abinda', '3eqiDI39@d'),
(2, 'Mike Sone', 'msone', 'wi283D9(@dd'),
(3, 'Jay Bakhs', 'jabi', 'eii39@k)D0w'),
(4, 'Kamalia Bahhoo', 'kaboo', 'wiwqw9EQWw8q'),
(5, 'Didar Didar', 'didardidar', 'eo))@9e82kDs'),
(6, 'Jakob Sandy', 'jsandy', 'ws@ddSef&972'),
(7, 'Biship Dilas', 'bdlas', 'dao(DFF@29'),
(8, 'Killer bee', 'kbee', '9e9e3qD#a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
