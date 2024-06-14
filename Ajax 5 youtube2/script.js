

$('#ok').on('click', function () {
    $.ajax({
        url: 'https://www.googleapis.com/youtube/v3/search',
        data: {
            part: 'snippet',
            key: 'AIzaSyCIpOvsVV4CA4zp7BpGSauxdI1aawAUsLI',
            maxResults: 9,
            q: $('#input').val()
        }, 
        dataType: 'json',

        success: function (res) {
            console.log(res)
            for (let i = 0; i < res.items.length; i++) {
                let x = $('<div>');
                $('#main').append(x);
                let a = $('<a>');
                x.append(a);
                a.attr('href', "https://www.youtube.com/watch?v=" + res.items[i].id.videoId);
                let img = $('<img>');
                a.append(img);
                img.attr('src', res.items[i].snippet.thumbnails.default.url );
                let title = $("<h4>");
                a.append(title);
                title.html(res.items[i].snippet.title);
            }
        }
    })
})
