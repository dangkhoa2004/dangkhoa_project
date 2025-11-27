-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2025 lúc 10:31 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `my_portfolio`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `title`, `category`, `publish_date`, `image_url`, `content`, `created_at`) VALUES
(1, 'Tại sao nên dùng Next.js cho dự án 2025?', 'Tech Trend', '2025-11-24', 'https://images.unsplash.com/photo-1499750310159-525446cc0ef6?w=400', NULL, '2025-11-24 04:32:47'),
(2, 'Tối ưu hiệu suất MySQL với 5 bước đơn giản', 'Database', '2025-11-10', 'https://images.unsplash.com/photo-1555099962-4199c345e5dd?w=400', NULL, '2025-11-24 04:32:47'),
(3, 'Hành trình từ Junior lên Senior trong 3 năm', 'Career', '2025-11-01', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400', NULL, '2025-11-24 04:32:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `certifications`
--

CREATE TABLE `certifications` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `org` varchar(100) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `certifications`
--

INSERT INTO `certifications` (`id`, `name`, `org`, `year`, `icon`) VALUES
(1, 'AWS Certified Solutions Architect', 'Amazon Web Services', '2023', 'fa-aws'),
(2, 'Google UX Design Professional', 'Google Career', '2022', 'fa-google'),
(3, 'Meta Backend Developer', 'Meta (Facebook)', '2021', 'fa-facebook');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ordering` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `experience`
--

INSERT INTO `experience` (`id`, `duration`, `role`, `company`, `description`, `ordering`) VALUES
(1, '2023 - Hiện tại', 'Senior Fullstack Developer', 'Global Tech Solutions', 'Dẫn dắt team 5 người xây dựng hệ thống ERP. Tối ưu hóa Database và triển khai CI/CD pipelines.', 1),
(2, '2021 - 2023', 'Backend Developer', 'E-commerce Startup', 'Phát triển API RESTful với Laravel/Node.js. Tích hợp cổng thanh toán Stripe, PayPal.', 2),
(3, '2019 - 2021', 'Frontend Developer', 'Creative Agency', 'Cắt PSD sang HTML/CSS, ReactJS. Đảm bảo UI/UX mượt mà trên mọi thiết bị.', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'Bạn có nhận làm Freelance dự án nhỏ không?', 'Có. Tôi luôn sẵn sàng hỗ trợ các dự án thú vị, bất kể quy mô, miễn là phù hợp với chuyên môn.'),
(2, 'Quy trình thanh toán như thế nào?', 'Thường là 30% cọc, 40% sau khi xong demo, và 30% khi bàn giao source code.'),
(3, 'Bạn có hỗ trợ bảo hành sau khi bàn giao?', 'Chắc chắn. Tôi cam kết hỗ trợ fix bug miễn phí trong 3 tháng đầu sau khi bàn giao.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`features`)),
  `popular` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pricing`
--

INSERT INTO `pricing` (`id`, `name`, `price`, `features`, `popular`) VALUES
(1, 'Basic', '$500', '[\"Landing Page\", \"Responsive Design\", \"SEO cơ bản\"]', 0),
(2, 'Standard', '$1200', '[\"Website đa trang\", \"CMS quản trị\", \"SEO nâng cao\"]', 1),
(3, 'Premium', '$2500+', '[\"Web App phức tạp\", \"E-commerce\", \"API Integration\"]', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `about_text` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `profile`
--

INSERT INTO `profile` (`id`, `name`, `role`, `phone`, `email`, `about_text`, `img`) VALUES
(1, 'Đăng Khoa', 'Full Stack Developer', '0909.123.456', 'contact@dangkhoa.com', '5 năm kinh nghiệm xây dựng hệ thống web quy mô lớn.', '/assets/img/avt-min.avif');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tech_stack` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tech_stack`)),
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `link_demo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `projects`
--

INSERT INTO `projects` (`id`, `name`, `role`, `year`, `type`, `img`, `description`, `tech_stack`, `gallery`, `link_demo`) VALUES
(1, 'E-commerce Fashion', 'Full Stack Dev', '2023', 'Web', '/assets/img/project1.avif', 'Website bán hàng thời trang tích hợp thanh toán online và quản lý kho hàng.', '[\"Laravel\", \"VueJS\", \"MySQL\", \"Stripe\"]', '[\"https://via.placeholder.com/800x600\", \"https://via.placeholder.com/800x600\"]', '#'),
(2, 'Health Tracking App', 'Mobile Dev', '2024', 'App', '/assets/img/project2.avif', 'Ứng dụng theo dõi sức khỏe, đếm bước chân và nhắc nhở uống nước.', '[\"Flutter\", \"Firebase\", \"Google Fit API\"]', '[]', '#'),
(3, 'Banking Dashboard UI', 'UI/UX Designer', '2023', 'Design', '/assets/img/project3.avif', 'Thiết kế giao diện quản lý tài chính ngân hàng hiện đại, tối ưu trải nghiệm người dùng.', '[\"Figma\", \"Adobe XD\", \"Photoshop\"]', '[]', '#'),
(4, 'Real Estate Platform', 'Backend Lead', '2022', 'Web', '/assets/img/project4.avif', 'Nền tảng đăng tin bất động sản với tính năng bản đồ và tìm kiếm nâng cao.', '[\"NodeJS\", \"MongoDB\", \"ReactJS\", \"Google Maps\"]', '[]', '#'),
(5, 'Food Delivery App', 'Mobile Dev', '2024', 'App', '/assets/img/project5.avif', 'Ứng dụng đặt đồ ăn nhanh, giao hàng hỏa tốc và theo dõi tài xế thời gian thực.', '[\"React Native\", \"Redux\", \"Socket.io\"]', '[]', '#'),
(6, 'Travel Booking System', 'Full Stack Dev', '2023', 'Web', '/assets/img/project6.avif', 'Hệ thống đặt vé máy bay và khách sạn trực tuyến quy mô lớn.', '[\"PHP\", \"MySQL\", \"jQuery\", \"Bootstrap\"]', '[]', '#');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_role` varchar(100) DEFAULT NULL,
  `review_text` text NOT NULL,
  `star` int(11) DEFAULT 5,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_name`, `user_role`, `review_text`, `star`, `created_at`) VALUES
(1, 'Trần Minh Tuấn', 'CEO & Founder @ TechStart', 'Dương là một lập trình viên có tư duy logic tuyệt vời. Dự án hoàn thành sớm hơn dự kiến và chạy rất ổn định.', 5, '2025-11-24 04:21:04'),
(2, 'Nguyễn Lan Anh', 'Project Manager', 'Giao diện Portfolio rất ấn tượng và chuyên nghiệp. Rất thích cách bạn tối ưu trải nghiệm người dùng.', 5, '2025-11-24 04:21:04'),
(3, 'Michael Wong', 'Client quốc tế', 'High quality code and great communication skills. Highly recommended!', 5, '2025-11-24 04:21:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `skills`
--

INSERT INTO `skills` (`id`, `title`, `icon`, `description`) VALUES
(1, 'Web Development', 'fa-code', 'Building fast, scalable websites using Laravel, Node.js, and ReactJS.'),
(2, 'UI/UX Design', 'fa-paint-brush', 'Creating intuitive, user-centric interfaces with Figma and Adobe XD.'),
(3, 'Database Design', 'fa-database', 'Optimized database structures using MySQL, MongoDB, and Redis.'),
(4, 'Mobile App Dev', 'fa-mobile-alt', 'Cross-platform mobile applications using Flutter and React Native.'),
(5, 'DevOps & Cloud', 'fa-cloud', 'Server management, Docker, AWS deployment, and CI/CD pipelines.'),
(6, 'SEO Optimization', 'fa-rocket', 'Boosting site performance and ranking with technical SEO standards.'),
(7, 'API Integration', 'fa-network-wired', 'Secure RESTful API development and third-party integrations.'),
(8, 'E-commerce', 'fa-shopping-cart', 'Online store setup, payment gateways, and shopping cart solutions.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tech_stack`
--

