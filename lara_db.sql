-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 08:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonus_penalize`
--

CREATE TABLE `bonus_penalize` (
  `id` int(11) NOT NULL COMMENT 'mã kt_kl',
  `bp_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên kt_kl',
  `bp_amount` int(11) NOT NULL COMMENT 'mức kt_kl'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bonus_penalize`
--

INSERT INTO `bonus_penalize` (`id`, `bp_name`, `bp_amount`) VALUES
(1, 'Vắng không phép', -150000),
(2, 'Hoàn thành tốt công ', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `bonus_penalize_details`
--

CREATE TABLE `bonus_penalize_details` (
  `u_id` int(11) NOT NULL,
  `bp_id` int(11) NOT NULL,
  `bp_date` date NOT NULL,
  `bp_note` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL COMMENT 'mã phòng',
  `e_id` int(11) NOT NULL COMMENT 'mã đơn vị',
  `d_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên phòng',
  `d_phone` int(11) NOT NULL COMMENT 'sđt phòng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `e_id`, `d_name`, `d_phone`) VALUES
(1, 9, 'Đài 1090', 3888111),
(2, 9, 'Phòng Công nghệ thông tin', 3888222),
(3, 9, 'Phòng Kế hoạch - Đầu tư', 3888333),
(4, 9, 'Phòng Kế toán', 3888444),
(5, 9, 'Phòng Chăm sóc khách hàng', 3888555),
(6, 9, 'Phòng Khách hàng Doanh nghiệp', 3888666),
(7, 9, 'Phòng Nhân sự', 3888777),
(8, 9, 'Phòng Tổ chức - Hành chính', 3888888),
(9, 9, 'Phòng Kênh phân phối', 3888999);

-- --------------------------------------------------------

--
-- Table structure for table `enterprise`
--

