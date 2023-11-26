CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `date_time` date NOT NULL
)

CREATE TABLE `user_documents` (
  `id` int(10) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `uploaded_at` date NOT NULL,
  `user_id` int,
   FOREIGN KEY (user_id) REFERENCES users(id)
)