CREATE TABLE `tech_stack` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tech_stack`
--

INSERT INTO `tech_stack` (`id`, `name`, `icon`, `color`) VALUES
(1, 'ReactJS', 'fab fa-react', '#61DAFB'),
(2, 'Laravel', 'fab fa-laravel', '#FF2D20'),
(3, 'NodeJS', 'fab fa-node-js', '#339933'),
(4, 'VueJS', 'fab fa-vuejs', '#4FC08D'),
(5, 'Angular', 'fab fa-angular', '#DD0031'),
(6, 'Python', 'fab fa-python', '#3776AB'),
(7, 'PHP', 'fab fa-php', '#777BB4'),
(8, 'Docker', 'fab fa-docker', '#2496ED'),
(9, 'AWS', 'fab fa-aws', '#FF9900'),
(10, 'Figma', 'fab fa-figma', '#F24E1E'),
(11, 'Sass', 'fab fa-sass', '#CC6699'),
(12, 'Bootstrap', 'fab fa-bootstrap', '#7952B3'),
(13, 'Git', 'fab fa-git-alt', '#F05032'),
(14, 'MySQL', 'fas fa-database', '#4479A1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `workflow`
--

CREATE TABLE `workflow` (
  `id` int(11) NOT NULL,
  `step` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `workflow`
--

INSERT INTO `workflow` (`id`, `step`, `title`, `description`, `icon`) VALUES
(1, '01', 'Khám phá', 'Trao đổi, phân tích yêu cầu và định hình giải pháp.', 'fa-search'),
(2, '02', 'Thiết kế', 'Lên wireframe, prototype và thiết kế giao diện UI/UX.', 'fa-pencil-ruler'),
(3, '03', 'Phát triển', 'Viết code sạch (Clean Code), tối ưu hiệu năng.', 'fa-code'),
(4, '04', 'Bàn giao', 'Kiểm thử (Testing), deploy và hướng dẫn sử dụng.', 'fa-rocket');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tech_stack`
--
ALTER TABLE `tech_stack`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tech_stack`
--
ALTER TABLE `tech_stack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `workflow`
--
ALTER TABLE `workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
