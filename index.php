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
$meta_desc  = "Portfolio cá nhân của Đăng Khoa. Chuyên thiết kế Website, Lập trình Mobile App và Tư vấn giải pháp phần mềm.";
$meta_image = $project_folder . "/assets/images/me-default.jpg"; // Ảnh đại diện mặc định
$page_content = null; 

// --- ĐỊNH TUYẾN (ROUTING) ---

// 1. TRANG CHỦ
if ($router == '/' || $router == '/trang-chu' || $router == '/home') {
    $page_content = 'pages/home.php';
}

// 2. CHI TIẾT DỰ ÁN (Thay vì chi tiết nhà đất)
elseif (preg_match('#^/chi-tiet/(.+)$#', $router, $matches)) {
    $product_id = $matches[1];
    $page_content = 'pages/detail.php';

    // Gọi hàm mới: get_project_details (đã sửa trong db.php)
    $found_item = get_project_details($conn, $product_id); 

    if ($found_item) {
        // Cập nhật SEO theo Dự án
        $page_title = $found_item['name'] . " - Dự án tiêu biểu";
        // Thay Giá/Diện tích bằng Vai trò/Năm thực hiện
        $meta_desc  = "Dự án: " . $found_item['name'] . ". Vai trò: " . ($found_item['role'] ?? 'Developer') . ". Năm: " . ($found_item['year'] ?? 'N/A');
        $meta_image = $found_item['img'];
    } else {
        $page_title = "Không tìm thấy dự án - 404";
    }
}

// 3. TRANG LIÊN HỆ
elseif ($router == '/lien-he') {
    $page_title = "Liên hệ hợp tác - Đăng Khoa";
    // Bạn có thể tạo file pages/contact.php sau này, tạm thời hiển thị text
}

// 4. TRANG CV/PROFILE (Khớp với Header mới)
elseif ($router == '/cv-online') {
    $page_title = "Hồ sơ năng lực (CV) - Đăng Khoa";
    // $page_content = 'pages/cv.php'; // Tạo file này nếu muốn trang CV riêng
}

// 5. TRANG BLOG (Khớp với Header mới)
elseif ($router == '/blog') {
    $page_title = "Blog chia sẻ kiến thức - Đăng Khoa";
    // $page_content = 'pages/blog.php';
}

// 6. LỖI 404
else {
    $page_title = "Lỗi 404 - Trang không tồn tại";
}

// --- GỌI GIAO DIỆN ---
require_once 'includes/header.php';

if ($page_content && file_exists($page_content)) {
    // Nếu có file nội dung (home.php, detail.php) thì load vào
    require_once $page_content;
} 
elseif ($router == '/lien-he') {
    // Nội dung tạm cho trang Liên hệ nếu chưa có file php riêng
    echo "<div class='container' style='padding:80px 0; text-align:center'>
            <h2 style='margin-bottom:20px'>Liên hệ với tôi</h2>
            <p>Email: contact@dangkhoa.com | Phone: 0909.xxx.xxx</p>
            <p>Hệ thống form liên hệ đang được cập nhật...</p>
          </div>";
}
elseif ($router == '/cv-online' || $router == '/blog') {
    // Nội dung tạm cho CV và Blog
    echo "<div class='container' style='padding:100px 0; text-align:center'>
            <i class='fas fa-tools' style='font-size:50px; color:#ddd; margin-bottom:20px'></i>
            <h3>Tính năng đang phát triển</h3>
            <p>Vui lòng quay lại sau để xem nội dung này.</p>
            <a href='$project_folder/trang-chu' style='color:var(--primary); font-weight:bold'>Về trang chủ</a>
          </div>";
}
else {
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
?>