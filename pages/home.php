<?php
/**
 * ---------------------------------------------------------
 * TRANG CHỦ PROFILE - PHIÊN BẢN DATABASE (FULL CODE)
 * ---------------------------------------------------------
 */

// 1. GỌI CÁC HÀM LẤY DỮ LIỆU TỪ DB.PHP
// Đảm bảo bạn đã cập nhật db.php như hướng dẫn trước đó
$profile      = get_my_profile($conn);       // Thông tin cá nhân
$projects     = get_projects($conn, 6);      // 6 Dự án tiêu biểu
$skills       = get_skills($conn);           // Kỹ năng/Dịch vụ
$work_history = get_experience($conn);       // Kinh nghiệm làm việc
$certs        = get_certifications($conn);   // Chứng chỉ
$articles     = get_latest_articles($conn);  // Bài viết mới nhất
$faqs         = get_faqs($conn);             // Câu hỏi thường gặp
$reviews      = get_testimonials($conn);     // Đánh giá khách hàng

// Xử lý dữ liệu mặc định để tránh lỗi nếu DB trống
$profile_name  = $profile['name'] ?? 'Đăng Khoa';
$profile_role  = $profile['role'] ?? 'Full Stack Developer';
$profile_img   = $profile['img'] ?? 'https://via.placeholder.com/400';
$profile_about = $profile['about_text'] ?? 'Chào mừng đến với Portfolio của tôi.';
$profile_email = $profile['email'] ?? 'contact@example.com';
?>

