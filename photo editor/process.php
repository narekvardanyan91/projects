<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];
    $width = $_POST['width'] ?: 200;  // размер мин
    $height = $_POST['height'] ?: 200;
    $text = $_POST['text'] ?: 'Your text here';  

    // Получать HTML код/документ страницы
    $html = file_get_contents($url);
    if (!$html) {
        echo "Не удалось загрузить страницу.";
        exit;
    }

    // Создать DOM
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $images = $dom->getElementsByTagName('img');

    $validImages = [];

    // Обработка изображения
    foreach ($images as $img) {
        $src = $img->getAttribute('src');
        if (empty($src)) continue;

        // Переобразование относителного пути в абсолютный
        if (substr($src, 0, 4) !== "http") {
            $src = rtrim($url, '/') . '/' . ltrim($src, '/');
        }

        // Получать содержимое изображения
        $imageData = file_get_contents($src);
        if ($imageData === false) {
            continue;  
        }

        //проверка изображение?
        $imageInfo = getimagesizefromstring($imageData);
        if ($imageInfo === false) {
            continue;  
        }

        // создание изображения
        $image = imagecreatefromstring($imageData);
        if (!$image) {
            continue;  
        }

        // получить размеры, добавить текст, сохранить на сервере и добавить в список
        $imgWidth = imagesx($image);
        $imgHeight = imagesy($image);

        if ($imgWidth >= $width && $imgHeight >= $height) {
            $textColor = imagecolorallocate($image, 0, 255, 255); // Цвет текста CYAN
            imagestring($image, 5, 10, 10, $text, $textColor);

            $fileName = 'images/' . uniqid() . '.jpg';
            imagejpeg($image, $fileName);

            $validImages[] = $fileName;

            // Освободить память
            imagedestroy($image);
        }
    }

    // сохранить пути в файл
    $savedImages = [];
    if (file_exists('images.json')) {
        $savedImages = json_decode(file_get_contents('images.json'), true);
    }
    $savedImages = array_merge($savedImages, $validImages);
    file_put_contents('images.json', json_encode($savedImages));

    // Отправить ссылки на изображения
    if (count($validImages) > 0) {
        foreach ($validImages as $image) {
            echo "<img src='$image' alt='Image' />";
        }
    } else {
        echo "Изображений, соответствующих условиям, не найдено.";
    }
} else {
    // Отображаем сохраненные изображения
    if (file_exists('images.json')) {
        $savedImages = json_decode(file_get_contents('images.json'), true);
        foreach ($savedImages as $image) {
            echo "<img src='$image' alt='Image' />";
        }
    } else {
        echo "Нет сохраненных изображений.";
    }
}
?>
