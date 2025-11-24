<?php

/**
 * --------------------------------------------------------------------------
 * TRANG CHỦ PROFILE - CLEAN VERSION (TÁCH FILE)
 * --------------------------------------------------------------------------
 */

// 1. KẾT NỐI DATABASE
// SỬA LẠI ĐƯỜNG DẪN: Trỏ ra thư mục cha (gốc) thay vì thư mục includes
require_once __DIR__ . '/../includes/db.php';

// 2. LẤY DỮ LIỆU & FALLBACK
try {
    $profile      = function_exists('get_my_profile') ? get_my_profile($conn) : [];
    $projects     = function_exists('get_projects') ? get_projects($conn, 9) : [];
    $skills       = function_exists('get_skills') ? get_skills($conn) : [];
    $work_history = function_exists('get_experience') ? get_experience($conn) : [];
    $certs        = function_exists('get_certifications') ? get_certifications($conn) : [];
    $articles     = function_exists('get_latest_articles') ? get_latest_articles($conn) : [];
    $faqs         = function_exists('get_faqs') ? get_faqs($conn) : [];
    $reviews      = function_exists('get_testimonials') ? get_testimonials($conn) : [];
} catch (Exception $e) {
    $profile = [];
}

// 3. DỮ LIỆU MẶC ĐỊNH
$profile_name  = $profile['name'] ?? 'Đăng Khoa';
$profile_role  = $profile['role'] ?? 'Senior Full Stack Developer';
$profile_img   = $profile['img'] ?? '/assets/img/avt-min.JPG';
$profile_about = $profile['about_text'] ?? 'Tôi chuyên xây dựng các ứng dụng web hiệu năng cao, bảo mật và trải nghiệm người dùng tuyệt vời.';
$profile_email = $profile['email'] ?? 'contact@dangkhoa.dev';
$profile_phone = $profile['phone'] ?? '+84 909 123 456';
$hour = date('H');
$greeting = ($hour < 12) ? "Chào buổi sáng" : (($hour < 18) ? "Chào buổi chiều" : "Chào buổi tối");

// Dữ liệu tĩnh (Workflow & Pricing) - THEO YÊU CẦU CỦA BẠN LÀ KHÔNG DÙNG DB
// 3. LẤY DỮ LIỆU TỪ DATABASE (Workflow, Pricing, Tech Stack)
try {
    $workflow   = function_exists('get_workflow') ? get_workflow($conn) : [];
    $pricing    = function_exists('get_pricing') ? get_pricing($conn) : [];
    $tech_stack = function_exists('get_tech_stack') ? get_tech_stack($conn) : [];
} catch (Exception $e) {
    $workflow = [];
    $pricing = [];
    $tech_stack = [];
}

// Chia mảng thành 2 phần để chạy 2 hàng
$chunk_size = ceil(count($tech_stack) / 2);
$row1 = array_slice($tech_stack, 0, $chunk_size);
$row2 = array_slice($tech_stack, $chunk_size);
?>

<link rel="stylesheet" href="assets/css/home.css">

