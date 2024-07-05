<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABASE PROJECT</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/script.js"></script>
    @vite('resources/css/app.css')

</head>

<body>
    <header class="bg-gray-50 dark:bg-gray-900">
        <nav>
            <div class="left-nav">
                <div class="logo">
                    <img src="images/logoweb.png" alt="Logo">
                    <p>Monitor Hijau</p>
                </div>
                <ul class="nav-menu">
                    <li class="nav-menuitem"><a href="#section1" class="nav-link">Home</a></li>
                    <li class="nav-menuitem"><a href="#section2" class="nav-link">Administrator</a></li>
                    <li class="nav-menuitem"><a href="#section3" class="nav-link">Admin Region</a></li>
                </ul>
            </div>
            <div class="right-nav">
                <ul class="log">
                    <li class="log-item dropdown">
                        <a href="javascript:void(0)" class="nav-link">Masuk</a>
                        <div class="dropdown-content">
                            <a href="/login">Administrator</a>
                            <a href="/login-regadmin">Admin Region</a>
                        </div>
                    </li>
                    <li class="log-item"><a href="/register" class="nav-link">Daftar</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main id="main" class="min-h-screen bg-gradient-to-tr from-gray-950 from-60% to-gray-800">
        <div class="main" id="section1">
            <div id="content">
                <img src="images/logoweb.png" alt="Logo" class="logo-large">
                <div class="text-content">
                    <p class="site-title">Monitor Hijau</p>
                    <p class="site-description">Monitor Hijau adalah aplikasi yang menyediakan platform untuk monitoring
                        vegetasi yang komprehensif. Dirancang untuk memenuhi kebutuhan pengguna dari berbagai latar
                        belakang, aplikasi ini memungkinkan administrator untuk mengelola wilayah, menambahkan dan
                        mengelola informasi tanaman, serta menyediakan visualisasi peta yang detail untuk memantau
                        kondisi vegetasi secara efisien. Dengan fitur-fitur ini, Monitor Hijau membantu dalam
                        pengelolaan lingkungan dan konservasi tanaman secara lebih efektif dan terorganisir.</p>
                </div>
            </div>
        </div>
        <div class="section-header">
            <h1>Login sebagai</h1>
        </div>
        <div class="sections-container">
            <div class="section2" id="section2">
                <div class="description">
                    <h2>Administrator</h2>
                    <img src="images/administrator2_icon.png" alt="Administrator">
                    <p>Login sebagai administrator menawarkan Anda untuk dapat mengelola data region. Di sini Anda dapat
                        menambahkan, mengedit, dan menghapus informasi region, serta melakukan ekspor dan impor data
                        untuk mempermudah pengelolaan. Ketuk tombol di bawah ini untuk login sebagai administrator.</p>
                    <a href="/login" class="main-link">Login Administrator</a>
                </div>
            </div>
            <div class="section3" id="section3">
                <div class="description">
                    <h2>Region Admin</h2>
                    <img src="images/regadmin2_icon.png" alt="Region Admin">
                    <p>Untuk mengelola data region, harap masuk sebagai region admin. Di sini Anda dapat menambahkan,
                        mengedit, dan menghapus informasi region, serta melakukan ekspor dan impor data untuk
                        mempermudah pengelolaan. Silakan gunakan tombol di bawah ini untuk masuk dan mulai mengelola
                        data region.</p>
                    <a href="/login-regadmin" class="main-link">Login AdminRegion</a>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-gray-800 text-gray-300 py-4">
        <div class="container px-6 mx-auto text-center">
            <p>Aplikasi Vegetasi Tanaman</p>
            <p>Anggota kelompok 5:</p>
            <p>Deva Athaya A | Eko Ginanjar | Fakhira Amara | Gardasvara | Humam Alwi</p>
            <br>
            <p>&copy; 2024 Monitor Hijau. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
