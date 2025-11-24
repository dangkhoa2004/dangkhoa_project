<?php
// index.php - ROUTER CHÍNH CỦA PORTFOLIO

require_once 'includes/config.php';
require_once 'includes/db.php';

$request_uri = $_SERVER['REQUEST_URI'];
$project_folder = PROJECT_FOLDER; // Lấy từ config.php

// Xử lý chuỗi URL để lấy phần router
$router = str_replace($project_folder, '', $request_uri);
$router = strtok($router, '?');

// --- CẤU HÌNH SEO MẶC ĐỊNH ---
$page_title = "Đăng Khoa - Full Stack Developer Portfolio";
$meta_desc     = "Portfolio cá nhân của Đăng Khoa. Chuyên thiết kế Website, Lập trình Mobile App và Tư vấn giải pháp phần mềm.";
$meta_image = $project_folder . "/assets/images/me-default.jpg"; // Ảnh đại diện mặc định
$page_content = null;

// --- ĐỊNH TUYẾN (ROUTING) ---

// 1. TRANG CHỦ
if ($router == '/' || $router == '/trang-chu' || $router == '/home') {
    $page_content = 'pages/home.php';
}

// 2. CHI TIẾT DỰ ÁN (KHỐI NÀY ĐÃ ĐƯỢC XÓA)
// Loại bỏ đoạn code: elseif (preg_match('#^/chi-tiet/(.+)$#', $router, $matches)) { ... }


// 2. TRANG CV/PROFILE (Đã đổi số thứ tự)
elseif ($router == '/cv-online') {
    $page_title = "Hồ sơ năng lực (CV) - Đăng Khoa";
    // $page_content = 'pages/cv.php';
}

// 3. TRANG BLOG (Đã đổi số thứ tự)
elseif ($router == '/blog') {
    $page_title = "Blog chia sẻ kiến thức - Đăng Khoa";
    // $page_content = 'pages/blog.php';
}

// 4. LỖI 404 (Đã đổi số thứ tự)
else {
    $page_title = "Lỗi 404 - Trang không tồn tại";
}

// --- GỌI GIAO DIỆN ---
require_once 'includes/header.php';

if ($page_content && file_exists($page_content)) {
    // Nếu có file nội dung (home.php) thì load vào
    require_once $page_content;
} elseif ($router == '/cv-online' || $router == '/blog') {
    // Nội dung tạm cho CV và Blog
    echo "<div class='container' style='padding:100px 0; text-align:center'>
             <i class='fas fa-tools' style='font-size:50px; color:#ddd; margin-bottom:20px'></i>
             <h3>Tính năng đang phát triển</h3>
             <p>Vui lòng quay lại sau để xem nội dung này.</p>
             <a href='$project_folder/trang-chu' style='color:var(--primary); font-weight:bold'>Về trang chủ</a>
         </div>";
} else {
    // Giao diện 404
    echo "<div class='container' style='padding:100px 0; text-align:center'>
             <h1 style='color:#ccc; font-size:80px; margin:0'>404</h1>
             <h3 style='margin-top:0'>Không tìm thấy trang!</h3>
             <p>Đường dẫn bạn truy cập không tồn tại hoặc đã bị xóa.</p>
             <a href='$project_folder/trang-chu' style='display:inline-block; margin-top:20px; padding:10px 25px; background:var(--primary); color:white; border-radius:5px; text-decoration:none'>Về trang chủ</a>
         </div>";
}

$conn->close();
require_once 'includes/footer.php';
