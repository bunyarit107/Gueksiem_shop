<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เคลมสินค้า - เกือกสยาม</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="claim.css?v=3"> <!-- อัปเดตเวอร์ชัน CSS -->
</head>
<body class="bg-gray-theme">

    <!-- ================= แถบนำทาง ================= -->
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

    <main class="claim-container">
        <h1 class="claim-title">Product claim</h1>
        
        <form action="process_claim.php" method="POST" enctype="multipart/form-data">
            
            <div class="claim-rules-text">
                <h3>เงื่อนไขและข้อกำหนดการเคลมสินค้า</h3>
                <ul>
                    <li>สามารถแจ้งเคลมได้ภายใน <strong>7 วัน</strong> นับจากวันที่ได้รับสินค้า</li>
                    <li>สินค้าต้องอยู่ในสภาพเดิม ไม่ผ่านการใช้งาน ซักรีด และป้ายสินค้าต้องอยู่ครบถ้วน</li>
                    <li>กรุณาแนบรูปถ่าย (สูงสุด 5 รูป) และ/หรือ วิดีโอ (ความยาวไม่เกิน 5 นาที) ที่แสดงปัญหาอย่างชัดเจน</li>
                </ul>
            </div>

            <div class="claim-form-group">
                <label class="claim-label">แจ้งสาเหตุการเคลมสินค้า</label>
                <textarea name="claim_reason" class="claim-textarea" placeholder="ระบุรายละเอียด หรือปัญหาที่พบ..." rows="4" required></textarea>
            </div>

            <!-- ================= ส่วนอัปโหลดหลักฐาน ================= -->
            <div class="claim-form-group">
                <label class="claim-label">แนบหลักฐานการเคลม</label>
                
                <!-- 1. อัปโหลดรูปสินค้า (สูงสุด 5 รูป) -->
                <div class="upload-section">
                    <h4>1. รูปภาพสินค้า (สูงสุด 5 รูป)</h4>
                    <div class="preview-grid" id="image-preview-grid">
                        <!-- ปุ่มกดเพิ่มรูป -->
                        <label class="dashed-box small-box" id="add-image-btn">
                            <input type="file" id="image-input" name="claim_images[]" multiple accept="image/*" style="display: none;" onchange="handleImages(this)">
                            <div class="upload-content">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                <span>เพิ่มรูป</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- 2. อัปโหลดวิดีโอ (1 ไฟล์) -->
                <div class="upload-section">
                    <h4>2. วิดีโอสินค้า (ไม่เกิน 5 นาที / 50MB) - <span style="font-size:0.9rem; color:#707070;">ไม่บังคับ</span></h4>
                    
                    <label class="dashed-box rectangle-box" id="video-add-box">
                        <input type="file" id="video-input" name="claim_video" accept="video/*" style="display: none;" onchange="handleVideo(this)">
                        <div class="upload-content">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
                            <span>เพิ่มวิดีโอ</span>
                        </div>
                    </label>

                    <!-- กล่องแสดงชื่อวิดีโอเมื่อเลือกแล้ว -->
                    <div class="file-preview-item" id="video-preview" style="display: none;">
                        <span id="video-filename">ชื่อวิดีโอ.mp4</span>
                        <button type="button" class="del-btn-text" onclick="removeVideo()">ลบวิดีโอ</button>
                    </div>
                </div>

                <!-- 3. อัปโหลดใบเสร็จ (1 ไฟล์) -->
                <div class="upload-section">
                    <h4>3. รูปใบเสร็จรับเงิน (1 รูป)</h4>
                    
                    <label class="dashed-box small-box" id="receipt-add-box">
                        <input type="file" id="receipt-input" name="claim_receipt" accept="image/*" style="display: none;" required onchange="handleReceipt(this)">
                        <div class="upload-content">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                            <span>เพิ่มใบเสร็จ</span>
                        </div>
                    </label>

                    <!-- กล่องโชว์รูปใบเสร็จเมื่อเลือกแล้ว -->
                    <div class="preview-grid" id="receipt-preview" style="display: none;">
                        <div class="img-preview-item">
                            <img id="receipt-img" src="" alt="ใบเสร็จ">
                            <button type="button" class="del-btn" onclick="removeReceipt()">×</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="claim-btn-group">
                <button type="submit" class="btn-claim-action btn-confirm">ยืนยันการเคลม</button>
                <a href="index.php" class="btn-claim-action btn-cancel text-center">ยกเลิก</a>
            </div>

        </form>
    </main>

    <!-- ================= JavaScript จัดการไฟล์และปุ่มลบ ================= -->
    <script>
        // 1. จัดการรูปภาพสินค้า (สูงสุด 5 รูป)
        let selectedImages = []; // อาเรย์เก็บไฟล์รูปที่เลือก

        function handleImages(input) {
            let files = Array.from(input.files);
            
            // เช็คว่าถ้ารวมกับของเก่าแล้วเกิน 5 รูปไหม
            if (selectedImages.length + files.length > 5) {
                alert("อัปโหลดรูปภาพได้สูงสุด 5 รูปเท่านั้นครับ");
                return;
            }
            
            selectedImages = selectedImages.concat(files);
            renderImages();
            updateImageInput();
        }

        // ฟังก์ชันวาดรูปภาพตัวอย่างลงบนหน้าเว็บ
        function renderImages() {
            const grid = document.getElementById('image-preview-grid');
            const addBtn = document.getElementById('add-image-btn');
            
            // ลบรูปพรีวิวเก่าออกก่อน (ยกเว้นปุ่มเพิ่มรูป)
            document.querySelectorAll('.multi-img-item').forEach(el => el.remove());

            // วาดรูปพรีวิวใหม่
            selectedImages.forEach((file, index) => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let div = document.createElement('div');
                    div.className = 'img-preview-item multi-img-item';
                    div.innerHTML = `
                        <img src="${e.target.result}" alt="รูปสินค้า">
                        <button type="button" class="del-btn" onclick="removeImage(${index})">×</button>
                    `;
                    grid.insertBefore(div, addBtn);
                }
                reader.readAsDataURL(file);
            });

            // ซ่อนปุ่มเพิ่มรูป ถ้าครบ 5 รูปแล้ว
            addBtn.style.display = selectedImages.length >= 5 ? 'none' : 'flex';
        }

        // ฟังก์ชันลบรูประบุตำแหน่ง (index)
        function removeImage(index) {
            selectedImages.splice(index, 1);
            renderImages();
            updateImageInput();
        }

        // อัปเดตไฟล์เข้าไปใน input ให้ PHP รับค่าได้ตอนกด submit
        function updateImageInput() {
            const dt = new DataTransfer();
            selectedImages.forEach(file => dt.items.add(file));
            document.getElementById('image-input').files = dt.files;
        }

        // ==========================================
        // 2. จัดการวิดีโอ (1 ไฟล์)
        function handleVideo(input) {
            if(input.files.length > 0) {
                let file = input.files[0];
                // เช็คขนาดไฟล์ (50MB = 50 * 1024 * 1024 bytes)
                if(file.size > 50 * 1024 * 1024) {
                    alert("ไฟล์วิดีโอใหญ่เกินไป กรุณาอัปโหลดไฟล์ขนาดไม่เกิน 50MB");
                    input.value = "";
                    return;
                }
                document.getElementById('video-add-box').style.display = 'none';
                document.getElementById('video-preview').style.display = 'flex';
                document.getElementById('video-filename').innerText = file.name;
            }
        }

        function removeVideo() {
            document.getElementById('video-input').value = "";
            document.getElementById('video-add-box').style.display = 'flex';
            document.getElementById('video-preview').style.display = 'none';
        }

        // ==========================================
        // 3. จัดการรูปใบเสร็จ (1 รูป)
        function handleReceipt(input) {
            if(input.files.length > 0) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('receipt-img').src = e.target.result;
                    document.getElementById('receipt-add-box').style.display = 'none';
                    document.getElementById('receipt-preview').style.display = 'flex';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeReceipt() {
            document.getElementById('receipt-input').value = "";
            document.getElementById('receipt-add-box').style.display = 'flex';
            document.getElementById('receipt-preview').style.display = 'none';
        }
    </script>
</body>
</html>