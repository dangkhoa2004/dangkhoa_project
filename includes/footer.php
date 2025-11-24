</main>
    
    <footer style="background: #1a1a1a; color: #ccc; padding-top: 60px;">
        <div class="container">
            <div class="footer-grid">
                
                <div>
                    <h4 style="color: white; text-transform: uppercase; margin-bottom: 20px;">Đăng Khoa</h4>
                    <p style="margin-bottom: 15px; line-height: 1.6; font-size: 14px;">
                        Tôi là một Full-stack Developer đam mê tạo ra những sản phẩm kỹ thuật số đẹp mắt, hiệu suất cao và thân thiện với người dùng.
                    </p>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 10px;"><i class="fas fa-map-marker-alt" style="color:var(--primary); width: 20px;"></i> TP. Hồ Chí Minh, Việt Nam</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-phone" style="color:var(--primary); width: 20px;"></i> 0909.xxx.xxx</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-envelope" style="color:var(--primary); width: 20px;"></i> contact@dangkhoa.com</li>
                    </ul>
                </div>
                
                <div>
                    <h4 style="color: white; text-transform: uppercase; margin-bottom: 20px;">Liên kết nhanh</h4>
                    <ul style="list-style: none; padding: 0; line-height: 2;">
                        <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu" style="color: #999; text-decoration: none;">Trang chủ</a></li>
                        <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#about" style="color: #999; text-decoration: none;">Về tôi</a></li>
                        <li><a href="<?php echo $project_folder ?? ''; ?>/trang-chu#portfolio" style="color: #999; text-decoration: none;">Dự án tiêu biểu</a></li>
                        <li><a href="<?php echo $project_folder ?? ''; ?>/lien-he" style="color: #999; text-decoration: none;">Liên hệ hợp tác</a></li>
                    </ul>
                </div>

                <div>
                    <h4 style="color: white; text-transform: uppercase; margin-bottom: 20px;">Lĩnh vực chuyên môn</h4>
                    <ul style="list-style: none; padding: 0; line-height: 2;">
                        <li><i class="fas fa-code" style="color: #666; margin-right: 5px;"></i> Web Development</li>
                        <li><i class="fas fa-mobile-alt" style="color: #666; margin-right: 5px;"></i> Mobile App Design</li>
                        <li><i class="fas fa-paint-brush" style="color: #666; margin-right: 5px;"></i> UI/UX Design</li>
                        <li><i class="fas fa-server" style="color: #666; margin-right: 5px;"></i> System Optimization</li>
                    </ul>
                </div>

                <div>
                    <h4 style="color: white; text-transform: uppercase; margin-bottom: 20px;">Kết nối với tôi</h4>
                    <p style="margin-bottom: 15px; font-size: 14px;">Theo dõi hành trình của tôi trên mạng xã hội.</p>
                    <div class="social-icons" style="font-size: 20px; display:flex; gap: 15px;">
                        <a href="#" style="width: 40px; height: 40px; background: #333; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: white; transition: 0.3s;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" style="width: 40px; height: 40px; background: #333; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: white; transition: 0.3s;"><i class="fab fa-github"></i></a>
                        <a href="#" style="width: 40px; height: 40px; background: #333; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: white; transition: 0.3s;"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

            </div>
            
            <hr style="border-color: #333; margin: 40px 0 20px; opacity: 0.3;">
            
            <div style="text-align: center; font-size: 13px; color: #777; padding-bottom: 20px;">
                &copy; 2025 <strong>Dang Khoa</strong>. All Rights Reserved. <br>
                <span style="font-size: 11px; opacity: 0.7;">Designed with <i class="fas fa-heart" style="color: red;"></i> by Me.</span>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('mobile-menu-btn');
            const navMenu = document.getElementById('nav-menu');

            if(menuBtn) {
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