<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $page_title ?? 'Đăng Khoa - Full Stack Developer'; ?></title>
    <meta name="description" content="<?php echo $meta_desc ?? 'Portfolio và CV Online của Đăng Khoa'; ?>">
    <meta property="og:title" content="<?php echo $page_title ?? 'Đăng Khoa Portfolio'; ?>">
    <meta property="og:image" content="<?php echo $meta_image ?? ''; ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="<?php echo $project_folder ?? ''; ?>/assets/css/home.css">
</head>

<body>
    <header class="site-header">
        <div class="container">
            <div class="header-inner">
                <a href="<?php echo $project_folder ?? ''; ?>/trang-chu" class="logo">
                    <i class="fas fa-code"></i> KHOA<span>DEV</span>
                </a>

                <div class="menu-toggle" id="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </div>

                <div class="header-actions show-on-desktop">
                    <a href="https://github.com" target="_blank" class="social-link"><i class="fab fa-github"></i></a>
                    <a href="https://linkedin.com" target="_blank" class="social-link"><i class="fab fa-linkedin"></i></a>
                    <a href="<?php echo $project_folder ?? ''; ?>/lien-he" class="btn-cta-header">
                        <i class="fas fa-paper-plane"></i> Thuê tôi ngay
                    </a>
                </div>
            </div>
        </div>

        <nav class="nav-wrapper" id="nav-menu">
            <div class="container">
                <ul class="nav-list">
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu" class="nav-link"><i class="fas fa-home"></i> Trang chủ</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#about" class="nav-link"><i class="fas fa-user"></i> Giới thiệu</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#experience" class="nav-link"><i class="fas fa-briefcase"></i> Kinh nghiệm</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#skills" class="nav-link"><i class="fas fa-cogs"></i> Kỹ năng</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#projects" class="nav-link"><i class="fas fa-folder-open"></i> Dự án</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#reviews" class="nav-link"><i class="fas fa-star-half-alt"></i> Đánh giá</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#pricing" class="nav-link"><i class="fas fa-tags"></i> Ngân sách</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#contact" class="nav-link"><i class="fas fa-paper-plane"></i> Liên hệ</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>