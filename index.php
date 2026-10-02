<!DOCTYPE html> <!-- ประกาศว่าเอกสารนี้เป็น HTML5 -->
<html lang="th"> <!-- เปิดแท็กหลักของเว็บ และกำหนดภาษาเป็นไทย (th) -->
<head> <!-- ส่วนตั้งค่าข้อมูลพื้นฐานของหน้าเว็บ (จะไม่แสดงผลบนหน้าจอตรงๆ) -->
    <meta charset="UTF-8"> <!-- กำหนดการเข้ารหัสภาษาให้รองรับภาษาไทย (UTF-8) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- ตั้งค่าให้แสดงผลพอดีกับหน้าจอมือถือ (Responsive) -->
    <title>Storefront UI - Minimal Style</title> <!-- ข้อความที่จะแสดงบนแท็บของเบราว์เซอร์ -->
    
    <!-- ดึงฟอนต์ Inter และ Noto Sans Thai จาก Google Fonts มาใช้ในเว็บ -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- เชื่อมต่อไฟล์ตกแต่ง style.css เข้ามาใช้งาน -->
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="home.css"> <!-- โหลดดีไซน์ป้ายแบนเนอร์รูปภาพ -->
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body> <!-- ส่วนที่ใช้แสดงผลเนื้อหาทั้งหมดบนหน้าจอเว็บ -->

    <!-- ส่วนแถบนำทางด้านบน (Navbar) -->
    <?php include __DIR__ . '/includes/navbar.php'; ?>

    <!-- ส่วนเนื้อหาหลักของหน้าเว็บ -->
    <main> <!-- ใช้แท็ก main เพื่อบอกว่าเป็นคอนเทนต์หลัก -->
        
        <!-- ส่วน Hero Banner (ป้ายโฆษณาขนาดใหญ่ด้านบนสุด) -->
        <section class="hero-section"> 
            
            <div class="hero-content"> <!-- กล่องฝั่งซ้าย ใส่ข้อความและปุ่ม -->
                <h1>รายละเอียดสินค้า</h1> <!-- หัวข้อขนาดใหญ่สุด -->
                <p>รายละเอียดสินค้าที่เน้นความเรียบง่าย สวมใส่สบาย และตอบโจทย์ทุกไลฟ์สไตล์ของคุณ</p> <!-- ข้อความอธิบาย -->
                
                <div class="btn-group"> <!-- กล่องจัดกลุ่มปุ่มกด -->
                    <a href="#" class="btn btn-dark">Shop Now</a> <!-- ปุ่มสีดำ -->
                    <a href="#" class="btn btn-light">View Collection</a> <!-- ปุ่มสีขาว -->
                </div>
            </div>
            
            <div class="hero-image-placeholder"> <!-- กล่องฝั่งขวา สำหรับใส่รูปภาพใหญ่ -->
                <span>รูปภาพ</span> <!-- ข้อความชั่วคราวแทนรูปภาพ -->
            </div>
            
        </section>

        <!-- ส่วนแสดงสินค้ามาใหม่ (New Arrivals) -->
        <section class="new-arrivals-section">
            <h2>New Arrivals</h2>

            <div class="product-grid">

                <!-- แถวที่ 1 -->
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>

                <!-- แถวที่ 2 -->
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>

            </div>
        </section>
        
    </main>

</body>
</html> <!-- ปิดแท็ก HTML สิ้นสุดหน้าเว็บ -->