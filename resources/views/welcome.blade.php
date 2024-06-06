<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABASE PROJECT</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <header class="bg-gray-50 dark:bg-gray-900">
        <nav>
            <div class="left-nav">
                <div class="logo">
                    <p>Logo</p>
                </div>
                <ul class="nav-menu">
                    <li class="nav-menuitem"><a href="#section1" class="nav-link">Blabla</a></li>
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
                        </div></li>
                    <li class="log-item"><a href="/register" class="nav-link">Daftar</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main id="main" class="min-h-screen bg-gradient-to-tr from-gray-950 from-60% to-gray-800" >
        <div class="main " id="section1">
            <div id="content">
                <p>Welcome</p>
                <p>Welcome</p>
            </div>
        </div>
        <div class="admin " id="section2">
            <div class="description bg-whiteshadow dark:border dark:bg-gray-50 dark:border-gray-700">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni quasi dolorum sequi at architecto repudiandae
                    alias voluptatum. Perferendis totam accusamus voluptatum, adipisci quaerat cum ullam sequi sunt temporibus! Suscipit, minima!</p>
                <a href="/login" class="main-link">Login Administrator</a>
            </div>
        </div>
        <div class="region" id="section3">
            <div class="description bg-whiteshadow dark:border dark:bg-gray-50 dark:border-gray-700">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni quasi dolorum sequi at architecto repudiandae
                    alias voluptatum. Perferendis totam accusamus voluptatum, adipisci quaerat cum ullam sequi sunt temporibus! Suscipit, minima!</p>
                <a href="/login-regadmin" class="main-link">Login Region Admin</a>
            </div>
        </div>
    </main>
    <footer class="bg-gray-50 dark:bg-gray-900">
        ini footer
    </footer>
</body>
</html>