<style>
    /* --- CSS RIÊNG CHO HOME PRO --- */
    :root {
        --bg-light: #f9fafb;
        --text-gray: #6b7280;
        --card-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.05);
        --hover-shadow: 0 20px 40px -5px rgba(0, 0, 0, 0.1);
    }

    /* Typography & Sections */
    .section-header { text-align: center; margin-bottom: 60px; max-width: 700px; margin-left: auto; margin-right: auto; }
    .section-tag { display: inline-block; padding: 6px 16px; background: #eef2ff; color: var(--primary); border-radius: 50px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; }
    .section-title { font-size: 36px; font-weight: 800; color: #111; margin: 0; line-height: 1.2; }
    .section-desc { font-size: 16px; color: var(--text-gray); margin-top: 15px; line-height: 1.6; }

    /* Tech Stack Animation */
    .tech-marquee { overflow: hidden; white-space: nowrap; padding: 40px 0; background: var(--bg-light); border-top: 1px solid #eee; border-bottom: 1px solid #eee; }
    .tech-track { display: inline-block; animation: marquee 20s linear infinite; }
    .tech-item { display: inline-flex; align-items: center; gap: 10px; margin: 0 40px; font-size: 24px; color: #ccc; font-weight: bold; }
    .tech-item i { font-size: 32px; color: #999; }
    @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }

    /* Timeline */
    .timeline-item { padding-left: 40px; border-left: 2px solid #e5e7eb; position: relative; padding-bottom: 40px; }
    .timeline-item:last-child { border-left: 2px solid transparent; }
    .timeline-dot { position: absolute; left: -9px; top: 0; width: 16px; height: 16px; background: var(--primary); border-radius: 50%; border: 3px solid white; box-shadow: 0 0 0 3px rgba(var(--primary-rgb), 0.2); }
    
    /* Cards */
    .cert-card { display: flex; align-items: center; gap: 20px; padding: 25px; background: white; border-radius: 12px; border: 1px solid #f3f4f6; transition: 0.3s; }
    .cert-card:hover { border-color: var(--primary); transform: translateY(-3px); box-shadow: var(--card-shadow); }

    .blog-card { background: white; border-radius: 12px; overflow: hidden; box-shadow: var(--card-shadow); transition: 0.3s; height: 100%; display: flex; flex-direction: column; }
    .blog-card:hover { transform: translateY(-5px); box-shadow: var(--hover-shadow); }

    /* FAQ */
    .faq-item { border-bottom: 1px solid #eee; padding: 20px 0; }
    .faq-item summary { font-weight: bold; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center; font-size: 18px; }
    .faq-item summary::-webkit-details-marker { display: none; }
    .faq-item summary::after { content: '+'; font-size: 24px; color: var(--primary); }
    .faq-item[open] summary::after { content: '-'; }
    .faq-content { margin-top: 15px; color: var(--text-gray); line-height: 1.6; }

    /* Button Effect */
    .btn-shine { position: relative; overflow: hidden; }
    .btn-shine::after { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: 0.5s; }
    .btn-shine:hover::after { left: 100%; }

    /* Responsive fix */
    @media (max-width: 768px) {
        .hero-grid { grid-template-columns: 1fr !important; gap: 40px !important; }
        .hero-text { text-align: center; }
        .hero-text h1 { font-size: 40px !important; }
        .hero-stats { justify-content: center; }
        .grid-2-col { grid-template-columns: 1fr !important; }
    }
</style>

<div class="container-fluid" style="overflow-x: hidden;">
    
    <div class="container">
        <section style="padding: 80px 0; min-height: 85vh; display: flex; align-items: center;">
            <div class="hero-grid" style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 60px; align-items: center;">
                <div class="hero-text">
                    <div style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 16px; background: #ecfdf5; color: #059669; border-radius: 30px; font-weight: 600; font-size: 14px; margin-bottom: 25px; border: 1px solid #d1fae5;">
                        <span style="width: 8px; height: 8px; background: #10b981; border-radius: 50%; animation: pulse 2s infinite;"></span>
                        Available for Freelance Projects
                    </div>
                    <h1 style="font-size: 64px; line-height: 1.1; font-weight: 900; color: #111; margin-bottom: 25px;">
                        Helping brands <br>
                        <span style="background: linear-gradient(120deg, var(--primary) 0%, #8b5cf6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Build & Scale</span><br>
                        Digital Products.
                    </h1>
                    <p style="font-size: 18px; color: var(--text-gray); margin-bottom: 40px; max-width: 90%; line-height: 1.7;">
                        Xin chào, tôi là <strong><?php echo $profile_name; ?></strong>. <?php echo $profile_about; ?>
                    </p>
                    <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: inherit;">
                        <a href="#contact" class="btn-shine" style="padding: 16px 40px; background: #111; color: white; border-radius: 8px; font-weight: bold; text-decoration: none;">
                            Bắt đầu dự án <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                        <a href="#" style="padding: 16px 40px; background: white; color: #111; border: 1px solid #e5e7eb; border-radius: 8px; font-weight: bold; text-decoration: none; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-download"></i> Download CV
                        </a>
                    </div>
                    
                    <div class="hero-stats" style="margin-top: 50px; display: flex; gap: 40px;">
                        <div>
                            <div style="font-size: 28px; font-weight: 800; color: #111;">5+</div>
                            <div style="font-size: 13px; color: var(--text-gray);">Years Exp</div>
                        </div>
                        <div>
                            <div style="font-size: 28px; font-weight: 800; color: #111;">50+</div>
                            <div style="font-size: 13px; color: var(--text-gray);">Projects</div>
                        </div>
                        <div>
                            <div style="font-size: 28px; font-weight: 800; color: #111;">100%</div>
                            <div style="font-size: 13px; color: var(--text-gray);">Satisfied</div>
                        </div>
                    </div>
                </div>

                <div class="hero-img" style="position: relative;">
                    <div style="position: absolute; top: 20px; right: -20px; z-index: -1; width: 100%; height: 100%; background: linear-gradient(135deg, #e0e7ff 0%, #fae8ff 100%); border-radius: 24px; transform: rotate(3deg);"></div>
                    <img src="<?php echo $profile_img; ?>" style="width: 100%; border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); object-fit: cover; aspect-ratio: 4/5;">
                    
                    <div style="position: absolute; bottom: 40px; left: -30px; background: white; padding: 15px 25px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); display: flex; align-items: center; gap: 15px; animation: float 3s ease-in-out infinite;">
                        <div style="width: 40px; height: 40px; background: #dcfce7; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #16a34a;"><i class="fas fa-check"></i></div>
                        <div>
                            <div style="font-weight: bold; font-size: 14px;">Senior Dev</div>
                            <div style="font-size: 12px; color: #888;">High Quality Code</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="tech-marquee">
        <div class="tech-track">
            <span class="tech-item"><i class="fab fa-react"></i> ReactJS</span>
            <span class="tech-item"><i class="fab fa-laravel"></i> Laravel</span>
            <span class="tech-item"><i class="fab fa-node-js"></i> Node.js</span>
            <span class="tech-item"><i class="fab fa-docker"></i> Docker</span>
            <span class="tech-item"><i class="fab fa-figma"></i> Figma</span>
            <span class="tech-item"><i class="fab fa-aws"></i> AWS</span>
            <span class="tech-item"><i class="fas fa-database"></i> MySQL</span>
            <span class="tech-item"><i class="fab fa-python"></i> Python</span>
            <span class="tech-item"><i class="fab fa-react"></i> ReactJS</span>
            <span class="tech-item"><i class="fab fa-laravel"></i> Laravel</span>
            <span class="tech-item"><i class="fab fa-node-js"></i> Node.js</span>
            <span class="tech-item"><i class="fab fa-docker"></i> Docker</span>
            <span class="tech-item"><i class="fab fa-figma"></i> Figma</span>
        </div>
    </div>

    <div class="container" style="padding-top: 100px;">

        <section id="services" style="margin-bottom: 120px;">
            <div class="section-header">
                <span class="section-tag">What I Do</span>
                <h2 class="section-title">Giải pháp toàn diện</h2>
                <p class="section-desc">Không chỉ là viết code, tôi mang đến giải pháp giúp tối ưu vận hành.</p>
            </div>
            
            <div class="service-grid">
                <?php if(!empty($skills)): ?>
                    <?php foreach ($skills as $index => $s): ?>
                        <div style="padding: 40px 30px; background: <?php echo $index % 2 == 0 ? '#fff' : '#f8fafc'; ?>; border: 1px solid #f1f5f9; border-radius: 16px; transition: 0.3s; position: relative; overflow: hidden; height: 100%;">
                            <div style="width: 60px; height: 60px; background: white; border: 1px solid #eee; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: var(--primary); margin-bottom: 25px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                                <i class="fas <?php echo $s['icon']; ?>"></i>
                            </div>
                            <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 15px;"><?php echo $s['title']; ?></h3>
                            <p style="color: var(--text-gray); font-size: 15px; margin-bottom: 20px; line-height: 1.6;"><?php echo $s['description']; ?></p>
                            <a href="#" style="color: var(--primary); font-weight: 600; font-size: 14px; text-decoration: none;">Chi tiết &rarr;</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Đang cập nhật dịch vụ...</p>
                <?php endif; ?>
            </div>
        </section>

        <section style="margin-bottom: 120px; display: grid; grid-template-columns: 1fr 1fr; gap: 80px;" class="grid-2-col">
            <div>
                <span class="section-tag">My Journey</span>
                <h2 class="section-title" style="margin-bottom: 30px;">Kinh nghiệm làm việc & <br>Học vấn</h2>
                <p style="color: var(--text-gray); margin-bottom: 40px;">
                    Hành trình phát triển từ những dòng code đầu tiên đến việc xây dựng các hệ thống lớn.
                </p>
                
                <h4 style="margin-bottom: 20px;">Chứng chỉ đạt được:</h4>
                <div style="display: flex; flex-direction: column; gap: 15px;">
                    <?php if(!empty($certs)): ?>
                        <?php foreach($certs as $cert): ?>
                        <div class="cert-card">
                            <div style="font-size: 24px; color: #555;"><i class="fab <?php echo $cert['icon']; ?>"></i></div>
                            <div>
                                <div style="font-weight: bold; font-size: 16px;"><?php echo $cert['name']; ?></div>
                                <div style="font-size: 13px; color: #888;"><?php echo $cert['org']; ?> • <?php echo $cert['year']; ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Chưa có thông tin chứng chỉ.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div style="background: white; padding: 40px; border-radius: 20px; border: 1px solid #eee; box-shadow: var(--card-shadow);">
                <?php if(!empty($work_history)): ?>
                    <?php foreach($work_history as $work): ?>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <span style="font-size: 13px; font-weight: bold; color: var(--primary); background: #eff6ff; padding: 4px 10px; border-radius: 4px;"><?php echo $work['duration']; ?></span>
                        <h4 style="margin: 10px 0 5px; font-size: 18px;"><?php echo $work['role']; ?></h4>
                        <div style="font-size: 14px; font-weight: 600; color: #333; margin-bottom: 8px;"><?php echo $work['company']; ?></div>
                        <p style="font-size: 14px; color: var(--text-gray); margin: 0;"><?php echo $work['description']; ?></p>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Đang cập nhật kinh nghiệm...</p>
                <?php endif; ?>
            </div>
        </section>

        <section id="portfolio" style="margin-bottom: 120px;">
            <div class="section-header">
                <span class="section-tag">Portfolio</span>
                <h2 class="section-title">Dự án tiêu biểu</h2>
            </div>

            <?php if(!empty($projects)): $spotlight = $projects[0]; ?>
            <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; background: #111; border-radius: 24px; overflow: hidden; margin-bottom: 50px; box-shadow: 0 20px 50px rgba(0,0,0,0.3);" class="grid-2-col">
                <div style="padding: 0;">
                    <img src="<?php echo $spotlight['img']; ?>" style="width: 100%; height: 100%; object-fit: cover; min-height: 400px; opacity: 0.9;">
                </div>
                <div style="padding: 60px; color: white; display: flex; flex-direction: column; justify-content: center;">
                    <div style="margin-bottom: 15px; color: var(--accent); font-weight: bold; letter-spacing: 1px;">FEATURED PROJECT</div>
                    <h3 style="font-size: 32px; font-weight: 800; margin-bottom: 15px;"><?php echo $spotlight['name']; ?></h3>
                    <p style="color: #aaa; margin-bottom: 30px; line-height: 1.6;">
                        Vai trò: <?php echo $spotlight['role']; ?>. Dự án thực hiện năm <?php echo $spotlight['year']; ?>.
                    </p>
                    <a href="<?php echo $project_folder; ?>/chi-tiet/<?php echo $spotlight['id']; ?>" style="color: white; font-weight: bold; text-decoration: none; border-bottom: 2px solid var(--accent); width: fit-content; padding-bottom: 5px;">Xem chi tiết &rarr;</a>
                </div>
            </div>
            
            <div class="product-grid">
                <?php foreach (array_slice($projects, 1) as $p): ?>
                    <a href="<?php echo $project_folder; ?>/chi-tiet/<?php echo $p['id']; ?>" style="text-decoration: none; color: inherit;">
                        <div style="border-radius: 16px; overflow: hidden; background: white; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: 0.3s; height: 100%;">
                            <div style="overflow: hidden; height: 220px;">
                                <img src="<?php echo $p['img']; ?>" style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                            </div>
                            <div style="padding: 25px;">
                                <div style="font-size: 12px; color: var(--primary); font-weight: bold; margin-bottom: 5px;"><?php echo $p['type']; ?></div>
                                <h4 style="font-size: 18px; margin-bottom: 10px;"><?php echo $p['name']; ?></h4>
                                <div style="display: flex; justify-content: space-between; font-size: 13px; color: #888;">
                                    <span><?php echo $p['role']; ?></span>
                                    <span><?php echo $p['year']; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <p class="text-center">Chưa có dự án nào.</p>
            <?php endif; ?>
        </section>

        <section style="margin-bottom: 120px;">
            <div class="section-header">
                <span class="section-tag">Blog & News</span>
                <h2 class="section-title">Chia sẻ kiến thức</h2>
            </div>
            <div class="product-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                <?php if(!empty($articles)): ?>
                    <?php foreach($articles as $art): ?>
                    <div class="blog-card">
                        <div style="height: 200px; background: #ddd; position: relative;">
                             <img src="<?php echo $art['image_url']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                             <span style="position: absolute; bottom: 15px; left: 15px; background: white; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: bold;"><?php echo $art['category']; ?></span>
                        </div>
                        <div style="padding: 25px;">
                            <div style="font-size: 13px; color: #888; margin-bottom: 10px;"><i class="far fa-clock"></i> <?php echo date("d/m/Y", strtotime($art['publish_date'])); ?></div>
                            <h4 style="font-size: 18px; margin-bottom: 15px; line-height: 1.4;"><a href="#" style="color: #111; text-decoration: none;"><?php echo $art['title']; ?></a></h4>
                            <a href="#" style="color: var(--primary); font-size: 14px; font-weight: 600;">Đọc tiếp &rarr;</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Chưa có bài viết nào.</p>
                <?php endif; ?>
            </div>
        </section>

        <section style="margin-bottom: 120px; display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start;" class="grid-2-col">
            <div>
                <span class="section-tag">F.A.Q</span>
                <h2 class="section-title" style="margin-bottom: 20px;">Câu hỏi thường gặp</h2>
                <p style="color: var(--text-gray);">
                    Giải đáp những thắc mắc phổ biến trước khi chúng ta bắt đầu làm việc cùng nhau.
                </p>
                <div style="margin-top: 30px; padding: 30px; background: #f9fafb; border-radius: 12px;">
                    <h4 style="margin-bottom: 15px;">Cần tư vấn ngay?</h4>
                    <p style="font-size: 14px; color: #666; margin-bottom: 20px;">Liên hệ qua Zalo hoặc Email để nhận phản hồi nhanh nhất.</p>
                    <a href="mailto:<?php echo $profile_email; ?>" style="color: var(--primary); font-weight: bold;"><?php echo $profile_email; ?></a>
                </div>
            </div>
            <div>
                <?php if(!empty($faqs)): ?>
                    <?php foreach($faqs as $faq): ?>
                    <div class="faq-item">
                        <details>
                            <summary><?php echo $faq['question']; ?></summary>
                            <div class="faq-content"><?php echo $faq['answer']; ?></div>
                        </details>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Chưa có câu hỏi FAQ.</p>
                <?php endif; ?>
            </div>
        </section>

        <section style="margin-bottom: 120px;">
             <div class="section-header">
                <span class="section-tag">Testimonials</span>
                <h2 class="section-title">Khách hàng nói gì?</h2>
            </div>
            <div class="service-grid">
                <?php if(!empty($reviews)): ?>
                    <?php foreach ($reviews as $r): ?>
                        <div style="background: white; padding: 30px; border-radius: 12px; border-bottom: 3px solid var(--accent); box-shadow: var(--card-shadow);">
                            <div style="color: #f59e0b; margin-bottom: 15px; font-size: 14px;">
                                <?php for ($i = 0; $i < $r['star']; $i++) echo '<i class="fas fa-star"></i>'; ?>
                            </div>
                            <p style="font-size: 15px; font-style: italic; color: #555; margin-bottom: 25px; line-height: 1.6; min-height: 60px;">
                                "<?php echo $r['review_text']; ?>"
                            </p>
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="width: 50px; height: 50px; background: #eee; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 20px; color: var(--primary);">
                                    <?php echo substr($r['user_name'], 0, 1); ?>
                                </div>
                                <div>
                                    <div style="font-weight: bold; color: #333; font-size: 16px;"><?php echo $r['user_name']; ?></div>
                                    <div style="font-size: 12px; color: #999;"><?php echo $r['user_role']; ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

    </div> <section id="contact" style="background: #111; padding: 100px 0; text-align: center; color: white;">
        <div class="container">
            <h2 style="font-size: 48px; font-weight: 900; margin-bottom: 20px;">Have an idea?</h2>
            <p style="font-size: 20px; color: #999; margin-bottom: 50px; max-width: 600px; margin-left: auto; margin-right: auto;">
                Hãy để tôi giúp bạn biến ý tưởng thành hiện thực với công nghệ tốt nhất.
            </p>
            <a href="mailto:<?php echo $profile_email; ?>" style="padding: 20px 50px; background: white; color: black; font-size: 18px; font-weight: bold; border-radius: 50px; text-decoration: none; transition: 0.3s; display: inline-block;">
                Let's Discuss <i class="fas fa-comment-dots" style="margin-left: 10px;"></i>
            </a>
            <div style="margin-top: 50px; display: flex; justify-content: center; gap: 30px;">
                <a href="#" style="color: #666; font-size: 24px; transition: 0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#666'"><i class="fab fa-github"></i></a>
                <a href="#" style="color: #666; font-size: 24px; transition: 0.3s;" onmouseover="this.style.color='#0077b5'" onmouseout="this.style.color='#666'"><i class="fab fa-linkedin"></i></a>
                <a href="#" style="color: #666; font-size: 24px; transition: 0.3s;" onmouseover="this.style.color='#1877f2'" onmouseout="this.style.color='#666'"><i class="fab fa-facebook"></i></a>
            </div>
        </div>
    </section>

</div>