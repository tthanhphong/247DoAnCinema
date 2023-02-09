-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 09:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `247cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`, `email`, `address`) VALUES
(2, 'admin1', '$2y$10$TMlrkL0JfnZiHsGygWFKkudMCKZ1ggWG98RrXovourzZjLBBq6ykW', '', ''),
(3, 'admin2', '$2y$10$kOcutt.P0FbJXe9PjO.HV.rp.QK71AHaK6NkdHbbhU9vIVNiKcHQe', '', ''),
(6, 'admin3', '$2y$10$W694btVbNBCoeFJ0EO9KTuaPM/TU0SjxLCb7czFwITS2y/Lkt24OW', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `no_ticket` int(11) NOT NULL,
  `seat_dt_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `total_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `cust_id`, `show_id`, `no_ticket`, `seat_dt_id`, `booking_date`, `total_amount`) VALUES
(21, 3, 2, 5, 24, '2022-11-26', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `location`, `city`) VALUES
(1, 'Trung Tâm Thương Mại Vạn Hạnh', '11 Sư Vạn Hạnh, Phường 12, Quận 10, Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh'),
(2, 'Vincom Thủ Đức11', '216 Đ. Võ Văn Ngân, Bình Thọ, Thủ Đức, Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh'),
(3, 'Emart Sala', '10 Đ. Mai Chí Thọ, Thủ Thiêm, Thành Phố Thủ Đức, Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh'),
(4, ' Landmark 81', '720A Điện Biên Phủ, Vinhomes Tân Cảng, Bình Thạnh, Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh'),
(5, ' Landmark 81', '720A Điện Biên Phủ, Vinhomes Tân Cảng, Bình Thạnh, Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh'),
(7, ' Landmark 81', '720A Điện Biên Phủ, Vinhomes Tân Cảng, Bình Thạnh, Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh'),
(8, ' Landmark 81', '720A Điện Biên Phủ, Vinhomes Tân Cảng, Bình Thạnh, Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `msg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `number`, `message`, `msg_date`) VALUES
(12, ' Trần Thanh Phong', 'ttp15112001@gmail.com', 907703638, '123', '2022-11-09'),
(13, ' Trần Thanh Phong', 'ttp15112001@gmail.com', 907703638, '1212121', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `password`, `email`, `address`) VALUES
(1, 'Trần Thanh Bảo', '123123', 'ttp15112001@gmail.com', 'P.Dương Đông, TP.Phú Quốc, Kiên Giang'),
(3, 'Phạm Bạch Minh Trí', '123123', 'ttp15112001@gmail.com1', 'P.Dương Đông, TP.Phú Quốc, Kiên Giang'),
(6, ' Nguyễn Thanh Đạt', '123123', 'thanhdatpqkg23@gmail.com1', 'P.Dương Đông, TP.Phú Quốc, Kiên Giang'),
(7, ' Trần Thanh Huy', '123123', 'ttp15112001@gmail.com2', 'phú quốc kiên giang');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `genre_name`) VALUES
(1, 'Kinh Dị'),
(2, 'Hài Hước'),
(3, 'Hành Động'),
(5, ' Tình Yêu');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `industry_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `industry_name`) VALUES
(1, 'Japan '),
(2, 'Hollywood'),
(5, 'Indian\r\n'),
(7, ' American');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`) VALUES
(1, 'VietNamese'),
(2, 'Japanes'),
(3, 'English\r\n'),
(5, ' Indian');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `movie_banner` varchar(255) NOT NULL,
  `movie_desc` varchar(255) NOT NULL,
  `rel_date` date NOT NULL,
  `industry_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `movie_banner`, `movie_desc`, `rel_date`, `industry_id`, `genre_id`, `lang_id`, `duration`) VALUES
(1, 'FEARLESS LOVE ', 'images/fearrlesslove.jpg', 'Din và Ploy - một đôi Youtuber đang rạn nứt, chưa kịp dứt thì lại được book ngay một job quảng cáo nhẫn kim cương. Nhịn nhau không nổi nhưng đổi lại có tiếng có miếng nên cả 2 lại bắt tay để diễn cho xong chiếc video cuối này. Vlog đáng lẽ phải ngập tràn ', '2022-12-31', 5, 2, 5, '1h 28m'),
(2, 'THE MENU', 'images/thement.jpg', 'Thực Đơn Bí Ẩn (The Menu) kể về một cặp đôi trẻ Margot (Anya Taylor-Joy) và Tyler (Nicholas Hoult), lên thuyền du lịch đến một hòn đảo tách biệt để thưởng thức món ăn tại một nhà hàng năm sao Hawthorne, do bếp trưởng Slowik (Ralph Fiennes) điều hành. Tại ', '2022-12-12', 2, 3, 1, '1h 58m'),
(3, 'THE OTHER CHILD', 'images/theotherchild.jpg', 'Hyun Woo chọn cách nhận nuôi Isaac để vượt qua nỗi đau mất con sau một tai nạn thảm khốc. Oan nghiệt thay, Isaac lại là một đứa bé sở hữu đôi mắt âm dương có thể thấy được người cõi âm. Năng lực đặc biệt hay lời nguyền ám ảnh sẽ giáng lên cuộc sống của gi', '2022-12-12', 2, 3, 1, '2h 27m'),
(4, 'DON\'T LOOK AT THE DEMON', 'images/dontlook.jpg', 'Nghi Thức Cấm đưa khán giả theo chân một nhóm bắt ma nổi tiếng - The Skeleton tới Malaysia để tìm hiểu về những sự kì bí trong ngồi nhà. Những tưởng vụ việc này cũng suôn sẻ như những căn nhà ma ám khác, nhưng không ngờ họ lại vô tình chọc giận một thế lự', '2022-12-12', 2, 1, 3, '2h 11m'),
(7, 'ONE PIECE FILM RED', 'images/onepiece.jpg', 'Bối cảnh của One Piece Film Red là một hòn đảo âm nhạc Elegia - nơi diva nổi tiếng bậc nhất thế giới tên Uta thực hiện buổi biểu diễn trực tiếp đầu tiên trước công chúng. Băng hải tặc Mũ Rơm và các fan khác của Uta từ nhiều thế lực khác nhau như hải tặc h', '2022-11-26', 1, 3, 2, '2h 11m'),
(8, 'BLACK PANTHER: WAKANDA FOREVER', 'images/blackpanther.jpg', 'Dường như Black Panther/ T’Challa đã qua đời trong một sự kiện nào đó. Shuri (Letitia Wright), Okoye (Danai Gurira) lẫn nữ hoàng Ramonda (Angela Bassett) đều đau đớn và không cầm được nước mắt. Sau sự ra đi của Chadwick Boseman, Kevin Feige quyết định khô', '2022-11-26', 1, 2, 3, '2h 11m'),
(9, 'LYLE, LYLE, CROCODILE', 'images/lylelyle.jpg', 'Khi gia đình Primm chuyển đến thành phố New York, cậu con trai nhỏ Josh gặp khó khăn trong việc thích nghi với ngôi trường và những người bạn mới. Mọi thứ thay đổi khi cậu bé phát hiện ra ra Lyle - một chàng cá sấu mê tắm rửa, trứng cá muối và âm nhạc sốn', '2022-11-26', 2, 2, 3, '2h 27m'),
(10, 'HẠNH PHÚC MÁU', 'images/hanhphucmau.jpg', 'Hạnh Phúc Máu kể về cuộc đời của Hà Phương (NSND Kim Xuân) và câu chuyện gia tộc Vương Đình với một đức tin lạ vận hành niềm tin, sự thịnh vượng của gia tộc. Vào sự kiện quan trọng của gia tộc hàng loạt thảm kịch xảy ra. Sự thật trần trụi về những người c', '2022-11-26', 1, 3, 2, '2h 27m'),
(11, 'AROUND THE WORLD IN 80 DAYS', 'images/aroundtheworld.jpg', 'Phim kể về chuyến chu du của cặp đôi “bất đắc dĩ\" Khỉ Con và Ếch Bảnh. Chặng đường đầy gian nan nhưng cũng có vô số cảnh đẹp mãn nhãn. Họ phiêu lưu từ rừng rậm sâu thẳm, đại dương rộng lớn cho tới sa mạc nắng gắt. Trên chuyến hành trình này, Khỉ Con và Ếc', '2022-11-15', 2, 2, 2, '1h 28m'),
(12, 'BLACK ADAM', 'images/blackadam.jpg', 'Black Adam được các fan truyện tranh biết đến nhiều nhất trong vai trò kẻ thù - đối thủ lớn nhất của siêu anh hùng Shazam của vũ trụ truyện tranh và điện ảnh DC. Theo nhiều phiên bản truyện, nếu như người được chọn hô to câu thần chú “Shazam!” sẽ lập tức ', '2022-11-23', 2, 2, 3, '1h 28m');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `img_path`, `alt`) VALUES
(1, 'images/tt1.jpg', ''),
(2, 'images/tt2.jpg', ''),
(3, 'images/tt3.jpg', ''),
(4, 'images/tt4.jpg', ''),
(5, 'images/tt5.jpg', ''),
(6, 'images/tt6.jpg', ''),
(7, 'images/tt7.jpg', ''),
(8, 'images/tt8.jpg', ''),
(9, 'images/tt10.jpg', ''),
(10, 'images/tt11.jpg', ''),
(11, 'images/tt12.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `seat_detail`
--

CREATE TABLE `seat_detail` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `seat_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat_detail`
--

INSERT INTO `seat_detail` (`id`, `cust_id`, `show_id`, `seat_no`) VALUES
(24, 3, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `seat_reserved`
--

CREATE TABLE `seat_reserved` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `seat_number` varchar(255) NOT NULL,
  `reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat_reserved`
--

INSERT INTO `seat_reserved` (`id`, `show_id`, `cust_id`, `seat_number`, `reserved`) VALUES
(42, 2, 3, 'R4S5', 0),
(43, 2, 3, 'R5S5', 0),
(44, 2, 3, 'R6S5', 0),
(45, 2, 3, 'R7S5', 0),
(46, 2, 3, 'R8S5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `show`
--

CREATE TABLE `show` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time_id` int(11) NOT NULL,
  `no_seat` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `ticket_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `show`
--

INSERT INTO `show` (`id`, `movie_id`, `show_date`, `show_time_id`, `no_seat`, `cinema_id`, `ticket_price`) VALUES
(1, 1, '2022-12-17', 4, 50, 4, 7000),
(2, 2, '2022-12-30', 4, 50, 1, 400),
(3, 3, '2022-12-30', 4, 50, 1, 400),
(4, 4, '2022-12-22', 4, 50, 2, 400),
(11, 7, '2022-11-25', 3, 50, 2, 400),
(12, 9, '2022-11-19', 4, 100, 1, 80),
(13, 10, '2022-11-26', 4, 70, 1, 300),
(14, 11, '2022-11-18', 4, 100, 1, 350),
(15, 12, '0000-00-00', 6, 100, 1, 450),
(16, 2, '0000-00-00', 5, 200, 8, 450),
(18, 7, '2022-12-31', 5, 700, 7, 350),
(171, 7, '0000-00-00', 6, 700, 1, 800);

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`id`, `time`) VALUES
(2, '3:00 PM - 1:30 PM'),
(3, '6:00 PM - 8:00 PM'),
(4, '8:30 PM - 10:30 PM'),
(5, '8:00 PM - 10:00 PM'),
(6, '11:00 PM - 1:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img_path`, `alt`) VALUES
(1, 'images/banner1.jpg', 'Banner1'),
(2, 'images/banner2.jpg', 'Second Slide\n'),
(3, 'images/banner3.jpg', 'Third Slide\r\n'),
(8, 'images/banner4.jpg', 'bannner4'),
(10, 'images/banner1.jpg', 'bannner5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `seat_dt_id` (`seat_dt_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `industry_id` (`industry_id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat_detail`
--
ALTER TABLE `seat_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indexes for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `show`
--
ALTER TABLE `show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `show_time_id` (`show_time_id`);

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seat_detail`
--
ALTER TABLE `seat_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `show`
--
ALTER TABLE `show`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`seat_dt_id`) REFERENCES `seat_detail` (`id`);

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`),
  ADD CONSTRAINT `movie_ibfk_3` FOREIGN KEY (`lang_id`) REFERENCES `language` (`id`);

--
-- Constraints for table `seat_detail`
--
ALTER TABLE `seat_detail`
  ADD CONSTRAINT `seat_detail_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `seat_detail_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`);

--
-- Constraints for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD CONSTRAINT `seat_reserved_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`),
  ADD CONSTRAINT `seat_reserved_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `show`
--
ALTER TABLE `show`
  ADD CONSTRAINT `show_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `show_ibfk_3` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`),
  ADD CONSTRAINT `show_ibfk_4` FOREIGN KEY (`show_time_id`) REFERENCES `show_time` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
