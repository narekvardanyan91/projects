$('#image-form').submit(function (e) {
    e.preventDefault();

    const url = $('#url').val();
    const width = $('#width').val() || 200;
    const height = $('#height').val() || 200;
    const text = $('#text').val();

    console.log('Отправка данных:', { url, width, height, text });

    $.ajax({
        url: 'process.php',
        type: 'POST',
        data: { url, width, height, text },
        success: function (response) {
            console.log('Ответ от сервера:', response);
            $('#images-container').html(response);
            downloadImages(); // Запускаем скачивание
        },
        error: function (xhr, status, error) {
            console.log('Ошибка:', status, error);
            alert('Ошибка при обработке данных');
        },
    });
});

function downloadImages() {
    $('#images-container img').each(function () {
        const link = document.createElement('a');
        link.href = $(this).attr('src');
        link.download = `image_${Date.now()}.jpg`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
}
