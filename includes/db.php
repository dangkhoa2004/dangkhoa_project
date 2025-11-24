<?php
// db.php - DATABASE FUNCTIONS FOR PORTFOLIO

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'my_portfolio'); // Đổi tên DB của bạn nếu cần

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) die("Lỗi kết nối: " . $conn->connect_error);
$conn->set_charset("utf8mb4");

// 1. Lấy danh sách Dự án (get_projects)
function get_projects($conn, $limit = 6)
{
    // Map cột: name=Tên, role=Giá, year=Địa điểm, img=Ảnh
    $stmt = $conn->prepare("SELECT id, name, role, year, img, type FROM projects LIMIT ?");
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// 2. Lấy Kỹ năng (Skills) (get_skills)
function get_skills($conn)
{
    return $conn->query("SELECT icon, title, description FROM skills")->fetch_all(MYSQLI_ASSOC);
}

// 3. Lấy Thông tin cá nhân (Profile) (get_my_profile)
function get_my_profile($conn)
{
    return $conn->query("SELECT * FROM profile LIMIT 1")->fetch_assoc();
}

// 4. Lấy Testimonials (Reviews) (get_testimonials)
function get_testimonials($conn)
{
    return $conn->query("SELECT user_name, user_role, review_text, star FROM reviews")->fetch_all(MYSQLI_ASSOC);
}

// 5. Lấy Kinh nghiệm làm việc (get_experience)
function get_experience($conn)
{
    $result = $conn->query("SELECT * FROM experience ORDER BY ordering ASC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// 6. Lấy Chứng chỉ (get_certifications)
function get_certifications($conn)
{
    $result = $conn->query("SELECT * FROM certifications ORDER BY id DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// 7. Lấy Blog mới nhất (get_latest_articles)
function get_latest_articles($conn, $limit = 3)
{
    $stmt = $conn->prepare("SELECT * FROM articles ORDER BY publish_date DESC LIMIT ?");
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// 8. Lấy FAQs (get_faqs)
function get_faqs($conn)
{
    $result = $conn->query("SELECT * FROM faqs");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// 9. Lấy Workflow (get_workflow)
function get_workflow($conn)
{
    return $conn->query("SELECT * FROM workflow ORDER BY step ASC")->fetch_all(MYSQLI_ASSOC);
}

// 10. Lấy Pricing (get_pricing)
function get_pricing($conn)
{
    $result = $conn->query("SELECT * FROM pricing");
    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Quan trọng: Giải mã JSON features thành mảng PHP
            $row['features'] = json_decode($row['features'], true);
            $data[] = $row;
        }
    }
    return $data;
}

// 11. Lấy Tech Stack (get_tech_stack)
function get_tech_stack($conn)
{
    return $conn->query("SELECT * FROM tech_stack")->fetch_all(MYSQLI_ASSOC);
}
