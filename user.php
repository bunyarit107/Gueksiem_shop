<?php
session_start();

$user_fullname = "Bunyarit Leesirisukkasem";
$user_username = "bunyarit_dev";
$user_phone = "081-234-5678";
$user_address = "123 ม.4 ต.พระบรมมหาราชวัง อ.เขตพระนคร จ.กรุงเทพมหานคร 10200";

// จำลองข้อมูลประวัติการสั่งซื้อ 12 รายการ (สุ่มชื่อสินค้าและสถานะ)
$order_history = [];
$product_names = ["Nike Air Force 1 '07", "Air Jordan 1 Retro High", "Nike Dunk Low Panda", "Adidas Yeezy Boost 350"];
$statuses = ['จัดส่งแล้ว', 'กำลังจัดส่ง', 'รอชำระเงิน', 'ยกเลิก'];

for ($i = 1; $i <= 12; $i++) {
    $price = rand(35, 89) * 100;
    $qty = rand(1, 2);
    $order_history[] = [
        'order_no' => 'PP2609' . str_pad($i, 4, '0', STR_PAD_LEFT),
        'date' => date('d/m/Y', strtotime("-$i days")), // วันที่ย้อนหลังไปเรื่อยๆ
        'product_name' => $product_names[array_rand($product_names)],
        'price' => $price,
        'qty' => $qty,
        'total' => $price * $qty,
        'status' => $statuses[array_rand($statuses)]
    ];
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์ของฉัน - เกือกสยาม</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="user.css?v=2">
</head>
<body class="bg-gray-theme">

    <!-- แถบนำทาง -->
    <header class="navbar hide-on-print"> 
        <div class="logo">เกือกสยาม</div>
        <nav class="nav-menu">
            <a href="index.php">New Arrivals</a>
            <a href="#">Men</a>
            <a href="#">Women</a>
            <a href="products.php">Category ▽</a>
        </nav>
        <div class="nav-icons">
            <a href="user.php" class="icon-btn" style="color: #707070;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
            <a href="cart.php" class="icon-btn"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></a>
        </div>
    </header>

    <main class="user-container hide-on-print">
        <h1 class="page-title">บัญชีของฉัน</h1>
        
        <div class="user-layout">
            
            <!-- ฝั่งซ้าย: Profile Card (จะถูกตั้งค่าให้ลอยค้างเวลาเลื่อนจอ) -->
            <div class="user-sidebar">
                <div class="profile-card sticky-card">
                    <div class="profile-avatar">
                        <?php echo mb_substr($user_fullname, 0, 1, "UTF-8"); ?>
                    </div>
                    <h3 class="profile-name"><?php echo $user_fullname; ?></h3>
                    <p class="profile-username">@<?php echo $user_username; ?></p>
                    
                    <div class="profile-info">
                        <div class="info-group">
                            <span class="info-label">เบอร์โทรศัพท์</span>
                            <span class="info-value"><?php echo $user_phone; ?></span>
                        </div>
                        <div class="info-group">
                            <span class="info-label">ที่อยู่จัดส่งเริ่มต้น</span>
                            <span class="info-value"><?php echo $user_address; ?></span>
                        </div>
                    </div>

                    <button class="btn-edit-profile">แก้ไขข้อมูล</button>
                    <a href="logout.php" class="btn-logout">ออกจากระบบ</a>
                </div>
            </div>

            <!-- ฝั่งขวา: ประวัติการสั่งซื้อ (12 รายการ) -->
            <div class="order-history-content">
                <h2 class="section-title">ประวัติการสั่งซื้อ</h2>
                
                <?php foreach($order_history as $order): 
                    // กำหนดสีของสถานะ
                    $status_class = '';
                    if($order['status'] == 'จัดส่งแล้ว') $status_class = 'status-success';
                    else if($order['status'] == 'ยกเลิก') $status_class = 'status-danger';
                    else $status_class = 'status-warning';
                ?>
                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <span class="order-date">วันที่สั่งซื้อ: <?php echo $order['date']; ?></span>
                            <span class="order-no">เลขที่ออเดอร์: <?php echo $order['order_no']; ?></span>
                        </div>
                        <div class="order-status <?php echo $status_class; ?>"><?php echo $order['status']; ?></div>
                    </div>
                    
                    <div class="order-body">
                        <div class="order-item-details">
                            <h4><?php echo $order['product_name']; ?></h4>
                            <p>จำนวน: <?php echo $order['qty']; ?> คู่</p>
                        </div>
                        <div class="order-price">
                            ยอดรวม: ฿ <?php echo number_format($order['total'], 2); ?>
                        </div>
                    </div>

                    <div class="order-footer">
                        <button class="btn-view-receipt" onclick="openReceipt(
                            '<?php echo $order['order_no']; ?>', 
                            '<?php echo $order['date']; ?>', 
                            '<?php echo $order['product_name']; ?>', 
                            '<?php echo $order['price']; ?>', 
                            '<?php echo $order['qty']; ?>', 
                            '<?php echo $order['total']; ?>'
                        )">ดูใบเสร็จ / ดาวน์โหลด</button>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- แถบเปลี่ยนหน้า (Pagination) -->
                <div class="pagination">
                    <a href="#" class="page-link active">1</a>
                    <a href="#" class="page-link">2</a>
                    <a href="#" class="page-link">3</a>
                    <span class="page-dots">...</span>
                    <a href="#" class="page-link">หน้าถัดไป →</a>
                </div>

            </div>
        </div>
    </main>

    <!-- Pop-up ใบเสร็จเหมือนเดิม (ละไว้เพื่อไม่ให้ยาวเกินไป คุณสามารถใช้ของเดิมได้เลย) -->
    <div id="receiptModal" class="modal-overlay">
        <!-- ... (ใช้โค้ด Pop-up ใบเสร็จตัวเดิมได้เลยครับ) ... -->
        <div class="modal-content" id="receiptArea">
            <div class="receipt-header">
                <div>วันที่ซื้อ <span id="r_date"></span></div>
                <div>เลขที่ใบเสร็จ <span id="r_no"></span></div>
            </div>
            <div class="receipt-body">
                <div class="receipt-row">
                    <span style="flex: 2;" id="r_item_name">ชื่อสินค้า</span>
                    <span style="flex: 1; text-align: center;">ราคา <span id="r_price"></span></span>
                    <span style="flex: 1; text-align: right;">จำนวน <span id="r_qty"></span></span>
                </div>
            </div>
            <div class="receipt-footer">
                <span>ยอดรวมทั้งสิ้น</span>
                <span>฿ <span id="r_total"></span></span>
            </div>
            <div class="modal-actions hide-on-print">
                <button class="btn btn-dark w-100" onclick="downloadReceipt()">ดาวน์โหลดใบเสร็จ (PDF)</button>
                <button class="btn btn-light w-100" onclick="closeReceipt()" style="margin-top: 10px;">ปิด</button>
            </div>
        </div>
    </div>

    <!-- JavaScript เหมือนเดิม -->
    <script>
        function openReceipt(no, date, name, price, qty, total) {
            document.getElementById('r_no').innerText = no;
            document.getElementById('r_date').innerText = date;
            document.getElementById('r_item_name').innerText = name;
            document.getElementById('r_price').innerText = Number(price).toLocaleString('th-TH');
            document.getElementById('r_qty').innerText = qty;
            document.getElementById('r_total').innerText = Number(total).toLocaleString('th-TH', {minimumFractionDigits: 2});
            document.getElementById('receiptModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeReceipt() {
            document.getElementById('receiptModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        function downloadReceipt() { window.print(); }
    </script>
</body>
</html>