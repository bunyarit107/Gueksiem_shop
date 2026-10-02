<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้าทั้งหมด - เกือกสยาม</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- ใส่ ?v=3 เพื่อบังคับให้เบราว์เซอร์โหลด CSS ใหม่ทันที -->
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="products.css"> <!-- โหลดดีไซน์ตารางสินค้า 4 คอลัมน์ -->
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>

    <!-- แถบนำทาง -->
   <?php include __DIR__ . '/includes/navbar.php'; ?>

    <!-- ส่วนเนื้อหาหลัก: กริดสินค้า -->
    <main class="products-container">
        <div class="product-grid">
            <!-- วนลูป 8 กล่องให้เหมือนภาพ Mockup -->
            <?php for($i = 1; $i <= 8; $i++): ?>
                <a href="product_detail.php?id=<?php echo $i; ?>" class="product-card">
                    <div class="product-image-box"></div>
                    <div class="product-info">
                        รายละเอียดสินค้า
                    </div>
                </a>
            <?php endfor; ?>
        </div>
    </main>

</body>
</html>