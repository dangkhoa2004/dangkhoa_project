<?php
// detail.php - PROJECT CASE STUDY
$project = get_project_details($conn, $product_id); // Dùng $product_id từ router

if (!$project) {
    echo "<div class='container' style='padding:100px 0; text-align:center'><h1>404 Not Found</h1></div>";
    return;
}
?>

<div class="container">
    <div style="margin: 20px 0;">
        <a href="<?php echo $project_folder; ?>/trang-chu">Trang chủ</a> / <span><?php echo $project['name']; ?></span>
    </div>

    <div class="prop-header" style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-size: 36px; margin-bottom: 10px;"><?php echo $project['name']; ?></h1>
        <p style="font-size: 18px; color: #666;"><?php echo $project['role']; ?> | <?php echo $project['year']; ?></p>
    </div>

    <div style="margin-bottom: 40px; border-radius: 12px; overflow: hidden;">
        <img src="<?php echo $project['img']; ?>" style="width: 100%; height: auto; display: block;">
    </div>

    <div class="detail-container">
        <div class="left-content">
            <div class="content-block">
                <h3 class="block-title">Mô tả dự án</h3>
                <div style="line-height: 1.8; color: #444; font-size: 16px; text-align: justify;">
                    <?php echo $project['description']; ?>
                </div>
            </div>

            <div class="content-block">
                <h3 class="block-title">Công nghệ sử dụng (Tech Stack)</h3>
                <div class="amenity-list">
                    <?php if(!empty($project['tech_stack'])): ?>
                        <?php foreach($project['tech_stack'] as $tech): ?>
                            <div class="amenity-tag" style="background: #eef2ff; border-color: #c7d2fe; color: #4f46e5;">
                                <i class="fas fa-code"></i> <?php echo $tech; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php if(!empty($project['link_demo'])): ?>
            <div style="margin-top: 30px;">
                <a href="<?php echo $project['link_demo']; ?>" target="_blank" style="display: inline-block; padding: 15px 30px; background: var(--primary); color: white; font-weight: bold; text-decoration: none; border-radius: 6px;">
                    <i class="fas fa-external-link-alt"></i> Xem Website Trực Tiếp
                </a>
            </div>
            <?php endif; ?>
        </div>

        <div class="sidebar-sticky">
            <div class="agent-box" style="text-align: left;">
                <h4 style="margin-bottom: 20px;">Thư viện ảnh</h4>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <?php if(!empty($project['gallery'])): ?>
                        <?php foreach($project['gallery'] as $img): ?>
                            <img src="<?php echo $img; ?>" style="width: 100%; height: 100px; object-fit: cover; border-radius: 4px; cursor: pointer;">
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Chưa có ảnh thêm.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>