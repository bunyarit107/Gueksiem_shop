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
</head>
<body>

    <!-- แถบนำทาง -->
    <header class="navbar"> 
        <div class="logo">เกือกสยาม</div>
        <nav class="nav-menu">
            <a href="index.php">New Arrivals</a>
            <a href="#">Men</a>
            <a href="#">Women</a>
            <a href="products.php" style="font-weight: 700;">Category ▽</a>
        </nav>
        <div class="nav-icons">
            <a href="login.php" class="icon-btn" aria-label="User Profile">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>
            <a href="cart.php" class="icon-btn" aria-label="Shopping Cart">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
            </a>
        </div>
    </header>

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