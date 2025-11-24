<?php
// db.php - DATABASE FUNCTIONS FOR PORTFOLIO

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'my_portfolio'); // Đổi tên DB của bạn

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) die("Lỗi kết nối: " . $conn->connect_error);
$conn->set_charset("utf8mb4");

// 1. Lấy danh sách Dự án (Thay vì products)
function get_projects($conn, $limit = 6)
{
    // Map cột: name=Tên, role=Giá, year=Địa điểm, img=Ảnh
    $stmt = $conn->prepare("SELECT id, name, role, year, img, type FROM projects LIMIT ?");
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// 2. Lấy chi tiết Dự án
function get_project_details($conn, $id)
{
    $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        // Giải mã JSON tech_stack và gallery
        $result['tech_stack'] = json_decode($result['tech_stack'] ?? '[]', true);
        $result['gallery'] = json_decode($result['gallery'] ?? '[]', true);
    }
    return $result;
}

// 3. Lấy Kỹ năng (Skills)
function get_skills($conn)
{
    return $conn->query("SELECT icon, title, description FROM skills")->fetch_all(MYSQLI_ASSOC);
}

// 4. Lấy Thông tin cá nhân (Profile)
function get_my_profile($conn)
{
    return $conn->query("SELECT * FROM profile LIMIT 1")->fetch_assoc();
}

// 5. Lấy Testimonials (Reviews cũ)
function get_testimonials($conn)
{
    // Giả sử bảng reviews vẫn giữ nguyên cấu trúc
    return $conn->query("SELECT user_name, user_role, review_text, star FROM reviews")->fetch_all(MYSQLI_ASSOC);
}
// 5. Lấy Kinh nghiệm làm việc
function get_experience($conn)
{
    // Sắp xếp theo ordering ASC (hoặc id DESC tùy bạn)
    $result = $conn->query("SELECT * FROM experience ORDER BY ordering ASC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// 6. Lấy Chứng chỉ
function get_certifications($conn)
{
    $result = $conn->query("SELECT * FROM certifications ORDER BY id DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// 7. Lấy Blog mới nhất
function get_latest_articles($conn, $limit = 3)
{
    $stmt = $conn->prepare("SELECT * FROM articles ORDER BY publish_date DESC LIMIT ?");
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// 8. Lấy FAQs
function get_faqs($conn)
{
    $result = $conn->query("SELECT * FROM faqs");
    return $result->fetch_all(MYSQLI_ASSOC);
}
