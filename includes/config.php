<?php

/**
 * ---------------------------------------------------------
 * CẤU HÌNH HỆ THỐNG TOÀN CỤC (GLOBAL CONFIGURATIONS)
 * ---------------------------------------------------------
 * File này chỉ được gọi DUY NHẤT một lần trong index.php.
 */

// 1. CẤU HÌNH ĐƯỜNG DẪN GỐC CỦA DỰ ÁN
// Hằng số này giúp tạo các đường dẫn tuyệt đối an toàn (ví dụ: cho CSS, ảnh, và các liên kết).
// PHẢI KHỚP VỚI TÊN THƯ MỤNG CỦA BẠN TRÊN XAMPP.
// Dựa trên lỗi trước đó, tên thư mục của bạn là 'my_portfolio'.
define('PROJECT_FOLDER', '');

// 2. CẤU HÌNH KẾT NỐI CSDL (Tùy chọn, nếu bạn không muốn đặt trong db.php)
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'my_portfolio');

// 3. CÁC HẰNG SỐ CHUNG KHÁC
// define('SITE_NAME', 'Đăng Khoa - Full Stack Developer Portfolio');
// define('MAX_PRODUCTS_PER_PAGE', 12);
