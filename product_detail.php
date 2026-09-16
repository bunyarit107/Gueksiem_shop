<?php
session_start();
// สมมติว่ารับค่า id สินค้ามาจาก URL เช่น product_detail.php?id=1
$product_id = $_GET['id'] ?? 1; 

// ข้อมูลจำลอง (ของจริงดึงจาก Database ตาราง product)
$product_name = "Nike Air Force 1 '07";
$product_desc = "รองเท้าผ้าใบระดับตำนานที่ผสานลุคคลาสสิกเข้ากับความสบายระดับนวัตกรรม โดดเด่นด้วยหนังเย็บหุ้มชั้นนอกที่ทนทานและส่วนรองรับแรงกระแทก Nike Air ที่เบาสบาย";
$product_price = 3700;
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product_name; ?> - เกือกสยาม</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- ดึงไฟล์ CSS พื้นฐาน และ CSS เฉพาะหน้ารายละเอียดสินค้า -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product_detail.css?v=1">
</head>
<body class="bg-gray-layout">

    <!-- ================= แถบนำทาง (Navbar) ================= -->
    <header class="navbar"> 
        <div class="logo">เกือกสยาม</div>
        <nav class="nav-menu">
            <a href="index.php">New Arrivals</a>
            <a href="#">Men</a>
            <a href="#">Women</a>
            <a href="products.php">Category ▽</a>
        </nav>
        <div class="nav-icons">
            <a href="login.php" class="icon-btn"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
            <a href="cart.php" class="icon-btn"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></a>
        </div>
    </header>

    <!-- ================= เนื้อหาหลัก (Product Detail) ================= -->
    <main class="product-detail-container">
        <div class="product-layout">
            
            <!-- ฝั่งซ้าย: แกลเลอรีรูปภาพ -->
            <div class="product-gallery">
                <!-- รูปใหญ่ -->
                <div class="main-image-box">
                    <!-- ใส่ id เพื่อให้ JS อ้างอิงเปลี่ยนรูปได้ -->
                    <img id="mainProductImage" src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=800&q=80" alt="รูปสินค้าหลัก">
                </div>
                
                <!-- รูปเล็ก 5 รูป (Thumbnails) -->
                <div class="thumbnail-list">
                    <!-- เมื่อคลิก จะเรียกใช้ฟังก์ชัน JS เพื่อสลับรูปใหญ่ -->
                    <div class="thumbnail-box active" onclick="changeMainImage(this, 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=800&q=80')">
                        <img src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=200&q=80" alt="รูป 1">
                    </div>
                    <div class="thumbnail-box" onclick="changeMainImage(this, 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&w=800&q=80')">
                        <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&w=200&q=80" alt="รูป 2">
                    </div>
                    <div class="thumbnail-box" onclick="changeMainImage(this, 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?auto=format&fit=crop&w=800&q=80')">
                        <img src="https://images.unsplash.com/photo-1608231387042-66d1773070a5?auto=format&fit=crop&w=200&q=80" alt="รูป 3">
                    </div>
                    <!-- กล่องที่เหลือทำเป็นสีเทาจำลองไว้ตามรูป -->
                    <div class="thumbnail-box empty-thumb">รูปภาพ</div>
                    <div class="thumbnail-box empty-thumb">รูปภาพ</div>
                </div>
            </div>

            <!-- ฝั่งขวา: ข้อมูลสินค้าและแบบฟอร์มสั่งซื้อ -->
            <div class="product-info-section">
                
                <h1 class="pd-title"><?php echo $product_name; ?></h1>
                
                <!-- ผมเพิ่มราคาเข้าไปให้ดูสมจริงขึ้นสำหรับการขาย -->
                <p class="pd-price">฿ <?php echo number_format($product_price); ?></p>
                
                <div class="pd-description">
                    <p>รายละเอียดสินค้า</p>
                    <span class="desc-text"><?php echo $product_desc; ?></span>
                </div>

                <!-- ฟอร์มเตรียมส่งข้อมูลเข้าตะกร้า (ตาราง cart) -->
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    
                    <div class="pd-size-selector">
                        <p class="size-label">ขนาดไซส์</p>
                        <div class="size-options">
                            <!-- ใช้ Radio Button ซ่อนไว้ เพื่อส่งค่าไซส์ไปกับฟอร์ม -->
                            <label class="size-box">
                                <input type="radio" name="size" value="41" required>
                                <span>41</span>
                            </label>
                            <label class="size-box">
                                <input type="radio" name="size" value="42">
                                <span>42</span>
                            </label>
                            <label class="size-box">
                                <input type="radio" name="size" value="43">
                                <span>43</span>
                            </label>
                            <label class="size-box">
                                <input type="radio" name="size" value="44">
                                <span>44</span>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-order">สั่งซื้อ</button>
                </form>

            </div>

        </div>
    </main>

    <!-- Script สำหรับสลับรูปภาพหลัก -->
    <script>
        function changeMainImage(element, imageUrl) {
            // 1. เปลี่ยน URL รูปใหญ่
            document.getElementById('mainProductImage').src = imageUrl;
            
            // 2. ลบคลาส active จากรูปเล็กทั้งหมด
            let thumbnails = document.querySelectorAll('.thumbnail-box');
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            
            // 3. เพิ่มคลาส active ให้รูปที่ถูกคลิก (เพื่อใส่ขอบดำให้รู้ว่าเลือกรูปนี้อยู่)
            element.classList.add('active');
        }
    </script>
</body>
</html>