CREATE TABLE `enterprise` (
  `id` int(11) NOT NULL COMMENT 'mã đơn vị',
  `e_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên đơn vị',
  `e_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ đơn vị',
  `e_phone` int(11) DEFAULT NULL COMMENT 'sđt đơn vị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enterprise`
--

INSERT INTO `enterprise` (`id`, `e_name`, `e_address`, `e_phone`) VALUES
(1, 'Công ty dịch vụ khu vực 1', 'Duy Tân, số 5/82 đường Duy Tân, Quận Cầu Giấy, TP. Hà Nội.', 432123440),
(2, 'Công ty dịch vụ khu vực 2', 'MM 18, đường Trường Sơn, phường 14, Quận 10, TP. HCM.', 0),
(3, 'Công ty dịch vụ khu vực 3', 'Số 586 Nguyễn Hữu Thọ, phường Khuê Trung, quận Cẩm Lệ, thành phố Đà Nẵng.', 0),
(4, 'Công ty dịch vụ khu vực 4', 'Khu Đồng Mạ, đường Nguyễn Tất Thành, phường Tiên Cát, TP Việt Trì, tỉnh Phú Thọ.', 0),
(5, 'Công ty dịch vụ khu vực 5', 'khu Phú Hải, phường Anh Dũng, quận Dương Kinh, TP Hải Phòng.', 0),
(6, 'Công ty dịch vụ khu vực 6', 'Số 34 đường Nguyễn Sỹ Sách, TP Vinh, tỉnh Nghệ An.', 0),
(7, 'Công ty dịch vụ khu vực 7', 'Số 16, đường Trường Chinh, Phường Tân Lợi, TP. Buôn Ma Thuột, tỉnh Đắk Lắk.', 0),
(8, 'Công ty dịch vụ khu vực 8', '236A Phan Trung, Tân Tiến, TP. Biên Hòa, tỉnh Đồng Nai.', 0),
(9, 'Công ty dịch vụ khu vực 9', 'khu Công ty xây dựng số 8, đường số 22, phường Hưng Thạnh, quận Cái Răng, TP. Cần Thơ.', 0),
(10, 'Văn phòng tổng công ty', 'Số 01 Phố Phạm Văn Bạch, Yên Hòa, Cầu Giấy, Hà Nội.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `foreign_language`
--

CREATE TABLE `foreign_language` (
  `id` int(11) NOT NULL COMMENT 'Mã ngoại ngữ',
  `fl_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên ngoại ngữ',
  `fl_level` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'trình độ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `foreign_language`
--

INSERT INTO `foreign_language` (`id`, `fl_name`, `fl_level`) VALUES
(1, 'English', 'A1'),
(2, 'English', 'A2'),
(3, 'English', 'B1'),
(4, 'English', 'B2'),
(5, 'English', 'C1'),
(6, 'English', 'C2');

-- --------------------------------------------------------

--
-- Table structure for table `literacy`
--

CREATE TABLE `literacy` (
  `id` int(11) NOT NULL COMMENT 'Mã trình độ học vấn',
  `l_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên trình độ học vấn',
  `note` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ghi chú'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `literacy`
--

INSERT INTO `literacy` (`id`, `l_name`, `note`) VALUES
(1, 'Trung học phổ thông', 'Đã tốt nghiệp cấp 3'),
(2, 'Đại học', 'Đã tốt nghiệp đại học'),
(3, 'Thạc sĩ', 'Đã tốt nghiệp thạc sĩ'),
(4, 'Tiến sĩ', 'Đã tốt nghiệp tiến sĩ'),
(5, 'Phó Giáo sư - Tiến s', ''),
(6, 'Giáo sư', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_04_07_040739_attendance_log', 1),
(2, '2022_04_07_042414_time_keeping', 2);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL COMMENT 'mã quan hệ',
  `re_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tên người có quan hệ',
  `re_gender` int(11) DEFAULT NULL COMMENT 'giới tính',
  `re_ship` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'quan hệ với nhân viên',
  `re_phone` int(10) DEFAULT NULL COMMENT 'số điện thoại',
  `re_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL COMMENT 'Mã chức vụ',
  `p_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tên chức vụ',
  `basic_salary` int(11) DEFAULT NULL COMMENT 'lương cơ bản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `p_name`, `basic_salary`) VALUES
(1, 'Giám đốc', 30000000),
(2, 'Phó giám đốc', 25000000),
(3, 'Trưởng phòng', 18000000),
(4, 'Phó phòng', 15000000),
(5, 'Trưởng đài', 18000000),
(6, 'Nhân viên', 10000000),
(7, 'Bảo vệ', 2000000),
(8, 'Tạp vụ', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL COMMENT 'mã vai trò',
  `r_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên vai trò'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL COMMENT 'mã lương',
  `level` int(11) NOT NULL COMMENT 'bậc',
  `coefficient_salary` float DEFAULT NULL COMMENT 'hệ số lương'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `level`, `coefficient_salary`) VALUES
(1, 1, 1.86),
(2, 2, 2.06),
(3, 3, 2.26),
(4, 4, 2.46),
(5, 5, 2.66),
(6, 6, 2.86),
(7, 7, 3.06),
(8, 8, 3.26),
(9, 9, 3.46),
(10, 10, 3.66),
(11, 11, 3.86),
(12, 12, 4.06);

-- --------------------------------------------------------

--
-- Table structure for table `salary_payment`
--

CREATE TABLE `salary_payment` (
  `id` int(11) NOT NULL COMMENT 'mã phát lương',
  `u_id` int(11) DEFAULT NULL COMMENT 'mã nhân viên',
  `net_salary` int(11) DEFAULT NULL COMMENT 'lương',
  `date` datetime DEFAULT NULL COMMENT 'ngày nhận lương'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technique`
--

CREATE TABLE `technique` (
  `id` int(11) NOT NULL COMMENT 'mã kỹ năng',
  `t_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên kỹ năng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `technique`
--

INSERT INTO `technique` (`id`, `t_name`) VALUES
(1, 'Lập trình'),
(2, 'Phân tích thiết kế h'),
(3, 'Thiết kế giao diện'),
(4, 'Xử lý dữ liệu'),
(5, 'Thiết kế cơ sở dữ li');

-- --------------------------------------------------------

--
-- Table structure for table `time_keeping`
--

CREATE TABLE `time_keeping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time_keeping`
--

INSERT INTO `time_keeping` (`id`, `u_id`, `total`, `created_at`, `updated_at`) VALUES
(102, 1, 26, '2022-03-07 02:14:02', '2022-03-07 02:14:02'),
(103, 2, 26, '2022-03-07 02:14:02', '2022-03-07 02:14:02'),
(104, 3, 25, '2022-03-07 02:14:02', '2022-03-07 02:14:02'),
(105, 4, 23, '2022-03-07 02:14:02', '2022-03-07 02:14:02'),
(106, 5, 26, '2022-03-07 02:14:02', '2022-03-07 02:14:02'),
(107, 6, 26, '2022-03-07 02:14:02', '2022-03-07 02:14:02'),
(108, 7, 26, '2022-03-07 02:14:02', '2022-03-07 02:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'mã nhân viên',
  `t_id` int(11) NOT NULL COMMENT 'mã kỹ năng',
  `p_id` int(11) NOT NULL COMMENT 'mã chức vụ',
  `l_id` int(11) NOT NULL COMMENT 'mã trình độ học vấn',
  `fl_id` int(11) NOT NULL COMMENT 'mã ngoại ngữ',
  `d_id` int(11) NOT NULL COMMENT 'mã phòng ban',
  `s_id` int(11) NOT NULL COMMENT 'mã hsl',
  `u_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên nhân viên',
  `u_gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'giới tính',
  `u_IDcode` int(11) NOT NULL COMMENT 'số CCCD',
  `u_IDcodedate` date NOT NULL COMMENT 'ngày cấp cccd',
  `u_IDcodeplace` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nơi cấp cccd',
  `u_dob` date NOT NULL COMMENT 'ngày sinh',
  `u_pob` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nơi sinh',
  `u_household` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'hộ khẩu thường trú',
  `u_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ thường trú',
  `u_phone` int(10) NOT NULL COMMENT 'số điện thoại',
  `u_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ email',
  `u_nationality` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'quốc tịch',
  `u_ethnic` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'dân tộc',
  `u_religion` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tôn giáo',
  `u_checkindate` date NOT NULL COMMENT 'ngày vào làm',
  `u_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'trạng thái',
  `u_avatar` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh đại diện',
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên tài khoản',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mật khẩu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `t_id`, `p_id`, `l_id`, `fl_id`, `d_id`, `s_id`, `u_name`, `u_gender`, `u_IDcode`, `u_IDcodedate`, `u_IDcodeplace`, `u_dob`, `u_pob`, `u_household`, `u_address`, `u_phone`, `u_email`, `u_nationality`, `u_ethnic`, `u_religion`, `u_checkindate`, `u_status`, `u_avatar`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 2, 3, 2, 4, 'Trần Thị Ba', '1', 987654321, '2018-03-04', 'Công an thành phố Cần Thơ', '1989-06-07', '1989-06-07', 'số 13, đường Nguyễn Trãi, phường Cái Khế, quận NK, TPCT', 'số 13, đường Nguyễn Trãi, phường Cái Khế, quận NK, TPCT', 932973176, 'tranb@gmail.com', 'Việt Nam', 'Kinh', 'Phật giáo', '2022-04-04', 'Choose...', 'DSC_0061.JPG', 'ttb', '$2y$10$gWabCj70vPPkOJtgN9JUsuL2LrrSFM6oN5fsreLkmnNOfJlwXGFp.', '2022-04-04 21:18:56', '2022-04-05 06:46:05'),
(2, 4, 6, 2, 3, 2, 4, 'Nguyễn Văn A', '0', 234567891, '2022-03-27', 'Hà Nội', '1976-03-21', '1976-03-21', 'cầu Giấy, Hà Nội', 'cầu Giấy, Hà Nội', 932973256, 'nvana@gmail.com', 'Việt Nam', 'Kinh', 'Không', '2022-04-03', 'Choose...', 'DSC_0061.JPG', 'vana', '$2y$10$xFkCEJN6RADU0FRnVRKaE.K8EkZc4ZBAql.e3jX1inmAFxSaffOEe', '2022-04-05 01:59:53', '2022-04-05 06:37:16'),
(3, 1, 3, 3, 4, 2, 7, 'Lê Văn C', '0', 456789123, '2022-03-27', 'Công an thành phố Cần Thơ', '1989-12-31', '1989-12-31', 'số 149, đường CMT8, phường BHN, quận BT, TPCT', 'số 149, đường CMT8, phường BHN, quận BT, TPCT', 932973197, 'lvanc@gmail.com', 'Việt Nam', 'Kinh', 'Không', '2022-04-05', 'Choose...', 'DSC_0061.JPG', 'levanc', '$2y$10$VM6JrXo5EwfulnDdwbcrR.sP62brQiEFn4TdSPXJoRT1vJ/t9XMq6', '2022-04-05 06:47:41', '2022-04-05 07:04:56'),
(4, 5, 6, 2, 4, 2, 3, 'Vũ Ngọc Huệ Trân', '1', 362537451, '2022-03-27', 'Công an thành phố Cần Thơ', '1999-09-06', '1999-09-06', '380 CMT8, Cần Thơ', '380 CMT8, Cần Thơ', 932973187, 'tranvnh@gmail.com', 'Việt Nam', 'Kinh', 'Công giáo', '2022-04-03', '', '', 'vnhtran', '$2y$10$YYfFFxrINfek/YkfCLXQDupk90yMiDXROySpbTmWXBwke1.22MJ/i', '2022-04-05 07:07:18', '2022-04-05 07:07:18'),
(5, 1, 6, 2, 2, 2, 3, 'Dương Thanh E', '0', 123765489, '2022-03-31', 'Hà Nội', '1987-03-04', '1987-03-04', 'cầu Giấy, Hà Nội', 'cầu Giấy, Hà Nội', 932973678, 'dthanhe@gmail.com', 'Việt Nam', 'Khmer', 'Không', '2022-04-03', '', '', 'dthanhe', '$2y$10$uoqFlKZbm0il6A3elgTovuCxUAJRs8HD6s7JlE7BBXFBBL/6zKgem', '2022-04-05 07:10:55', '2022-04-05 07:10:55'),
(6, 2, 6, 2, 2, 2, 3, 'Nguyễn Quang Hùng', '0', 765432198, '2021-10-13', 'Công an thành phố Cần Thơ', '1999-08-05', 'Cần Thơ', '156B Nguyễn Thông, Bình Thuỷ, Cần Thơ', '156B Nguyễn Thông, Bình Thuỷ, Cần Thơ', 762940721, 'nqhung@gmail.com', 'Việt Nam', 'Kinh', 'Không', '2022-04-06', '', '', 'nqhung', '$2y$10$1qD3P/oi28d0n/5ToAPETOpbNS9S0AsQXHQ7jo8nMYJ3bL81X6ZXm', '2022-04-05 19:21:08', '2022-04-05 19:21:08'),
(7, 2, 6, 2, 3, 2, 3, 'Vũ Duy', '0', 765894321, '2015-12-24', 'Công an thành phố Cần Thơ', '1995-12-24', 'Cần Thơ', 'Thốt nốt, Cần Thơ', 'Thốt nốt, Cần Thơ', 932973567, 'vuduy@gmail.com', 'Việt Nam', 'Kinh', 'Công giáo', '2021-12-28', '', '1649212604.JPG', 'vuduy', '$2y$10$nr0qRFYnynqjtK31ZKZLZOI6Jr4ckEzc1S0tDS3ckrPXn91GxG47C', '2022-04-05 19:36:44', '2022-04-05 19:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `working_hour_log`
--

CREATE TABLE `working_hour_log` (
  `id` int(11) NOT NULL COMMENT 'mã công',
  `u_id` int(11) DEFAULT NULL COMMENT 'mã nhân viên',
  `start_time` datetime NOT NULL COMMENT 'thời gian vào',
  `end_time` datetime NOT NULL COMMENT 'thời gian ra',
  `day` int(11) NOT NULL COMMENT 'ngày công',
  `month` int(11) NOT NULL COMMENT 'tháng ',
  `year` year(4) NOT NULL COMMENT 'năm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_contract`
--

CREATE TABLE `work_contract` (
  `id` int(11) NOT NULL COMMENT 'Mã hợp đồng',
  `u_id` int(11) NOT NULL COMMENT 'mã nhân viên',
  `w_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Loại hợp đồng',
  `start_date` datetime NOT NULL COMMENT 'ngày bắt đầu hợp đồng',
  `end_date` datetime NOT NULL COMMENT 'ngày kết thúc hợp đồng',
  `w_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'trạng thái của hợp đồng',
  `note` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ghi chú'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonus_penalize`
--
ALTER TABLE `bonus_penalize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_penalize_details`
--
ALTER TABLE `bonus_penalize_details`
  ADD PRIMARY KEY (`u_id`,`bp_id`),
  ADD KEY `fk_bp_user` (`bp_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enterprise` (`e_id`);

--
-- Indexes for table `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foreign_language`
--
ALTER TABLE `foreign_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `literacy`
--
ALTER TABLE `literacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `level` (`level`);

--
-- Indexes for table `salary_payment`
--
ALTER TABLE `salary_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_salarypayment` (`u_id`);

--
-- Indexes for table `technique`
--
ALTER TABLE `technique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_keeping`
--
ALTER TABLE `time_keeping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_keeping_u_id_foreign` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_position` (`p_id`),
  ADD KEY `fk_foreign_language` (`fl_id`),
  ADD KEY `fk_literacy` (`l_id`),
  ADD KEY `fk_technique` (`t_id`),
  ADD KEY `fk_dept_user` (`d_id`),
  ADD KEY `fk_salary` (`s_id`);

--
-- Indexes for table `working_hour_log`
--
ALTER TABLE `working_hour_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_working` (`u_id`);

--
-- Indexes for table `work_contract`
--
ALTER TABLE `work_contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_contract` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonus_penalize`
--
ALTER TABLE `bonus_penalize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã kt_kl', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã phòng', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã đơn vị', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `foreign_language`
--
ALTER TABLE `foreign_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã ngoại ngữ', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `literacy`
--
ALTER TABLE `literacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã trình độ học vấn', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã quan hệ';

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chức vụ', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã vai trò';

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã lương', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salary_payment`
--
ALTER TABLE `salary_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã phát lương';

--
-- AUTO_INCREMENT for table `technique`
--
ALTER TABLE `technique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã kỹ năng', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_keeping`
--
ALTER TABLE `time_keeping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã nhân viên', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `working_hour_log`
--
ALTER TABLE `working_hour_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã công';

--
-- AUTO_INCREMENT for table `work_contract`
--
ALTER TABLE `work_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hợp đồng';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bonus_penalize_details`
--
ALTER TABLE `bonus_penalize_details`
  ADD CONSTRAINT `fk_bp_user` FOREIGN KEY (`bp_id`) REFERENCES `bonus_penalize` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_bp` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_enterprise` FOREIGN KEY (`e_id`) REFERENCES `enterprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary_payment`
--
ALTER TABLE `salary_payment`
  ADD CONSTRAINT `fk_user_salarypayment` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_keeping`
--
ALTER TABLE `time_keeping`
  ADD CONSTRAINT `time_keeping_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_dept_user` FOREIGN KEY (`d_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_foreign_language` FOREIGN KEY (`fl_id`) REFERENCES `foreign_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_literacy` FOREIGN KEY (`l_id`) REFERENCES `literacy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_position` FOREIGN KEY (`p_id`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_salary` FOREIGN KEY (`s_id`) REFERENCES `salary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_technique` FOREIGN KEY (`t_id`) REFERENCES `technique` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `working_hour_log`
--
ALTER TABLE `working_hour_log`
  ADD CONSTRAINT `fk_user_working` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_contract`
--
ALTER TABLE `work_contract`
  ADD CONSTRAINT `fk_user_contract` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
