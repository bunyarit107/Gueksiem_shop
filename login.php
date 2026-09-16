<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (!empty($email) && !empty($password)) {
        $_SESSION['user_id'] = 1; 
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - เกือกสยาม</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- ดึงไฟล์หลักที่ใช้ร่วมกัน (Navbar, Button) -->
    <link rel="stylesheet" href="style.css">
    <!-- ดึงไฟล์ที่ใช้เฉพาะหน้า Login -->
    <link rel="stylesheet" href="login.css">
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
            <h2>เข้าสู่ระบบ</h2>
            <p>เพื่อดำเนินการสั่งซื้อรองเท้ามือสองคู่โปรดของคุณ</p>
            
            <form method="POST" action="login.php">
                <div class="input-group">
                    <input type="email" name="email" placeholder="อีเมล" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="รหัสผ่าน" required>
                </div>
                <!-- ใช้คลาส btn btn-dark จาก style.css และ w-100 จาก login.css -->
                <button type="submit" class="btn btn-dark w-100">ลงชื่อเข้าใช้</button>
            </form>
            
            <div class="auth-links">
                <a href="#">ลืมรหัสผ่าน?</a>
                <span> | </span>
                <a href="register.php">สมัครสมาชิกใหม่</a>
            </div>
        </div>
    </main>

</body>
</html>