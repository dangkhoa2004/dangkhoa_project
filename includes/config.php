<?php

/**
 * ---------------------------------------------------------
 * CẤU HÌNH HỆ THỐNG TOÀN CỤC (GLOBAL CONFIGURATIONS)
 * ---------------------------------------------------------
 */

// 1. CẤU HÌNH ĐƯỜNG DẪN GỐC CỦA DỰ ÁN
// Hằng số này giúp tạo các đường dẫn tuyệt đối an toàn.

// Tên thư mục dự án khi chạy trên XAMPP (Localhost).
$local_project_folder = 'dangkhoa_project';

// Lấy thông tin Host
$host = $_SERVER['HTTP_HOST'];

// KIỂM TRA MÔI TRƯỜNG CHẠY
// Nếu host là localhost hoặc 127.0.0.1, thì ta đang chạy Localhost.
if ($host === 'localhost' || $host === '127.0.0.1') {
    // Localhost: Cần tên thư mục dự án
    define('PROJECT_FOLDER', '/' . $local_project_folder);
} else {
    // Host thật (Production): Không cần tên thư mục dự án.
    define('PROJECT_FOLDER', '');
}

// 2. CẤU HÌNH KẾT NỐI CSDL (Tùy chọn...)
// ...

// 3. CÁC HẰNG SỐ CHUNG KHÁC
// ...