<div>
    <section id="about" class="hero">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-text fade-up">
                    <div class="hero-badge">
                        <span class="status-dot"></span>
                        <?php echo $greeting . ', ' . $profile_name; ?> - Open for Work
                    </div>
                    <h1 class="hero-title">
                        Helping brands <br>
                        <span>Build & Scale</span><br>
                        Digital Products.
                    </h1>
                    <p style="font-size: 20px; margin-bottom: 40px;">
                        <?php echo $profile_about; ?>
                    </p>
                    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                        <a href="#contact" class="btn btn-primary shine-effect">
                            Bắt đầu dự án <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="#portfolio" class="btn btn-outline">
                            Xem Portfolio <i class="fas fa-layer-group"></i>
                        </a>
                    </div>

                    <div id="skills" style="margin-top: 60px; display: flex; gap: 40px; border-top: 1px solid #e5e7eb; padding-top: 30px;">
                        <div><span style="font-size: 32px; font-weight: 800;">5+</span>
                            <div style="font-size: 14px; color: var(--gray);">Years Exp</div>
                        </div>
                        <div><span style="font-size: 32px; font-weight: 800;">50+</span>
                            <div style="font-size: 14px; color: var(--gray);">Projects</div>
                        </div>
                        <div><span style="font-size: 32px; font-weight: 800;">20+</span>
                            <div style="font-size: 14px; color: var(--gray);">Happy Clients</div>
                        </div>
                    </div>
                </div>

                <div class="hero-img-box fade-up" style="transition-delay: 0.2s;">
                    <div class="hero-blob"></div>
                    <img src="<?php echo $profile_img; ?>" alt="<?php echo $profile_name; ?>" class="hero-img">

                    <div class="float-stat top-right">
                        <div class="stat-icon-box" style="background: #fee2e2; color: #ef4444;"><i class="fas fa-heart"></i></div>
                        <div>
                            <div style="font-weight: 800; font-size: 16px;">100%</div>
                            <div style="font-size: 12px; color: #666;">Feedback Tốt</div>
                        </div>
                    </div>

                    <div class="float-stat bottom-left">
                        <div class="stat-icon-box" style="background: #dbeafe; color: #2563eb;"><i class="fas fa-code"></i></div>
                        <div>
                            <div style="font-weight: 800; font-size: 16px;">Clean Code</div>
                            <div style="font-size: 12px; color: #666;">Chuẩn SEO</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="brand-section">
        <div class="marquee-wrapper">
            <div class="marquee-row scroll-left">
                <?php for ($i = 0; $i < 2; $i++): // Lặp lại 2 lần để tạo hiệu ứng vô tận 
                ?>
                    <div class="marquee-group">
                        <?php foreach ($row1 as $item): ?>
                            <div class="brand-card">
                                <i class="<?php echo $item['icon']; ?>" style="color: <?php echo $item['color']; ?>"></i>
                                <span><?php echo $item['name']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="marquee-row scroll-right">
                <?php for ($i = 0; $i < 2; $i++): ?>
                    <div class="marquee-group">
                        <?php foreach ($row2 as $item): ?>
                            <div class="brand-card">
                                <i class="<?php echo $item['icon']; ?>" style="color: <?php echo $item['color']; ?>"></i>
                                <span><?php echo $item['name']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endfor; ?>
            </div>

        </div>
    </div>

    <section id="services" class="section-padding">
        <div class="container">
            <div class="section-header fade-up">
                <span class="section-tag">Dịch vụ</span>
                <h2 class="section-title">Giải pháp chất lượng cao</h2>
                <p class="section-desc">Tôi cung cấp các giải pháp công nghệ toàn diện giúp doanh nghiệp của bạn vận hành trơn tru.</p>
            </div>
            <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                <?php if (!empty($skills)): foreach ($skills as $index => $skill): ?>
                        <div class="service-card fade-up" style="transition-delay: <?php echo $index * 0.1; ?>s">
                            <div class="service-icon"><i class="fas <?php echo $skill['icon']; ?>"></i></div>
                            <h3 style="font-size: 22px; margin-bottom: 15px;"><?php echo $skill['title']; ?></h3>
                            <p><?php echo $skill['description']; ?></p>
                            <a href="#" style="color: var(--primary); font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                                Tìm hiểu thêm <i class="fas fa-arrow-right" style="font-size: 12px;"></i>
                            </a>
                        </div>
                    <?php endforeach;
                else: ?>
                    <p class="text-center">Đang cập nhật dịch vụ...</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section-padding" style="background: #f8fafc;">
        <div class="container">
            <div class="section-header fade-up">
                <span class="section-tag">Quy trình</span>
                <h2 class="section-title">Cách tôi làm việc</h2>
            </div>
            <div class="workflow-grid">
                <div class="connector-line"></div>
                <?php foreach ($workflow as $index => $step): ?>
                    <div class="step-card fade-up" style="transition-delay: <?php echo $index * 0.2; ?>s">
                        <div class="step-icon"><i class="fas <?php echo $step['icon']; ?>"></i></div>
                        <div class="step-number"><?php echo $step['step']; ?></div>
                        <h3 style="font-size: 20px; margin-bottom: 10px;"><?php echo $step['title']; ?></h3>
                        <p style="font-size: 14px;"><?php echo $step['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id class="stats-section">
        <div class="container">
            <div class="grid" style="grid-template-columns: repeat(4, 1fr);">
                <div class="stat-item"><span class="stat-number" data-target="5">0</span><span class="stat-label">Năm kinh nghiệm</span></div>
                <div class="stat-item"><span class="stat-number" data-target="52">0</span><span class="stat-label">Dự án hoàn thành</span></div>
                <div class="stat-item"><span class="stat-number" data-target="1500">0</span><span class="stat-label">Giờ làm việc</span></div>
                <div class="stat-item"><span class="stat-number" data-target="24">0</span><span class="stat-label">Giải thưởng</span></div>
            </div>
        </div>
    </section>

    <section id="experience" class="section-padding">
        <div class="container">
            <div class="grid grid-2-col" style="grid-template-columns: 1fr 1fr; gap: 60px;">
                <div class="fade-up">
                    <span class="section-tag">Hành trình</span>
                    <h2 class="section-title">Kinh nghiệm làm việc</h2>
                    <div style="border-left: 2px solid #e5e7eb; padding-left: 30px;">
                        <?php foreach ($work_history as $work): ?>
                            <div style="position: relative; padding-bottom: 40px;">
                                <span style="position: absolute; left: -39px; top: 0; width: 16px; height: 16px; background: var(--primary); border-radius: 50%; border: 4px solid white;"></span>
                                <span style="font-size: 13px; font-weight: bold; background: #eff6ff; color: var(--primary); padding: 4px 10px; border-radius: 4px;"><?php echo $work['duration']; ?></span>
                                <h4 style="margin: 10px 0 5px; font-size: 18px;"><?php echo $work['role']; ?></h4>
                                <div style="font-weight: 600; color: #4b5563; margin-bottom: 10px;"><?php echo $work['company']; ?></div>
                                <p style="font-size: 15px; margin: 0;"><?php echo $work['description']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="fade-up" style="transition-delay: 0.2s;">
                    <div style="background: var(--dark); color: white; padding: 40px; border-radius: 20px; position: relative; overflow: hidden;">
                        <h3 style="margin-bottom: 30px; font-size: 28px;">Chứng chỉ & Bằng cấp</h3>
                        <div style="display: flex; flex-direction: column; gap: 20px;">
                            <?php foreach ($certs as $cert): ?>
                                <div style="display: flex; align-items: center; gap: 20px; background: rgba(255,255,255,0.1); padding: 20px; border-radius: 12px;">
                                    <div style="font-size: 30px; color: var(--accent);"><i class="fas fa-certificate"></i></div>
                                    <div>
                                        <div style="font-weight: bold; font-size: 16px;"><?php echo $cert['name']; ?></div>
                                        <div style="font-size: 13px; color: #ccc;"><?php echo $cert['org']; ?> • <?php echo $cert['year']; ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div style="margin-top: 40px; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.1);">
                            <a href="#" class="btn btn-outline" style="border-color: white; color: white;">Download CV <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="section-padding" style="background: #f8fafc;">
        <div class="container">
            <div class="section-header fade-up">
                <span class="section-tag">Portfolio</span>
                <h2 class="section-title">Dự án tiêu biểu</h2>
            </div>
            <div class="portfolio-filters fade-up">
                <button class="filter-btn active" data-filter="all">Tất cả</button>
                <button class="filter-btn" data-filter="Web">Website</button>
                <button class="filter-btn" data-filter="App">Mobile App</button>
                <button class="filter-btn" data-filter="Design">UI/UX Design</button>
            </div>
            <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));" id="project-grid">
                <?php if (!empty($projects)): ?>
                    <?php foreach ($projects as $p):
                        $cats = ['Web', 'App', 'Design'];
                        $p_cat = $p['type'] ?? $cats[array_rand($cats)];
                    ?>
                        <div class="project-card fade-up" data-cat="<?php echo $p_cat; ?>">
                            <div class="project-img-wrap">
                                <img src="<?php echo $p['img']; ?>" alt="<?php echo $p['name']; ?>" class="project-img">
                                <div class="project-overlay"><a href="#" class="icon-btn"><i class="fas fa-link"></i></a></div>
                            </div>
                            <div style="padding: 25px;">
                                <div style="font-size: 12px; font-weight: bold; color: var(--primary); text-transform: uppercase; margin-bottom: 8px;"><?php echo $p_cat; ?></div>
                                <h3 style="font-size: 20px; margin-bottom: 10px;"><?php echo $p['name']; ?></h3>
                                <p style="font-size: 14px; margin-bottom: 0;">Vai trò: <?php echo $p['role']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center w-100">Chưa có dự án nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="pricing" class="section-padding">
        <div class="container">
            <div class="section-header fade-up">
                <span class="section-tag">Bảng giá</span>
                <h2 class="section-title">Các gói dịch vụ</h2>
            </div>
            <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); align-items: center;">
                <?php foreach ($pricing as $index => $plan): ?>
                    <div class="pricing-card fade-up <?php echo $plan['popular'] ? 'popular' : ''; ?>" style="transition-delay: <?php echo $index * 0.2; ?>s">
                        <?php if ($plan['popular']): ?><div class="pricing-badge">Phổ biến nhất</div><?php endif; ?>
                        <h3 style="font-size: 24px;"><?php echo $plan['name']; ?></h3>
                        <span class="price-num"><?php echo $plan['price']; ?></span>
                        <ul class="feature-list">
                            <?php foreach ($plan['features'] as $f): ?><li><i class="fas fa-check-circle"></i> <?php echo $f; ?></li><?php endforeach; ?>
                        </ul>
                        <a href="#contact" class="btn <?php echo $plan['popular'] ? 'btn-primary' : 'btn-outline'; ?>" style="width: 100%; justify-content: center;">Chọn gói này</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="container fade-up" style="margin-bottom: 100px;">
        <div class="cta-box">
            <div class="cta-deco" style="top: -50px; left: -50px;"></div>
            <div class="cta-deco" style="bottom: -50px; right: -50px;"></div>
            <div style="position: relative; z-index: 2;">
                <h2 style="font-size: 48px; font-weight: 900; margin-bottom: 20px;">Sẵn sàng bứt phá?</h2>
                <a href="mailto:<?php echo $profile_email; ?>" class="btn" style="background: white; color: black; padding: 18px 45px;">Liên hệ ngay</a>
            </div>
        </div>
    </section>
    <section id="reviews" class="section-padding" style="background: #f8fafc;">
        <div class="container">
            <div class="grid grid-2-col" style="grid-template-columns: 1fr 1fr; gap: 80px;">
                <div>
                    <span class="section-tag">Đánh giá</span>
                    <h2 class="section-title" style="margin-bottom: 30px;">Khách hàng nói gì?</h2>
                    <div style="display: flex; flex-direction: column; gap: 30px;">
                        <?php if (!empty($reviews)): foreach (array_slice($reviews, 0, 3) as $index => $r):
                                // Bổ sung: Lấy đường dẫn AVIF cục bộ
                                // Cần đảm bảo các file review-0.avif, review-1.avif, review-2.avif có tồn tại trong /assets/img/avatars/
                                $avatar_path = ($project_folder ?? '') . "/assets/img/review-" . $index . ".avif";
                        ?>
                                <div class="review-card fade-up">
                                    <p style="font-style: italic; color: #555; margin-bottom: 20px;">"<?php echo $r['review_text']; ?>"</p>
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <div style="width: 45px; height: 45px; background: #ddd; border-radius: 50%; overflow: hidden;">
                                            <img
                                                src="<?php echo $avatar_path; ?>"
                                                alt="Avatar của <?php echo $r['user_name']; ?>"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <div>
                                            <div style="font-weight: bold; color: var(--dark);"><?php echo $r['user_name']; ?></div>
                                            <div style="font-size: 12px; color: var(--accent);"><?php for ($i = 0; $i < $r['star']; $i++) echo '<i class="fas fa-star"></i>'; ?></div>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>

                <div>
                    <span class="section-tag">F.A.Q</span>
                    <h2 class="section-title" style="margin-bottom: 30px;">Câu hỏi thường gặp</h2>
                    <div class="faq-list">
                        <?php if (!empty($faqs)): foreach ($faqs as $faq): ?>
                                <div class="fade-up" style="border-bottom: 1px solid #e5e7eb; padding: 20px 0;">
                                    <details>
                                        <summary style="font-weight: 700; font-size: 18px; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                                            <?php echo $faq['question']; ?>
                                            <span style="color: var(--primary); font-size: 24px;">+</span>
                                        </summary>
                                        <p style="margin-top: 15px; color: var(--gray);"><?php echo $faq['answer']; ?></p>
                                    </details>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" style="background: #111; padding: 100px 0; color: white;">
        <div class="container">
            <div class="grid grid-2-col" style="grid-template-columns: 1fr 1fr; gap: 80px;">
                <div>
                    <h2 style="font-size: 56px; margin-top: 20px; margin-bottom: 30px;">Let's work together!</h2>
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        <div style="display: flex; align-items: center; gap: 20px;">
                            <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;"><i class="fas fa-envelope"></i></div>
                            <div>
                                <div style="font-size: 14px; color: #999;">Email me at</div>
                                <div style="font-size: 18px; font-weight: bold;"><?php echo $profile_email; ?></div>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 20px;">
                            <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;"><i class="fas fa-phone"></i></div>
                            <div>
                                <div style="font-size: 14px; color: #999;">Call me at</div>
                                <div style="font-size: 18px; font-weight: bold;"><?php echo $profile_phone; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="background: white; padding: 50px; border-radius: 20px; color: var(--dark);">
                    <form id="contactForm">
                        <div style="margin-bottom: 20px;"><label style="font-weight: 600; display: block; margin-bottom: 8px;">Họ tên</label><input type="text" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px;"></div>
                        <div style="margin-bottom: 20px;"><label style="font-weight: 600; display: block; margin-bottom: 8px;">Email</label><input type="email" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px;"></div>
                        <div style="margin-bottom: 20px;"><label style="font-weight: 600; display: block; margin-bottom: 8px;">Nội dung</label><textarea rows="4" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px;"></textarea></div>
                        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">Gửi tin nhắn</button>
                    </form>
                </div>
            </div>
        </div>
    </section>



</div>

<script src="assets/js/home.js"></script>