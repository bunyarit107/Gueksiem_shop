<?php
session_start();
$receipt_no = "PP" . date("Ymd") . rand(1000, 9999);
$order_date = date("d/m/Y");
$total_price = 7400; 
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน - เกือกสยาม</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- ดึงไฟล์ global และ checkout มาใช้ -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="checkout.css?v=1">
</head>
<body>

    <!-- ================= แถบนำทาง (Navbar มาตรฐาน) ================= -->
    <header class="navbar hide-on-print"> 
        <div class="logo">เกือกสยาม</div>
        <nav class="nav-menu">
            <a href="index.php">New Arrivals</a>
            <a href="#">Men</a>
            <a href="#">Women</a>
            <a href="products.php">Category ▽</a>
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

    <!-- ================= ส่วนตะกร้าสินค้าและการชำระเงิน ================= -->
    <main class="checkout-container hide-on-print">
        <h1 class="cart-title">Cart</h1>
        
        <div class="cart-layout">
            <!-- รายการสินค้า (ฝั่งซ้าย) -->
            <div class="cart-items-list">
                <div class="cart-item">
                    <div class="cart-img">รูปสินค้า</div>
                    <div class="cart-details">
                        <h4>ชื่อสินค้า</h4>
                        <p>รายละเอียดสินค้า</p>
                    </div>
                    <div class="cart-price">ราคา 3,700</div>
                </div>
                <div class="cart-item">
                    <div class="cart-img">รูปสินค้า</div>
                    <div class="cart-details">
                        <h4>ชื่อสินค้า</h4>
                        <p>รายละเอียดสินค้า</p>
                    </div>
                    <div class="cart-price">ราคา 3,700</div>
                </div>
            </div>
            
            <!-- กล่องชำระเงิน (ฝั่งขวา) -->
            <div class="cart-payment-box">
                <div class="payment-summary">
                    <span>ยอดรวมราคา</span>
                    <span>฿ <?php echo number_format($total_price, 2); ?></span>
                </div>
                <!-- เมื่อกดปุ่ม จะเรียกฟังก์ชันโชว์ใบเสร็จแบบ Pop-up -->
                <button class="btn-prompay" onclick="showReceipt()">prompay</button>
            </div>
        </div>
    </main>

    <!-- ================= Pop-up ใบเสร็จรับเงิน (ถูกซ่อนไว้ตอนแรก) ================= -->
    <div id="receiptModal" class="modal-overlay">
        <div class="modal-content" id="receiptArea">
            
            <div class="receipt-header">
                <div>วันที่ซื้อ <?php echo $order_date; ?></div>
                <div>เลขที่ใบเสร็จ <?php echo $receipt_no; ?></div>
            </div>

            <div class="receipt-body">
                <div class="receipt-row">
                    <span style="flex: 1;">ชื่อสินค้า</span>
                    <span style="flex: 1; text-align: center;">ราคา 3,700</span>
                    <span style="flex: 1; text-align: right;">จำนวน 2</span>
                </div>
            </div>

            <div class="receipt-footer">
                <span>ยอดรวมทั้งสิ้น</span>
                <span>฿ <?php echo number_format($total_price, 2); ?></span>
            </div>
            
            <!-- ปุ่มกดใน Pop-up (จะถูกซ่อนตอนสั่งพิมพ์เป็น PDF) -->
            <div class="modal-actions hide-on-print">
                <button class="btn btn-dark w-100" onclick="downloadReceipt()">ดาวน์โหลดใบเสร็จ</button>
                <button class="btn btn-light w-100" onclick="closeReceipt()" style="margin-top: 10px;">ปิด</button>
            </div>
            
        </div>
    </div>

    <!-- ================= JavaScript สำหรับควบคุม Pop-up และ Print ================= -->
    <script>
        // ฟังก์ชันเปิด Pop-up ใบเสร็จ
        function showReceipt() {
            // ในการใช้งานจริง: ตรงนี้อาจจะต้องมีการใช้ AJAX ส่งข้อมูลไปบันทึกลง Database ก่อน
            // พอบันทึกสำเร็จ ค่อยให้ Pop-up เด้งขึ้นมา
            document.getElementById('receiptModal').classList.add('active');
            document.body.style.overflow = 'hidden'; // ล็อกไม่ให้หน้าจอข้างหลังเลื่อนได้
        }

        // ฟังก์ชันปิด Pop-up
        function closeReceipt() {
            document.getElementById('receiptModal').classList.remove('active');
            document.body.style.overflow = 'auto'; // ปลดล็อกหน้าจอ
        }

        // ฟังก์ชันเปิดคำสั่งพิมพ์เบราว์เซอร์ (เพื่อ Save as PDF)
        function downloadReceipt() {
            window.print();
        }
    </script>
</body>
</html>