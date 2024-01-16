-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 16, 2024 lúc 06:17 AM
-- Phiên bản máy phục vụ: 10.3.39-MariaDB-cll-lve
-- Phiên bản PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `topcokiqfn7_codezzz`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Banks`
--

CREATE TABLE `Banks` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `chutaikhoan` text NOT NULL,
  `sotaikhoan` text NOT NULL,
  `toithieu` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Banks`
--

INSERT INTO `Banks` (`id`, `name`, `chutaikhoan`, `sotaikhoan`, `toithieu`, `image`) VALUES
(1, 'MOMO', 'Phạm Minh Tiến', '0904888997', '10,000đ', 'data:image/png;base64,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'),
(2, 'AGRIBANK', 'PHAM MINH TIEN', '3206205299450', '10,000đ', 'https://yt3.googleusercontent.com/oLKhghiKGfnvVJar8Hlq_vq89yIperftH7kCCyTLZTVG5kPaC2de9YskW5DlhhHEd5togNXk3g=s900-c-k-c0x00ffffff-no-rj');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `CpanelPackage`
--

CREATE TABLE `CpanelPackage` (
  `id` int(11) NOT NULL,
  `disk` text NOT NULL,
  `bandwidth` text NOT NULL,
  `addondomain` text NOT NULL,
  `subdomain` text NOT NULL,
  `server` text NOT NULL,
  `package` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `CpanelPackage`
--

INSERT INTO `CpanelPackage` (`id`, `disk`, `bandwidth`, `addondomain`, `subdomain`, `server`, `package`, `price`) VALUES
(2, '1,000 MB', 'Không Giới Hạn', 'Không Giới Hạn', 'Không Giới Hạn', 'aaaaaaaaa', 'vn2', '5000'),
(11, '300MB', 'Không giới hạn', 'Không giới hạn', 'Không giới hạn', 'vnese', 'vnese_1', '0'),
(12, '100000000', 'Không giới hạn', 'Không giới hạn', 'Không giới hạn', 'vn', 'vn', '1234');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DanhMuc`
--

CREATE TABLE `DanhMuc` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `time_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `DanhMuc`
--

INSERT INTO `DanhMuc` (`id`, `name`, `image`, `time_date`) VALUES
(13, 'Code Share Free By SNTGAMEVN', 'https://i.imgur.com/V8mji9D.jpg', '1701757657');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DanhSachCode`
--

CREATE TABLE `DanhSachCode` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `theme` text NOT NULL,
  `time` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `DanhSachCode`
--

INSERT INTO `DanhSachCode` (`id`, `username`, `name`, `theme`, `time`, `price`) VALUES
(35, 'admin', 'Source Code - TAMINHPHAT.COM', '1', '1701475651', '25000'),
(36, 'tiendk195', 'Source Code - TAMINHPHAT.COM', '1', '1705335239', '50000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DanhSachWeb`
--

CREATE TABLE `DanhSachWeb` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `domain` text NOT NULL,
  `taikhoan` text NOT NULL,
  `matkhau` text NOT NULL,
  `status` text NOT NULL,
  `theme` text NOT NULL,
  `time` text NOT NULL,
  `orvertime` text NOT NULL,
  `ghichu` text DEFAULT NULL,
  `timesuspended` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DataCard`
--

CREATE TABLE `DataCard` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `pin` text NOT NULL,
  `serial` text NOT NULL,
  `amount` text NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `time` text NOT NULL,
  `requestid` text NOT NULL,
  `date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Dots`
--

CREATE TABLE `Dots` (
  `id` int(11) NOT NULL,
  `dot` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Hostings`
--

CREATE TABLE `Hostings` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `domain` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `package` text DEFAULT NULL,
  `server` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `orvertime` text DEFAULT NULL,
  `timesuspended` text DEFAULT NULL,
  `taikhoan` text DEFAULT NULL,
  `matkhau` text DEFAULT NULL,
  `lidokhoa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `MaGiamGia`
--

CREATE TABLE `MaGiamGia` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `gioihan` int(11) NOT NULL,
  `luotdung` int(11) NOT NULL,
  `loai` text NOT NULL,
  `amount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `MaGiamGia`
--

INSERT INTO `MaGiamGia` (`id`, `code`, `gioihan`, `luotdung`, `loai`, `amount`) VALUES
(19, 'HPNW2024', 50, 1, 'phantram', '50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Products`
--

CREATE TABLE `Products` (
  `id` int(11) NOT NULL,
  `danhmuc` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `images` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ServerName`
--

CREATE TABLE `ServerName` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `uname` text DEFAULT NULL,
  `ssl_key` text DEFAULT NULL,
  `backup` text DEFAULT NULL,
  `hostname` text DEFAULT NULL,
  `whmusername` text DEFAULT NULL,
  `whmpassword` text DEFAULT NULL,
  `ip` text DEFAULT NULL,
  `nameserver1` text DEFAULT NULL,
  `nameserver2` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `ghichu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ServerName`
--

INSERT INTO `ServerName` (`id`, `name`, `uname`, `ssl_key`, `backup`, `hostname`, `whmusername`, `whmpassword`, `ip`, `nameserver1`, `nameserver2`, `value`, `ghichu`) VALUES
(8, 'Vietnam', '1', 'true_ssl', 'no', 'link login cpanel không chứa :2083', 'tk whm', 'mk whm', '', 'ns1.n', 'ns2.sn', 'on', 'Dwpxai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `SourceCode`
--

CREATE TABLE `SourceCode` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `code` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `SourceCode`
--

INSERT INTO `SourceCode` (`id`, `name`, `description`, `price`, `code`, `image`) VALUES
(1, 'Source Code - SHOPACCVIP.COM', '', 50000, 'https://facebook.com/tienmp.1804', 'https://i.imgur.com/2I4ANUN.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `System32`
--

CREATE TABLE `System32` (
  `id` int(11) NOT NULL,
  `date_cron` text DEFAULT NULL,
  `partner_id` text DEFAULT NULL,
  `partner_key` text DEFAULT NULL,
  `token_momo` text DEFAULT NULL,
  `modal` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sitename` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `shortcut_icon` text DEFAULT NULL,
  `script` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `System32`
--

INSERT INTO `System32` (`id`, `date_cron`, `partner_id`, `partner_key`, `token_momo`, `modal`, `title`, `description`, `sitename`, `image`, `shortcut_icon`, `script`) VALUES
(1, '1699143182', '', '', 'NULL', 'Hi,Mình là MTienDev.Chúc mọi người mọi ngày tốt lành', 'MTienDev - AllInOne', 'MTienDev - Hệ Thống Thiết Kế Website, Share SourceCode, Cung Cấp Hosting Và Mã Nguồn Giá Rẻ!', 'https://png.pngtree.com/png-clipart/20230925/original/pngtree-vector-template-of-mt-logo-with-handwritten-initials-and-circular-design-png-image_12769463.png', 'https://png.pngtree.com/png-clipart/20230925/original/pngtree-vector-template-of-mt-logo-with-handwritten-initials-and-circular-design-png-image_12769463.png', 'no', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TranIDMomo`
--

CREATE TABLE `TranIDMomo` (
  `id` int(11) NOT NULL,
  `requestid` text NOT NULL,
  `amount` text NOT NULL,
  `comment` text NOT NULL,
  `time` text NOT NULL,
  `nameBank` text NOT NULL,
  `status` text NOT NULL,
  `date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `monney` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `level` text DEFAULT NULL,
  `date_online` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`, `email`, `monney`, `time`, `level`, `date_online`) VALUES
(235, 'tiendk195', '25d55ad283aa400af464c76d713c07ad', 'tiendk195@gmail.com', '450000', '1705333441', 'admin', '1705340897'),
(237, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '0', '1705340255', 'admin', '1705378497');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Banks`
--
ALTER TABLE `Banks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `CpanelPackage`
--
ALTER TABLE `CpanelPackage`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DanhMuc`
--
ALTER TABLE `DanhMuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DanhSachCode`
--
ALTER TABLE `DanhSachCode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DanhSachWeb`
--
ALTER TABLE `DanhSachWeb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DataCard`
--
ALTER TABLE `DataCard`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Dots`
--
ALTER TABLE `Dots`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Hostings`
--
ALTER TABLE `Hostings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `MaGiamGia`
--
ALTER TABLE `MaGiamGia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ServerName`
--
ALTER TABLE `ServerName`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `SourceCode`
--
ALTER TABLE `SourceCode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `System32`
--
ALTER TABLE `System32`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TranIDMomo`
--
ALTER TABLE `TranIDMomo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Banks`
--
ALTER TABLE `Banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `CpanelPackage`
--
ALTER TABLE `CpanelPackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `DanhMuc`
--
ALTER TABLE `DanhMuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `DanhSachCode`
--
ALTER TABLE `DanhSachCode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `DanhSachWeb`
--
ALTER TABLE `DanhSachWeb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `DataCard`
--
ALTER TABLE `DataCard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `Dots`
--
ALTER TABLE `Dots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `Hostings`
--
ALTER TABLE `Hostings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `MaGiamGia`
--
ALTER TABLE `MaGiamGia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `ServerName`
--
ALTER TABLE `ServerName`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `SourceCode`
--
ALTER TABLE `SourceCode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `System32`
--
ALTER TABLE `System32`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `TranIDMomo`
--
ALTER TABLE `TranIDMomo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
