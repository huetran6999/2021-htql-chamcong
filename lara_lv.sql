-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2022 lúc 12:17 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lara_lv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bonus_penalize`
--

CREATE TABLE `bonus_penalize` (
  `id` int(11) NOT NULL COMMENT 'mã kt_kl',
  `bp_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên kt_kl',
  `bp_amount` int(11) NOT NULL COMMENT 'mức kt_kl'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bonus_penalize`
--

INSERT INTO `bonus_penalize` (`id`, `bp_name`, `bp_amount`) VALUES
(1, 'Vắng không phép', -150000),
(2, 'Hoàn thành tốt công ', 1500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bonus_penalize_details`
--

CREATE TABLE `bonus_penalize_details` (
  `u_id` int(11) NOT NULL,
  `bp_id` int(11) NOT NULL,
  `bp_date` date NOT NULL,
  `bp_note` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL COMMENT 'mã phòng',
  `e_id` int(11) NOT NULL COMMENT 'mã đơn vị',
  `d_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên phòng',
  `d_phone` int(11) NOT NULL COMMENT 'sđt phòng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`id`, `e_id`, `d_name`, `d_phone`) VALUES
(1, 9, 'Ban giám đốc', 3888990),
(2, 9, 'Phòng Công nghệ thông tin', 3888222),
(3, 9, 'Phòng Kế hoạch - Đầu tư', 3888333),
(4, 9, 'Phòng Kế toán', 3888444),
(5, 9, 'Phòng Chăm sóc khách hàng', 3888555),
(6, 9, 'Phòng Khách hàng Doanh nghiệp', 3888666),
(7, 9, 'Phòng Nhân sự', 3888777),
(8, 9, 'Phòng Tổ chức - Hành chính', 3888888),
(9, 9, 'Phòng Kênh phân phối', 3888999),
(10, 9, 'Đài 1090', 3888111),
(20, 1, 'Phòng Nhân Sự', 12345678);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enterprise`
--

CREATE TABLE `enterprise` (
  `id` int(11) NOT NULL COMMENT 'mã đơn vị',
  `e_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên đơn vị',
  `e_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ đơn vị',
  `e_phone` int(11) DEFAULT NULL COMMENT 'sđt đơn vị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `enterprise`
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
-- Cấu trúc bảng cho bảng `foreign_language`
--

CREATE TABLE `foreign_language` (
  `id` int(11) NOT NULL COMMENT 'mã ngoại ngữ',
  `f_name` varchar(50) NOT NULL COMMENT 'tên nn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `foreign_language`
--

INSERT INTO `foreign_language` (`id`, `f_name`) VALUES
(1, 'English - A1'),
(2, 'English - A2'),
(3, 'English - B1'),
(4, 'English - B2'),
(5, 'English - C1'),
(6, 'English - C2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `literacy`
--

CREATE TABLE `literacy` (
  `id` int(11) NOT NULL COMMENT 'Mã trình độ học vấn',
  `u_id` int(11) NOT NULL COMMENT 'mã nhân viên',
  `l_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên trình độ học vấn',
  `l_major` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ngành học',
  `l_grading` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'xếp loại',
  `l_graduation_school` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'trường tốt nghiệp',
  `l_graduation_year` year(4) DEFAULT NULL COMMENT 'năm tốt nghiệp',
  `l_other_major` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ghi chú'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `literacy`
--

INSERT INTO `literacy` (`id`, `u_id`, `l_name`, `l_major`, `l_grading`, `l_graduation_school`, `l_graduation_year`, `l_other_major`, `note`) VALUES
(13, 28, '3', 'Công nghệ thông tin', 'Giỏi', 'Đại học Cần Thơ', 2020, NULL, 'Đã tốt nghiệp đại học'),
(14, 25, '5', 'Khoa học máy tính', 'Xuất sắc', 'Đại học Cần Thơ', 2010, 'Quản trị kinh doanh', 'Đã hoàn thành chương trình tiến sĩ'),
(17, 1, '2', 'Kinh tế', '4', 'Đại học Cần Thơ', 2019, NULL, NULL),
(18, 98, '4', 'Quản trị kinh doanh', NULL, 'Đại học Cần Thơ', 2011, NULL, NULL),
(19, 99, '4', 'Quản trị kinh doanh', NULL, 'Đại học FPT', 2020, 'không', 'không'),
(20, 100, '1', 'Khoa học máy tính', NULL, 'Đại học Cần Thơ', 2021, 'không', 'không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_04_07_040739_attendance_log', 1),
(2, '2022_04_07_042414_time_keeping', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL COMMENT 'mã quan hệ',
  `u_id` int(11) NOT NULL COMMENT 'mã nhân viên',
  `re_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tên người có quan hệ',
  `re_ship` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'quan hệ',
  `re_gender` int(11) DEFAULT NULL COMMENT 'giới tính',
  `re_phone` int(10) DEFAULT NULL COMMENT 'số điện thoại',
  `re_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `parents`
--

INSERT INTO `parents` (`id`, `u_id`, `re_name`, `re_ship`, `re_gender`, `re_phone`, `re_address`) VALUES
(5, 1, 'Trần Văn Hai', '1', 0, 123456789, 'Bình Thuỷ, Cần Thơ'),
(6, 4, 'Vũ Đình Thuần', '2', 0, 939768238, 'CMT8, Bình Thuỷ, Cần Thơ.'),
(8, 98, 'Lê Văn B', '2', 0, 932976789, '156B CMT8, Cần Thơ'),
(9, 99, 'Nguyễn Trân', '4', 1, 932973096, '385/70 Lê Văn Sô, An Thới, Bình Thuỷ, Cần Thơ'),
(10, 100, 'Lê Văn Thanh', '2', 0, 657890654, '16 Võ Nguyên Giáp, Cái Răng, Cần Thơ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL COMMENT 'Mã chức vụ',
  `p_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tên chức vụ',
  `basic_salary` int(11) DEFAULT NULL COMMENT 'lương cơ bản',
  `s_id` int(11) DEFAULT NULL COMMENT 'mã lương'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `position`
--

INSERT INTO `position` (`id`, `p_name`, `basic_salary`, `s_id`) VALUES
(1, 'Giám đốc', 30000000, 10),
(2, 'Phó giám đốc', 25000000, 9),
(3, 'Trưởng phòng', 18000000, 7),
(4, 'Phó phòng', 15000000, 6),
(5, 'Trưởng đài', 18000000, 7),
(6, 'Nhân viên', 10000000, 5),
(7, 'Bảo vệ', 2000000, 1),
(8, 'Tạp vụ', 2000000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL COMMENT 'mã vai trò',
  `r_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên vai trò',
  `r_show` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `r_name`, `r_show`) VALUES
(1, 'manager', ''),
(2, 'userleader', ''),
(3, 'salaryleader', ''),
(4, 'employee', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id_user_role` int(11) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id_user_role`, `role_id`, `user_id`) VALUES
(2, 2, 26),
(3, 3, 27),
(10, 2, 3),
(20, 1, 25),
(21, 2, 25),
(22, 3, 25),
(23, 4, 25),
(24, 4, 28),
(40, 4, 71),
(43, 4, 74),
(44, 4, 75),
(45, 4, 76),
(46, 4, 77),
(47, 4, 78),
(50, 1, 4),
(51, 2, 4),
(52, 3, 4),
(53, 4, 4),
(69, 4, 99),
(79, 4, 1),
(83, 4, 7),
(84, 4, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL COMMENT 'mã lương',
  `level` int(11) NOT NULL COMMENT 'bậc',
  `coefficient_salary` float DEFAULT NULL COMMENT 'hệ số lương'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `salary`
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
-- Cấu trúc bảng cho bảng `salary_payment`
--

CREATE TABLE `salary_payment` (
  `id` int(11) NOT NULL COMMENT 'mã phát lương',
  `u_id` int(11) DEFAULT NULL COMMENT 'mã nhân viên',
  `net_salary` int(11) DEFAULT NULL COMMENT 'lương',
  `date` datetime DEFAULT NULL COMMENT 'ngày nhận lương'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `time_keeping`
--

CREATE TABLE `time_keeping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `time_keeping`
--

INSERT INTO `time_keeping` (`id`, `u_id`, `total`, `month`, `year`, `created_at`, `updated_at`) VALUES
(214, 1, 26, 1, 2022, '2022-04-26 05:04:02', '2022-04-26 05:04:02'),
(215, 3, 26, 1, 2022, '2022-04-26 05:04:02', '2022-04-26 05:04:02'),
(216, 4, 25, 1, 2022, '2022-04-26 05:04:02', '2022-04-26 05:04:02'),
(217, 6, 23, 1, 2022, '2022-04-26 05:04:02', '2022-04-26 05:04:02'),
(218, 7, 26, 1, 2022, '2022-04-26 05:04:02', '2022-04-26 05:04:02'),
(219, 25, 26, 1, 2022, '2022-04-26 05:04:03', '2022-04-26 05:04:03'),
(220, 26, 26, 1, 2022, '2022-04-26 05:04:03', '2022-04-26 05:04:03'),
(221, 27, 26, 1, 2022, '2022-04-26 05:04:03', '2022-04-26 05:04:03'),
(222, 28, 26, 1, 2022, '2022-04-26 05:04:03', '2022-04-26 05:04:03'),
(223, 75, 24.5, 1, 2022, '2022-04-26 05:04:03', '2022-04-26 05:04:03'),
(224, 77, 26, 1, 2022, '2022-04-26 05:04:03', '2022-04-26 05:04:03'),
(225, 78, 24, 1, 2022, '2022-04-26 05:04:03', '2022-04-26 05:04:03'),
(226, 82, 26, 1, 2022, '2022-04-26 05:04:04', '2022-04-26 05:04:04'),
(227, 98, 26, 1, 2022, '2022-04-26 05:04:04', '2022-04-26 05:04:04'),
(228, 1, 24, 2, 2022, '2022-04-26 05:13:07', '2022-04-26 05:13:07'),
(229, 3, 21.5, 2, 2022, '2022-04-26 05:13:07', '2022-04-26 05:13:07'),
(230, 4, 23, 2, 2022, '2022-04-26 05:13:07', '2022-04-26 05:13:07'),
(231, 6, 24, 2, 2022, '2022-04-26 05:13:07', '2022-04-26 05:13:07'),
(232, 7, 24, 2, 2022, '2022-04-26 05:13:07', '2022-04-26 05:13:07'),
(233, 25, 24, 2, 2022, '2022-04-26 05:13:07', '2022-04-26 05:13:07'),
(234, 26, 24, 2, 2022, '2022-04-26 05:13:07', '2022-04-26 05:13:07'),
(235, 27, 24, 2, 2022, '2022-04-26 05:13:08', '2022-04-26 05:13:08'),
(236, 28, 24, 2, 2022, '2022-04-26 05:13:08', '2022-04-26 05:13:08'),
(237, 75, 24, 2, 2022, '2022-04-26 05:13:08', '2022-04-26 05:13:08'),
(238, 77, 24, 2, 2022, '2022-04-26 05:13:08', '2022-04-26 05:13:08'),
(239, 78, 24, 2, 2022, '2022-04-26 05:13:08', '2022-04-26 05:13:08'),
(240, 82, 24, 2, 2022, '2022-04-26 05:13:08', '2022-04-26 05:13:08'),
(241, 98, 24, 2, 2022, '2022-04-26 05:13:08', '2022-04-26 05:13:08'),
(258, 1, 27, 3, 2022, '2022-04-27 01:52:07', '2022-04-27 01:52:07'),
(259, 3, 27, 3, 2022, '2022-04-27 01:52:07', '2022-04-27 01:52:07'),
(260, 4, 27, 3, 2022, '2022-04-27 01:52:07', '2022-04-27 01:52:07'),
(261, 6, 27, 3, 2022, '2022-04-27 01:52:08', '2022-04-27 01:52:08'),
(262, 7, 27, 3, 2022, '2022-04-27 01:52:08', '2022-04-27 01:52:08'),
(263, 25, 27, 3, 2022, '2022-04-27 01:52:08', '2022-04-27 01:52:08'),
(264, 26, 27, 3, 2022, '2022-04-27 01:52:08', '2022-04-27 01:52:08'),
(265, 27, 27, 3, 2022, '2022-04-27 01:52:08', '2022-04-27 01:52:08'),
(266, 28, 27, 3, 2022, '2022-04-27 01:52:08', '2022-04-27 01:52:08'),
(267, 75, 27, 3, 2022, '2022-04-27 01:52:09', '2022-04-27 01:52:09'),
(268, 77, 27, 3, 2022, '2022-04-27 01:52:09', '2022-04-27 01:52:09'),
(269, 78, 27, 3, 2022, '2022-04-27 01:52:09', '2022-04-27 01:52:09'),
(270, 82, 27, 3, 2022, '2022-04-27 01:52:09', '2022-04-27 01:52:09'),
(271, 98, 27, 3, 2022, '2022-04-27 01:52:09', '2022-04-27 01:52:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'mã nhân viên',
  `p_id` int(11) NOT NULL COMMENT 'mã chức vụ',
  `f_id` int(11) NOT NULL COMMENT 'mã trình độ NN',
  `d_id` int(11) NOT NULL COMMENT 'mã phòng ban',
  `u_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên nhân viên',
  `u_gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'giới tính',
  `u_IDcode` int(11) NOT NULL COMMENT 'số CCCD',
  `u_IDcodedate` date DEFAULT NULL COMMENT 'ngày cấp cccd',
  `u_IDcodeplace` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nơi cấp cccd',
  `u_dob` date NOT NULL COMMENT 'ngày sinh',
  `u_pob` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nơi sinh',
  `u_household` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'hộ khẩu thường trú',
  `u_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ thường trú',
  `u_phone` int(10) NOT NULL COMMENT 'số điện thoại',
  `u_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ email',
  `u_nationality` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'quốc tịch',
  `u_ethnic` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'dân tộc',
  `u_religion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tôn giáo',
  `u_checkindate` date NOT NULL COMMENT 'ngày vào làm',
  `u_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'trạng thái',
  `u_avatar` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh đại diện',
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên tài khoản',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mật khẩu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `p_id`, `f_id`, `d_id`, `u_name`, `u_gender`, `u_IDcode`, `u_IDcodedate`, `u_IDcodeplace`, `u_dob`, `u_pob`, `u_household`, `u_address`, `u_phone`, `u_email`, `u_nationality`, `u_ethnic`, `u_religion`, `u_checkindate`, `u_status`, `u_avatar`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 6, 5, 2, 'Trần Thị Ba', '1', 987654321, '2018-03-04', 'Công an thành phố Cần Thơ', '1989-06-07', 'Cần Thơ', 'số 13, đường Nguyễn Trãi, phường Cái Khế, quận NK, TPCT', 'số 13, đường Nguyễn Trãi, phường Cái Khế, quận NK, TPCT', 932973176, 'tranb@gmail.com', 'Việt Nam', 'Khmer', 'Phật giáo', '2022-04-04', '0', 'Trần Thị Ba', 'ttb', '$2y$10$gOSnOR2r1ILiDpfczdocK.XNW9/bUMtTwxTMwNRh0CrXxIGkxZBjy', '2022-04-04 21:18:56', '2022-04-05 06:46:05'),
(3, 3, 4, 2, 'Lê Văn C', '0', 456789123, '2022-03-27', 'Công an thành phố Cần Thơ', '1989-12-31', '1989-12-31', 'số 149, đường CMT8, phường BHN, quận BT, TPCT', 'số 149, đường CMT8, phường BHN, quận BT, TPCT', 932973197, 'lvanc@gmail.com', 'Việt Nam', 'Kinh', 'Không', '2022-04-05', '0', '', 'levanc', '$2y$10$VM6JrXo5EwfulnDdwbcrR.sP62brQiEFn4TdSPXJoRT1vJ/t9XMq6', '2022-04-05 06:47:41', '2022-04-05 07:04:56'),
(4, 6, 3, 2, 'Vũ Ngọc Huệ Trân', '1', 362537451, '2022-03-27', 'Công an thành phố Cần Thơ', '1999-09-06', '1999-09-06', '380 CMT8, Cần Thơ', '380 CMT8, Cần Thơ', 932973187, 'tranvnh@gmail.com', 'Việt Nam', 'Kinh', 'Công giáo', '2022-04-03', '0', 'Vũ Ngọc Huệ Trân.jpg', 'vnhtran', '$2y$10$RJS9DygN1xjizHFiXovXGeMksCOs3q6IfoQy7KP69KEstUz8MZHhq', '2022-04-05 07:07:18', '2022-04-05 07:07:18'),
(6, 6, 3, 2, 'Nguyễn Quang Hùng', '0', 765432198, '2021-10-13', 'Công an thành phố Cần Thơ', '1999-08-05', 'Cần Thơ', '156B Nguyễn Thông, Bình Thuỷ, Cần Thơ', '156B Nguyễn Thông, Bình Thuỷ, Cần Thơ', 762940721, 'nqhung@gmail.com', 'Việt Nam', 'Kinh', 'Không', '2022-04-06', '0', '', 'nqhung', '$2y$10$1qD3P/oi28d0n/5ToAPETOpbNS9S0AsQXHQ7jo8nMYJ3bL81X6ZXm', '2022-04-05 19:21:08', '2022-04-05 19:21:08'),
(7, 6, 3, 2, 'Vũ Duy', '1', 765894321, '2015-12-24', 'Công an thành phố Cần Thơ', '1995-12-24', 'Cần Thơ', 'Thốt nốt, Cần Thơ', 'Thốt nốt, Cần Thơ', 932973567, 'vuduy@gmail.com', 'Việt Nam', 'Kinh', 'Công giáo', '2021-12-28', '0', 'Vũ Duy', 'vuduy', '$2y$10$aDCybu2Tktn9fvzH/xCx0eTuQgeN.h1IrF/enIwH.md1Yi0GVGUJG', '2022-04-05 19:36:44', '2022-04-05 19:36:44'),
(25, 1, 6, 1, 'Manager', '', 0, NULL, NULL, '0000-00-00', NULL, '', NULL, 777585696, 'manager@gmail.com', NULL, NULL, NULL, '0000-00-00', '', '', 'manager', '$2y$10$CWBDuGV1RGP6PKXzonldd.jbBEluvCsOroUbFnJ5Tz9LnKVarhm5K', '2022-04-11 05:24:47', '2022-04-11 05:24:47'),
(26, 3, 6, 7, 'User Leader', '', 0, NULL, NULL, '0000-00-00', NULL, '', NULL, 777585695, 'userleader@gmail.com', NULL, NULL, NULL, '0000-00-00', '', '', 'userleader', '$2y$10$3lyCtjuweAqZbwIgJQA7HundmeFEuYa2befLTKqj3AVqf/FAiMAN.', '2022-04-11 05:24:48', '2022-04-11 05:24:48'),
(27, 3, 6, 4, 'Salary Leader', '', 0, NULL, NULL, '0000-00-00', NULL, '', NULL, 777585697, 'salaryleader@gmail.com', NULL, NULL, NULL, '0000-00-00', '', '', 'salarylead', '$2y$10$jQx08MmsgvVWY/vbXMIQn.sspt5jxbkMhDbd2OJtYgx6AOxvMNUPC', '2022-04-11 05:24:48', '2022-04-11 05:24:48'),
(28, 6, 3, 4, 'Employee', '', 0, NULL, NULL, '0000-00-00', NULL, '', NULL, 777585699, 'employee@gmail.com', NULL, NULL, NULL, '0000-00-00', '', '', 'employee', '$2y$10$y2l0iEp3ELmUb6.x6IxltO2Q9JX6czNeNUi.EB/jffsEu2LgK6PhK', '2022-04-11 05:24:48', '2022-04-11 05:24:48'),
(75, 6, 3, 4, 'Raul Goldner', '0', 0, '2017-05-26', 'Lake Lambert', '1997-06-04', 'West Tanyaburgh', '352 Kuphal Union\nSchultzville, ME 17355-3473', '5405 Orion Freeway\nNorth Norris, FL 96814', 1, 'marlin38@example.com', 'Malawi', NULL, NULL, '1973-10-29', '0', '', 'estella.vo', '$2y$10$vKzhN8rrnDQozKElFLPO0ONAMt03ROKcPRYblDQAJ0c0H4gw8uvX6', '2022-04-11 09:27:50', '2022-04-11 09:27:50'),
(77, 6, 3, 4, 'Narciso Hegmann', '0', 0, '1992-11-16', 'Lake Myrlton', '1988-05-14', 'North Dennis', '34659 Mohr Isle\nAdrielland, MO 98470', '523 Christiansen Circles Suite 467\nMarionton, CO 66875-2947', 1, 'keanu81@example.net', 'Korea', NULL, NULL, '1982-01-12', '1', '', 'cmarks', '$2y$10$.k0tog05hBztPQfth51GL.B9wEgmPMl8k8czt3BZv5PATmbng9U8q', '2022-04-11 09:27:50', '2022-04-11 09:27:50'),
(78, 6, 3, 4, 'Erna O\'Reilly', '0', 0, '2000-09-08', 'Strackeport', '1970-08-11', 'Urielhaven', '5662 O\'Connell Way Suite 778\nSouth Coltshire, FL 06861-8085', '85601 Cooper Crossroad\nWest Delta, OH 75772', 1, 'leannon.van@example.com', 'Oman', NULL, NULL, '2004-02-05', '1', '', 'mlarkin', '$2y$10$RMou8CcL0Zi/lf6seVwUyeTuoC4wZnUWu14eOIicdWdqLBnJwQi8K', '2022-04-11 09:27:50', '2022-04-11 09:27:50'),
(82, 6, 2, 3, 'Park Jimin', '0', 0, '0000-00-00', NULL, '0000-00-00', NULL, '', NULL, 0, 'jimin@gmail.com', NULL, NULL, NULL, '2022-04-10', '0', 'Park Jimin.jpg', 'jimin', '$2y$10$4X/ZTo4ZjA2KddLrfRlOo.lsv4.VmIqdw3YioiehIzbbOXJSEGEI.', '2022-04-12 09:32:15', '2022-04-12 09:32:15'),
(98, 6, 3, 3, 'Lê Văn A', '0', 987654322, '2022-03-29', 'Công an thành phố Cần Thơ', '1980-07-27', 'Cần Thơ', '156B CMT8, Cần Thơ', '156B CMT8, Cần Thơ', 932978765, 'levana@gmail.com', 'Việt Nam', 'Kinh', 'Không', '2022-03-27', '0', '1650959736.jpg', 'levana', '$2y$10$dVDVVGZER5saok6fBUxymuk81Z4vEoPKd9iAjCkHTYSI2ILBvY4Ki', '2022-04-26 07:55:37', '2022-04-26 07:55:37'),
(99, 6, 4, 6, 'Nguyễn Trang', '1', 987654387, '2015-03-15', 'Công an thành phố Cần Thơ', '1998-10-11', 'Cần Thơ', '385/70 Lê Văn Sô, An Thới, Bình Thuỷ, Cần Thơ', '385/70 Lê Văn Sô, An Thới, Bình Thuỷ, Cần Thơ', 932973678, 'ngtrang@gmail.com', 'Việt Nam', 'Kinh', 'Không', '2020-06-11', '0', '1650977814.png', 'ngtrang', '$2y$10$wzRLj6QpDz7Hf8TYdy8yAuglc85/YctBJAWTrWmnOs3CWOMynTNj.', '2022-04-26 12:56:54', '2022-04-26 12:56:54'),
(100, 6, 4, 20, 'Lê Thanh N', '0', 123456765, '2022-04-10', 'Công an thành phố Cần Thơ', '1999-03-12', 'Cần Thơ', '16 Võ Nguyên Giáp, Cái Răng, Cần Thơ', '16 Võ Nguyên Giáp, Cái Răng, Cần Thơ', 932976534, 'letn@gmail.com', 'Việt Nam', 'Kinh', 'Không', '2022-04-27', '0', '', 'letn', '$2y$10$O4xU00LqBZBsxFYG4BEbdur948fh.7.6.TxWKSAr56cFgu1unDCs.', '2022-04-27 03:10:48', '2022-04-27 03:10:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `working_hour_log`
--

CREATE TABLE `working_hour_log` (
  `id` bigint(20) NOT NULL COMMENT 'mã công',
  `u_id` int(11) DEFAULT NULL COMMENT 'mã nhân viên',
  `am_in` time NOT NULL COMMENT 'thời gian vào sáng',
  `am_out` time NOT NULL COMMENT 'thời gian ra sáng',
  `pm_in` time NOT NULL COMMENT 'thời gian vào chiều',
  `pm_out` time NOT NULL COMMENT 'thời gian ra chiều',
  `date` date NOT NULL COMMENT 'ngày',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `working_hour_log`
--

INSERT INTO `working_hour_log` (`id`, `u_id`, `am_in`, `am_out`, `pm_in`, `pm_out`, `date`, `created_at`, `updated_at`) VALUES
(17, 1, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(18, 3, '07:35:00', '10:55:00', '13:30:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(19, 4, '07:30:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(20, 6, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(21, 7, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(22, 25, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(23, 26, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(24, 27, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(25, 28, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(26, 75, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(27, 77, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(28, 78, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(29, 82, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(30, 98, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(31, 99, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34'),
(32, 100, '07:25:00', '11:05:00', '13:25:00', '17:00:00', '2022-01-03', '2022-04-28 02:48:34', '2022-04-28 02:48:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work_contract`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bonus_penalize`
--
ALTER TABLE `bonus_penalize`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bonus_penalize_details`
--
ALTER TABLE `bonus_penalize_details`
  ADD PRIMARY KEY (`u_id`,`bp_id`),
  ADD KEY `fk_bp_user` (`bp_id`);

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enterprise` (`e_id`);

--
-- Chỉ mục cho bảng `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `foreign_language`
--
ALTER TABLE `foreign_language`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `literacy`
--
ALTER TABLE `literacy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`u_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_re_user` (`u_id`);

--
-- Chỉ mục cho bảng `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_salary` (`s_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id_user_role`);

--
-- Chỉ mục cho bảng `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `level` (`level`);

--
-- Chỉ mục cho bảng `salary_payment`
--
ALTER TABLE `salary_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_salarypayment` (`u_id`);

--
-- Chỉ mục cho bảng `time_keeping`
--
ALTER TABLE `time_keeping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_keeping_u_id_foreign` (`u_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_position` (`p_id`),
  ADD KEY `fk_dept_user` (`d_id`),
  ADD KEY `fk_flanguages` (`f_id`);

--
-- Chỉ mục cho bảng `working_hour_log`
--
ALTER TABLE `working_hour_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_working` (`u_id`);

--
-- Chỉ mục cho bảng `work_contract`
--
ALTER TABLE `work_contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_contract` (`u_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bonus_penalize`
--
ALTER TABLE `bonus_penalize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã kt_kl', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã phòng', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã đơn vị', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `foreign_language`
--
ALTER TABLE `foreign_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã ngoại ngữ', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `literacy`
--
ALTER TABLE `literacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã trình độ học vấn', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã quan hệ', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chức vụ', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã vai trò', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã lương', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `salary_payment`
--
ALTER TABLE `salary_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã phát lương';

--
-- AUTO_INCREMENT cho bảng `time_keeping`
--
ALTER TABLE `time_keeping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã nhân viên', AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `working_hour_log`
--
ALTER TABLE `working_hour_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'mã công', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `work_contract`
--
ALTER TABLE `work_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hợp đồng';

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bonus_penalize_details`
--
ALTER TABLE `bonus_penalize_details`
  ADD CONSTRAINT `fk_bp_user` FOREIGN KEY (`bp_id`) REFERENCES `bonus_penalize` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_bp` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_enterprise` FOREIGN KEY (`e_id`) REFERENCES `enterprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `literacy`
--
ALTER TABLE `literacy`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `fk_re_user` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `fk_salary` FOREIGN KEY (`s_id`) REFERENCES `salary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `salary_payment`
--
ALTER TABLE `salary_payment`
  ADD CONSTRAINT `fk_user_salarypayment` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `time_keeping`
--
ALTER TABLE `time_keeping`
  ADD CONSTRAINT `time_keeping_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_dept_user` FOREIGN KEY (`d_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_flanguages` FOREIGN KEY (`f_id`) REFERENCES `foreign_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_position` FOREIGN KEY (`p_id`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `working_hour_log`
--
ALTER TABLE `working_hour_log`
  ADD CONSTRAINT `fk_user_working` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `work_contract`
--
ALTER TABLE `work_contract`
  ADD CONSTRAINT `fk_user_contract` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
