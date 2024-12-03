<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download & Edit Photos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Download The Pictures From Website</h1>
    <form id="image-form">
        <label for="url">URL страницы:</label>
        <input type="url" id="url" name="url" placeholder="Введите URL" required>

        <label for="width">Минимальная ширина (px):</label>
        <input type="number" id="width" name="width" min="200" placeholder="Ширина">

        <label for="height">Минимальная высота (px):</label>
        <input type="number" id="height" name="height" min="200" placeholder="Высота">

        <label for="text">Текст на изображении:</label>
        <input type="text" id="text" name="text" placeholder="Ваш текст">

        <button type="submit">Загрузить</button>
    </form>

    <div id="images-container"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
