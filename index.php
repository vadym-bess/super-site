<?php
$utm = isset($_GET['utm_source']) ? htmlspecialchars($_GET['utm_source']) : null;
$sub1 = isset($_GET['sub1']) ? htmlspecialchars($_GET['sub1']) : null;

// Установка куки на 3 дня
if ($sub1) {
    setcookie('sub1', $sub1, time() + 3 * 24 * 60 * 60);
}

// Сохраняем параметры в файл
$params = $_GET;
if (!empty($params)) {
    $log = "[" . date('Y-m-d H:i:s') . "] " . http_build_query($params) . PHP_EOL;
    file_put_contents('params.txt', $log, FILE_APPEND);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Site</title>
    <link rel="icon" href="images/favpng_ddf4d83748c2008b2b284db6dbb86d0c.png" type="image/png">
    <meta name="description" content="Super Site">
    <link rel="preload" href="styles.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="styles.css"></noscript>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="header">
            <h2 class="header-logo">Super Site</h2>
            <nav class="nav-web">
                
                <a class="header-web-link" href="contacts.html">Contacts</a>
            </nav>
            <img class="menu" src="images/menu-white.svg" alt="menu">
        </div>
        <div id="myModal" class="modal">

            <div class="modal-content">
                <span class="close">&times;</span>

                <a class="header-mob-link" href="contacts.html">Contacts</a>

            </div>
        </div>
    </header>

    <main>
<div class="container">
   
    <h1><strong><span style="font-size:24pt;font-family:Roboto,sans-serif;">Congratulations! You have won a new iPhone 16 Pro Max!</span></strong></h1>
   
    <div class="image-thumb">
        <img src="images/iphone-16-pro-max.webp" alt="Super Site">
    </div>
     
    

    <p><strong>Источник трафика:</strong>
        <?= $utm ? $utm : 'Источник трафика не определен'; ?>
    </p>
    
    <p><strong>Идентификатор пользователя:</strong>
        <?= $sub1 ? $sub1 : 'Идентификатор отсутствует'; ?>
    </p>
    
    <form method="get" action="thankyou.html">
        <?php foreach ($_GET as $key => $value): ?>
            <input type="hidden" name="<?= htmlspecialchars($key) ?>" value="<?= htmlspecialchars($value) ?>">
        <?php endforeach; ?>
        
        <div class="main-button-thumb">
            <button class="main-button" type="submit">Get prise</button>
        </div>
    </form>
</div>
    </main>

    <footer class="footer">

        <div class="policy-thumb">
            <a href="policy.html" class="footer-text policy">Privacy Policy</a>
            <p class="footer-text">Super Site 2025. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the modal
            const modal = document.getElementById("myModal");

            // Get the button that opens the modal
            const openModalBtn = document.querySelector(".menu");

            // Get the <span> element that closes the modal
            const closeBtn = document.querySelector(".modal .close");

            // Get all buttons that should close the modal
            const headerWebLinks = document.querySelectorAll(".header-web-link");

            // When the user clicks the button, open the modal 
            openModalBtn.addEventListener("click", function (event) {
                event.preventDefault();
                modal.style.display = "block";
                document.body.classList.add("modal-open");
            });

            // When the user clicks on <span> (x), close the modal
            closeBtn.onclick = function () {
                modal.style.display = "none";
                document.body.classList.remove("modal-open");
            };

            // When the user clicks on any header-web-link, close the modal
            headerWebLinks.forEach(link => {
                link.addEventListener("click", function () {
                    modal.style.display = "none";
                    document.body.classList.remove("modal-open");
                });
            });

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    document.body.classList.remove("modal-open");
                }
            };
        });

    </script>


</body>

</html>