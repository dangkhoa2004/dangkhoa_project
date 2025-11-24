<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $page_title ?? 'Đăng Khoa - Full Stack Developer'; ?></title>
    <meta name="description" content="<?php echo $meta_desc ?? 'Portfolio và CV Online của Đăng Khoa - Chuyên gia lập trình Web & Mobile'; ?>">
    <meta property="og:title" content="<?php echo $page_title ?? 'Đăng Khoa Portfolio'; ?>">
    <meta property="og:description" content="<?php echo $meta_desc ?? 'Khám phá các dự án và kỹ năng của tôi.'; ?>">
    <meta property="og:image" content="<?php echo $meta_image ?? ''; ?>">

    <link rel="stylesheet" href="<?php echo $project_folder ?? ''; ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-main" style="padding: 15px 0;">
                <div class="menu-toggle" id="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </div>

                <a href="<?php echo $project_folder ?? ''; ?>/trang-chu" class="logo" style="font-family: 'Arial', sans-serif; letter-spacing: 1px;">
                    <i class="fas fa-laptop-code" style="color: var(--primary);"></i> KHOA<span>DEV</span>
                </a>

                <div class="header-right" style="display: flex; align-items: center; gap: 20px;">
                    <div class="header-socials show-on-desktop" style="display: flex; gap: 15px; font-size: 18px;">
                        <a href="https://github.com" target="_blank" style="color: #333;"><i class="fab fa-github"></i></a>
                        <a href="https://linkedin.com" target="_blank" style="color: #0077b5;"><i class="fab fa-linkedin"></i></a>
                    </div>

                    <div class="cta-header">
                        <a href="<?php echo $project_folder ?? ''; ?>/lien-he" style="background: var(--primary); color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; font-size: 14px;">
                            <i class="fas fa-paper-plane"></i> Thuê tôi ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <nav class="nav-bar" id="nav-menu">
            <div class="container">
                <ul class="nav-list" style="justify-content: center;">
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu"><i class="fas fa-home"></i> Trang chủ</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#about"><i class="fas fa-user"></i> Giới thiệu</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#portfolio"><i class="fas fa-layer-group"></i> Dự án</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#skills"><i class="fas fa-tools"></i> Kỹ năng</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/lien-he"><i class="fas fa-envelope"></i> Liên hệ</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <style>
        /* CSS Inline nhỏ để fix giao diện Portfolio */
        .show-on-desktop {
            display: flex;
        }

        .logo span {
            color: var(--primary);
            font-weight: 800;
        }

        @media (max-width: 768px) {
            .show-on-desktop {
                display: none !important;
            }

            .header-main {
                justify-content: space-between;
            }

            .cta-header {
                display: none;
            }

            /* Ẩn nút CTA trên mobile cho gọn */
        }
    </style>

    <main>