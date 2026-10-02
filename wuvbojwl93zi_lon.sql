-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 03, 2025 lúc 11:36 PM
-- Phiên bản máy phục vụ: 10.5.29-MariaDB
-- Phiên bản PHP: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wuvbojwl93zi_lon`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giftcode`
--

CREATE TABLE `giftcode` (
  `id` int(11) NOT NULL,
  `giftcode` varchar(50) DEFAULT NULL,
  `title_giftcode` text DEFAULT NULL,
  `count_uses` int(11) NOT NULL,
  `current_uses` int(11) DEFAULT 0,
  `hsd` datetime NOT NULL,
  `role_giftcode` varchar(255) NOT NULL,
  `banned_giftcode` tinyint(4) NOT NULL DEFAULT 0,
  `timecreate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `hovaten` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `banned` int(11) NOT NULL DEFAULT 0,
  `rank` varchar(255) NOT NULL DEFAULT 'members',
  `ip` varchar(255) NOT NULL,
  `ngaythamgia` datetime DEFAULT current_timestamp(),
  `email` varchar(255) DEFAULT NULL,
  `sodu` varchar(255) NOT NULL DEFAULT '0',
  `tongtieu` varchar(255) NOT NULL DEFAULT '0',
  `tongnap` varchar(255) NOT NULL DEFAULT '0',
  `hoahong` int(11) NOT NULL DEFAULT 0,
  `ruby` int(11) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar-default.jpg',
  `anhbia` varchar(255) DEFAULT NULL,
  `tieusu` text DEFAULT NULL,
  `level` varchar(255) NOT NULL DEFAULT '1',
  `exp` int(11) NOT NULL DEFAULT 0,
  `dohot` int(11) NOT NULL DEFAULT 0,
  `verify` int(11) NOT NULL DEFAULT 0,
  `danhhieu` varchar(255) DEFAULT NULL,
  `cookie` varchar(255) NOT NULL DEFAULT '0',
  `gender` varchar(255) NOT NULL DEFAULT 'Bảo Mật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_comments`
--

CREATE TABLE `ws_comments` (
  `comment_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `like_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_comments_reply`
--

CREATE TABLE `ws_comments_reply` (
  `reply_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `reply_text` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `reply_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_cronjobs`
--

CREATE TABLE `ws_cronjobs` (
  `cron_id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_description` text DEFAULT NULL,
  `cron_expression` varchar(50) NOT NULL,
  `last_execution` datetime DEFAULT NULL,
  `next_execution` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_diemdanh`
--

CREATE TABLE `ws_diemdanh` (
  `diemdanh_id` int(11) NOT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `ruby` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_follower`
--

CREATE TABLE `ws_follower` (
  `followed_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `follower_username` varchar(255) NOT NULL,
  `followed_username` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_history_bank`
--

CREATE TABLE `ws_history_bank` (
  `bank_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `loai` varchar(255) NOT NULL,
  `magiaodich` varchar(255) NOT NULL,
  `sotien` int(11) NOT NULL DEFAULT 0,
  `noidung` text DEFAULT NULL,
  `thoigian` datetime NOT NULL,
  `trangthai` enum('thatbai','thanhcong') DEFAULT 'thatbai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_history_card`
--

CREATE TABLE `ws_history_card` (
  `card_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `loaithe` varchar(255) NOT NULL,
  `seri` varchar(255) NOT NULL,
  `mathe` varchar(255) NOT NULL,
  `menhgia` int(11) NOT NULL DEFAULT 0,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp(),
  `trangthai` enum('xuly','thatbai','thanhcong') DEFAULT 'xuly'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_history_products`
--

CREATE TABLE `ws_history_products` (
  `history_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `giamua` int(11) NOT NULL,
  `ngaymua` datetime NOT NULL,
  `phanloai` varchar(255) NOT NULL,
  `magiaodich` varchar(255) NOT NULL,
  `trangthai` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_like`
--

CREATE TABLE `ws_like` (
  `like_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_logs`
--

CREATE TABLE `ws_logs` (
  `log_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `time` datetime DEFAULT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_notify_system`
--

CREATE TABLE `ws_notify_system` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `isread` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_plans`
--

CREATE TABLE `ws_plans` (
  `plans_id` int(11) NOT NULL,
  `taikhoan` varchar(255) DEFAULT NULL,
  `tengoi` varchar(255) DEFAULT NULL,
  `giatien` int(11) NOT NULL DEFAULT 0,
  `ngaymua` datetime DEFAULT NULL,
  `ngayhethan` datetime NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_products`
--

CREATE TABLE `ws_products` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(255) DEFAULT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` longtext DEFAULT NULL,
  `hinhthunho` text DEFAULT NULL,
  `anhsanpham` text DEFAULT NULL,
  `giatien` int(11) DEFAULT 0,
  `ngaydang` datetime DEFAULT current_timestamp(),
  `phanloai` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `download_url` varchar(255) NOT NULL,
  `luotmua` varchar(255) DEFAULT '0',
  `luotxem` int(11) DEFAULT 0,
  `luotshare` int(11) NOT NULL DEFAULT 0,
  `luotlike` varchar(255) NOT NULL DEFAULT '0',
  `privacy` varchar(255) NOT NULL DEFAULT 'all',
  `ngaycapnhat` datetime DEFAULT current_timestamp(),
  `trangthai` int(11) DEFAULT 1,
  `xetduyet` int(11) NOT NULL DEFAULT 0,
  `is_pinned` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_reports`
--

CREATE TABLE `ws_reports` (
  `id_report` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `victim` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `reason_other` text DEFAULT NULL,
  `url_report` varchar(255) DEFAULT NULL,
  `desc_content` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `status` enum('pending','accept','reject') DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_resetpw`
--

CREATE TABLE `ws_resetpw` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reset_code` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `is_used` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_ruby`
--

CREATE TABLE `ws_ruby` (
  `ruby_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nhiemvu` varchar(255) DEFAULT NULL,
  `sodiem` int(11) DEFAULT 0,
  `sodiem_hientai` int(11) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_settings`
--

CREATE TABLE `ws_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT 'Hệ Thống WusTeam',
  `keywords` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT 'https://thanhdieu.com/logo.png',
  `description` text DEFAULT NULL,
  `black-ip` text DEFAULT NULL,
  `author` varchar(255) DEFAULT '0',
  `footer` text DEFAULT NULL,
  `bao-tri` int(11) DEFAULT 0,
  `name-site` varchar(255) NOT NULL DEFAULT 'WusTeam',
  `version-code` varchar(11) NOT NULL,
  `zalo` varchar(200) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `telegram` varchar(220) NOT NULL,
  `og:image` varchar(255) NOT NULL,
  `boxchat` varchar(200) NOT NULL DEFAULT 'https://thanhdieu.com',
  `skin-theme` varchar(255) NOT NULL DEFAULT 'dark',
  `backupdb` int(11) NOT NULL DEFAULT 1,
  `key-geetest` varchar(255) NOT NULL DEFAULT '0',
  `admin-page` int(11) NOT NULL DEFAULT 0,
  `view-limit` int(11) NOT NULL DEFAULT 1,
  `deploy-date` datetime DEFAULT NULL,
  `https` int(11) NOT NULL,
  `anti-spam` int(11) NOT NULL,
  `cuphap-transfer` varchar(222) NOT NULL DEFAULT 'NAPTIEN',
  `min-transfer` int(11) NOT NULL,
  `partner-id` int(11) NOT NULL,
  `partner-key` varchar(255) NOT NULL,
  `is-modal` int(11) NOT NULL,
  `modal-content` mediumtext NOT NULL,
  `loader` int(11) NOT NULL,
  `cache` varchar(255) NOT NULL DEFAULT '1.1.1.1',
  `footer-lite` int(11) NOT NULL DEFAULT 0,
  `landing` int(11) NOT NULL DEFAULT 2,
  `fuck-devtools` int(11) NOT NULL DEFAULT 0,
  `is_pinned` int(11) NOT NULL DEFAULT 0,
  `key-aes` varchar(255) NOT NULL DEFAULT 'vlxx',
  `navbar-logo` varchar(255) NOT NULL,
  `ads` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_transfer`
--

CREATE TABLE `ws_transfer` (
  `transfer_id` int(11) NOT NULL,
  `stk` varchar(255) NOT NULL,
  `chutaikhoan` varchar(255) NOT NULL,
  `nganhang` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `qr-code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_verification`
--

CREATE TABLE `ws_verification` (
  `verify_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `reason_desc` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `time_approved` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ws_views`
--

CREATE TABLE `ws_views` (
  `view_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `taikhoan` varchar(255) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `giftcode` (`giftcode`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `idx_username` (`username`);

--
-- Chỉ mục cho bảng `ws_comments`
--
ALTER TABLE `ws_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_username` (`user_username`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `ws_comments_reply`
--
ALTER TABLE `ws_comments_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `parent_comment_id` (`parent_comment_id`),
  ADD KEY `user_username` (`user_username`);

--
-- Chỉ mục cho bảng `ws_cronjobs`
--
ALTER TABLE `ws_cronjobs`
  ADD PRIMARY KEY (`cron_id`);

--
-- Chỉ mục cho bảng `ws_diemdanh`
--
ALTER TABLE `ws_diemdanh`
  ADD PRIMARY KEY (`diemdanh_id`),
  ADD KEY `taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `ws_follower`
--
ALTER TABLE `ws_follower`
  ADD PRIMARY KEY (`follower_id`),
  ADD UNIQUE KEY `unique_follow_pair` (`follower_username`,`followed_username`),
  ADD KEY `idx_follower_username` (`follower_username`),
  ADD KEY `idx_followed_username` (`followed_username`),
  ADD KEY `followed_id` (`followed_id`);

--
-- Chỉ mục cho bảng `ws_history_bank`
--
ALTER TABLE `ws_history_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Chỉ mục cho bảng `ws_history_card`
--
ALTER TABLE `ws_history_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Chỉ mục cho bảng `ws_history_products`
--
ALTER TABLE `ws_history_products`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `fk_taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `ws_like`
--
ALTER TABLE `ws_like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `ws_logs`
--
ALTER TABLE `ws_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Chỉ mục cho bảng `ws_notify_system`
--
ALTER TABLE `ws_notify_system`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `ws_plans`
--
ALTER TABLE `ws_plans`
  ADD PRIMARY KEY (`plans_id`);

--
-- Chỉ mục cho bảng `ws_products`
--
ALTER TABLE `ws_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id` (`id`);

--
-- Chỉ mục cho bảng `ws_reports`
--
ALTER TABLE `ws_reports`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `ws_resetpw`
--
ALTER TABLE `ws_resetpw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `ws_ruby`
--
ALTER TABLE `ws_ruby`
  ADD PRIMARY KEY (`ruby_id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `ws_settings`
--
ALTER TABLE `ws_settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ws_transfer`
--
ALTER TABLE `ws_transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Chỉ mục cho bảng `ws_verification`
--
ALTER TABLE `ws_verification`
  ADD PRIMARY KEY (`verify_id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `ws_views`
--
ALTER TABLE `ws_views`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1569;

--
-- AUTO_INCREMENT cho bảng `ws_comments`
--
ALTER TABLE `ws_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT cho bảng `ws_comments_reply`
--
ALTER TABLE `ws_comments_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_cronjobs`
--
ALTER TABLE `ws_cronjobs`
  MODIFY `cron_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_diemdanh`
--
ALTER TABLE `ws_diemdanh`
  MODIFY `diemdanh_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_follower`
--
ALTER TABLE `ws_follower`
  MODIFY `follower_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_history_bank`
--
ALTER TABLE `ws_history_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_history_card`
--
ALTER TABLE `ws_history_card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_history_products`
--
ALTER TABLE `ws_history_products`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_like`
--
ALTER TABLE `ws_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_logs`
--
ALTER TABLE `ws_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_notify_system`
--
ALTER TABLE `ws_notify_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_plans`
--
ALTER TABLE `ws_plans`
  MODIFY `plans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_products`
--
ALTER TABLE `ws_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `ws_reports`
--
ALTER TABLE `ws_reports`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_resetpw`
--
ALTER TABLE `ws_resetpw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_ruby`
--
ALTER TABLE `ws_ruby`
  MODIFY `ruby_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_settings`
--
ALTER TABLE `ws_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_transfer`
--
ALTER TABLE `ws_transfer`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_verification`
--
ALTER TABLE `ws_verification`
  MODIFY `verify_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ws_views`
--
ALTER TABLE `ws_views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ws_comments`
--
ALTER TABLE `ws_comments`
  ADD CONSTRAINT `ws_comments_ibfk_1` FOREIGN KEY (`user_username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `ws_comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `ws_products` (`id`);

--
-- Các ràng buộc cho bảng `ws_comments_reply`
--
ALTER TABLE `ws_comments_reply`
  ADD CONSTRAINT `ws_comments_reply_ibfk_1` FOREIGN KEY (`parent_comment_id`) REFERENCES `ws_comments` (`comment_id`),
  ADD CONSTRAINT `ws_comments_reply_ibfk_2` FOREIGN KEY (`user_username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `ws_diemdanh`
--
ALTER TABLE `ws_diemdanh`
  ADD CONSTRAINT `ws_diemdanh_ibfk_1` FOREIGN KEY (`taikhoan`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `ws_follower`
--
ALTER TABLE `ws_follower`
  ADD CONSTRAINT `ws_follower_ibfk_1` FOREIGN KEY (`follower_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ws_follower_ibfk_3` FOREIGN KEY (`followed_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ws_history_products`
--
ALTER TABLE `ws_history_products`
  ADD CONSTRAINT `fk_taikhoan` FOREIGN KEY (`taikhoan`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `ws_like`
--
ALTER TABLE `ws_like`
  ADD CONSTRAINT `ws_like_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `ws_comments` (`comment_id`),
  ADD CONSTRAINT `ws_like_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `ws_notify_system`
--
ALTER TABLE `ws_notify_system`
  ADD CONSTRAINT `ws_notify_system_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `ws_reports`
--
ALTER TABLE `ws_reports`
  ADD CONSTRAINT `ws_reports_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `ws_resetpw`
--
ALTER TABLE `ws_resetpw`
  ADD CONSTRAINT `ws_resetpw_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `ws_ruby`
--
ALTER TABLE `ws_ruby`
  ADD CONSTRAINT `ws_ruby_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `ws_verification`
--
ALTER TABLE `ws_verification`
  ADD CONSTRAINT `ws_verification_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
