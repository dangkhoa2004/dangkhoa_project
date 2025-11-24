document.addEventListener('DOMContentLoaded', () => {
        
    // 1. Scroll Animation (Fade Up)
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // Chỉ chạy 1 lần
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-up').forEach(el => {
        observer.observe(el);
    });

    // 2. Stats Counter Animation
    const statsSection = document.querySelector('.stats-section');
    let statsAnimated = false;

    const statsObserver = new IntersectionObserver((entries) => {
        if(entries[0].isIntersecting && !statsAnimated) {
            const counters = document.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const increment = target / 50; // Tốc độ
                
                const updateCount = () => {
                    const count = +counter.innerText;
                    if(count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 40);
                    } else {
                        counter.innerText = target + "+";
                    }
                };
                updateCount();
            });
            statsAnimated = true;
        }
    });
    
    if(statsSection) {
        statsObserver.observe(statsSection);
    }

    // 3. Portfolio Filtering
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectItems = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filterValue = btn.getAttribute('data-filter');

            projectItems.forEach(item => {
                const category = item.getAttribute('data-cat');
                if(filterValue === 'all' || category === filterValue) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // 4. FAQ Toggle Icon Logic
    const details = document.querySelectorAll("details");
    details.forEach((detail) => {
        detail.addEventListener("toggle", () => {
            const summary = detail.querySelector("summary span");
            if (detail.open) {
                summary.innerText = "-";
            } else {
                summary.innerText = "+";
            }
        });
    });

    // 5. Form Submit Mock
    const contactForm = document.getElementById('contactForm');
    if(contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = contactForm.querySelector('button');
            const originalText = btn.innerText;
            
            btn.innerText = 'Đang gửi...';
            btn.disabled = true;
            
            setTimeout(() => {
                alert('Cảm ơn bạn! Tin nhắn đã được gửi.');
                btn.innerText = 'Đã gửi thành công';
                contactForm.reset();
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.disabled = false;
                }, 3000);
            }, 1500);
        });
    }
    
});