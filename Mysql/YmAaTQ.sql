CREATE TABLE `admission` (
  `admission_id` int(11) PRIMARY KEY AUTO_INCREMENT,--Primary Key
  `std_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `admission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `admission`
  ADD CONSTRAINT `admission_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

CREATE TABLE `course` (
  `course_id` int(11) PRIMARY KEY AUTO_INCREMENT, --Primary Key
  `course_name` varchar(255) DEFAULT NULL,
  `course_duration` varchar(255) DEFAULT NULL,
  `course_fees` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `exam` (
  `exam_id` int(11) PRIMARY KEY AUTO_INCREMENT, --Primary key
  `exam_name` varchar(100) DEFAULT NULL,
  `exam_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `exam_status` varchar(100) DEFAULT 'Pending',
  `student_id` int(11) DEFAULT NULL,
  `FOREIGN KEY`(student_id) REFERENCES admission(admission_id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `admission` (`admission_id`);

CREATE TABLE books(
	book_id int(11) PRIMARY KEY AUTO_INCREMENT,
  book_name varchar(250),
  book_qty int (11)
);



CREATE TABLE issued_books(
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    student_id int(11),
    book_issued_date timestamp,
    book_id int(11)
)
ALTER TABLE `issued_books`
  ADD CONSTRAINT `2` FOREIGN KEY (`student_id`) REFERENCES `admission` (`admission_id`);
  ADD CONSTRAINT `1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);


CREATE TABLE `orders` (
  `order_id` int(11) PRIMARY KEY AUTO_INCREMENT,--Primary key
  `p_name` varchar(255) DEFAULT NULL,
  `p_price` int(11) DEFAULT NULL,
  `p_qty` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `registers` (`id`);

CREATE TABLE `registers` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT, --Primary key
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `salry` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `admission` (`admission_id`, `std_name`, `email`, `course_id`, `admission_date`) VALUES
(1, 'Abc', 'Abc@gmail.com', 1, '2024-04-06 05:08:51'),
(2, 'Junaid', 'Junaid@gmail.com', 2, '2024-04-06 05:10:35');

INSERT INTO `course` (`course_id`, `course_name`, `course_duration`, `course_fees`) VALUES
(1, 'CPISM', '6 Months', 9000),
(2, 'DISM', '1 Year', 9000);


INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_date`, `exam_status`, `student_id`) VALUES
(1, 'Mid Term Exam', '2024-04-15 04:40:40', 'Pending', 1);


INSERT INTO `orders` (`order_id`, `p_name`, `p_price`, `p_qty`, `u_id`, `order_date`) VALUES
(1, 'Men Causel Dress', 3500, 1, 1, '2024-04-06 04:50:57'),
(2, 'Bata Shoes', 4500, 1, 2, '2024-04-06 04:52:50');

INSERT INTO `registers` (`id`, `name`, `email`, `password`, `city`, `dob`, `status`, `salry`, `bonus`) VALUES
(1, 'Abc Ahmed', 'Abc@gmail.com', 'Abc123', 'DHA', '1995-01-01', 'Verified', 60000, 3000),
(2, 'Majid Arshad', 'Majid@gmail.com', 'Majid321', 'Hyderabad', '1995-02-01', 'Pending', 60000, 5000),
(3, 'Bilal Khan', 'Bilal@gmail.com', 'Bilal321', 'DHA', '1995-03-01', 'Verified', 80000, 7000),
(4, 'Junaid Akram', 'Junaid@gmail.com', 'Junaid321', 'Saddar', '1995-04-01', 'Verified', 70000, 7000),
(5, 'Ahmed Mustafa', 'Ahmed@gmail.com', 'Ahmed321', 'Shah Faisal', '1995-04-01', 'Verified', 90000, 10000);
