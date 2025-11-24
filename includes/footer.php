</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">

            <div>
                <h4 class="footer-heading">Đăng Khoa</h4>
                <p>
                    Tôi là một Full-stack Developer đam mê tạo ra những sản phẩm kỹ thuật số đẹp mắt, hiệu suất cao và thân thiện với người dùng.
                </p>
                <ul class="footer-links">
                    <li><i class="fas fa-map-marker-alt"></i> TP. Hồ Chí Minh, Việt Nam</li>
                    <li><i class="fas fa-phone"></i> 0909.xxx.xxx</li>
                    <li><i class="fas fa-envelope"></i> contact@dangkhoa.com</li>
                </ul>
            </div>

            <div>
                <h4 class="footer-heading">Liên kết nhanh</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu">Trang chủ</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#about">Giới thiệu</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#experience">Kinh nghiệm</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#projects">Dự án</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#skills">Kỹ năng</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#pricing">Ngân sách</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#reviews">Đánh giá</a></li>
                    <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#contact">Liên hệ hợp tác</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-heading">Chuyên môn</h4>
                <ul class="footer-links">
                    <li><i class="fas fa-code"></i> Web Development</li>
                    <li><i class="fas fa-mobile-alt"></i> Mobile App Design</li>
                    <li><i class="fas fa-paint-brush"></i> UI/UX Design</li>
                    <li><i class="fas fa-server"></i> System Optimization</li>
                </ul>
            </div>

            <div>
                <h4 class="footer-heading">Kết nối</h4>
                <p>Theo dõi hành trình và cập nhật mới nhất của tôi.</p>
                <div class="social-group">
                    <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-github"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            &copy; <?php echo date('Y'); ?> <strong>Dang Khoa</strong>. All Rights Reserved. <br>
            <span>
                Designed with <i class="fas fa-heart heart-anim"></i> by Me.
            </span>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const navMenu = document.getElementById('nav-menu');

        if (menuBtn) {
            menuBtn.addEventListener('click', function() {
                navMenu.classList.toggle('active');
                const icon = menuBtn.querySelector('i');
                if (navMenu.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        }
    });
</script>
</body>

</html>