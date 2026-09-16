<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $fullname = $_POST['fullname'] ?? '';
    $phone = $_POST['phone'] ?? '';
    
    // รับค่าที่อยู่แต่ละส่วนแยกกัน
    $house_detail = $_POST['house_detail'] ?? '';
    $province = $_POST['province'] ?? '';
    $district = $_POST['district'] ?? '';
    $tambon = $_POST['tambon'] ?? '';
    $zipcode = $_POST['zipcode'] ?? '';
    
    // นำข้อมูลที่อยู่มาต่อกันเป็นประโยคเดียวเพื่อเตรียมบันทึกลง Database
    $full_address = $house_detail . ' ต.' . $tambon . ' อ.' . $district . ' จ.' . $province . ' ' . $zipcode;
    
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    if ($password === $confirm_password && !empty($username)) {
        // ทดสอบแสดงผลที่อยู่ (เวลาใช้งานจริงให้ลบบรรทัดนี้แล้วเขียนโค้ดบันทึกลงฐานข้อมูล)
        // echo "<script>alert('ที่อยู่ที่บันทึกคือ: " . $full_address . "');</script>";
        
        header("Location: login.php");
        exit();
    } else {
        $error = "รหัสผ่านไม่ตรงกัน หรือกรอกข้อมูลไม่ครบถ้วน";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - เกือกสยาม</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css?v=1.0">
</head>
<body>

    <header class="navbar"> 
        <div class="logo">เกือกสยาม</div>
        <div class="nav-icons">
            <a href="index.php" style="color: #111; text-decoration: none; font-weight: 600;">กลับหน้าหลัก</a>
        </div>
    </header>

    <main class="auth-container">
        <div class="auth-box">
            <h2>สร้างบัญชีใหม่</h2>
            <p>สมัครสมาชิกเพื่อประสบการณ์ช้อปปิ้งที่ดียิ่งขึ้น</p>
            
            <?php if (isset($error)): ?>
                <div style="color: red; margin-bottom: 15px; font-size: 0.9rem;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="register.php">
                <div class="input-group">
                    <input type="text" name="username" placeholder="ชื่อผู้ใช้งาน (Username)" required>
                </div>
                <div class="input-group">
                    <input type="text" name="fullname" placeholder="ชื่อ-นามสกุล" required>
                </div>
                <div class="input-group">
                    <input type="tel" name="phone" placeholder="เบอร์โทรศัพท์" required>
                </div>
                
                <!-- ชุดกรอกข้อมูลที่อยู่แบบใหม่ -->
                <div style="text-align: left; margin-bottom: 8px; font-size: 0.9rem; font-weight: 600;">ข้อมูลที่อยู่จัดส่ง</div>
                
                <div class="input-group">
                    <input type="text" name="house_detail" placeholder="บ้านเลขที่, หมู่, ซอย, ถนน" required>
                </div>
                <div class="input-group">
                    <select name="province" id="province" required>
                        <option value="" selected disabled>-- เลือกจังหวัด --</option>
                        <!-- ตัวอย่าง: เดี๋ยวเราใช้ PHP ดึงจากฐานข้อมูลมาใส่ตรงนี้ -->
                        <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                    </select>
                </div>
                <div class="input-group">
                    <select name="district" id="district" required>
                        <option value="" selected disabled>-- เลือกเขต/อำเภอ --</option>
                        <option value="เขตพระนคร">เขตพระนคร</option>
                    </select>
                </div>
                <div class="input-group">
                    <select name="tambon" id="tambon" required>
                        <option value="" selected disabled>-- เลือกแขวง/ตำบล --</option>
                        <option value="พระบรมมหาราชวัง">พระบรมมหาราชวัง</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" name="zipcode" id="zipcode" placeholder="รหัสไปรษณีย์" readonly value="10200">
                </div>
                <!-- จบชุดกรอกข้อมูลที่อยู่ -->

                <div class="input-group" style="margin-top: 20px;">
                    <input type="password" name="password" placeholder="รหัสผ่าน" required>
                </div>
                <div class="input-group">
                    <input type="password" name="confirm_password" placeholder="ยืนยันรหัสผ่านอีกครั้ง" required>
                </div>
                
                <button type="submit" class="btn btn-dark w-100">สมัครสมาชิก</button>
            </form>
            
            <div class="auth-links">
                <span>มีบัญชีผู้ใช้อยู่แล้ว? </span>
                <a href="login.php">เข้าสู่ระบบ</a>
            </div>
        </div>
    </main>

</body>
</html>